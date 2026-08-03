<?php
// Set header CORS agar dapat diakses dari frontend (HTML/JS)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

// Handle preflight request CORS dari browser
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Cek apakah request method POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        "success" => false,
        "message" => "Method tidak diizinkan! Gunakan POST."
    ]);
    exit();
}

// Ambil input JSON dari Body Request
$rawInput = file_get_contents("php://input");
$data = json_decode($rawInput, true);

$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

// Validasi Sederhana (Contoh Dummy Auth)
// Nanti anak magang bisa ganti bagian ini dengan query database MySQL
if ($email === 'admin@gmail.com' && $password === '123456') {
    http_response_code(200);
    echo json_encode([
        "success" => true,
        "message" => "Login Berhasil!",
        "data" => [
            "id" => 1,
            "name" => "Admin User",
            "email" => $email
        ]
    ]);
} else {
    http_response_code(401);
    echo json_encode([
        "success" => false,
        "message" => "Email atau password salah!"
    ]);
}
