@extends('layouts.admin')
@section('title', 'Yönetim Paneli')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        :root {
            --p-red: #ef4444;
            --p-amber: #f59e0b;
        }

        .premium-action-card {
            background: linear-gradient(145deg, #ffffff, #fdfdfd);
            border: 1px solid #f1f3f5;
            border-radius: 24px;
            padding: 32px 28px;
            text-align: left;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none !important;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            height: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .premium-action-card::before {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 4px;
            background: transparent;
            transition: all 0.3s ease;
        }

        .premium-action-card:hover {
            transform: translateY(-8px);
            border-color: transparent;
        }

        /* Themed glow for the card on hover */
        .card-theme-blue:hover { box-shadow: 0 20px 40px rgba(59, 130, 246, 0.12); }
        .card-theme-blue:hover::before { background: #3b82f6; }
        
        .card-theme-amber:hover { box-shadow: 0 20px 40px rgba(245, 158, 11, 0.12); }
        .card-theme-amber:hover::before { background: #f59e0b; }
        
        .card-theme-green:hover { box-shadow: 0 20px 40px rgba(16, 185, 129, 0.12); }
        .card-theme-green:hover::before { background: #10b981; }
        
        .card-theme-red:hover { box-shadow: 0 20px 40px rgba(239, 68, 68, 0.12); }
        .card-theme-red:hover::before { background: #ef4444; }

        .action-icon-wrapper {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            margin-bottom: 24px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 8px 16px rgba(0,0,0,0.08);
        }

        .premium-action-card:hover .action-icon-wrapper {
            transform: scale(1.1) rotate(5deg);
        }

        /* Icon Themes (Gradients) */
        .theme-blue { background: linear-gradient(135deg, #60a5fa, #3b82f6); color: #ffffff; }
        .theme-amber { background: linear-gradient(135deg, #fbbf24, #f59e0b); color: #ffffff; }
        .theme-green { background: linear-gradient(135deg, #34d399, #10b981); color: #ffffff; }
        .theme-red { background: linear-gradient(135deg, #f87171, #ef4444); color: #ffffff; }

        .action-title {
            font-size: 1.2rem;
            font-weight: 800;
            color: #111827;
            margin-bottom: 8px;
            letter-spacing: -0.02em;
        }

        .action-desc {
            font-size: 0.85rem;
            color: #6b7280;
            font-weight: 500;
            line-height: 1.5;
        }
    </style>
@endpush

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-11">


@section('title', 'Yönetim Paneli')

            {{-- 4x2 Grid of Premium Action Cards --}}
            <div class="row animate__animated animate__fadeInUp">
                
                <!-- 1. Kullanıcılar -->
                <div class="col-6 col-md-4 col-xl-3 mb-4">
                    <a href="{{ route('admin.users.index') }}" class="premium-action-card card-theme-blue">
                        <div class="action-icon-wrapper theme-blue">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="action-title">Kullanıcılar</div>
                        <div class="action-desc">Kayıtlı öğrencileri listele, düzenle veya ilerlemelerini incele.</div>
                    </a>
                </div>

                <!-- 2. Kullanıcı Ekle -->
                <div class="col-6 col-md-4 col-xl-3 mb-4">
                    <a href="{{ route('admin.users.create') }}" class="premium-action-card card-theme-blue">
                        <div class="action-icon-wrapper theme-blue">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="action-title">Kullanıcı Ekle</div>
                        <div class="action-desc">Sisteme yeni bir yönetici veya öğrenci hesabı tanımla.</div>
                    </a>
                </div>

                <!-- 3. Seviyeler -->
                <div class="col-6 col-md-4 col-xl-3 mb-4">
                    <a href="{{ route('admin.levels.index') }}" class="premium-action-card card-theme-amber">
                        <div class="action-icon-wrapper theme-amber">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="action-title">Seviyeler</div>
                        <div class="action-desc">A1, A2, B1 gibi dil yeterlilik seviyelerini listele ve yönet.</div>
                    </a>
                </div>

                <!-- 4. Seviye Ekle -->
                <div class="col-6 col-md-4 col-xl-3 mb-4">
                    <a href="{{ route('admin.levels.create') }}" class="premium-action-card card-theme-amber">
                        <div class="action-icon-wrapper theme-amber">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <div class="action-title">Seviye Ekle</div>
                        <div class="action-desc">Müfredata yeni bir dil seviyesi segmenti dahil et.</div>
                    </a>
                </div>

                <!-- 5. Dersler -->
                <div class="col-6 col-md-4 col-xl-3 mb-4">
                    <a href="{{ route('admin.lessons.index') }}" class="premium-action-card card-theme-green">
                        <div class="action-icon-wrapper theme-green">
                            <i class="fas fa-book-reader"></i>
                        </div>
                        <div class="action-title">Dersler</div>
                        <div class="action-desc">Seviyelere bağlı ders konularını ve müfredatı listele.</div>
                    </a>
                </div>

                <!-- 6. Ders Ekle -->
                <div class="col-6 col-md-4 col-xl-3 mb-4">
                    <a href="{{ route('admin.lessons.create') }}" class="premium-action-card card-theme-green">
                        <div class="action-icon-wrapper theme-green">
                            <i class="bi bi-journal-plus"></i>
                        </div>
                        <div class="action-title">Ders Ekle</div>
                        <div class="action-desc">Seçtiğin seviyenin altına yeni bir ders ünitesi oluştur.</div>
                    </a>
                </div>

                <!-- 7. Alıştırmalar / Kartlar -->
                <div class="col-6 col-md-4 col-xl-3 mb-4">
                    <a href="{{ route('admin.cards.index') }}" class="premium-action-card card-theme-red">
                        <div class="action-icon-wrapper theme-red">
                            <i class="fas fa-brain"></i>
                        </div>
                        <div class="action-title">Alıştırmalar</div>
                        <div class="action-desc">Kelimeleri, cümle kurma ve yazma alıştırmalarını listele.</div>
                    </a>
                </div>

                <!-- 8. Alıştırma Ekle -->
                <div class="col-6 col-md-4 col-xl-3 mb-4">
                    <a href="{{ route('admin.cards.create') }}" class="premium-action-card card-theme-red">
                        <div class="action-icon-wrapper theme-red">
                            <i class="fas fa-plus-square"></i>
                        </div>
                        <div class="action-title">Alıştırma Ekle</div>
                        <div class="action-desc">Derslere yeni soru, kelime kartı veya yazma pratiği ekle.</div>
                    </a>
                </div>

            </div>

        </div>
    </div>
@endsection