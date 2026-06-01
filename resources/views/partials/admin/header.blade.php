<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="white">

        <a href="{{ route('admin.dashboard') }}" class="logo text-dark font-weight-bold"
            style="display:flex; align-items:center; gap: 12px; text-decoration: none;">
            <img src="{{ asset('assets/img/mascot2_transparent.png') }}" alt="Almingo"
                style="max-height: 35px; filter: drop-shadow(0px 2px 4px rgba(0,0,0,0.15));">
            <span
                style="font-size: 1.25rem; font-weight: 800; letter-spacing: 1px; color: var(--text-dark) !important;">almancapp</span>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="white">
        <div class="container-fluid d-flex align-items-center">
            
            <!-- Quick Search -->
            <div class="mr-3 position-relative d-none d-md-flex align-items-center" id="adminQuickSearchContainer" style="z-index: 1050;">
                <div class="input-group input-group-sm" style="width: 240px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light border-right-0" style="border-radius: 20px 0 0 20px; border-color: #e5e7eb;">
                            <i class="fa fa-search text-muted"></i>
                        </span>
                    </div>
                    <input type="text" id="adminQuickSearchInput" class="form-control bg-light border-left-0" placeholder="Hızlı Arama (örn: ders ekle)" style="border-radius: 0 20px 20px 0; border-color: #e5e7eb; box-shadow: none;">
                </div>
                <!-- Dropdown for Results -->
                <div id="adminQuickSearchResults" class="dropdown-menu shadow-lg" style="position: absolute; top: 100%; left: 0; width: 100%; border-radius: 12px; margin-top: 8px; display: none; padding: 10px 0; border: 1px solid #e5e7eb; max-height: 300px; overflow-y: auto;">
                </div>
            </div>

            <!-- Breadcrumbs / Page Title -->
            <div class="mr-auto d-none d-md-flex align-items-center" style="padding-left: 15px; border-left: 1px solid #e5e7eb;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mb-0" style="font-size: 0.9rem;">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-decoration-none" style="transition: color 0.2s;" onmouseover="this.style.color='#f59e0b'" onmouseout="this.style.color='#6c757d'">
                                <i class="fa fa-home mr-1"></i> Anasayfa
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">
                            @hasSection('header')
                                @yield('header')
                            @elseif(View::hasSection('title'))
                                @yield('title')
                            @else
                                Genel Bakış
                            @endif
                        </li>
                    </ol>
                </nav>
            </div>

            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="{{ asset('assets/img/profile.jpg') }}" alt="..."
                                class="avatar-img rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg"><img src="{{ asset('assets/img/profile.jpg') }}"
                                            alt="image profile" class="avatar-img rounded"></div>
                                    <div class="u-text">
                                        @auth
                                            <h4>{{ Auth::user()->name }}</h4>
                                            <p class="text-muted">{{ Auth::user()->email }}</p>
                                        @else
                                            <h4>Misafir</h4>
                                            <p class="text-muted">Lütfen giriş yapın</p>
                                        @endauth
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); this.closest('form').submit();">Çıkış Yap</a>
                                </form>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchOptions = [
        { title: 'Dashboard (Genel Bakış)', url: '{{ route("admin.dashboard") }}', icon: 'fa-home' },
        { title: 'Kullanıcılar', url: '{{ route("admin.users.index") }}', icon: 'fa-users' },
        { title: 'Kullanıcı Ekle', url: '{{ route("admin.users.create") }}', icon: 'fa-user-plus' },
        { title: 'Seviyeler', url: '{{ route("admin.levels.index") }}', icon: 'fa-layer-group' },
        { title: 'Seviye Ekle', url: '{{ route("admin.levels.create") }}', icon: 'fa-plus-circle' },
        { title: 'Dersler', url: '{{ route("admin.lessons.index") }}', icon: 'fa-book-open' },
        { title: 'Ders Ekle', url: '{{ route("admin.lessons.create") }}', icon: 'fa-book-medical' },
        { title: 'Alıştırmalar', url: '{{ route("admin.cards.index") }}', icon: 'fa-clone' },
        { title: 'Alıştırma Ekle', url: '{{ route("admin.cards.create") }}', icon: 'fa-plus-square' }
    ];

    const input = document.getElementById('adminQuickSearchInput');
    const resultsContainer = document.getElementById('adminQuickSearchResults');

    if (input && resultsContainer) {
        input.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            resultsContainer.innerHTML = '';
            
            if (query.length === 0) {
                resultsContainer.style.display = 'none';
                return;
            }

            const filtered = searchOptions.filter(item => item.title.toLowerCase().includes(query));
            
            if (filtered.length > 0) {
                filtered.forEach(item => {
                    const a = document.createElement('a');
                    a.href = item.url;
                    a.className = 'dropdown-item py-2 px-3 d-flex align-items-center';
                    a.innerHTML = `<i class="fa ${item.icon} text-muted mr-3" style="width:20px; text-align:center; font-size:1.1rem;"></i> <span class="fw-bold text-dark" style="font-size:0.9rem;">${item.title}</span>`;
                    
                    a.style.transition = "background 0.2s";
                    a.addEventListener('mouseenter', () => a.style.backgroundColor = '#fef3c7');
                    a.addEventListener('mouseleave', () => a.style.backgroundColor = 'transparent');

                    resultsContainer.appendChild(a);
                });
                resultsContainer.style.display = 'block';
            } else {
                resultsContainer.innerHTML = '<div class="text-muted px-3 py-2 small"><i class="fa fa-info-circle me-1"></i> Sonuç bulunamadı...</div>';
                resultsContainer.style.display = 'block';
            }
        });

        // Close on outside click
        document.addEventListener('click', function(e) {
            if (!document.getElementById('adminQuickSearchContainer').contains(e.target)) {
                resultsContainer.style.display = 'none';
            }
        });
        
        // Open on focus if there's text
        input.addEventListener('focus', function() {
            if(this.value.trim().length > 0) {
                resultsContainer.style.display = 'block';
            }
        });
    }
});
</script>