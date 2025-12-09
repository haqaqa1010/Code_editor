<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Kunjungan Kelas</title>
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
        input[type=text], input[type=date], input[type=time], input[type=number], select {
          background-color: transparent;
            color: black;  
          width: 100%;
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
        .simpan {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .simpan:hover {
            background-color: #218838;
        }
        </style>
</head>
<body>
  
    <h2>Form Kunjungan Kelas ke Laboratorium</h2>

  <button class="kembali" onclick="location.href='index.php'">Kembali Ke Dashboard</button>

  <form action="simpan_kelas.php" method="post">

        <!-- Nama Kelas -->
    <label>Nama Kelas:</label>
    <input type="text" id="nama_kelas" name="nama_kelas" autocomplete="off" required>
    <div id="suggestionKelas" class="sugest"></div>

    <label>Kode Kelas:</label>
    <input type="text" id="kode_kelas" name="kode_kelas" readonly>

    <!-- Nama Guru -->
    <label>Nama Guru:</label>
    <input type="text" id="nama_guru" name="nama_guru" autocomplete="off" required>
    <div id="suggestion" class="sugest"></div>

    <label>Kode Guru:</label>
    <input type="text" id="kode_guru" name="kode_guru" readonly>

    <label>Mata Pelajaran:</label>
    <input type="text" id="pelajaran" name="pelajaran" readonly>

    <!-- Jumlah Siswa -->
    <label>Jumlah Siswa:</label>
    <input type="number" id="jumlah" name="jumlah" required>

    <label>Jam Masuk</label>
    <input type="time" id="jam_mulai" name="jam_mulai" required>

    <label>Jam Keluar</label>
    <input type="time" id="jam_selesai" name="jam_selesai" required>

    <button class="simpan" type="submit">Simpan</button>
  </form>
  <script>
    $(document).ready(function(){


           // Auto-suggest Kelas
      $("#nama_kelas").keyup(function(){
        var query = $(this).val();
        if(query != ""){
          $.ajax({
            url: "get_kelas.php",
            method: "POST",
            data: {query:query},
            success:function(data){
              $("#suggestionKelas").fadeIn().html(data);
            }
          });
        } else {
          $("#suggestionKelas").fadeOut();
        }
      });

      $(document).on("click", ".pilihKelas", function(){
        $("#nama_kelas").val($(this).data("nama_kelas"));
        $("#kode_kelas").val($(this).data("kode_kelas"));
        $("#suggestionKelas").fadeOut();
      });

      // Auto-suggest Guru
      $("#nama_guru").keyup(function(){
        var query = $(this).val();
        if(query != ""){
          $.ajax({
            url: "get_guru.php",
            method: "POST",
            data: {query:query},
            success:function(data){
              $("#suggestion").fadeIn().html(data);
            }
          });
        } else {
          $("#suggestion").fadeOut();
        }
      });

      $(document).on("click", ".pilih", function(){
        $("#nama_guru").val($(this).data("nama_guru"));
        $("#kode_guru").val($(this).data("kode_guru"));
        $("#pelajaran").val($(this).data("pelajaran"));
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
