@extends('layouts.admin')
@section('header', 'Ders Stüdyosu')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style>
    :root { --p-red: #9d1c24; --p-gold: #c5a059; --bg-soft: #f8f9fa; }
    .page-inner { padding: 30px !important; }
    
    /* Segmented Tab Design */
    .tab-container { 
        background: #eee; padding: 6px; border-radius: 18px; 
        display: inline-flex; width: 100%; margin-bottom: 30px;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
    }
    .tab-container .nav-item { flex: 1; text-align: center; }
    .tab-container .nav-link { 
        border: none !important; border-radius: 14px !important; 
        color: #666; font-weight: 700; padding: 14px 20px; 
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex; align-items: center; justify-content: center; gap: 10px;
        background: transparent;
    }
    .tab-container .nav-link.active { 
        background: #fff !important; color: var(--p-red) !important; 
        box-shadow: 0 10px 20px rgba(0,0,0,0.1); transform: scale(1.02);
    }
    .tab-container .nav-link:not(.active):hover { color: #333; background: rgba(255,255,255,0.5); }
    .tab-container .nav-link i { font-size: 1.1rem; }

    /* Premium Content Area */
    .premium-content-card { 
        background: #fff; border-radius: 30px; border: 1px solid #f0f0f0;
        box-shadow: 0 20px 50px rgba(0,0,0,0.05); overflow: hidden;
    }

    /* Form Design */
    .st-input-group { margin-bottom: 25px; text-align: left; }
    .st-input-group label { font-size: 12px; font-weight: 800; color: #aaa; text-transform: uppercase; margin-bottom: 10px; display: block; letter-spacing: 1px; }
    .st-input-field { 
        background: var(--bg-soft); border: 2px solid transparent; border-radius: 16px; 
        padding: 15px 20px; width: 100%; font-weight: 700; font-size: 16px; color: #333;
        transition: all 0.3s;
    }
    .st-input-field:focus { background: #fff; border-color: var(--p-red); outline: none; box-shadow: 0 10px 25px rgba(157, 28, 36, 0.08); }

    /* Photo Upload Experience */
    .photo-dropzone {
        border: 2px dashed #ddd; border-radius: 24px; padding: 60px;
        transition: all 0.3s; cursor: pointer; background: #fafafa;
    }
    .photo-dropzone:hover { border-color: var(--p-red); background: #fff; }

    /* Editor Styling */
    .ck-editor__editable { min-height: 450px; border: none !important; padding: 30px !important; font-size: 1.1rem; }
    .ck.ck-toolbar { border: none !important; border-bottom: 1px solid #f0f0f0 !important; background: #fff !important; padding: 10px !important; }

    /* Floating Bar Custom */
    .st-floating-bar {
        position: sticky; bottom: 30px; margin-top: 50px;
        background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(20px);
        border: 1px solid rgba(0,0,0,0.05); border-radius: 100px;
        padding: 15px 40px; display: flex; justify-content: space-between; align-items: center;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1); z-index: 100;
    }
</style>
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-10">
        <!-- Sayfa Başlığı -->
        <div class="d-flex align-items-center mb-5 animate__animated animate__fadeIn">
            
            <div class="text-start">
                <h1 class="fw-black mb-1" style="font-weight: 900; font-size: 2.5rem; letter-spacing: -1.5px;">Yeni Ders Oluştur</h1>
                <p class="text-muted mb-0 fw-bold">Eğitim platformunuza yeni bir değer ekleyin.</p>
            </div>
        </div>

        <form action="{{ route('admin.lessons.store') }}" method="POST" enctype="multipart/form-data">
            @csrf



            <!-- İçerik Kartı -->
            <div class="premium-content-card animate__animated animate__fadeInUp p-5">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="st-input-group">
                                    <label>Dersin Başlığı</label>
                                    <input type="text" name="lesson_title" value="{{ old('lesson_title') }}" class="st-input-field" placeholder="Örn: Almanca Sayılar ve Sayma" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="st-input-group">
                                    <label>Ders Açıklaması</label>
                                    <textarea name="description" id="description_editor" class="st-input-field" style="min-height:120px;">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="st-input-group">
                                    <label>Zorluk Seviyesi</label>
                                    <select name="level_id" class="st-input-field" required>
                                        <option value="">Seviye Seçiniz...</option>
                                        @foreach($levels as $level)
                                            <option value="{{ $level->id }}" {{ old('level_id') == $level->id ? 'selected' : '' }}>{{ $level->level_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="st-input-group">
                                    <label>Sıralama Pozisyonu</label>
                                    <input type="number" name="order_index" value="{{ old('order_index', 0) }}" class="st-input-field">
                                </div>
                            </div>

                            {{-- Ders Görseli --}}
                            <div class="col-12">
                                <div class="st-input-group">
                                    <label>Ders Kapak Görseli <span style="font-weight:500;color:#bbb;text-transform:none;letter-spacing:0;">(isteğe bağlı · jpg/png/webp · maks. 2 MB)</span></label>
                                    <div class="photo-dropzone text-center" id="dropzone" onclick="document.getElementById('lesson_image_input').click()" style="padding:40px;">
                                        <div id="drop-placeholder">
                                            <i class="fa fa-cloud-upload-alt fa-2x mb-3" style="color:#ddd;"></i>
                                            <p class="mb-0 fw-bold" style="color:#aaa;">Görsel yüklemek için tıkla veya sürükle</p>
                                            <p class="small mb-0" style="color:#ccc;">JPG, PNG veya WebP — maks. 2 MB</p>
                                        </div>
                                        <img id="img-preview" src="" alt="Önizleme"
                                             style="display:none;max-height:180px;border-radius:14px;object-fit:cover;box-shadow:0 8px 24px rgba(0,0,0,0.1);">
                                    </div>
                                    <input type="file" id="lesson_image_input" name="lesson_image"
                                           accept="image/jpeg,image/png,image/webp" style="display:none;">
                                </div>
                            </div>
                        </div>

            </div>

            <!-- Kaydetme Barı -->
            <div class="st-floating-bar animate__animated animate__fadeInUp">
                <div class="text-start">
                    <h5 class="fw-black mb-0 text-dark">Dersi Oluşturmaya Hazır mısınız?</h5>
                    <p class="text-muted small mb-0 fw-bold">Tüm sekmeleri doldurduysanız dersi sisteme kaydedin.</p>
                </div>
                <div class="d-flex gap-3">
                    <a href="{{ route('admin.lessons.index') }}" class="btn btn-white btn-border btn-round px-4 fw-bold">Vazgeç</a>
                    <button type="submit" class="btn btn-primary btn-round px-5 fw-bold shadow-lg">
                        <i class="fa fa-check-circle me-2"></i>Dersi Kaydet
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropzone = document.getElementById('dropzone');
        const input = document.getElementById('lesson_image_input');
        const preview = document.getElementById('img-preview');
        const placeholder = document.getElementById('drop-placeholder');

        // Click to open file dialog
        dropzone.addEventListener('click', () => input.click());

        // Drag & Drop
        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.style.borderColor = 'var(--p-red)';
            dropzone.style.background = '#fff';
        });

        dropzone.addEventListener('dragleave', () => {
            dropzone.style.borderColor = '#ddd';
            dropzone.style.background = '#fafafa';
        });

        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.style.borderColor = '#ddd';
            dropzone.style.background = '#fafafa';
            
            if (e.dataTransfer.files.length) {
                input.files = e.dataTransfer.files;
                updatePreview(input.files[0]);
            }
        });

        input.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                updatePreview(this.files[0]);
            }
        });

        function updatePreview(file) {
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'inline-block';
                placeholder.style.display = 'none';
            }
        }
    });
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
    class Base64UploadAdapter {
        constructor(loader) { this.loader = loader; }
        upload() {
            return this.loader.file.then(file => new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.onload = () => resolve({ default: reader.result });
                reader.onerror = error => reject(error);
                reader.readAsDataURL(file);
            }));
        }
        abort() {}
    }
    function MyCustomUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => new Base64UploadAdapter(loader);
    }
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof ClassicEditor !== 'undefined') {
            ClassicEditor.create(document.querySelector('#description_editor'), {
                extraPlugins: [MyCustomUploadAdapterPlugin],
                toolbar: {
                    items: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'imageUpload', 'insertTable', 'mediaEmbed', '|', 'sourceEditing', 'undo', 'redo']
                }
            }).catch(error => console.error(error));
        }
    });
</script>
@endpush
