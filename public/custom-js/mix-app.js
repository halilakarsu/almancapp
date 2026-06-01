// ══════════════════════════════════════════
//  ALMINGO — MIX APP  (Duolingo Style)
// ══════════════════════════════════════════

// ── GLOBAL STATE ──
const MIX = {
    queue: [],
    currentIndex: 0,
    words: [],
    sentences: [],
    matchItems: [],
    // Stats
    correctCount: 0,
    wrongCount: 0,
    startTime: null,
    xp: 0
};

// ── TYPE CONFIG ──
const TYPE_CONFIG = {
    study:    { label: '📖 Öğrenelim',        badgeClass: 'badge-study'    },
    flip:     { label: '🔄 Ne Demekti?',       badgeClass: 'badge-flip'     },
    quiz:     { label: '🎯 Türkçesi Nedir?',   badgeClass: 'badge-quiz'     },
    scramble: { label: '🔤 Cümleyi Kur',       badgeClass: 'badge-scramble' },
    fill:     { label: '✏️ Eksik Kelimeyi Bul', badgeClass: 'badge-fill'     },
    write:    { label: '📝 Almancasını Yaz',   badgeClass: 'badge-write'    },
    match:    { label: '🎴 Eşleştir',          badgeClass: 'badge-match'    },
};

// ── TTS ──
let currentAudioNode = null;

function playItemAudio(item) {
    if (currentAudioNode) { currentAudioNode.pause(); currentAudioNode = null; }
    if (item && item.audio) {
        currentAudioNode = new Audio('/storage/' + item.audio);
        currentAudioNode.play().catch(() => speakGerman(item.de));
    } else if (item && item.de) {
        speakGerman(item.de);
    }
}

function playCurrentMixAudio() {
    if (MIX.currentIndex >= MIX.queue.length) return;
    const step = MIX.queue[MIX.currentIndex];
    if (step.type === 'match') return;
    playItemAudio(step.item);
}

// ── INIT ──
function startMixApp(allCards) {
    MIX.words     = allCards.filter(c => c.type === 'word');
    MIX.sentences = allCards.filter(c => c.type === 'sentence');
    MIX.matchItems= allCards.filter(c => c.type === 'match');
    MIX.startTime = Date.now();

    generateMixQueue();

    document.getElementById('mix-intro').style.display       = 'none';
    document.getElementById('mix-app-container').style.display = 'block';

    playNextMix();
}

function generateMixQueue() {
    let words     = [...MIX.words    ].sort(() => Math.random() - 0.5);
    let sentences = [...MIX.sentences].sort(() => Math.random() - 0.5);
    let wIdx = 0, sIdx = 0;

    while (wIdx < words.length || sIdx < sentences.length) {
        for (let i = 0; i < 3; i++) { if (wIdx < words.length) MIX.queue.push({type:'study',   item: words[wIdx++]}); }
        for (let i = 0; i < 2; i++) { if (wIdx < words.length) MIX.queue.push({type:'flip',    item: words[wIdx++]}); }
        for (let i = 0; i < 2; i++) { if (wIdx < words.length) MIX.queue.push({type:'quiz',    item: words[wIdx++]}); }
        if (wIdx < words.length)    MIX.queue.push({type:'study',   item: words[wIdx++]});
        if (wIdx < words.length)    MIX.queue.push({type:'flip',    item: words[wIdx++]});
        if (sIdx < sentences.length) MIX.queue.push({type:'scramble', item: sentences[sIdx++]});
        if (sIdx < sentences.length) MIX.queue.push({type:'fill',     item: sentences[sIdx++]});
        if (wIdx < words.length)    MIX.queue.push({type:'write', item: words[wIdx++]});
        else if (sIdx < sentences.length) MIX.queue.push({type:'write', item: sentences[sIdx++]});
    }

    const matchPool = MIX.matchItems.length > 0 ? MIX.matchItems : MIX.words;
    if (matchPool.length > 0) MIX.queue.push({type:'match', items: matchPool});
}

// ── NAVIGATION ──
function hideAllSections() {
    ['mix-study','mix-flip','mix-quiz','mix-scramble','mix-fill','mix-write','mix-match','mix-finish'].forEach(id => {
        const el = document.getElementById(id);
        if (el) { el.style.display = 'none'; }
    });
}

