<!DOCTYPE html>
<html>
<head>
<title>Form Tambah Data | Siswa</title>
<style>
	body {
  font-family: Arial, sans-serif;
  background-color: #f5f6fa;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}

.container {
  background: #fff;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  width: 400px;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
  color: #333;
}

label {
  display: block;
  margin-bottom: 6px;
  font-weight: bold;
  color: #444;
}

input[type="text"] {
  width: 100%;
  padding: 8px 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 6px;
  box-sizing: border-box;
}

button {
  padding: 8px 16px;
  margin-right: 6px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-weight: bold;
}

button[type="submit"] {
  background-color: #28a745;
  color: white;
}

button[type="submit"]:hover {
  background-color: #218838;
}

button[type="button"] {
  background-color: #dc3545;
  color: white;
}

button[type="button"]:hover {
  background-color: #c82333;
}

button[type="reset"] {
  background-color: #6c757d;
  color: white;
}

button[type="reset"]:hover {
  background-color: #5a6268;
}

</style>
</head>
	
	
<body>
	<?php
        $koneksi = new mysqli("localhost", "root", "", "laboran_db");

                if (isset($_POST['simpan'])){
			$nis = $_POST['nis'];
			$nama = $_POST['nama_siswa'];
			$kelas = $_POST['kelas'];
		
			$sql = "INSERT INTO siswa (nis, nama_siswa, kelas) VALUES ( '$nis','$nama','$kelas')";
			$query = mysqli_query($koneksi,$sql);
			
				if ($query) {
				header("Location: form_siswa.php");
				exit;
			} else {
				echo "<p style='color:red;'>Gagal menambahkan data:" . mysqli_error($koneksi)."</php>";	
			}
		}
	?>
	<div class="container">
	<h2>Form Tambah Data Sisa</h2>
	<form action="" method="POST">
		NIS : <input type="text" name="nis"  required autocomplete="off"/>
		<br />
		Nama Lengkap : <input type="text" name="nama_siswa"  required autocomplete="off"/>
		<br />
		Kelas : <input type="text" name="kelas"  required autocomplete="off"/>
		<br />
		<button type="submit" name="simpan">Simpan</button>
		<button type="button" onclick="location.href='form_siswa.php'">Batal</button>
		<button type="reset">Reset</button>
	</form>
</div>
<script>
      document.querySelector("form").addEventListener("submit", function(e) {
  let valid = true;
  this.querySelectorAll("[required]").forEach(input => {
    if (!input.value.trim()) {
      valid = false;
      input.style.border = "2px solid red"; // highlight error
    } else {
      input.style.border = "";
    }
  });

  if (!valid) {
    e.preventDefault(); // cegah submit
    alert("Harap isi semua field!");
  }
});
</script>
</body>
</html>