{{-- Shared form partial for Card create/edit --}}
@php $card = $card ?? null; @endphp

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0 small">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row g-4">
    {{-- Tür ve Zorluk --}}
    <div class="col-md-6">
        <label class="form-label fw-bold text-muted small text-uppercase">Kart Türü <span class="text-danger">*</span></label>
        <div class="input-group input-group-lg shadow-sm">
            <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-tag-fill"></i></span>
            <select name="type" id="card_type" class="form-select border-start-0 ps-0 @error('type') is-invalid @enderror" required>
                <option value="word"     {{ old('type', $card?->type) === 'word'     ? 'selected' : '' }}>Kelime (Örn: elma)</option>
                <option value="sentence" {{ old('type', $card?->type) === 'sentence' ? 'selected' : '' }}>Cümle (Örn: Merhaba, nasılsın?)</option>
            </select>
        </div>
        @error('type')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label class="form-label fw-bold text-muted small text-uppercase">Zorluk Seviyesi <span class="text-danger">*</span></label>
        <div class="input-group input-group-lg shadow-sm">
            <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-bar-chart-fill"></i></span>
            <select name="difficulty" class="form-select border-start-0 ps-0 @error('difficulty') is-invalid @enderror" required>
                <option value="1" {{ old('difficulty', $card?->difficulty) == 1 ? 'selected' : '' }}>Kolay (Başlangıç)</option>
                <option value="2" {{ old('difficulty', $card?->difficulty) == 2 ? 'selected' : '' }}>Orta (Gelişim)</option>
                <option value="3" {{ old('difficulty', $card?->difficulty) == 3 ? 'selected' : '' }}>Zor (İleri Düzey)</option>
            </select>
        </div>
        @error('difficulty')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>

    {{-- Almanca içerik --}}
    <div class="col-12">
        <label class="form-label fw-bold text-muted small text-uppercase">
            <img src="https://flagcdn.com/w20/de.png" alt="DE" class="me-1" style="margin-top:-3px;"> Almanca İçerik <span class="text-danger">*</span>
        </label>
        <textarea name="german_content" rows="2"
                  class="form-control form-control-lg shadow-sm @error('german_content') is-invalid @enderror"
                  placeholder="Almanca kelime veya cümleyi girin…" required>{{ old('german_content', $card?->german_content) }}</textarea>
        @error('german_content')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    {{-- Türkçe anlam --}}
    <div class="col-12">
        <label class="form-label fw-bold text-muted small text-uppercase">
            <img src="https://flagcdn.com/w20/tr.png" alt="TR" class="me-1" style="margin-top:-3px;"> Türkçe Anlam <span class="text-danger">*</span>
        </label>
        <textarea name="turkish_content" rows="2"
                  class="form-control form-control-lg shadow-sm @error('turkish_content') is-invalid @enderror"
                  placeholder="Türkçe karşılığını girin…" required>{{ old('turkish_content', $card?->turkish_content) }}</textarea>
        @error('turkish_content')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    {{-- Ders bağlantısı ve Sıra --}}
    <div class="col-md-8">
        <label class="form-label fw-bold text-muted small text-uppercase">Bağlı Olduğu Ders</label>
        <div class="input-group input-group-lg shadow-sm">
            <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-folder2-open"></i></span>
            <select name="lesson_id" class="form-select border-start-0 ps-0 @error('lesson_id') is-invalid @enderror">
                <option value="">— Herhangi bir derse bağlama —</option>
                @foreach($lessons as $lesson)
                    <option value="{{ $lesson->id }}"
                        {{ old('lesson_id', $card?->lesson_id) == $lesson->id ? 'selected' : '' }}>
                        {{ $lesson->lesson_title }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('lesson_id')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-4">
        <label class="form-label fw-bold text-muted small text-uppercase">Sıra No</label>
        <input type="number" name="order_index" min="0"
               class="form-control form-control-lg shadow-sm text-center @error('order_index') is-invalid @enderror"
               value="{{ old('order_index', $card?->order_index ?? 0) }}">
        @error('order_index')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    {{-- Görsel ve Ses --}}
    <div class="col-md-6">
        <label class="form-label fw-bold text-muted small text-uppercase"><i class="bi bi-image"></i> Görsel Ekle</label>
        <input type="file" name="image" class="form-control form-control-lg shadow-sm @error('image') is-invalid @enderror"
               accept="image/*" id="image_input">
        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($card?->image)
            <div class="mt-3 p-2 border rounded-3 bg-light d-flex align-items-center gap-3">
                <img src="{{ asset('storage/'.$card->image) }}" alt=""
                     class="rounded-2 shadow-sm" style="width:60px;height:60px;object-fit:cover;">
                <span class="text-muted small fw-medium">Şu anki görsel. Yeni bir dosya seçerek değiştirebilirsiniz.</span>
            </div>
        @endif
        <div class="mt-2 text-center">
            <img id="image_preview" src="#" alt="" class="rounded-3 shadow-sm d-none" style="height:120px; object-fit:cover;">
        </div>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-bold text-muted small text-uppercase"><i class="bi bi-mic"></i> Ses Ekle</label>
        <input type="file" name="audio" class="form-control form-control-lg shadow-sm @error('audio') is-invalid @enderror"
               accept="audio/*" id="audio_input">
        @error('audio')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($card?->audio)
            <div class="mt-3 p-2 border rounded-3 bg-light text-center">
                <audio controls src="{{ asset('storage/'.$card->audio) }}" class="w-100" style="height:40px;"></audio>
                <small class="d-block text-muted mt-2 fw-medium">Şu anki ses. Yeni bir dosya seçerek değiştirebilirsiniz.</small>
            </div>
        @endif
        <div class="mt-2">
            <audio id="audio_preview" controls class="w-100 shadow-sm rounded-pill d-none" style="height:40px;"></audio>
        </div>
    </div>

    {{-- Aktif --}}
    <div class="col-12 mt-4 pt-3 border-top">
        <div class="form-check form-switch fs-5">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active"
                {{ old('is_active', $card?->is_active ?? true) ? 'checked' : '' }} style="cursor:pointer;">
            <label class="form-check-label fw-bold ms-2" for="is_active" style="cursor:pointer; color: #1e293b;">Bu Kartı Yayına Al (Aktif)</label>
        </div>
    </div>
</div>

<script>
    // Image preview
    document.getElementById('image_input')?.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const prev = document.getElementById('image_preview');
            prev.src = URL.createObjectURL(file);
            prev.classList.remove('d-none');
        }
    });

    // Audio preview
    document.getElementById('audio_input')?.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const prev = document.getElementById('audio_preview');
            prev.src = URL.createObjectURL(file);
            prev.classList.remove('d-none');
        }
    });
</script>
