# 📋 Dashboard Manajemen Tugas Kuliah (UAS Edition)

Aplikasi manajemen tugas berbasis Laravel dengan tampilan Glassmorphism untuk memantau dan mengelola tugas kuliah.

## Fitur Utama
- Authentication: Register & Login pengguna.
- Manajemen Tugas (CRUD): Buat, lihat, edit, hapus tugas.
- Dashboard Analytics: Statistik jumlah tugas berdasarkan status (Belum Mulai, Proses, Selesai).
- Kalender Interaktif: Lihat tenggat tugas pada kalender.
- Filter & Pencarian: Filter tugas berdasarkan mata kuliah, tanggal, dan status.
- Notifikasi/Reminder (sederhana): Pengingat tugas mendekati deadline.
- UI: Tailwind CSS dengan efek Glassmorphism (backdrop-filter: blur)).
- Database: MySQL (migrasi & seeder tersedia).

## Struktur Halaman
- /register, /login — Autentikasi pengguna.
- /dashboard — Ringkasan statistik dan grafik tugas.
- /tasks — Daftar tugas, form tambah/edit, filter, dan aksi CRUD.
- /calendar — Tampilan kalender dengan deadline tugas.

## Instalasi (Lokal, Windows)
1. Clone repo:
   git clone https://github.com/damar22004-debug/Projek-Uas---Manajemen-Tugas-Kuliah.git
2. Masuk folder project:
   cd manajemen-tugas
3. Salin .env:
   copy .env.example .env
4. Install dependensi PHP:
   composer install
5. Install dependensi frontend:
   npm install
6. Buat app key:
   php artisan key:generate
7. Konfigurasi database di .env (DB_DATABASE, DB_USERNAME, DB_PASSWORD).
8. Migrasi dan seeder:
   php artisan migrate --seed
9. Link storage:
   php artisan storage:link
10. Jalankan build asset:
    npm run dev
11. Jalankan server:
    php artisan serve

## Testing
- Jalankan unit/feature tests:
  php artisan test

## Environment Variables Penting
- APP_NAME, APP_URL
- DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
- MAIL_* (opsional, untuk notifikasi email)

## Catatan Pengembangan
- Frontend memakai Tailwind CSS; komponen UI di resources/views dan resources/js.
- API routes untuk tugas ada di routes/api.php (jika digunakan).
- Perbarui seeder jika menambahkan sample data baru.





