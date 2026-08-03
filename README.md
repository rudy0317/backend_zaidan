# 🛠️ Backend API Service (`backend_zaidan`)

**Tech Stack:** PHP (Pure PHP / Laravel) | MySQL | RESTful API (JSON Output)  
**Lead Engineer:** @rudy0317  
**Assignee (Intern):** @zaidan  

---

## 📌 1. Overview Project & Tujuan Magang

Selamat datang di tim backend! Repository ini diperuntukkan untuk membangun **RESTful API Service** sebagai backend pendukung aplikasi **Manajemen Tugas / Project (Task Management System)**.

Anak magang bertugas membuat API yang nantinya dikonsumsi oleh tim Frontend (React - `frontend_edy`).

### 🎯 Objective Utama Anak Magang:
1. Merancang Database & Table Schema di MySQL.
2. Membuat API Authentication (Register & Login).
3. Membuat CRUD API untuk Manajemen Task/Tugas.
4. Memastikan respon API berbentuk **JSON** yang konsisten.
5. **CORS Mandatory:** Menambahkan header CORS agar API tidak terblokir saat diakses dari Frontend React (`http://localhost:5173` / `http://localhost:3000`).

---

## 💻 2. Prasyarat System (Prerequisites)

Sebelum mulai koding, pastikan di laptop lo udah terinstall:
- **PHP** >= 8.1 / 8.2 (Bisa via XAMPP / Laragon / Native PHP)
- **MySQL / MariaDB** (Running di port 3306)
- **Composer** (Jika menggunakan Laravel / PHP Packages)
- **Postman** / **Bruno** / **Hopscotch** (Untuk testing API)
- **Git**

---

## ⚙️ 3. Panduan Setup Lokal

```bash
# 1. Clone repository ini
git clone https://github.com/rudy0317/backend_zaidan.git
cd backend_zaidan

# 2. Buat file konfig (.env atau config.php)
# Sesuaikan kredensial MySQL lokal (DB_HOST, DB_USER, DB_PASS, DB_NAME)

# 3. Import Schema Database
# Buat database 'db_task_management' di MySQL lokal lalu jalankan script SQL / Migration.

# 4. Jalankan Local Server PHP
php -S localhost:8000 -t public
# Server akan aktif di http://localhost:8000
```

---

## 🗄️ 4. Spesifikasi Schema Database (Rancangan Wajib)

Buat database bernama `db_task_management` dengan struktur tabel minimal sebagai berikut:

### Table `users`
| Column | Type | Constraints | Description |
| :--- | :--- | :--- | :--- |
| `id` | INT / BIGINT | Primary Key, Auto Increment | User ID |
| `name` | VARCHAR(100) | NOT NULL | Nama Lengkap |
| `email` | VARCHAR(150) | NOT NULL, UNIQUE | Email User |
| `password` | VARCHAR(255) | NOT NULL | Hashed Password (bcrypt/password_hash) |
| `created_at` | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | Waktu daftar |

### Table `tasks`
| Column | Type | Constraints | Description |
| :--- | :--- | :--- | :--- |
| `id` | INT / BIGINT | Primary Key, Auto Increment | Task ID |
| `user_id` | INT / BIGINT | Foreign Key -> `users.id` | Pemilik Task |
| `title` | VARCHAR(200) | NOT NULL | Judul Tugas |
| `description` | TEXT | NULLABLE | Detail Tugas |
| `status` | ENUM | 'pending', 'in_progress', 'completed' | Status Tugas (Default: 'pending') |
| `created_at` | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | Waktu dibuat |

---

## 📡 5. Spesifikasi RESTful API Endpoints (Wajib Dibuat)

Semua HTTP Request harus mengembalikan header: `Content-Type: application/json`.

### 🔑 Authentication Endpoints
- `POST /api/register`
  - **Body:** `{ "name": "...", "email": "...", "password": "..." }`
  - **Response 201:** `{ "success": true, "message": "Register berhasil", "data": { "id": 1, "name": "...", "email": "..." } }`
- `POST /api/login`
  - **Body:** `{ "email": "...", "password": "..." }`
  - **Response 200:** `{ "success": true, "message": "Login berhasil", "token": "...", "data": { ... } }`

### 📋 Task Management Endpoints
- `GET /api/tasks` ➔ List semua tugas (Support filter `?status=pending`)
- `POST /api/tasks` ➔ Tambah tugas baru (`title`, `description`, `status`)
- `GET /api/tasks/{id}` ➔ Detail 1 tugas berdasarkan ID
- `PUT /api/tasks/{id}` ➔ Update tugas (ubah `status` atau `title`)
- `DELETE /api/tasks/{id}` ➔ Hapus tugas

---

## 📐 6. Standar Response JSON

Setiap API **WAJIB** mengembalikan format JSON seragam seperti di bawah ini:

### Success Response (200 / 201)
```json
{
  "success": true,
  "message": "Operation successful",
  "data": { ... }
}
```

### Error Response (400 / 401 / 404 / 500)
```json
{
  "success": false,
  "message": "Detail pesan error spesifik",
  "errors": null
}
```

---

## 🌐 7. Wajib Aktifkan CORS (Cross-Origin Resource Sharing)

Agar React di frontend bisa request ke PHP tanpa terblokir browser, pastikan header ini diset di setiap entry point PHP (misal: `index.php`):

```php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}
```

---

## 🌿 8. Git Branching & Workflow Rules

1. **DILARANG** direct push ke branch `main`.
2. Selalu buat branch baru untuk pengerjaan fitur:
   ```bash
   git checkout -b feature/nama-fitur
   # Contoh: git checkout -b feature/auth-api
   ```
3. Commit message yang rapi & deskriptif:
   - `feat: buat endpoint login & register`
   - `fix: handle error cors di index.php`
4. Push ke GitHub dan **buat Pull Request (PR)** ke `main` untuk di-review oleh Lead Engineer.