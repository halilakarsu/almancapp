<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kayıt Ol - Almancapp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Modern playful fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #E60000;
            --primary-dark: #B30000;
            --primary-hover: #CC0000;
            --gray-bg: #F4F5F7;
            --gray-border: #E5E5E5;
            --text-main: #3C3C3C;
            --text-muted: #9BA0A6;
            --white: #FFFFFF;

            --de-black: #1A1A1A;
            --de-red: #E60000;
            --de-gold: #FFCE00;

            --bg-gradient: linear-gradient(135deg, #E2FBF5 0%, #F0FDF4 100%);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Nunito', sans-serif;
        }

        body {
            background: var(--bg-gradient);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            width: 100%;
            max-width: 460px;
            border-radius: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05), 0 2px 10px rgba(0,0,0,0.02);
            padding: 40px 32px;
            text-align: center;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        .flag-strip {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            display: flex;
        }

        .flag-strip div { flex: 1; }
        .bg-black { background-color: var(--de-black); }
        .bg-red { background-color: var(--de-red); }
        .bg-gold { background-color: var(--de-gold); }

        .mascot-area {
            margin-top: 5px;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }

        .mascot-img {
            width: 220px;
            height: auto;
            margin: 0 auto;
            display: block;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
            100% { transform: translateY(0px); }
        }

        h1 {
            font-size: 1.85rem;
            font-weight: 800;
            color: var(--text-main);
            margin-bottom: 6px;
            letter-spacing: -0.5px;
        }

        p.subtext {
            color: var(--text-muted);
            font-size: 1.05rem;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 16px;
            text-align: left;
        }

        .input-wrapper {
            position: relative;
            background: var(--gray-bg);
            border-radius: 20px;
            border: 2px solid var(--gray-bg);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
        }

        .input-wrapper:focus-within {
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 8px 16px rgba(230, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        .input-icon {
            padding-left: 18px;
            color: var(--text-muted);
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            transition: color 0.3s;
        }

        .input-wrapper:focus-within .input-icon {
            color: var(--primary);
        }

        .form-control {
            width: 100%;
            padding: 16px 16px;
            border: none;
            background: transparent;
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-main);
            outline: none;
            appearance: none;
        }

        .form-control::placeholder {
            color: #B0B5BB;
            font-weight: 600;
        }

        select.form-control {
            cursor: pointer;
            color: var(--text-main);
        }
        
        select.form-control:invalid {
            color: #B0B5BB;
        }

        .btn {
            width: 100%;
            border: none;
            border-radius: 20px;
            padding: 16px;
            font-size: 1.15rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            text-decoration: none;
            margin-bottom: 15px;
            margin-top: 10px;
            outline: none;
        }

        .btn-primary {
            background-color: var(--primary);
            color: var(--white);
            box-shadow: 0 5px 0 var(--primary-dark);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
        }

        .btn-primary:active {
            transform: translateY(5px);
            box-shadow: 0 0 0 var(--primary-dark);
        }

        .login-link {
            display: inline-block;
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
            margin-top: 10px;
            transition: color 0.2s;
        }

        .login-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .form-error {
            color: var(--de-red);
            font-size: 0.85rem;
            margin-top: 6px;
            text-align: left;
            padding-left: 10px;
            font-weight: 700;
        }
    </style>
</head>

<body>

    <div class="auth-card">
        <div class="flag-strip">
            <div class="bg-black"></div>
            <div class="bg-red"></div>
            <div class="bg-gold"></div>
        </div>

        <div class="mascot-area">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Almancapp Logo" class="mascot-img">
        </div>

        <h1>Aramıza Katıl</h1>
        <p class="subtext">Harika bir yolculuğa başlıyoruz</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Ad Soyad -->
            <div class="form-group">
                <div class="input-wrapper">
                    <div class="input-icon"><i class="bi bi-person-fill"></i></div>
                    <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus placeholder="Ad Soyad">
                </div>
                @error('name')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <div class="input-wrapper">
                    <div class="input-icon"><i class="bi bi-envelope-fill"></i></div>
                    <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required placeholder="E-posta">
                </div>
                @error('email')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <!-- Seviye -->
            <div class="form-group">
                <div class="input-wrapper">
                    <div class="input-icon"><i class="bi bi-bar-chart-fill"></i></div>
                    <select name="current_level" class="form-control" required>
                        <option value="" disabled selected hidden>Almanca Seviyeniz</option>
                        <option value="A1" {{ old('current_level') == 'A1' ? 'selected' : '' }}>A1 (Başlangıç)</option>
                        <option value="A2" {{ old('current_level') == 'A2' ? 'selected' : '' }}>A2 (Temel)</option>
                        <option value="B1" {{ old('current_level') == 'B1' ? 'selected' : '' }}>B1 (Orta)</option>
                        <option value="B2" {{ old('current_level') == 'B2' ? 'selected' : '' }}>B2 (İyi)</option>
                        <option value="C1" {{ old('current_level') == 'C1' ? 'selected' : '' }}>C1 (İleri)</option>
                    </select>
                </div>
                @error('current_level')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <!-- Şifre -->
            <div class="form-group">
                <div class="input-wrapper">
                    <div class="input-icon"><i class="bi bi-lock-fill"></i></div>
                    <input id="password" type="password" name="password" class="form-control" required placeholder="Şifre">
                </div>
                @error('password')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <!-- Şifre Tekrar -->
            <div class="form-group">
                <div class="input-wrapper">
                    <div class="input-icon"><i class="bi bi-lock-fill"></i></div>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required placeholder="Şifre (Tekrar)">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                Hemen Kayıt Ol
            </button>
        </form>

        <p style="margin-top: 15px; font-weight: 600; color: var(--text-muted); font-size: 0.95rem;">
            Zaten hesabın var mı? <a href="{{ route('login') }}" class="login-link">Giriş Yap</a>
        </p>
    </div>

</body>
</html>
