<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Yönetim Paneli - Almancapp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --admin-primary: #111827;
            --admin-primary-hover: #1f2937;
            --admin-accent: #58CC02; /* Brand green */
            --admin-bg: #F3F4F6;
            --admin-card: #FFFFFF;
            --admin-border: #E5E7EB;
            --admin-text: #374151;
            --admin-text-muted: #6B7280;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        
        body {
            background-color: var(--admin-bg);
            background-image: radial-gradient(#d1d5db 1px, transparent 1px);
            background-size: 20px 20px;
            color: var(--admin-text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .auth-container {
            width: 100%;
            max-width: 420px;
        }

        .logo-area {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-area h1 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--admin-primary);
            letter-spacing: -1px;
        }

        .logo-area span {
            color: var(--admin-accent);
        }

        .logo-area p {
            color: var(--admin-text-muted);
            margin-top: 5px;
            font-weight: 500;
        }

        .auth-card {
            background: var(--admin-card);
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            padding: 40px 32px;
            border: 1px solid var(--admin-border);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--admin-primary);
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--admin-text-muted);
            font-size: 1.1rem;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px 12px 40px;
            border: 1px solid var(--admin-border);
            border-radius: 8px;
            font-size: 0.95rem;
            color: var(--admin-primary);
            transition: all 0.2s;
            background-color: #F9FAFB;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--admin-primary);
            background-color: var(--admin-card);
            box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.1);
        }

        .btn-submit {
            width: 100%;
            background-color: var(--admin-primary);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 14px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: var(--admin-primary-hover);
        }

        .btn-submit:active {
            transform: translateY(1px);
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            font-size: 0.875rem;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: var(--admin-text);
            font-weight: 500;
        }

        input[type="checkbox"] {
            width: 16px;
            height: 16px;
            border-radius: 4px;
            border: 1px solid var(--admin-border);
            cursor: pointer;
        }

        .forgot-link {
            color: var(--admin-primary);
            text-decoration: none;
            font-weight: 600;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .form-error {
            color: #DC2626;
            font-size: 0.85rem;
            margin-top: 6px;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="auth-container">
        
        <div class="logo-area">
            <h1>Almancapp <span>Admin</span></h1>
            <p>Yönetici Paneline Giriş Yapın</p>
        </div>

        <div class="auth-card">
            <!-- NOT: backend controller route tanımı admin.login.submit olabilir, 
                 eğer method store ise ve yönlendirme admin.login.submit ise bu action gereklidir. -->
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="email">E-posta Adresi</label>
                    <div class="input-wrapper">
                        <i class="bi bi-envelope input-icon"></i>
                        <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus placeholder="admin@example.com">
                    </div>
                    @error('email')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Şifre</label>
                    <div class="input-wrapper">
                        <i class="bi bi-shield-lock input-icon"></i>
                        <input id="password" type="password" name="password" class="form-control" required placeholder="••••••••">
                    </div>
                    @error('password')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-options">
                    <label class="checkbox-wrapper">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        Beni Hatırla
                    </label>
                    <!-- Kullanıcı şifremi unuttum isteyebilir, route varsa göster -->
                    @if (Route::has('admin.password.request'))
                        <a href="{{ route('admin.password.request') }}" class="forgot-link">Şifremi unuttum</a>
                    @endif
                </div>

                <button type="submit" class="btn-submit">
                    Sisteme Giriş Yap
                </button>
            </form>
        </div>

    </div>

</body>
</html>
