# MiniBook — Tasklist

**Proyek:** MiniBook  
**Referensi:** `agent/prd.md`, `agent/design.md`, `agent/task-instruction.md`  
**Terakhir diperbarui:** 27 November 2026

**Progress keseluruhan: 10%**

## Keputusan yang sudah dikunci

- Pelanggan booking sebagai guest; riwayat dicek dengan **kode booking + nomor WhatsApp**.
- Login hanya untuk **admin** dan **owner**.
- Jam operasional **08.00–23.00**, 15 slot/hari.
- Kategori tarif: **Siang 08–15**, **Sore 15–18**, **Malam 18–23**.
- Tarif: Siang Rp100.000/Rp80.000; Sore Rp150.000/Rp120.000; Malam Rp200.000/Rp160.000 (pelajar 20%).
- Laporan diunduh **PDF** dengan `barryvdh/laravel-dompdf` + halaman print-friendly.
- Pengaturan tarif/rekening hanya **owner**; admin mengelola verifikasi dan slot.
- Booking **Menunggu Verifikasi** ditahan **24 jam**, lalu auto-batal oleh scheduler.
- Pembatalan pending gratis; booking approved dikenai denda 50% dan refund 50% dicatat untuk pembayaran manual.
- Status **Ditolak** terpisah dari **Batal**.

---

## 1. Project Setup & Configuration

- [x] ✅ Task 1.1 - Install Bootstrap 5, Popper, Bootstrap Icons, Chart.js, dan Sass `[Mudah]` (Selesai)
  - `package.json`, `package-lock.json`; Webpack dipin ke `5.89.0` agar kompatibel dengan Laravel Mix 6.
- [x] ✅ Task 1.2 - Konfigurasi Laravel Mix + Sass + copy Bootstrap Icons `[Mudah]` (Selesai)
  - `webpack.mix.js`, `resources/sass/app.scss`, `resources/js/app.js`; menghasilkan `public/css/app.css`, `public/js/app.js`, `public/css/bootstrap-icons.css`, dan font ikon.
- [x] ✅ Task 1.3 - Terapkan design token dan style dasar `[Sedang]` (Selesai)
  - `resources/sass/app.scss`: token warna, sidebar, date strip, slot card, badge status, stepper, KPI, auth, upload zone, print.
- [x] ✅ Task 1.4 - Konfigurasi identitas aplikasi dan zona waktu `[Mudah]` (Selesai)
  - `config/app.php`, `.env`, `.env.example`: `APP_NAME=MiniBook`, `Asia/Jakarta`, locale `id`, faker `id_ID`.
- [x] ✅ Task 1.5 - Layout dasar customer, auth, dashboard, dan partial `[Sedang]` (Selesai)
  - `resources/views/layouts/{app,auth,dashboard}.blade.php`; `resources/views/partials/{flash,toast-container,sidebar}.blade.php`.
- [x] ✅ Task 1.6 - Login admin/owner dan role middleware `[Sedang]` (Selesai)
  - `app/Http/Controllers/Auth/LoginController.php`, `app/Http/Middleware/EnsureRole.php`, `app/Http/Kernel.php`, `routes/web.php`, `resources/views/auth/login.blade.php`.
- [x] ✅ Task 1.7 - Halaman placeholder dan verifikasi build `[Mudah]` (Selesai)
  - `resources/views/welcome.blade.php`, `resources/views/placeholders/*`, `resources/views/admin/dashboard.blade.php`; `npm run dev` sukses; `php artisan test` 2 passed; login HTTP terverifikasi. Route `/admin/dashboard` masih placeholder `auth` saja; role middleware final diterapkan di Task 5.1.
- [x] ✅ Task 1.8 - Buat tasklist proyek `[Mudah]` (Selesai)
  - `.agents/tasklist.md`.
- [x] ✅ Task 1.9 - Install `barryvdh/laravel-dompdf` untuk laporan PDF `[Mudah]` (Selesai)
  - `composer.json`, `composer.lock`; `barryvdh/laravel-dompdf v3.1.2` terpasang dan kompatibel dengan Laravel 9/PHP 8.1.

