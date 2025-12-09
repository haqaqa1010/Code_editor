<?php
$host = "localhost";
$user = "root"; // ganti kalau pakai user lain
$pass = "";     // ganti sesuai password MySQL kamu
$db   = "laboran_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
