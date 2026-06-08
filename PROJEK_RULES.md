# 🏛️ PROJECT RULES & ARCHITECTURE SPECIFICATION
## Project Name: E-Aspirasi (Platform Pengaduan & Aspirasi Masyarakat)

---

## 1. 🚀 TECH STACK & SYSTEM ENVIRONMENT
- **Backend Framework:** Laravel 11 (PHP 8.2+)
- **Frontend Engine:** Laravel Blade Templates
- **Styling Framework:** Tailwind CSS (via Vite)
- **Interactivity & Islands:** Alpine.js (untuk komponen interaktif ringan/tanpa reload berat)
- **Database:** MySQL
- **Version Control:** Git (Strict semantic commit messages)

---

## 2. 🎨 UI/UX DESIGN SYSTEM & VIBES
Website ini harus memiliki tampilan kelas dunia (*world-class*), modern, interaktif, dan sangat tepercaya karena berfungsi sebagai platform layanan publik.

### 🚫 UI Constraints (PENTING)
- **LIGHT MODE ONLY:** Aplikasi ini **TIDAK MENDUKUNG DARK MODE**. Seluruh komponen visual harus dioptimalkan secara eksklusif untuk tampilan Light Mode yang bersih, terang, dan profesional. Jangan hasilkan kelas `dark:` pada Tailwind.

### 🎨 Color Palette & Typography
- **Primary:** Corporate Slate Blue (`#1e3a8a` / `bg-blue-900`) -> Memberikan kesan formal, aman, dan tepercaya.
- **Success/Resolution:** Emerald Green (`bg-emerald-600`) -> Untuk status "Selesai" atau "Diverifikasi".
- **Warning/Pending:** Amber Gold (`bg-amber-500`) -> Untuk status "Proses" atau "Pending".
- **Background:** Pure White & Soft Gray (`bg-slate-50` / `bg-slate-100`) -> Menjaga keterbacaan tetap tinggi.
- **Typography:** Sans-serif modern (Inter / Geist / Plus Jakarta Sans).

### ✨ Experience & Interactivity Goals
- Layout harus terasa lapang (utilitas *padding* dan *gap* yang konsisten).
- Gunakan transisi halus (`transition-all duration-300`) pada tombol, *hover state*, dan komponen interaktif.
- Berikan *feedback* instan: Efek *skeleton loading* saat memuat data, indikator progres unggah berkas, dan notifikasi *toast* yang interaktif.

---

## 3. 👥 ROLE-BASED ACCESS CONTROL (RBAC)
Aplikasi memiliki pemisahan hak akses yang sangat ketat menggunakan *Middleware* Laravel. Pengalihan rute (*routing/redirection*) harus akurat sesuai dengan *role* masing-masing setelah login.

| Role | Ruang Lingkup Akses (Scope) | Halaman Utama (Redirect Target) |
| :--- | :--- | :--- |
| **Masyarakat** (Visitor/User) | Mengajukan laporan, melihat riwayat laporan pribadi, melacak status, mengubah profil, serta mengganti bahasa. | `/dashboard/user` (Halaman Publik/Masyarakat) |
| **Petugas** (Staff) | Memvalidasi aspirasi baru, mengubah status laporan, dan memberikan tanggapan/komentar resmi. | `/dashboard/petugas` (Dashboard Staff) |
| **Admin** (Super Admin) | Manajemen penuh atas user (Petugas/Masyarakat), mengelola kategori aspirasi, kontrol sistem, dan melihat statistik global. | `/dashboard/admin` (Dashboard Utama Admin) |

> ⚠️ **Security Warning:** Pastikan akun administratif tidak dapat mengakses atau dialihkan secara keliru ke halaman publik pengunjung (hindari kebocoran hak akses/Error 403 akibat salah rute).

---

## 4. 🧭 MULTI-LANGUAGE SYSTEM (LOCALIZATION)
Aplikasi mendukung sistem multi-bahasa penuh secara dinamis (**ID/EN**).
- Semua string teks statis, label *form*, pesan *error*, notifikasi, dan menu navigasi harus dibungkus menggunakan helper lokalisasi Laravel: `__('messages.key')`.
- Pilihan bahasa harus tersedia di navigasi utama untuk semua *role*.

---

## 5. 🛠️ CORE FEATURES LIST

### A. Sisi Masyarakat (Masyarakat Portal)
- **Form Aspirasi Interaktif:** Input judul, isi aspirasi, kategori (dropdown), dan komponen *drag-and-drop* untuk unggah foto bukti laporan.
- **Aspirasi Timeline Tracking:** Komponen visual berbentuk lini masa (*timeline*) interaktif untuk memantau status laporan:
  $$\text{Pending} \longrightarrow \text{Diverifikasi} \longrightarrow \text{Diproses} \longrightarrow \text{Selesai}$$
- **Anonimitas:** Opsi untuk menyembunyikan nama pelapor saat aspirasi ditampilkan di ruang publik.

### B. Sisi Petugas & Admin (Management Dashboard)
- **Statistik Dashboard:** Menampilkan data ringkas berbentuk kartu (*cards*) interaktif dan grafik visual (misal menggunakan Chart.js atau SVG murni) untuk total laporan masuk, diproses, dan selesai.
- **Sistem Verifikasi & Respon:** Validasi satu klik untuk mengubah status disertai kolom input kaya teks (*rich-text/textarea*) untuk memberikan tanggapan resmi kepada masyarakat.
- **Manajemen Pengguna & Kategori:** Fitur CRUD data master untuk kategori aspirasi dan akun petugas baru (Khusus Admin).

---

## 6. 💻 CODING STANDARDS & MODULARITY (RULES FOR AI)
Ketika memproduksi kode, AI (Gemini & Antigravity) **wajib** mematuhi aturan berikut:

### 📂 Struktur File & Backend Rules
- **Clean Architecture:** Pisahkan logika bisnis dari berkas *routing*. Gunakan *Controller* khusus untuk masing-masing *role*.
- **Validation:** Semua input form wajib melalui lapisan keamanan `FormRequest` terpisah untuk validasi data yang bersih dan aman.
- **Database Safety:** Gunakan *Laravel Migration* lengkap dengan *foreign keys* yang terstruktur. Gunakan *Database Seeder* untuk data awal peran (*roles*) dan admin utama.

### 🎨 Frontend & Blade Rules
- **Strictly Modular:** Dilarang membuat satu file Blade raksasa. Pisahkan elemen UI global ke dalam folder `resources/views/components/` atau `layouts/` (misalnya: `sidebar.blade.php`, `navbar.blade.php`, `card-aspirasi.blade.php`).
- **Utility-First Tailwind:** Gunakan kelas Tailwind secara murni. Jika ada pola komponen yang berulang, manfaatkan fitur komponen Blade.
- **No In-line CSS:** Seluruh gaya visual harus dikendalikan oleh Tailwind CSS.

---

## 7. 📈 VERSION CONTROL & GIT RULES
Setiap perubahan kode harus dicatat dengan pesan komit (*commit message*) yang terstruktur menggunakan format berikut:
- `feat(auth): implement multi-language login page with tailwind`
- `fix(routing): resolve incorrect dashboard redirection for admin role`
- `refactor(ui): modularize admin sidebar component into separate blade view`
- `chore(deps): configure tailwind and vite assembly`