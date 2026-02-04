#  Dashboard Management Tugas Kuliah (UAS Edition)

Dashboard manajemen tugas kuliah berbasis **Laravel** yang dirancang untuk memenuhi persyaratan tugas besar/UAS. Aplikasi ini mengusung desain *Glassmorphism* modern untuk memantau progres akademik secara efisien.

---

##  Dokumentasi Project (Progress Report)

### 1. Deskripsi
Aplikasi ini adalah platform manajemen tugas (To-Do List) khusus mahasiswa. Dikembangkan menggunakan Framework Laravel untuk memastikan sistem yang stabil, aman, dan mudah dikelola dalam memantau deadline perkuliahan.

### 2. User Story
- **Sebagai Mahasiswa**, saya ingin menginput tugas berdasarkan mata kuliah agar jadwal belajar lebih terstruktur.
- **Sebagai Pengguna**, saya ingin melihat visualisasi jumlah tugas (Belum Mulai, Proses, Selesai) agar bisa menentukan prioritas.
- **Sebagai Pengguna**, saya ingin antarmuka yang responsif agar bisa diakses baik dari laptop maupun smartphone.

### 3. SRS (Software Requirements Specification)
#### Feature List:
- **Authentication**: Sistem login & register user.
- **Task Management (CRUD)**: Create, Read, Update, Delete data tugas.
- **Dashboard Analytics**: Statistik otomatis jumlah tugas berdasarkan status.
- **Kalender Interaktif**: Navigator tanggal untuk memantau tenggat waktu.
- **Glassmorphism UI**: Efek blur dan transparansi menggunakan Tailwind CSS.

### 4. UML (Unified Modeling Language)
- **Use Case Diagram**: Aktor (Mahasiswa) melakukan interaksi manajemen tugas dan melihat dashboard.
- **Activity Diagram**: Alur data dari input user -> Controller Laravel -> Database MySQL.
- **Sequence Diagram**: Urutan proses request dari Router hingga pengembalian View Blade.

### 5. Mock-Up
- **Glass-Effect**: Menggunakan `backdrop-filter: blur()` pada sidebar dan kartu.
- **Color Palette**: Warna pastel untuk indikator status tugas (Biru, Kuning, Hijau, Merah).

---

##  SDLC (Software Development Life Cycle)
Proyek ini dikembangkan dengan model **Agile**:
1. **Planning**: Identifikasi fitur dan skema database.
2. **Design**: Pembuatan mockup UI Glassmorphism.
3. **Implementation**: Coding backend (Laravel) dan frontend (Tailwind).
4. **Testing**: Uji coba fungsionalitas fitur CRUD.

---

##  Instalasi Lokal

1. **Clone Repo**:
   ```bash
   git clone https://github.com/damar22004-debug/Projek-Uas---Manajemen-Tugas-Kuliah.git
   ```

2. **Install dependencies**:
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi environment**:
   - Salin `.env.example` menjadi `.env` dan sesuaikan pengaturan database.
   - Jalankan `php artisan key:generate`.

4. **Migrasi & Seeder (opsional)**:
   ```bash
   php artisan migrate --seed
   ```

5. **Jalankan server lokal**:
   ```bash
   php artisan serve
   ```


