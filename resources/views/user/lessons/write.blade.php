@extends('layouts.user')
@section('title', 'Yazma Çalışması')
@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet">

@section('styles')
<link rel="stylesheet" href="{{ asset('custom-css/write.css') }}">
@endsection

<div class="write-container">
    <div class="top-bar">
        <button class="btn-close" onclick="window.location.href='{{ route('user.lesson.show', $lesson->id) }}'"><i class="bi bi-x-lg"></i></button>
        <div class="progress-wrap"><div class="progress-bar" id="progress-bar"></div></div>
    </div>

    <div id="game-area">
        <h2 class="instruction" style="display:flex; align-items:center; justify-content:center; gap:10px; margin-bottom:20px; font-weight:800; color:#1e293b;">
            <img src="{{ asset('assets/img/maskot4.png') }}" alt="Mascot" style="width: 40px; height: auto;"> Yazma Çalışması
        </h2>
        <div class="quest-box">
            <div class="tr-label">Almancasını Yaz</div>
            <img id="item-image" class="img-preview" src="">
            <div class="tr-text" id="tr-text">Loading...</div>
            <textarea id="write-input" class="write-input" rows="2" placeholder="Buraya yazın..."></textarea>
            <div class="word-pool" id="word-pool"></div>
        </div>

        <button class="btn-check" id="check-btn" onclick="checkAnswer()">Kontrol Et</button>

        <div class="feedback-area" id="feedback-area">
            <div class="feedback-box" id="feedback-box">
                <div>
                    <div class="fb-text" id="fb-text">Tebrikler!</div>
                    <div class="fb-sub" id="fb-sub"></div>
                </div>
                <button class="btn-next" onclick="nextQuestion()">Devam Et</button>
            </div>
        </div>
    </div>

    <div id="finish-area" style="display:none; text-align:center; padding-top:100px;">
        <i class="bi bi-award-fill" style="font-size:5rem; color:#1A1A1A;"></i>
        <h1 style="font-weight:900; margin:20px 0;">Süper!</h1>
        <p style="color:#64748b; font-weight:600; margin-bottom:30px;">Yazma alıştırmasını başarıyla tamamladın.</p>
        <a href="{{ route('user.lesson.show', $lesson->id) }}" class="btn-check" style="text-decoration:none; display:inline-block; width:auto; padding:15px 40px; background:#1A1A1A; box-shadow:0 5px 0 #6d28d9;">Derslere Dön</a>
    </div>
</div>

<script>
    const ITEMS = @json($items);
</script>
<script src="{{ asset('custom-js/tts.js') }}?v={{ time() }}"></script>
<script src="{{ asset('custom-js/write.js') }}?v={{ time() }}"></script>

@endsection
