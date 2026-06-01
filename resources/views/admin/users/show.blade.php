@extends('layouts.admin')

@section('header', 'Kullanıcı Detayları')

@section('content')
<div class="page-header">
    <h4 class="page-title">Kullanıcı Profili</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="{{ route('admin.dashboard') }}">
                <i class="flaticon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.users.index') }}">Kullanıcılar</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Profil</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card card-profile">
            <div class="card-header" style="background-image: url('{{ asset('assets/img/blogpost.jpg') }}')">
                <div class="profile-picture">
                    <div class="avatar avatar-xl">
                        <img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="user-profile text-center">
                    <div class="name">{{ $user->name }}</div>
                    <div class="job">{{ $user->email }}</div>
                    <div class="desc">
                        @if($user->role === 'admin')
                            <span class="badge badge-primary">Sistem Yöneticisi</span>
                        @else
                            <span class="badge badge-secondary">Öğrenci</span>
                        @endif
                    </div>
                    
                    <div class="view-profile mt-4">
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-secondary btn-block">Profili Düzenle</a>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row user-stats text-center">
                    <div class="col">
                        <div class="number">{{ $user->id }}</div>
                        <div class="title">Sistem ID</div>
                    </div>
                    <div class="col">
                        <div class="number">{{ $user->created_at->format('d.m.Y') }}</div>
                        <div class="title">Kayıt Tarihi</div>
                    </div>
                    <div class="col">
                        <div class="number">0</div>
                        <div class="title">XP Puanı</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
