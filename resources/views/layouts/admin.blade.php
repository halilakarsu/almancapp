<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title', 'Admin Paneli') - Almancapp</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset('assets/css/fonts.min.css') }}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --p-red: #ef4444;
            --p-amber: #f59e0b;
            --bg-light: #ffffff;
            --bg-light-soft: #f9fafb;
            --border-light: #e5e7eb;
            --text-dark: #1f2937;
            --text-muted: #4b5563;
        }
        
        /* Navbar & Header Light Mode */
        .logo-header {
            background-color: var(--bg-light) !important;
            border-bottom: 1px solid var(--border-light) !important;
        }
        .logo-header .nav-toggle .btn-toggle {
            color: var(--text-dark) !important;
        }
        .logo-header .navbar-toggler-icon i {
            color: var(--text-dark) !important;
        }
        .navbar-header {
            background-color: var(--bg-light) !important;
            border-bottom: 1px solid var(--border-light) !important;
        }
        .navbar .navbar-nav .nav-item .nav-link {
            color: var(--text-muted) !important;
        }
        
        /* Sidebar Light Mode */
        .sidebar {
            background-color: var(--bg-light) !important;
            border-right: 1px solid var(--border-light) !important;
            box-shadow: 2px 0 10px rgba(0,0,0,0.02) !important;
        }
        .sidebar .text-section {
            color: #9ca3af !important;
            font-weight: 700;
        }
        
        /* Sidebar Nav Items */
        .sidebar .nav.nav-primary > .nav-item > a {
            color: var(--text-muted) !important;
            font-weight: 600;
            border-radius: 12px;
            margin: 4px 15px;
            padding: 12px 15px;
            transition: all 0.2s ease;
        }
        .sidebar .nav.nav-primary > .nav-item > a i {
            color: var(--text-muted) !important;
            font-size: 1.3rem;
            width: 30px;
            text-align: center;
        }
        .sidebar .nav.nav-primary > .nav-item > a:hover {
            background: #fef3c7 !important; /* Soft light amber background */
            color: #b45309 !important; /* Dark amber text */
        }
        .sidebar .nav.nav-primary > .nav-item > a:hover i {
            color: #b45309 !important;
        }
        .sidebar .nav.nav-primary > .nav-item.active > a {
            background: var(--p-amber) !important;
            color: #ffffff !important; /* High contrast white text on amber */
            font-weight: 700 !important;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.2) !important;
        }
        .sidebar .nav.nav-primary > .nav-item.active > a i {
            color: #ffffff !important;
        }
        
        /* Sidebar Sub-Menu */
        .sidebar .nav-collapse {
            margin-bottom: 10px;
            margin-top: 5px;
        }
        .sidebar .nav-collapse li a {
            margin-bottom: 4px !important;
            border-radius: 8px;
            transition: all 0.2s;
            padding-top: 8px !important;
            padding-bottom: 8px !important;
        }
        .sidebar .nav-collapse li a .sub-item {
            color: var(--text-muted) !important;
            font-weight: 500;
        }
        .sidebar .nav-collapse li a:hover {
            background: #f3f4f6 !important;
        }
        .sidebar .nav-collapse li a:hover .sub-item {
            color: var(--text-dark) !important;
        }
        .sidebar .nav-collapse li.active a .sub-item {
            color: #b45309 !important;
            font-weight: 700;
        }
        .sidebar .nav-collapse li.active a .sub-item::before {
            background-color: var(--p-amber) !important;
        }
        
        /* Global buttons overrides to match new palette */
        .btn-primary {
            background: var(--p-red) !important;
            border-color: var(--p-red) !important;
        }
        .btn-primary:hover {
            background: #be4821 !important;
            border-color: #be4821 !important;
        }
        .text-primary { color: var(--p-red) !important; }
    </style>

    @stack('styles')
</head>
<body>
	<div class="wrapper">
        @include('partials.admin.header')
        @include('partials.admin.sidebar')

		<div class="main-panel">
			<div class="content">
                <div class="page-inner">
				    @yield('content')
                </div>
			</div>
            @include('partials.admin.footer')
		</div>
	</div>

	<!--   Core JS Files   -->
	<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

	<!-- jQuery UI -->
	<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

	<!-- Datatables -->
	<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

	<!-- SweetAlert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- Atlantis JS -->
	<script src="{{ asset('assets/js/atlantis.min.js') }}"></script>
    
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        @if(session('success'))
            Toast.fire({ icon: 'success', title: @json(session('success')) });
        @endif
        @if(session('error'))
            Toast.fire({ icon: 'error', title: @json(session('error')) });
        @endif
        @if(session('info'))
            Toast.fire({ icon: 'info', title: @json(session('info')) });
        @endif
        @if(session('warning'))
            Toast.fire({ icon: 'warning', title: @json(session('warning')) });
        @endif

        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');
            Swal.fire({
                title: 'Emin misiniz?',
                text: "Silinen veri geri getirilemez!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Evet, sil!',
                cancelButtonText: 'İptal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
