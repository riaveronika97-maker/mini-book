# Design Specification — MiniBook

**Basis desain:** file `design.pdf` (7 halaman mockup) dan SRS MiniBook.  
**Frontend styling framework:** Bootstrap 5.  
**Product:** web booking minisoccer — Minisoccer Ngabang, Kalimantan Barat.


## 1. Design Goals
- Jadwal, slot, harga, dan status booking mudah dipahami sekilas.
- Prioritaskan alur pelanggan mobile-first, namun mockup desktop menggunakan sidebar navigasi.
- Admin memiliki area operasional yang efisien untuk verifikasi dan pengaturan slot.
- Owner dapat membaca laporan tanpa perlu mengolah transaksi secara manual.
- Konsisten menggunakan status, warna, tipografi, spacing, dan komponen Bootstrap 5.

## 2. Visual Direction
- **Style:** dashboard SaaS sederhana, bersih, terang, rapi, dengan ruang kosong yang cukup.
- **Primary:** hijau/teal untuk brand MiniBook, tombol aksi utama, status aktif.
- **Background:** abu-abu sangat terang pada area aplikasi; panel/kartu putih.
- **Status:** hijau untuk tersedia/approved, merah muda atau merah untuk terisi/aksi pembatalan, kuning untuk menunggu verifikasi.
- **Typography:** system font stack Bootstrap; heading ringkas dan body mudah dibaca.
- **Borders:** garis tipis dan rounded corners moderat; shadow sangat halus.

### Bootstrap 5 design tokens (starting point)
```css
:root {
  --mb-primary: #087f65;
  --mb-primary-dark: #066b55;
  --mb-bg: #f5f7f8;
  --mb-surface: #ffffff;
  --mb-text: #23332f;
  --mb-muted: #7b8986;
  --mb-success-bg: #e8f6f0;
  --mb-warning-bg: #fff5dd;
  --mb-danger-bg: #fff0f2;
  --mb-border: #e4e9e8;
}
```
Adjust token after visual QA. Avoid using color as the sole status signal; pair color with text/icons.

## 3. Bootstrap 5 Implementation
Use Bootstrap 5 grid, utilities, form controls, cards, tables, badges, nav, modal/offcanvas, and responsive breakpoints. Do not recreate Bootstrap components unless the mockup requires a specialized interaction.

### Suggested base layout
```html
<div class="container-fluid min-vh-100 bg-light">
  <div class="row">
    <aside class="col-lg-2 d-none d-lg-block bg-white border-end">
      <!-- brand, primary navigation, venue information -->
    </aside>
    <main class="col-12 col-lg-10 px-3 px-lg-4 py-4">
      <!-- page header and content -->
    </main>
  </div>
</div>
```
- Desktop: sidebar fixed-width feel using `col-lg-2`; content `col-lg-10`.
- Mobile: sidebar becomes `offcanvas` navigation or compact top navbar.
- Header: page title, description, current date, role/account dropdown.
- Content sections use `row g-3` / `row g-4`, `card`, and responsive columns.
- Spacing use Bootstrap spacing scale (`p-3`, `p-4`, `mb-3`, `gap-2`).

## 4. Shared Components
| Component | Bootstrap 5 pattern | Behavior |
|---|---|---|
| Sidebar | `nav`, `list-group`, responsive `offcanvas` | Jadwal, Pemesanan, Riwayat, Dashboard Admin |
| Page header | flex utilities, heading, supporting text | Title, subtitle, contextual action/date |
| Date strip | cards/buttons, `overflow-auto` | Select date; selected state |
| Slot card | `card`, border, badge | Show time, time-category, price, availability; selectable only if available |
| Availability badge | `badge` | Available, occupied, maintenance |
| Price panel | `card` and list | Price per period and student rate |
| Booking stepper | `nav`/custom flex with badges | Select slot → data → payment |
| Form | `form-control`, `form-check`, validation classes | Customer info and student checkbox |
| Payment account | card/list with copy action | Display bank/account name and copy account number |
| Upload proof | file input, dashed-border drop zone | JPG/PNG, max 5 MB |
| Order status | badges | Waiting, approved/paid, cancelled |
| Summary card | `card` | Selected slot, price and total |
| Data table | `table-responsive`, `table` | Orders, search, filter and pagination |
| Dashboard KPI | `card` | Revenue, occupancy, rented slots/hours, prime-time |
| Alert/info box | `alert` | Booking instructions, cancellation terms, payment guidance |

## 5. Page Design Specifications

