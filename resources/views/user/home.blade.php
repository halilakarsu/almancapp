@extends('layouts.user')
@section('title', 'Eğitim Seviyeleri')
@section('main_class', 'is-home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('custom-css/home.css') }}">
@endsection

@section('content')

    {{-- ================================================================
    CAROUSEL
    ================================================================ --}}
    <div class="carousel-wrapper">

        <div class="level-grid" id="level-carousel">

            @forelse($levels as $level)
                @php
                    /* ── İlerleme ── */
                    $progress = 0;
                    if (isset($userProgress) && $userProgress->has($level->id)) {
                        $progress = max(0, min(100, (int) $userProgress[$level->id]));
                    }

                    /* ── Badge & isim ── */
                    $levelBadge = explode(' ', trim($level->level_title))[0];
                    $levelName = trim(str_replace($levelBadge, '', $level->level_title));

                    /* ── Ders sayısı ── */
                    $lessonCount = $level->lessons->count();

                    /* ── CTA metni ── */
                    $ctaLabel = $progress >= 100
                        ? '✓ Tamamlandı'
                        : ($progress > 0 ? 'Devam Et →' : 'Başla →');

                    /* ── Alt başlık ── */
                    $subLabel = $progress >= 100
                        ? 'Tebrikler! Seviyeyi bitirdin.'
                        : ($progress > 0 ? '%' . $progress . ' tamamlandı' : 'Başlangıç seviyesi');

                    /* ── Mascot görsel ── */
                    $fallbackMascots = ['maskot4.png', 'mascot.png', 'mascot2.png'];
                    $selectedMascot = $fallbackMascots[$loop->index % count($fallbackMascots)];
                    $cardImageSrc = $level->level_image
                        ? asset($level->level_image)
                        : asset('assets/img/' . $selectedMascot);
                @endphp

                <a href="{{ route('user.level.show', $level->id) }}" class="level-card" aria-label="{{ $level->level_title }}">

                    {{-- ── TOP: Renkli görsel şerit ── --}}
                    <div class="level-card-top">
                        <span class="level-top-badge">{{ $levelBadge }}</span>
                        <img src="{{ $cardImageSrc }}" class="level-top-image" alt="{{ $levelBadge }} maskotu">
                    </div>

                    {{-- ── MİD: İçerik ── --}}
                    <div class="level-card-mid">

                        <div class="level-card-circle-content">
                            <h3 class="level-title">{{ $levelName ?: $level->level_title }}</h3>
                            <p class="level-subtitle">{{ $subLabel }}</p>
                        </div>

                        {{-- Bilgi satırları --}}
                        <div class="level-card-infos">
                            <div class="level-card-info-row">
                                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                                </svg>
                                <span>{{ $lessonCount }} ders</span>
                            </div>
                            <div class="level-card-info-row">
                                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg>
                                <span>%{{ $progress }} tamamlandı</span>
                            </div>
                        </div>

                        {{-- Progress bar --}}
                        <div class="level-progress-track">
                            <div class="level-progress-fill" style="width: {{ $progress }}%"></div>
                        </div>

                        {{-- CTA --}}
                        <button class="level-card-btn">{{ $ctaLabel }}</button>

                    </div>{{-- /.level-card-mid --}}

                </a>

            @empty
                <div class="empty-state">
                    <div style="font-size:2.5rem; margin-bottom:14px;">📚</div>
                    <h2 style="color:#1a0a0a;font-weight:800;font-size:1.2rem;font-family:'Sora',sans-serif;margin:0 0 8px;">
                        Henüz Eğitim Bulunmuyor
                    </h2>
                    <p style="color:#6b7280;font-size:.9rem;">
                        Yakında yepyeni eğitim seviyeleri platforma eklenecektir.
                    </p>
                </div>
            @endforelse

        </div>{{-- /#level-carousel --}}

        <div class="carousel-nav">
            <button class="carousel-btn carousel-btn--prev" id="carousel-prev" aria-label="Önceki seviye">
                <svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6" />
                </svg>
            </button>

            <div class="carousel-dots" id="carousel-dots"></div>

            <button class="carousel-btn carousel-btn--next" id="carousel-next" aria-label="Sonraki seviye">
                <svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </button>
        </div>

    </div>{{-- /.carousel-wrapper --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var track = document.getElementById('level-carousel');
            var btnPrev = document.getElementById('carousel-prev');
            var btnNext = document.getElementById('carousel-next');
            var dotsEl = document.getElementById('carousel-dots');
            if (!track || !btnPrev || !btnNext) return;

            var cards = Array.from(track.querySelectorAll('.level-card'));
            if (!cards.length) { btnPrev.style.display = btnNext.style.display = 'none'; return; }

            var current = 0;
            var total = cards.length;

            /* ── Dot'ları oluştur ── */
            cards.forEach(function (_, i) {
                var d = document.createElement('button');
                d.className = 'carousel-dot' + (i === 0 ? ' active' : '');
                d.setAttribute('aria-label', (i + 1) + '. seviye');
                d.addEventListener('click', function () { slideTo(i); });
                dotsEl.appendChild(d);
            });

            function getDots() { return dotsEl.querySelectorAll('.carousel-dot'); }

            function slideTo(page) {
                current = Math.max(0, Math.min(page, total - 1));

                /* Kart genişliği + gap hesapla */
                var cardW = cards[0].offsetWidth;
                var gap = parseInt(getComputedStyle(track).gap) || 20;
                var padL = parseInt(getComputedStyle(track).paddingLeft) || 0;

                /* Her kart ortalansın: padding-left + kart offset */
                track.scrollTo({
                    left: current * (cardW + gap),
                    behavior: 'smooth'
                });

                /* Ok görünürlüğü */
                btnPrev.style.opacity = current > 0 ? '1' : '0.3';
                btnNext.style.opacity = current < total - 1 ? '1' : '0.3';

                /* Dot güncelle */
                getDots().forEach(function (d, i) {
                    d.classList.toggle('active', i === current);
                });
            }

            btnPrev.addEventListener('click', function () { slideTo(current - 1); });
            btnNext.addEventListener('click', function () { slideTo(current + 1); });

            /* Scroll takibi */
            var scrollTimer;
            track.addEventListener('scroll', function () {
                clearTimeout(scrollTimer);
                scrollTimer = setTimeout(function () {
                    var cardW = cards[0].offsetWidth;
                    var gap = parseInt(getComputedStyle(track).gap) || 20;
                    current = Math.round(track.scrollLeft / (cardW + gap));
                    btnPrev.style.opacity = current > 0 ? '1' : '0.3';
                    btnNext.style.opacity = current < total - 1 ? '1' : '0.3';
                    getDots().forEach(function (d, i) {
                        d.classList.toggle('active', i === current);
                    });
                }, 80);
            });

            /* Klavye desteği */
            document.addEventListener('keydown', function (e) {
                if (e.key === 'ArrowLeft') slideTo(current - 1);
                if (e.key === 'ArrowRight') slideTo(current + 1);
            });

            /* İlk render */
            slideTo(0);
        });
    </script>

@endsection