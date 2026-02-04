# 📋 Dashboard Management Tugas Kuliah (UAS Edition)

<p align="center">
  <a href="https://github.com/damar22004-debug/Projek-Uas---Manajemen-Tugas-Kuliah"><img src="https://img.shields.io/badge/project-Manajemen--Tugas-blue" alt="Project"></a>
  <a href="https://github.com/damar22004-debug/Projek-Uas---Manajemen-Tugas-Kuliah/actions"><img src="https://img.shields.io/github/actions/workflow/status/damar22004-debug/Projek-Uas---Manajemen-Tugas-Kuliah/ci.yml?branch=main" alt="CI"></a>
  <a href="https://github.com/damar22004-debug/Projek-Uas---Manajemen-Tugas-Kuliah/releases/tag/v1.0.0"><img src="https://img.shields.io/badge/release-v1.0.0-green" alt="Release"></a>
</p>

Ringkasan singkat: Aplikasi manajemen tugas kuliah berbasis **Laravel**, menampilkan fitur CRUD tugas, autentikasi pengguna, dashboard statistik, dan kalender interaktif dengan desain *Glassmorphism*.

---

## 📌 Daftar Isi
1. [Fitur](#-fitur)
2. [Prasyarat](#-prasyarat)
3. [Instalasi & Jalankan](#-instalasi--jalankan)
4. [Konfigurasi Environment](#-konfigurasi-environment)
5. [Perintah Penting](#-perintah-penting)
6. [Struktur Proyek Singkat](#-struktur-proyek-singkat)
7. [Kontribusi](#-kontribusi)
8. [Lisensi & Kontak](#-lisensi--kontak)

---

## ✨ Fitur
- Autentikasi: register, login, reset password
- Manajemen tugas (CRUD) dengan status (Belum Mulai / Proses / Selesai)
- Dashboard statistik otomatis berdasarkan status tugas
- Kalender interaktif untuk melihat tenggat waktu tugas
- UI responsive dengan Tailwind CSS (Glassmorphism)

---

## ⚙️ Prasyarat
- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL (atau DB lain yang didukung Laravel)

---

## 🚀 Instalasi & Jalankan (lokal)
1. Clone repository:
```bash
git clone https://github.com/damar22004-debug/Projek-Uas---Manajemen-Tugas-Kuliah.git
cd Projek-Uas---Manajemen-Tugas-Kuliah
```
2. Install dependencies PHP & JS:
```bash
composer install
npm install
```
3. Salin file env dan generate app key:
```bash
cp .env.example .env
php artisan key:generate
```
4. Konfig database di `.env`, lalu migrasi dan seed (opsional):
```bash
php artisan migrate --seed
```
5. Compile aset dan jalankan server:
```bash
npm run build   # atau npm run dev untuk development
php artisan serve
```

---

## 🛠️ Perintah Penting
- Jalankan test: `php artisan test`
- Linting/Pint: `./vendor/bin/pint --test`
- Jalankan scheduler: `php artisan schedule:work`

---

## 🗂️ Struktur Proyek Singkat
- `app/` — Controllers, Models, dan Logic aplikasi
- `routes/` — Definisi route (web/api)
- `resources/views/` — Blade templates
- `database/` — Migrations & Seeders
- `public/` — Aset publik

---

## 🤝 Kontribusi
Suka perbaikan atau fitur baru? Silakan:
1. Fork repository
2. Buat branch fitur: `git checkout -b feature/nama-fitur`
3. Commit dan push ke fork Anda
4. Buat Pull Request ke `main` branch

---

## 📄 Lisensi & Kontak
Project ini menggunakan lisensi **MIT**.
Untuk pertanyaan/collab: ✉️ damar.22004@gmail.com

---

> Tip: Jika Anda ingin saya tambahkan badge CI, screenshot, atau contoh penggunaan API, beri tahu file gambar atau detail yang ingin ditampilkan.

