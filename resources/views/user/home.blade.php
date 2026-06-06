@extends('layouts.user')
@section('title', 'Eğitim Seviyeleri')
@section('main_class', 'is-home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('custom-css/home.css') }}">
@endsection

@section('content')

    {{-- ============================================================
    HERO SECTION — Açık gökyüzü (Duolingo tarzı) + panel renkleri
    ============================================================ --}}
    <div class="hero-section">
        <img src="{{ asset('assets/img/maskot4.png') }}" alt="Almingo Maskot" class="hero-mascot">

        <div class="hero-text" style="flex:1;">
            @php
                $totalLevels = $levels->count();
                $totalLessons = $levels->sum(fn($l) => $l->lessons->count());
            @endphp

            <h2>Hey! &nbsp;{{ explode(' ', Auth::user()?->name ?? 'Öğrenci')[0] }}! 👋<br>
                Almancayı seviyelerle adım adım keşfet.</h2>

            <div class="hero-stats" aria-label="Eğitim özeti">
                <span>{{ $totalLevels }} seviye</span>
                <span>{{ $totalLessons }} ders</span>
            </div>
        </div>
    </div>

    {{-- ============================================================
    LEVEL CARDS — Snap-scroll Carousel
    ============================================================ --}}
    <div class="carousel-wrapper">

        <button class="carousel-btn carousel-btn--prev" id="carousel-prev" aria-label="Önceki">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6" />
            </svg>
        </button>

        <div class="level-grid" id="level-carousel">

            @forelse($levels as $level)
                @php
                    $progress = 0;
                    if (isset($userProgress) && $userProgress->has($level->id)) {
                        $progress = max(0, min(100, (int) $userProgress[$level->id]));
                    }

                    $levelBadge = explode(' ', trim($level->level_title))[0];
                    $levelName = trim(str_replace($levelBadge, '', $level->level_title));
                    $levelTheme = 'level-card--' . strtolower(preg_replace('/[^a-zA-Z0-9]+/', '', $levelBadge));
                    $lessonCount = $level->lessons->count();
                    $ctaText = $progress >= 100 ? 'Tekrarla' : 'Derse başla';

                    $fallbackMascots = ['maskot4.png', 'mascot.png', 'mascot2.png'];
                    $selectedMascot = $fallbackMascots[$loop->index % count($fallbackMascots)];
                    $cardImageSrc = $level->level_image
                        ? asset($level->level_image)
                        : asset('assets/img/' . $selectedMascot);

                @endphp

                <a href="{{ route('user.level.show', $level->id) }}" class="level-card {{ $levelTheme }}"
                    aria-label="{{ $level->level_title }} - {{ $progress }}% tamamlandı">

                    {{-- Dış çerçeve (lacivert #0a0e1f) — zaten kart bg rengi --}}
                    {{-- Altın orta katman --}}
                    <div class="level-card-bg"></div>
                    {{-- Krem/beyaz iç katman --}}
                    <div class="level-card-inner"></div>

                    <div class="level-card-body">

                        <span class="level-badge">{{ $levelBadge }}</span>

                        <img src="{{ $cardImageSrc }}" class="level-mascot" alt="{{ $levelBadge }} Görseli">

                        <h3 class="level-title">{{ $levelName ?: $level->level_title }}</h3>

                        <div class="level-progress-ring" style="--progress: {{ $progress }}%;"
                            aria-label="{{ $progress }}% tamamlandı">
                            <div class="level-progress-ring-inner">
                                <strong>{{ $progress }}%</strong>
                                <span>tamamlandı</span>
                            </div>
                        </div>

                        <span class="level-meta">
                            <strong>{{ $lessonCount }}</strong>
                            <span>ders</span>
                        </span>
                        <div class="level-action-row">
                            <span class="level-start-cta">{{ $ctaText }}</span>
                        </div>

                    </div>
                </a>

            @empty
                <div class="empty-state">
                    <div style="width:72px;height:72px;background:#fff8e1;border-radius:50%;
                                        display:flex;align-items:center;justify-content:center;
                                        margin:0 auto 20px;">
                        <i class="bi bi-journal-x" style="font-size:2rem;color:#0a0e1f;"></i>
                    </div>
                    <h2 style="color:#0a0e1f;font-weight:800;font-size:1.3rem;
                                       font-family:'Manrope',sans-serif;">
                        Henüz Eğitim Bulunmuyor
                    </h2>
                    <p style="color:#64748b;margin-top:10px;font-size:0.95rem;">
                        Yakında yepyeni eğitim seviyeleri platforma eklenecektir.
                    </p>
                </div>
            @endforelse

        </div>

        <button class="carousel-btn carousel-btn--next" id="carousel-next" aria-label="Sonraki">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6" />
            </svg>
        </button>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var carousel = document.getElementById('level-carousel');
            var btnPrev = document.getElementById('carousel-prev');
            var btnNext = document.getElementById('carousel-next');

            if (carousel && btnPrev && btnNext) {
                function scrollStep() {
                    var card = carousel.querySelector('.level-card');
                    var gap = parseInt(getComputedStyle(carousel).gap) || 48;
                    return card ? card.offsetWidth + gap : 300;
                }
                btnPrev.addEventListener('click', function () {
                    carousel.scrollBy({ left: -scrollStep(), behavior: 'smooth' });
                });
                btnNext.addEventListener('click', function () {
                    carousel.scrollBy({ left: scrollStep(), behavior: 'smooth' });
                });
                function updateBtns() {
                    btnPrev.style.opacity = carousel.scrollLeft > 10 ? '1' : '0.35';
                    var atEnd = carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth - 10;
                    btnNext.style.opacity = atEnd ? '0.35' : '1';
                }
                carousel.addEventListener('scroll', updateBtns, { passive: true });
                updateBtns();
            }
        });
    </script>

@endsection
