    let currentIdx = 0;
    let targetWord = "";

    function loadQuestion() {
        if (currentIdx >= SENTENCES.length) {
            document.getElementById('game-area').style.display = 'none';
            document.getElementById('finish-area').style.display = 'block';
            return;
        }

        const q = SENTENCES[currentIdx];
        document.getElementById('tr-text').innerText = q.tr;
        document.getElementById('progress-bar').style.width = ((currentIdx / SENTENCES.length) * 100) + '%';
        
        const words = q.de.split(' ');
        let candidateIndexes = [];
        words.forEach((w, i) => {
            if (w.length > 2 && !w.match(/[.,!?]$/)) candidateIndexes.push(i);
        });
        
        let blankIdx = 0;
        if (candidateIndexes.length > 0) {
            blankIdx = candidateIndexes[Math.floor(Math.random() * candidateIndexes.length)];
        } else {
            blankIdx = Math.floor(Math.random() * words.length);
        }
        
        targetWord = words[blankIdx].replace(/[.,!?;]/g, '');
        
        const sentenceEl = document.getElementById('de-sentence');
        sentenceEl.innerHTML = '';
        
        words.forEach((w, i) => {
            if (i === blankIdx) {
                const input = document.createElement('input');
                input.type = 'text';
                input.className = 'fill-input';
                input.id = 'fill-input';
                input.autocomplete = 'off';
                let punctuation = w.match(/[.,!?]$/) ? w.slice(-1) : '';
                input.style.width = Math.max(60, targetWord.length * 15 + 20) + 'px';
                sentenceEl.appendChild(input);
                if (punctuation) {
                    const punctEl = document.createElement('span');
                    punctEl.innerText = punctuation;
                    sentenceEl.appendChild(punctEl);
                }
            } else {
                const span = document.createElement('span');
                span.innerText = w;
                sentenceEl.appendChild(span);
            }
        });
        
        let allWords = [];
        SENTENCES.forEach(s => {
            let ws = s.de.split(' ').map(w => w.replace(/[.,!?;]/g, ''));
            allWords.push(...ws);
        });
        allWords = allWords.filter(w => w.length > 1 && w.toLowerCase() !== targetWord.toLowerCase());
        allWords = [...new Set(allWords)].sort(() => Math.random() - 0.5);
        let wrongWords = allWords.slice(0, 3);
        let pool = [targetWord, ...wrongWords].sort(() => Math.random() - 0.5);
        
        const poolEl = document.getElementById('word-pool');
        poolEl.innerHTML = '';
        pool.forEach(w => {
            const btn = document.createElement('button');
            btn.className = 'word-btn';
            btn.innerText = w;
            btn.onclick = () => {
                const input = document.getElementById('fill-input');
                if (input) { input.value = w; input.focus(); }
            };
            poolEl.appendChild(btn);
        });

        setTimeout(() => {
            const input = document.getElementById('fill-input');
            if (input) input.focus();
        }, 100);

        document.getElementById('feedback-area').style.display = 'none';
        document.getElementById('check-btn').style.display = 'block';
        
        document.getElementById('fill-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') checkAnswer();
        });
    }

    function checkAnswer() {
        const q = SENTENCES[currentIdx];
        const input = document.getElementById('fill-input');
        const userStr = input.value.trim().toLowerCase();
        const expectedStr = targetWord.toLowerCase();

        const fbArea = document.getElementById('feedback-area');
        const fbBox = document.getElementById('feedback-box');
        const fbText = document.getElementById('fb-text');
        
        fbArea.style.display = 'block';
        document.getElementById('check-btn').style.display = 'none';

        if (userStr === expectedStr) {
            input.classList.add('correct');
            fbBox.className = 'feedback-box correct-fb';
            fbText.innerText = '✨ Harika! Doğru cevap.';
            speakGerman(q.de);
        } else {
            input.classList.add('wrong');
            fbBox.className = 'feedback-box wrong-fb';
            fbText.innerText = '❌ Yanlış! Doğrusu: ' + targetWord;
        }
    }

    function nextQuestion() {
        currentIdx++;
        loadQuestion();
    }

    window.onload = loadQuestion;