### 5.1 Schedule / Booking Availability (reference PDF page 1)
**Purpose:** let customers see availability and price and choose date/time.
- Sidebar branding, navigation (Jadwal, Pemesanan, Riwayat), manager section (Dashboard Admin), venue location card and live order indicator.
- Page header: “Waktunya turun ke lapangan.”, short instructions, date/current-day button.
- Horizontal date picker/weekday cards for five-day view. Selected date has primary background.
- Main area: responsive slot grid; each card shows time range, day/night category, hourly price, and status.
- Slot available: selectable; occupied: muted/pink and disabled. Selected slot: primary border/background.
- Price reference card to the side on wide screens; below schedule on smaller screens.
- Selected-slot summary shows count and next action; empty state asks user to select an available slot.
- Informational note: each slot is one hour.

**Responsive layout:** desktop grid (schedule 8 columns, pricing/summary 4 columns); tablet/mobile use full-width schedule cards with pricing panel below. Slot grid may collapse to 1–2 columns depending on viewport.

### 5.2 Booking Form & Payment (reference PDF page 2)
**Purpose:** capture customer details, payment and submit booking.
- Page title “Pemesanan lapangan”, short explanation, back-to-schedule action.
- Three-step progress: Pilih slot → Data pemesan → Pembayaran.
- Customer form fields: Nama lengkap, Nama tim/komunitas, Nomor WhatsApp.
- Checkbox for Pelajar/Mahasiswa; displays 20% discount explanation.
- Payment card explains manual bank transfer; accounts shown with copy buttons.
- Upload area for transfer receipt, accepts JPG/PNG, max 5 MB.
- Right-side (desktop) booking/payment summary: selected slot, field price, discount if applicable, total.
- Cancellation rule checkbox: customer explicitly agrees to 50% cancellation penalty.
- Primary action: “Kirim Pesanan Sekarang”. Explain that admin verifies after proof is received.
- If no slot selected, show empty state and link back to schedule; do not allow submission.
**Mobile:** all content stacks; summary precedes submit CTA or stays in a compact sticky summary. Avoid horizontal overflow.

### 5.3 Order History (reference PDF pages 3–5)
**Purpose:** allow customer to track bookings and cancel.
- Header with title/subtitle and “Booking baru” CTA.
- Summary KPI cards: Semua pesanan, Menunggu verifikasi, Disetujui/Lunas.
- Filter tabs: Semua, Menunggu, Lunas/Disetujui, Batal. Include status counts.
- Search field for customer name or booking code.
- Responsive table/list with customer, date, time slot, duration, total, status, action.
- Cancel action displays cancellation fee 50%; require confirmation modal and show penalty before finalizing.
- Info panel explains “Menunggu Verifikasi” and confirmation behavior.
- Separate cancellation-terms panel.
- Mobile table converts to stacked order cards; avoid tiny text and horizontal scroll where possible.

### 5.4 Admin Dashboard — Daily Report (reference PDF page 6)
**Purpose:** support operations and payment verification.
- Admin role indicator and dashboard header.
- Daily/monthly report tabs, date label, download report button.
- KPI cards: daily revenue, slot occupancy (occupied/total), prime-time category/hours.
- Revenue by category (Siang, Sore, Malam) with progress bars or compact rows.
- Today’s booked slots list with time, customer/team, amount, booking code, status.
- Slot status control: hourly chips/buttons; click toggles maintenance/open (confirm or toast feedback); status changes must reflect on customer schedule.
- Incoming transfer verification card: booking/customer, amount, date/slot, receipt link, approve/reject actions.
- Refresh action for transaction list.
- Approve/reject actions should require confirmation and give feedback.

### 5.5 Admin Dashboard — Monthly Report (reference PDF page 7)
**Purpose:** overview business performance over a month.
- KPI cards: monthly revenue, rented hours, utilization percentage, optionally month-over-month change.
- Weekly revenue chart (four/five week buckets as appropriate for selected month).
- Weekly breakdown table: period, revenue, hours rented.
- Reuse daily slot control and payment verification panels below monthly metrics.
- Use responsive Bootstrap layout; charts resize with container and must provide accessible labels/summary.

## 6. Navigation & Role Visibility
| Navigation item | Customer | Admin | Owner |
|---|---:|---:|---:|
| Jadwal | Yes | Yes | Optional/read-only |
| Pemesanan | Yes | Optional | No |
| Riwayat | Yes | Operational view | No |
| Dashboard Admin | No | Yes | Yes (reports) |
| Slot management | No | Yes | Read-only or no (confirm policy) |
| Payment verification | No | Yes | No (unless policy changes) |
| Reports | No | Operational view | Yes |

