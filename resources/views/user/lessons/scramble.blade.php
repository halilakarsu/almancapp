@extends('layouts.user')
@section('title', 'Cümle Kurma')
@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet">

@section('styles')
<link rel="stylesheet" href="{{ asset('custom-css/scramble.css') }}">
@endsection

<div class="scramble-container">
    <div class="top-bar">
        <button class="btn-close" onclick="window.location.href='{{ route('user.lesson.show', $lesson->id) }}'"><i class="bi bi-x-lg"></i></button>
        <div class="progress-wrap"><div class="progress-bar" id="progress-bar"></div></div>
    </div>

    <div id="game-area">
        <h2 class="instruction" style="display:flex; align-items:center; justify-content:center; gap:10px; margin-bottom:20px; font-weight:800; color:#1e293b;">
            <img src="{{ asset('assets/img/maskot4.png') }}" alt="Mascot" style="width: 40px; height: auto;"> Cümle Kurma
        </h2>
        <div class="quest-box">
            <div class="tr-text" id="tr-text">Loading...</div>
            <div class="de-target-area" id="target-area"></div>
        </div>

        <div class="word-pool" id="word-pool"></div>

        <button class="btn-check" id="check-btn" onclick="checkAnswer()">Kontrol Et</button>

        <div class="feedback-area" id="feedback-area">
            <div class="feedback-box" id="feedback-box">
                <div class="fb-text" id="fb-text">Tebrikler!</div>
                <button class="btn-next" onclick="nextQuestion()">Devam Et</button>
            </div>
        </div>
    </div>

    <div id="finish-area" style="display:none; text-align:center; padding-top:100px;">
        <i class="bi bi-star-fill" style="font-size:5rem; color:#1A1A1A;"></i>
        <h1 style="font-weight:900; margin:20px 0;">Harika Bitirdin!</h1>
        <p style="color:#64748b; font-weight:600; margin-bottom:30px;">Tüm cümleleri başarıyla kurdun.</p>
        <a href="{{ route('user.lesson.show', $lesson->id) }}" class="btn-check" style="text-decoration:none; display:inline-block; width:auto; padding:15px 40px;">Derslere Dön</a>
    </div>
</div>

<script>
    const SENTENCES = @json($sentences);
</script>
<script src="{{ asset('custom-js/tts.js') }}?v={{ time() }}"></script>
<script src="{{ asset('custom-js/scramble.js') }}?v={{ time() }}"></script>

@endsection
