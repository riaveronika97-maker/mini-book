@extends('layouts.app')

@section('title', 'Booking Lapangan')

@section('content')
    <div class="row align-items-center g-4 g-lg-5 mb-5">
        <div class="col-lg-7">
            <span class="mb-badge mb-badge-approved mb-3">
                <i class="bi bi-geo-alt-fill" aria-hidden="true"></i> Minisoccer Ngabang
            </span>
            <h1 class="display-5 fw-bold mb-3" style="letter-spacing: -0.04em;">Waktunya turun ke lapangan.</h1>
            <p class="lead text-muted mb-4" style="max-width: 38rem;">
                Cek slot kosong, lihat tarif, dan pesan lapangan mini soccer tanpa perlu menghubungi admin satu per satu.
            </p>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('schedule.index') }}" class="btn btn-primary btn-lg">
                    <i class="bi bi-calendar3 me-1" aria-hidden="true"></i>Lihat jadwal
                </a>
                <a href="{{ route('booking.lookup') }}" class="btn btn-outline-secondary btn-lg">
                    <i class="bi bi-search me-1" aria-hidden="true"></i>Cek booking
                </a>
            </div>
            <p class="small text-muted mt-3 mb-0">
                <i class="bi bi-info-circle me-1" aria-hidden="true"></i>Setiap slot berdurasi 1 jam. Booking diverifikasi admin setelah bukti transfer diterima.
            </p>
        </div>

        <div class="col-lg-5">
            <div class="card mb-card">
                <div class="card-body p-4 p-lg-5">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h2 class="h5 mb-0">Tarif per jam</h2>
                        <span class="mb-badge mb-badge-approved">Pelajar 20%</span>
                    </div>
                    <div class="mb-summary-row">
                        <span class="text-muted">Siang <span class="small">(08.00–15.00)</span></span>
                        <span class="fw-semibold">Rp100.000</span>
                    </div>
                    <div class="mb-summary-row">
                        <span class="text-muted">Sore <span class="small">(15.00–18.00)</span></span>
                        <span class="fw-semibold">Rp150.000</span>
                    </div>
                    <div class="mb-summary-row">
                        <span class="text-muted">Malam <span class="small">(18.00–23.00)</span></span>
                        <span class="fw-semibold">Rp200.000</span>
                    </div>
                    <div class="mb-summary-row total">
                        <span>Pelajar/mahasiswa</span>
                        <span class="text-primary">20% lebih hemat</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 g-lg-4">
        <div class="col-md-4">
            <div class="card mb-card h-100">
                <div class="card-body p-4">
                    <span class="mb-kpi-icon mb-3"><i class="bi bi-calendar2-week" aria-hidden="true"></i></span>
                    <h2 class="h6">Jadwal jelas</h2>
                    <p class="small text-muted mb-0">Lihat slot tersedia, terisi, dan maintenance langsung dari kalender.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-card h-100">
                <div class="card-body p-4">
                    <span class="mb-kpi-icon mb-3"><i class="bi bi-wallet2" aria-hidden="true"></i></span>
                    <h2 class="h6">Tarif transparan</h2>
                    <p class="small text-muted mb-0">Harga siang, sore, malam, dan tarif pelajar terlihat sebelum memesan.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-card h-100">
                <div class="card-body p-4">
                    <span class="mb-kpi-icon mb-3"><i class="bi bi-patch-check" aria-hidden="true"></i></span>
                    <h2 class="h6">Verifikasi mudah</h2>
                    <p class="small text-muted mb-0">Upload bukti transfer dan pantau status booking kapan saja.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
