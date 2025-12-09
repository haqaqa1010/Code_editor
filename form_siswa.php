<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "laboran_db");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari tabel kategori
$sql = "SELECT nama_kelas FROM kelas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Buku Pengunjung</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(270deg, #2af598, #009efd, #6a11cb, #2575fc);
            display: block;
            align-items: center;
            justify-content: center;
        }
        h2 {
            text-align: center;
            color: #ffffffff;
        }
        /* .container {
            height : 80vh;
            width: 80vh;
            display: flex;
        } */
        form {
            background: hsla(0, 0%, 100%, 0.28);
backdrop-filter: blur(12px);
border-radius: 12px;
box-shadow: 0 4px 20px rgba(0,0,0,0.15);


            max-width: 600px;
            margin: 20px auto;
            color: white;
            font-weight: bold;
            padding: 30px;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input[type=text], input[type=date], input[type=time], select, textarea {
          background-color: transparent;
            color: black;width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .sugest {
            background-color: #3b82f6;
            color: white;
            padding:3px;
            border-radius: 5px;
        }
        button.kembali {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button.kembali:hover {
            background-color: #c82333;
        }
        .tambah, .simpan {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .tambah, .simpan:hover {
            background-color: #218838;
        }
  </style>
</head>
<body>
    <h2>Form Kunjungan Siswa ke Laboratorium</h2>
  
  <button class="kembali" onclick="location.href='index.php'">Kembali Ke Dashboard</button>

  <button class="tambah" onclick="location.href='tambah_dt_siswa.php'">Tambah Data Siswa</button>

  <form action="simpan_siswa.php" method="post">
    <label>Nama Siswa:</label>
    <input type="text" id="nama_siswa" name="nama_siswa" autocomplete="off" required>
    <div id="suggestion" class="sugest"></div>

    <label>NIS:</label>
    <input type="text" id="nis" name="nis" readonly>

    <label>Kelas:</label>
    <select name="kelas" required>
      <option value="">-- Pilih Kelas --</option>
      <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['nama_kelas'] . "'>" . $row['nama_kelas'] . "</option>";
            }
        } else {
            echo "<option>Tidak ada data</option>";
        }
    ?>
    </select>

    <label>Keperluan:</label>
    <textarea name="keperluan" required></textarea>

    <label>Jam Masuk</label>
    <input type="time" id="jam_mulai" name="jam_mulai" required>

    <label>Jam Keluar</label>
    <input type="time" id="jam_selesai" name="jam_selesai" required>

    <button class="simpan" type="submit">Simpan</button>
  </form>
  <script>
    $(document).ready(function(){
      $("#nama_siswa").keyup(function(){
        var query = $(this).val();
        if(query != ""){
          $.ajax({
            url: "get_siswa.php",
            method: "POST",
            data: {query:query},
            success:function(data){
              $("#suggestion").fadeIn();
              $("#suggestion").html(data);
            }
          });
        } else {
          $("#suggestion").fadeOut();
        }
      });

      // Saat klik nama siswa dari suggestion
      $(document).on("click", ".pilih", function(){
        var nis = $(this).data("nis");
        var nama_siswa = $(this).data("nama_siswa");
        var kelas = $(this).data("kelas");

        $("#nama_siswa").val(nama_siswa);
        $("#nis").val(nis);
        $("#kelas").val(kelas);
        $("#suggestion").fadeOut();
      });
    });

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
