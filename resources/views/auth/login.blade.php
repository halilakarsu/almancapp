<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Giriş Yap - Almancapp</title>
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
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05), 0 2px 10px rgba(0, 0, 0, 0.02);
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

        .flag-strip div {
            flex: 1;
        }

        .bg-black {
            background-color: var(--de-black);
        }

        .bg-red {
            background-color: var(--de-red);
        }

        .bg-gold {
            background-color: var(--de-gold);
        }

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
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-8px);
            }

            100% {
                transform: translateY(0px);
            }
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

        .divider {
            position: relative;
            text-align: center;
            margin: 25px 0;
            display: flex;
            align-items: center;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 2px;
            background: var(--gray-border);
            border-radius: 2px;
        }

        .divider span {
            padding: 0 15px;
            color: var(--text-muted);
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .btn-google {
            background-color: var(--white);
            color: var(--text-main);
            border: 2px solid var(--gray-border);
            box-shadow: 0 5px 0 var(--gray-border);
        }

        .btn-google:hover {
            background-color: var(--gray-bg);
        }

        .btn-google:active {
            transform: translateY(5px);
            box-shadow: 0 0 0 var(--gray-border);
        }

        .btn-google svg {
            width: 24px;
            height: 24px;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            font-size: 0.95rem;
            font-weight: 600;
            margin-top: -5px;
            color: var(--text-muted);
            padding: 0 4px;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            user-select: none;
        }

        .checkbox-wrapper input[type="checkbox"] {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid var(--gray-border);
            border-radius: 6px;
            background-color: var(--white);
            transition: all 0.2s;
            position: relative;
            cursor: pointer;
            margin: 0;
        }

        .checkbox-wrapper input[type="checkbox"]:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .checkbox-wrapper input[type="checkbox"]:checked::after {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 14px;
            left: 3px;
            top: -1px;
        }

        .forgot-link {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: var(--primary);
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

        <h1>Hoş geldin!</h1>
        <p class="subtext">Almanca öğrenmeye başla</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <div class="input-wrapper">
                    <div class="input-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required
                        autofocus placeholder="E-posta">
                </div>
                @error('email')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-wrapper">
                    <div class="input-icon">

                        <i class="bi bi-lock-fill"></i>
                    </div>
                    <input id="password" type="password" name="password" class="form-control" required
                        placeholder="Şifre">
                </div>
                @error('password')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-options">
                <label class="checkbox-wrapper">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span>Beni Hatırla</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-link">Şifremi unuttum</a>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">
                Giriş Yap
            </button>
        </form>

        <div class="divider">
            <span>VEYA</span>
        </div>

        <button type="button" class="btn btn-google">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                <path fill="#FFC107"
                    d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                <path fill="#FF3D00"
                    d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                <path fill="#4CAF50"
                    d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                <path fill="#1976D2"
                    d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
            </svg>
            Google ile devam et
        </button>

        @if (Route::has('register'))
            <p style="margin-top: 25px; font-weight: 600; color: var(--text-muted); font-size: 0.95rem;">
                Henüz hesabın yok mu? <a href="{{ route('register') }}" class="login-link" style="margin-top: 0;">Kayıt
                    Ol</a>
            </p>
        @endif
    </div>

</body>

</html>