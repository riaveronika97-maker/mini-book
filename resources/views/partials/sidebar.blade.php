<div class="d-flex flex-column h-100 p-3 p-lg-4">
    <a class="mb-brand" href="{{ route('home') }}">
        <span class="mb-brand-mark"><i class="bi bi-calendar2-check" aria-hidden="true"></i></span>
        <span>{{ config('app.name') }}</span>
    </a>

    <div class="mt-4">
        <p class="mb-nav-section">Operasional</p>
        <nav class="nav flex-column gap-1" aria-label="Navigasi operasional">
            <a class="mb-nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
               href="{{ url('/admin/dashboard') }}"
               @if (request()->is('admin/dashboard')) aria-current="page" @endif>
                <i class="bi bi-speedometer2" aria-hidden="true"></i>
                <span>Dashboard</span>
            </a>
            <a class="mb-nav-link {{ request()->routeIs('schedule.*') ? 'active' : '' }}"
               href="{{ route('schedule.index') }}"
               @if (request()->routeIs('schedule.*')) aria-current="page" @endif>
                <i class="bi bi-calendar3" aria-hidden="true"></i>
                <span>Jadwal publik</span>
            </a>
        </nav>
    </div>

    <div class="mt-auto pt-4">
        <div class="mb-venue-card">
            <div class="d-flex align-items-center gap-2 mb-2">
                <span class="mb-kpi-icon" style="width: 2rem; height: 2rem;">
                    <i class="bi bi-geo-alt" aria-hidden="true"></i>
                </span>
                <div class="small fw-semibold">Minisoccer Ngabang</div>
            </div>
            <p class="small text-muted mb-2">Kalimantan Barat</p>
            <span class="mb-badge mb-badge-available">
                <i class="bi bi-broadcast" aria-hidden="true"></i> Operasional
            </span>
        </div>
    </div>
</div>