function updateUnifiedProgress() {
    const pct = (MIX.currentIndex / MIX.queue.length) * 100;
    const pb = document.getElementById('unified-progress-bar');
    if (pb) pb.style.width = pct + '%';
}

function setTypeBadge(type) {
    const badge = document.getElementById('mix-type-badge');
    if (!badge) return;
    const cfg = TYPE_CONFIG[type] || {};
    badge.textContent    = cfg.label    || type;
    badge.className      = 'mix-type-badge ' + (cfg.badgeClass || '');
}

function playNextMix() {
    if (MIX.currentIndex >= MIX.queue.length) {
        showFinishScreen();
        return;
    }

    const step = MIX.queue[MIX.currentIndex];
    updateUnifiedProgress();
    hideAllSections();
    setTypeBadge(step.type);

    const sec = document.getElementById('mix-' + step.type);
    if (sec) {
        sec.style.display = 'flex';
        // trigger re-animation
        sec.classList.remove('ex-animate');
        void sec.offsetWidth;
        sec.classList.add('ex-animate');
    }

    switch (step.type) {
        case 'study':    loadMixStudy(step.item);    break;
        case 'flip':     loadMixFlip(step.item);     break;
        case 'quiz':     loadMixQuiz(step.item);     break;
        case 'scramble': loadMixScramble(step.item); break;
        case 'fill':     loadMixFill(step.item);     break;
        case 'write':    loadMixWrite(step.item);    break;
        case 'match':    loadMixMatch(step.items);   break;
    }
}

function mixStepComplete(delay = 0, requeueItem = false) {
    if (requeueItem) MIX.queue.push(MIX.queue[MIX.currentIndex]);
    MIX.currentIndex++;
    if (delay > 0) setTimeout(playNextMix, delay);
    else playNextMix();
}

// ── FEEDBACK BANNER helper ──
function showFeedback(containerId, iconId, titleId, subId, isCorrect, subText) {
    const box = document.getElementById(containerId);
    if (!box) return;
    box.className = 'duo-feedback show ' + (isCorrect ? 'fb-correct' : 'fb-wrong');
    const icon = document.getElementById(iconId);
    if (icon) icon.innerHTML = isCorrect ? '✨' : '💔';
    const title = document.getElementById(titleId);
    if (title) title.textContent = isCorrect ? 'Harika!' : 'Yanlış!';
    const sub = document.getElementById(subId);
    if (sub) sub.textContent = subText || '';
}
function hideFeedback(containerId) {
    const box = document.getElementById(containerId);
    if (box) box.className = 'duo-feedback';
}

// ── UTILS ──
function cleanStr(s) { return s.toLowerCase().replace(/[.,!?;:]/g, '').trim(); }
function getWrongOptions(correctStr, pool, count = 3) {
    let opts = pool.map(c => cleanStr(c.de)).filter(s => s !== cleanStr(correctStr) && s.length > 0);
    opts = [...new Set(opts)].sort(() => Math.random() - 0.5);
    return opts.slice(0, count);
}

// ══════════════════════════
//  STUDY
// ══════════════════════════
function loadMixStudy(item) {
    const deEl = document.getElementById('study-de');
    const trEl = document.getElementById('study-tr');
    const img  = document.getElementById('study-img');
    const imgWrap = document.getElementById('study-img-wrap');
    const trContainer = document.getElementById('study-tr-container');
    const actionRow   = document.getElementById('study-action-row');

    deEl.textContent = item.de;
    deEl.className   = 'premium-study-de' + (item.type === 'sentence' ? ' is-sentence' : '');
    trEl.textContent = item.tr;
    trEl.className   = 'premium-study-tr' + (item.type === 'sentence' ? ' is-sentence' : '');

    if (item.image) { 
        img.src = '/storage/' + item.image; 
        if (imgWrap) imgWrap.style.display = 'block';
        else img.style.display = 'block'; 
    } else { 
        if (imgWrap) imgWrap.style.display = 'none';
        else img.style.display = 'none'; 
    }

    trContainer.classList.remove('shown');
    actionRow.style.display = 'none';

    playItemAudio(item);
    setTimeout(() => {
        trContainer.classList.add('shown');
        actionRow.style.display = 'flex';
    }, 1100);
}

