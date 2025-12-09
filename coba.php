<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Buku Digital Lab</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
        }
        /* Navbar Login */
        .navbar {
            background-color: #4CAF50;
            padding: 10px 20px;
            color: white;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border: 1px solid white;
            border-radius: 5px;
            transition: background 0.2s;
        }
        .navbar a:hover {
            background-color: white;
            color: #4CAF50;
        }
        /* Dashboard grid */
        .dashboard-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px); /* dikurangi tinggi navbar */
        }
        .dashboard {
            display: grid;
            grid-template-columns: repeat(2, 200px);
            gap: 20px;
        }
        .card {
            background-color: #fff;
            border-radius: 10px;
            padding: 40px 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .card h2 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }
    </style>
</head>
<body>

<!-- Navbar Login -->
<div class="navbar">
    <a href="login.php">Login</a>
</div>

<!-- Dashboard -->
<div class="dashboard-container">
    <div class="dashboard">
        <div class="card" onclick="location.href='form_guru.php'">
            <h2>Guru</h2>
        </div>
        <div class="card" onclick="location.href='form_kelas.php'">
            <h2>Kelas</h2>
        </div>
        <div class="card" onclick="location.href='form_siswa.php'">
            <h2>Siswa</h2>
        </div>
        <div class="card" onclick="location.href='peralatan.php'">
            <h2>Peralatan Lab</h2>
        </div>
    </div>
</div>

</body>
</html>
