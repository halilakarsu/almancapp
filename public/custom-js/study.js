// ── STATE ─────────────────────────────────────────────────────────────────
let deck        = [];
let currentIdx  = 0;
let isRevealed  = false;
let sessionCorrect = 0;
let sessionWrong   = 0;
let sessionKnown   = 0;
let autoRevealTimer = null;
let currentSpeech = null;

// ── INIT ──────────────────────────────────────────────────────────────────
function buildDeck() {
    // Order: wrong-heavy → learning → new → known
    const wrongy   = CARDS.filter(c => c.wrong_count > 0 && c.status !== 'known');
    const learning = CARDS.filter(c => c.status === 'learning' && c.wrong_count === 0);
    const newCards = CARDS.filter(c => c.status === 'new');
    const known    = CARDS.filter(c => c.status === 'known');

    wrongy.sort((a,b) => b.wrong_count - a.wrong_count);
    return [...wrongy, ...learning, ...newCards, ...known];
}

function startStudy() {
    deck            = buildDeck();
    currentIdx      = 0;
    sessionCorrect  = 0;
    sessionWrong    = 0;
    sessionKnown    = 0;
    isRevealed      = false;

    document.getElementById('complete-wrap').classList.remove('show');
    document.getElementById('card-stage').style.display   = 'block';
    document.getElementById('progress-wrap').style.display = 'block';
    document.getElementById('stats-bar').style.display    = 'flex';
    document.getElementById('flip-hint').classList.remove('hidden');
    document.getElementById('action-row').classList.add('hidden');

    if (deck.length === 0) {
        showComplete(); return;
    }
    renderCard();
}

// ── RENDER ────────────────────────────────────────────────────────────────
function renderCard() {
    if (currentIdx >= deck.length) { showComplete(); return; }

    const card = deck[currentIdx];
    isRevealed = false;

    // Reset reveal
    document.getElementById('tr-reveal-container').classList.remove('is-revealed');
    document.getElementById('action-row').classList.add('hidden');
    document.getElementById('flip-hint').classList.remove('hidden');

    // Progress
    const pct = Math.round((currentIdx / deck.length) * 100);
    document.getElementById('progress-fill').style.width = pct + '%';
    document.getElementById('prog-text').textContent = currentIdx + ' / ' + deck.length;
    document.getElementById('prog-pct').textContent  = pct + '%';

    // Type badge
    const badge = document.getElementById('card-type-badge');
    if (card.type === 'word') {
        badge.className = 'card-type-badge type-word';
        badge.textContent = 'Kelime';
    } else {
        badge.className = 'card-type-badge type-sentence';
        badge.textContent = 'Cümle';
    }

    // German content
    const deEl = document.getElementById('card-de');
    deEl.textContent = card.german_content;
    deEl.className   = card.type === 'sentence' ? 'card-de-text sentence' : 'card-de-text';

    // Turkish content
    const trEl = document.getElementById('card-tr');
    trEl.textContent = card.turkish_content;
    trEl.className   = card.type === 'sentence' ? 'card-tr-text sentence' : 'card-tr-text';

    // Image
    const imgEl = document.getElementById('card-img');
    if (card.image) {
        imgEl.src = '/storage/' + card.image;
        imgEl.classList.remove('d-none');
    } else {
        imgEl.classList.add('d-none');
    }

    // Audio - AUTO PLAY AT START
    const audioBtn = document.getElementById('audio-btn');
    const audioEl  = document.getElementById('card-audio');
    if (card.audio) {
        audioEl.src = '/storage/' + card.audio;
        audioBtn.classList.remove('d-none');
        // Auto-play
        setTimeout(() => {
            audioEl.currentTime = 0;
            audioEl.play().catch(()=>{
                speakGerman(card.german_content);
            });
        }, 300);
    } else {
        audioEl.src = '';
        audioBtn.classList.add('d-none');
        speakGerman(card.german_content);
    }

    // Difficulty dots
    const dotsEl = document.getElementById('diff-dots');
    dotsEl.innerHTML = '';
    for (let i = 1; i <= 3; i++) {
        const d = document.createElement('div');
        d.className = 'diff-dot' + (i <= card.difficulty ? ' active' : '');
        dotsEl.appendChild(d);
    }

    // Animate stage in
    const stage = document.getElementById('card-stage');
    stage.classList.remove('animate-in');
    void stage.offsetWidth;
    stage.classList.add('animate-in');

    // Auto-reveal after 1.5 seconds
    clearTimeout(autoRevealTimer);
    autoRevealTimer = setTimeout(() => revealTranslation(), 1500);
}

