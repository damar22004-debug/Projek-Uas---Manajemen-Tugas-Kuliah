# Mobile Application — Projek Manajemen Tugas Kuliah

Aplikasi Android untuk membantu mahasiswa mengelola daftar tugas kuliah secara efisien. Proyek ini merupakan bagian dari "Projek UAS - Manajemen Tugas Kuliah" dan berfungsi sebagai klien mobile yang terhubung ke backend API.

## 🚀 Fitur Utama
- **Autentikasi Pengguna**: Sistem Registrasi dan Login untuk keamanan data mahasiswa.
- **Manajemen Tugas (CRUD)**:
    - **Tambah Tugas**: Menambahkan nama dan deskripsi tugas baru.
    - **Lihat Daftar**: Menampilkan semua tugas dalam daftar yang rapi menggunakan `RecyclerView`.
    - **Halaman Detail**: Memastikan setiap tugas tercatat dengan baik.
- **Sinkronisasi Real-time**: Menggunakan Retrofit untuk berkomunikasi dengan backend API.

## 🛠️ Tech Stack
- **Bahasa**: Java
- **Networking**: Retrofit 2 & GSON (untuk konsumsi REST API)
- **UI Framework**: Android Material Design
- **Architecture**: MVC (Model-View-Controller)
- **Build System**: Gradle (Kotlin DSL)

## 📊 Use Case Diagram
```mermaid
usecaseDiagram
actor "Mahasiswa" as User
User --> (Register)
User --> (Login)
User --> (Tambah Tugas)
User --> (Lihat Daftar Tugas)
User --> (Logout)
```

## 📂 Struktur Proyek
```text
mobile/
├── app/
│   ├── src/main/java/com/example/projekappmanajementugaskuliah/
│   │   ├── LoginActivity.java       # Activity untuk login
│   │   ├── RegisterActivity.java    # Activity untuk registrasi
│   │   ├── MainActivity.java        # Dashboard & daftar tugas
│   │   ├── AddTaskActivity.java     # Form tambah tugas
│   │   ├── Task.java                # Model data tugas
│   │   ├── TaskAdapter.java         # Adapter untuk RecyclerView
│   │   ├── TaskService.java         # Interface Retrofit (API endpoints)
│   │   └── RetrofitClient.java      # Konfigurasi client API
│   └── src/main/res/layout/         # File desain XML (UI)
└── build.gradle.kts                 # Konfigurasi dependensi
```

## ⚙️ Cara Menjalankan (Lokal)
1. **Prasyarat**:
    - Install [Android Studio](https://developer.android.com/studio).
    - Pastikan backend API sudah berjalan (lihat repo backend).
2. **Clone & Open**:
    - Clone repository ini.
    - Buka folder `mobile` menggunakan Android Studio.
3. **Konfigurasi API**:
    - Buka `RetrofitClient.java`.
    - Ubah `BASE_URL` ke alamat IP lokal komputer Anda (contoh: `http://192.168.1.x/api/`).
4. **Build & Run**:
    - Hubungkan perangkat Android atau jalankan Emulator.
    - Klik tombol **Run** di Android Studio atau jalankan:
      ```bash
      ./gradlew installDebug
      ```

## 🔗 Endpoints API yang Digunakan
- `POST /login` - Autentikasi user.
- `POST /register` - Pendaftaran user baru.
- `GET /tasks` - Mengambil daftar tugas.
- `POST /tasks` - Menambahkan tugas baru.

## 📝 Catatan
- Gunakan Android SDK versi 33 atau lebih tinggi untuk kompatibilitas terbaik.
- Pastikan izin Internet sudah ditambahkan di `AndroidManifest.xml`.

---
**Kontribusi**: Silakan buat *pull request* jika ingin menambahkan fitur seperti edit tugas, hapus tugas, atau pengingat (notifikasi).