// ══════════════════════════
//  FLIP
// ══════════════════════════
function loadMixFlip(item) {
    document.getElementById('flip-de').textContent = item.de;
    document.getElementById('flip-tr').textContent = item.de;
    const backOrig = document.getElementById('flip-de-back');
    if (backOrig) backOrig.textContent = item.de;
    const container = document.getElementById('flip-card-container');
    container.classList.remove('flipped');
    playItemAudio(item);
}
function doMixFlip() {
    const container = document.getElementById('flip-card-container');
    container.classList.toggle('flipped');
}

// ══════════════════════════
//  QUIZ
// ══════════════════════════
function loadMixQuiz(item) {
    document.getElementById('quiz-tr').textContent = item.tr;
    const imgEl = document.getElementById('quiz-img');
    if (item.image) { imgEl.src = '/storage/' + item.image; imgEl.style.display = 'block'; }
    else            { imgEl.style.display = 'none'; }

    const LETTERS = ['A','B','C','D'];
    let wrong   = getWrongOptions(item.de, MIX.words, 3);
    let options = [item.de, ...wrong].sort(() => Math.random() - 0.5);

    const container = document.getElementById('quiz-options');
    container.innerHTML = '';
    options.forEach((opt, i) => {
        const btn = document.createElement('button');
        btn.className = 'duo-opt-btn';
        btn.innerHTML = `<span class="duo-opt-letter">${LETTERS[i]}</span><span>${opt}</span>`;
        btn.onclick = () => checkMixQuiz(btn, opt, item.de, options);
        container.appendChild(btn);
    });

    hideFeedback('quiz-feedback');
    playItemAudio(item);
}

function checkMixQuiz(btn, selected, correct, allOptions) {
    const isCorrect = cleanStr(selected) === cleanStr(correct);
    const item      = MIX.queue[MIX.currentIndex].item;

    document.querySelectorAll('.duo-opt-btn').forEach(b => b.disabled = true);

    if (isCorrect) {
        btn.classList.add('is-correct');
        MIX.correctCount++;
        MIX.xp += 10;
        showFeedback('quiz-feedback','quiz-fb-icon','quiz-fb-title','quiz-fb-sub', true, 'Devam et!');
        playItemAudio(item);
    } else {
        btn.classList.add('is-wrong');
        btn.classList.add('q-shake');
        MIX.wrongCount++;
        // highlight correct
        document.querySelectorAll('.duo-opt-btn').forEach(b => {
            const txt = b.querySelector('span:last-child')?.textContent || '';
            if (cleanStr(txt) === cleanStr(correct)) b.classList.add('is-correct');
            else if (b !== btn) b.classList.add('faded');
        });
        showFeedback('quiz-feedback','quiz-fb-icon','quiz-fb-title','quiz-fb-sub', false, 'Doğrusu: ' + correct);
        playItemAudio(item);
    }
}

// ══════════════════════════
//  SCRAMBLE
// ══════════════════════════
let scrPlaced = [], scrTarget = '';

function loadMixScramble(item) {
    document.getElementById('scramble-tr').textContent = item.tr;
    scrTarget = item.de;
    scrPlaced = [];

    const pool = document.getElementById('scramble-pool');
    pool.innerHTML = '';
    const words = item.de.split(' ').filter(w => w.trim()).sort(() => Math.random() - 0.5);
    words.forEach(w => {
        const chip = document.createElement('button');
        chip.className = 'duo-word-chip';
        chip.textContent = w;
        chip.onclick = () => placeScrWord(w, chip);
        pool.appendChild(chip);
    });

    renderScrTarget();
    hideFeedback('scramble-feedback');
    const actionRow = document.getElementById('scramble-action-row');
    if (actionRow) actionRow.style.display = 'flex';
    
    playItemAudio(item);
}

function placeScrWord(word, chip) {
    speakGerman(word);
    scrPlaced.push({ word, chip });
    chip.classList.add('used');
    renderScrTarget();
    updateDropZone();
}

function removeScrWord(idx) {
    scrPlaced[idx].chip.classList.remove('used');
    scrPlaced.splice(idx, 1);
    renderScrTarget();
    updateDropZone();
}

function updateDropZone() {
    const zone = document.getElementById('scramble-target');
    if (zone) zone.classList.toggle('has-words', scrPlaced.length > 0);
}

function renderScrTarget() {
    const area = document.getElementById('scramble-target');
    area.innerHTML = '';
    scrPlaced.forEach((p, i) => {
        const chip = document.createElement('button');
        chip.className = 'duo-word-chip placed';
        chip.textContent = p.word;
        chip.onclick = () => removeScrWord(i);
        area.appendChild(chip);
    });
}

function checkMixScramble() {
    const userStr = cleanStr(scrPlaced.map(p => p.word).join(' '));
    const tgtStr  = cleanStr(scrTarget);
    const item    = MIX.queue[MIX.currentIndex].item;

    if (userStr === tgtStr) {
        MIX.correctCount++;
        MIX.xp += 15;
        showFeedback('scramble-feedback','scr-fb-icon','scr-fb-title','scr-fb-sub', true, 'Mükemmel!');
        playItemAudio(item);
    } else {
        MIX.wrongCount++;
        showFeedback('scramble-feedback','scr-fb-icon','scr-fb-title','scr-fb-sub', false, 'Doğrusu: ' + scrTarget);
        playItemAudio(item);
    }
    
    const actionRow = document.getElementById('scramble-action-row');
    if (actionRow) actionRow.style.display = 'none';
}

// ══════════════════════════
//  FILL
// ══════════════════════════
let fillTarget = '';

function loadMixFill(item) {
    document.getElementById('fill-tr').textContent = item.tr;
    const words   = item.de.split(' ');
    let cands     = [];
    words.forEach((w, i) => { if (w.length > 2 && !w.match(/[.,!?]$/)) cands.push(i); });
    let blankIdx  = cands.length > 0 ? cands[Math.floor(Math.random() * cands.length)] : Math.floor(Math.random() * words.length);
    fillTarget    = words[blankIdx].replace(/[.,!?;]/g, '');

    const sEl = document.getElementById('fill-sentence');
    sEl.innerHTML = '';
    sEl.className = 'duo-fill-sentence';

    words.forEach((w, i) => {
        if (i === blankIdx) {
            const inp = document.createElement('input');
            inp.type  = 'text';
            inp.id    = 'fill-input-box';
            inp.className = 'duo-fill-input';
            inp.style.width = Math.max(60, fillTarget.length * 14 + 24) + 'px';
            inp.addEventListener('keydown', e => { if (e.key === 'Enter') checkMixFill(); });
            sEl.appendChild(inp);
            const punc = w.match(/[.,!?]$/) ? w.slice(-1) : '';
            if (punc) { const s = document.createElement('span'); s.textContent = punc; sEl.appendChild(s); }
        } else {
            const s = document.createElement('span');
            s.textContent = w + ' ';
            sEl.appendChild(s);
        }
    });

    let wrong   = getWrongOptions(fillTarget, MIX.sentences.length > 0 ? MIX.sentences : MIX.words, 3);
    let options = [fillTarget, ...wrong].sort(() => Math.random() - 0.5);

    const pool = document.getElementById('fill-pool');
    pool.innerHTML = '';
    options.forEach(opt => {
        const chip = document.createElement('button');
        chip.className = 'duo-word-chip';
        chip.textContent = opt;
        chip.onclick = () => {
            const inp = document.getElementById('fill-input-box');
            if (inp) inp.value = opt;
        };
        pool.appendChild(chip);
    });

    hideFeedback('fill-feedback');
    const actionRow = document.getElementById('fill-action-row');
    if (actionRow) actionRow.style.display = 'flex';
    
    playItemAudio(item);
    setTimeout(() => { const inp = document.getElementById('fill-input-box'); if(inp) inp.focus(); }, 300);
}

function checkMixFill() {
    const inp    = document.getElementById('fill-input-box');
    const userStr= cleanStr(inp ? inp.value : '');
    const tgtStr = cleanStr(fillTarget);
    const item   = MIX.queue[MIX.currentIndex].item;

    if (userStr === tgtStr) {
        if (inp) inp.classList.add('correct');
        MIX.correctCount++;
        MIX.xp += 15;
        showFeedback('fill-feedback','fill-fb-icon','fill-fb-title','fill-fb-sub', true, 'Doğru cevap!');
        playItemAudio(item);
    } else {
        if (inp) inp.classList.add('wrong');
        MIX.wrongCount++;
        showFeedback('fill-feedback','fill-fb-icon','fill-fb-title','fill-fb-sub', false, 'Doğrusu: ' + fillTarget);
    }
    if (inp) inp.disabled = true;
    
    const actionRow = document.getElementById('fill-action-row');
    if (actionRow) actionRow.style.display = 'none';
}

