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

$id_user = $_POST['id_user'];
$title = $_POST['title'];
$description = $_POST['description'];
$status = $_POST['status'];

$create = mysqli_query($koneksi, "INSERT INTO tasks
(id_user, title, description, status) 
VALUES('$id_user', '$title', '$description', '$status')");

if ($create) {
    echo "Task berhasil ditambahkan";
} else {
    echo "Task gagal ditambahkan";
}
