@extends('layouts.auth')

@section('title', 'Masuk Pengelola')

@section('content')
    <div class="card mb-card">
        <div class="card-body p-4 p-md-5">
            <div class="mb-4">
                <span class="mb-badge mb-badge-approved mb-2">
                    <i class="bi bi-shield-lock" aria-hidden="true"></i> Area Pengelola
                </span>
                <h1 class="h3 mb-2">Masuk ke {{ config('app.name') }}</h1>
                <p class="text-muted mb-0">Halaman ini khusus admin dan owner. Pelanggan tidak perlu membuat akun untuk melakukan booking.</p>
            </div>

            <form method="POST" action="{{ route('login.attempt') }}" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           autocomplete="email"
                           inputmode="email"
                           required
                           autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Kata sandi</label>
                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           id="password"
                           name="password"
                           autocomplete="current-password"
                           required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Ingat saya di perangkat ini</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-box-arrow-in-right me-1" aria-hidden="true"></i>Masuk
                </button>
            </form>

            <div class="alert alert-info d-flex align-items-start gap-2 mt-4 mb-0 small" role="note">
                <i class="bi bi-info-circle-fill mt-1" aria-hidden="true"></i>
                <div>Pelanggan melakukan booking langsung dari halaman jadwal tanpa login. Riwayat dapat dicek menggunakan kode booking dan nomor WhatsApp.</div>
            </div>
        </div>
    </div>
@endsection