// ══════════════════════════
//  WRITE
// ══════════════════════════
function loadMixWrite(item) {
    document.getElementById('write-tr').textContent = item.tr;
    const imgEl = document.getElementById('write-img');
    if (item.image) { imgEl.src = '/storage/' + item.image; imgEl.style.display = 'block'; }
    else            { imgEl.style.display = 'none'; }

    const inp = document.getElementById('write-input-box');
    inp.value = '';
    inp.className = 'duo-write-box';
    inp.disabled = false;
    inp.onkeydown = e => { if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); checkMixWrite(); } };

    let wrong   = getWrongOptions(item.de, item.type === 'sentence' ? MIX.sentences : MIX.words, 3);
    let options = [item.de.trim(), ...wrong].sort(() => Math.random() - 0.5);

    const pool = document.getElementById('write-pool');
    pool.innerHTML = '';
    options.forEach(opt => {
        const chip = document.createElement('button');
        chip.className = 'duo-word-chip';
        chip.textContent = opt;
        chip.onclick = () => { inp.value = opt; };
        pool.appendChild(chip);
    });

    hideFeedback('write-feedback');
    const actionRow = document.getElementById('write-action-row');
    if (actionRow) actionRow.style.display = 'flex';
    
    playItemAudio(item);
    setTimeout(() => inp.focus(), 300);
}

function checkMixWrite() {
    const item   = MIX.queue[MIX.currentIndex].item;
    const inp    = document.getElementById('write-input-box');
    const userStr= cleanStr(inp.value);
    const tgtStr = cleanStr(item.de);

    inp.disabled = true;

    if (userStr === tgtStr) {
        inp.classList.add('correct');
        MIX.correctCount++;
        MIX.xp += 20;
        showFeedback('write-feedback','write-fb-icon','write-fb-title','write-fb-sub', true, 'Mükemmel yazma!');
        playItemAudio(item);
    } else {
        inp.classList.add('wrong');
        MIX.wrongCount++;
        showFeedback('write-feedback','write-fb-icon','write-fb-title','write-fb-sub', false, 'Doğrusu: ' + item.de);
        playItemAudio(item);
    }
    
    const actionRow = document.getElementById('write-action-row');
    if (actionRow) actionRow.style.display = 'none';
}

// ══════════════════════════
//  MATCH
// ══════════════════════════
const MIX_VISIBLE_PAIR_LIMIT = 5;
let mPairs = [], mSelDe = null, mSelTr = null, mAnim = false;

function loadMixMatch(items) {
    mPairs  = [...items].sort(() => Math.random() - 0.5);
    mSelDe  = null; mSelTr = null; mAnim = false;

    document.getElementById('match-col-tr').innerHTML = '';
    document.getElementById('match-col-de').innerHTML = '';
    fillMixMatchSlots(false);
}

function getVisibleMixPairCount() {
    return document.querySelectorAll('#match-col-tr .match-card:not(.matched)').length;
}

function fillMixMatchSlots(anim = true) {
    while (mPairs.length > 0 && getVisibleMixPairCount() < MIX_VISIBLE_PAIR_LIMIT) {
        addMatchPair(mPairs.shift(), anim);
    }
}

function addMatchPair(pair, anim) {
    const colTr = document.getElementById('match-col-tr');
    const colDe = document.getElementById('match-col-de');

    const tr = document.createElement('div');
    tr.className = 'match-card' + (anim ? ' fadeIn' : '');
    tr.dataset.id = pair.id; tr.dataset.side = 'tr';
    tr.textContent = pair.tr;
    tr.style.order = Math.floor(Math.random() * 1000);
    tr.onclick = () => handleMatchClick(tr);
    colTr.appendChild(tr);

    const de = document.createElement('div');
    de.className = 'match-card' + (anim ? ' fadeIn' : '');
    de.dataset.id = pair.id; de.dataset.side = 'de';
    de.textContent = pair.de;
    de.style.order = Math.floor(Math.random() * 1000);
    de.onclick = () => { playItemAudio(pair); handleMatchClick(de); };
    colDe.appendChild(de);
}

function handleMatchClick(card) {
    if (mAnim || card.classList.contains('matched') || card.classList.contains('selected')) return;
    card.classList.add('selected');
    if (card.dataset.side === 'tr') { if (mSelTr) mSelTr.classList.remove('selected'); mSelTr = card; }
    else                             { if (mSelDe) mSelDe.classList.remove('selected'); mSelDe = card; }
    if (mSelTr && mSelDe) checkMatch();
}

