<?php
$koneksi = new mysqli("localhost", "root", "", "laboran_db");

$nama_kelas = $_POST['nama_kelas'];
$kode_kelas = $_POST['kode_kelas'];
$nama_guru = $_POST['nama_guru'];
$kode_guru = $_POST['kode_guru'];
$pelajaran = $_POST['pelajaran'];
$jumlah = $_POST['jumlah'];
$jamm = $_POST['jam_mulai'];
$jams = $_POST['jam_selesai'];


$sql = "INSERT INTO data_kelas ( nama_kelas, kode_kelas, nama_guru, kode_guru, pelajaran, jumlah, jam_mulai, jam_selesai) 
        VALUES ( '$nama_kelas', '$kode_kelas', '$nama_guru', '$kode_guru', '$pelajaran', '$jumlah', '$jamm', '$jams')";

if($koneksi->query($sql)){
    echo "✅ Data kunjungan berhasil disimpan!<br><a href='index.php'>Kembali</a>";
} else {
    echo "❌ Error: " . $koneksi->error;
}
?>
