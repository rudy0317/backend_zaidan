# Backend API (`backend_zaidan`)

Repository backend **PHP Native** untuk aplikasi **Task Management**.

📌 **GitHub Project Board:** [Task Management Project #4](https://github.com/users/rudy0317/projects/4/views/1)

## Tech Stack:
- PHP Native
- MySQL Database

## Jobdesk (CRUD Task):
- Buat database MySQL & tabel `tasks`.
- Buat API CRUD untuk mengelola data task/tugas.
- Output respon berupa JSON (`header('Content-Type: application/json')`).
- Aktifkan CORS di PHP agar bisa diakses frontend (`localhost:5173`).

## Cara Menjalankan:
```bash
php -S localhost:8000
```

## Struktur DB (`db_task_management`):

### Tabel `tasks`:
- `id` (int, primary key, auto increment)
- `title` (varchar 200)
- `description` (text, optional)
- `status` (enum: 'pending', 'in_progress', 'completed' | default: 'pending')
- `created_at` (timestamp)

## Endpoint List (CRUD Only):
- `GET /api/tasks.php` -> Tampilkan semua data task
- `POST /api/tasks.php` -> Tambah task baru
- `PUT /api/tasks.php?id={id}` -> Update data/status task
- `DELETE /api/tasks.php?id={id}` -> Hapus task

## Header CORS & JSON (Wajib di awal file PHP):
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