function checkMatch() {
    mAnim = true;
    if (mSelTr.dataset.id === mSelDe.dataset.id) {
        mSelTr.classList.remove('selected'); mSelDe.classList.remove('selected');
        mSelTr.classList.add('matched');     mSelDe.classList.add('matched');
        MIX.correctCount++;
        MIX.xp += 5;
        let a = new Audio('https://assets.mixkit.co/active_storage/sfx/1114/1114-preview.mp3');
        a.volume = 0.6; a.play().catch(() => {});

        setTimeout(() => {
            mSelTr.remove(); mSelDe.remove();
            mSelTr = null;   mSelDe = null; mAnim = false;
            fillMixMatchSlots(true);
            if (mPairs.length === 0 && document.querySelectorAll('#mix-match .match-card').length === 0) {
                let win = new Audio('https://assets.mixkit.co/active_storage/sfx/2000/2000-preview.mp3');
                win.play().catch(() => {});
                mixStepComplete(800);
            }
        }, 900);
    } else {
        mSelTr.classList.add('error'); mSelDe.classList.add('error');
        let a = new Audio('https://assets.mixkit.co/active_storage/sfx/2997/2997-preview.mp3');
        a.volume = 0.4; a.play().catch(() => {});
        setTimeout(() => {
            mSelTr.classList.remove('selected','error');
            mSelDe.classList.remove('selected','error');
            mSelTr = null; mSelDe = null; mAnim = false;
        }, 750);
    }
}

// ══════════════════════════
//  FINISH SCREEN
// ══════════════════════════
function showFinishScreen() {
    hideAllSections();
    const badge = document.getElementById('mix-type-badge');
    if (badge) badge.style.display = 'none';

    const fin = document.getElementById('mix-finish');
    fin.style.display = 'flex';

    const elapsed = Math.round((Date.now() - MIX.startTime) / 1000);
    const el_xp   = document.getElementById('finish-xp');
    const el_cor  = document.getElementById('finish-correct');
    const el_time = document.getElementById('finish-time');

    if (el_xp)   animateCount(el_xp,   0, MIX.xp,           1200);
    if (el_cor)  animateCount(el_cor,  0, MIX.correctCount,  1200);
    if (el_time) animateCount(el_time, 0, elapsed,           1200);

    const pb = document.getElementById('unified-progress-bar');
    if (pb) pb.style.width = '100%';

    launchConfetti();
}

function animateCount(el, from, to, duration) {
    const start = performance.now();
    function step(now) {
        const t   = Math.min((now - start) / duration, 1);
        const val = Math.round(from + (to - from) * easeOut(t));
        el.textContent = val;
        if (t < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
}
function easeOut(t) { return 1 - Math.pow(1 - t, 3); }

// ── CONFETTI ──
function launchConfetti() {
    const canvas = document.getElementById('finish-confetti');
    if (!canvas) return;
    const ctx   = canvas.getContext('2d');
    canvas.width  = window.innerWidth;
    canvas.height = window.innerHeight;

    const COLORS = ['#ffffff','#ffc800','#ff4b4b','#1cb0f6','#ce82ff','#ff9600'];
    const pieces = Array.from({length: 120}, () => ({
        x: Math.random() * canvas.width,
        y: Math.random() * -canvas.height,
        w: Math.random() * 10 + 6,
        h: Math.random() * 6 + 4,
        color: COLORS[Math.floor(Math.random() * COLORS.length)],
        vx: (Math.random() - 0.5) * 2,
        vy: Math.random() * 4 + 2,
        angle: Math.random() * 360,
        spin: (Math.random() - 0.5) * 6,
    }));

    let frame = 0;
    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        pieces.forEach(p => {
            ctx.save();
            ctx.translate(p.x, p.y);
            ctx.rotate(p.angle * Math.PI / 180);
            ctx.fillStyle = p.color;
            ctx.fillRect(-p.w/2, -p.h/2, p.w, p.h);
            ctx.restore();
            p.x += p.vx; p.y += p.vy; p.angle += p.spin;
        });
        frame++;
        if (frame < 200) requestAnimationFrame(draw);
        else ctx.clearRect(0, 0, canvas.width, canvas.height);
    }
    requestAnimationFrame(draw);
}
