<?php
// cek login admin
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "laboran_db");

// cek apakah sudah login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}




// Hitung data
$jml_guru = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM data_guru"))['total'];
$jml_siswa = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM data_siswa"))['total'];
$jml_kelas = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM data_kelas"))['total'];
$jml_peralatan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM peralatan"))['total'];

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Buku Pengunjung</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(270deg, #2af598, #009efd, #6a11cb, #2575fc);
      background-size: 800% 800%;
      animation: gradientMove 15s ease infinite;
      color: #333;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .sidebar {
      width: 220px;
      background: rgba(255, 255, 255, 0.9);
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      padding-top: 20px;
      box-shadow: 2px 0 8px rgba(0,0,0,0.1);
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #2575fc;
    }

    .sidebar a {
      display: block;
      padding: 12px 20px;
      color: #333;
      text-decoration: none;
      transition: 0.3s;
    }

    .sidebar a:hover {
      background: #2575fc;
      color: white;
      border-radius: 8px;
    }

    .content {
      margin-left: 240px;
      padding: 20px;
    }

    .card {
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }

    h1 {
      color: #fff;
      text-shadow: 1px 1px 4px rgba(0,0,0,0.4);
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>📘 Admin</h2>
    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="pengunjung.php">👥 Data Pengunjung</a>
    <a href="guru.php">👨‍🏫 Data Guru</a>
    <a href="kelas.php">🏫 Data Kelas</a>
    <a href="logout.php">🚪 Logout</a>
  </div>

  <div class="content">
    <h1>Selamat Datang, <?= $_SESSION['user']; ?> 👋</h1>

    <div class="card">
  <h3>Guru</h3>
  <p><?= $jml_guru ?> Orang</p>
</div>
<div class="card">
  <h3>Siswa</h3>
  <p><?= $jml_siswa ?> Orang</p>
</div>
<div class="card">
  <h3>Kelas</h3>
  <p><?= $jml_kelas ?> Kelas</p>
</div>
<div class="card">
  <h3>Peralatan</h3>
  <p><?= $jml_peralatan ?> Item</p>
</div>


    <div class="card">
      <h2>Menu Cepat</h2>
      <p><a href="pengunjung.php">Lihat Data Pengunjung</a></p>
      <p><a href="guru.php">Lihat Data Guru</a></p>
      <p><a href="kelas.php">Lihat Data Kelas</a></p>
    </div>
  </div>
</body>
</html>
