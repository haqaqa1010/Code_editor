<?php
include "koneksi.php"; // koneksi ke database

$nis = $_GET['nis'];

$query = mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$nis'");
if (mysqli_num_rows($query) > 0) {
    echo "ada"; // jika sudah ada
} else {
    echo "kosong"; // jika belum ada
}
?>
