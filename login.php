<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM pengguna WHERE username='$username' AND password=('$password')");
    $cek   = mysqli_num_rows($query);

    if ($cek > 0) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      width: 320px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .login-box label {
      display: block;
      margin-bottom: 6px;
      font-size: 14px;
      color: #555;
    }

    .login-box input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 14px;
      box-sizing: border-box;
    }

    .login-box button {
      width: 100%;
      padding: 10px;
      background: #007bff;
      color: #fff;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .login-box button:hover {
      background: #0056b3;
    }

    .error {
      margin-top: 10px;
      color: red;
      font-size: 14px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login Admin</h2>
    <form method="POST">
      <label>Username:</label>
      <input type="text" name="username" required autocomplete="off">

      <label>Password:</label>
      <input type="password" name="password" required autocomplete="off">

      <button type="submit" name="login">Login</button>
      <a href="index.php">kembali ke dashoard</a>
    </form>

    <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
  </div>
</body>
</html>