## 2. Database & Migration

- [ ] Task 2.1 - Migration kolom `role` dan `phone` pada `users` `[Mudah]`
- [ ] Task 2.2 - Migration `tariff_categories` `[Mudah]`
- [ ] Task 2.3 - Migration `slots` dengan unique `(date, start_time)` `[Sedang]`
- [ ] Task 2.4 - Migration `bookings` `[Sedang]`
- [ ] Task 2.5 - Migration `booking_slots` `[Sedang]`
- [ ] Task 2.6 - Migration `booking_status_histories` `[Mudah]`
- [ ] Task 2.7 - Migration `settings` `[Mudah]`
- [ ] Task 2.8 - Seeder akun admin dan owner `[Mudah]`
- [ ] Task 2.9 - Seeder tarif dan pengaturan awal `[Mudah]`
- [ ] Task 2.10 - Seeder slot 60 hari ke depan `[Sedang]`
- [ ] Task 2.11 - Seeder data demo booking untuk QA laporan (opsional) `[Sedang]`

## 3. Models & Relationships

- [ ] Task 3.1 - Model `User` + helper role `[Mudah]`
- [ ] Task 3.2 - Model `TariffCategory` `[Mudah]`
- [ ] Task 3.3 - Model `Slot` + scope ketersediaan `[Sedang]`
- [ ] Task 3.4 - Model `Booking` + scope/status accessor `[Sedang]`
- [ ] Task 3.5 - Model `BookingSlot` `[Mudah]`
- [ ] Task 3.6 - Model `BookingStatusHistory` `[Mudah]`
- [ ] Task 3.7 - Model `Setting` `[Mudah]`
- [ ] Task 3.8 - `BookingPolicy` dan otorisasi role `[Sedang]`
- [ ] Task 3.9 - Generator kode booking acak `[Mudah]`

## 4. Backend Logic & API

- [ ] Task 4.1 - `ScheduleController` + ketersediaan slot per tanggal `[Sedang]`
- [ ] Task 4.2 - `BookingController` create/store dengan validasi slot `[Sulit]`
- [ ] Task 4.3 - Halaman sukses + lookup booking via kode & WhatsApp `[Sedang]`
- [ ] Task 4.4 - Logika pembatalan + denda 50% + refund `[Sulit]`
- [ ] Task 4.5 - Dashboard admin harian `[Sedang]`
- [ ] Task 4.6 - Dashboard admin bulanan `[Sedang]`
- [ ] Task 4.7 - Approve/reject verifikasi pembayaran `[Sedang]`
- [ ] Task 4.8 - Pengelolaan slot maintenance oleh admin `[Sedang]`
- [ ] Task 4.9 - Unduh laporan PDF `[Sedang]`
- [ ] Task 4.10 - Pengaturan owner (tarif, rekening, denda, hold) `[Sedang]`
- [ ] Task 4.11 - Service `PricingService`, `SlotGeneratorService`, `BookingService`, `ReportService` `[Sulit]`
- [ ] Task 4.12 - FormRequest untuk semua input `[Sedang]`
- [ ] Task 4.13 - Endpoint JSON polling status/pending count `[Mudah]`

## 5. Security (Input Sanitization, Rate Limiting, XSS Protection, CSRF)

- [ ] Task 5.1 - Terapkan role middleware dan policy di semua route sensitif `[Sulit]`
- [ ] Task 5.2 - Audit CSRF, escaping XSS, dan validasi input `[Sedang]`
- [ ] Task 5.3 - Rate limiting login, booking, lookup, upload `[Sedang]`
- [ ] Task 5.4 - Simpan bukti transfer private + route akses berizin `[Sulit]`
- [ ] Task 5.5 - Validasi upload JPG/PNG maks. 5 MB + nama file acak `[Sedang]`
- [ ] Task 5.6 - Security headers middleware `[Mudah]`
- [ ] Task 5.7 - Pencegahan double booking atomik (`lockForUpdate`) `[Sulit]`
- [ ] Task 5.8 - Audit riwayat perubahan status booking `[Mudah]`
- [ ] Task 5.9 - Pastikan kode booking cukup acak dan tidak mudah ditebak `[Mudah]`

