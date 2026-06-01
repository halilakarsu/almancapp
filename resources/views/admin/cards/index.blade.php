@extends('layouts.admin')
@section('title', 'Kart Stüdyosu')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style>
    :root { --p-red: #9d1c24; --bg-soft: #f8f9fa; }
    
    /* Premium Content Area */
    .premium-content-card { 
        background: #fff; border-radius: 30px; border: 1px solid #f0f0f0;
        box-shadow: 0 20px 50px rgba(0,0,0,0.05); overflow: hidden;
    }

    .btn-german-red { background: linear-gradient(135deg, #9d1c24 0%, #7a151b 100%); color: white; border: none; font-weight: 800; padding: 12px 24px; border-radius: 100px; box-shadow: 0 10px 20px rgba(157, 28, 36, 0.2); transition: all 0.3s; }
    .btn-german-red:hover { transform: translateY(-2px); box-shadow: 0 15px 25px rgba(157, 28, 36, 0.3); color: white; }

    /* Filter Area */
    .filter-wrapper {
        background: #f8f9fa; border-radius: 20px; padding: 20px; border: 1px solid #e9ecef; margin-bottom: 30px;
    }
    .filter-label { font-size: 11px; font-weight: 800; color: #888; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; display: block; }
    .st-select {
        background: #fff; border: 2px solid transparent; border-radius: 12px; padding: 10px 15px; width: 100%; font-weight: 600; color: #333; transition: all 0.3s;
    }
    .st-select:focus { border-color: var(--p-red); outline: none; box-shadow: 0 5px 15px rgba(157, 28, 36, 0.08); }
    
    /* Table Styling */
    .table-custom { border-collapse: separate; border-spacing: 0 10px; margin-bottom: 0; }
    .table-custom thead th { border: none; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px; color: #aaa; font-weight: 800; padding: 0 20px 15px 20px; }
    .table-custom tbody tr { background: #fff; box-shadow: 0 5px 15px rgba(0,0,0,0.02); transition: transform 0.2s, box-shadow 0.2s; border-radius: 16px; border: 1px solid #f8f9fa; }
    .table-custom tbody tr:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(0,0,0,0.05); border-color: #f0f0f0; z-index: 2; position: relative; }
    .table-custom tbody td { border: none; padding: 18px 20px; vertical-align: middle; }
    .table-custom tbody td:first-child { border-top-left-radius: 16px; border-bottom-left-radius: 16px; }
    .table-custom tbody td:last-child { border-top-right-radius: 16px; border-bottom-right-radius: 16px; }
    
    .card-thumbnail { width: 50px; height: 50px; border-radius: 14px; object-fit: cover; background: #f8f9fa; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; color: #adb5bd; border: 2px solid #fff; box-shadow: 0 4px 10px rgba(0,0,0,0.08); }
    
    .action-btn { width: 36px; height: 36px; border-radius: 10px; display: inline-flex; align-items: center; justify-content: center; transition: all 0.2s; border: none; background: #f8f9fa; color: #666; }
    .action-btn.edit:hover { background: #e0f2fe; color: #0284c7; }
    .action-btn.delete:hover { background: #fee2e2; color: #dc2626; }
    .action-btn.copy:hover { background: #dcfce7; color: #16a34a; }
</style>
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-11">

        {{-- Sayfa Başlığı --}}
        <div class="d-flex align-items-center mb-5 animate__animated animate__fadeIn">
            
            <div class="text-start">
                <h1 class="fw-black mb-1" style="font-weight: 900; font-size: 2.5rem; letter-spacing: -1.5px;">Kart Stüdyosu</h1>
                <p class="text-muted mb-0 fw-bold">Eğitim kartlarınızı profesyonelce yönetin ve optimize edin.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-4 alert-dismissible fade show mb-4 fw-bold animate__animated animate__fadeInDown" role="alert">
                <i class="fa fa-check-circle me-2 text-success fs-5 align-middle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="premium-content-card animate__animated animate__fadeInUp p-4 p-md-5 mb-5">
            
            {{-- Filtreler --}}
            <div class="filter-wrapper">
                <form method="GET" action="{{ route('admin.cards.index') }}" class="row g-3 align-items-end">
                    @php $filteredLesson = request('lesson_id') ? $lessons->firstWhere('id', request('lesson_id')) : null; @endphp
                    <div class="col-md-3" id="lessonFilterCol" style="{{ $filteredLesson ? 'display:none;' : '' }}">
                        <label class="filter-label"><i class="fa fa-folder-open me-1"></i> Ders Seçimi</label>
                        <select name="lesson_id" class="st-select">
                            <option value="">Tüm Dersler</option>
                            @foreach($lessons as $lesson)
                                <option value="{{ $lesson->id }}" {{ request('lesson_id') == $lesson->id ? 'selected' : '' }}>
                                    {{ $lesson->lesson_title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3" id="lessonBadgeCol" style="{{ $filteredLesson ? '' : 'display:none;' }}">
                        <label class="filter-label"><i class="fa fa-folder-open me-1"></i> Ders</label>
                        <div class="d-flex align-items-center gap-2" style="padding-top: 4px;">
                            <span class="badge bg-dark fs-6 fw-bold px-3 py-2 rounded-pill">{{ $filteredLesson->lesson_title ?? '' }}</span>
                            <a href="{{ route('admin.cards.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3 fw-bold">
                                <i class="fa fa-times me-1"></i> Tümünü Göster
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="filter-label"><i class="fa fa-tag me-1"></i> Kart Türü</label>
                        <select name="type" class="st-select">
                            <option value="">Tümü</option>
                            <option value="word" {{ request('type') === 'word' ? 'selected' : '' }}>Kelime Kartı</option>
                            <option value="sentence" {{ request('type') === 'sentence' ? 'selected' : '' }}>Cümle Kartı</option>
                            <option value="match" {{ request('type') === 'match' ? 'selected' : '' }}>Eşleştirme</option>
                            <option value="scramble" {{ request('type') === 'scramble' ? 'selected' : '' }}>Cümle Kurma</option>
                            <option value="fill" {{ request('type') === 'fill' ? 'selected' : '' }}>Boşluk Doldurma</option>
                            <option value="write" {{ request('type') === 'write' ? 'selected' : '' }}>Yazma Çalışması</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="filter-label"><i class="fa fa-signal me-1"></i> Zorluk</label>
                        <select name="difficulty" class="st-select">
                            <option value="">Tümü</option>
                            <option value="1" {{ request('difficulty') == 1 ? 'selected' : '' }}>Kolay</option>
                            <option value="2" {{ request('difficulty') == 2 ? 'selected' : '' }}>Orta</option>
                            <option value="3" {{ request('difficulty') == 3 ? 'selected' : '' }}>Zor</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" name="sort" value="{{ $sort }}">
                        <input type="hidden" name="dir" value="{{ $dir }}">
                        <div class="d-flex align-items-end gap-2" style="padding-bottom: 2px;">
                            <button type="submit" class="btn btn-dark fw-bold rounded-3 flex-fill" style="padding: 10px 16px; white-space: nowrap;">
                                <i class="fa fa-filter me-1"></i> Filtrele
                            </button>
                            <a href="{{ route('admin.cards.index') }}" class="btn btn-outline-secondary rounded-3 px-3 {{ request()->anyFilled(['lesson_id', 'type', 'difficulty', 'search']) ? '' : 'invisible' }}" style="padding: 10px;" title="Filtreleri Temizle">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Bulk Delete Button & Legend --}}
            <div class="d-flex justify-content-between flex-wrap gap-3 mb-4 px-2 align-items-center">
                <div style="font-size: 0.85rem; font-weight: 700;">
                    <span class="text-muted text-uppercase me-2" style="letter-spacing: 1px;"><i class="fa fa-info-circle me-1"></i> Zorluk:</span>
                    <span class="badge bg-success bg-opacity-10 text-light border border-success border-opacity-25 px-3 py-2 rounded-pill"><i class="fa fa-circle me-1 small"></i> Kolay</span>
                    <span class="badge bg-warning bg-opacity-10 text-light border border-warning border-opacity-25 px-3 py-2 rounded-pill"><i class="fa fa-circle me-1 small"></i> Orta</span>
                    <span class="badge bg-danger bg-opacity-10 text-light border border-danger border-opacity-25 px-3 py-2 rounded-pill"><i class="fa fa-circle me-1 small"></i> Zor</span>
                </div>
                <input type="text" id="instantSearch" class="form-control form-control-sm" placeholder="Ara..." value="{{ request('search') }}" style="max-width: 220px;">
                <div>
                    <button type="button" id="bulkDeleteBtn" class="btn btn-danger rounded-pill fw-bold shadow-sm d-none">
                        <i class="fa fa-trash me-1"></i> Seçilenleri Sil (<span id="selectedCount">0</span>)
                    </button>
                </div>
            </div>

            {{-- Table --}}
            <div id="tableWrapper">
                <div class="table-responsive" style="margin: -10px;">
                    <div style="padding: 10px;">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th width="40"><input type="checkbox" id="selectAll" class="form-check-input shadow-sm border-secondary" style="width: 18px; height: 18px; cursor: pointer;"></th>
                                    <th width="50" class="text-center" style="font-size: 0.75rem; letter-spacing: 1px; font-weight: 800; text-transform: uppercase; color: #aaa;">#</th>
                                    <th style="font-size: 0.75rem; letter-spacing: 1px; font-weight: 800; text-transform: uppercase; color: #aaa;">Ders</th>
                                    <th>
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'german_content', 'dir' => $sort === 'german_content' && $dir === 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark d-flex align-items-center gap-1" style="font-size: 0.75rem; letter-spacing: 1px; font-weight: 800; text-transform: uppercase;">
                                            Almanca İçerik
                                            @if($sort === 'german_content')
                                                <i class="fa fa-sort-{{ $dir === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fa fa-sort text-muted opacity-25"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th style="font-size: 0.75rem; letter-spacing: 1px; font-weight: 800; text-transform: uppercase; color: #aaa;">Kart Türü</th>
                                    <th width="60" class="text-center" style="font-size: 0.75rem; letter-spacing: 1px; font-weight: 800; text-transform: uppercase;">
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'order_index', 'dir' => $sort === 'order_index' && $dir === 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark d-flex align-items-center justify-content-center gap-1">
                                            Sıra
                                            @if($sort === 'order_index')
                                                <i class="fa fa-sort-{{ $dir === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fa fa-sort text-muted opacity-25"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th>Etiketler</th>
                                    <th width="100" class="text-end">İşlemler</th>
                                </tr>
                            </thead>
                            @include('admin.cards._table_rows', ['cards' => $cards, 'lessons' => $lessons])
                        </table>
                    </div>
                </div>

                @if($cards->hasPages())
                    <div id="paginationWrapper" class="d-flex justify-content-between align-items-center mt-4 pt-4 border-top">
                        <div class="text-muted fw-bold small">Toplam {{ $cards->total() }} kayıt bulundu.</div>
                        <div>{{ $cards->links() }}</div>
                    </div>
                @endif
            </div>

        </div>

    </div>
</div>

{{-- Create Card Modal (Premium) --}}
<div class="modal fade" id="createCardModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border-radius: 28px; border: none; box-shadow: 0 30px 80px rgba(0,0,0,0.18); overflow: hidden;">
            {{-- Premium top gradient bar --}}
            <div style="height: 4px; background: linear-gradient(90deg, #9d1c24, #e8485b, #f5a623, #9d1c24); background-size: 300% 100%; animation: gradientMove 3s ease infinite;"></div>
            
            <div class="modal-header border-0 pt-4 px-5 pb-0" style="position: relative;">
                <div>
                    <h5 class="modal-title fw-black fs-3" style="letter-spacing: -0.5px; color: #0f172a;">
                        <i class="fa fa-plus-circle me-2" style="color: #9d1c24;"></i> Yeni Kart Oluştur
                    </h5>
                    <p class="text-muted fw-bold mb-0 mt-1" style="font-size: 0.88rem;">Kart detaylarını girin ve hemen oluşturun.</p>
                </div>
                <button type="button" data-bs-dismiss="modal" aria-label="Close"
                        style="position: absolute; top: 16px; right: 20px; background: none; border: none; font-size: 1.5rem; color: #94a3b8; cursor: pointer; padding: 4px; line-height: 1; transition: color 0.15s; z-index: 1;"
                        onmouseover="this.style.color='#475569'" onmouseout="this.style.color='#94a3b8'">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            
            <div class="modal-body px-5 pt-4 pb-3">
                <form id="createCardForm">
                    @csrf
                    <input type="hidden" name="lesson_id" id="modalLessonId" value="{{ request('lesson_id') }}">
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-5">
                            <label class="fw-bold text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.8px; color: #64748b;">
                                <i class="fa fa-tag me-1" style="color: #8b5cf6;"></i> Tür
                            </label>
                            <select name="type" class="form-control" required
                                    style="background: #f8fafc; border: 2px solid #e2e8f0; border-radius: 14px; padding: 12px 16px; font-weight: 600; font-size: 0.92rem; transition: all 0.25s;"
                                    onfocus="this.style.borderColor='#9d1c24'; this.style.background='#fff'; this.style.boxShadow='0 4px 16px rgba(157,28,36,0.08)'"
                                    onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc'; this.style.boxShadow='none'">
                                <option value="word">Kelime Kartı</option>
                                <option value="sentence">Cümle Kartı</option>
                                <option value="match">Eşleştirme</option>
                                <option value="scramble">Cümle Kurma</option>
                                <option value="fill">Boşluk Doldurma</option>
                                <option value="write">Yazma Çalışması</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.8px; color: #64748b;">
                                <i class="fa fa-signal me-1" style="color: #f59e0b;"></i> Zorluk
                            </label>
                            <select name="difficulty" class="form-control" required
                                    style="background: #f8fafc; border: 2px solid #e2e8f0; border-radius: 14px; padding: 12px 16px; font-weight: 600; font-size: 0.92rem; transition: all 0.25s;"
                                    onfocus="this.style.borderColor='#9d1c24'; this.style.background='#fff'; this.style.boxShadow='0 4px 16px rgba(157,28,36,0.08)'"
                                    onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc'; this.style.boxShadow='none'">
                                <option value="1">Kolay</option>
                                <option value="2" selected>Orta</option>
                                <option value="3">Zor</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="fw-bold text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.8px; color: #64748b;">
                                <i class="fa fa-sort-numeric-down me-1" style="color: #0ea5e9;"></i> Sıra
                            </label>
                            <input type="number" name="order_index" value="0" min="0"
                                   style="background: #f8fafc; border: 2px solid #e2e8f0; border-radius: 14px; padding: 12px 16px; font-weight: 600; font-size: 0.92rem; width: 100%; transition: all 0.25s;"
                                   onfocus="this.style.borderColor='#9d1c24'; this.style.background='#fff'; this.style.boxShadow='0 4px 16px rgba(157,28,36,0.08)'"
                                   onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc'; this.style.boxShadow='none'">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="fw-bold text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.8px; color: #64748b;">
                            <img src="https://flagcdn.com/w20/de.png" alt="DE" style="margin-right: 4px; vertical-align: middle;"> Almanca İçerik
                        </label>
                        <textarea name="german_content" rows="2" required placeholder="Almanca metni buraya yazın..."
                                  style="background: #f8fafc; border: 2px solid #e2e8f0; border-radius: 14px; padding: 14px 16px; font-weight: 500; font-size: 0.95rem; width: 100%; resize: vertical; transition: all 0.25s;"
                                  onfocus="this.style.borderColor='#9d1c24'; this.style.background='#fff'; this.style.boxShadow='0 4px 16px rgba(157,28,36,0.08)'"
                                  onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc'; this.style.boxShadow='none'"></textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label class="fw-bold text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.8px; color: #64748b;">
                            <img src="https://flagcdn.com/w20/tr.png" alt="TR" style="margin-right: 4px; vertical-align: middle;"> Türkçe Anlam
                        </label>
                        <textarea name="turkish_content" rows="2" required placeholder="Türkçe karşılığını buraya yazın..."
                                  style="background: #f8fafc; border: 2px solid #e2e8f0; border-radius: 14px; padding: 14px 16px; font-weight: 500; font-size: 0.95rem; width: 100%; resize: vertical; transition: all 0.25s;"
                                  onfocus="this.style.borderColor='#9d1c24'; this.style.background='#fff'; this.style.boxShadow='0 4px 16px rgba(157,28,36,0.08)'"
                                  onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc'; this.style.boxShadow='none'"></textarea>
                    </div>

                    <div class="d-flex align-items-center justify-content-between p-4 rounded-4" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border: 1px solid #e2e8f0;">
                        <div>
                            <h6 class="fw-bold mb-1" style="font-size: 0.88rem; color: #0f172a;">
                                <i class="fa fa-eye me-1" style="color: #22c55e;"></i> Yayın Durumu
                            </h6>
                            <p class="text-muted mb-0 fw-bold" style="font-size: 0.8rem;">Öğrenciler bu kartı görebilsin mi?</p>
                        </div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" checked
                                   style="width: 48px; height: 24px; cursor: pointer;"
                                   onchange="this.style.boxShadow=this.checked ? '0 0 0 4px rgba(34,197,94,0.15)' : 'none'">
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer border-0 px-5 pb-4 pt-2">
                <button type="button" class="btn fw-bold rounded-pill px-4" data-bs-dismiss="modal"
                        style="background: #f1f5f9; color: #475569; border: none; padding: 12px 28px; font-size: 0.9rem; transition: all 0.2s;"
                        onmouseover="this.style.background='#e2e8f0'" onmouseout="this.style.background='#f1f5f9'">
                    İptal
                </button>
                <button type="button" id="saveCardBtn" class="btn fw-bold rounded-pill px-4 shadow-sm"
                        style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #fff; border: none; padding: 12px 32px; font-size: 0.92rem; box-shadow: 0 8px 20px rgba(15,23,42,0.2); transition: all 0.25s;"
                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 12px 28px rgba(15,23,42,0.3)'"
                        onmouseout="this.style.transform='none'; this.style.boxShadow='0 8px 20px rgba(15,23,42,0.2)'">
                    <i class="fa fa-cloud-upload-alt me-2"></i> Kaydet
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Edit Card Modal --}}
<div class="modal fade" id="editCardModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border-radius: 28px; border: none; box-shadow: 0 30px 80px rgba(0,0,0,0.18); overflow: hidden;">
            <div style="height: 4px; background: linear-gradient(90deg, #8b5cf6, #6366f1, #3b82f6, #8b5cf6); background-size: 300% 100%; animation: gradientMove 3s ease infinite;"></div>
            
            <div class="modal-header border-0 pt-4 px-5 pb-0" style="position: relative;">
                <div>
                    <h5 class="modal-title fw-black fs-3" style="letter-spacing: -0.5px; color: #0f172a;">
                        <i class="fa fa-edit me-2" style="color: #8b5cf6;"></i> Kartı Düzenle
                    </h5>
                    <p class="text-muted fw-bold mb-0 mt-1" style="font-size: 0.88rem;">Kart detaylarını güncelleyin.</p>
                </div>
                <button type="button" data-bs-dismiss="modal" aria-label="Close"
                        style="position: absolute; top: 16px; right: 20px; background: none; border: none; font-size: 1.5rem; color: #94a3b8; cursor: pointer; padding: 4px; line-height: 1; transition: color 0.15s; z-index: 1;"
                        onmouseover="this.style.color='#475569'" onmouseout="this.style.color='#94a3b8'">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            
            <div class="modal-body px-5 pt-4 pb-3">
                <form id="editCardForm">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="card_id" id="editCardId">
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-5">
                            <label class="fw-bold text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.8px; color: #64748b;">
                                <i class="fa fa-tag me-1" style="color: #8b5cf6;"></i> Tür
                            </label>
                            <select name="type" id="editType" class="form-control" required
                                    style="background: #f8fafc; border: 2px solid #e2e8f0; border-radius: 14px; padding: 12px 16px; font-weight: 600; font-size: 0.92rem; transition: all 0.25s;"
                                    onfocus="this.style.borderColor='#8b5cf6'; this.style.background='#fff'; this.style.boxShadow='0 4px 16px rgba(139,92,246,0.08)'"
                                    onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc'; this.style.boxShadow='none'">
                                <option value="word">Kelime Kartı</option>
                                <option value="sentence">Cümle Kartı</option>
                                <option value="match">Eşleştirme</option>
                                <option value="scramble">Cümle Kurma</option>
                                <option value="fill">Boşluk Doldurma</option>
                                <option value="write">Yazma Çalışması</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.8px; color: #64748b;">
                                <i class="fa fa-signal me-1" style="color: #f59e0b;"></i> Zorluk
                            </label>
                            <select name="difficulty" id="editDifficulty" class="form-control" required
                                    style="background: #f8fafc; border: 2px solid #e2e8f0; border-radius: 14px; padding: 12px 16px; font-weight: 600; font-size: 0.92rem; transition: all 0.25s;"
                                    onfocus="this.style.borderColor='#8b5cf6'; this.style.background='#fff'; this.style.boxShadow='0 4px 16px rgba(139,92,246,0.08)'"
                                    onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc'; this.style.boxShadow='none'">
                                <option value="1">Kolay</option>
                                <option value="2" selected>Orta</option>
                                <option value="3">Zor</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="fw-bold text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.8px; color: #64748b;">
                                <i class="fa fa-sort-numeric-down me-1" style="color: #0ea5e9;"></i> Sıra
                            </label>
                            <input type="number" name="order_index" id="editOrder" min="0"
                                   style="background: #f8fafc; border: 2px solid #e2e8f0; border-radius: 14px; padding: 12px 16px; font-weight: 600; font-size: 0.92rem; width: 100%; transition: all 0.25s;"
                                   onfocus="this.style.borderColor='#8b5cf6'; this.style.background='#fff'; this.style.boxShadow='0 4px 16px rgba(139,92,246,0.08)'"
                                   onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc'; this.style.boxShadow='none'">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.8px; color: #64748b;">
                            <i class="fa fa-folder-open me-1" style="color: #8b5cf6;"></i> Bağlı Ders
                        </label>
                        <select name="lesson_id" id="editLesson" class="form-control"
                                style="background: #f8fafc; border: 2px solid #e2e8f0; border-radius: 14px; padding: 12px 16px; font-weight: 600; font-size: 0.92rem; width: 100%; transition: all 0.25s;"
                                onfocus="this.style.borderColor='#8b5cf6'; this.style.background='#fff'; this.style.boxShadow='0 4px 16px rgba(139,92,246,0.08)'"
                                onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc'; this.style.boxShadow='none'">
                            <option value="">— Yok —</option>
                            @foreach($lessons as $lesson)
                                <option value="{{ $lesson->id }}">{{ $lesson->lesson_title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.8px; color: #64748b;">
                            <img src="https://flagcdn.com/w20/de.png" alt="DE" style="margin-right: 4px; vertical-align: middle;"> Almanca İçerik
                        </label>
                        <textarea name="german_content" id="editGerman" rows="2" required placeholder="Almanca metni buraya yazın..."
                                  style="background: #f8fafc; border: 2px solid #e2e8f0; border-radius: 14px; padding: 14px 16px; font-weight: 500; font-size: 0.95rem; width: 100%; resize: vertical; transition: all 0.25s;"
                                  onfocus="this.style.borderColor='#8b5cf6'; this.style.background='#fff'; this.style.boxShadow='0 4px 16px rgba(139,92,246,0.08)'"
                                  onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc'; this.style.boxShadow='none'"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="fw-bold text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.8px; color: #64748b;">
                            <img src="https://flagcdn.com/w20/tr.png" alt="TR" style="margin-right: 4px; vertical-align: middle;"> Türkçe Anlam
                        </label>
                        <textarea name="turkish_content" id="editTurkish" rows="2" required placeholder="Türkçe karşılığını buraya yazın..."
                                  style="background: #f8fafc; border: 2px solid #e2e8f0; border-radius: 14px; padding: 14px 16px; font-weight: 500; font-size: 0.95rem; width: 100%; resize: vertical; transition: all 0.25s;"
                                  onfocus="this.style.borderColor='#8b5cf6'; this.style.background='#fff'; this.style.boxShadow='0 4px 16px rgba(139,92,246,0.08)'"
                                  onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc'; this.style.boxShadow='none'"></textarea>
                    </div>

                    <div class="d-flex align-items-center justify-content-between p-4 rounded-4" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border: 1px solid #e2e8f0;">
                        <div>
                            <h6 class="fw-bold mb-1" style="font-size: 0.88rem; color: #0f172a;">
                                <i class="fa fa-eye me-1" style="color: #22c55e;"></i> Yayın Durumu
                            </h6>
                            <p class="text-muted mb-0 fw-bold" style="font-size: 0.8rem;">Öğrenciler bu kartı görebilsin mi?</p>
                        </div>
                        <div class="form-check form-switch mb-0">
                            <input type="hidden" name="is_active" value="0">
                            <input class="form-check-input" type="checkbox" name="is_active" id="editActive" value="1"
                                   style="width: 48px; height: 24px; cursor: pointer;">
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer border-0 px-5 pb-4 pt-2">
                <button type="button" class="btn fw-bold rounded-pill px-4" data-bs-dismiss="modal"
                        style="background: #f1f5f9; color: #475569; border: none; padding: 12px 28px; font-size: 0.9rem; transition: all 0.2s;"
                        onmouseover="this.style.background='#e2e8f0'" onmouseout="this.style.background='#f1f5f9'">
                    İptal
                </button>
                <button type="button" id="updateCardBtn" class="btn fw-bold rounded-pill px-4 shadow-sm"
                        style="background: linear-gradient(135deg, #6d28d9 0%, #7c3aed 100%); color: #fff; border: none; padding: 12px 32px; font-size: 0.92rem; box-shadow: 0 8px 20px rgba(109,40,217,0.2); transition: all 0.25s;"
                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 12px 28px rgba(109,40,217,0.3)'"
                        onmouseout="this.style.transform='none'; this.style.boxShadow='0 8px 20px rgba(109,40,217,0.2)'">
                    <i class="fa fa-save me-2"></i> Güncelle
                </button>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
</style>

{{-- Fixed Floating Action Button (FAB) --}}
<button type="button" id="fabNewCard" class="btn-german-red d-inline-flex align-items-center text-decoration-none animate__animated animate__bounceIn" style="position: fixed; bottom: 40px; right: 40px; z-index: 1050; border-radius: 50px; padding: 15px 30px; font-size: 1.1rem; box-shadow: 0 15px 30px rgba(157, 28, 36, 0.4); border: none; cursor: pointer;">
    <i class="fa fa-plus-circle me-2 fs-4"></i> Yeni Kart Ekle
</button>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        const $selectAll = $('#selectAll');
        const $bulkDeleteBtn = $('#bulkDeleteBtn');
        const $selectedCountSpan = $('#selectedCount');

        function checkEmptyTable() {
            if($('table tbody tr:not(.empty-row)').length === 0) {
                $('table tbody').html(`<tr class="empty-row"><td colspan="8" class="text-center py-5"><div class="py-5"><i class="fa fa-inbox text-muted opacity-25 mb-3" style="font-size: 4rem;"></i><h5 class="fw-black text-dark">Kayıt Bulunamadı</h5><p class="text-muted mb-4 fw-bold">Tüm kartlar silindi.</p><a href="{{ route('admin.cards.create') }}" class="btn btn-dark px-4 rounded-pill fw-bold shadow-sm"><i class="fa fa-plus me-1"></i> İlk Kartı Ekle</a></div></td></tr>`);
            }
        }

        function updateBulkDeleteButton() {
            const count = $('.row-checkbox:checked').length;
            if ($selectedCountSpan.length) $selectedCountSpan.text(count);
            
            if(count > 0 && $bulkDeleteBtn.length) {
                $bulkDeleteBtn.removeClass('d-none').addClass('d-inline-block');
            } else if ($bulkDeleteBtn.length) {
                $bulkDeleteBtn.removeClass('d-inline-block').addClass('d-none');
            }
        }

        if($selectAll.length) {
            $selectAll.on('change', function() {
                $('.row-checkbox').prop('checked', this.checked);
                updateBulkDeleteButton();
            });
        }

        $(document).on('change', '.row-checkbox', function() {
            if(!this.checked && $selectAll.length) $selectAll.prop('checked', false);
            if($('.row-checkbox:checked').length === $('.row-checkbox').length && $('.row-checkbox').length > 0 && $selectAll.length) {
                $selectAll.prop('checked', true);
            }
            updateBulkDeleteButton();
        });

        if($bulkDeleteBtn.length) {
            $bulkDeleteBtn.on('click', function() {
                const $checkedBoxes = $('.row-checkbox:checked');
                if($checkedBoxes.length === 0) return;

                Swal.fire({
                    title: 'Seçili kartları silmek istediğinize emin misiniz?',
                    text: $checkedBoxes.length + " adet kart tamamen silinecek ve bu işlem geri alınamaz!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Evet, Hepsini Sil!',
                    cancelButtonText: 'İptal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const ids = $checkedBoxes.map(function() { return $(this).val(); }).get();
                        
                        $.ajax({
                            url: '{{ route('admin.cards.bulkDestroy') }}',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                _method: 'DELETE',
                                ids: ids
                            },
                            success: function(response) {
                                if(response.success) {
                                    $checkedBoxes.closest('tr').fadeOut(400, function() {
                                        $(this).remove();
                                        checkEmptyTable();
                                    });
                                    $selectAll.prop('checked', false);
                                    updateBulkDeleteButton();
                                    Toast.fire({ icon: 'success', title: response.message });
                                }
                            },
                            error: function(xhr) {
                                Toast.fire({ icon: 'error', title: 'Bir hata oluştu!' });
                            }
                        });
                    }
                });
            });
        }

        // Single delete
        $(document).on('click', '.single-delete-btn', function() {
            const $btn = $(this);
            const url = $btn.data('url');

            Swal.fire({
                title: 'Bu kartı silmek istediğinize emin misiniz?',
                text: "Bu işlem geri alınamaz!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Evet, Sil!',
                cancelButtonText: 'İptal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE'
                        },
                        success: function(response) {
                            if(response.success) {
                                $btn.closest('tr').fadeOut(400, function() {
                                    $(this).remove();
                                    updateBulkDeleteButton();
                                    checkEmptyTable();
                                });
                                Toast.fire({ icon: 'success', title: response.message });
                            }
                        },
                        error: function(xhr) {
                            Toast.fire({ icon: 'error', title: 'Bir hata oluştu!' });
                        }
                    });
                }
            });
        });

        // Copy via AJAX
        $(document).on('click', '.action-btn.copy', function() {
            const $btn = $(this);
            const url = $btn.data('url');

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'POST'
                },
                success: function(response) {
                    if (response.success) {
                        const card = response.card;
                        const $currentRow = $btn.closest('tr');
                        const $newRow = $currentRow.clone();

                        // Update ID and data-url attributes in the new row
                        $newRow.find('.row-checkbox').val(card.id);
                        $newRow.find('.inline-edit').each(function() {
                            $(this).data('id', card.id);
                        });
                        const base = '/admin/cards/' + card.id;
                        $newRow.find('.single-delete-btn').data('id', card.id).data('url', base);
                        $newRow.find('.action-btn.copy').data('id', card.id).data('url', base + '/copy');
                        $newRow.find('.edit').attr('href', base + '/edit');

                        // Update displayed values
                        $newRow.find('.lesson-display').text(card.lesson ? card.lesson.lesson_title : '—');

                        $currentRow.after($newRow);

                        // Renumber all rows
                        $('table tbody tr').each(function() {
                            const $row = $(this);
                            if ($row.find('.row-checkbox').length) {
                                const idx = $row.index() + 1;
                                $row.find('td:eq(1) .fw-bold').text(idx + '.');
                            }
                        });

                        Toast.fire({ icon: 'success', title: response.message });
                    }
                },
                error: function() {
                    Toast.fire({ icon: 'error', title: 'Kopyalama başarısız!' });
                }
            });
        });

        // Instant search with AJAX
        let searchTimer;
        let currentSearch = $('#instantSearch').val();
        $(document).on('input', '#instantSearch', function() {
            clearTimeout(searchTimer);
            const val = $(this).val();
            currentSearch = val;
            searchTimer = setTimeout(function() {
                const params = new URLSearchParams(window.location.search);
                if (val) {
                    params.set('search', val);
                } else {
                    params.delete('search');
                }
                params.set('page', 1);

                $.ajax({
                    url: window.location.pathname + '?' + params.toString(),
                    type: 'GET',
                    dataType: 'json',
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                    success: function(response) {
                        $('#tableWrapper tbody').replaceWith(response.tableHtml);
                        if (response.paginationHtml) {
                            if ($('#paginationWrapper').length) {
                                $('#paginationWrapper').replaceWith(response.paginationHtml);
                            } else {
                                $('#tableWrapper').append(response.paginationHtml);
                            }
                        } else {
                            $('#paginationWrapper').remove();
                        }
                        // Update URL without page reload
                        window.history.replaceState({}, '', window.location.pathname + '?' + params.toString());
                    }
                });
            }, 350);
        });

        // Inline Edit
        $(document).on('dblclick', '.type-display, .order-display, .difficulty-display, .lesson-display', function() {
            const $container = $(this).closest('.inline-edit');
            $container.find('.type-display, .order-display, .difficulty-display, .lesson-display').addClass('d-none');
            $container.find('.type-select, .order-input, .difficulty-select, .lesson-select').removeClass('d-none').focus();
        });

        $(document).on('blur', '.type-select', function() {
            const $select = $(this);
            const $container = $select.closest('.inline-edit');
            const newVal = $select.val();
            const oldVal = $container.data('value');
            if (newVal === oldVal) {
                $select.addClass('d-none');
                $container.find('.type-display').removeClass('d-none');
                return;
            }
            saveInline($container, newVal);
        });

        $(document).on('blur', '.difficulty-select', function() {
            const $select = $(this);
            const $container = $select.closest('.inline-edit');
            const newVal = $select.val();
            const oldVal = $container.data('value');
            if (newVal === oldVal) {
                $select.addClass('d-none');
                $container.find('.difficulty-display').removeClass('d-none');
                return;
            }
            saveInline($container, newVal);
        });

        $(document).on('blur', '.lesson-select', function() {
            const $select = $(this);
            const $container = $select.closest('.inline-edit');
            const newVal = $select.val();
            const oldVal = $container.data('value');
            if (newVal === oldVal) {
                $select.addClass('d-none');
                $container.find('.lesson-display').removeClass('d-none');
                return;
            }
            saveInline($container, newVal);
        });

        $(document).on('keydown', '.order-input', function(e) {
            if (e.key === 'Enter') {
                $(this).blur();
            }
            if (e.key === 'Escape') {
                const $input = $(this);
                const $container = $input.closest('.inline-edit');
                $input.val($container.data('value'));
                $input.addClass('d-none');
                $container.find('.order-display').removeClass('d-none');
            }
        });

        $(document).on('blur', '.order-input', function() {
            const $input = $(this);
            const $container = $input.closest('.inline-edit');
            const newVal = $input.val();
            const oldVal = $container.data('value');
            if (newVal === oldVal || newVal === '') {
                $input.addClass('d-none');
                $container.find('.order-display').removeClass('d-none');
                return;
            }
            saveInline($container, newVal);
        });

        function saveInline($container, newVal) {
            const id = $container.data('id');
            const field = $container.data('field');
            const data = {};
            data[field] = newVal;

            $.ajax({
                url: '{{ route('admin.cards.inlineUpdate', '__ID__') }}'.replace('__ID__', id),
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'PATCH',
                    [field]: newVal
                },
                success: function(response) {
                    if (response.success) {
                        $container.data('value', newVal);
                        if (field === 'type') {
                            const labels = {
                                word: ['Kelime Kartı', 'primary', '#0d6efd'],
                                sentence: ['Cümle Kartı', 'purple', '#8b5cf6'],
                                match: ['Eşleştirme', 'warning', '#f59e0b'],
                                scramble: ['Cümle Kurma', 'info', '#0dcaf0'],
                                fill: ['Boşluk Doldurma', 'danger', '#dc3545'],
                                write: ['Yazma Çalışması', 'dark', '#212529']
                            };
                            const l = labels[newVal] || ['Bilinmeyen', 'secondary', '#6c757d'];
                            const $display = $container.find('.type-display');
                            $display.text(l[0]);
                            $display.css('color', l[2] + ' !important');
                            $display.removeClass().addClass(`type-display badge bg-opacity-10 border border-${l[1]} border-opacity-25 px-2 py-1 rounded-pill`);
                        } else if (field === 'order_index') {
                            $container.find('.order-display').text(newVal);
                        } else if (field === 'difficulty') {
                            const diffLabels = {1: 'Kolay', 2: 'Orta', 3: 'Zor'};
                            const diffColors = {1: 'success', 2: 'warning', 3: 'danger'};
                            const c = diffColors[newVal] || 'secondary';
                            const $display = $container.find('.difficulty-display');
                            $display.text(diffLabels[newVal] || '—');
                            $display.removeClass().addClass(`difficulty-display badge bg-${c} bg-opacity-10 text-light border border-${c} border-opacity-25 px-2 py-1 rounded-pill`);
                        } else if (field === 'lesson_id') {
                            const text = $container.find('.lesson-select option:selected').text();
                            $container.find('.lesson-display').text(text);
                        }
                        $container.find('.type-select, .order-input, .difficulty-select, .lesson-select').addClass('d-none');
                        $container.find('.type-display, .order-display, .difficulty-display, .lesson-display').removeClass('d-none');
                        Toast.fire({ icon: 'success', title: 'Güncellendi.' });
                    }
                },
                error: function() {
                    Toast.fire({ icon: 'error', title: 'Güncellenemedi!' });
                    $container.find('.type-select, .order-input, .difficulty-select, .lesson-select').addClass('d-none');
                    $container.find('.type-display, .order-display, .difficulty-display, .lesson-display').removeClass('d-none');
                }
            });
        }
    });

    function playAudio(el, src) {
        const $el = $(el);
        let audio = $el.data('audio');
        if (!audio) {
            audio = new Audio(src);
            $el.data('audio', audio);
            audio.addEventListener('ended', function() {
                $el.find('i').removeClass('fa-stop').addClass('fa-volume-up');
            });
        }
        if (audio.paused) {
            audio.play();
            $el.find('i').removeClass('fa-volume-up').addClass('fa-stop');
        } else {
            audio.pause();
            audio.currentTime = 0;
            $el.find('i').removeClass('fa-stop').addClass('fa-volume-up');
        }
    }

    // ── Lesson-filtered mode: hide lesson column inline-edit ──
    const lessonId = new URLSearchParams(window.location.search).get('lesson_id');
    if (lessonId) {
        $('.inline-edit[data-field="lesson_id"]').each(function() {
            const display = $(this).find('.lesson-display');
            $(this).html(display);
        });
    }

    // ── FAB → Open Create Modal ──
    $('#fabNewCard').on('click', function() {
        $('#createCardForm')[0].reset();
        if (lessonId) {
            $('#modalLessonId').val(lessonId);
        }
        $('#createCardModal').modal('show');
    });

    // ── Modal close handlers (fallback for data-bs-dismiss) ──
    $(document).on('click', '[data-bs-dismiss="modal"]', function() {
        $(this).closest('.modal').modal('hide');
    });
    $('#createCardModal').on('click', function(e) {
        if (e.target === this) {
            $(this).modal('hide');
        }
    });

    // ── AJAX Card Create ──
    $('#saveCardBtn').on('click', function() {
        const $btn = $(this);
        $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin me-1"></i> Kaydediliyor...');

        $.ajax({
            url: '{{ route('admin.cards.store') }}',
            type: 'POST',
            data: $('#createCardForm').serialize(),
            success: function(response) {
                $('#createCardModal').modal('hide');
                Toast.fire({ icon: 'success', title: 'Kart başarıyla oluşturuldu.' });
                // Reload the table via AJAX
                const params = new URLSearchParams(window.location.search);
                params.set('page', 1);
                $.ajax({
                    url: window.location.pathname + '?' + params.toString(),
                    type: 'GET',
                    dataType: 'json',
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                    success: function(resp) {
                        $('#tableWrapper tbody').replaceWith(resp.tableHtml);
                        if (resp.paginationHtml) {
                            if ($('#paginationWrapper').length) {
                                $('#paginationWrapper').replaceWith(resp.paginationHtml);
                            } else {
                                $('#tableWrapper').append(resp.paginationHtml);
                            }
                        } else {
                            $('#paginationWrapper').remove();
                        }
                    }
                });
            },
            error: function(xhr) {
                let msg = 'Bir hata oluştu!';
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    msg = Object.values(xhr.responseJSON.errors).flat().join('<br>');
                }
                Toast.fire({ icon: 'error', title: msg });
            },
            complete: function() {
                $btn.prop('disabled', false).html('<i class="fa fa-save me-1"></i> Kaydet');
            }
        });
    });

    // ── Edit Modal: populate with card data ──
    $(document).on('click', '.btn-edit-card', function() {
        const $btn = $(this);
        $('#editCardId').val($btn.data('id'));
        $('#editGerman').val($btn.data('german'));
        $('#editTurkish').val($btn.data('turkish'));
        $('#editType').val($btn.data('type'));
        $('#editDifficulty').val($btn.data('difficulty'));
        $('#editOrder').val($btn.data('order'));
        $('#editLesson').val($btn.data('lesson-id'));
        $('#editActive').prop('checked', $btn.data('active') == 1);
        $('#editCardModal').modal('show');
    });

    // ── AJAX Card Update ──
    $('#updateCardBtn').on('click', function() {
        const $btn = $(this);
        const cardId = $('#editCardId').val();
        $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin me-2"></i> Güncelleniyor...');

        $.ajax({
            url: '{{ route('admin.cards.update', '__ID__') }}'.replace('__ID__', cardId),
            type: 'POST',
            data: $('#editCardForm').serialize(),
            success: function(response) {
                $('#editCardModal').modal('hide');
                Toast.fire({ icon: 'success', title: 'Kart güncellendi.' });
                // Reload the table via AJAX
                const params = new URLSearchParams(window.location.search);
                $.ajax({
                    url: window.location.pathname + '?' + params.toString(),
                    type: 'GET',
                    dataType: 'json',
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                    success: function(resp) {
                        $('#tableWrapper tbody').replaceWith(resp.tableHtml);
                        if (resp.paginationHtml) {
                            if ($('#paginationWrapper').length) {
                                $('#paginationWrapper').replaceWith(resp.paginationHtml);
                            } else {
                                $('#tableWrapper').append(resp.paginationHtml);
                            }
                        } else {
                            $('#paginationWrapper').remove();
                        }
                    }
                });
            },
            error: function(xhr) {
                let msg = 'Bir hata oluştu!';
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    msg = Object.values(xhr.responseJSON.errors).flat().join('<br>');
                }
                Toast.fire({ icon: 'error', title: msg });
            },
            complete: function() {
                $btn.prop('disabled', false).html('<i class="fa fa-save me-2"></i> Güncelle');
            }
        });
    });
</script>
@endpush
