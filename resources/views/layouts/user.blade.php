<!DOCTYPE html>
<html lang="tr">

<head>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Öğrenci Paneli') - Almancapp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .sidebar, .sidebar-backdrop { display: none !important; }
        .main-content { margin-left: 0 !important; }
        :root {
            --primary: #9d1c24;
            /* German Red */
            --primary-dark: #7d161d;
            --primary-hover: #b8212a;
            --german-black: #1a1a1a;
            --german-gold: #c5a059;
            --blue: #DD0000;
            --blue-dark: #B30000;
            --orange: #000000;
            --orange-dark: #1A1A1A;
            --green: #FFCE00;
            --green-dark: #B45309;
            --purple: #DD0000;
            --purple-dark: #B30000;
            --gray-bg: #F4F5F7;
            --gray-border: #E5E5E5;
            --text-main: #3C3C3C;
            --text-muted: #9BA0A6;
            --white: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--white);
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            border-right: 2px solid var(--gray-border);
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            background: var(--white);
            z-index: 50;
            overflow-y: auto;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background-color: #ddd;
            border-radius: 10px;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 900;
            color: var(--primary);
            margin-bottom: 40px;
            text-align: center;
        }

        @keyframes floatLogo {
            0% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
            100% { transform: translateY(0); }
        }
        .logo img {
            animation: floatLogo 3s ease-in-out infinite;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 15px;
            color: var(--text-muted);
            font-weight: 700;
            font-size: 1.1rem;
            text-decoration: none;
            border-radius: 15px;
            margin-bottom: 10px;
            transition: all 0.2s;
        }

        .nav-link:hover {
            background-color: var(--gray-bg);
        }

        .nav-link.active {
            background-color: rgba(157, 28, 36, 0.1);
            color: var(--primary);
            border: 2px solid rgba(157, 28, 36, 0.2);
        }

        .nav-link i {
            font-size: 1.5rem;
        }

        .sidebar-bottom {
            margin-top: auto;
        }

        .logout-btn {
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 15px;
            color: #E60000;
            font-weight: 700;
            font-size: 1.1rem;
            padding: 12px 15px;
            border-radius: 15px;
        }

        .logout-btn:hover {
            background-color: #ffe5e5;
        }

        .main-content {
            margin-left: 250px;
            flex: 1;
            padding: 40px;
            background-color: var(--white);
            max-width: 1000px;
            margin-right: auto;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h1.greeting {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 5px;
        }

        p.subtitle {
            color: var(--text-muted);
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 40px;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: var(--text-muted);
            font-weight: 800;
            font-size: 1.1rem;
            text-decoration: none;
            padding: 10px 20px;
            border: 2px solid var(--gray-border);
            border-radius: 15px;
            transition: all 0.2s;
            margin-bottom: 20px;
        }

        .btn-back:hover {
            background: var(--gray-bg);
            color: var(--text-main);
        }

        /* Mobile Navigation Toggle & Backdrop */
        .mobile-nav-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 99;
            background: var(--white);
            border: 1px solid var(--gray-border);
            border-radius: 12px;
            width: 45px;
            height: 45px;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--german-black);
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        .mobile-nav-toggle:hover {
            color: var(--primary);
        }
        
        .sidebar-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: transparent; /* Dashboard kaybolmasın diye şeffaf */
            z-index: 998;
            opacity: 0;
            visibility: hidden;
        }
        .sidebar-backdrop.show {
            opacity: 1;
            visibility: visible;
        }

        .close-sidebar-btn {
            display: none;
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            font-size: 2rem;
            color: var(--text-muted);
            cursor: pointer;
            z-index: 100;
        }

        @media (max-width: 768px) {
            .mobile-nav-toggle {
                display: flex;
            }
            .close-sidebar-btn {
                display: block;
            }
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
                z-index: 999;
                box-shadow: 10px 0 30px rgba(0,0,0,0.05);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            /* Elemanların ağır çekim belirme animasyonu */
            .sidebar > * {
                opacity: 0;
                transform: translateX(-20px);
                transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
            }
            .sidebar.show > * {
                opacity: 1;
                transform: translateX(0);
            }
            .sidebar.show .logo { transition-delay: 0.1s; }
            .sidebar.show .nav-link:nth-of-type(1) { transition-delay: 0.2s; }
            .sidebar.show .nav-link:nth-of-type(2) { transition-delay: 0.3s; }
            .sidebar.show .sidebar-bottom { transition-delay: 0.4s; }

            .main-content {
                margin-left: 0;
                padding: 80px 20px 40px 20px;
            }
            .logo {
                margin-top: 10px;
                margin-bottom: 30px;
            }

            /* Bottom tab bar spacing — only on lesson pages */
            body.has-lesson-tabs .main-content {
                padding-bottom: 90px;
            }
        }

        /* ── Bottom Tab Bar (mobile · lesson pages only) ── */
        .lesson-bottom-tabs {
            display: none;
        }

        @media (max-width: 768px) {
            .lesson-bottom-tabs {
                display: flex;
                position: fixed;
                bottom: 0; left: 0; right: 0;
                z-index: 900;
                background: #ffffff;
                border-top: 1px solid #e8edf5;
                box-shadow: 0 -4px 20px rgba(0,0,0,0.08);
                height: 64px;
                align-items: stretch;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none;
            }
            .lesson-bottom-tabs::-webkit-scrollbar { display: none; }

            .lesson-tab-item {
                flex: 1;
                min-width: 56px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 3px;
                text-decoration: none;
                color: #94a3b8;
                font-size: 0.6rem;
                font-weight: 700;
                padding: 8px 4px;
                border-top: 2px solid transparent;
                transition: color 0.18s, border-color 0.18s;
                white-space: nowrap;
            }
            .lesson-tab-item i {
                font-size: 1.2rem;
                line-height: 1;
            }
            .lesson-tab-item.active {
                color: var(--primary);
                border-top-color: var(--primary);
            }
            .lesson-tab-item:hover {
                color: var(--primary);
            }
        }
    </style>
    @yield('styles')