## 6. Frontend & Blade Views (Ikuti design.md)

- [ ] Task 6.1 - Finalisasi layout customer + sidebar/offcanvas admin `[Sedang]`
- [ ] Task 6.2 - Halaman jadwal + date strip + slot grid + price panel `[Sulit]`
- [ ] Task 6.3 - Halaman form booking + ringkasan pembayaran `[Sulit]`
- [ ] Task 6.4 - Halaman sukses booking + share `[Sedang]`
- [ ] Task 6.5 - Halaman riwayat/cek booking + filter/pencarian `[Sulit]`
- [ ] Task 6.6 - Halaman dashboard harian admin `[Sulit]`
- [ ] Task 6.7 - Halaman dashboard bulanan admin `[Sulit]`
- [ ] Task 6.8 - Halaman verifikasi pembayaran `[Sedang]`
- [ ] Task 6.9 - Halaman kelola slot maintenance `[Sedang]`
- [ ] Task 6.10 - Halaman pengaturan owner `[Sedang]`
- [ ] Task 6.11 - Finalisasi halaman login/error `[Mudah]`
- [ ] Task 6.12 - Responsive, aksesibilitas, status teks/ikon `[Sedang]`

## 7. JavaScript & Realtime Features

- [ ] Task 7.1 - Pemilihan slot, total harga, dan diskon pelajar `[Sulit]`
- [ ] Task 7.2 - Date strip interaktif `[Mudah]`
- [ ] Task 7.3 - Copy rekening + toast feedback `[Mudah]`
- [ ] Task 7.4 - Preview dan validasi upload di client `[Sedang]`
- [ ] Task 7.5 - Modal konfirmasi cancel/approve/reject `[Sedang]`
- [ ] Task 7.6 - Polling pending booking + sound notification `[Sedang]`
- [ ] Task 7.7 - Share booking via Web Share API/copy link `[Mudah]`
- [ ] Task 7.8 - Chart.js laporan bulanan + fallback tabel `[Sedang]`
- [ ] Task 7.9 - Validasi form Bootstrap + feedback inline `[Mudah]`

## 8. Additional Features (Sound Notification, Share, Toast, System Message, dll)

- [ ] Task 8.1 - Sound notification untuk booking baru `[Sedang]`
- [ ] Task 8.2 - Share booking `[Mudah]`
- [ ] Task 8.3 - Toast global `[Mudah]`
- [ ] Task 8.4 - Timeline status/system message `[Sedang]`
- [ ] Task 8.5 - Empty state semua halaman `[Mudah]`
- [ ] Task 8.6 - Halaman laporan print-friendly `[Sedang]`

## 9. Cleanup Command & Scheduler

- [ ] Task 9.1 - Command `slots:generate` `[Sedang]`
- [ ] Task 9.2 - Command `bookings:expire-pending` (24 jam) `[Sulit]`
- [ ] Task 9.3 - Command cleanup bukti transfer yatim `[Sedang]`
- [ ] Task 9.4 - Registrasi schedule di `app/Console/Kernel.php` `[Mudah]`
- [ ] Task 9.5 - Dokumentasi cron/scheduler `[Mudah]`

## 10. Final Polish & Bug Fixes

- [ ] Task 10.1 - Feature test alur booking `[Sulit]`
- [ ] Task 10.2 - Feature test double booking `[Sulit]`
- [ ] Task 10.3 - Feature test harga reguler/pelajar `[Sedang]`
- [ ] Task 10.4 - Feature test cancel/approve/reject `[Sulit]`
- [ ] Task 10.5 - Feature test role, upload, dan keamanan `[Sulit]`
- [ ] Task 10.6 - Feature test laporan harian/bulanan `[Sedang]`
- [ ] Task 10.7 - Seed ulang + QA manual mobile/desktop `[Sedang]`
- [ ] Task 10.8 - Audit aksesibilitas dan Lighthouse `[Sedang]`
- [ ] Task 10.9 - Update README setup dan akun demo `[Mudah]`
- [ ] Task 10.10 - Finalisasi tasklist 100% `[Mudah]`
