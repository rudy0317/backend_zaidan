<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

include("koneksi.php");

$read = mysqli_query($koneksi, "SELECT * FROM tasks");

$tasks = [];

while ($data = mysqli_fetch_assoc($read)) {
    $tasks[] = $data;
}

echo json_encode($tasks);
