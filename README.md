# 📋 Dashboard Manajemen Tugas Kuliah

> Platform manajemen tugas (To-Do List) berbasis Laravel dengan desain modern **Glassmorphism** untuk membantu mahasiswa mengelola deadline akademik dengan efisien.

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat-square&logo=php)
![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-3.x-06B6D4?style=flat-square&logo=tailwind-css)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

---

## 📖 Daftar Isi

- [Deskripsi](#deskripsi)
- [Fitur Utama](#fitur-utama)
- [Tech Stack](#tech-stack)
- [User Story](#user-story)
- [Kebutuhan Sistem](#kebutuhan-sistem)
- [Instalasi](#instalasi)
- [Konfigurasi](#konfigurasi)
- [Menjalankan Aplikasi](#menjalankan-aplikasi)
- [Struktur Project](#struktur-project)
- [API Documentation](#api-documentation)
- [Testing](#testing)
- [SDLC & UML](#sdlc--uml)
- [Kontribusi](#kontribusi)
- [Lisensi](#lisensi)

---

## 🎯 Deskripsi

**Dashboard Manajemen Tugas Kuliah** adalah aplikasi web yang dirancang untuk membantu mahasiswa dalam mengelola tugas akademik mereka. Aplikasi ini menyediakan antarmuka yang intuitif dan responsif dengan fitur manajemen tugas lengkap, autentikasi pengguna, dan analitik dashboard.

Dikembangkan sebagai proyek UAS (Ujian Akhir Semester) menggunakan teknologi modern meliputi **Laravel 11**, **Tailwind CSS 3**, dan **MySQL** untuk memastikan sistem yang stabil, aman, dan scalable.

### Tujuan Aplikasi

1. **Membantu mahasiswa mengorganisir tugas** berdasarkan mata kuliah dan deadline
2. **Visualisasi progres akademik** melalui dashboard analytics
3. **Meningkatkan produktivitas** dengan antarmuka yang user-friendly
4. **Akses multi-device** dengan desain responsive

---

## ✨ Fitur Utama

### 🔐 Autentikasi & Akun
- ✅ Registrasi dan login pengguna dengan validasi email
- ✅ Login dengan Google (OAuth 2.0 via Socialite)
- ✅ Manajemen profil pengguna (update nama, email, foto)
- ✅ Reset password dengan email verification
- ✅ Session management dan security

### 📝 Manajemen Tugas
- ✅ **CRUD Operations**: Create, Read, Update, Delete tugas
- ✅ **Status Tracking**: Belum Mulai, Proses, Selesai
- ✅ **Kategori per Mata Kuliah**: Organisir tugas berdasarkan subjek
- ✅ **Priority Levels**: Tandai tugas urgent/penting
- ✅ **Deadline Management**: Set tanggal deadline untuk setiap tugas
- ✅ **Real-time Updates**: Perubahan tugas langsung tercermin

### 📊 Dashboard Analytics
- ✅ Statistik otomatis jumlah tugas per status
- ✅ Visualisasi progress dengan angka dan persentase
- ✅ Ringkasan mata kuliah aktif
- ✅ Overview deadline mendatang

### 🎨 User Interface
- ✅ **Glassmorphism Design**: Efek blur modern dengan transparansi
- ✅ **Responsive Layout**: Mobile, Tablet, Desktop compatible
- ✅ **Dark Mode Support**: Tema cerah dan gelap
- ✅ **Interactive Components**: Alpine.js untuk interactivity tanpa reload
- ✅ **Color Palette**: Warna pastel yang menyenangkan untuk mata

### 📅 Fitur Tambahan
- ✅ Kalender interaktif untuk navigasi tanggal
- ✅ Notifikasi untuk deadline yang akan datang
- ✅ Export data tugas (optional)
- ✅ Search & filter tugas

---

## 🛠 Tech Stack

### Backend
- **Framework**: Laravel 11
- **Language**: PHP 8.2+
- **Database**: MySQL 8.0+
- **Authentication**: Laravel Sanctum + Socialite (Google OAuth)
- **File Storage**: Local & Cloud (AWS S3)
- **Email**: SMTP-based (Gmail, Mailtrap)

### Frontend
- **CSS Framework**: Tailwind CSS 3
- **JavaScript Framework**: Alpine.js 3
- **Build Tool**: Vite 7
- **UI Components**: Blade Templates
- **Icons**: Feather Icons / Heroicons

### Development Tools
- **Testing**: PHPUnit 11
- **Package Manager**: Composer, npm
- **Version Control**: Git & GitHub
- **Code Quality**: PHP Pint (Linting)

---

## 👤 User Story

### Primary Actor: Mahasiswa

1. **Sebagai Mahasiswa**, saya ingin **menginput tugas baru** berdasarkan mata kuliah dan deadline, agar **jadwal belajar saya lebih terstruktur dan tidak ada tugas yang terlewat**.

2. **Sebagai Pengguna**, saya ingin **melihat visualisasi jumlah tugas** (Belum Mulai, Proses, Selesai) **di dashboard**, agar **bisa menentukan prioritas dan mengelola waktu dengan baik**.

3. **Sebagai Pengguna**, saya ingin **antarmuka yang responsif dan modern**, agar **bisa mengakses aplikasi baik dari laptop maupun smartphone dengan nyaman**.

4. **Sebagai Pengguna**, saya ingin **login dengan mudah** menggunakan Google account, agar **tidak perlu membuat password baru**.

5. **Sebagai Prefesional**, saya ingin **melacak progress tugas real-time** dan **mendapat notifikasi deadline**, agar **tidak pernah lupa mengumpulkan tugas**.

---

## 📋 Kebutuhan Sistem

### Minimum Requirements

| Komponen | Versi | Catatan |
|----------|-------|---------|
| PHP | 8.2+ | CLI & Web Server |
| MySQL | 8.0+ | Database Server |
| Node.js | 18+ | Frontend build tools |
| Composer | 2.0+ | PHP dependency manager |
| RAM | 2GB | Minimum untuk development |
| Storage | 1GB | Project space |

### Recommended Setup

- PHP 8.3 (latest stable)
- MySQL 8.4 atau MariaDB 11
- Node.js 20 LTS
- 4GB+ RAM
- SSD Storage

---

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/damar22004-debug/Projek-Uas---Manajemen-Tugas-Kuliah.git
cd manajemen-tugas
```

### 2. Install Dependencies PHP

```bash
composer install
```

### 3. Install Dependencies Frontend

```bash
npm install
```

### 4. Copy Environment File

**Windows**:
```bash
copy .env.example .env
```

**Linux/Mac**:
```bash
cp .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

---

## ⚙️ Konfigurasi

### Database Configuration

Edit file `.env` dan atur konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=manajemen_tugas
DB_USERNAME=root
DB_PASSWORD=
```

### Google OAuth Setup (Optional)

1. Buka [Google Cloud Console](https://console.cloud.google.com)
2. Buat project baru
3. Setup OAuth 2.0 Consent Screen
4. Buat credentials (OAuth 2.0 Client ID)
5. Tambahkan ke `.env`:

```env
GOOGLE_CLIENT_ID=your_client_id.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=your_client_secret
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
```

### Email Configuration

Atur email driver di `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=noreply@manajementugas.test
```

---

## ▶️ Menjalankan Aplikasi

### 1. Migrasi Database

```bash
php artisan migrate
```

Untuk seed data contoh:

```bash
php artisan migrate:seed
```

### 2. Build Frontend Assets

```bash
npm run build
```

Atau untuk development mode dengan hot reload:

```bash
npm run dev
```

### 3. Jalankan Server Laravel

Buka terminal baru:

```bash
php artisan serve
```

Server akan berjalan di: `http://localhost:8000`

### 4. Akses Aplikasi

- **URL**: http://localhost:8000
- **Email Testing**: Gunakan akun dari seeder atau register baru
- **Credentials**: Lihat `database/seeders/DatabaseSeeder.php`

---

## 📁 Struktur Project

```
manajemen-tugas/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/TaskApiController.php          # API endpoint untuk tugas
│   │   │   ├── Auth/SocialiteController.php       # Google OAuth handler
│   │   │   ├── ProfileController.php              # Manajemen profil user
│   │   │   ├── TaskController.php                 # Task view controller
│   │   │   └── GoogleController.php               # Google integration
│   │   └── Requests/
│   │       └── ProfileUpdateRequest.php           # Form validation
│   ├── Models/
│   │   ├── User.php                               # User model dengan relasi
│   │   ├── Task.php                               # Task model
│   │   └── Assignment.php                         # Task assignments
│   └── Providers/
│       └── AppServiceProvider.php                 # Service initialization
│
├── database/
│   ├── migrations/
│   │   ├── create_users_table.php
│   │   ├── create_tasks_table.php
│   │   ├── create_assignments_table.php
│   │   ├── add_google_id_to_users_table.php
│   │   ├── create_personal_access_tokens_table.php
│   │   └── create_cache_table.php
│   ├── factories/
│   │   └── UserFactory.php
│   └── seeders/
│       └── DatabaseSeeder.php
│
├── resources/
│   ├── css/
│   │   └── app.css                                # Tailwind styles
│   ├── js/
│   │   ├── app.js                                 # Main JS entry point
│   │   └── bootstrap.js                           # Bootstrap configuration
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php                      # Main layout
│       │   └── guest.blade.php                    # Guest layout
│       ├── auth/
│       │   ├── login.blade.php
│       │   ├── register.blade.php
│       │   └── verify-email.blade.php
│       ├── profile/
│       │   └── edit.blade.php
│       ├── dashboard.blade.php                    # Main dashboard
│       └── welcome.blade.php
│
├── routes/
│   ├── api.php                                    # REST API routes
│   ├── web.php                                    # Web routes
│   ├── auth.php                                   # Laravel Breeze auth routes
│   └── console.php
│
├── tests/
│   ├── Feature/
│   │   ├── ProfileTest.php                        # Profile endpoint tests
│   │   └── Auth/
│   ├── Unit/
│   └── TestCase.php
│
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── database.php
│   ├── services.php
│   └── sanctum.php
│
├── public/
│   ├── index.php
│   └── build/                                    # Vite build output
│
├── storage/
│   ├── app/                                       # File uploads
│   ├── logs/                                      # Application logs
│   └── framework/
│
├── .env.example                                   # Environment template
├── composer.json                                  # PHP dependencies
├── package.json                                   # Node dependencies
├── vite.config.js                                 # Vite configuration
├── tailwind.config.js                             # Tailwind configuration
├── phpunit.xml                                    # PHPUnit configuration
└── README.md                                      # Documentation (ini)
```

---

## 🔌 API Documentation

### Base URL
```
http://localhost:8000/api
```

### Authentication
Semua endpoint API memerlukan Bearer token dari Sanctum.

### Endpoints

#### Tasks

| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/tasks` | Ambil semua tugas user |
| POST | `/tasks` | Buat tugas baru |
| GET | `/tasks/{id}` | Ambil detail tugas |
| PUT | `/tasks/{id}` | Update tugas |
| DELETE | `/tasks/{id}` | Hapus tugas |

#### Users

| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/user` | Ambil profil user |
| POST | `/user/profile-photo` | Upload foto profil |

### Contoh Request

**Create Task**:
```bash
curl -X POST http://localhost:8000/api/tasks \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Content-Type: application/json" \
  -d '{
    "title": "Tugas Algoritma",
    "description": "Membuat program sorting",
    "status": "pending",
    "priority": "high",
    "due_date": "2026-02-28"
  }'
```

**Get Tasks**:
```bash
curl -X GET http://localhost:8000/api/tasks \
  -H "Authorization: Bearer YOUR_TOKEN"
```

---

## ✅ Testing

### Run PHPUnit Tests

```bash
php artisan test
```

Atau dengan konfigurasi tertentu:

```bash
vendor/bin/phpunit
```

### Test Coverage

```bash
php artisan test --coverage
```

### Specific Test Suite

```bash
# Run Feature tests only
php artisan test tests/Feature

# Run Unit tests only
php artisan test tests/Unit

# Run specific test class
php artisan test tests/Feature/ProfileTest
```

### Test Status

- ✅ 25 tests passing
- ✅ 61 assertions
- ✅ All critical features tested

---

## 📐 SDLC & UML

### Software Development Life Cycle (SDLC)

Proyek ini dikembangkan dengan metodologi **Agile**:

1. **Planning** (Sprint Planning)
   - Identifikasi fitur dan requirements
   - Estimasi effort
   - Prioritize user stories

2. **Design** (Sprint Design)
   - Mockup UI/UX dengan Glassmorphism
   - Database schema design
   - API endpoint design

3. **Implementation** (Sprint Development)
   - Coding backend (Laravel controllers, models)
   - Coding frontend (Blade templates, Alpine.js)
   - Integration testing

4. **Testing** (QA)
   - Unit testing
   - Feature testing
   - User acceptance testing

5. **Deployment**
   - Deploy ke production
   - Monitoring dan maintenance

### UML Diagrams

#### 1. Use Case Diagram
Menggambarkan interaksi antara aktor (Mahasiswa) dengan sistem:

```mermaid
graph TB
    Actor["👤 Mahasiswa"]
    
    UC1["📝 Register & Login"]
    UC2["🔍 View Dashboard"]
    UC3["➕ Create Task"]
    UC4["✏️ Update Task"]
    UC5["🗑️ Delete Task"]
    UC6["📊 View Analytics"]
    UC7["🔐 Manage Profile"]
    UC8["🔑 Google OAuth"]
    
    Actor -->|Use| UC1
    Actor -->|Use| UC2
    Actor -->|Use| UC3
    Actor -->|Use| UC4
    Actor -->|Use| UC5
    Actor -->|Use| UC6
    Actor -->|Use| UC7
    Actor -->|Use| UC8
    
    UC1 -->|includes| UC8
    UC3 -->|extends| UC2
    UC4 -->|extends| UC2
    UC5 -->|extends| UC2
    UC6 -->|extends| UC2
    
    style Actor fill:#e1f5ff
    style UC1 fill:#fff3e0
    style UC2 fill:#f3e5f5
    style UC3 fill:#e8f5e9
    style UC4 fill:#e8f5e9
    style UC5 fill:#ffebee
    style UC6 fill:#fce4ec
    style UC7 fill:#fff9c4
    style UC8 fill:#f1f8e9
```

#### 2. Entity Relationship Diagram (ERD)
Menunjukkan relasi antar tabel database:

```mermaid
erDiagram
    USERS ||--o{ TASKS : creates
    USERS ||--o{ ASSIGNMENTS : has
    TASKS ||--o{ ASSIGNMENTS : "assigned to"
    
    USERS {
        int id PK
        string name
        string email UK
        string password
        string google_id UK "nullable"
        string profile_photo "nullable"
        timestamp email_verified_at "nullable"
        timestamp created_at
        timestamp updated_at
    }
    
    TASKS {
        int id PK
        int user_id FK
        string title
        text description "nullable"
        enum status "pending|in_progress|completed"
        enum priority "low|medium|high"
        date due_date
        timestamp created_at
        timestamp updated_at
    }
    
    ASSIGNMENTS {
        int id PK
        int user_id FK
        int task_id FK
        timestamp created_at
        timestamp updated_at
    }
```

#### 3. Activity Diagram - Task Creation Flow
Alur proses pembuatan tugas baru:

```mermaid
graph TD
    Start([👤 User Membuka Dashboard])
    ClickAdd["Klik Tombol 'Add Task'"]
    Form["📝 Form Input Tugas Muncul"]
    Input["📥 Input Data:<br/>- Title<br/>- Description<br/>- Status<br/>- Priority<br/>- Due Date<br/>- Course Category"]
    Submit["✅ Submit Form"]
    Validate{{"🔍 Validasi<br/>Data Valid?"}}
    Error["❌ Tampilkan Error<br/>Message"]
    Save["💾 Simpan ke Database"]
    Update["🔄 Update Dashboard"]
    Success["✨ Task Berhasil<br/>Ditambahkan"]
    End([🎉 Selesai])
    
    Start --> ClickAdd
    ClickAdd --> Form
    Form --> Input
    Input --> Submit
    Submit --> Validate
    Validate -->|No| Error
    Error --> Form
    Validate -->|Yes| Save
    Save --> Update
    Update --> Success
    Success --> End
    
    style Start fill:#c8e6c9
    style End fill:#c8e6c9
    style Error fill:#ffcdd2
    style Success fill:#a5d6a7
    style Validate fill:#fff9c4
```

#### 4. Sequence Diagram - Login Process
Urutan interaksi sistem saat user login:

```mermaid
sequenceDiagram
    actor User
    participant Browser
    participant Laravel as Laravel<br/>Server
    participant Google as Google<br/>OAuth
    participant Database as MySQL<br/>Database
    participant Session as Session<br/>Storage
    
    User->>Browser: Buka Login Page
    Browser->>Laravel: GET /login
    Laravel-->>Browser: Tampilkan Login Form
    
    User->>Browser: Klik 'Login dengan Google'
    Browser->>Google: Redirect ke Google OAuth
    Google->>User: Minta Autentikasi
    User->>Google: Input Credentials
    Google->>Browser: Redirect ke Callback
    
    Browser->>Laravel: GET /auth/google/callback?code=xxx
    Laravel->>Google: POST Token Request
    Google-->>Laravel: Return Access Token
    Laravel->>Google: GET User Info
    Google-->>Laravel: Return User Data
    
    Laravel->>Database: Check User Exists?
    Database-->>Laravel: User Found
    
    Laravel->>Database: Create/Update Session Token
    Database-->>Laravel: Token Created
    
    Laravel->>Session: Store User Session
    Session-->>Laravel: Session Stored
    
    Laravel-->>Browser: Redirect ke Dashboard
    Browser-->>User: Dashboard Loaded ✅
```

#### 5. Class Diagram - Application Architecture
Struktur class dan relationship dalam aplikasi:

```mermaid
classDiagram
    class User {
        -id: int
        -name: string
        -email: string
        -password: string
        -google_id: string
        -profile_photo: string
        +register(): void
        +login(): void
        +logout(): void
        +updateProfile(): void
        +getTasks(): Collection
    }
    
    class Task {
        -id: int
        -user_id: int
        -title: string
        -description: string
        -status: enum
        -priority: enum
        -due_date: date
        +create(): Task
        +update(): void
        +delete(): void
        +getStatus(): string
    }
    
    class Assignment {
        -id: int
        -user_id: int
        -task_id: int
        +assign(): void
        +revoke(): void
    }
    
    class TaskController {
        +index(): View
        +create(): View
        +store(): View
        +edit(): View
        +update(): View
        +destroy(): void
    }
    
    class ProfileController {
        +edit(): View
        +update(): void
        +updatePhoto(): void
        +destroy(): void
    }
    
    class TaskApiController {
        +index(): JSON
        +store(): JSON
        +update(): JSON
        +destroy(): JSON
    }
    
    User "1" --> "*" Task: creates
    User "1" --> "*" Assignment: has
    Task "1" --> "*" Assignment: assigned_to
    TaskController --> Task: manages
    ProfileController --> User: manages
    TaskApiController --> Task: manages
```

#### 6. State Diagram - Task Status Flow
Alur perubahan status task:

```mermaid
stateDiagram-v2
    [*] --> Pending: Task Created
    
    Pending --> InProgress: User Mulai Mengerjakan
    Pending --> Completed: Direct Complete
    Pending --> Cancelled: Dibatalkan
    
    InProgress --> Completed: Task Selesai
    InProgress --> Pending: Kembali ke Pending
    InProgress --> Cancelled: Dibatalkan
    
    Completed --> [*]: ✅ Archived
    Cancelled --> [*]: ❌ Removed
    
    note right of Pending
        Task baru dibuat
        Deadline belum dimulai
    end note
    
    note right of InProgress
        User sedang mengerjakan
        Deadline masih panjang
    end note
    
    note right of Completed
        Task sudah selesai
        Dikumpulkan ke dosen
    end note
    
    note right of Cancelled
        Task dibatalkan
        Tidak perlu dikerjakan
    end note
```

#### 7. System Architecture Diagram
Arsitektur sistem secara keseluruhan:

```mermaid
graph TB
    Client["🖥️ Client<br/>Browser"]
    
    WEB["⚡ Vite Build<br/>HTML/CSS/JS"]
    API["🔌 REST API<br/>Sanctum"]
    
    Router["📍 Laravel Router"]
    Middleware["🔐 Middleware<br/>Auth, Verified"]
    
    Controllers["🎯 Controllers<br/>Task, Profile, Socialite"]
    Models["💾 Models<br/>User, Task"]
    
    Services["⚙️ Services<br/>Auth, Email, OAuth"]
    
    DB["🗄️ MySQL Database"]
    Cache["⚡ Redis Cache"]
    Storage["📁 File Storage"]
    Email["📧 SMTP Email"]
    OAuth["🔑 Google OAuth"]
    
    Client -->|HTTP/REST| WEB
    Client -->|API Calls| API
    
    WEB --> Router
    API --> Router
    
    Router --> Middleware
    Middleware --> Controllers
    
    Controllers --> Models
    Controllers --> Services
    
    Models --> DB
    Models --> Cache
    
    Services --> DB
    Services --> Email
    Services --> OAuth
    Services --> Storage
    
    style Client fill:#e1f5ff
    style WEB fill:#f3e5f5
    style API fill:#e8f5e9
    style Router fill:#fff3e0
    style Middleware fill:#fce4ec
    style Controllers fill:#e0f2f1
    style Models fill:#fff9c4
    style Services fill:#f1f8e9
    style DB fill:#c8e6c9
    style Cache fill:#bbdefb
    style Storage fill:#ffe0b2
    style Email fill:#ffccbc
    style OAuth fill:#d1c4e9
```

---

## 🤝 Kontribusi

Kami terbuka untuk kontribusi! Ikuti langkah berikut:

1. **Fork** repository ini
2. **Buat branch** untuk fitur baru (`git checkout -b feature/AmazingFeature`)
3. **Commit perubahan** Anda (`git commit -m 'Add some AmazingFeature'`)
4. **Push ke branch** (`git push origin feature/AmazingFeature`)
5. **Buka Pull Request**

### Development Guidelines

- Ikuti PSR-12 PHP coding standards
- Tulis test untuk fitur baru
- Update dokumentasi jika diperlukan
- Gunakan meaningful commit messages

---

## 📞 Support & Contact

- **Issues**: [GitHub Issues](https://github.com/damar22004-debug/Projek-Uas---Manajemen-Tugas-Kuliah/issues)
- **Email**: developer@example.com
- **Project Manager**: Damar

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE). Lihat file `LICENSE` untuk detail lengkap.

---

## 📝 Changelog

### v1.0.0 (2026-02-19)
- ✅ Initial release
- ✅ Task CRUD operations
- ✅ User authentication
- ✅ Google OAuth integration
- ✅ Dashboard analytics
- ✅ Profile management
- ✅ PHPUnit test suite (25 tests passing)

---

## 🙏 Terima Kasih

Terima kasih kepada:
- **Laravel Community** untuk framework yang awesome
- **Tailwind CSS** untuk utilitas CSS framework
- **Alpine.js** untuk lightweight interactivity
- **GitHub** untuk version control dan collaboration

---

**Dibuat dengan ❤️ oleh Tim Development | UAS 2026**


