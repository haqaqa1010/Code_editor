<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Sekolah</title>
  <style>
    /* Reset basic styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Poppins', sans-serif;
  background-image: url(SMKN1MANGGAR.jpg);
  background-size: cover;
  backdrop-filter: blur(8px);
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

/* Header */
.header {
  background: linear-gradient(270deg, #2af598, #009efd, #6a11cb, #2575fc);
  animation: gradientMove 15s ease infinite;
  color: white;
  padding: 20px 40px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

@keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

.title {
  font-size: 24px;
  font-weight: bold;
}

.login-btn {
  background-color: white;
  color: #3b82f6;
  padding: 10px 20px;
  border: none;
  border-radius: 8px;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.3s;
}

.login-btn:hover {
  background-color: #f3f4f6;
}

/* Main */
.main {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px 20px;
}

.menu-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 32px;
}

/* Menu Card */
.menu-card {
  width: 250px;
  height: 160px;
  border-radius: 16px;
  padding: 24px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 20px;
  font-weight: 600;
  text-decoration: none;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  transition: transform 0.3s, box-shadow 0.3s;

      background: hsla(0, 0%, 100%, 0.15);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(12px);
  border: 1px solid rgba(255, 255, 255, 0.3);
}

.menu-card .icon {
  font-size: 36px;
  margin-bottom: 12px;
}

.menu-card:hover {
  background: transparent;
  transform: scale(1.05);
  box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
}

/* Warna Kartu */
.menu-card.guru {
  background-color: #3b82f6;
  /* box-shadow: 0 4px 20px rgba(0, 0, 255, 0.4); */
}

.menu-card.kelas {
  background-color: #8b5cf6; 
  /* box-shadow: 0 4px 20px rgba(128, 0, 255, 0.4); */
}

.menu-card.siswa {
  background-color: #22c55e;
  /* box-shadow: 0 4px 20px rgba(0, 200, 0, 0.4); */
}

.menu-card.lab {
  background-color: #ef4444;
  /* box-shadow: 0 4px 20px rgba(255, 0, 0, 0.4); */
}

.menu-card.guru:hover {
  background-color: #3b83f6de;
}

.menu-card.kelas:hover {
  background-color: #8b5cf6de;
}

.menu-card.siswa:hover {
  background-color: #22c55ede;
}

.menu-card.lab:hover {
  background-color: #ef4444de;
}
  </style>
</head>
<body>

  <!-- Header -->
  <header class="header">
    <h1 class="title">Lab Sekolah</h1>
    <button onclick="location.href='login.php'" class="login-btn">Login</button>
  </header>

  <!-- Main Content -->
  <main class="main">
    <div class="menu-grid">

      <!-- Guru -->
      <a href="form_guru.php" class="menu-card guru">
        <div class="icon">🎓</div>
        <div class="label">Guru</div>
      </a>

      <!-- Kelas -->
      <a href="form_kelas.php" class="menu-card kelas">
        <div class="icon">🏫</div>
        <div class="label">Kelas</div>
      </a>

      <!-- Siswa -->
      <a href="form_siswa.php" class="menu-card siswa">
        <div class="icon">👨‍🎓</div>
        <div class="label">Siswa</div>
      </a>

      <!-- Peralatan Lab -->
      <a href="peralatan.php" class="menu-card lab">
        <div class="icon">🖥️</div>
        <div class="label">Peralatan Lab</div>
      </a>

    </div>
  </main>

</body>
</html>
