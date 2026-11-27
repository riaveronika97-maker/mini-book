@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h1 class="mb-page-title">Dashboard pengelola</h1>
            <p class="mb-page-subtitle">Ringkasan operasional MiniBook akan tampil di sini.</p>
        </div>
        <span class="mb-badge mb-badge-approved">
            <i class="bi bi-check-circle" aria-hidden="true"></i> Setup berhasil
        </span>
    </div>

    <div class="alert alert-success d-flex align-items-start gap-2" role="status">
        <i class="bi bi-check-circle-fill mt-1" aria-hidden="true"></i>
        <div>
            <strong>Bootstrap 5, layout dashboard, dan autentikasi dasar sudah aktif.</strong>
            <div class="small mt-1">Konten KPI, verifikasi, dan pengelolaan slot akan diisi pada task backend dan frontend berikutnya.</div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card mb-card h-100">
                <div class="card-body p-4">
                    <span class="mb-kpi-label">Status setup</span>
                    <div class="mb-kpi-value mt-1">Siap</div>
                    <p class="small text-muted mb-0">Asset dan layout berhasil dikompilasi.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-card h-100">
                <div class="card-body p-4">
                    <span class="mb-kpi-label">Framework</span>
                    <div class="mb-kpi-value mt-1">Laravel 9</div>
                    <p class="small text-muted mb-0">PHP 8.1 dengan Bootstrap 5.3.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-card h-100">
                <div class="card-body p-4">
                    <span class="mb-kpi-label">Zona waktu</span>
                    <div class="mb-kpi-value mt-1">WIB</div>
                    <p class="small text-muted mb-0">Asia/Jakarta untuk seluruh jadwal.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
