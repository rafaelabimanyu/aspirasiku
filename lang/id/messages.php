<?php

return [
    // Navbar
    'login' => 'Masuk',
    'register' => 'Daftar',
    'dashboard_admin' => 'Dashboard Admin',
    'dashboard_petugas' => 'Dashboard Petugas',
    'dashboard_user' => 'Dashboard Saya',
    'logout' => 'Keluar',

    // Sidebar Admin
    'menu_navigation' => 'Menu Navigasi',
    'account_management' => 'Manajemen Akun',
    'all_complaints' => 'Semua Pengaduan',
    
    // Sidebar Petugas
    'verification_followup' => 'Verifikasi & Tindak Lanjut',
    
    // Sidebar User
    'write_complaint' => 'Tulis Pengaduan',

    // Login Form
    'login_title' => 'Masuk - Aspirasiku',
    'welcome_back' => 'Selamat Datang Kembali',
    'or' => 'Atau',
    'register_new_account' => 'daftar akun baru di sini',
    'username' => 'Username',
    'password' => 'Password',
    'remember_me' => 'Ingat saya',
    'login_button' => 'Masuk',

    // Register Form
    'register_title' => 'Daftar - Aspirasiku',
    'create_new_account' => 'Buat Akun Baru',
    'already_have_account' => 'Sudah punya akun?',
    'login_here' => 'Masuk di sini',
    'nik_label' => 'NIK (Nomor Induk Kependudukan)',
    'fullname' => 'Nama Lengkap',
    'email' => 'Email',
    'phone' => 'Nomor Telepon',
    'password_confirmation' => 'Konfirmasi Password',
    'register_button' => 'Daftar Sekarang',

    // Validation
    'validation_nik_required' => 'NIK wajib diisi.',
    'validation_nik_size' => 'NIK harus berukuran 16 karakter.',
    'validation_nik_unique' => 'NIK sudah terdaftar.',
    'validation_username_unique' => 'Username sudah digunakan.',
    'validation_username_alpha_num' => 'Username hanya boleh berisi huruf dan angka.',
    'validation_email_unique' => 'Email sudah terdaftar.',
    'validation_password_min' => 'Password minimal 8 karakter.',
    'validation_password_confirmed' => 'Konfirmasi password tidak cocok.',

    // Controllers
    'account_suspended' => 'Akun Anda telah dinonaktifkan (suspended). Hubungi admin.',
    'login_success_admin' => 'Selamat datang kembali, Admin!',
    'login_success_petugas' => 'Selamat datang kembali, Petugas!',
    'login_success_user' => 'Selamat datang kembali!',
    'login_failed' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
    'register_success' => 'Pendaftaran berhasil! Selamat datang di dashboard Anda.',
    'logout_success' => 'Anda telah berhasil keluar dari sistem.',

    // Complaints Validation & Controller
    'complaint_title_required' => 'Judul pengaduan wajib diisi.',
    'complaint_category_required' => 'Kategori pengaduan wajib dipilih.',
    'complaint_category_invalid' => 'Kategori yang dipilih tidak valid.',
    'complaint_content_required' => 'Isi laporan wajib diisi.',
    'complaint_content_min' => 'Isi laporan terlalu singkat (minimal 10 karakter).',
    'complaint_attachment_image' => 'Lampiran harus berupa gambar.',
    'complaint_attachment_mimes' => 'Format gambar harus berupa jpeg, png, jpg, atau gif.',
    'complaint_attachment_max' => 'Ukuran gambar maksimal adalah 2MB.',
    'complaint_submitted_success' => 'Pengaduan berhasil dikirim dan sedang menunggu verifikasi.',
    'unauthorized_access' => 'Anda tidak memiliki akses ke halaman ini.',

    // Landing Page
    'hero_title' => 'Suarakan Aspirasi Anda untuk Perubahan',
    'hero_subtitle' => 'Platform resmi pengaduan masyarakat. Kami menjamin kerahasiaan dan menindaklanjuti setiap laporan Anda secara transparan.',
    'start_complaint' => 'Buat Pengaduan Sekarang',
    'total_complaints' => 'Total Pengaduan',
    'resolved_complaints' => 'Diselesaikan',
    'active_users' => 'Pengguna Aktif',
    'public_complaints' => 'Aspirasi Terbaru',
    'no_complaints' => 'Belum ada pengaduan.',

    // Dashboard User
    'write_new_complaint' => 'Tulis Pengaduan Baru',
    'complaint_title' => 'Judul Laporan',
    'title_placeholder' => 'Ketik judul laporan yang singkat dan jelas...',
    'category' => 'Kategori',
    'select_category' => 'Pilih Kategori',
    'complaint_content' => 'Isi Laporan',
    'description_placeholder' => 'Ceritakan detail kronologi, lokasi, dan informasi penting lainnya...',
    'attachment' => 'Bukti Lampiran (Opsional)',
    'drag_drop' => 'Klik atau seret file ke sini',
    'max_file_size' => 'PNG, JPG, GIF hingga 2MB',
    'is_private_label' => 'Sembunyikan nama saya (Anonim) & Privat',
    'submit_complaint' => 'Kirim Pengaduan',
    'my_complaint_history' => 'Riwayat Pengaduan Saya',
    'status_pending' => 'Pending',
    'status_process' => 'Diproses',
    'status_resolved' => 'Selesai',
    'complaint_timeline' => 'Lini Masa Laporan',
    'detail_complaint' => 'Detail Pengaduan',
    'back' => 'Kembali',
    'track_status' => 'Lacak Status',
    'timeline_pending' => 'Laporan Diterima',
    'timeline_pending_desc' => 'Laporan Anda telah masuk ke sistem kami dan menunggu antrean verifikasi.',
    'timeline_process' => 'Sedang Diproses',
    'timeline_process_desc' => 'Petugas telah memverifikasi dan sedang menindaklanjuti laporan Anda di lapangan.',
    'timeline_resolved' => 'Selesai Ditangani',
    'timeline_resolved_desc' => 'Laporan Anda telah berhasil diselesaikan oleh petugas.',
    'official_response' => 'Tanggapan Petugas',
    'no_response_yet' => 'Belum ada tanggapan dari petugas.',
];