The reference visual shows a customer/admin role selector; role permissions must be enforced server-side, not merely hidden in the UI.
## 7. Interaction Rules
- Slot cards are disabled for occupied or maintenance slots.
- Selecting slot updates selected-slot summary and booking total.
- Student checkbox updates price to student rate (20% off, based on mockup).
- Upload validates file type and 5 MB limit before submission.
- Booking submission requires form validation, selected slot, receipt, and cancellation agreement.
- Booking created in pending-verification state; show confirmation with booking code.
- Admin approve/reject action updates order status and slot state; refresh/list feedback.
- Cancellation requires confirmation; show 50% penalty and amount calculation before action.
- Search and filter update order list; empty states explain no matching data.
- Copy bank account action provides immediate success feedback.
## 8. Status and Color Usage
| Status | Suggested visual | Label |
|---|---|---|
| Available | green dot/badge, selectable | Tersedia |
| Occupied | muted red/pink card, disabled | Terisi |
| Maintenance | gray/warning, disabled | Maintenance |
| Pending verification | yellow badge | Menunggu Verifikasi |
| Approved/paid | green badge | Disetujui/Lunas |
| Cancelled | neutral/red badge | Batal |
| Rejected (if implemented) | red badge | Ditolak |

## 9. Responsive Behavior
- **<576px:** single-column content, compact header, sidebar via offcanvas, date strip horizontal scroll, slot grid 1–2 columns, order history as cards, full-width CTA.
- **≥576px:** 2-column slot grid and form layout where space permits.
- **≥768px:** broader grid; summary cards may use 2–3 columns.
- **≥992px:** sidebar visible, schedule and price summary side-by-side, admin dashboard multi-column.
- **≥1200px:** preserve comfortable max content width and whitespace; avoid oversized cards.
- Use `container-fluid`, `row`, `col-*`, `g-*`, `flex-wrap`, `overflow-auto`, and display utilities rather than fixed pixel positioning.
## 10. Accessibility & UX
- Form fields must have visible labels and help/error text.
- Use semantic headings and landmarks (`nav`, `main`, `aside`, headings).
- Keyboard focus must be visible; slot selection must work by keyboard.
- Status includes readable text, not color only.
- Buttons have clear accessible labels and appropriate disabled states.
- Contrast should be checked against WCAG 2.1 AA.
- Modal cancellation and payment confirmation should trap focus and support Escape when appropriate.
## 11. Bootstrap 5 Components/Utilities
Recommended building blocks:
- `navbar`, `offcanvas`, `nav-pills`, `dropdown` for navigation.
- `container-fluid`, `row`, `col-*`, `g-*` for layout.
- `card`, `card-body`, `card-header` for content surfaces.
- `badge`, `alert`, `progress` for status and report visualization.
- `form-control`, `form-select`, `form-check`, `invalid-feedback` for forms.
- `table-responsive`, `table`, `pagination` for history and weekly details.
- `modal` for cancellation/approve/reject confirmation.
- `btn`, `btn-outline-*`, `btn-primary` with a custom theme override for actions.
- `d-flex`, `align-items-*`, `justify-content-*`, `gap-*`, `p-*`, `m-*`, `rounded-*` utilities.
## 12. Suggested Frontend Structure
```text
src/
├── layouts/
│   ├── CustomerLayout
│   └── AdminLayout
├── components/
│   ├── AppSidebar
│   ├── PageHeader
│   ├── DateSelector
│   ├── SlotCard
│   ├── SlotGrid
│   ├── PriceCategoryPanel
│   ├── BookingStepper
│   ├── BookingSummary
│   ├── PaymentProofUpload
│   ├── OrderStatusBadge
│   ├── OrderFilters
│   ├── OrderTable
│   ├── ReportKpiCard
│   ├── SlotManagementGrid
│   └── PaymentVerificationCard
└── pages/
    ├── SchedulePage
    ├── BookingPage
    ├── HistoryPage
    ├── AdminDailyReportPage
    └── AdminMonthlyReportPage
```
This is a suggested organization only; source files and framework are not specified by the documents.
## 13. Design QA Checklist
- [ ] Sidebar becomes mobile navigation on small screens.
- [ ] Date picker and slot cards usable without horizontal overflow.
- [ ] Available/occupied/maintenance states are distinguishable with text and color.
- [ ] Price panel matches approved tariffs.
- [ ] Student price updates totals consistently.
- [ ] Booking form shows inline validation.
- [ ] Upload rejects unsupported format and files >5 MB.
- [ ] Cancellation fee is displayed before confirmation.
- [ ] History filters, search and pagination are usable on mobile.
- [ ] Admin slot changes are reflected on customer schedule.
- [ ] Payment approve/reject actions give clear feedback.
- [ ] Daily/monthly report labels, chart values and totals are consistent.
- [ ] Focus, keyboard, contrast and screen-reader labels reviewed.

## 14. Open Design Decisions
- Confirm exact opening hours and price-category boundaries (mockup has time gaps and slot rows beyond the stated night tariff range).
- Confirm customer authentication vs guest booking.
- Confirm whether owner can edit tariffs and slot availability.
- Confirm cancellation/refund workflow and status taxonomy.
- Confirm download format for reports.
- Confirm whether selected slots are reserved temporarily before payment evidence is submitted.
