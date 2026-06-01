    let quizWords  = [];
    let currentIdx = 0;
    let answered   = false;
    let xp         = 0;
    let combo      = 0;
    const audioCtx = new (window.AudioContext || window.webkitAudioContext)();

    // ── QUIZ ─────────────────────────────────────────────
    function startQuiz() {
        if (audioCtx.state === 'suspended') audioCtx.resume();
        quizWords  = [...ALL_WORDS].sort(() => Math.random() - 0.5);
        currentIdx = 0; xp = 0; combo = 0;
        document.getElementById('xp-val').innerText = 0;
        document.getElementById('wq-complete').classList.remove('show');
        document.getElementById('quiz-wrapper').style.display   = 'flex';
        document.getElementById('quiz-feedback').className      = 'quiz-feedback';
        renderQuestion();
        document.getElementById('word-section').scrollIntoView({ behavior: 'smooth' });
    }

    function renderQuestion() {
        if (currentIdx >= quizWords.length) { showComplete(); return; }
        answered = false;
        document.getElementById('quiz-feedback').className = 'quiz-feedback';

        const word  = quizWords[currentIdx];
        const total = quizWords.length;

        document.getElementById('wq-counter').textContent      = `${currentIdx + 1} / ${total}`;
        document.getElementById('wq-progress-bar').style.width = `${(currentIdx / total) * 100}%`;

        const qw = document.getElementById('wq-question');
        const qImg = document.getElementById('wq-image');
        
        qw.style.animation = 'none';
        qImg.style.animation = 'none';
        void qw.offsetWidth;
        
        qw.textContent = word.de; // Ask in German
        
        if (word.image) {
            qImg.src = word.image;
            qImg.style.display = 'block';
            qImg.style.animation = 'qSlideUp 0.3s ease';
        } else {
            qImg.style.display = 'none';
        }
        
        qw.style.animation = 'qSlideUp 0.3s ease';
        
        // Auto play audio for the German word
        setTimeout(() => speakGerman(word.de), 150);

        const wrongs  = ALL_WORDS.filter(w => w.tr !== word.tr).sort(() => Math.random() - 0.5).slice(0, 3);
        const choices = [{ ...word, correct: true }, ...wrongs.map(w => ({ ...w, correct: false }))].sort(() => Math.random() - 0.5);

        const container = document.getElementById('wq-choices');
        container.innerHTML = '';
        choices.forEach((choice, i) => {
            const btn      = document.createElement('button');
            btn.className  = 'quiz-choice';
            btn.innerHTML  = `<span class="quiz-badge">${LABELS[i]}</span><span>${choice.tr}</span>`; // Options in Turkish
            btn.onclick    = () => handleAnswer(btn, choice.correct, word.tr); // Pass correct Turkish meaning
            container.appendChild(btn);
        });
    }

    function handleAnswer(btn, isCorrect, correctAns) {
        if (answered) return;
        answered = true;

        document.querySelectorAll('.quiz-choice').forEach(b => {
            b.disabled = true;
            if (b !== btn) b.classList.add('faded');
        });

        const fb    = document.getElementById('quiz-feedback');
        const label = document.getElementById('qf-label');
        const sub   = document.getElementById('qf-sub');
        const icon  = document.getElementById('qf-icon');

        if (isCorrect) {
            combo++;
            const earned = 10 + (combo > 1 ? combo * 2 : 0);
            xp += earned;
            document.getElementById('xp-val').innerText = xp;
            const xpEl = document.getElementById('quiz-xp');
            xpEl.classList.add('bump');
            setTimeout(() => xpEl.classList.remove('bump'), 200);

            if (combo > 1) showComboPopup(btn, `🔥 x${combo}`);

            playTone(600,'sine',0.1,0.1);
            setTimeout(() => playTone(800,'sine',0.2,0.15), 100);

            btn.classList.add('is-correct');
            btn.querySelector('.quiz-badge').innerHTML = '<i class="bi bi-check-lg"></i>';
            createPopEffect(btn);

            const praises = ['Harika!', 'Mükemmel!', 'Çok İyi!', 'Süper!', 'Bravo!'];
            label.innerText = praises[Math.floor(Math.random() * praises.length)];
            sub.innerText   = `+${earned} XP`;
            icon.innerHTML  = '<i class="bi bi-check-lg"></i>';
            fb.className    = 'quiz-feedback show qf-correct';
            document.getElementById('wq-progress-bar').style.width = `${((currentIdx + 1) / quizWords.length) * 100}%`;
            document.getElementById('qf-next-btn').focus();

        } else {
            combo = 0;
            playTone(150,'sawtooth',0.3,0.2);

            const qcard = document.getElementById('quiz-question-card');
            qcard.classList.remove('q-shake');
            void qcard.offsetWidth;
            qcard.classList.add('q-shake');

            btn.classList.add('is-wrong');
            btn.querySelector('.quiz-badge').innerHTML = '<i class="bi bi-x-lg"></i>';

            document.querySelectorAll('.quiz-choice').forEach(b => {
                const txt = b.querySelectorAll('span')[1];
                if (txt && txt.textContent.trim() === correctAns.trim()) {
                    b.classList.remove('faded');
                    b.classList.add('is-correct');
                }
            });

            label.innerHTML = `Doğru Cevap: <strong>${correctAns}</strong>`;
            sub.innerText   = 'Bir sonraki kelimeye geç';
            icon.innerHTML  = '<i class="bi bi-x-lg"></i>';
            fb.className    = 'quiz-feedback show qf-wrong';
            document.getElementById('qf-next-btn').focus();
        }
    }

    function nextQuestion() {
        document.getElementById('quiz-feedback').className = 'quiz-feedback';
        currentIdx++;
        setTimeout(() => renderQuestion(), 150);
    }

    // ── SECTION TOGGLE ───────────────────────────────────
    function hideSections() {
        const els = {
            'action-grid': 'grid',
            '.app-header-card': 'block',
            'back-btn-top': 'flex',
            'word-section': 'none',
            'cards-section': 'none',
            'scramble-section': 'none',
            'test-cta': 'block'
        };
        for (const [key, val] of Object.entries(els)) {
            const el = key.startsWith('.') ? document.querySelector(key) : document.getElementById(key);
            if (el) el.style.display = val;
        }
    }

    function showSection(id) {
        hideSections();
        const actionGrid = document.getElementById('action-grid');
        if (actionGrid) actionGrid.style.display = 'none';
        
        const headerCard = document.querySelector('.app-header-card');
        if (headerCard) headerCard.style.display = 'none';
        
        const backBtn = document.getElementById('back-btn-top');
        if (backBtn) backBtn.style.display = 'none';
        
        const tc = document.getElementById('test-cta');
        if (tc) tc.style.display = 'none';
        
        let targetId = id;
        if (id === 'words') targetId = 'word-section';
        if (id === 'cards') targetId = 'cards-section';
        
        const targetEl = document.getElementById(targetId);
        if (targetEl) targetEl.style.display = 'block';
        
        if (id === 'words') {
            startQuiz();
        }
        
        // Auto play audio if opening cards section
        if (targetId === 'cards-section') {
            setTimeout(() => autoPlayCurrentCard(), 500);
        }
    }

    function playTone(freq, type, duration, vol = 0.1) {
        if (audioCtx.state === 'suspended') audioCtx.resume();
        const osc  = audioCtx.createOscillator();
        const gain = audioCtx.createGain();
        osc.type = type;
        osc.frequency.setValueAtTime(freq, audioCtx.currentTime);
        gain.gain.setValueAtTime(vol, audioCtx.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.01, audioCtx.currentTime + duration);
        osc.connect(gain); gain.connect(audioCtx.destination);
        osc.start(); osc.stop(audioCtx.currentTime + duration);
    }

    function createPopEffect(element) {
        const rect = element.getBoundingClientRect();
        for (let i = 0; i < 20; i++) {
            const p    = document.createElement('div');
            p.className = 'pop-particle';
            p.style.left = (rect.left + rect.width  / 2) + 'px';
            p.style.top  = (rect.top  + rect.height / 2) + 'px';
            const angle = Math.random() * Math.PI * 2;
            const dist  = 60 + Math.random() * 100;
            p.style.setProperty('--tx', (Math.cos(angle) * dist) + 'px');
            p.style.setProperty('--ty', (Math.sin(angle) * dist) + 'px');
            p.style.setProperty('--color', ['#10b981','#34d399','#fbbf24','#38bdf8','#a78bfa'][Math.floor(Math.random() * 5)]);
            document.body.appendChild(p);
            setTimeout(() => p.remove(), 700);
        }
    }

    function showComboPopup(btn, text) {
        const rect = btn.getBoundingClientRect();
        const el   = document.createElement('div');
        el.className = 'combo-text';
        el.innerText = text;
        el.style.left = (rect.left + rect.width / 2 - 40) + 'px';
        el.style.top  = (rect.top - 20) + 'px';
        document.body.appendChild(el);
        setTimeout(() => el.remove(), 1000);
    }

    function showComplete() {
        document.getElementById('quiz-wrapper').style.display = 'none';
        document.getElementById('wq-complete').classList.add('show');
        playTone(500,'sine',0.1,0.1);
        setTimeout(() => playTone(650,'sine',0.15,0.12), 120);
        setTimeout(() => playTone(800,'sine',0.3,0.15),  260);
    }

    function playAudio(id) {
        const audio = document.getElementById(id);
        if (audio) {
            audio.currentTime = 0;
            audio.play().catch(e => {
                // If audio fails or source is empty, try TTS
                const cardItem = audio.closest('.card-item');
                const text = cardItem.querySelector('.fc-de').innerText;
                speakGerman(text);
            });
        }
    }



    /* ── CARD SLIDESHOW NAV ── */
    let currentCardIndex = 0;
    const totalCards = TOTAL_CARDS;

    function autoPlayCurrentCard() {
        const currentCard = document.querySelectorAll('.card-item')[currentCardIndex];
        const audio = currentCard.querySelector('audio');
        if (audio && audio.src && !audio.src.endsWith('#')) {
            playAudio(audio.id);
        } else {
            const text = currentCard.querySelector('.fc-de').innerText;
            speakGerman(text);
        }
    }

    function navCard(dir) {
        const newIndex = currentCardIndex + dir;
        if (newIndex < 0 || newIndex >= totalCards) return;

        // Hide old, show new
        const cards = document.querySelectorAll('.card-item');
        cards[currentCardIndex].classList.remove('active');
        
        // Reset flip on the card we leave
        const oldFlip = cards[currentCardIndex].querySelector('.flashcard');
        if (oldFlip) oldFlip.classList.remove('flipped');

        currentCardIndex = newIndex;
        cards[currentCardIndex].classList.add('active');

        // Update UI
        document.getElementById('current-card-idx').textContent = currentCardIndex + 1;
        document.getElementById('prev-card-btn').disabled = currentCardIndex === 0;
        document.getElementById('next-card-btn').disabled = currentCardIndex === totalCards - 1;

        // AUTO PLAY NEW CARD
        setTimeout(() => autoPlayCurrentCard(), 300);
    }
