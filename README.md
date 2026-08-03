# Backend API (`backend_zaidan`)

Kodingan backend PHP buat aplikasi **Task Management**.

## Jobdesk:
- Bikin database MySQL & tabel (`users`, `tasks`).
- Bikin REST API auth (Register/Login) & CRUD Task.
- Aktifin CORS di PHP biar bisa diakses frontend (`localhost:5173`).

## Cara Jalanin:
```bash
php -S localhost:8000 -t public
```

## Structure DB:
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

## Git:
- Bikin branch baru (`git checkout -b feature/nama-fitur`).
- Push ke branch lo, terus buat PR.