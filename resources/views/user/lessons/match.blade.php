@extends('layouts.user')
@section('title', 'Eşleştirme Oyunu')
@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800;900&display=swap" rel="stylesheet">

@section('styles')
<link rel="stylesheet" href="{{ asset('custom-css/match.css') }}">
@endsection

<div class="match-app-container">
    
    <div class="top-bar">
        <button class="btn-close" onclick="window.location.href='{{ route('user.lesson.show', $lesson->id) }}'"><i class="bi bi-x-lg"></i></button>
        <div class="progress-wrapper">
            <div class="progress-bar-inner" id="progress-bar"></div>
        </div>
    </div>

    <div id="game-container">
        <h2 class="instruction" style="display:flex; align-items:center; justify-content:center; gap:10px;">
            <img src="{{ asset('assets/img/maskot4.png') }}" alt="Mascot" style="width: 40px; height: auto;"> Kelimeleri eşleştir
        </h2>
        <div class="game-board">
            <div class="column" id="col-de"></div>
            <div class="column" id="col-tr"></div>
        </div>
    </div>

    <div class="finish-screen" id="finish-screen">
        <i class="bi bi-trophy-fill finish-icon"></i>
        <h1 class="finish-title">Harika İş Çıkardın!</h1>
        <p style="font-size: 1.2rem; color: #64748b; font-weight: 600;">Tüm kelimeleri başarıyla eşleştirdin.</p>
        <a href="{{ route('user.lesson.show', $lesson->id) }}" class="finish-btn">Devam Et</a>
    </div>

</div>

<script>
    const allPairs = @json($pairs);
</script>
<script src="{{ asset('custom-js/tts.js') }}?v={{ time() }}"></script>
<script src="{{ asset('custom-js/match.js') }}?v={{ time() }}"></script>

@endsection
