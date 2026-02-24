# Mobile — Projek Manajemen Tugas Kuliah

Deskripsi singkat
- Modul `mobile` adalah aplikasi Android (Java/Kotlin build via Gradle) untuk manajemen tugas kuliah: registrasi/login, CRUD tugas (create/read/update/delete), dan sinkronisasi dengan backend API.

Fitur utama
- Autentikasi: Register / Login
- CRUD tugas: tambah, lihat daftar, ubah, hapus
- Tampilan: LoginActivity, RegisterActivity, MainActivity, AddTaskActivity
- Sinkronisasi via Retrofit ke endpoint backend (API)

Use Case Diagram
```mermaid
usecaseDiagram
actor "Mahasiswa" as User
User --> (Register)
User --> (Login)
User --> (Create Task)
User --> (View Tasks)
User --> (Update Task)
User --> (Delete Task)
User --> (Logout)
```

CRUD & flow singkat
- Create: `AddTaskActivity` -> panggil API `POST /tasks` -> tampilkan pada daftar
- Read: `MainActivity` -> panggil API `GET /tasks` -> tampilkan list di RecyclerView
- Update: pilih item -> `AddTaskActivity` (edit) -> `PUT /tasks/{id}`
- Delete: pilih hapus -> `DELETE /tasks/{id}`

Struktur penting (folder/file)
- `app/src/main/java/com/example/...` — activity dan kelas model
  - `LoginActivity`, `RegisterActivity`, `MainActivity`, `AddTaskActivity`
  - `Task`, `TaskAdapter`, `TaskService`, `RetrofitClient`
- `app/src/main/res/layout` — layout XML per screen (activity_*.xml)
- `app/build.gradle.kts` — konfigurasi Gradle

Menjalankan aplikasi (local)
1. Pastikan Android SDK terpasang dan `ANDROID_SDK_ROOT` mengarah ke SDK (`%LOCALAPPDATA%\Android\sdk`).
2. Mulai emulator (contoh):

   `& "$env:LOCALAPPDATA\Android\sdk\emulator\emulator.exe" -avd Pixel_7`

3. Dari folder `mobile`, jalankan:

   `cd mobile`

   `.\gradlew.bat installDebug`

4. Jalankan activity utama (opsional):

   `& "$env:LOCALAPPDATA\Android\sdk\platform-tools\adb.exe" shell am start -n com.example.projekappmanajementugaskuliah/.LoginActivity`

Konfigurasi API
- Periksa `RetrofitClient` untuk base URL; jika perlu ubah ke alamat backend lokal/remote.

Catatan
- File `.idea/` termasuk konfigurasi IDE; jika tidak ingin di-push, tambahkan ke `.gitignore` dan hapus dari repo.
- Git pada Windows akan menampilkan peringatan CRLF vs LF; ini normal. Untuk konsistensi bisa tambahkan `.gitattributes`.

Kontak / kontribusi
- Untuk kontribusi: buat branch baru, lakukan perubahan, lalu pull request ke `main`.

Lisensi
- Periksa lisensi proyek utama untuk aturan distribusi.
