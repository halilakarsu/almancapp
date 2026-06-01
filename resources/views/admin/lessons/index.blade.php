@extends('layouts.admin')
@section('header', 'Dersler')
@section('content')
<div class="page-header">
    <h4 class="page-title">Ders Yönetimi</h4>
    <ul class="breadcrumbs">
        <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
        <li class="separator"><i class="flaticon-right-arrow"></i></li>
        <li class="nav-item"><a href="{{ route('admin.lessons.index') }}">Dersler</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow rounded-4 border-0">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                <div class="d-flex align-items-center">
                    <h4 class="card-title fw-bold">Tüm Dersler</h4>
                    <a href="{{ route('admin.lessons.create') }}" class="btn btn-primary btn-round ml-auto shadow-sm">
                        <i class="fa fa-plus"></i> Yeni Ekle
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row" style="display: flex; flex-wrap: wrap; gap: 20px;">
                    @forelse($lessons as $lesson)
                        <div style="flex: 0 0 calc(33.333% - 14px); max-width: calc(33.333% - 14px);">
                            <div style="border: 1px solid #e5e7eb; border-radius: 16px; overflow: hidden; background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,0.06); height: 100%; display: flex; flex-direction: column; transition: box-shadow 0.2s;"
                                 onmouseover="this.style.boxShadow='0 8px 24px rgba(0,0,0,0.1)'"
                                 onmouseout="this.style.boxShadow='0 1px 3px rgba(0,0,0,0.06)'">
                                <div style="height: 140px; background: linear-gradient(135deg, #f0f4ff 0%, #e8edf5 100%); display: flex; align-items: center; justify-content: center; position: relative;">
                                    @if($lesson->image_url)
                                        <img src="{{ $lesson->image_url }}" alt="{{ $lesson->lesson_title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <i class="fa fa-book-open" style="font-size: 3rem; color: #94a3b8;"></i>
                                    @endif
                                    <span style="position: absolute; top: 10px; left: 10px; background: {{ $lesson->level->level_title ? '#0d6efd' : '#6c757d' }}; color: #fff; font-size: 0.7rem; font-weight: 700; padding: 3px 10px; border-radius: 999px; letter-spacing: 0.3px;">
                                        {{ $lesson->level->level_title ?? 'Seviye Yok' }}
                                    </span>
                                </div>
                                <div style="padding: 16px 18px 14px; flex: 1; display: flex; flex-direction: column;">
                                    <h5 style="font-size: 1rem; font-weight: 700; margin: 0 0 4px; color: #1f2937;">{{ $lesson->lesson_title }}</h5>
                                    <span style="font-size: 0.78rem; color: #94a3b8; margin-bottom: 14px;">
                                        <i class="fa fa-calendar-alt" style="margin-right: 4px;"></i> {{ $lesson->created_at?->format('d.m.Y') }}
                                    </span>
                                    <div style="margin-top: auto; display: flex; gap: 6px; flex-wrap: wrap; border-top: 1px solid #f1f5f9; padding-top: 12px;">
                                        <a href="{{ route('admin.cards.index', ['lesson_id' => $lesson->id]) }}" style="flex: 1; text-align: center; padding: 6px 0; border-radius: 8px; border: 1px solid #8b5cf6; color: #8b5cf6; font-size: 0.78rem; font-weight: 600; text-decoration: none; transition: background 0.15s; background: #fff;"
                                           onmouseover="this.style.background='#f5f3ff'" onmouseout="this.style.background='#fff'">
                                            <i class="fa fa-layer-group"></i> Kartlar
                                        </a>
                                        <a href="{{ route('admin.lessons.edit', $lesson) }}" style="flex: 1; text-align: center; padding: 6px 0; border-radius: 8px; border: 1px solid #e5e7eb; color: #3b82f6; font-size: 0.78rem; font-weight: 600; text-decoration: none; transition: background 0.15s; background: #fff;"
                                           onmouseover="this.style.background='#eff6ff'" onmouseout="this.style.background='#fff'">
                                            <i class="fa fa-edit"></i> Düzenle
                                        </a>
                                        <form action="{{ route('admin.lessons.copy', $lesson) }}" method="POST" style="flex: 1;">
                                            @csrf
                                            <button type="submit" style="width: 100%; text-align: center; padding: 6px 0; border-radius: 8px; border: 1px solid #e5e7eb; color: #0891b2; font-size: 0.78rem; font-weight: 600; cursor: pointer; transition: background 0.15s; background: #fff;"
                                                    onmouseover="this.style.background='#ecfeff'" onmouseout="this.style.background='#fff'">
                                                <i class="fa fa-copy"></i> Kopyala
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.lessons.destroy', $lesson) }}" method="POST" style="flex: 1;">
                                            @csrf @method('DELETE')
                                            <button type="submit" style="width: 100%; text-align: center; padding: 6px 0; border-radius: 8px; border: 1px solid #e5e7eb; color: #ef4444; font-size: 0.78rem; font-weight: 600; cursor: pointer; transition: background 0.15s; background: #fff;"
                                                    onmouseover="this.style.background='#fef2f2'" onmouseout="this.style.background='#fff'"
                                                    onclick="return confirm('Bu dersi silmek istediğinize emin misiniz?')">
                                                <i class="fa fa-trash"></i> Sil
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div style="width: 100%; text-align: center; padding: 60px 20px; color: #94a3b8;">
                            <i class="fa fa-book-open" style="font-size: 3rem; display: block; margin-bottom: 16px; color: #d1d5db;"></i>
                            <p style="font-size: 1rem; font-weight: 600;">Henüz kayıt eklenmemiş.</p>
                        </div>
                    @endforelse
                </div>
            </div>
            @if(method_exists($lessons, 'hasPages') && $lessons->hasPages())
                <div class="card-footer d-flex justify-content-center">
                    {{ $lessons->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
<style>
.row[style*="display: flex"] > * {
    margin-bottom: 0 !important;
}
</style>
@endsection
