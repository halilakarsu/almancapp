@extends('layouts.admin')

@section('header', 'Cümleler')

@section('content')
<div class="page-header">
    <h4 class="page-title">İçerik Yönetimi</h4>
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
            <a href="{{ route('admin.contents.index') }}">İçerikler</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow rounded-4 border-0">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                <div class="d-flex align-items-center">
                    <h4 class="card-title fw-bold">Tüm İçerikler</h4>
                    <a href="{{ route('admin.contents.create') }}" class="btn btn-primary btn-round ml-auto shadow-sm">
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
                                <th>Almanca Cümle</th>
                                <th>Türkçe Çeviri</th>
                                <th>Ders / Kurs</th>
                                <th>Tarih</th>
                                <th style="width: 20%">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contents as $content)
                                <tr>
                                    <td>{{ $content->id }}</td>
                                    <td>{{ $content->german_content }}</td>
                                    <td>{{ $content->turkish_content }}</td>
                                    <td>
                                        <small class="text-muted d-block">{{ $content->topic?->lesson?->level?->level_title ?? 'Seviye Yok' }}</small>
                                        <span class="badge badge-info">{{ $content->topic?->lesson?->lesson_title ?? 'Ders Yok' }} > {{ $content->topic?->topic_title ?? 'Konu Yok' }}</span>
                                    </td>
                                    <td>{{ $content->created_at?->format('d.m.Y') }}</td>
                                    <td>
                                        <div class="form-button-action d-flex gap-2 justify-content-end">
                                            <a href="{{ route('admin.contents.edit', $content) }}" data-toggle="tooltip" title="Düzenle" class="btn btn-sm btn-light border shadow-sm rounded-pill px-3">
                                                <i class="fa fa-edit text-primary"></i> Düzenle
                                            </a>
                                            <form action="{{ route('admin.contents.copy', $content) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" data-toggle="tooltip" title="Kopyala" class="btn btn-sm btn-outline-info shadow-sm rounded-pill px-3">
                                                    <i class="fa fa-copy"></i> Kopyala
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.contents.destroy', $content) }}" method="POST" class="d-inline">
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
                                    <td colspan="6" class="text-center">Henüz kayıt eklenmemiş.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if(method_exists($contents, 'hasPages') && $contents->hasPages())
                <div class="card-footer">
                    {{ $contents->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
