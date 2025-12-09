<?php
$koneksi = new mysqli("localhost", "root", "", "laboran_db");

$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];
$keperluan = $_POST['keperluan'];
$jamm = $_POST['jam_mulai'];
$jams = $_POST['jam_selesai'];

$sql = "INSERT INTO data_siswa (nis, nama_siswa, kelas, keperluan, jam_mulai, jam_selesai) 
        VALUES ('$nis', '$nama_siswa', '$kelas', '$keperluan', '$jamm', '$jams')";
        
if($koneksi->query($sql)){
    echo "✅ Data pengunjung berhasil disimpan!<br><a href='index.php'>Kembali</a>";
} else {
    echo "Error: " . $koneksi->error;
}
?>
