<?php
include "koneksi.php"; // koneksi ke database

$kode = $_GET['kode_guru'];

$query = mysqli_query($conn, "SELECT * FROM guru WHERE kode_guru='$kode'");
if (mysqli_num_rows($query) > 0) {
    echo "ada"; // jika sudah ada
} else {
    echo "kosong"; // jika belum ada
}
?>
