# Backend API (`backend_zaidan`)

Repository backend **PHP Native** untuk aplikasi **Task Management**.

📌 **GitHub Project Board:** [Task Management Project #4](https://github.com/users/rudy0317/projects/4/views/1)

## Tech Stack:
- PHP Native (Tanpa framework/Laravel)
- MySQL Database (PDO / mysqli)

## Jobdesk:
- Buat database MySQL & tabel (`users`, `tasks`).
- Buat REST API auth (Register/Login) & CRUD Task menggunakan PHP Native.
- Output respon wajib JSON (`header('Content-Type: application/json')`).
- Aktifkan CORS di PHP agar bisa diakses frontend (`localhost:5173`).

## Cara Menjalankan:
```bash
php -S localhost:8000
```

## Struktur DB:
- **users:** `id`, `name`, `email`, `password`, `created_at`
- **tasks:** `id`, `user_id`, `title`, `description`, `status`, `created_at`

## Endpoint List:
- `POST /api/register.php` atau routing manual di `index.php`
- `POST /api/login.php`
- `GET /api/tasks.php`
- `POST /api/tasks.php`
- `PUT /api/tasks.php`
- `DELETE /api/tasks.php`

## Header CORS & JSON (Wajib di awal script PHP):
```php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
```

## Workflow Git:
- Buat branch baru (`git checkout -b feature/nama-fitur`).
- Push ke branch tersebut, lalu buat Pull Request (PR).