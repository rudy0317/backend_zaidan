# Backend Service (`backend_zaidan`)

Repo ini tempat kodingan backend (API) buat aplikasi **Task Management**. API yang dibuat di sini nanti bakal dipake sama tim Frontend (React).

---

## Task Anak Magang

Tugas lo di repo ini:
1. Bikin database MySQL & tabel-tabelnya.
2. Bikin API Auth (Register & Login).
3. Bikin API CRUD buat Task (Tugas).
4. Pastiin semua response balikannya format JSON.
5. **Penting:** Wajib aktifin header CORS di PHP biar bisa ditembak dari React (`localhost:5173`).

---

## Setup Project

```bash
# 1. Clone repo
git clone https://github.com/rudy0317/backend_zaidan.git
cd backend_zaidan

# 2. Test server PHP lokal
php -S localhost:8000 -t public
```

---

## Rancangan Database (`db_task_management`)

### 1. Tabel `users`
- `id` (int, primary key, auto increment)
- `name` (varchar 100)
- `email` (varchar 150, unique)
- `password` (varchar 255, hash pake bcrypt)
- `created_at` (timestamp)

### 2. Tabel `tasks`
- `id` (int, primary key, auto increment)
- `user_id` (int, foreign key ke `users.id`)
- `title` (varchar 200)
- `description` (text, optional)
- `status` (enum: 'pending', 'in_progress', 'completed' | default: 'pending')
- `created_at` (timestamp)

---

## List Endpoint API

Format balikan **wajib JSON**.

### Auth
- `POST /api/register` (body: `name`, `email`, `password`)
- `POST /api/login` (body: `email`, `password`)

### Tasks
- `GET /api/tasks` (list semua task)
- `POST /api/tasks` (tambah task baru)
- `GET /api/tasks/{id}` (detail task)
- `PUT /api/tasks/{id}` (update task / ganti status)
- `DELETE /api/tasks/{id}` (hapus task)

---

## Format Response JSON

### Kalau sukses:
```json
{
  "success": true,
  "message": "Berhasil",
  "data": {}
}
```

### Kalau error:
```json
{
  "success": false,
  "message": "Pesan error"
}
```

---

## Setting CORS di PHP

Taruh ini di paling atas file entry point (`index.php`):

```php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
```

---

## Aturan Git

- JANGAN push langsung ke branch `main`.
- Bikin branch sendiri: `git checkout -b feature/nama-fitur`.
- Kalau udah selese, push ke GitHub trus bikin Pull Request (PR).