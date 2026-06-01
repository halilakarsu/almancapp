@extends('layouts.admin')

@section('header', 'Seviyeler')

@section('content')
<div class="page-header">
    <h4 class="page-title">Seviye Yönetimi</h4>
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
            <a href="{{ route('admin.levels.index') }}">Seviyeler</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow rounded-4 border-0">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                <div class="d-flex align-items-center">
                    <h4 class="card-title fw-bold">Tüm Seviyeler</h4>
                    <a href="{{ route('admin.levels.create') }}" class="btn btn-primary btn-round ml-auto shadow-sm">
                        <i class="fa fa-plus"></i>
                        Yeni Ekle
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th>#ID</th>
                                <th>Görsel</th>
                                <th>Başlık</th>
                                <th>Durum</th>
                                <th>Sıra No</th>
                                <th>Tarih</th>
                                <th style="width: 20%" class="text-end">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($levels as $level)
                                <tr>
                                    <td>{{ $level->id }}</td>
                                    <td>
                                        @if($level->level_image)
                                            <img src="{{ asset($level->level_image) }}" alt="" class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <div class="rounded bg-light d-flex align-items-center justify-content-center border" style="width: 50px; height: 50px;">
                                                <i class="fa fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $level->level_title }}</td>
                                    <td>
                                        @if($level->is_active)
                                            <span class="badge bg-success text-white">Aktif</span>
                                        @else
                                            <span class="badge bg-danger text-white">Pasif</span>
                                        @endif
                                    </td>
                                    <td>{{ $level->order_index }}</td>
                                    <td>{{ $level->created_at?->format('d.m.Y') }}</td>
                                    <td>
                                        <div class="form-button-action d-flex gap-2 justify-content-end">
                                            <a href="{{ route('admin.levels.edit', $level) }}" data-toggle="tooltip" title="Düzenle" class="btn btn-sm btn-light border shadow-sm rounded-pill px-3">
                                                <i class="fa fa-edit text-primary"></i> Düzenle
                                            </a>
                                            <form action="{{ route('admin.levels.copy', $level) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" data-toggle="tooltip" title="Kopyala" class="btn btn-sm btn-outline-info shadow-sm rounded-pill px-3">
                                                    <i class="fa fa-copy"></i> Kopyala
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.levels.destroy', $level) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" data-toggle="tooltip" title="Sil" class="btn btn-sm btn-outline-danger shadow-sm rounded-pill px-3 btn-delete">
                                                    <i class="fa fa-trash"></i> Sil
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">Henüz kayıt eklenmemiş.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if(method_exists($levels, 'hasPages') && $levels->hasPages())
                <div class="card-footer">
                    {{ $levels->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection