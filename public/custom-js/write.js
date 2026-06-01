    let currentIdx = 0;

    function loadQuestion() {
        if (currentIdx >= ITEMS.length) {
            document.getElementById('game-area').style.display = 'none';
            document.getElementById('finish-area').style.display = 'block';
            return;
        }

        const q = ITEMS[currentIdx];
        document.getElementById('tr-text').innerText = q.tr;
        document.getElementById('progress-bar').style.width = ((currentIdx / ITEMS.length) * 100) + '%';
        
        const imgEl = document.getElementById('item-image');
        if (q.image) {
            imgEl.src = q.image;
            imgEl.style.display = 'block';
        } else {
            imgEl.style.display = 'none';
        }
        
        const input = document.getElementById('write-input');
        input.value = '';
        input.classList.remove('correct', 'wrong');
        input.disabled = false;
        
        let allOptions = ITEMS.map(item => item.de.trim());
        let targetStr = q.de.trim();
        allOptions = allOptions.filter(opt => opt.toLowerCase() !== targetStr.toLowerCase());
        allOptions = [...new Set(allOptions)].sort(() => Math.random() - 0.5);
        let wrongOptions = allOptions.slice(0, 3);
        let pool = [targetStr, ...wrongOptions].sort(() => Math.random() - 0.5);
        
        const poolEl = document.getElementById('word-pool');
        poolEl.innerHTML = '';
        pool.forEach(opt => {
            const btn = document.createElement('button');
            btn.className = 'word-btn';
            btn.innerText = opt;
            btn.onclick = () => {
                const input = document.getElementById('write-input');
                if (input) { input.value = opt; input.focus(); }
            };
            poolEl.appendChild(btn);
        });
        
        setTimeout(() => input.focus(), 100);

        document.getElementById('feedback-area').style.display = 'none';
        document.getElementById('check-btn').style.display = 'block';
        
        input.onkeypress = function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                checkAnswer();
            }
        };
    }

    function checkAnswer() {
        const q = ITEMS[currentIdx];
        const input = document.getElementById('write-input');
        
        const userStr = input.value.trim().toLowerCase().replace(/[.,!?;]/g, '');
        const targetStr = q.de.toLowerCase().replace(/[.,!?;]/g, '');

        input.disabled = true;

        const fbArea = document.getElementById('feedback-area');
        const fbBox = document.getElementById('feedback-box');
        const fbText = document.getElementById('fb-text');
        const fbSub = document.getElementById('fb-sub');
        
        fbArea.style.display = 'block';
        document.getElementById('check-btn').style.display = 'none';

        if (userStr === targetStr) {
            input.classList.add('correct');
            fbBox.className = 'feedback-box correct-fb';
            fbText.innerText = '✨ Harika!';
            fbSub.innerText = q.de;
            speakGerman(q.de);
        } else {
            input.classList.add('wrong');
            fbBox.className = 'feedback-box wrong-fb';
            fbText.innerText = '❌ Yanlış!';
            fbSub.innerText = 'Doğrusu: ' + q.de;
            speakGerman(q.de);
        }
    }

    function nextQuestion() {
        currentIdx++;
        loadQuestion();
    }

    window.onload = loadQuestion;