// ── REVEAL ────────────────────────────────────────────────────────────────
function revealTranslation() {
    if (isRevealed) return; 
    isRevealed = true;
    clearTimeout(autoRevealTimer);
    
    document.getElementById('tr-reveal-container').classList.add('is-revealed');
    document.getElementById('flip-hint').classList.add('hidden');
    document.getElementById('action-row').classList.remove('hidden');

    // Auto-play audio if present
    const audioEl = document.getElementById('card-audio');
    if (audioEl.src && audioEl.src !== window.location.href) {
        audioEl.currentTime = 0;
        audioEl.play().catch(()=>{});
    }
}

// ── NEXT CARD ─────────────────────────────────────────────────────────────
async function nextCard() {
    if (!isRevealed) return; 

    const card = deck[currentIdx];
    document.getElementById('btn-continue').disabled = true;

    sessionCorrect++;

    // Send to server
    try {
        const res = await fetch(REVIEW_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': CSRF,
            },
            body: JSON.stringify({ card_id: card.id, knew: true }),
        });
        const data = await res.json();

        // Update stat counters
        updateStatUI(data.status, card.status);
        deck[currentIdx].status = data.status;

        if (data.status === 'known') sessionKnown++;

    } catch(e) { console.warn('Review sync failed', e); }

    // Next card after short delay
    setTimeout(() => {
        document.getElementById('btn-continue').disabled = false;
        currentIdx++;
        renderCard();
    }, 200);
}

function updateStatUI(newStatus, oldStatus) {
    if (oldStatus === 'new')      statCounts.new      = Math.max(0, statCounts.new - 1);
    if (oldStatus === 'learning') statCounts.learning = Math.max(0, statCounts.learning - 1);
    if (oldStatus === 'known')    statCounts.known    = Math.max(0, statCounts.known - 1);
    
    if (newStatus === 'new')      statCounts.new++;
    if (newStatus === 'learning') statCounts.learning++;
    if (newStatus === 'known')    statCounts.known++;

    document.getElementById('cnt-new').textContent      = statCounts.new;
    document.getElementById('cnt-learning').textContent = statCounts.learning;
    document.getElementById('cnt-known').textContent    = statCounts.known;
}

// ── COMPLETE ──────────────────────────────────────────────────────────────
function showComplete() {
    document.getElementById('card-stage').style.display    = 'none';
    document.getElementById('progress-wrap').style.display = 'none';
    document.getElementById('flip-hint').classList.add('hidden');
    document.getElementById('action-row').classList.add('hidden');

    document.getElementById('final-correct').textContent = sessionCorrect;
    document.getElementById('final-wrong').textContent   = sessionWrong;
    document.getElementById('final-known').textContent   = statCounts.known;

    document.getElementById('complete-wrap').classList.add('show');
    document.getElementById('complete-wrap').scrollIntoView({ behavior: 'smooth' });
}

function goBack() {
    window.location.href = BACK_URL;
}

// ── AUDIO ─────────────────────────────────────────────────────────────────
function playCardAudio() {
    const audioEl = document.getElementById('card-audio');
    audioEl.currentTime = 0;
    audioEl.play().catch(()=>{});
}

// ── TOAST ─────────────────────────────────────────────────────────────────
let toastTimer;
function showToast(msg, duration = 1500) {
    const el = document.getElementById('card-toast');
    el.textContent = msg;
    el.classList.add('show');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => el.classList.remove('show'), duration);
}

// ── KEYBOARD ──────────────────────────────────────────────────────────────
document.addEventListener('keydown', (e) => {
    if (e.key === ' ' || e.key === 'ArrowDown' || e.key === 'Enter') { 
        e.preventDefault(); 
        if (!isRevealed) revealTranslation();
        else nextCard();
    }
    if (e.key === 'ArrowRight' && isRevealed) nextCard();
});

// ── START ─────────────────────────────────────────────────────────────────
startStudy();
