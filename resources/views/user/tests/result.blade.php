@extends('layouts.user')
@section('title', 'Sınav Sonucu')
@section('content')

<a href="{{ route('user.lesson.show', $test->lesson_id) }}" class="btn-back">
    <i class="bi bi-arrow-left"></i> Derse Dön
</a>

<style>
    .result-banner {
        padding: 50px;
        border-radius: 24px;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 40px;
        color: white;
    }
    .result-banner.success {
        background: var(--green);
        box-shadow: 0 6px 0 var(--green-dark);
    }
    .result-banner.fail {
        background: var(--orange);
        box-shadow: 0 6px 0 var(--orange-dark);
    }
    .result-banner h1 {
        font-size: 3rem;
        font-weight: 900;
        margin-bottom: 10px;
    }
    .result-banner p {
        font-size: 1.2rem;
        font-weight: 700;
        opacity: 0.9;
    }
    
    .question-review {
        background: var(--white);
        border: 2px solid var(--gray-border);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 20px;
    }
    .q-text {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--text-main);
        margin-bottom: 20px;
    }
    .status-badge {
        display: inline-block;
        padding: 5px 15px;
        border-radius: 10px;
        font-weight: 900;
        margin-bottom: 15px;
    }
    .status-badge.correct { background: #dcfce7; color: var(--green-dark); }
    .status-badge.wrong { background: #fee2e2; color: var(--primary-dark); }
    
    .ans-box {
        padding: 15px;
        border-radius: 12px;
        margin-bottom: 10px;
        font-weight: 700;
        border: 2px solid transparent;
    }
    .ans-box.correct {
        background: #f0fdf4; border-color: var(--green); color: var(--green-dark);
    }
    .ans-box.wrong {
        background: #fef2f2; border-color: var(--primary); color: var(--primary-dark);
    }
</style>

<div class="result-banner {{ $percentage >= 50 ? 'success' : 'fail' }}">
    @if($percentage >= 50)
        <i class="bi bi-trophy-fill" style="font-size: 5rem; display:block; margin-bottom: 20px;"></i>
        <h1>Tebrikler!</h1>
    @else
        <i class="bi bi-emoji-frown-fill" style="font-size: 5rem; display:block; margin-bottom: 20px;"></i>
        <h1>Daha Çok Çalışmalısın!</h1>
    @endif
    <p>{{ $totalQuestions }} Sorudan {{ $score }} Doğru Yaptınız. Başarı Oranınız: %{{ $percentage }}</p>
</div>

<h2 style="font-weight: 900; color: var(--text-main); margin-bottom: 25px;">Soru Çözümleri:</h2>

@foreach($results as $index => $res)
    @php
        $q = $res['question'];
        $userAnsId = $res['user_answer_id'];
        $correctAnsId = $res['correct_answer_id'];
        $isCorrect = $res['is_correct'];
    @endphp

    <div class="question-review">
        <div class="status-badge {{ $isCorrect ? 'correct' : 'wrong' }}">
            @if($isCorrect)
                <i class="bi bi-check-circle-fill"></i> Doğru
            @else
                <i class="bi bi-x-circle-fill"></i> Yanlış
            @endif
        </div>
        
        <div class="q-text">{{ $index + 1 }}. {{ $q->question_text }}</div>
        
        @foreach($q->answers as $ans)
            @php
                $classes = '';
                if ($ans->id == $correctAnsId) {
                    $classes = 'correct';
                } elseif ($ans->id == $userAnsId && !$isCorrect) {
                    $classes = 'wrong';
                } else {
                    $classes = 'style="background:var(--gray-bg); color:var(--text-muted);"';
                }
            @endphp
            <div class="ans-box {{ $classes }}" {!! $classes == 'correct' || $classes == 'wrong' ? '' : $classes !!}>
                @if($ans->id == $correctAnsId) <i class="bi bi-check-lg"></i> @endif
                @if($ans->id == $userAnsId && !$isCorrect) <i class="bi bi-x-lg"></i> @endif
                {{ $ans->answer_text }}
                
                @if($ans->id == $userAnsId)
                    <span style="float:right; font-size: 0.9rem; font-style: italic;">(Senin Cevabın)</span>
                @endif
            </div>
        @endforeach
    </div>
@endforeach

<a href="{{ route('user.lesson.show', $test->lesson_id) }}" class="btn-back" style="width: 100%; text-align: center; display: block; background: var(--gray-bg);">
    Derse Geri Dön ve Çalışmaya Devam Et
</a>

@endsection
