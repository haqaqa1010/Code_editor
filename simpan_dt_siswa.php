	<?php
      include ("koneksi.php");

			$nis = $_POST['nis'];
			$nama = $_POST['nama_siswa'];
			$kelas = $_POST['kelas'];


        $cek = mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$nis'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Kode guru sudah ada!'); window.history.back();</script>";
    } else {
        mysqli_query($conn, "INSERT INTO guru (nis, nama_siswa, kelas) 
                            VALUES ('$nis','$nama','$kelas')");
        echo "<script>alert('Data berhasil disimpan!'); window.location='index.php';</script>";
    }
	?>