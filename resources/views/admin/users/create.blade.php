@extends('layouts.admin')
@section('header', 'Yeni Kullanıcı Ekle')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h4 fw-bold text-dark mb-0"><i class="bi bi-plus-square text-primary me-2"></i>Yeni Kullanıcı Ekle</h2>
    <a href="{{ route('admin.users.index') }}" class="btn btn-light shadow-sm rounded-3 px-4 border">Geri Dön</a>
</div>
<div class="row"><div class="col-lg-8"><div class="card border-0 shadow rounded-4"><div class="card-body p-5">
<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark mb-2">Ad</label>                        <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-lg rounded-3 bg-light border-0 shadow-none @error('name') is-invalid @enderror" required>                        @error('name') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                    </div>                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark mb-2">E-posta</label>                        <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg rounded-3 bg-light border-0 shadow-none @error('email') is-invalid @enderror" required>                        @error('email') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                    </div>                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark mb-2">Rol (admin/student)</label>                        <input type="text" name="role" value="{{ old('role') }}" class="form-control form-control-lg rounded-3 bg-light border-0 shadow-none @error('role') is-invalid @enderror" required>                        @error('role') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                    </div>                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark mb-2">Şifre</label>                        <input type="password" name="password" value="{{ old('password') }}" class="form-control form-control-lg rounded-3 bg-light border-0 shadow-none @error('password') is-invalid @enderror" required>                        @error('password') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                    </div>                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark mb-2">Şifre Tekrar</label>                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control form-control-lg rounded-3 bg-light border-0 shadow-none @error('password_confirmation') is-invalid @enderror" required>                        @error('password_confirmation') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                    </div>
    <div class="d-flex justify-content-end gap-3 align-items-center pt-3 border-top">
        <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">Kaydet</button>
    </div>
</form>
</div></div></div></div>
@endsection