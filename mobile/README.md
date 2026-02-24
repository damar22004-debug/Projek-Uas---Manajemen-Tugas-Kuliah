# 📱 Mobile Application — Manajemen Tugas Kuliah (V2.0)

Aplikasi Android modern yang dirancang untuk membantu mahasiswa mengelola daftar tugas kuliah secara efisien. Proyek ini merupakan bagian dari ekosistem **Manajemen Tugas Kuliah** yang terintegrasi dengan backend API Laravel.

---

## 🏗️ System Architecture
Sistem ini menggunakan arsitektur **Client-Server** dengan pola **MVC (Model-View-Controller)** di sisi Android.

```mermaid
graph TD
    subgraph "Mobile Client (Android)"
        UI[View: XML Layouts]
        Controller[Controller: Activity/Adapter]
        Model[Model: Task Class]
    end

    subgraph "Networking Layer"
        Retrofit[Retrofit 2 / GSON]
    end

    subgraph "Backend Server"
        API[Laravel REST API]
        DB[(MySQL Database)]
    end

    UI <--> Controller
    Controller <--> Model
    Controller <--> Retrofit
    Retrofit <--> API
    API <--> DB
```

---

## 📊 UML Diagrams

### 1. Use Case Diagram
Menunjukkan interaksi antara Mahasiswa sebagai aktor utama dengan fungsionalitas aplikasi.

```mermaid
useCaseDiagram
    actor Mahasiswa
    
    package "Mobile App" {
        usecase "Registrasi Akun" as UC1
        usecase "Login" as UC2
        usecase "Melihat Statistik Dashboard" as UC3
        usecase "Menambah Tugas" as UC4
        usecase "Mengelola Tugas (Edit/Hapus)" as UC5
        usecase "Melihat Daftar Tugas" as UC6
    }
    
    Mahasiswa --> UC1
    Mahasiswa --> UC2
    Mahasiswa --> UC3
    Mahasiswa --> UC4
    Mahasiswa --> UC5
    Mahasiswa --> UC6
```

### 2. Entity Relationship Diagram (ERD)
Representasi data yang dikelola oleh aplikasi (disinkronkan dengan backend).

```mermaid
erDiagram
    USER ||--o{ TASK : manages
    USER {
        int id PK
        string name
        string email
        string password
    }
    TASK {
        int id PK
        int user_id FK
        string title
        string description
        string category
        date due_date
        string status
    }
```

### 3. Activity Diagram (Proses Tambah Tugas)
Alur kerja pengguna saat menambahkan tugas baru ke dalam sistem.

```mermaid
activityDiagram
    start
    :Buka Halaman Add Task;
    :Input Judul & Mata Kuliah;
    :Pilih Tenggat Waktu;
    if (Input Valid?) then (Ya)
        :Kirim Data ke API (Retrofit);
        if (Respon Sukses?) then (Ya)
            :Tampilkan Toast "Berhasil";
            :Kembali ke Dashboard;
            :Update List & Statistik;
        else (Tidak)
            :Tampilkan Error API;
        fi
    else (Tidak)
        :Tampilkan Error Validasi;
    fi
    stop
```

### 4. Sequence Diagram (Autentikasi Login)
Interaksi antar objek saat proses login berlangsung.

```mermaid
sequenceDiagram
    participant User as User (UI)
    participant LC as LoginActivity
    participant RC as RetrofitClient
    participant API as Laravel Server

    User->>LC: Input Email & Password
    User->>LC: Klik Tombol "Masuk"
    LC->>LC: Validasi Form
    LC->>RC: Request Login(email, pass)
    RC->>API: POST /api/login
    API-->>RC: Response (Token & User Data)
    RC-->>LC: Callback onSuccess()
    LC->>LC: Simpan Session
    LC->>User: Pindah ke MainActivity (Dashboard)
```

### 5. Class Diagram
Struktur kelas utama dalam aplikasi Android.

```mermaid
classDiagram
    class MainActivity {
        +RecyclerView rvTasks
        +TaskAdapter adapter
        +loadTasks()
        +updateStats()
    }
    class TaskAdapter {
        +List<Task> taskList
        +onBindViewHolder()
    }
    class Task {
        +int id
        +String title
        +String status
        +String date
    }
    class TaskService {
        <<interface>>
        +getTasks()
        +addTask()
        +deleteTask()
    }

    MainActivity --> TaskAdapter
    TaskAdapter --> Task
    MainActivity ..> TaskService
```

### 6. State Diagram (Siklus Hidup Tugas)
Perubahan status sebuah tugas dalam aplikasi.

```mermaid
stateDiagram-v2
    [*] --> BelumMulai
    BelumMulai --> DalamProses : Mulai Pengerjaan
    DalamProses --> Selesai : Tandai Selesai
    DalamProses --> Terlambat : Melewati Deadline
    BelumMulai --> Terlambat : Melewati Deadline
    Selesai --> [*]
```

---

## 🎨 Design UI/UX
Aplikasi ini mengusung tema **iOS-style Ultra Minimalist**:
- **Clean Interface**: Menggunakan latar belakang putih bersih (`#FFFFFF`).
- **Smooth Typography**: Menggunakan hierarki teks yang jelas dan modern.
- **Finger-Friendly**: Tombol dan input field memiliki tinggi yang dioptimalkan (`60dp`) untuk kenyamanan pengguna.
- **Glassmorphism Elements**: Sentuhan efek kaca transparan pada elemen-elemen tertentu untuk estetika premium.

## 🛠️ Tech Stack & Library
- **Core**: Java (Android SDK)
- **UI**: Material Design Components (Material 3)
- **API**: Retrofit 2 & GSON Converter
- **Image**: Glide (rencana)
- **Tooling**: Android Studio Jellyfish

---
**PENGEMBANG**: [Your Name/Team]  
**PROYEK**: UAS Manajemen Tugas Kuliah
