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

#### 5. Class Diagram - Application Architecture
Struktur class dan relationship dalam aplikasi:

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

#### 6. State Diagram - Task Status Flow
Alur perubahan status task:

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

graph TB
    Client["🖥 Client<br/>Browser"]
    
    WEB["⚡️ Vite Build<br/>HTML/CSS/JS"]
    API["🔌 REST API<br/>Sanctum"]
    
    Router["📍 Laravel Router"]
    Middleware["🔐 Middleware<br/>Auth, Verified"]
    
    Controllers["🎯 Controllers<br/>Task, Profile, Socialite"]
    Models["💾 Models<br/>User, Task"]
    
    Services["⚙️ Services<br/>Auth, Email, OAuth"]
    
    DB["🗄 MySQL Database"]
    Cache["⚡️ Redis Cache"]
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

---
