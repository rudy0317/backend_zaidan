<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "taskmanagement";

$koneksi = mysqli_connect($host, $user, $pass, $dbname);

if (!$koneksi) {
    die("koneksi gagal : " . mysqli_connect_error());
} else {
    // echo "koneksi berhasil";
}
