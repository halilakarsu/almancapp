    let currentIdx = 0;
    let placedWords = [];

    function loadQuestion() {
        if (currentIdx >= SENTENCES.length) {
            document.getElementById('game-area').style.display = 'none';
            document.getElementById('finish-area').style.display = 'block';
            return;
        }

        const q = SENTENCES[currentIdx];
        document.getElementById('tr-text').innerText = q.tr;
        document.getElementById('progress-bar').style.width = ((currentIdx / SENTENCES.length) * 100) + '%';
        
        placedWords = [];
        const words = q.de.split(' ').filter(w => w.trim() !== '');
        const pool = [...words].sort(() => Math.random() - 0.5);

        const poolEl = document.getElementById('word-pool');
        poolEl.innerHTML = '';
        pool.forEach((w) => {
            const btn = document.createElement('button');
            btn.className = 'word-btn';
            btn.innerText = w;
            btn.onclick = () => placeWord(w, btn);
            poolEl.appendChild(btn);
        });

        document.getElementById('target-area').innerHTML = '';
        document.getElementById('feedback-area').style.display = 'none';
        document.getElementById('check-btn').style.display = 'block';
    }

    function placeWord(word, btn) {
        speakGerman(word);
        placedWords.push({word, btn});
        btn.classList.add('used');
        renderTarget();
    }

    function removeWord(idx) {
        const item = placedWords[idx];
        item.btn.classList.remove('used');
        placedWords.splice(idx, 1);
        renderTarget();
    }

    function renderTarget() {
        const targetEl = document.getElementById('target-area');
        targetEl.innerHTML = '';
        placedWords.forEach((item, i) => {
            const span = document.createElement('span');
            span.className = 'word-btn placed';
            span.innerText = item.word;
            span.onclick = () => removeWord(i);
            targetEl.appendChild(span);
        });
    }

    function checkAnswer() {
        const q = SENTENCES[currentIdx];
        const userStr = placedWords.map(i => i.word).join(' ').toLowerCase().replace(/[.,!?;]/g, '');
        const targetStr = q.de.toLowerCase().replace(/[.,!?;]/g, '');

        const fbArea = document.getElementById('feedback-area');
        const fbBox = document.getElementById('feedback-box');
        const fbText = document.getElementById('fb-text');
        
        fbArea.style.display = 'block';
        document.getElementById('check-btn').style.display = 'none';

        if (userStr === targetStr) {
            fbBox.className = 'feedback-box correct-fb';
            fbText.innerText = '✨ Harika! Doğru cümle.';
            speakGerman(q.de);
        } else {
            fbBox.className = 'feedback-box wrong-fb';
            fbText.innerText = '❌ Yanlış! Doğrusu: ' + q.de;
        }
    }

    function nextQuestion() {
        currentIdx++;
        loadQuestion();
    }

    window.onload = loadQuestion;
