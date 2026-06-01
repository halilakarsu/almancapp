@extends('layouts.admin')
@section('header', 'Seviye Düzenle')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold text-dark mb-1"><i class="bi bi-pencil-square text-primary me-2"></i>Seviye Düzenle</h2>
        <p class="text-muted small mb-0">"{{ $level->level_title }}" seviye bilgilerini güncelleyin.</p>
    </div>
    <a href="{{ route('admin.levels.index') }}" class="btn btn-light shadow-sm rounded-3 px-4 border">
        <i class="bi bi-arrow-left me-1"></i> Geri Dön
    </a>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body p-0">
                <form action="{{ route('admin.levels.update', $level) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-0">
                        <!-- Left Side: Cover Image -->
                        <div class="col-md-4 bg-light border-end">
                            <div class="p-4 text-center">
                                <label class="form-label fw-bold text-dark mb-3 d-block text-start">Kapak Fotoğrafı</label>
                                <div class="image-upload-wrapper mb-3">
                                    <div id="imagePreview" class="rounded-4 shadow-sm bg-white d-flex align-items-center justify-content-center overflow-hidden border" style="height: 250px; position: relative;">
                                        @if($level->level_image)
                                            <img id="previewImg" src="{{ asset($level->level_image) }}" alt="Preview" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                            <i class="bi bi-image text-muted display-1 d-none" id="placeholderIcon"></i>
                                        @else
                                            <i class="bi bi-image text-muted display-1" id="placeholderIcon"></i>
                                            <img id="previewImg" src="#" alt="Preview" class="img-fluid w-100 h-100 d-none" style="object-fit: cover;">
                                        @endif
                                    </div>
                                    <div class="mt-3">
                                        <label for="level_image" class="btn btn-primary btn-sm rounded-pill px-4 shadow-sm">
                                            <i class="bi bi-cloud-upload me-1"></i> Fotoğraf Değiştir
                                        </label>
                                        <input type="file" name="level_image" id="level_image" class="d-none @error('level_image') is-invalid @enderror" onchange="previewFile(this)">
                                        <p class="text-muted small mt-2">Mevcut görseli korumak için boş bırakın.</p>
                                    </div>
                                    @error('level_image') <div class="text-danger small fw-bold mt-2">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Right Side: Form Fields -->
                        <div class="col-md-8">
                            <div class="p-5">
                                <div class="row g-4">
                                    <div class="col-12">
                                        <label class="form-label fw-bold text-dark mb-2">Seviye Başlığı</label>
                                        <input type="text" name="level_title" value="{{ old('level_title', $level->level_title) }}" class="form-control form-control-lg rounded-3 bg-white border-1 @error('level_title') is-invalid @enderror" placeholder="Seviye başlığını giriniz..." required>
                                        @error('level_title') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-bold text-dark mb-2">Kısa Açıklama</label>
                                        <textarea name="level_description" class="form-control rounded-3 bg-white border-1 @error('level_description') is-invalid @enderror" rows="4" placeholder="Bu seviye hakkında kısa bir bilgi verin...">{{ old('level_description', $level->level_description) }}</textarea>
                                        @error('level_description') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-dark mb-2">Görünüm Sırası</label>
                                        <input type="number" name="order_index" value="{{ old('order_index', $level->order_index) }}" class="form-control form-control-lg rounded-3 bg-white border-1 @error('order_index') is-invalid @enderror" required>
                                        @error('order_index') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-dark mb-2">Durum</label>
                                        <div class="d-flex gap-3 mt-1">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_active" id="active" value="1" {{ old('is_active', $level->is_active) == '1' ? 'checked' : '' }}>
                                                <label class="form-check-label fw-semibold" for="active">Aktif</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_active" id="passive" value="0" {{ old('is_active', $level->is_active) == '0' ? 'checked' : '' }}>
                                                <label class="form-check-label fw-semibold" for="passive">Pasif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-3 align-items-center pt-5 mt-4 border-top">
                                    <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-bold shadow-sm">
                                        <i class="bi bi-save me-1"></i> Değişiklikleri Kaydet
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewFile(input) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                document.getElementById('previewImg').setAttribute("src", reader.result);
                document.getElementById('previewImg').classList.remove('d-none');
                document.getElementById('placeholderIcon').classList.add('d-none');
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection