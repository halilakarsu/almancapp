@extends('layouts.user')
@section('title', $test->test_title)
@section('content')

<a href="{{ route('user.lesson.show', $test->lesson_id) }}" class="btn-back">
    <i class="bi bi-arrow-left"></i> Derse Dön
</a>

<div class="header-top" style="margin-top: 20px;">
    <div>
        <h1 class="greeting">{{ $test->test_title }}</h1>
        <p class="subtitle">{{ $test->description }}</p>
    </div>
</div>

<style>
    .quiz-card {
        background: var(--white);
        border: 2px solid var(--gray-border);
        border-radius: 20px;
        padding: 40px;
        margin-bottom: 30px;
        box-shadow: 0 6px 0 var(--gray-border);
    }
    .question-title {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--text-main);
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px dashed var(--gray-border);
    }
    .options-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 15px;
    }
    .option-label {
        display: flex;
        align-items: center;
        padding: 15px 20px;
        border: 2px solid var(--gray-border);
        border-radius: 15px;
        cursor: pointer;
        transition: all 0.2s;
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-main);
        background: var(--gray-bg);
    }
    .option-label:hover {
        background: #f0fdf4;
        border-color: var(--green);
    }
    .option-input {
        display: none;
    }
    .option-input:checked + .option-label {
        background: #dcfce7;
        border-color: var(--green);
        color: var(--green-dark);
        box-shadow: 0 4px 0 var(--green);
        transform: translateY(-2px);
    }
    .option-input:checked + .option-label::after {
        content: '\F26A';
        font-family: 'bootstrap-icons';
        margin-left: auto;
        font-size: 1.4rem;
    }

    .btn-submit {
        background: var(--blue);
        color: white;
        border: none;
        padding: 18px 40px;
        font-size: 1.3rem;
        font-weight: 900;
        border-radius: 20px;
        cursor: pointer;
        box-shadow: 0 6px 0 var(--blue-dark);
        transition: all 0.2s;
        display: block;
        width: 100%;
        text-align: center;
    }
    .btn-submit:hover {
        transform: translateY(2px);
        box-shadow: 0 4px 0 var(--blue-dark);
    }
    .btn-submit:active {
        transform: translateY(6px);
        box-shadow: none;
    }
</style>

<form action="{{ route('user.test.submit', $test->id) }}" method="POST">
    @csrf

    @foreach($test->questions as $index => $question)
        <div class="quiz-card">
            <h2 class="question-title">
                <span style="color:var(--blue);">Soru {{ $index + 1 }}:</span> {{ $question->question_text }}
            </h2>
            <div class="options-grid">
                @foreach($question->answers as $answer)
                    <div>
                        <input type="radio" class="option-input" name="answers[{{ $question->id }}]" id="ans_{{ $answer->id }}" value="{{ $answer->id }}" required>
                        <label for="ans_{{ $answer->id }}" class="option-label">
                            {{ $answer->answer_text }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    <button type="submit" class="btn-submit">
        <i class="bi bi-check-circle-fill"></i> Testi Tamamla
    </button>
</form>

@endsection
