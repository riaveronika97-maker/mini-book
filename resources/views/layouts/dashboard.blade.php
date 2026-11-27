<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    @stack('styles')
</head>
<body>
    <a class="visually-hidden-focusable bg-white px-3 py-2" href="#dashboard-content">Lewati ke konten utama</a>

    <div class="container-fluid p-0">
        <div class="row g-0 min-vh-100">
            <aside class="col-lg-2 d-none d-lg-block mb-sidebar p-0">
                @include('partials.sidebar')
            </aside>

            <div class="offcanvas offcanvas-start mb-sidebar" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
                <div class="offcanvas-header border-bottom">
                    <h2 class="offcanvas-title h6 mb-0" id="sidebarOffcanvasLabel">Menu Pengelola</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Tutup menu"></button>
                </div>
                <div class="offcanvas-body p-0">
                    @include('partials.sidebar')
                </div>
            </div>

            <div class="col-12 col-lg-10 p-0 d-flex flex-column min-vh-100">
                <header class="mb-topbar px-3 px-lg-4 py-2">
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-outline-secondary btn-sm d-lg-none" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas"
                                aria-controls="sidebarOffcanvas" aria-label="Buka menu">
                            <i class="bi bi-list" aria-hidden="true"></i>
                        </button>

                        <div class="me-auto">
                            <div class="small text-muted">Area Pengelola</div>
                            <div class="fw-semibold">@yield('page-title', 'Dashboard')</div>
                        </div>

                        @auth
                            <div class="dropdown">
                                <button class="btn btn-light border dropdown-toggle d-flex align-items-center gap-2" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="mb-avatar" aria-hidden="true">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                                    <span class="d-none d-sm-inline small fw-semibold">{{ auth()->user()->name }}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <span class="dropdown-item-text small text-muted">
                                            {{ ucfirst(auth()->user()->role ?? 'pengelola') }}
                                        </span>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('schedule.index') }}">
                                            <i class="bi bi-calendar3 me-2" aria-hidden="true"></i>Lihat jadwal publik
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="bi bi-box-arrow-right me-2" aria-hidden="true"></i>Keluar
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                    </div>
                </header>

                <main id="dashboard-content" class="flex-grow-1 p-3 p-lg-4">
                    @include('partials.flash')
                    @yield('content')
                </main>

                <footer class="px-3 px-lg-4 py-3 border-top small text-muted">
                    &copy; {{ date('Y') }} {{ config('app.name') }} — Minisoccer Ngabang
                </footer>
            </div>
        </div>
    </div>

    @include('partials.toast-container')

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
