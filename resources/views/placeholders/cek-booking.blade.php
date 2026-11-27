@extends('layouts.app')

@section('title', 'Cek Booking')

@section('content')
    <div class="mb-page-header mb-4">
        <span class="mb-badge mb-badge-pending mb-2">
            <i class="bi bi-tools" aria-hidden="true"></i> Dalam Pengembangan
        </span>
        <h1 class="mb-page-title">Cek booking</h1>
        <p class="mb-page-subtitle">Masukkan kode booking dan nomor WhatsApp untuk melihat status pesanan.</p>
    </div>

    <div class="card mb-card">
        <div class="card-body mb-empty-state py-5">
            <i class="bi bi-search" aria-hidden="true"></i>
            <h2 class="h5 mt-3">Pencarian booking sedang disiapkan</h2>
            <p class="mb-3">Fitur cek status dan riwayat booking akan tersedia pada tahap berikutnya.</p>
            <a href="{{ route('home') }}" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left me-1" aria-hidden="true"></i>Kembali ke halaman utama
            </a>
        </div>
    </div>
@endsection
