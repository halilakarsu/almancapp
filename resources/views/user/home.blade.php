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
                        data-level-id="{{ $level->id }}"
                        data-level-badge="{{ $levelBadge }}"
                        data-level-name="{{ $levelName ?: $level->level_title }}"
                        data-lesson-count="{{ $lessonCount }}"
                        data-progress="{{ $progress }}"
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

    <div class="carousel-dots"></div>
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
                <div class="empty-state" style="width: 100%">
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
            var track = document.getElementById('level-carousel');
            var btnPrev = document.getElementById('carousel-prev');
            var btnNext = document.getElementById('carousel-next');
            var cards = track.querySelectorAll('.level-card');
            if (!track || !btnPrev || !btnNext || !cards.length) return;

            var current = 0;
            var dotsContainer = document.querySelector('.carousel-dots');

            function getCardsPerPage() {
                return window.innerWidth >= 768 ? 2 : 1;
            }

            function totalPages() {
                return Math.ceil(cards.length / getCardsPerPage());
            }

            function slideTo(page) {
                var perPage = getCardsPerPage();
                var maxPage = totalPages() - 1;
                current = Math.max(0, Math.min(page, maxPage));

                var card = cards[0];
                var gap = parseInt(getComputedStyle(track).gap) || 0;
                var step = card.offsetWidth + gap;
                track.style.transform = 'translateX(-' + (current * perPage * step) + 'px)';

                btnPrev.style.opacity = current > 0 ? '1' : '0.35';
                btnNext.style.opacity = current < maxPage ? '1' : '0.35';

                if (dotsContainer) {
                    var dots = dotsContainer.querySelectorAll('.carousel-dot');
                    dots.forEach(function (d, i) {
                        d.classList.toggle('is-active', i === current);
                    });
                }
            }

            btnPrev.addEventListener('click', function () { slideTo(current - 1); });
            btnNext.addEventListener('click', function () { slideTo(current + 1); });

            // Build dots
            if (dotsContainer) {
                var total = totalPages();
                for (var i = 0; i < total; i++) {
                    var dot = document.createElement('button');
                    dot.className = 'carousel-dot' + (i === 0 ? ' is-active' : '');
                    dot.setAttribute('aria-label', 'Sayfa ' + (i + 1));
                    dot.addEventListener('click', function (idx) { slideTo(idx); }.bind(null, i));
                    dotsContainer.appendChild(dot);
                }
            }

            slideTo(0);

            window.addEventListener('resize', function () {
                var perPage = getCardsPerPage();
                var total = totalPages();
                if (current >= total) current = total - 1;
                slideTo(current);
            });
        });
    </script>

@endsection
