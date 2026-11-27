# Product Requirements Document (PRD) — MiniBook

**Produk:** MiniBook  
**Versi dokumen:** 1.0  
**Tanggal sumber SRS:** 10 Oktober 2026  
**Platform:** Web responsif (Android, iPhone, desktop/tablet)  
**Lokasi operasional:** Minisoccer Ngabang, Kalimantan Barat

## 1. Ringkasan Produk
MiniBook adalah aplikasi web untuk pemesanan lapangan minisoccer. Aplikasi membantu pelanggan memeriksa jadwal dan harga, memilih slot bermain, mengirim data pemesan serta bukti transfer, dan melacak status pesanan. Admin mengelola slot, memverifikasi transaksi, dan memantau operasional. Owner melihat laporan penyewaan dan performa usaha.


## 2. Masalah dan Peluang
Saat ini informasi jadwal kosong dan pemesanan disampaikan melalui Instagram dan WhatsApp, sehingga pelanggan harus menghubungi admin untuk memastikan ketersediaan. Proses manual berpotensi menyebabkan kesalahan pencatatan atau bentrok jadwal, serta menyulitkan pemilik memantau transaksi.

**Peluang:** menyediakan satu tempat untuk informasi slot, harga, booking, status transaksi, dan laporan.

## 3. Tujuan
- Memudahkan pelanggan melihat slot tersedia tanpa menghubungi admin terlebih dahulu.
- Memungkinkan booking berdasarkan tanggal dan jam serta mengurangi risiko double booking.
- Menyimpan data pelanggan dan pesanan secara terstruktur.
- Memudahkan admin mengelola jadwal, harga, slot, dan verifikasi pembayaran.
- Membantu owner memantau pendapatan, okupansi, jam sewa, dan laporan.

## 4. Pengguna dan Stakeholder
| Peran | Tujuan | Hak akses / kebutuhan |
|---|---|---|
| Pelanggan | Menemukan slot dan melakukan booking | Melihat jadwal/harga, booking, upload bukti transfer, riwayat dan status, pembatalan |
| Admin / Pengelola | Mengoperasikan layanan sewa | Mengelola slot, status slot, harga, data pesanan, memeriksa bukti transfer, menyetujui/menolak pesanan |
| Owner | Memantau usaha | Melihat laporan dan ringkasan operasional/pendapatan |

Persona sumber: owner memiliki literasi digital tinggi dan ingin melihat aktivitas serta laporan; admin menggunakan smartphone dan perlu menghindari kesalahan input serta jadwal bentrok.

## 5. Ruang Lingkup
### In scope
- Kalender/daftar jadwal per tanggal.
- Slot bermain per jam dan status tersedia/terisi (serta kontrol maintenance oleh admin).
- Informasi tarif siang, sore, malam, dan tarif pelajar.
- Pemilihan slot booking.
- Form data pemesan: nama, nama tim/komunitas, WhatsApp, kategori pelajar/mahasiswa.
- Pembayaran manual via transfer dan upload bukti transfer.
- Persetujuan aturan pembatalan/denda 50%.
- Riwayat booking, filter status, pencarian nama/kode booking, pembatalan.
- Verifikasi pembayaran oleh admin (setujui atau tolak).
- Dashboard laporan harian dan bulanan serta unduh laporan.
### Out of scope / batasan
- Pembayaran online otomatis/payment gateway.
- Sistem hanya membantu pencatatan dan verifikasi transfer manual.
- Pengembangan dibatasi waktu tugas kuliah.
- Ketentuan sewa dan pembatalan mengikuti keputusan owner.

## 6. Alur Utama
### 6.1 Booking pelanggan
1. Pelanggan membuka jadwal dan memilih tanggal.
2. Sistem menampilkan slot 1 jam, status, kategori waktu, dan tarif.
3. Pelanggan memilih satu atau lebih slot tersedia.
4. Pelanggan mengisi nama, tim/komunitas, WhatsApp, dan kategori pelajar jika berlaku.
5. Sistem menampilkan ringkasan harga dan rekening transfer.
6. Pelanggan menyetujui ketentuan pembatalan 50%, mengunggah bukti transfer, lalu mengirim pesanan.
7. Pesanan masuk status **Menunggu Verifikasi**.
8. Admin memeriksa bukti transfer lalu menyetujui atau menolak.
9. Pelanggan melihat status terbaru pada riwayat.
### 6.2 Pengelolaan admin
- Admin membuka dashboard, melihat transaksi yang perlu diverifikasi.
- Admin membuka bukti transfer dan detail order.
- Admin menyetujui atau menolak transaksi.
- Admin dapat mengubah slot menjadi maintenance atau membuka kembali slot; perubahan terlihat di jadwal pelanggan.
### 6.3 Pemantauan owner
- Owner melihat laporan harian/bulanan.
- Laporan menampilkan pendapatan, okupansi, slot/jam tersewa, kategori pendapatan, prime time, dan rincian periodik.

