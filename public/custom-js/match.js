    const VISIBLE_PAIR_LIMIT = 5;
    
    let pairQueue = [];
    let completedPairs = 0;
    const totalPairs = allPairs.length;

    let selectedTr = null;
    let selectedDe = null;
    let isAnimating = false;



    function updateProgress() {
        const percentage = (completedPairs / totalPairs) * 100;
        document.getElementById('progress-bar').style.width = percentage + '%';
    }

    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    function loadInitialGame() {
        pairQueue = shuffleArray([...allPairs]);
        
        const colTr = document.getElementById('col-tr');
        const colDe = document.getElementById('col-de');
        colTr.innerHTML = '';
        colDe.innerHTML = '';

        fillOpenSlots(false);
    }

    function getVisiblePairCount() {
        return document.querySelectorAll('#col-tr .match-card:not(.matched)').length;
    }

    function fillOpenSlots(animate = true) {
        while (pairQueue.length > 0 && getVisiblePairCount() < VISIBLE_PAIR_LIMIT) {
            addNewPairToBoard(pairQueue.shift(), animate);
        }
    }

    function addNewPairToBoard(pair, animate = true) {
        const colTr = document.getElementById('col-tr');
        const colDe = document.getElementById('col-de');

        let trCard = document.createElement('div');
        trCard.className = 'match-card' + (animate ? ' fadeIn' : '');
        trCard.dataset.id = pair.id;
        trCard.dataset.side = 'tr';
        trCard.innerHTML = `<span class="card-content">${pair.tr}</span>`;
        trCard.style.order = Math.floor(Math.random() * 1000); // Shuffle visual order
        trCard.onclick = () => handleCardClick(trCard);
        colTr.appendChild(trCard);

        let deCard = document.createElement('div');
        deCard.className = 'match-card' + (animate ? ' fadeIn' : '');
        deCard.dataset.id = pair.id;
        deCard.dataset.side = 'de';
        deCard.innerHTML = `<span class="card-content">${pair.de}</span>`;
        deCard.style.order = Math.floor(Math.random() * 1000); // Shuffle visual order
        deCard.onclick = () => {
            speakGerman(pair.de);
            handleCardClick(deCard);
        };
        colDe.appendChild(deCard);

        if(animate) {
            setTimeout(() => {
                if(trCard) trCard.classList.remove('fadeIn');
                if(deCard) deCard.classList.remove('fadeIn');
            }, 1000);
        }
    }

    function handleCardClick(card) {
        if (isAnimating || card.classList.contains('matched') || card.classList.contains('selected')) return;

        card.classList.add('selected');

        if (card.dataset.side === 'tr') {
            if (selectedTr) {
                selectedTr.classList.remove('selected');
            }
            selectedTr = card;
        } else {
            if (selectedDe) {
                selectedDe.classList.remove('selected');
            }
            selectedDe = card;
        }

        if (selectedTr && selectedDe) {
            checkMatch();
        }
    }

    async function checkMatch() {
        isAnimating = true;

        // Ses bitene kadar bekle (Kadın konuşsun sonra işlem yapılsın)
        if (window.speechSynthesis.speaking) {
            await new Promise(resolve => {
                const checkInterval = setInterval(() => {
                    if (!window.speechSynthesis.speaking) {
                        clearInterval(checkInterval);
                        resolve();
                    }
                }, 100);
            });
        }

        if (selectedTr.dataset.id === selectedDe.dataset.id) {
            // Correct match
            selectedTr.classList.remove('selected');
            selectedDe.classList.remove('selected');
            
            selectedTr.classList.add('matched');
            selectedDe.classList.add('matched');

            // Play chic pop/bubble sound
            let audio = new Audio('https://assets.mixkit.co/active_storage/sfx/1114/1114-preview.mp3'); 
            audio.volume = 0.6;
            audio.play().catch(e => console.log(e));

            completedPairs++;
            updateProgress();

            setTimeout(() => {
                // Remove from DOM to clear space after animation finishes
                selectedTr.remove();
                selectedDe.remove();
                
                selectedTr = null;
                selectedDe = null;
                isAnimating = false;

                fillOpenSlots(true);

                // Check if all clear
                if (pairQueue.length === 0 && document.querySelectorAll('.match-card').length === 0) {
                    document.getElementById('game-container').style.display = 'none';
                    document.getElementById('finish-screen').style.display = 'flex';
                    
                    // Play success win sound
                    let winSound = new Audio('https://assets.mixkit.co/active_storage/sfx/2000/2000-preview.mp3');
                    winSound.play().catch(e => console.log(e));
                }
            }, 1000); // Wait for slow fadeMatch animation (1s)

        } else {
            // Wrong match
            selectedTr.classList.remove('selected');
            selectedDe.classList.remove('selected');

            selectedTr.classList.add('error');
            selectedDe.classList.add('error');

            // Play wrong buzz sound
            let audio = new Audio('https://assets.mixkit.co/active_storage/sfx/2997/2997-preview.mp3');
            audio.volume = 0.4;
            audio.play().catch(e => console.log(e));

            setTimeout(() => {
                selectedTr.classList.remove('error');
                selectedDe.classList.remove('error');
                
                selectedTr = null;
                selectedDe = null;
                isAnimating = false;
            }, 800); // Hafıza oyununda kartların 0.8 saniye açık kalmasına izin ver
        }
    }

    // Initialize Game
    window.onload = () => {
        loadInitialGame();
    };
