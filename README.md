# Backend API (`backend_zaidan`)

Repository backend PHP untuk aplikasi **Task Management**.

## Jobdesk:
- Buat database MySQL & tabel (`users`, `tasks`).
- Buat REST API auth (Register/Login) & CRUD Task.
- Aktifkan CORS di PHP agar bisa diakses frontend (`localhost:5173`).

## Cara Menjalankan:
```bash
php -S localhost:8000 -t public
```

## Struktur DB:
- **users:** `id`, `name`, `email`, `password`, `created_at`
- **tasks:** `id`, `user_id`, `title`, `description`, `status`, `created_at`

## Endpoint List:
- `POST /api/register`
- `POST /api/login`
- `GET /api/tasks`
- `POST /api/tasks`
- `PUT /api/tasks/{id}`
- `DELETE /api/tasks/{id}`

## Header CORS (Wajib di `index.php`):
```php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
```

## Workflow Git:
- Buat branch baru (`git checkout -b feature/nama-fitur`).
- Push ke branch tersebut, lalu buat Pull Request (PR).