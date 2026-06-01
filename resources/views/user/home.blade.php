@extends('layouts.user')
@section('title', 'Eğitim Seviyeleri')

@section('styles')
    <link rel="stylesheet" href="{{ asset('custom-css/home.css') }}">
@endsection

@section('content')

{{-- ============================================================
     HERO SECTION
     ============================================================ --}}
<div class="hero-section">
    <img src="{{ asset('assets/img/maskot4.png') }}"
         alt="Almingo Maskot"
         class="hero-mascot">

    <div class="hero-text" style="flex:1;">
        <h2>Hey! &nbsp;{{ explode(' ', Auth::user()?->name ?? 'Öğrenci')[0] }}! 👋<br>
        Almancayı adım adım keşfet.<br> Her seviye seni bir adım daha ileri taşır.</h2>

        {{-- Genel istatistik özeti --}}
        @php
            $totalLevels   = $levels->count();
            $totalLessons  = $levels->sum(fn($l) => $l->lessons->count());
        @endphp
    
    </div>
</div>

{{-- ============================================================
     LEVEL CARDS
     ============================================================ --}}
<div class="level-grid">

    @forelse($levels as $level)
        @php
            /* ── Stats ── */
            $lessonCount = $level->lessons->count();
            $wordCount   = $level->lessons->sum(
                fn($l) => $l->cards()->where('type', 'word')->count()
            );

            /* ── Progress ── */
            $progress = 0;
            if (isset($userProgress) && $userProgress->has($level->id)) {
                $progress = (int) $userProgress[$level->id];
            } else {
                $progress = rand(0, 90);
            }

            /* ── Badge text ── */
            $levelBadge = explode(' ', trim($level->level_title))[0];
            $levelName  = trim(str_replace($levelBadge, '', $level->level_title));

            /* ── Per-level accent colour ── */
            $accentColor = match(true) {
                str_starts_with($levelBadge, 'A1') => '#e63946',
                str_starts_with($levelBadge, 'A2') => '#f4a261',
                str_starts_with($levelBadge, 'B1') => '#2a9d8f',
                default                             => '#264653',
            };

            /* ── Soft glow for hover border ── */
            $glowColor = match(true) {
                str_starts_with($levelBadge, 'A1') => 'rgba(230,57,70,0.18)',
                str_starts_with($levelBadge, 'A2') => 'rgba(244,162,97,0.18)',
                str_starts_with($levelBadge, 'B1') => 'rgba(42,157,143,0.18)',
                default                             => 'rgba(38,70,83,0.18)',
            };

            /* ── CTA text ── */
            $ctaText = $progress > 0 ? 'Devam et' : 'Başla';
        @endphp

        <a href="{{ route('user.level.show', $level->id) }}"
           class="level-card"
           style="border-color: #e8edf5;"
           onmouseover="this.style.borderColor='{{ $accentColor }}'; this.style.boxShadow='0 14px 40px {{ $glowColor }}';"
           onmouseout="this.style.borderColor='#e8edf5'; this.style.boxShadow='0 4px 18px rgba(0,0,0,0.05)';">

            {{-- ── Left accent strip ── --}}
            <div class="level-card-accent"
                 style="background: {{ $accentColor }};"></div>

            {{-- ── Card body ── --}}
            <div class="level-card-body">

                {{-- Top row: badge + status | mascot --}}
                <div class="level-card-header">
                    <div class="level-card-header-left">
                        <span class="level-badge"
                              style="background: {{ $accentColor }};">
                            {{ $levelBadge }}
                        </span>
                    </div>
                    
                    @php
                        // Eğer admin panelinden resim yüklendiyse onu kullan, yoksa sırayla 3 farklı maskottan birini seç
                        $fallbackMascots = ['maskot4.png', 'mascot.png', 'mascot2.png'];
                        $selectedMascot  = $fallbackMascots[$loop->index % count($fallbackMascots)];
                        
                        $cardImageSrc = $level->level_image 
                            ? asset($level->level_image) 
                            : asset('assets/img/' . $selectedMascot);
                    @endphp
                    <img src="{{ $cardImageSrc }}"
                         class="level-mascot" alt="{{ $levelBadge }} Görseli">
                </div>

                {{-- Title --}}
                <h3 class="level-title">{{ $levelName ?: $level->level_title }}</h3>

               

                {{-- Stats --}}
                <div class="level-stats">

                    
                  

                   

                </div>

                {{-- Progress --}}
                <div class="level-progress-wrap">
                    <div class="level-progress-header">
                        <span>İlerleme</span>
                        <span class="level-progress-pct"
                              style="color: {{ $accentColor }};">
                            %{{ $progress }}
                        </span>
                    </div>
                    <div class="progress-bar-bg">
                        <div class="progress-bar-fill"
                             data-target="{{ $progress }}"
                             style="--target-w: {{ $progress }}%;
                                    background: {{ $accentColor }};">
                        </div>
                    </div>
                </div>

            </div>{{-- /.level-card-body --}}

            {{-- Divider --}}
            <div class="level-card-divider"></div>

            {{-- CTA row --}}
            <div class="level-cta-row"
                 style="width: 100%;
                        background: {{ $accentColor }};
                        box-shadow: 0 4px 14px {{ $glowColor }};">
                <span class="level-cta-btn"
                      style="display: flex; align-items: center; width: 100%;
                             padding: 10px 20px 10px 24px;">
                    <span style="flex: 1; text-align: left;">{{ $ctaText }}</span>
                    <svg width="13" height="13" viewBox="0 0 24 24"
                         fill="none"
                         stroke="#fff"
                         stroke-width="2.5"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         aria-hidden="true">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </span>
            </div>

        </a>

    @empty
        <div class="empty-state">
            <div style="width:72px;height:72px;background:#fef2f2;border-radius:50%;
                        display:flex;align-items:center;justify-content:center;
                        margin:0 auto 20px;">
                <i class="bi bi-journal-x" style="font-size:2rem;color:#b91c1c;"></i>
            </div>
            <h2 style="color:#111827;font-weight:800;font-size:1.3rem;
                       font-family:'Manrope',sans-serif;">
                Henüz Eğitim Bulunmuyor
            </h2>
            <p style="color:#64748b;margin-top:10px;font-size:0.95rem;">
                Yakında yepyeni eğitim seviyeleri platforma eklenecektir.
            </p>
        </div>
    @endforelse

</div>

{{-- ── Animate progress bars on page load ── --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        requestAnimationFrame(function () {
            setTimeout(function () {
                document.querySelectorAll('.progress-bar-fill').forEach(function (bar) {
                    bar.classList.add('animate');
                });
            }, 300);
        });
    });
</script>

@endsection