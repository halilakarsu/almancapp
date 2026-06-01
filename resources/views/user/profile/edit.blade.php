@extends('layouts.user')
@section('title', 'Profil Düzenle')
@section('content')
<div class="header-top">
    <div>
        <h1 class="greeting">Profil Ayarları</h1>
        <p class="subtitle">Bilgilerini buradan güncelleyebilirsin</p>
    </div>
</div>

@if (session('status') === 'profile-updated')
    <span class="text-success" style="color:var(--green);font-weight:700;display:block;margin-bottom:20px;"><i class="bi bi-check-circle-fill"></i> Profilin başarıyla güncellendi!</span>
@endif

<style>
    .profile-card {
        background: var(--white); border: 2px solid var(--gray-border); border-radius: 20px;
        padding: 30px; margin-bottom: 30px;
        box-shadow: 0 4px 0 var(--gray-border); 
    }

    .form-group { margin-bottom: 20px; }
    .form-label { display: block; font-weight: 700; color: var(--text-main); margin-bottom: 8px; font-size: 1.1rem; }
    .form-control {
        width: 100%; padding: 15px; border: 2px solid var(--gray-border); border-radius: 15px;
        font-size: 1.1rem; font-family: 'Nunito', sans-serif; font-weight: 600; color: var(--text-main);
        transition: all 0.2s; background: var(--gray-bg);
    }
    .form-control:focus { outline: none; border-color: var(--blue); background: var(--white); }
    .btn-primary {
        background: var(--blue); color: var(--white); border: none; padding: 15px 30px;
        border-radius: 15px; font-size: 1.1rem; font-weight: 800; cursor: pointer;
        box-shadow: 0 4px 0 var(--blue-dark); transition: all 0.2s;
        display: inline-flex; align-items: center; gap: 10px;
    }
    .btn-primary:hover { transform: translateY(2px); box-shadow: 0 2px 0 var(--blue-dark); }
    .btn-primary:active { transform: translateY(4px); box-shadow: none; }
    .text-error { color: var(--primary); font-size: 0.9rem; font-weight: 700; margin-top: 5px; display: block; }
</style>

<div class="profile-card">
    <h2 style="margin-bottom: 20px; color: var(--text-main); font-weight: 800;">Temel Bilgiler</h2>
    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')
        
        <div class="form-group">
            <label class="form-label" for="name">Adın</label>
            <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $user?->name ?? 'Demo Kullanıcı') }}" required autofocus autocomplete="name">
            @error('name')<span class="text-error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="email">E-posta Adresi</label>
            <input class="form-control" type="email" id="email" name="email" value="{{ old('email', $user?->email ?? 'demo@almingo.com') }}" required autocomplete="username">
            @error('email')<span class="text-error">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="btn-primary">
            <i class="bi bi-save-fill"></i> Kaydet
        </button>
    </form>
</div>

<div class="profile-card">
    <h2 style="margin-bottom: 20px; color: var(--text-main); font-weight: 800;">Parola Güncelle</h2>
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label class="form-label" for="current_password">Mevcut Parolan</label>
            <input class="form-control" type="password" id="current_password" name="current_password" autocomplete="current-password">
            @error('current_password', 'updatePassword')<span class="text-error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Yeni Parolan</label>
            <input class="form-control" type="password" id="password" name="password" autocomplete="new-password">
            @error('password', 'updatePassword')<span class="text-error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password_confirmation">Yeni Parolanı Onayla</label>
            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')<span class="text-error">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="btn-primary">
            <i class="bi bi-key-fill"></i> Parolayı Güncelle
        </button>
    </form>
</div>
@endsection
