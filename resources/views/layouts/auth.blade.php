<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Masuk') — {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    @stack('styles')
</head>
<body class="mb-auth-page">
    <main class="container py-4 py-md-5">
        <div class="mb-auth-card mx-auto">
            <div class="text-center mb-4">
                <a class="mb-brand justify-content-center" href="{{ route('home') }}">
                    <span class="mb-brand-mark"><i class="bi bi-calendar2-check" aria-hidden="true"></i></span>
                    <span>{{ config('app.name') }}</span>
                </a>
                <p class="small text-muted mt-2 mb-0">Minisoccer Ngabang, Kalimantan Barat</p>
            </div>

            @include('partials.flash')

            @yield('content')

            <p class="text-center small text-muted mt-4 mb-0">
                <a href="{{ route('home') }}"><i class="bi bi-arrow-left me-1" aria-hidden="true"></i>Kembali ke halaman utama</a>
            </p>
        </div>
    </main>

    @include('partials.toast-container')

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
