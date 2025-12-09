<!DOCTYPE html>
<html>
<head>
<title>Form Tambah Data | Guru</title>
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
	<div class="container">
	<h2>Form Tambah Data Guru</h2>
	<form action="simpan_dt_guru.php" method="POST">
		Kode Guru : <input type="text" name="kode_guru" placeholder="Contoh: PNS001" oninput="this.value = this.value.toUpperCase()" required autocomplete="off"/>
		<br />
    <small id="kode-msg" style="color:red;display:none;">Kode sudah ada!</small>
		Nama Lengkap : <input type="text" name="nama_guru" required autocomplete="off"/>
		<br />
		Mata Pelajaran : <input type="text" name="pelajaran" required autocomplete="off"/>
		<br />
		<button type="submit" name="simpan">Simpan</button>
		<button type="button" onclick="location.href='form_guru.php'">Batal</button>
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

document.getElementById("kode_guru").addEventListener("keyup", function () {
  let kode_guru = this.value;

  if (kode.length > 0) {
    fetch("cek_kode.php?kode_guru=" + kode_guru)
      .then(response => response.text())
      .then(data => {
        let msg = document.getElementById("kode-msg");
        let btn = document.getElementById("btn-simpan");

        if (data.trim() === "ada") {
          msg.style.display = "inline";
          btn.disabled = true;
        } else {
          msg.style.display = "none";
          btn.disabled = false;
        }
      });
  }
});

</script>
</body>
</html>