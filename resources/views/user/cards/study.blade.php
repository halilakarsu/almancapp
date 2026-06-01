@extends('layouts.user')
@section('title', 'Kart Çalışması – ' . $lesson->lesson_title)

@section('styles')
<link rel="stylesheet" href="{{ asset('custom-css/study.css') }}">
@endsection

@section('content')
<div class="study-wrap">

    {{-- Back --}}
    <a href="{{ route('user.lesson.show', $lesson->id) }}" class="btn-back-app" id="study-back-btn">
        <i class="bi bi-chevron-left"></i> {{ $lesson->lesson_title }}
    </a>

    {{-- Stats bar --}}
    <div class="stats-bar" id="stats-bar">
        <div class="stat-pill stat-new" id="stat-new">
            <i class="bi bi-circle"></i> <span id="cnt-new">{{ $stats['new'] }}</span> Yeni
        </div>
        <div class="stat-pill stat-learning" id="stat-learning">
            <i class="bi bi-arrow-repeat"></i> <span id="cnt-learning">{{ $stats['learning'] }}</span> Öğreniliyor
        </div>
        <div class="stat-pill stat-known" id="stat-known">
            <i class="bi bi-check-circle-fill"></i> <span id="cnt-known">{{ $stats['known'] }}</span> Biliniyor
        </div>
    </div>

    {{-- Progress --}}
    <div class="progress-wrap" id="progress-wrap">
        <div class="progress-label">
            <span id="prog-text">0 / {{ count($cards) }}</span>
            <span id="prog-pct">0%</span>
        </div>
        <div class="progress-track">
            <div class="progress-fill" id="progress-fill" style="width:0%"></div>
        </div>
    </div>

    {{-- Card Stage --}}
    <div class="card-stage animate-in" id="card-stage" onclick="revealTranslation()">
        <div class="card-main" id="card-main">
            <span class="card-tag">Almanca</span>
            <span class="card-type-badge" id="card-type-badge"></span>
            
            <img id="card-img" src="" alt="" class="card-image d-none">
            
            <div class="card-de-text" id="card-de"></div>
            
            <div class="tr-reveal-container" id="tr-reveal-container">
                <div class="reveal-divider"></div>
                <div class="card-tr-text" id="card-tr"></div>
            </div>

            <div class="diff-dots" id="diff-dots"></div>
            
            <button class="audio-btn d-none" id="audio-btn" onclick="event.stopPropagation(); playCardAudio()">
                <i class="bi bi-volume-up-fill"></i>
            </button>
        </div>
    </div>

    {{-- Reveal hint --}}
    <div class="flip-hint-bar" id="flip-hint">
        Anlamı görmek için dokun veya bekle...
    </div>

    {{-- Actions (shown after reveal) --}}
    <div class="action-row hidden" id="action-row">
        <button class="btn-continue" id="btn-continue" onclick="nextCard()">
            Devam Et <i class="bi bi-arrow-right-short" style="font-size: 1.6rem;"></i>
        </button>
    </div>

    {{-- Complete --}}
    <div class="complete-wrap" id="complete-wrap">
        <div class="complete-emoji">🎉</div>
        <h2>Harika iş!</h2>
        <p>Oturumu tamamladın.</p>
        <div class="complete-stats">
            <div class="cs-item">
                <div class="cs-num cs-green" id="final-correct">0</div>
                <div class="cs-lbl">Doğru</div>
            </div>
            <div class="cs-item">
                <div class="cs-num cs-red" id="final-wrong">0</div>
                <div class="cs-lbl">Yanlış</div>
            </div>
            <div class="cs-item">
                <div class="cs-num" id="final-known" style="color:#9d1c24;">0</div>
                <div class="cs-lbl">Biliniyor</div>
            </div>
        </div>
        <button class="btn-restart" onclick="startStudy()">🔄 Tekrar Çalış</button>
        <button class="btn-back-lesson" onclick="goBack()">← Derse Dön</button>
    </div>
</div>

{{-- Hidden audio --}}
<audio id="card-audio" src="" preload="none"></audio>

{{-- Toast --}}
<div class="card-toast" id="card-toast"></div>

@endsection

@section('scripts')
<script>
// ── DATA ──────────────────────────────────────────────────────────────────
const CARDS = @json($cards->values());
const LESSON_ID = {{ $lesson->id }};
const REVIEW_URL = '{{ route("user.cards.review") }}';
const CSRF = '{{ csrf_token() }}';
const BACK_URL = '{{ route("user.lesson.show", $lesson->id) }}';

// Local stats mirror
let statCounts = {
    new:      {{ $stats['new'] }},
    learning: {{ $stats['learning'] }},
    known:    {{ $stats['known'] }},
};
</script>
<script src="{{ asset('custom-js/tts.js') }}?v={{ time() }}"></script>
<script src="{{ asset('custom-js/study.js') }}?v={{ time() }}"></script>
@endsection

