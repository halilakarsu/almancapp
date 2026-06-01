@extends('layouts.user')
@section('title', $lesson->lesson_title)

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="{{ asset('custom-css/lessons-show.css') }}">
<link rel="stylesheet" href="{{ asset('custom-css/study.css') }}">
<link rel="stylesheet" href="{{ asset('custom-css/match.css') }}">
<link rel="stylesheet" href="{{ asset('custom-css/scramble.css') }}">
<link rel="stylesheet" href="{{ asset('custom-css/fill.css') }}">
<link rel="stylesheet" href="{{ asset('custom-css/write.css') }}">
<style>
    /* ═══════════════════════════════════════════
           ALMINGO — EXERCISE SYSTEM  v2 (Redesigned)
        ═══════════════════════════════════════════ */

    :root {
        --ex-green: #FFCE00;
        --ex-green-d: #E6AA00;
        --ex-red: #ff4b4b;
        --ex-red-d: #dd0000;
        --ex-blue: #1a1a1a;
        --ex-blue-d: #000000;
        --ex-yellow: #ffc800;
        --ex-yellow-d: #e6aa00;
        --ex-purple: #ce82ff;
        --ex-gray: #e5e5e5;
        --ex-text: #3c3c3c;
        --ex-radius: 16px;
        --card-border: 1.5px solid rgba(0, 0, 0, .07);
        --card-shadow: 0 2px 18px rgba(0, 0, 0, .07);
    }

    /* ── LAYOUT ── */
    .app-view-container {
        max-width: 660px;
        margin: 0 auto;
        padding: 28px 16px 60px;
    }

    /* ── PREMIUM INTRO SCREEN (unchanged) ── */
    .mix-intro-premium {
        position: relative;
        min-height: 441px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-radius: 30px;
        background:
            radial-gradient(ellipse at top left, rgba(221, 0, 0, .33) 0%, transparent 40%),
            radial-gradient(ellipse at top right, rgba(255, 206, 0, .33) 0%, transparent 40%),
            radial-gradient(ellipse at bottom left, rgba(255, 206, 0, .33) 0%, transparent 40%),
            radial-gradient(ellipse at bottom right, rgba(221, 0, 0, .33) 0%, transparent 40%),
            #ffffff;
        box-shadow: 0 25px 60px rgba(0, 0, 0, .06);
        padding: 40px;
        isolation: isolate;
    }

    .intro-content {
        position: relative;
        z-index: 10;
        text-align: center;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        animation: introFadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes introFadeUp {
        from {
            opacity: 0;
            transform: translateY(40px) scale(0.96);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .mascot-wrapper {
        position: relative;
        flex-shrink: 0;
    }

    .mascot-glow {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 150%;
        height: 150%;
        background: radial-gradient(circle, rgba(255, 206, 0, .12) 0%, transparent 70%);
        border-radius: 50%;
        z-index: -1;
        filter: blur(20px);
        animation: pulseGlow 3s infinite alternate;
    }

    @keyframes pulseGlow {
        0% {
            transform: translate(-50%, -50%) scale(0.8);
            opacity: .4;
        }

        100% {
            transform: translate(-50%, -50%) scale(1.2);
            opacity: .8;
        }
    }

    .intro-mascot {
        width: 80px;
        filter: drop-shadow(0 15px 30px rgba(0, 0, 0, .3));
    }

    .mascot-float {
        animation: floatMascot 4s ease-in-out infinite;
    }

    @keyframes floatMascot {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-12px);
        }
    }

    .intro-title {
        font-size: 2.56rem;
        font-weight: 900;
        color: #000;
        line-height: 1.15;
        margin-bottom: 20px;
        letter-spacing: -1.5px;
        text-shadow: 0 2px 20px rgba(0, 0, 0, .05);
    }

    .title-highlight {
        color: #DD0000;
        display: inline-block;
        position: relative;
    }

    .intro-desc {
        font-size: 1.15rem;
        color: #000;
        font-weight: 700;
        line-height: 1.7;
        margin-bottom: 40px;
        padding: 0 10px;
        max-width: 520px;
        margin-left: auto;
        margin-right: auto;
    }

    .intro-desc p {
        margin: 0 0 8px 0;
        text-align: left;
    }

    .intro-desc p:last-child {
        margin-bottom: 0;
    }

    .intro-desc h1,
    .intro-desc h2,
    .intro-desc h3,
    .intro-desc h4 {
        text-align: left;
        margin: 0 0 8px 0;
    }

    .intro-desc ul,
    .intro-desc ol {
        text-align: left;
        display: inline-block;
        margin: 0 auto 8px auto;
    }

    .intro-desc li {
        margin-bottom: 4px;
    }

    .intro-actions {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 50px;
        padding-left: 8px;
    }

    .btn-start-premium {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #DD0000, #FF3333, #DD0000);
        color: #fff;
        border: 2px solid #fff;
        padding: 12px 32px;
        border-radius: 14px;
        font-size: .875rem;
        font-weight: 800;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        box-shadow: 0 10px 25px rgba(221, 0, 0, .25);
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        width: 100%;
        max-width: 224px;
        letter-spacing: .3px;
    }

    .btn-start-premium::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255, 255, 255, .1), transparent);
        opacity: 0;
        transition: opacity .3s;
    }

    .btn-start-premium:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 25px 45px rgba(221, 0, 0, .3);
        color: #fff;
    }

    .btn-start-premium:hover::before {
        opacity: 1;
    }

    .btn-start-premium:active {
        transform: translateY(2px) scale(0.98);
    }

    .btn-start-premium .btn-icon {
        background: #fff;
        color: #DD0000;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: .8rem;
        transition: all .3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, .1);
    }

    .btn-start-premium:hover .btn-icon {
        background: #FFCE00;
        color: #000;
        transform: scale(1.1) rotate(5deg);
    }

    .btn-shine {
        position: absolute;
        top: 0;
        left: -100%;
        width: 50%;
        height: 100%;
        background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, 0) 100%);
        transform: skewX(-20deg);
        animation: shineEffect 4s infinite;
    }

    @keyframes shineEffect {
        0% {
            left: -100%;
        }

        20%,
        100% {
            left: 200%;
        }
    }

    .btn-close-intro {
        position: absolute;
        top: 16px;
        right: 20px;
        background: rgba(0, 0, 0, .03);
        border: 1px solid rgba(0, 0, 0, .06);
        color: #000;
        font-size: 1.2rem;
        cursor: pointer;
        opacity: .5;
        transition: all .2s;
        z-index: 20;
        line-height: 1;
        padding: 8px 12px;
        text-decoration: none;
        border-radius: 12px;
        backdrop-filter: blur(10px);
    }

    .btn-close-intro:hover {
        opacity: 1;
        background: #DD0000;
        color: #fff;
        border-color: #DD0000;
        transform: rotate(90deg);
    }

    .floating-shape {
        position: absolute;
        border-radius: 50%;
        filter: blur(60px);
        z-index: 1;
    }

    @media(max-width:640px) {
        .mix-intro-premium {
            min-height: 400px;
            padding: 30px 20px;
            border-radius: 20px;
        }

        .intro-mascot {
            width: 60px;
        }

        .intro-title {
            font-size: 1.6rem;
        }

        .intro-content {
            max-width: 100%;
        }

        .intro-desc {
            font-size: 1rem;
            padding: 0;
        }

        .btn-start-premium {
            max-width: 100%;
            padding: 10px 20px;
            font-size: .8rem;
            border-radius: 12px;
        }

        .intro-actions {
            gap: 30px;
        }
    }

    /* ═══════════════════════════════
           HUD  (Progress Bar + Controls)
        ═══════════════════════════════ */
    .mix-hud {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 20px 0 12px;
        background: #fff;
        border-radius: 18px;
        border: var(--card-border);
        box-shadow: var(--card-shadow);
        padding: 12px 16px;
    }

    .btn-close-mix {
        width: 38px;
        height: 38px;
        border-radius: 11px;
        background: #f5f5f5;
        color: #888;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        text-decoration: none;
        transition: all .2s;
        flex-shrink: 0;
        border: 1px solid rgba(0, 0, 0, .07);
    }

    .btn-close-mix:hover {
        background: #fee2e2;
        color: #DD0000;
        border-color: #fecaca;
    }

    .mix-progress-wrap {
        flex: 1;
        height: 10px;
        background: #eee;
        border-radius: 99px;
        overflow: hidden;
    }

    .mix-progress-fill {
        height: 100%;
        width: 0%;
        background: linear-gradient(90deg, var(--ex-green), #FFE566);
        border-radius: 99px;
        transition: width .45s cubic-bezier(.16, 1, .3, 1);
    }

    @keyframes heartShake {

        0%,
        100% {
            transform: scale(1);
        }

        30% {
            transform: scale(1.4) rotate(-10deg);
        }

        60% {
            transform: scale(.8) rotate(10deg);
        }
    }

    /* ── Global font override for all exercises ── */
    .mix-container,
    .mix-container * {
        font-family: 'Poppins', sans-serif;
    }

    /* ── UNIFIED EXERCISE CARD WRAPPER ──
           Her alıştırma bu wrapper içinde, sabit min-height ile */
    .ex-card {
        width: 100%;
        max-width: 480px;
        min-height: 420px;
        margin: 0 auto;
        background: #fff;
        border-radius: 22px;
        border: 1.5px solid #E2DDD6;
        box-shadow: 0 4px 24px rgba(0, 0, 0, .07);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        position: relative;
    }

    /* Üst şerit — sarı */
    .ex-card::before {
        content: '';
        display: block;
        height: 4px;
        background: #FFCE00;
        flex-shrink: 0;
    }

    .ex-card-top {
        padding: 14px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid #F4F1EC;
        flex-shrink: 0;
    }

    .ex-card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 24px 24px 20px;
        gap: 16px;
    }

    .ex-card-footer {
        padding: 14px 20px;
        border-top: 1px solid #F4F1EC;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        flex-shrink: 0;
    }

    /* Exercise type badge */
    .mix-type-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: .6rem;
        font-weight: 700;
        letter-spacing: 1.6px;
        text-transform: uppercase;
        color: #aaa;
        padding: 5px 14px;
        background: #f5f5f5;
        border-radius: 99px;
        border: 1px solid rgba(0, 0, 0, .05);
        margin-bottom: 0;
    }

    .mix-type-badge::before {
        content: '';
        display: inline-block;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #FFCE00;
        flex-shrink: 0;
    }

    .badge-study {
        color: #aaa;
    }

    .badge-flip {
        color: #aaa;
    }

    .badge-quiz {
        color: #aaa;
    }

    .badge-scramble {
        color: #aaa;
    }

    .badge-fill {
        color: #aaa;
    }

    .badge-write {
        color: #aaa;
    }

    .badge-match {
        color: #aaa;
    }

    /* ═══════════════════════════════
           EXERCISE CONTAINER (animated)
        ═══════════════════════════════ */
    .mix-container {
        background: #fff;
        border-radius: 22px;
        box-shadow: var(--card-shadow);
        border: var(--card-border);
        padding: 32px 28px 28px;
        min-height: 480px;
        display: flex;
        flex-direction: column;
    }

    .mix-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    /* Slide-in animation for each exercise */
    @keyframes exSlideIn {
        from {
            opacity: 0;
            transform: translateY(22px) scale(.97);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .ex-animate {
        animation: exSlideIn .35s cubic-bezier(.16, 1, .3, 1) both;
    }

    /* ══════════════════════════════════════════════
           PREMIUM STUDY CARD  —  Babel-style v4
           Font: Poppins · Weight: 400/500/600 (ince)
        ══════════════════════════════════════════════ */

    /* Force Poppins everywhere in study */
    #mix-study,
    #mix-study * {
        font-family: 'Poppins', sans-serif;
    }

    #mix-study {
        gap: 20px;
    }

    /* ── Outer card ── */
    .premium-study-card {
        width: 100%;
        max-width: 480px;
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid #e8e8e8;
        box-shadow:
            0 2px 8px rgba(0, 0, 0, .04),
            0 12px 40px rgba(0, 0, 0, .07);
        overflow: hidden;
        position: relative;
        margin: 0 auto;
    }

    /* No ::before stripe — Babel style is clean/borderless top */
    .premium-study-card::before {
        display: none;
    }

    /* ── Header row: flag chips + audio ── */
    .premium-study-header {
        padding: 16px 20px 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid #f0f0f0;
    }

    .premium-study-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: .72rem;
        font-weight: 500;
        color: #aaaaaa;
        letter-spacing: .2px;
        background: none;
        border: none;
        padding: 0;
    }

    .premium-study-badge i {
        display: none;
    }

    /* Flag chips — DE and TR side by side */
    .study-chip {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: .68rem;
        font-weight: 500;
        color: #555;
        background: #f5f5f5;
        border: 1px solid #ebebeb;
        border-radius: 8px;
        padding: 4px 10px;
        letter-spacing: .1px;
    }

    .study-chips {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .study-chip-arrow {
        font-size: .65rem;
        color: #ccc;
        font-weight: 400;
    }

    /* Audio button — Babel style: round, ghost */
    .premium-audio-btn {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #f5f5f5;
        color: #333;
        border: 1px solid #ebebeb;
        font-size: .95rem;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background .18s ease, transform .18s ease, border-color .18s ease;
    }

    .premium-audio-btn:hover {
        background: #1a1a1a;
        border-color: #1a1a1a;
        color: #fff;
        transform: scale(1.07);
    }

    .premium-audio-btn:active {
        transform: scale(.94);
    }

    /* ── Image area ── */
    .premium-study-img-wrap {
        width: 100%;
        height: 200px;
        position: relative;
        overflow: hidden;
        background: #f7f7f7;
    }

    .premium-study-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .6s ease;
    }

    .premium-study-card:hover .premium-study-img {
        transform: scale(1.04);
    }

    .premium-study-img-wrap::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 80px;
        background: linear-gradient(to top, #fff 0%, transparent 100%);
    }

    /* ── Main body ── */
    .premium-study-content {
        padding: 32px 36px 36px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 0;
    }

    /* Source-language micro-label */
    .study-lang-pill {
        font-size: .65rem;
        font-weight: 500;
        letter-spacing: .5px;
        color: #b0b0b0;
        text-transform: uppercase;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* ── Hero word — Babel: large but NOT heavy ── */
    .premium-study-de {
        font-size: 2.6rem;
        font-weight: 600;
        /* Poppins SemiBold — NOT Bold/Black */
        color: #111111;
        line-height: 1.15;
        margin: 0 0 4px 0;
        letter-spacing: -0.5px;
        width: 100%;
        word-break: break-word;
    }

    .premium-study-de.is-sentence {
        font-size: 1.55rem;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 1.45;
    }

    /* Thin separator line */
    .study-divider {
        width: 100%;
        height: 1px;
        background: #f0f0f0;
        margin: 24px 0;
        flex-shrink: 0;
    }

    /* ── Translation reveal ── */
    .premium-study-tr-reveal {
        opacity: 0;
        transform: translateY(12px);
        transition: opacity .45s cubic-bezier(.16, 1, .3, 1),
            transform .45s cubic-bezier(.16, 1, .3, 1);
        width: 100%;
    }

    .premium-study-tr-reveal.shown {
        opacity: 1;
        transform: translateY(0);
    }

    .premium-study-tr-reveal::before {
        display: none;
    }

    /* Micro-label above translation */
    .tr-reveal-label {
        font-size: .62rem;
        font-weight: 500;
        letter-spacing: .5px;
        text-transform: uppercase;
        color: #b0b0b0;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Translation text — medium weight, calm */
    .premium-study-tr {
        font-size: 1.5rem;
        font-weight: 500;
        /* Poppins Medium */
        color: #333333;
        line-height: 1.4;
        letter-spacing: -.2px;
    }

    .premium-study-tr.is-sentence {
        font-size: 1.1rem;
        font-weight: 400;
        line-height: 1.6;
    }

    /* ── Word type tag (optional) ── */
    .study-word-type {
        display: inline-block;
        font-size: .6rem;
        font-weight: 500;
        color: #999;
        background: #f5f5f5;
        border: 1px solid #ebebeb;
        border-radius: 6px;
        padding: 3px 9px;
        margin-top: 10px;
        letter-spacing: .3px;
    }

    /* ── Continue button — Babel: full-width, bold yellow ── */
    .premium-next-btn {
        width: 100%;
        max-width: 480px;
        padding: 16px 24px;
        font-size: .88rem;
        font-weight: 600;
        border-radius: 14px;
        letter-spacing: .3px;
        justify-content: center;
        box-shadow: none;
        transition: background .15s ease, transform .15s ease, box-shadow .15s ease;
    }

    .premium-next-btn:hover {
        background: #FFD93D;
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(255, 206, 0, .35);
    }

    .premium-next-btn:active {
        transform: translateY(1px);
        box-shadow: none;
    }

    /* Keyboard hint */
    .study-keyboard-hint {
        font-size: .6rem;
        font-weight: 400;
        color: #cccccc;
        margin-top: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    .study-keyboard-hint kbd {
        background: #f5f5f5;
        border: 1px solid #e8e8e8;
        border-radius: 5px;
        padding: 2px 8px;
        font-size: .58rem;
        font-family: 'Poppins', sans-serif;
        color: #aaaaaa;
        font-weight: 500;
    }

    @media(max-width:600px) {
        .premium-study-de {
            font-size: 2rem;
        }

        .premium-study-tr {
            font-size: 1.2rem;
        }

        .premium-study-content {
            padding: 24px 24px 28px;
        }

        .premium-next-btn {
            font-size: .85rem;
        }
    }

    /* ══════════════
           FLIP CARD
        ══════════════ */
    /* ══════════════════
           FLIP CARD
        ══════════════════ */
    .duo-flip-wrap {
        width: 100%;
        max-width: 480px;
        perspective: 1400px;
        cursor: pointer;
        height: 388px;
        /* ex-card::before (4px) + top(51px) + body(flex:1) + footer(51px) */
    }

    .duo-flip-inner {
        position: relative;
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transition: transform .8s cubic-bezier(.4, 0, .2, 1);
        border-radius: 22px;
    }

    .duo-flip-wrap.flipped .duo-flip-inner {
        transform: rotateY(180deg);
    }

    .duo-flip-front,
    .duo-flip-back {
        position: absolute;
        inset: 0;
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        border-radius: 22px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    /* ── FRONT ── */
    .duo-flip-front {
        background: #fff;
        border: 1.5px solid #E2DDD6;
        box-shadow: 0 4px 24px rgba(0, 0, 0, .07);
    }

    .duo-flip-front::before {
        content: '';
        display: block;
        height: 4px;
        background: #FFCE00;
        flex-shrink: 0;
    }

    .duo-flip-front-top {
        padding: 14px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid #F4F1EC;
        flex-shrink: 0;
    }

    .duo-flip-front-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px 32px;
        position: relative;
        overflow: hidden;
    }

    .duo-flip-ghost {
        position: absolute;
        font-size: 9rem;
        font-weight: 700;
        color: rgba(0, 0, 0, .025);
        letter-spacing: -5px;
        user-select: none;
        pointer-events: none;
        transform: rotate(-12deg);
        line-height: 1;
    }

    .duo-flip-front-footer {
        padding: 12px 20px;
        border-top: 1px solid #F4F1EC;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        flex-shrink: 0;
    }

    .flip-lang {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: .6rem;
        font-weight: 600;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: #C0BAB0;
    }

    .flip-pill {
        display: flex;
        align-items: center;
        gap: 5px;
        background: #FFFBEB;
        border: 1.5px solid #FFCE00;
        border-radius: 99px;
        padding: 5px 12px 5px 8px;
        font-size: .62rem;
        font-weight: 600;
        color: #111;
        box-shadow: 0 2px 8px rgba(255, 206, 0, .2);
    }

    .flip-pill i {
        font-size: 15px;
        color: #111;
        animation: flipSpin 3s ease-in-out infinite;
    }

    @keyframes flipSpin {

        0%,
        55% {
            transform: rotate(0deg);
        }

        80% {
            transform: rotate(180deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .flip-tap-hint {
        font-size: .65rem;
        font-weight: 500;
        color: #C8C2B8;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .flip-tap-arrows {
        display: flex;
        gap: 1px;
    }

    .flip-tap-arrows i {
        font-size: 10px;
        animation: tapArr 1.8s ease-in-out infinite;
    }

    .flip-tap-arrows i:nth-child(2) {
        animation-delay: .12s;
    }

    .flip-tap-arrows i:nth-child(3) {
        animation-delay: .24s;
    }

    @keyframes tapArr {

        0%,
        100% {
            opacity: .25;
        }

        50% {
            opacity: .9;
        }
    }

    .flip-de-text {
        font-size: 2.6rem;
        font-weight: 600;
        color: #0f0f0f;
        text-align: center;
        line-height: 1.15;
        letter-spacing: -.8px;
        position: relative;
        z-index: 1;
    }

    .flip-de-text.is-sentence {
        font-size: 1.65rem;
        font-weight: 500;
        letter-spacing: -.2px;
    }

    /* ── BACK ── */
    .duo-flip-back {
        transform: rotateY(180deg);
        background: linear-gradient(135deg, #FFF8E7 0%, #FFECD2 35%, #FFD6D6 70%, #FFC0C0 100%);
        box-shadow: 0 8px 32px rgba(255, 180, 100, .18);
    }

    .duo-flip-back::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 22px;
        background:
            radial-gradient(ellipse at 15% 15%, rgba(255, 200, 100, .25) 0%, transparent 55%),
            radial-gradient(ellipse at 85% 85%, rgba(255, 150, 150, .15) 0%, transparent 50%);
        pointer-events: none;
        z-index: 0;
    }

    .duo-flip-back-top {
        padding: 14px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid rgba(0, 0, 0, .06);
        position: relative;
        z-index: 1;
        flex-shrink: 0;
    }

    .duo-flip-back-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px 32px;
        gap: 10px;
        position: relative;
        z-index: 1;
    }

    .duo-flip-back-footer {
        padding: 12px 20px;
        border-top: 1px solid rgba(0, 0, 0, .06);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: .62rem;
        font-weight: 500;
        color: rgba(0, 0, 0, .25);
        position: relative;
        z-index: 1;
        flex-shrink: 0;
        letter-spacing: .3px;
    }

    .flip-back-lang {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: .6rem;
        font-weight: 600;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: rgba(0, 0, 0, .35);
    }

    .flip-back-orig {
        font-size: .65rem;
        font-weight: 500;
        color: rgba(180, 100, 60, .55);
        font-style: italic;
    }

    .flip-tr-label {
        font-size: .58rem;
        font-weight: 600;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: rgba(0, 0, 0, .3);
        text-align: center;
    }

    .flip-tr-text {
        font-size: 2.2rem;
        font-weight: 600;
        color: #8B3A00;
        line-height: 1.15;
        letter-spacing: -.5px;
        text-align: center;
        text-shadow: 0 2px 20px rgba(255, 180, 100, .2);
    }

    .flip-tr-text.is-sentence {
        font-size: 1.5rem;
        font-weight: 500;
        letter-spacing: -.2px;
    }

    .flip-click-ring {
        display: none;
    }

    /* Devam Et butonu — kartın altında, her zaman görünür */
    .flip-action-row {
        width: 100%;
        max-width: 480px;
        margin: 10px auto 0;
    }

    /* ══════════════════
           QUIZ (MC)
        ══════════════════ */
    .duo-quiz-question {
        width: 100%;
        max-width: 480px;
        text-align: center;
        margin-bottom: 18px;
    }

    .quiz-q-label {
        font-size: .6rem;
        font-weight: 600;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: #C0BAB0;
        margin-bottom: 10px;
    }

    .quiz-q-tr {
        font-size: 1.6rem;
        font-weight: 600;
        color: #111;
        line-height: 1.3;
        letter-spacing: -.3px;
        animation: exSlideIn .35s cubic-bezier(.16, 1, .3, 1);
    }

    .quiz-q-img {
        width: 110px;
        border-radius: 14px;
        margin: 0 auto 14px;
        display: none;
        box-shadow: 0 6px 16px rgba(0, 0, 0, .1);
    }

    .duo-quiz-options {
        display: flex;
        flex-direction: column;
        gap: 9px;
        width: 100%;
        max-width: 460px;
    }

    .duo-opt-btn {
        background: #fff;
        border: 1.5px solid rgba(0, 0, 0, .1);
        border-bottom: 3px solid rgba(0, 0, 0, .1);
        border-radius: 14px;
        padding: 13px 18px;
        font-size: .9rem;
        font-weight: 600;
        color: #2a2a2a;
        cursor: pointer;
        text-align: left;
        display: flex;
        align-items: center;
        gap: 12px;
        width: 100%;
        transition: all .15s ease;
    }

    .duo-opt-btn:hover:not(:disabled) {
        border-color: #111;
        border-bottom-color: #000;
        background: #FAFAF8;
        transform: translateY(-1px);
    }

    .duo-opt-btn:active:not(:disabled) {
        transform: translateY(1px);
        border-bottom-width: 1px;
    }

    .duo-opt-btn:disabled {
        cursor: default;
    }

    .duo-opt-letter {
        width: 30px;
        height: 30px;
        border-radius: 8px;
        background: #F7F5F0;
        color: #888;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: .75rem;
        font-weight: 700;
        flex-shrink: 0;
        transition: all .15s;
    }

    .duo-opt-btn.is-correct {
        background: #FFFBEB !important;
        color: #7a5c00 !important;
        border-color: #FFCE00 !important;
        border-bottom-color: #E6AA00 !important;
    }

    .duo-opt-btn.is-correct .duo-opt-letter {
        background: #FFCE00;
        color: #111;
    }

    .duo-opt-btn.is-wrong {
        border-color: #ffbfbf !important;
        border-bottom-color: #f87171 !important;
        background: #fff5f5 !important;
        color: #7f1d1d !important;
    }

    .duo-opt-btn.is-wrong .duo-opt-letter {
        background: #ffd5d5;
        color: #7f1d1d;
    }

    .duo-opt-btn.faded {
        opacity: .35;
        pointer-events: none;
    }

    .q-shake {
        animation: qShake .45s cubic-bezier(.36, .07, .19, .97) both;
    }

    @keyframes qShake {

        0%,
        100% {
            transform: translateX(0);
        }

        20%,
        60% {
            transform: translateX(-8px);
        }

        40%,
        80% {
            transform: translateX(8px);
        }
    }

    /* ════════════════════════
           FEEDBACK BANNER
        ════════════════════════ */
    .duo-feedback {
        width: 100%;
        max-width: 460px;
        border-radius: 14px;
        padding: 14px 18px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        opacity: 0;
        transform: translateY(10px);
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        pointer-events: none;
        margin-top: 14px;
    }

    .duo-feedback.show {
        opacity: 1;
        transform: translateY(0);
        pointer-events: all;
    }

    .duo-feedback.fb-correct {
        background: #FFFBEB;
        border: 1.5px solid #FFCE00;
    }

    .duo-feedback.fb-wrong {
        background: #fff5f5;
        border: 1.5px solid #ffd5d5;
    }

    .fb-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .fb-icon {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        flex-shrink: 0;
    }

    .duo-feedback.fb-correct .fb-icon {
        background: #FFCE00;
        color: #111;
    }

    .duo-feedback.fb-wrong .fb-icon {
        background: #ffd5d5;
        color: #7f1d1d;
    }

    .fb-title {
        font-size: 1.05rem;
        font-weight: 700;
        margin-bottom: 2px;
    }

    .duo-feedback.fb-correct .fb-title {
        color: #7a5c00;
    }

    .duo-feedback.fb-wrong .fb-title {
        color: #7f1d1d;
    }

    .fb-sub {
        font-size: .78rem;
        font-weight: 500;
        color: #888;
        margin-top: 2px;
    }

    .fb-btn {
        border: none;
        border-radius: 11px;
        padding: 10px 20px;
        font-size: .85rem;
        font-weight: 700;
        cursor: pointer;
        transition: all .15s ease;
        white-space: nowrap;
        border-bottom: 3px solid transparent;
        font-family: 'Poppins', sans-serif;
    }

    .duo-feedback.fb-correct .fb-btn {
        background: #FFCE00;
        color: #111;
        border-bottom-color: #E6AA00;
    }

    .duo-feedback.fb-wrong .fb-btn {
        background: #1a1a1a;
        color: #fff;
        border-bottom-color: #000;
    }

    .fb-btn:hover {
        opacity: .9;
        transform: translateY(-1px);
    }

    .fb-btn:active {
        transform: translateY(1px);
        border-bottom-width: 1px;
    }

    /* ══════════════════
           SCRAMBLE
        ══════════════════ */
    .duo-scramble-prompt {
        font-size: .95rem;
        font-weight: 600;
        color: #888;
        text-align: center;
        margin-bottom: 16px;
        line-height: 1.5;
    }

    .duo-drop-zone {
        min-height: 52px;
        border: 2px dashed rgba(0, 0, 0, .12);
        border-radius: 13px;
        margin-bottom: 16px;
        display: flex;
        flex-wrap: wrap;
        gap: 7px;
        padding: 9px 13px;
        align-items: center;
        width: 100%;
        max-width: 460px;
        transition: border-color .2s;
        background: #FAFAF8;
    }

    .duo-drop-zone.has-words {
        border-color: #FFCE00;
        background: #FFFBEB;
    }

    .duo-drop-zone:empty::after {
        content: 'Kelimeleri buraya ekle';
        color: #C8C2B8;
        font-size: .83rem;
        font-weight: 500;
    }

    .duo-word-pool {
        display: flex;
        flex-wrap: wrap;
        gap: 7px;
        justify-content: center;
        width: 100%;
        max-width: 460px;
        min-height: 44px;
        margin-bottom: 4px;
    }

    .duo-word-chip {
        background: #fff;
        border: 1.5px solid rgba(0, 0, 0, .1);
        border-bottom: 3px solid rgba(0, 0, 0, .1);
        border-radius: 10px;
        padding: 8px 14px;
        font-size: .88rem;
        font-weight: 600;
        color: #2a2a2a;
        cursor: pointer;
        user-select: none;
        transition: all .15s ease;
        line-height: 1.2;
    }

    .duo-word-chip:hover:not(.used) {
        border-color: #111;
        border-bottom-color: #000;
        background: #FAFAF8;
        transform: translateY(-1px);
    }

    .duo-word-chip:active:not(.used) {
        transform: translateY(1px);
        border-bottom-width: 1px;
    }

    .duo-word-chip.used {
        opacity: .18;
        pointer-events: none;
    }

    .duo-word-chip.placed {
        background: #FFFBEB;
        border-color: #FFCE00;
        border-bottom-color: #E6AA00;
        color: #111;
    }

    .duo-word-chip.placed:hover {
        border-color: #ffbfbf;
        border-bottom-color: #f87171;
        background: #fff5f5;
        color: #7f1d1d;
    }

    /* ══════════════════
           FILL IN THE BLANK
        ══════════════════ */
    .duo-fill-sentence {
        font-size: 1.4rem;
        font-weight: 600;
        color: #111;
        text-align: center;
        margin-bottom: 18px;
        line-height: 2.4;
        width: 100%;
        max-width: 480px;
        letter-spacing: -.2px;
    }

    .duo-fill-input {
        display: inline-block;
        min-width: 80px;
        border: none;
        border-bottom: 2.5px solid #111;
        background: transparent;
        font-size: 1.4rem;
        font-weight: 600;
        color: #111;
        text-align: center;
        outline: none;
        padding: 0 6px;
        margin: 0 4px;
        font-family: 'Poppins', sans-serif;
        transition: border-color .2s;
    }

    .duo-fill-input:focus {
        border-bottom-color: #FFCE00;
    }

    .duo-fill-input.correct {
        border-bottom-color: #E6AA00;
        color: #7a5c00;
    }

    .duo-fill-input.wrong {
        border-bottom-color: #f87171;
        color: #7f1d1d;
    }

    /* ══════════════════
           WRITE
        ══════════════════ */
    .duo-write-prompt {
        font-size: 1rem;
        font-weight: 600;
        color: #888;
        text-align: center;
        margin-bottom: 16px;
        line-height: 1.5;
    }

    .duo-write-img {
        width: 90px;
        border-radius: 14px;
        margin: 0 auto 16px;
        display: none;
        box-shadow: 0 6px 16px rgba(0, 0, 0, .1);
    }

    .duo-write-box {
        width: 100%;
        max-width: 460px;
        border: 1.5px solid rgba(0, 0, 0, .1);
        border-bottom: 3px solid rgba(0, 0, 0, .1);
        border-radius: 14px;
        padding: 14px 16px;
        font-size: 1rem;
        font-weight: 600;
        color: #111;
        resize: none;
        outline: none;
        font-family: 'Poppins', sans-serif;
        transition: border-color .2s, background .2s;
        margin-bottom: 12px;
        background: #FAFAF8;
    }

    .duo-write-box:focus {
        border-color: #FFCE00;
        border-bottom-color: #E6AA00;
        background: #FFFBEB;
    }

    .duo-write-box.correct {
        border-color: #FFCE00;
        border-bottom-color: #E6AA00;
        background: #FFFBEB;
        color: #7a5c00;
    }

    .duo-write-box.wrong {
        border-color: #ffd5d5;
        border-bottom-color: #f87171;
        background: #fff5f5;
        color: #7f1d1d;
    }

    /* ═══════════
           MATCH
        ═══════════ */
    .duo-match-board {
        display: flex;
        gap: 12px;
        justify-content: center;
        width: 100%;
        max-width: 460px;
    }

    .duo-match-col {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 9px;
    }

    .match-card {
        background: #fff;
        border: 1.5px solid rgba(0, 0, 0, .1);
        border-bottom: 3px solid rgba(0, 0, 0, .1);
        border-radius: 13px;
        padding: 12px 10px;
        text-align: center;
        font-size: .88rem;
        font-weight: 600;
        color: #2a2a2a;
        cursor: pointer;
        user-select: none;
        transition: all .15s ease;
        min-height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Poppins', sans-serif;
    }

    .match-card:hover {
        border-color: #111;
        border-bottom-color: #000;
        background: #FAFAF8;
        transform: translateY(-1px);
    }

    .match-card:active {
        transform: translateY(1px);
        border-bottom-width: 1px;
    }

    .match-card.selected {
        border-color: #FFCE00 !important;
        border-bottom-color: #E6AA00 !important;
        background: #FFFBEB !important;
        color: #7a5c00 !important;
    }

    .match-card.matched {
        border-color: #FFCE00 !important;
        border-bottom-color: #E6AA00 !important;
        background: #FFFBEB !important;
        color: #7a5c00 !important;
        pointer-events: none;
        animation: matchPop .5s cubic-bezier(.175, .885, .32, 1.275) both;
    }

    @keyframes matchPop {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    .match-card.error {
        border-color: #ffd5d5 !important;
        border-bottom-color: #f87171 !important;
        background: #fff5f5 !important;
        color: #7f1d1d !important;
        animation: qShake .4s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(.93) translateY(8px);
        }

        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .fadeIn {
        animation: fadeIn .35s cubic-bezier(.16, 1, .3, 1) both;
    }

    /* ════════════════════════════════
           PRIMARY ACTION BUTTON (shared)
        ════════════════════════════════ */
    .mix-btn {
        background: #FFCE00;
        color: #111;
        border: none;
        border-bottom: 4px solid #E6AA00;
        border-radius: 14px;
        padding: 14px 32px;
        font-size: .9rem;
        font-weight: 800;
        cursor: pointer;
        transition: all .2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-family: 'Poppins', sans-serif;
        text-decoration: none;
        letter-spacing: .2px;
    }

    .mix-btn:hover {
        background: #FFD93D;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255, 206, 0, .35);
    }

    .mix-btn:active {
        transform: translateY(2px);
        border-bottom-width: 1px;
    }

    .mix-btn.btn-yellow {
        background: #FFCE00;
        color: #111;
        border-bottom-color: #E6AA00;
    }

    .mix-btn.btn-yellow:hover {
        background: #FFD93D;
    }

    .mix-btn.btn-black {
        background: #1a1a1a;
        color: #fff;
        border-bottom-color: #000;
    }

    .mix-btn.btn-black:hover {
        background: #333;
        transform: translateY(-2px);
    }

    /* ══════════════
           FINISH SCREEN
        ══════════════ */
    #mix-finish .finish-inner {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 36px 24px;
        width: 100%;
        max-width: 420px;
        animation: exSlideIn .5s cubic-bezier(.16, 1, .3, 1);
    }

    .finish-trophy {
        font-size: 4.5rem;
        animation: trophyBounce .9s cubic-bezier(.175, .885, .32, 1.275) .2s both;
        display: block;
    }

    @keyframes trophyBounce {
        0% {
            transform: scale(0) rotate(-15deg);
            opacity: 0;
        }

        70% {
            transform: scale(1.15) rotate(4deg);
            opacity: 1;
        }

        100% {
            transform: scale(1) rotate(0);
        }
    }

    .finish-headline {
        font-size: 2rem;
        font-weight: 900;
        color: #1e293b;
        margin: 16px 0 8px;
        letter-spacing: -.5px;
    }

    .finish-sub {
        font-size: .95rem;
        font-weight: 600;
        color: #64748b;
        margin-bottom: 28px;
        line-height: 1.6;
    }

    .finish-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
        width: 100%;
        max-width: 380px;
        margin-bottom: 28px;
    }

    .fstat {
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 16px;
        padding: 16px 12px;
        border: var(--card-border);
    }

    .fstat-xp {
        background: #FFFBEB;
        border-color: rgba(255, 206, 0, .4);
    }

    .fstat-correct {
        background: #f0fdf4;
        border-color: rgba(34, 197, 94, .3);
    }

    .fstat-time {
        background: #f0f9ff;
        border-color: rgba(14, 165, 233, .3);
    }

    .fstat-num {
        font-size: 1.9rem;
        font-weight: 900;
        letter-spacing: -1px;
        color: #1e293b;
    }

    .fstat-xp .fstat-num {
        color: #7a5c00;
    }

    .fstat-correct .fstat-num {
        color: #15803d;
    }

    .fstat-time .fstat-num {
        color: #0369a1;
    }

    .fstat-lbl {
        font-size: .62rem;
        font-weight: 700;
        color: #94a3b8;
        margin-top: 4px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    /* Confetti canvas */
    #finish-confetti {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 9999;
    }

    /* ═══════════════
           AUDIO BUTTON
        ═══════════════ */
    .btn-play-audio {
        width: 38px;
        height: 38px;
        border-radius: 11px;
        background: #f5f5f5;
        border: 1px solid rgba(0, 0, 0, .07);
        color: #888;
        font-size: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all .2s;
        flex-shrink: 0;
    }

    .btn-play-audio:hover {
        background: #1a1a1a;
        border-color: #1a1a1a;
        color: #FFCE00;
        transform: scale(1.08);
    }

    /* Hide old huds */
    .quiz-hud {
        display: none;
    }

    .match-app-container,
    .scramble-container,
    .fill-container,
    .write-container {
        box-shadow: none !important;
        padding: 0 !important;
        background: transparent !important;
        margin: 0 !important;
        max-width: 100% !important;
    }

    /* ── Mobile ── */
    @media(max-width:600px) {
        .mix-container {
            padding: 20px 14px;
        }

        .flip-de-text {
            font-size: 2rem;
        }

        .quiz-q-tr {
            font-size: 1.25rem;
        }

        .finish-stats {
            gap: 8px;
        }

        .fstat {
            padding: 12px 10px;
        }

        .duo-flip-wrap {
            height: 320px;
        }

        .mix-hud {
            padding: 10px 12px;
            gap: 10px;
        }
    }
</style>
@endsection

@section('content')
<div class="app-view-container">

    {{-- INTRO SCREEN (card) --}}
    <div id="mix-intro" class="mix-intro-premium">

        <div class="intro-content">
            <h1 class="intro-title" style="margin-bottom:20px;">
                <span class="title-highlight">{{ $lesson->lesson_title }}</span>
            </h1>
            @if($lesson->description)
            <div class="intro-desc" style="margin-bottom:30px; line-height:1.7;">{!! $lesson->description !!}</div>
            @endif
            <div class="intro-actions">
                <div class="mascot-wrapper">
                    @if(!$lesson->image_url) <div class="mascot-glow"></div> @endif
                    <img src="{{ $lesson->image_url ?? asset('assets/img/maskot4.png') }}"
                        alt="{{ $lesson->lesson_title }}"
                        class="intro-mascot {{ $lesson->image_url ? '' : 'mascot-float' }}"
                        style="{{ $lesson->image_url ? 'width:auto; height:160px; border-radius:12px; object-fit:cover;' : '' }}">
                </div>
            </div>
            <div style="display:flex; justify-content:center; margin-top:auto; padding-top:20px;">
                <button class="btn-start-premium" id="intro-start-btn" onclick="startMixApp(ALL_CARDS)">
                    <span class="btn-icon"><i class="bi bi-play-fill"></i></span>
                    <span class="btn-text">Alıştırmalara Git</span>
                    <span class="btn-shine"></span>
                </button>
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="btn-close-intro">
            <i class="bi bi-x-lg"></i>
        </a>
    </div>

    {{-- ═══ EXERCISE APP ═══ --}}
    <div id="mix-app-container" style="display:none;">

        {{-- HUD --}}
        <div class="mix-hud">
            <a href="{{ route('user.lesson.show', $lesson->id) }}" class="btn-close-mix" title="Çıkış">
                <i class="bi bi-x-lg"></i>
            </a>
            <div class="mix-progress-wrap">
                <div class="mix-progress-fill" id="unified-progress-bar"></div>
            </div>
            <button class="btn-play-audio" onclick="playCurrentMixAudio()" id="unified-audio-btn" title="Sesi Çal">
                <i class="bi bi-volume-up-fill"></i>
            </button>
        </div>

        {{-- Exercise type badge --}}
        <div style="text-align:center; margin-bottom:10px;">
            <span class="mix-type-badge" id="mix-type-badge"></span>
        </div>

        {{-- Container --}}
        <div class="mix-container" id="mix-main-container">
            <div class="mix-content">

                {{-- ── STUDY ── --}}
                <div id="mix-study" style="display:none; width:100%; flex-direction:column; align-items:center;"
                    class="ex-animate">
                    <div class="premium-study-card" id="study-card-wrap">

                        {{-- Header: dil chip'leri + ses butonu --}}
                        <div class="premium-study-header">
                            <div class="study-chips">
                                <span class="study-chip">🇩🇪 Almanca</span>
                                <span class="study-chip-arrow">→</span>
                                <span class="study-chip">🇹🇷 Türkçe</span>
                            </div>
                            <button class="premium-audio-btn" onclick="playCurrentMixAudio()" id="study-audio-btn"
                                title="Dinle">
                                <i class="bi bi-volume-up-fill"></i>
                            </button>
                        </div>

                        {{-- Resim (varsa) --}}
                        <div class="premium-study-img-wrap" id="study-img-wrap" style="display:none;">
                            <img id="study-img" class="premium-study-img">
                        </div>

                        {{-- İçerik --}}
                        <div class="premium-study-content">
                            <span class="study-lang-pill">🇩🇪 Almanca</span>
                            <div class="premium-study-de" id="study-de"></div>

                            <div class="study-divider"></div>

                            <div class="premium-study-tr-reveal" id="study-tr-container">
                                <span class="tr-reveal-label">🇹🇷 Türkçe karşılığı</span>
                                <div class="premium-study-tr" id="study-tr"></div>
                            </div>
                        </div>
                    </div>

                    {{-- Devam Et butonu + klavye ipucu --}}
                    <div style="display:flex; flex-direction:column; align-items:center; width:100%; max-width:480px;"
                        id="study-action-row">
                        <button class="mix-btn premium-next-btn" id="study-next-btn" onclick="mixStepComplete(0)">
                            Devam Et <i class="bi bi-arrow-right"></i>
                        </button>
                        <p class="study-keyboard-hint">
                            <kbd>Space</kbd> veya <kbd>Enter</kbd> ile devam et
                        </p>
                    </div>
                </div>

                {{-- ── FLIP ── --}}
                <div id="mix-flip" style="display:none; width:100%; flex-direction:column; align-items:center;">
                    <div class="duo-flip-wrap" id="flip-card-container" onclick="doMixFlip()">
                        <div class="duo-flip-inner" id="flip-card-inner">

                            {{-- Ön yüz --}}
                            <div class="duo-flip-front">
                                <div class="duo-flip-front-top">
                                    <div class="flip-lang">🇩🇪 Almanca</div>
                                    <div class="flip-pill">
                                        <i class="bi bi-arrow-repeat"></i> döndür
                                    </div>
                                </div>
                                <div class="duo-flip-front-body">
                                    <div class="duo-flip-ghost"><small>Alman<br>capp</small></div>
                                    <div class="flip-de-text" id="flip-de"></div>
                                </div>
                                <div class="duo-flip-front-footer">
                                    <div class="flip-tap-arrows">
                                        <i class="bi bi-chevron-right"></i>
                                        <i class="bi bi-chevron-right"></i>
                                        <i class="bi bi-chevron-right"></i>
                                    </div>
                                    <span class="flip-tap-hint">Türkçesini görmek için kartı döndür</span>
                                </div>
                            </div>

                            {{-- Arka yüz --}}
                            <div class="duo-flip-back">
                                <div class="duo-flip-back-top">
                                    <div class="flip-back-lang">🇹🇷 Türkçesi</div>
                                    <div class="flip-back-orig" id="flip-de-back"></div>
                                </div>
                                <div class="duo-flip-back-body">
                                    <div class="flip-tr-label">Türkçe karşılığı</div>
                                    <div class="flip-tr-text" id="flip-tr"></div>
                                </div>
                                <div class="duo-flip-back-footer">geri döndürmek için tekrar tıkla</div>
                            </div>

                        </div>
                    </div>
                    {{-- Devam Et — kart dışı, her zaman görünür --}}
                    <div class="flip-action-row">
                        <button class="mix-btn" style="width:100%;justify-content:center;"
                            onclick="event.stopPropagation(); mixStepComplete(0)">
                            Devam Et <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>

                {{-- ── QUIZ ── --}}
                <div id="mix-quiz" style="display:none; width:100%; flex-direction:column; align-items:center; gap:0;">
                    <div class="duo-quiz-question">
                        <img id="quiz-img" class="quiz-q-img">
                        <div class="quiz-q-tr" id="quiz-tr"></div>
                    </div>
                    <div class="duo-quiz-options" id="quiz-options"></div>
                    <div class="duo-feedback" id="quiz-feedback">
                        <div class="fb-left">
                            <div class="fb-icon" id="quiz-fb-icon"></div>
                            <div>
                                <div class="fb-title" id="quiz-fb-title"></div>
                                <div class="fb-sub" id="quiz-fb-sub"></div>
                            </div>
                        </div>
                        <button class="fb-btn" onclick="mixStepComplete(0)">Devam Et</button>
                    </div>
                </div>

                {{-- ── SCRAMBLE ── --}}
                <div id="mix-scramble" style="display:none; width:100%; flex-direction:column; align-items:center;">
                    <div class="duo-scramble-prompt" id="scramble-tr"></div>
                    <div class="duo-drop-zone" id="scramble-target"></div>
                    <div class="duo-word-pool" id="scramble-pool"></div>
                    <div class="duo-feedback" id="scramble-feedback" style="margin-top:20px;">
                        <div class="fb-left">
                            <div class="fb-icon" id="scr-fb-icon"></div>
                            <div>
                                <div class="fb-title" id="scr-fb-title"></div>
                                <div class="fb-sub" id="scr-fb-sub"></div>
                            </div>
                        </div>
                        <button class="fb-btn" onclick="mixStepComplete(0)">Devam Et</button>
                    </div>
                    <div style="display:flex; justify-content:flex-end; width:100%; max-width:480px; margin-top:16px;"
                        id="scramble-action-row">
                        <button class="mix-btn btn-black" id="scramble-check-btn" onclick="checkMixScramble()">Kontrol
                            Et <i class="bi bi-check-lg"></i></button>
                    </div>
                </div>

                {{-- ── FILL ── --}}
                <div id="mix-fill" style="display:none; width:100%; flex-direction:column; align-items:center;">
                    <div class="duo-scramble-prompt" id="fill-tr"></div>
                    <div class="duo-fill-sentence" id="fill-sentence"></div>
                    <div class="duo-word-pool" id="fill-pool" style="margin-bottom:8px;"></div>
                    <div class="duo-feedback" id="fill-feedback" style="margin-top:12px;">
                        <div class="fb-left">
                            <div class="fb-icon" id="fill-fb-icon"></div>
                            <div>
                                <div class="fb-title" id="fill-fb-title"></div>
                                <div class="fb-sub" id="fill-fb-sub"></div>
                            </div>
                        </div>
                        <button class="fb-btn" onclick="mixStepComplete(0)">Devam Et</button>
                    </div>
                    <div style="display:flex; justify-content:flex-end; width:100%; max-width:480px; margin-top:16px;"
                        id="fill-action-row">
                        <button class="mix-btn btn-black" id="fill-check-btn" onclick="checkMixFill()">Kontrol Et <i
                                class="bi bi-check-lg"></i></button>
                    </div>
                </div>

                {{-- ── WRITE ── --}}
                <div id="mix-write" style="display:none; width:100%; flex-direction:column; align-items:center;">
                    <img id="write-img" class="duo-write-img">
                    <div class="duo-write-prompt" id="write-tr"></div>
                    <textarea id="write-input-box" class="duo-write-box" rows="2"
                        placeholder="Buraya yaz..."></textarea>
                    <div class="duo-word-pool" id="write-pool" style="margin-bottom:8px;"></div>
                    <div class="duo-feedback" id="write-feedback" style="margin-top:12px;">
                        <div class="fb-left">
                            <div class="fb-icon" id="write-fb-icon"></div>
                            <div>
                                <div class="fb-title" id="write-fb-title"></div>
                                <div class="fb-sub" id="write-fb-sub"></div>
                            </div>
                        </div>
                        <button class="fb-btn" onclick="mixStepComplete(0)">Devam Et</button>
                    </div>
                    <div style="display:flex; justify-content:flex-end; width:100%; max-width:480px; margin-top:16px;"
                        id="write-action-row">
                        <button class="mix-btn btn-black" id="write-check-btn" onclick="checkMixWrite()">Kontrol Et <i
                                class="bi bi-check-lg"></i></button>
                    </div>
                </div>

                {{-- ── MATCH ── --}}
                <div id="mix-match" style="display:none; width:100%; flex-direction:column; align-items:center;">
                    <div class="duo-match-board">
                        <div id="match-col-de" class="duo-match-col"></div>
                        <div id="match-col-tr" class="duo-match-col"></div>
                    </div>
                </div>

                {{-- ── FINISH ── --}}
                <div id="mix-finish" style="display:none; width:100%; justify-content:center;">
                    <div class="finish-inner">
                        <span class="finish-trophy">🏆</span>
                        <h2 class="finish-headline">Mükemmel!</h2>
                        <p class="finish-sub">Bugünkü karışık alıştırmayı<br>başarıyla tamamladın!</p>
                        <div class="finish-stats">
                            <div class="fstat fstat-xp">
                                <span class="fstat-num" id="finish-xp">0</span>
                                <span class="fstat-lbl">XP</span>
                            </div>
                            <div class="fstat fstat-correct">
                                <span class="fstat-num" id="finish-correct">0</span>
                                <span class="fstat-lbl">Doğru</span>
                            </div>
                            <div class="fstat fstat-time">
                                <span class="fstat-num" id="finish-time">0</span>
                                <span class="fstat-lbl">Saniye</span>
                            </div>
                        </div>
                        <a href="{{ route('dashboard') }}" class="mix-btn btn-black"
                            style="text-decoration:none; margin-bottom:12px;">
                            <i class="bi bi-house-fill"></i> Ana Sayfaya Dön
                        </a>
                    </div>
                </div>

            </div>{{-- /mix-content --}}
        </div>{{-- /mix-container --}}
    </div>

    {{-- Confetti Canvas --}}
    <canvas id="finish-confetti"></canvas>

</div>

<script>
    @php
    $mappedCards = $lesson -> cards -> map(function ($w) {
        return [
            'id' => $w -> id,
            'type' => $w -> type, // 'word' or 'sentence'
            'de' => strip_tags($w -> german_content),
            'tr' => strip_tags($w -> turkish_content),
            'image' => $w -> image ? $w -> image : null,
            'audio' => $w -> audio ? $w -> audio : null
        ];
    }) -> values();
    @endphp
    const ALL_CARDS = @json($mappedCards);
</script>
<script src="https://code.responsivevoice.org/responsivevoice.js?key=HVO6ICdp"></script>
<script src="{{ asset('custom-js/tts.js') }}?v={{ time() }}"></script>
<script src="{{ asset('custom-js/mix-app.js') }}?v={{ time() }}"></script>
@endsection