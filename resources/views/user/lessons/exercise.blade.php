@extends('layouts.user')
@section('title', 'Alıştırma: ' . $lesson->lesson_title)
@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet">

<style>
* { font-family: 'Poppins', sans-serif; box-sizing: border-box; }

/* ── LAYOUT ─────────────────────────────────────── */
.ex-page {
    max-width: 640px;
    margin: 0 auto;
    padding-bottom: 60px;
}

/* ── TOP BAR ─────────────────────────────────────── */
.ex-topbar {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 32px;
}
.ex-close {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: #fff;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    color: #64748b;
    cursor: pointer;
    text-decoration: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.06);
    flex-shrink: 0;
    transition: background 0.2s;
}
.ex-close:hover { background: #f8fafc; }

.ex-progress-wrap {
    flex: 1;
    height: 12px;
    background: #e2e8f0;
    border-radius: 99px;
    overflow: hidden;
}
.ex-progress-bar {
    height: 100%;
    background: linear-gradient(90deg, #22c55e, #16a34a);
    border-radius: 99px;
    transition: width 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}
.ex-counter {
    font-size: 0.9rem;
    font-weight: 700;
    color: #94a3b8;
    flex-shrink: 0;
    min-width: 44px;
    text-align: right;
}

/* ── HEARTS ──────────────────────────────────────── */
.ex-hearts {
    display: flex;
    gap: 4px;
    justify-content: center;
    margin-bottom: 28px;
}
.ex-hearts span {
    font-size: 1.5rem;
    transition: all 0.3s;
}

/* ── QUESTION CARD ───────────────────────────────── */
.ex-card {
    background: #ffffff;
    border-radius: 28px;
    padding: 40px 36px 36px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.05);
    border: 1px solid #f1f5f9;
    margin-bottom: 28px;
    animation: slideUp 0.35s ease;
}
@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

.ex-label {
    font-size: 0.85rem;
    font-weight: 700;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 16px;
}
.ex-question {
    font-size: 2rem;
    font-weight: 900;
    color: #0f172a;
    line-height: 1.3;
    letter-spacing: -0.5px;
}

/* ── CHOICES ─────────────────────────────────────── */
.ex-choices {
    display: flex;
    flex-direction: column;
    gap: 14px;
    margin-bottom: 24px;
}
.ex-choice {
    background: #fff;
    border: 2.5px solid #e2e8f0;
    border-radius: 18px;
    padding: 18px 22px;
    font-size: 1.1rem;
    font-weight: 700;
    color: #1e293b;
    cursor: pointer;
    text-align: left;
    transition: all 0.18s ease;
    display: flex;
    align-items: center;
    gap: 14px;
    width: 100%;
}
.ex-choice:hover:not(:disabled) {
    border-color: #818cf8;
    background: #f5f3ff;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(99,102,241,0.12);
}
.ex-choice.correct {
    border-color: #22c55e;
    background: #FEF9C3;
    color: #854D0E;
}
.ex-choice.wrong {
    border-color: #ef4444;
    background: #fef2f2;
    color: #b91c1c;
}
.ex-choice:disabled { cursor: default; transform: none; }
.ex-choice-letter {
    width: 34px;
    height: 34px;
    border-radius: 10px;
    background: #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    font-weight: 900;
    flex-shrink: 0;
    transition: background 0.18s;
}
.ex-choice.correct .ex-choice-letter { background: #FEF9C3; color: #854D0E; }
.ex-choice.wrong   .ex-choice-letter { background: #fee2e2; color: #b91c1c; }

/* ── FEEDBACK BAR ────────────────────────────────── */
.ex-feedback {
    border-radius: 20px;
    padding: 20px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 20px;
    display: none;
    animation: slideUp 0.25s ease;
}
.ex-feedback.show { display: flex; }
.ex-feedback.correct-fb {
    background: #FEF9C3;
    border: 2px solid #bbf7d0;
}
.ex-feedback.wrong-fb {
    background: #fef2f2;
    border: 2px solid #fecaca;
}
.ex-feedback-text { flex: 1; }
.ex-feedback-text .fb-title {
    font-size: 1rem;
    font-weight: 900;
    margin-bottom: 4px;
}
.ex-feedback.correct-fb .fb-title { color: #854D0E; }
.ex-feedback.wrong-fb   .fb-title { color: #b91c1c; }
.ex-feedback-text .fb-answer {
    font-size: 0.95rem;
    font-weight: 600;
    color: #475569;
}
.ex-feedback-icon {
    font-size: 2.5rem;
    flex-shrink: 0;
}

/* ── NEXT BUTTON ─────────────────────────────────── */
.ex-btn {
    width: 100%;
    padding: 18px;
    border-radius: 18px;
    border: none;
    font-size: 1.1rem;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.2s ease;
    display: none;
}
.ex-btn.show { display: block; }
.ex-btn.correct-btn {
    background: linear-gradient(135deg, #22c55e, #16a34a);
    color: #fff;
    box-shadow: 0 8px 20px rgba(34,197,94,0.3);
}
.ex-btn.wrong-btn {
    background: linear-gradient(135deg, #ef4444, #b91c1c);
    color: #fff;
    box-shadow: 0 8px 20px rgba(239,68,68,0.3);
}
.ex-btn:hover { transform: translateY(-2px); }
.ex-btn:active { transform: scale(0.97); }

/* ── COMPLETION SCREEN ───────────────────────────── */
.ex-complete {
    display: none;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 50px 30px;
    background: #fff;
    border-radius: 32px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.05);
    animation: slideUp 0.4s ease;
}
.ex-complete.show { display: flex; }
.ex-complete-emoji { font-size: 5rem; margin-bottom: 20px; }
.ex-complete h2 {
    font-size: 2.2rem;
    font-weight: 900;
    color: #0f172a;
    margin-bottom: 12px;
}
.ex-complete p {
    font-size: 1.1rem;
    color: #64748b;
    font-weight: 500;
    margin-bottom: 36px;
}
.ex-stats {
    display: flex;
    gap: 24px;
    margin-bottom: 40px;
    flex-wrap: wrap;
    justify-content: center;
}
.ex-stat {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    padding: 20px 28px;
    text-align: center;
}
.ex-stat .stat-num {
    font-size: 2rem;
    font-weight: 900;
    color: #0f172a;
}
.ex-stat .stat-lbl {
    font-size: 0.85rem;
    font-weight: 700;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.ex-complete-btns {
    display: flex;
    flex-direction: column;
    gap: 12px;
    width: 100%;
}
.btn-retry {
    background: linear-gradient(135deg, #22c55e, #16a34a);
    color: #fff;
    border: none;
    border-radius: 16px;
    padding: 16px;
    font-size: 1.1rem;
    font-weight: 800;
    cursor: pointer;
    text-decoration: none;
    display: block;
    transition: transform 0.2s;
}
.btn-retry:hover { transform: translateY(-2px); color: #fff; }
.btn-back-lesson {
    background: #f1f5f9;
    color: #475569;
    border: none;
    border-radius: 16px;
    padding: 16px;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    text-decoration: none;
    display: block;
    transition: background 0.2s;
}
.btn-back-lesson:hover { background: #e2e8f0; color: #334155; }
</style>

@php
    $cards = $cards->toArray();
    $total = count($cards);
@endphp

<div class="ex-page">

    {{-- TOP BAR --}}
    <div class="ex-topbar">
        <a href="{{ route('user.lesson.show', $lesson->id) }}" class="ex-close">
            <i class="bi bi-x-lg"></i>
        </a>
        <div class="ex-progress-wrap">
            <div class="ex-progress-bar" id="progressBar" style="width: 0%;"></div>
        </div>
        <div class="ex-counter" id="counter">0 / {{ $total }}</div>
    </div>

   
    
    {{-- QUIZ AREA --}}
    <div id="quizArea">
        <div class="ex-card" id="questionCard">
            <div class="ex-label">Türkçesi nedir?</div>
            <div class="ex-question" id="questionText"></div>
        </div>

        <div class="ex-choices" id="choicesContainer"></div>

        <div class="ex-feedback" id="feedbackBar">
            <div class="ex-feedback-text">
                <div class="fb-title" id="fbTitle"></div>
                <div class="fb-answer" id="fbAnswer"></div>
            </div>
            <div class="ex-feedback-icon" id="fbIcon"></div>
        </div>

        <button class="ex-btn" id="nextBtn" onclick="nextCard()"></button>
    </div>

    {{-- COMPLETION SCREEN --}}
    <div class="ex-complete" id="completeScreen">
        <div class="ex-complete-emoji">🏆</div>
        <h2>Harika İş!</h2>
        <p>Dersi başarıyla tamamladın. Almancada bir adım daha ilerledin!</p>

        <div class="ex-stats">
            <div class="ex-stat">
                <div class="stat-num" id="statTotal">0</div>
                <div class="stat-lbl">Toplam Soru</div>
            </div>
            <div class="ex-stat">
                <div class="stat-num" id="statCorrect" style="color:#22c55e;">0</div>
                <div class="stat-lbl">Doğru</div>
            </div>
            <div class="ex-stat">
                <div class="stat-num" id="statWrong" style="color:#ef4444;">0</div>
                <div class="stat-lbl">Yanlış</div>
            </div>
        </div>

        <div class="ex-complete-btns">
            <button class="btn-retry" onclick="restartQuiz()">🔄 Tekrar Çöz</button>
            <a href="{{ route('user.lesson.show', $lesson->id) }}" class="btn-back-lesson">← Derse Dön</a>
        </div>
    </div>

</div>

<script>
const CARDS   = @json($cards);
const TOTAL   = CARDS.length;
const LETTERS = ['A', 'B', 'C', 'D'];

let current    = 0;
let hearts     = 3;
let correctCnt = 0;
let wrongCnt   = 0;
let answered   = false;

function renderCard() {
    if (current >= TOTAL) {
        showComplete();
        return;
    }

    answered = false;
    const card = CARDS[current];

    document.getElementById('questionText').textContent = card.question;
    document.getElementById('counter').textContent = `${current} / ${TOTAL}`;
    document.getElementById('progressBar').style.width = `${(current / TOTAL) * 100}%`;

    // Choices
    const container = document.getElementById('choicesContainer');
    container.innerHTML = '';
    card.choices.forEach((choice, i) => {
        const btn = document.createElement('button');
        btn.className = 'ex-choice';
        btn.innerHTML = `<span class="ex-choice-letter">${LETTERS[i]}</span><span>${choice}</span>`;
        btn.onclick = () => handleAnswer(choice, card.answer, btn);
        container.appendChild(btn);
    });

    // Reset feedback & next btn
    const fb  = document.getElementById('feedbackBar');
    const nb  = document.getElementById('nextBtn');
    fb.className  = 'ex-feedback';
    nb.className  = 'ex-btn';

    // Card pop animation
    const qCard = document.getElementById('questionCard');
    qCard.style.animation = 'none';
    qCard.offsetHeight;
    qCard.style.animation = 'slideUp 0.35s ease';
}

function handleAnswer(chosen, correct, btn) {
    if (answered) return;
    answered = true;

    // Disable all buttons
    document.querySelectorAll('.ex-choice').forEach(b => b.disabled = true);

    const fb   = document.getElementById('feedbackBar');
    const nb   = document.getElementById('nextBtn');
    const fbT  = document.getElementById('fbTitle');
    const fbA  = document.getElementById('fbAnswer');
    const fbI  = document.getElementById('fbIcon');

    const isCorrect = chosen === correct;

    if (isCorrect) {
        correctCnt++;
        btn.classList.add('correct');
        fb.className  = 'ex-feedback correct-fb show';
        fbT.textContent = '✨ Harika!';
        fbA.textContent = correct;
        fbI.textContent = '🎉';
        nb.className  = 'ex-btn correct-btn show';
        nb.textContent = 'Devam Et →';
        nb.onclick     = nextCard;
    } else {
        wrongCnt++;
        loseHeart();
        btn.classList.add('wrong');
        // Show correct answer
        document.querySelectorAll('.ex-choice').forEach(b => {
            if (b.querySelector('span:last-child').textContent === correct)
                b.classList.add('correct');
        });
        fb.className  = 'ex-feedback wrong-fb show';
        fbT.textContent = '❌ Yanlış!';
        fbA.textContent = `Doğru cevap: ${correct}`;
        fbI.textContent = '💡';
        nb.className  = 'ex-btn wrong-btn show';
        nb.textContent = 'Anladım';
        nb.onclick     = nextCard;
    }
}

function nextCard() {
    current++;
    renderCard();
}

function loseHeart() {
    hearts = Math.max(0, hearts - 1);
    const spans = document.querySelectorAll('#hearts span');
    if (spans[hearts]) spans[hearts].textContent = '🖤';
}

function showComplete() {
    document.getElementById('quizArea').style.display = 'none';
    const screen = document.getElementById('completeScreen');
    screen.classList.add('show');
    document.getElementById('statTotal').textContent   = TOTAL;
    document.getElementById('statCorrect').textContent = correctCnt;
    document.getElementById('statWrong').textContent   = wrongCnt;
    document.getElementById('progressBar').style.width = '100%';
    document.getElementById('counter').textContent     = `${TOTAL} / ${TOTAL}`;
}

function restartQuiz() {
    // Fisher-Yates shuffle
    for (let i = CARDS.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [CARDS[i], CARDS[j]] = [CARDS[j], CARDS[i]];
    }
    current    = 0;
    hearts     = 3;
    correctCnt = 0;
    wrongCnt   = 0;
    answered   = false;
    // Reset hearts
    document.querySelectorAll('#hearts span').forEach(s => s.textContent = '❤️');
    document.getElementById('quizArea').style.display = 'block';
    document.getElementById('completeScreen').classList.remove('show');
    renderCard();
}

// Start
if (TOTAL > 0) {
    renderCard();
} else {
    document.getElementById('quizArea').innerHTML = `
        <div style="text-align:center;padding:60px 20px;background:#fff;border-radius:28px;box-shadow:0 8px 30px rgba(0,0,0,0.05)">
            <div style="font-size:4rem;margin-bottom:16px">📭</div>
            <h2 style="font-weight:900;color:#0f172a;margin-bottom:8px">İçerik Yok</h2>
            <p style="color:#64748b;font-weight:500">Bu ders için henüz alıştırma eklenmemiş.</p>
            <a href="{{ route('user.lesson.show', $lesson->id) }}" style="display:inline-block;margin-top:24px;background:#FF3333;color:#fff;padding:14px 28px;border-radius:14px;font-weight:700;text-decoration:none;">← Derse Dön</a>
        </div>
    `;
}
</script>

@endsection