</head>

<body class="{{ isset($lesson) ? 'has-lesson-tabs' : '' }}">
    <!-- Mobile Toggle Button -->
    <button class="mobile-nav-toggle" id="mobile-nav-toggle">
        <i class="bi bi-list"></i>
    </button>

    @stack('mobile-nav')

    <!-- Sidebar Backdrop -->
    <div class="sidebar-backdrop" id="sidebar-backdrop"></div>

    <aside class="sidebar" id="sidebar">
        <!-- Kapatma Butonu -->
        <button class="close-sidebar-btn" id="close-sidebar-btn">
            <i class="bi bi-x"></i>
        </button>

        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Almingo Logo"
                    style="max-width: 150px; display: block; margin: 0 auto;">
            </a>
        </div>

        <a href="{{ route('dashboard') }}"
            class="nav-link {{ request()->routeIs('dashboard', 'user.level.*', 'user.lesson.*') ? 'active' : '' }}">
            <i class="bi bi-house-door-fill"></i>
            <span class="nav-text">Eğitimler</span>
        </a>
        <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
            <i class="bi bi-person-circle"></i>
            <span class="nav-text">Profil</span>
        </a>

        @if(Auth::check() && Auth::user()->role === 'admin')
        <hr style="margin: 20px 0; border-color: var(--gray-border);">
        <a href="{{ route('admin.dashboard') }}" class="nav-link" style="color: var(--primary);">
            <i class="bi bi-shield-lock-fill"></i>
            <span class="nav-text">Yönetim Paneli</span>
        </a>
        @endif

        @if(isset($lesson))
        <hr style="margin: 20px 0; border-color: var(--gray-border);">
        <p style="font-size: 0.85rem; font-weight: 800; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; padding: 0 15px; margin-bottom: 10px;">
            Ders Aktiviteleri
        </p>
        
        <a href="{{ route('user.lesson.show', $lesson->id) }}" class="nav-link {{ request()->routeIs('user.lesson.show') ? 'active' : '' }}">
            <i class="bi bi-book-half"></i>
            <span class="nav-text">Ders Özeti</span>
        </a>
        <a href="{{ route('user.cards.study', $lesson->id) }}" class="nav-link {{ request()->routeIs('user.cards.study') ? 'active' : '' }}">
            <i class="bi bi-credit-card-2-front-fill"></i>
            <span class="nav-text">Kart Çalışması</span>
        </a>
        <a href="{{ route('user.lesson.match', $lesson->id) }}" class="nav-link {{ request()->routeIs('user.lesson.match') ? 'active' : '' }}">
            <i class="bi bi-puzzle-fill"></i>
            <span class="nav-text">Eşleştirme</span>
        </a>
        <a href="{{ route('user.lesson.scramble', $lesson->id) }}" class="nav-link {{ request()->routeIs('user.lesson.scramble') ? 'active' : '' }}">
            <i class="bi bi-sort-alpha-down"></i>
            <span class="nav-text">Cümle Kurma</span>
        </a>
        <a href="{{ route('user.lesson.fill', $lesson->id) }}" class="nav-link {{ request()->routeIs('user.lesson.fill') ? 'active' : '' }}">
            <i class="bi bi-input-cursor-text"></i>
            <span class="nav-text">Boşluk Doldurma</span>
        </a>
        <a href="{{ route('user.lesson.write', $lesson->id) }}" class="nav-link {{ request()->routeIs('user.lesson.write') ? 'active' : '' }}">
            <i class="bi bi-pencil-square"></i>
            <span class="nav-text">Yazma Çalışması</span>
        </a>
        @endif

        <div class="sidebar-bottom">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="bi bi-box-arrow-left"></i>
                    <span class="nav-text">Çıkış Yap</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- Bottom Tab Bar (mobile · lesson pages only) --}}
    @if(isset($lesson))
    <nav class="lesson-bottom-tabs">
        <a href="{{ route('user.lesson.show', $lesson->id) }}"
           class="lesson-tab-item {{ request()->routeIs('user.lesson.show') ? 'active' : '' }}">
            <i class="bi bi-book-half"></i>
            <span>Özet</span>
        </a>
        <a href="{{ route('user.cards.study', $lesson->id) }}"
           class="lesson-tab-item {{ request()->routeIs('user.cards.study') ? 'active' : '' }}">
            <i class="bi bi-credit-card-2-front-fill"></i>
            <span>Kartlar</span>
        </a>
        <a href="{{ route('user.lesson.match', $lesson->id) }}"
           class="lesson-tab-item {{ request()->routeIs('user.lesson.match') ? 'active' : '' }}">
            <i class="bi bi-puzzle-fill"></i>
            <span>Eşleştir</span>
        </a>
        <a href="{{ route('user.lesson.scramble', $lesson->id) }}"
           class="lesson-tab-item {{ request()->routeIs('user.lesson.scramble') ? 'active' : '' }}">
            <i class="bi bi-sort-alpha-down"></i>
            <span>Cümle</span>
        </a>
        <a href="{{ route('user.lesson.fill', $lesson->id) }}"
           class="lesson-tab-item {{ request()->routeIs('user.lesson.fill') ? 'active' : '' }}">
            <i class="bi bi-input-cursor-text"></i>
            <span>Boşluk</span>
        </a>
        <a href="{{ route('user.lesson.write', $lesson->id) }}"
           class="lesson-tab-item {{ request()->routeIs('user.lesson.write') ? 'active' : '' }}">
            <i class="bi bi-pencil-square"></i>
            <span>Yazma</span>
        </a>
    </nav>
    @endif

    <main class="main-content @yield('main_class')">
        @yield('content')
    </main>

    @yield('scripts')
    
    <!-- Mobile Sidebar Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileNavToggle = document.getElementById('mobile-nav-toggle');
            const closeSidebarBtn = document.getElementById('close-sidebar-btn');
            const sidebar = document.getElementById('sidebar');
            const sidebarBackdrop = document.getElementById('sidebar-backdrop');

            function toggleSidebar() {
                sidebar.classList.toggle('show');
                sidebarBackdrop.classList.toggle('show');
            }

            mobileNavToggle.addEventListener('click', toggleSidebar);
            closeSidebarBtn.addEventListener('click', toggleSidebar);
            sidebarBackdrop.addEventListener('click', toggleSidebar);
        });
    </script>
</body>
</html>