## 7. Kebutuhan Fungsional
| ID | Requirement | Prioritas |
|---|---|---|
| PR-01 | Sistem menampilkan kalender tanggal untuk pemilihan jadwal. | Must |
| PR-02 | Sistem menampilkan slot bermain per jam dan status ketersediaannya. | Must |
| PR-03 | Sistem menampilkan harga berdasarkan kategori waktu serta tarif pelajar. | Must |
| PR-04 | Pelanggan dapat memilih slot tersedia untuk booking. | Must |
| PR-05 | Sistem mengumpulkan nama, nama tim, nomor WhatsApp, dan kategori pelanggan. | Must |
| PR-06 | Sistem menampilkan rekening transfer dan menerima upload bukti transfer. | Must |
| PR-07 | Sistem menyimpan booking dengan status menunggu verifikasi. | Must |
| PR-08 | Sistem menampilkan riwayat booking, status, total bayar, kode booking, dan pencarian/filter. | Must |
| PR-09 | Pelanggan dapat mengajukan pembatalan dan sistem menampilkan ketentuan denda 50%. | Must |
| PR-10 | Admin dapat memeriksa bukti dan menyetujui atau menolak booking. | Must |
| PR-11 | Admin dapat mengatur slot (maintenance/buka) dan perubahan tercermin pada jadwal pelanggan. | Must |
| PR-12 | Owner/admin dapat melihat laporan harian dan bulanan. | Should |
| PR-13 | Laporan dapat diunduh. | Should |
| PR-14 | Sistem menyediakan pencatatan terstruktur untuk pelanggan dan booking. | Must |

## 8. Aturan Bisnis dan Data Tarif
Tarif yang tampil pada mockup desain:
| Kategori | Rentang jam | Reguler/jam | Pelajar/jam |
|---|---|---:|---:|
| Siang | 08.00–14.00 | Rp100.000 | Rp80.000 |
| Sore | 15.00–17.00 | Rp150.000 | Rp120.000 |
| Malam | 18.00–22.00 | Rp200.000 | Rp160.000 |

- Slot memiliki durasi 1 jam.
- Mockup menyebut pelajar/mahasiswa mendapatkan potongan 20%.
- Pembayaran dilakukan melalui transfer manual ke rekening yang ditampilkan.
- Pesanan diverifikasi admin setelah bukti transfer diterima.
- Pembatalan sepihak oleh pemesan dikenai denda 50% dari total pembayaran.
- Jadwal harus mencegah slot yang sama dipesan secara bersamaan.

**Catatan konfirmasi:** rentang tarif pada mockup menyisakan jeda jam (14.00–15.00 dan 17.00–18.00) serta terdapat slot sampai 23.00, sementara tarif malam tertulis 18.00–22.00. Jam operasional dan pembagian tarif perlu dikonfirmasi kepada owner sebelum implementasi.

## 9. Status Booking
Status yang tampak pada desain:
- **Menunggu Verifikasi:** bukti transfer sedang diperiksa.
- **Disetujui/Lunas:** transaksi dikonfirmasi oleh pengelola.
- **Batal:** booking dibatalkan.
Status **Ditolak** direkomendasikan untuk keputusan admin menolak bukti/pemesanan; perlu disepakati apakah status ini ditampilkan terpisah.
## 10. Dashboard dan Metrik
### Laporan harian
- Total pendapatan hari itu.
- Tingkat okupansi slot.
- Jam prime time terpakai.
- Pendapatan per kategori (siang/sore/malam).
- Daftar slot tersewa dan pesanan.
- Verifikasi transaksi masuk.
### Laporan bulanan
- Pendapatan bulan berjalan dan perbandingan bulan lalu.
- Total jam tersewa.
- Utilisasi lapangan.
- Pendapatan per minggu dan rincian pendapatan/jam.
- Slot booking dan verifikasi transaksi.

