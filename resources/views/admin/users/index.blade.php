@extends('layouts.admin')

@section('header', 'Kullanıcılar')

@section('content')
<div class="page-header">
    <h4 class="page-title text-german-red fw-bold">Kullanıcı Yönetimi</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="{{ route('admin.dashboard') }}">
                <i class="bi bi-house-door-fill text-german-red"></i>
            </a>
        </li>
        <li class="separator">
            <i class="bi bi-chevron-right"></i>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.users.index') }}" class="text-muted">Kullanıcılar</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm rounded-4 border-0">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                <div class="d-flex align-items-center">
                    <h4 class="card-title fw-bold text-dark">Tüm Kullanıcılar</h4>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-round ml-auto shadow-sm px-4">
                        <i class="fa fa-plus me-2"></i>
                        Yeni Kullanıcı Ekle
                    </a>
                </div>
            </div>
            <div class="card-body px-0 px-md-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">#ID</th>
                                <th>Kullanıcı</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Kayıt Tarihi</th>
                                <th class="text-end pe-4">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td class="ps-4"><span class="badge bg-light text-dark rounded-pill">{{ $user->id }}</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-3">
                                                <div class="avatar-title rounded-circle bg-german-red text-white">
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                </div>
                                            </div>
                                            <span class="fw-semibold text-dark">{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    <td><span class="text-muted">{{ $user->email }}</span></td>
                                    <td>
                                        @if($user->role == 'admin')
                                            <span class="badge bg-german-black text-white px-3">Yönetici</span>
                                        @else
                                            <span class="badge bg-light text-dark border px-3">Kullanıcı</span>
                                        @endif
                                    </td>
                                    <td><small class="text-muted">{{ $user->created_at?->format('d.m.Y H:i') }}</small></td>
                                    <td class="text-end pe-4">
                                        <div class="form-button-action d-flex gap-2 justify-content-end">
                                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-white border shadow-sm rounded-3" title="Düzenle">
                                                <i class="fa fa-edit text-german-red"></i>
                                            </a>
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-white border shadow-sm rounded-3 btn-delete" title="Sil">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center py-5">
                                        <i class="bi bi-people display-4 text-muted opacity-25"></i>
                                        <p class="mt-3">Henüz kayıtlı kullanıcı bulunmuyor.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if(method_exists($users, 'hasPages') && $users->hasPages())
                <div class="card-footer bg-white border-top-0 pb-4">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection