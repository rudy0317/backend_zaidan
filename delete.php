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

$id_task = $_GET['id_task'];

$delete = mysqli_query($koneksi, "DELETE FROM tasks WHERE id_task='$id_task'");

if ($delete) {
    echo json_encode(["message" => "Task berhasil dihapus"]);
} else {
    echo json_encode(["message" => "Task gagal dihapus"]);;
}
