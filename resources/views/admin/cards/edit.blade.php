@extends('layouts.admin')
@section('title', 'Kart Stüdyosu')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style>
    :root { 
        --p-red: #ef4444; 
        --p-amber: #f59e0b; 
        --bg-soft: #f3f4f6; 
    }
    
    /* Premium Content Area */
    .premium-content-card { 
        background: #ffffff; border-radius: 24px; border: 1px solid #e5e7eb;
        box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05);
    }

    /* Form Design */
    .st-input-group { margin-bottom: 24px; text-align: left; }
    .st-input-group label { font-size: 13px; font-weight: 700; color: #4b5563; margin-bottom: 8px; display: block; }
    .st-input-field { 
        background: #f9fafb; border: 1px solid #d1d5db; border-radius: 12px; 
        padding: 16px; width: 100%; font-weight: 600; font-size: 16px; color: #111827;
        transition: all 0.2s;
    }
    .st-input-field:focus { background: #ffffff; border-color: var(--p-amber); outline: none; box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.15); }
    
    select.st-input-field {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%234b5563' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        background-size: 12px;
        padding-right: 40px;
    }

    /* Floating Bar Custom */
    .st-floating-bar {
        position: sticky; bottom: 30px; margin-top: 40px;
        background: #ffffff; border: 1px solid #e5e7eb; border-radius: 16px;
        padding: 20px 30px; display: flex; justify-content: space-between; align-items: center;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1); z-index: 100;
    }
    
    /* Live Preview Customizations */
    .live-preview-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 40px 30px;
        text-align: center;
        box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05);
        position: sticky;
        top: 24px;
        border: 1px solid #e5e7eb;
    }
    .preview-german { font-size: 2rem; font-weight: 800; color: #111827; line-height: 1.2; margin-bottom: 20px; }
    .preview-turkish { font-size: 1.25rem; font-weight: 700; color: #ffffff; background: var(--p-red); padding: 10px 20px; border-radius: 12px; display: inline-block; }
    
    .custom-file-upload {
        display: block;
        background: #f9fafb; border: 2px dashed #d1d5db; border-radius: 12px; 
        padding: 20px; text-align: center; cursor: pointer; transition: all 0.2s;
    }
    .custom-file-upload:hover { border-color: var(--p-amber); background: #ffffff; }
    .custom-file-upload input[type="file"] { display: none; }
    
    /* Toggle Switch Premium */
    .form-switch .form-check-input { width: 3rem; height: 1.5rem; }
    .form-switch .form-check-input:checked { background-color: var(--p-green); border-color: var(--p-green); }
</style>
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-11">
        <div class="d-flex justify-content-between align-items-end mb-4 animate__animated animate__fadeIn">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mb-2" style="font-size: 0.875rem;">
                        <li class="breadcrumb-item"><a href="{{ route('admin.cards.index', request('lesson_id') ? ['lesson_id' => request('lesson_id')] : []) }}" class="text-muted text-decoration-none">Kartlar</a></li>
                        <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Düzenle</li>
                    </ol>
                </nav>
                <h1 class="fw-bold mb-0 text-dark" style="font-size: 2rem; letter-spacing: -0.5px;">Kartı Düzenle</h1>
            </div>
            <div class="text-muted small">
                <i class="fa fa-info-circle me-1"></i> ID: {{ $card->id }}
            </div>
        </div>

        @if($errors->any())
            <div class="alert alert-danger rounded-4 shadow-sm border-0 mb-4 animate__animated animate__fadeIn">
                <ul class="mb-0 fw-bold">@foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach</ul>
            </div>
        @endif

        <form action="{{ route('admin.cards.update', $card) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            
            <div class="row g-4">
                {{-- Sol: Form Alanı --}}
                <div class="col-lg-7">
                    <div class="premium-content-card animate__animated animate__fadeInUp p-5">
                        
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="st-input-group mb-0">
                                    <label><i class="fa fa-tag me-1"></i> Tür</label>
                                    <select name="type" class="st-input-field">
                                        <option value="word" {{ $card->type === 'word' ? 'selected' : '' }}>Kelime Kartı</option>
                                        <option value="sentence" {{ $card->type === 'sentence' ? 'selected' : '' }}>Cümle Kartı</option>
                                        <option value="match" {{ $card->type === 'match' ? 'selected' : '' }}>Eşleştirme</option>
                                        <option value="scramble" {{ $card->type === 'scramble' ? 'selected' : '' }}>Cümle Kurma</option>
                                        <option value="fill" {{ $card->type === 'fill' ? 'selected' : '' }}>Boşluk Doldurma</option>
                                        <option value="write" {{ $card->type === 'write' ? 'selected' : '' }}>Yazma Çalışması</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="st-input-group mb-0">
                                    <label><i class="fa fa-signal me-1"></i> Zorluk</label>
                                    <select name="difficulty" class="st-input-field">
                                        <option value="1" {{ $card->difficulty == 1 ? 'selected' : '' }}>Kolay</option>
                                        <option value="2" {{ $card->difficulty == 2 ? 'selected' : '' }}>Orta</option>
                                        <option value="3" {{ $card->difficulty == 3 ? 'selected' : '' }}>Zor</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="st-input-group">
                            <label><img src="https://flagcdn.com/w20/de.png" alt="DE" class="me-1" style="width:16px;"> Almanca İçerik</label>
                            <textarea name="german_content" id="live-de" rows="2" class="st-input-field" required>{{ old('german_content', $card->german_content) }}</textarea>
                        </div>

                        <div class="st-input-group">
                            <label><img src="https://flagcdn.com/w20/tr.png" alt="TR" class="me-1" style="width:16px;"> Türkçe Anlam</label>
                            <textarea name="turkish_content" id="live-tr" rows="2" class="st-input-field" required>{{ old('turkish_content', $card->turkish_content) }}</textarea>
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-md-8">
                                <div class="st-input-group mb-0">
                                    <label><i class="fa fa-folder-open me-1"></i> Bağlı Ders</label>
                                    @php $presetLesson = request('lesson_id') ? $lessons->firstWhere('id', request('lesson_id')) : null; @endphp
                                    <select name="lesson_id" class="st-input-field" {{ $presetLesson ? 'disabled' : '' }}>
                                        <option value="">— Yok —</option>
                                        @foreach($lessons as $lesson)
                                            <option value="{{ $lesson->id }}" {{ ($presetLesson ? $presetLesson->id : $card->lesson_id) == $lesson->id ? 'selected' : '' }}>{{ $lesson->lesson_title }}</option>
                                        @endforeach
                                    </select>
                                    @if($presetLesson)
                                        <input type="hidden" name="lesson_id" value="{{ $presetLesson->id }}">
                                        <small class="text-muted fw-bold mt-1 d-block"><i class="fa fa-lock me-1"></i> Bu derse ait kartları düzenliyorsunuz.</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="st-input-group mb-0">
                                    <label><i class="fa fa-sort-numeric-down me-1"></i> Sıra</label>
                                    <input type="number" name="order_index" class="st-input-field text-center" value="{{ old('order_index', $card->order_index) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row g-4 mb-5">
                            <div class="col-md-6">
                                <div class="st-input-group mb-0">
                                    <label><i class="fa fa-image me-1"></i> Görsel</label>
                                    <label class="custom-file-upload">
                                        <input type="file" name="image" accept="image/*" id="img-input">
                                        <i class="fa fa-upload fs-4 text-muted mb-2"></i>
                                        <div class="fw-bold text-dark">Görsel Seçin</div>
                                        <div class="small text-muted">Maks. 2 MB</div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="st-input-group mb-0">
                                    <label><i class="fa fa-microphone me-1"></i> Ses Dosyası</label>
                                    <label class="custom-file-upload">
                                        <input type="file" name="audio" accept="audio/*">
                                        <i class="fa fa-file-audio fs-4 text-muted mb-2"></i>
                                        <div class="fw-bold text-dark">Ses Dosyası Seçin</div>
                                        <div class="small text-muted">Maks. 5 MB</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between p-4 rounded-4" style="background: #f8f9fa; border: 1px solid #e9ecef;">
                            <div>
                                <h6 class="fw-bold mb-1 text-dark">Yayın Durumu</h6>
                                <p class="text-muted small mb-0 fw-bold">Öğrenciler bu kartı görebilsin mi?</p>
                            </div>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ $card->is_active ? 'checked' : '' }} style="cursor: pointer;">
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Sağ: Canlı Önizleme --}}
                <div class="col-lg-5">
                    <div class="live-preview-card animate__animated animate__fadeInRight">
                        <span class="badge bg-dark bg-opacity-10 text-dark mb-4 px-3 py-2 rounded-pill fw-bold text-uppercase" style="letter-spacing: 1px;">Öğrenci Önizlemesi</span>
                        
                        <div id="preview-img-container" class="mb-4 {{ $card->image ? '' : 'd-none' }}">
                            <img src="{{ $card->image ? asset('storage/'.$card->image) : '#' }}" id="preview-img" class="rounded-4 shadow-sm" style="max-width: 100%; height: 220px; object-fit: cover; border: 4px solid #fff;">
                        </div>
                        
                        <div class="preview-german" id="preview-de-text">{{ $card->german_content }}</div>
                        <div class="preview-turkish" id="preview-tr-text">{{ $card->turkish_content }}</div>
                        
                        @if($card->audio)
                            <div class="mt-4 bg-white p-2 rounded-pill shadow-sm d-inline-block w-100">
                                <audio controls src="{{ asset('storage/'.$card->audio) }}" class="w-100" style="height: 36px;"></audio>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Kaydetme Barı -->
            <div class="st-floating-bar animate__animated animate__fadeInUp">
                <div class="text-start">
                    <h5 class="fw-black mb-0 text-dark">Hazır mısınız?</h5>
                    <p class="text-muted small mb-0 fw-bold">Değişikliklerinizi kontrol edin ve kartı güncelleyin.</p>
                </div>
                <div class="d-flex gap-3">
                    <a href="{{ route('admin.cards.index', request('lesson_id') ? ['lesson_id' => request('lesson_id')] : []) }}" class="btn btn-white btn-border btn-round px-4 fw-bold">Vazgeç</a>
                    <button type="submit" class="btn btn-primary btn-round px-5 fw-bold shadow-lg">
                        <i class="fa fa-rocket me-2"></i>Kartı Güncelle
                    </button>
                </div>
            </div>
            
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Live Text Preview
    document.getElementById('live-de').addEventListener('input', function(e) {
        document.getElementById('preview-de-text').innerText = e.target.value || 'Almanca İçerik';
    });
    document.getElementById('live-tr').addEventListener('input', function(e) {
        document.getElementById('preview-tr-text').innerText = e.target.value || 'Türkçe Anlam';
    });

    // Live Image Preview
    document.getElementById('img-input').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const img = document.getElementById('preview-img');
            const container = document.getElementById('preview-img-container');
            img.src = URL.createObjectURL(file);
            container.classList.remove('d-none');
            
            // Update label
            const label = this.parentElement.querySelector('.text-dark');
            if(label) label.innerText = file.name;
        }
    });
</script>
@endpush
@endsection
