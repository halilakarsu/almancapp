@extends('layouts.admin')
@section('header', 'Yeni Konu Ekle')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h4 fw-bold text-dark mb-0"><i class="bi bi-plus-square text-primary me-2"></i>Yeni Konu Ekle</h2>
    <a href="{{ route('admin.topics.index') }}" class="btn btn-light shadow-sm rounded-3 px-4 border">Geri Dön</a>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card border-0 shadow rounded-4">
            <div class="card-body p-5">
                <form action="{{ route('admin.topics.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark mb-2">Ders Seçin</label>
                        <select name="lesson_id" class="form-control form-control-lg rounded-3 bg-light border-0 shadow-none @error('lesson_id') is-invalid @enderror" required>
                            <option value="">Ders Seçin...</option>
                            @foreach($lessons as $lesson)
                                <option value="{{ $lesson->id }}">{{ $lesson->level?->level_title ?? 'Seviye Yok' }} > {{ $lesson->lesson_title }}</option>
                            @endforeach
                        </select>
                        @error('lesson_id') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark mb-2">Konu Başlığı</label>
                        <textarea name="topic_title" id="title_editor" class="form-control @error('topic_title') is-invalid @enderror">{{ old('topic_title') }}</textarea>
                        @error('topic_title') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark mb-2">Açıklama</label>
                        <textarea name="topic_description" id="description_editor" class="form-control @error('topic_description') is-invalid @enderror">{{ old('topic_description') }}</textarea>
                        @error('topic_description') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                    </div>
                    <div class="d-flex justify-content-end gap-3 align-items-center pt-3 border-top">
                        <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
    const editorConfig = {
        extraPlugins: [MyCustomUploadAdapterPlugin],
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'imageUpload', 'insertTable', 'mediaEmbed', '|', 'sourceEditing', 'undo', 'redo']
    };
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof ClassicEditor !== 'undefined') {
            ClassicEditor.create(document.querySelector('#title_editor'), editorConfig).catch(error => console.error(error));
            ClassicEditor.create(document.querySelector('#description_editor'), editorConfig).catch(error => console.error(error));
        }
    });
</script>
<style>.ck-editor__editable { min-height: 250px; }</style>
@endsection