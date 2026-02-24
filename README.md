# 🎓 Projek Manajemen Tugas Kuliah

Repository ini adalah sistem terintegrasi untuk membantu mahasiswa mengelola tugas kuliah mereka. Sistem terdiri dari backend API yang kuat dan aplikasi Android yang responsif.

---

## 📂 Struktur Folder Utama

* **`web/`**: Backend API & Frontend Web (Laravel + Vite + Tailwind CSS).
* **`mobile/`**: Aplikasi Android Native (Java + Retrofit + Gradle).

---

## 🎯 Fitur & Use Case
Sistem ini memungkinkan mahasiswa untuk melakukan manajemen data tugas secara *real-time*.

```mermaid
usecaseDiagram
    actor "Mahasiswa" as Student
    Student --> (Register Akun)
    Student --> (Login)
    Student --> (Tambah Tugas Baru)
    Student --> (Liat Daftar Tugas)
    Student --> (Update Status Tugas)
    Student --> (Hapus Tugas)
    Student --> (Sinkronisasi API)
Panduan singkat
- Web: buka folder `web` → `composer install` → konfigurasi `.env` → `php artisan migrate --seed` → `npm install && npm run dev`.
- Mobile: buka folder `mobile` → pastikan Android SDK terpasang → jalankan emulator → `.\gradlew.bat installDebug`.

Lihat juga: [mobile/README.md](mobile/README.md)

Kontribusi
- Buat branch, lakukan perubahan, lalu buka PR ke `main`.