Angka pada gambar desain adalah contoh/mock data, bukan target bisnis.

## 11. Acceptance Criteria Tingkat Produk
- Pelanggan dapat melihat slot yang tersedia berdasarkan tanggal.
- Slot terisi/maintenance tidak dapat dipilih untuk booking.
- Total pembayaran dihitung sesuai tarif dan kategori pelanggan.
- Booking memerlukan data pemesan, persetujuan ketentuan, dan bukti transfer (batas upload pada mockup 5 MB; JPG/PNG/screenshot).
- Booking baru ditandai Menunggu Verifikasi.
- Admin dapat melihat bukti, menyetujui atau menolak transaksi.
- Perubahan status slot admin diperbarui pada tampilan pelanggan.
- Pelanggan dapat mencari dan memfilter riwayat booking.
- Owner/admin dapat mengganti laporan harian/bulanan dan melihat metrik terkait.
## 12. Non-functional Requirements (usulan yang perlu diuji)
| ID | Requirement | Kriteria |
|---|---|---|
| NFR-01 | Responsif pada ponsel Android/iOS dan desktop. | Uji ukuran layar ponsel, tablet, desktop. |
| NFR-02 | Performa halaman jadwal. | Target awal: halaman utama/jadwal tampil ≤3 detik pada koneksi broadband yang disepakati; validasi melalui Lighthouse. |
| NFR-03 | Keamanan. | HTTPS, kontrol akses berdasarkan role, validasi input, dan proteksi upload; audit checklist OWASP. |
| NFR-04 | Aksesibilitas. | Gunakan label form, kontras, fokus keyboard; target audit WCAG 2.1 AA. |
| NFR-05 | Konsistensi booking. | Uji concurrent booking; satu slot tidak boleh dikonfirmasi untuk dua pesanan pada waktu yang sama. |
| NFR-06 | Upload. | File bukti JPG/PNG, maksimum 5 MB sesuai desain; validasi tipe dan ukuran. |
| NFR-07 | Maintainability. | Kode berada di version control dan modul utama terdokumentasi. |

Target angka NFR merupakan usulan awal, bukan ketentuan eksplisit sumber, dan perlu persetujuan.
## 13. Risiko dan Mitigasi
| Risiko | Mitigasi |
|---|---|
| Booking slot bersamaan | Validasi ketersediaan ulang dan transaksi atomik saat menyimpan booking. |
| Bukti transfer tidak valid | Admin melakukan verifikasi manual sebelum status lunas. |
| Pengguna mengunggah file tidak aman | Validasi format, ukuran, dan penyimpanan file terkontrol. |
| Ketidakjelasan jam kategori tarif | Konfirmasi jam operasional/tarif kepada owner. |
| Pembatalan booking | Tampilkan aturan 50% sebelum submit dan sebelum tindakan pembatalan. |
| Data laporan tidak akurat | Definisikan sumber pendapatan dan status yang dihitung dalam laporan. |
## 14. Dependensi dan Asumsi
- Owner menyediakan tarif, jam operasional, rekening transfer, dan aturan pembatalan yang final.
- Admin melakukan verifikasi transfer manual.
- Aplikasi dapat diakses melalui browser modern pada ponsel dan desktop.
- Desain referensi merupakan acuan UI; angka pada dashboard bersifat ilustratif.
- Backend, database, autentikasi, dan hosting belum ditentukan oleh sumber.
## 15. Pertanyaan Terbuka
1. Jam operasional final dan slot mana saja yang tersedia (termasuk jeda 14.00–15.00, 17.00–18.00, serta slot 22.00–23.00)?
2. Apakah pelanggan harus login, atau booking dapat dilakukan tanpa akun?
3. Berapa lama slot ditahan ketika pelanggan sedang mengisi formulir/upload bukti?
4. Apakah status penolakan admin berbeda dari pembatalan pelanggan?
5. Apakah denda 50% berlaku untuk seluruh kondisi pembatalan, dan bagaimana pengembalian sisa pembayaran ditangani?
6. Format dan periode laporan yang dapat diunduh (CSV/PDF/Excel) apa yang diinginkan?
7. Apakah harga dan rekening transfer dapat diubah admin, atau hanya owner?
