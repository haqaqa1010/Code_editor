<?php
$koneksi = new mysqli("localhost", "root", "", "laboran_db");

$kode = $_POST['kode_guru'];
$nama = $_POST['nama_guru'];
$pelajaran = $_POST['pelajaran'];
$kelas = $_POST['kelas_dibimbing'];
$jamm = $_POST['jam_mulai'];
$jams = $_POST['jam_selesai'];

$sql = "INSERT INTO data_guru (kode_guru, nama_guru, pelajaran, kelas_dibimbing, jam_mulai, jam_selesai) 
        VALUES ('$kode', '$nama', '$pelajaran', '$kelas', '$jamm', '$jams')";
        
if($koneksi->query($sql)){
    echo "✅ Data pengunjung berhasil disimpan!<br><a href='index.php'>Kembali</a>";
} else {
    echo "Error: " . $koneksi->error;
}
?>
