@extends('layouts.admin')
@section('header', 'Yeni İçerik Ekle')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h4 fw-bold text-dark mb-0"><i class="bi bi-plus-square text-primary me-2"></i>Yeni İçerik Ekle</h2>
    <a href="{{ route('admin.contents.index') }}" class="btn btn-light shadow-sm rounded-3 px-4 border">Geri Dön</a>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow rounded-4">
            <div class="card-body p-5">
                <form action="{{ route('admin.contents.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark mb-2">Konu Seçin</label>
                        <select name="topic_id" class="form-control form-control-lg rounded-3 bg-light border-0 shadow-none @error('topic_id') is-invalid @enderror" required>
                            <option value="">Konu Seçin...</option>
                            @foreach($topics as $topic)
                                <option value="{{ $topic->id }}">{{ $topic->lesson?->level?->level_title ?? 'Seviye Yok' }} > {{ $topic->lesson?->lesson_title ?? 'Ders Yok' }} > {{ $topic->topic_title }}</option>
                            @endforeach
                        </select>
                        @error('topic_id') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark mb-2">Almanca İçerik</label>
                        <textarea name="content_german" class="form-control form-control-lg rounded-3 bg-light border-0 shadow-none @error('content_german') is-invalid @enderror" required>{{ old('content_german') }}</textarea>
                        @error('content_german') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark mb-2">Türkçe İçerik</label>
                        <textarea name="content_turkish" class="form-control form-control-lg rounded-3 bg-light border-0 shadow-none @error('content_turkish') is-invalid @enderror" required>{{ old('content_turkish') }}</textarea>
                        @error('content_turkish') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                    </div>
                    <div class="d-flex justify-content-end gap-3 align-items-center pt-3 border-top">
                        <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
