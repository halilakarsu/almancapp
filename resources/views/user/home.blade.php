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
            <div class="hero-level-info" id="hero-level-info">
                <span class="hero-level-badge" id="hero-level-badge">A1</span>
                <h2 class="hero-level-title" id="hero-level-title">Başlangıç</h2>
                <div class="hero-level-stats" id="hero-level-stats">
                    <span id="hero-lesson-count">0 ders</span>
                    <span class="hero-stat-divider">·</span>
                    <span id="hero-progress-text">%0 tamamlandı</span>
                </div>
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

                    $accentMap = [
                        'A1' => '#FFCC00', 'A2' => '#ef4444',
                        'B1' => '#60a5fa', 'B2' => '#a78bfa',
                        'C1' => '#fb7185', 'C11' => '#fb7185',
                        'C2' => '#f59e0b', 'C21' => '#f59e0b',
                    ];
                    $accentColor = $accentMap[$levelBadge] ?? '#58c5f0';

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
                    data-level-accent="{{ $accentColor }}"
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

            // ── Active level hero updater ──
            var heroSection = document.querySelector('.hero-section');
            var heroBadge = document.getElementById('hero-level-badge');
            var heroTitle = document.getElementById('hero-level-title');
            var heroLessons = document.getElementById('hero-lesson-count');
            var heroProgress = document.getElementById('hero-progress-text');
            var cards = document.querySelectorAll('.level-card');

            function updateHero(card) {
                if (!card) return;
                heroBadge.textContent = card.dataset.levelBadge || '';
                heroTitle.textContent = card.dataset.levelName || '';
                heroLessons.textContent = card.dataset.lessonCount + ' ders';
                heroProgress.textContent = '%' + card.dataset.progress + ' tamamlandı';

                var accent = card.dataset.levelAccent || '#58c5f0';
                heroSection.style.background = 'linear-gradient(180deg, ' +
                    accent + ' 0%, ' +
                    accent + 'cc 30%, ' +
                    accent + '99 60%, ' +
                    accent + '66 100%)';
            }

            // Set initial from first card
            if (cards.length > 0) updateHero(cards[0]);

            var observer = new IntersectionObserver(function (entries) {
                var best = null, bestRatio = 0;
                entries.forEach(function (e) {
                    if (e.intersectionRatio > bestRatio) {
                        bestRatio = e.intersectionRatio;
                        best = e.target;
                    }
                });
                if (best) updateHero(best);
            }, { root: carousel, threshold: [0, 0.25, 0.5, 0.75, 1] });

            cards.forEach(function (c) { observer.observe(c); });
        });
    </script>

@endsection
