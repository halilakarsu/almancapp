@extends('layouts.user')
@section('title', $level->level_title)

@section('styles')
    <link rel="stylesheet" href="{{ asset('custom-css/levels-show.css') }}?v={{ time() }}">
@endsection

@push('mobile-nav')
    <a href="{{ route('dashboard') }}" class="mobile-back-btn">
        <i class="bi bi-arrow-left"></i> Seviyelere Dön
    </a>
@endpush

@section('content')

@php
    $totalLessons   = $level->lessons->count();
    $totalWords     = $level->lessons->sum(fn($l) => $l->cards()->where('type','word')->count());
    $totalSentences = $level->lessons->sum(fn($l) => $l->cards()->where('type','sentence')->count());
    $levelCode      = explode(' ', trim($level->level_title))[0];

    $placeholderColors = [
        '#DD0000','#B30000','#FFCE00','#E5A000',
        '#1a1a1a','#333333','#DC2626','#991B1B',
    ];

    $completedCount = 0;
    $lessons = $level->lessons->map(function ($lesson) use (&$completedCount) {
        $lesson->is_completed     = false;
        $lesson->is_active        = true;
        $lesson->progress_percent = 0;
        return $lesson;
    });
    $overallPct = $totalLessons > 0 ? round($completedCount / $totalLessons * 100) : 0;
    
    $cleanTitle = preg_replace('/^[A-Z]\d+(\.\d+)?\s*[-–—]\s*/u', '', $level->level_title);
    $cleanTitle = preg_replace('/^\d+[\.\)]\s*/u', '', $cleanTitle);
    $cleanTitle = trim($cleanTitle) ?: $level->level_title;
@endphp

<div class="level-hero">
    <div class="level-hero-center">
        <div class="level-hero-accent"></div>
        <div class="level-hero-title-group">
            <span class="level-hero-suptitle">SEVİYE</span>
            <h1>{{ $cleanTitle }}</h1>
        </div>
    </div>

    <div class="level-hero-progress">
        <div class="progress-summary-top">
            <span class="progress-summary-label">İlerleme</span>
            <span class="progress-summary-count">
                {{ $completedCount }}/{{ $totalLessons }}
            </span>
        </div>
        <div class="progress-summary-track">
            <div class="progress-summary-fill" data-pct="{{ $overallPct }}"></div>
        </div>
    </div>
</div>

<div class="roadmap">

    @forelse($lessons as $index => $lesson)
        @php
            $isFirst = $index === 0;
            $isLast  = $index === $totalLessons - 1;
            $prev    = $index > 0 ? $lessons[$index - 1] : null;

            if ($lesson->is_completed)     { $state = 'completed'; }
            elseif ($lesson->is_active)    { $state = 'active';    }
            else                           { $state = 'locked';    }

            $isLocked = $state === 'locked';
            $cardHref = $isLocked ? '#' : route('user.lesson.show', $lesson->id);

            $topLineClass = $isFirst
                ? 'line-hidden'
                : ($prev && $prev->is_completed ? 'line-green' : 'line-gray');

            $bottomLineClass = $isLast
                ? 'line-hidden'
                : ($lesson->is_completed ? 'line-green' : 'line-gray');

            $dotIcon = match($state) {
                'completed' => 'bi-check-lg',
                'active'    => 'bi-caret-right-fill',
                'locked'    => 'bi-lock-fill',
            };

            $cardStateClass = match($state) {
                'completed' => 'is-completed',
                'active'    => 'is-active',
                'locked'    => 'is-locked',
            };

            $placeholderBg  = $placeholderColors[$index % count($placeholderColors)];
            $placeholderChar = mb_strtoupper(mb_substr($lesson->lesson_title, 0, 2));

            $wCount = $lesson->cards()->where('type','word')->count();
            $sCount = $lesson->cards()->where('type','sentence')->count();

            $pillIcon = match($state) {
                'completed' => 'bi-check-circle-fill',
                'active'    => 'bi-play-circle-fill',
                'locked'    => 'bi-lock-fill',
            };
            $pillLabel = match($state) {
                'completed' => 'Tamamlandı',
                'active'    => '',
                'locked'    => 'Kilitli',
            };

            $progressColor = $state === 'completed' ? '#22c55e' : '#DD0000';

            $lockedHint = $prev
                ? '"' . $prev->lesson_title . '" dersini tamamla'
                : 'Bu ders kilitli';
        @endphp

        <div class="roadmap-row">
            <div class="roadmap-connector">
                <div class="connector-top-line {{ $topLineClass }}"></div>
                <div class="connector-dot {{ $state }}">
                    <i class="bi {{ $dotIcon }}"></i>
                </div>
                <div class="connector-bottom-line {{ $bottomLineClass }}"></div>
            </div>

            <div class="roadmap-card-wrap">
                <a class="lesson-card {{ $cardStateClass }}"
                   href="{{ $cardHref }}"
                   @if($isLocked) tabindex="-1" aria-disabled="true" @endif>

                    @if($lesson->image_url)
                        <img class="lesson-thumb" src="{{ $lesson->image_url }}" alt="{{ $lesson->lesson_title }}">
                    @else
                        <div class="lesson-thumb-placeholder" style="background:{{ $placeholderBg }};">
                            {{ $placeholderChar }}
                        </div>
                    @endif

                    <div class="lesson-body">
                        <div class="lesson-title">{{ $lesson->lesson_title }}</div>



                        @if($lesson->progress_percent > 0)
                            <div class="lesson-progress-track">
                                <div class="lesson-progress-fill"
                                     data-pct="{{ $lesson->progress_percent }}"
                                     style="background:{{ $progressColor }};"></div>
                            </div>
                        @endif
                    </div>

                    <div class="lesson-status-wrap">
                        <span class="status-pill {{ $state }}">
                            <i class="bi {{ $pillIcon }}"></i>
                            {{ $pillLabel }}
                        </span>
                    </div>
                </a>

                @if($state === 'locked')
                    <div class="locked-hint">
                        <i class="bi bi-info-circle"></i> {{ $lockedHint }}
                    </div>
                @endif
            </div>
        </div>

    @empty
        <div class="empty-state">
            <i class="bi bi-journal-x"></i>
            <h2>Bu seviyeye henüz ders eklenmemiş.</h2>
        </div>
    @endforelse

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        requestAnimationFrame(function () {
            setTimeout(function () {
                var sf = document.querySelector('.progress-summary-fill');
                if (sf) sf.style.width = sf.dataset.pct + '%';
                document.querySelectorAll('.lesson-progress-fill').forEach(function (b) {
                    b.style.width = b.dataset.pct + '%';
                });
            }, 350);
        });
    });
</script>

@endsection
