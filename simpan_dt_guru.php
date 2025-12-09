	<?php
      include ("koneksi.php");

			$kode = $_POST['kode_guru'];
			$nama = $_POST['nama_guru'];
			$mapel = $_POST['pelajaran'];


        $cek = mysqli_query($conn, "SELECT * FROM guru WHERE kode_guru='$kode'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Kode guru sudah ada!'); window.history.back();</script>";
    } else {
        mysqli_query($conn, "INSERT INTO guru (kode_guru, nama_guru, pelajaran) 
                            VALUES ('$kode','$nama','$mapel')");
        echo "<script>alert('Data berhasil disimpan!'); window.location='index.php';</script>";
    }
	?>