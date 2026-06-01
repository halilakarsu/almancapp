@extends('layouts.admin')
@section('title', 'Yeni Kart Ekle - Premium')

@push('styles')
<style>
    .glass-panel {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(0,0,0,0.05);
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.03);
    }
    .form-control-premium {
        background: #f8fafc;
        border: 2px solid transparent;
        border-radius: 16px;
        padding: 16px 20px;
        font-size: 1.05rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    .form-control-premium:focus {
        background: #ffffff;
        border-color: #9d1c24;
        box-shadow: 0 8px 20px rgba(157, 28, 36, 0.1);
    }
    .premium-label {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #64748b;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .live-preview-card {
        background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
        border-radius: 30px;
        padding: 40px 30px;
        text-align: center;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.1);
        position: sticky;
        top: 24px;
        border: 4px solid #ffffff;
    }
    .preview-german { font-size: 2.2rem; font-weight: 900; color: #0f172a; line-height: 1.2; margin-bottom: 20px; }
    .preview-turkish { font-size: 1.4rem; font-weight: 700; color: #ea580c; background: #fff7ed; padding: 12px 24px; border-radius: 16px; display: inline-block; border: 1px solid #fed7aa; }
    .btn-save-premium { background: linear-gradient(135deg, #9d1c24 0%, #7a151b 100%); color: white; border: none; border-radius: 16px; padding: 16px 32px; font-weight: 800; font-size: 1.1rem; box-shadow: 0 10px 25px rgba(157, 28, 36, 0.3); transition: all 0.3s; width: 100%; }
    .btn-save-premium:hover { transform: translateY(-3px); box-shadow: 0 15px 35px rgba(157, 28, 36, 0.4); color: white; }
</style>
@endpush

@section('content')
<div class="container-fluid py-4">
    <!-- Sayfa Başlığı -->
    <div class="d-flex align-items-center mb-5 animate__animated animate__fadeIn">
        <a href="{{ route('admin.cards.index') }}" class="btn btn-white border shadow-sm rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px;" title="Geri Dön">
            <i class="bi bi-arrow-left fs-5 text-dark"></i>
        </a>
        <div class="bg-primary p-3 rounded-4 shadow-lg me-4 text-white" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
            <img src="{{ asset('assets/img/maskot.png') }}" alt="Mascot" style="max-width: 100%; max-height: 100%; object-fit: contain;">
        </div>
        <div class="text-start">
            <h1 class="fw-black mb-1" style="font-weight: 900; font-size: 2.5rem; letter-spacing: -1.5px;">Yeni Kart Oluştur</h1>
            <p class="text-muted mb-0 fw-bold">Sisteme kelime veya cümle eklerken canlı önizlemeyi kullanın.</p>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger rounded-4 shadow-sm border-0 mb-4">
            <ul class="mb-0">@foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.cards.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-4">
            
            {{-- Sol: Form Alanı --}}
            <div class="col-lg-7">
                <div class="glass-panel p-5">
                    
                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <label class="premium-label"><i class="bi bi-tags-fill text-primary"></i> Tür</label>
                            <select name="type" class="form-select form-control-premium">
                                <option value="word" {{ old('type') == 'word' ? 'selected' : '' }}>Kelime Kartı</option>
                                <option value="sentence" {{ old('type') == 'sentence' ? 'selected' : '' }}>Cümle Kartı</option>
                                <option value="match" {{ old('type') == 'match' ? 'selected' : '' }}>Eşleştirme</option>
                                <option value="scramble" {{ old('type') == 'scramble' ? 'selected' : '' }}>Cümle Kurma</option>
                                <option value="fill" {{ old('type') == 'fill' ? 'selected' : '' }}>Boşluk Doldurma</option>
                                <option value="write" {{ old('type') == 'write' ? 'selected' : '' }}>Yazma Çalışması</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="premium-label"><i class="bi bi-bar-chart-fill text-warning"></i> Zorluk</label>
                            <select name="difficulty" class="form-select form-control-premium">
                                <option value="1" {{ old('difficulty') == 1 ? 'selected' : '' }}>Kolay</option>
                                <option value="2" {{ old('difficulty') == 2 ? 'selected' : '' }}>Orta</option>
                                <option value="3" {{ old('difficulty') == 3 ? 'selected' : '' }}>Zor</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="premium-label"><img src="https://flagcdn.com/w20/de.png" alt="DE"> Almanca İçerik</label>
                        <textarea name="german_content" id="live-de" rows="2" class="form-control form-control-premium" placeholder="Almanca metni buraya yazın..." required>{{ old('german_content') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="premium-label"><img src="https://flagcdn.com/w20/tr.png" alt="TR"> Türkçe Anlam</label>
                        <textarea name="turkish_content" id="live-tr" rows="2" class="form-control form-control-premium" placeholder="Türkçe karşılığını buraya yazın..." required>{{ old('turkish_content') }}</textarea>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-8">
                            <label class="premium-label"><i class="bi bi-folder-fill text-info"></i> Bağlı Ders</label>
                            <select name="lesson_id" class="form-select form-control-premium">
                                <option value="">— Yok —</option>
                                @foreach($lessons as $lesson)
                                    <option value="{{ $lesson->id }}" {{ old('lesson_id') == $lesson->id ? 'selected' : '' }}>{{ $lesson->lesson_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="premium-label"><i class="bi bi-list-ol text-secondary"></i> Sıra</label>
                            <input type="number" name="order_index" class="form-control form-control-premium text-center" value="{{ old('order_index', 0) }}">
                        </div>
                    </div>

                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <label class="premium-label"><i class="bi bi-image text-purple" style="color: #8b5cf6;"></i> Görsel</label>
                            <input type="file" name="image" class="form-control form-control-premium py-3" accept="image/*" id="img-input">
                        </div>
                        <div class="col-md-6">
                            <label class="premium-label"><i class="bi bi-mic-fill text-danger"></i> Ses Dosyası</label>
                            <input type="file" name="audio" class="form-control form-control-premium py-3" accept="audio/*">
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between p-4 bg-light rounded-4 border">
                        <div>
                            <h6 class="fw-bold mb-1">Yayın Durumu</h6>
                            <p class="text-muted small mb-0">Öğrenciler bu kartı görebilsin mi?</p>
                        </div>
                        <div class="form-check form-switch fs-3 mb-0">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} style="cursor: pointer;">
                        </div>
                    </div>

                </div>
            </div>

            {{-- Sağ: Canlı Önizleme --}}
            <div class="col-lg-5">
                <div class="live-preview-card">
                    <span class="badge bg-dark bg-opacity-10 text-dark mb-4 px-3 py-2 rounded-pill fw-bold text-uppercase" style="letter-spacing: 1px;">Öğrenci Önizlemesi</span>
                    
                    <div id="preview-img-container" class="mb-4 d-none">
                        <img src="#" id="preview-img" class="rounded-4 shadow-sm" style="max-width: 100%; height: 220px; object-fit: cover; border: 4px solid #fff;">
                    </div>
                    
                    <div class="preview-german" id="preview-de-text">Almanca İçerik</div>
                    <div class="preview-turkish" id="preview-tr-text">Türkçe Anlam</div>

                    <div class="mt-5">
                        <button type="submit" class="btn-save-premium">
                            <i class="bi bi-cloud-arrow-up-fill me-2"></i> Mükemmel, Kaydet!
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

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
        }
    });
</script>
@endsection
