<tbody>
    @forelse($cards as $card)
        <tr>
            <td>
                <input type="checkbox" class="form-check-input row-checkbox shadow-sm border-secondary" value="{{ $card->id }}" style="width: 18px; height: 18px; cursor: pointer;">
            </td>
            <td class="text-center">
                <span class="fw-bold text-muted">{{ $loop->iteration + ($cards->currentPage() - 1) * $cards->perPage() }}.</span>
            </td>
            <td>
                <div class="inline-edit" data-field="lesson_id" data-id="{{ $card->id }}" data-value="{{ $card->lesson_id }}">
                    <span class="lesson-display fw-bold text-dark fs-6" style="cursor: pointer;">{{ $card->lesson ? $card->lesson->lesson_title : '—' }}</span>
                    <select class="lesson-select form-select form-select-sm d-none" style="width: 160px;">
                        <option value="">—</option>
                        @foreach($lessons as $lesson)
                            <option value="{{ $lesson->id }}" {{ $card->lesson_id == $lesson->id ? 'selected' : '' }}>{{ $lesson->lesson_title }}</option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <span class="fw-bold text-dark fs-6" style="letter-spacing: -0.2px;">{{ Str::limit($card->german_content, 50) }}</span>
                </div>
            </td>
            <td>
                @php
                    $typeLabels = [
                        'word' => ['Kelime Kartı', 'primary', '#0d6efd'],
                        'sentence' => ['Cümle Kartı', 'purple', '#8b5cf6'],
                        'match' => ['Eşleştirme', 'warning', '#f59e0b'],
                        'scramble' => ['Cümle Kurma', 'info', '#0dcaf0'],
                        'fill' => ['Boşluk Doldurma', 'danger', '#dc3545'],
                        'write' => ['Yazma Çalışması', 'dark', '#212529']
                    ];
                    $t = $typeLabels[$card->type] ?? ['Bilinmeyen', 'secondary', '#6c757d'];
                @endphp
                <div class="inline-edit" data-field="type" data-id="{{ $card->id }}" data-value="{{ $card->type }}">
                    <span class="type-display badge bg-opacity-10 border border-{{ $t[1] }} border-opacity-25 px-2 py-1 rounded-pill" style="color: {{ $t[2] }} !important; cursor: pointer;">{{ $t[0] }}</span>
                    <select class="type-select form-select form-select-sm d-none" style="width: 140px;">
                        <option value="word" {{ $card->type == 'word' ? 'selected' : '' }}>Kelime Kartı</option>
                        <option value="sentence" {{ $card->type == 'sentence' ? 'selected' : '' }}>Cümle Kartı</option>
                        <option value="match" {{ $card->type == 'match' ? 'selected' : '' }}>Eşleştirme</option>
                        <option value="scramble" {{ $card->type == 'scramble' ? 'selected' : '' }}>Cümle Kurma</option>
                        <option value="fill" {{ $card->type == 'fill' ? 'selected' : '' }}>Boşluk Doldurma</option>
                        <option value="write" {{ $card->type == 'write' ? 'selected' : '' }}>Yazma Çalışması</option>
                    </select>
                </div>
            </td>
            <td class="text-center">
                <div class="inline-edit" data-field="order_index" data-id="{{ $card->id }}" data-value="{{ $card->order_index }}">
                    <span class="order-display badge bg-light text-dark border px-2 py-1 rounded-pill" style="cursor: pointer; min-width: 36px; display: inline-block; text-align: center;">{{ $card->order_index ?? '-' }}</span>
                    <input type="number" class="order-input form-control form-control-sm d-none" value="{{ $card->order_index }}" style="width: 70px;" min="0">
                </div>
            </td>
            <td>
                <div class="d-flex flex-wrap gap-1 align-items-center">
                    
                    <div class="inline-edit d-inline-flex" data-field="difficulty" data-id="{{ $card->id }}" data-value="{{ $card->difficulty }}">
                        @php 
                            $diffColors = ['1'=>'success','2'=>'warning','3'=>'danger'];
                            $diffLabels = ['1'=>'Kolay','2'=>'Orta','3'=>'Zor'];
                            $dc = $diffColors[$card->difficulty] ?? 'secondary';
                        @endphp
                        <span class="difficulty-display badge bg-{{ $dc }} bg-opacity-10 text-light border border-{{ $dc }} border-opacity-25 px-2 py-1 rounded-pill" style="cursor: pointer;">
                            {{ $diffLabels[$card->difficulty] ?? '—' }}
                        </span>
                        <select class="difficulty-select form-select form-select-sm d-none" style="width: 100px;">
                            <option value="1" {{ $card->difficulty == 1 ? 'selected' : '' }}>Kolay</option>
                            <option value="2" {{ $card->difficulty == 2 ? 'selected' : '' }}>Orta</option>
                            <option value="3" {{ $card->difficulty == 3 ? 'selected' : '' }}>Zor</option>
                        </select>
                    </div>

                    @if($card->audio)
                        <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 px-2 py-1 rounded-pill" title="Ses Dosyası Var" style="cursor: pointer;" onclick="playAudio(this, '{{ asset('storage/'.$card->audio) }}')">
                            <i class="fa fa-volume-up me-1"></i>
                        </span>
                    @endif
                    
                    @if(!$card->is_active)
                        <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 px-2 py-1 rounded-pill">Pasif</span>
                    @endif
                </div>
            </td>
            <td class="text-end">
                <div class="d-flex gap-1 justify-content-end">
                    <button type="button" class="action-btn edit btn-edit-card" title="Düzenle"
                            data-id="{{ $card->id }}"
                            data-german="{{ $card->german_content }}"
                            data-turkish="{{ $card->turkish_content }}"
                            data-type="{{ $card->type }}"
                            data-difficulty="{{ $card->difficulty }}"
                            data-order="{{ $card->order_index }}"
                            data-active="{{ $card->is_active ? '1' : '0' }}"
                            data-lesson-id="{{ $card->lesson_id }}">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" class="action-btn copy" title="Kopyala" data-id="{{ $card->id }}" data-url="{{ route('admin.cards.copy', $card) }}">
                        <i class="fa fa-copy"></i>
                    </button>
                    <button type="button" class="action-btn delete single-delete-btn" data-id="{{ $card->id }}" data-url="{{ route('admin.cards.destroy', $card) }}" title="Sil">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="text-center py-5">
                <div class="py-5">
                    <i class="fa fa-inbox text-muted opacity-25 mb-3" style="font-size: 4rem;"></i>
                    <h5 class="fw-black text-dark">Kayıt Bulunamadı</h5>
                    <p class="text-muted mb-4 fw-bold">Arama kriterlerinize uygun kart yok veya henüz kart eklemediniz.</p>
                    <a href="{{ route('admin.cards.create') }}" class="btn btn-dark px-4 rounded-pill fw-bold shadow-sm">
                        <i class="fa fa-plus me-1"></i> İlk Kartı Ekle
                    </a>
                </div>
            </td>
        </tr>
    @endforelse
</tbody>