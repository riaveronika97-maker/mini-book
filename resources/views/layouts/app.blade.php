<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Booking Lapangan') — {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">
    <a class="visually-hidden-focusable bg-white px-3 py-2" href="#main-content">Lewati ke konten utama</a>

    <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
        <div class="container">
            <a class="navbar-brand mb-brand" href="{{ route('home') }}">
                <span class="mb-brand-mark"><i class="bi bi-calendar2-check" aria-hidden="true"></i></span>
                <span>{{ config('app.name') }}</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation"
                    aria-controls="mainNavigation" aria-expanded="false" aria-label="Buka navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('schedule.*') ? 'active fw-semibold text-primary' : '' }}" href="{{ route('schedule.index') }}">
                            <i class="bi bi-calendar3 me-1" aria-hidden="true"></i>Jadwal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('booking.lookup') ? 'active fw-semibold text-primary' : '' }}" href="{{ route('booking.lookup') }}">
                            <i class="bi bi-search me-1" aria-hidden="true"></i>Cek Booking
                        </a>
                    </li>
                    @auth
                        @if (in_array(auth()->user()->role ?? null, ['admin', 'owner'], true))
                            <li class="nav-item ms-lg-2">
                                <a class="btn btn-sm btn-primary" href="{{ url('/admin/dashboard') }}">
                                    <i class="bi bi-grid me-1" aria-hidden="true"></i>Dashboard
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item ms-lg-2">
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('login') }}">
                                <i class="bi bi-shield-lock me-1" aria-hidden="true"></i>Masuk Pengelola
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main id="main-content" class="flex-grow-1 py-4 py-lg-5">
        <div class="container">
            @include('partials.flash')
            @yield('content')
        </div>
    </main>

    <footer class="border-top bg-white py-4">
        <div class="container d-flex flex-column flex-md-row justify-content-between gap-2 small text-muted">
            <span>&copy; {{ date('Y') }} {{ config('app.name') }} — Minisoccer Ngabang</span>
            <span><i class="bi bi-geo-alt me-1" aria-hidden="true"></i>Ngabang, Kalimantan Barat</span>
        </div>
    </footer>

    @include('partials.toast-container')

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
