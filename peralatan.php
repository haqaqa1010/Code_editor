<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Data Peralatan</title>
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
</style>
</head>

<body bgcolor="#0066ffff">
	 
	<?php
  $koneksi = new mysqli("localhost", "root", "", "laboran_db");

	
	$sql ="SELECT * FROM peralatan";
	$hasil = mysqli_query($koneksi, $sql);
	
	if(!$hasil){
	 die("Error query :". mysqli_error($koneksi));
	}
//	$data =mysqli_fetch_assoc($hasil);
	?>
	<h2>Data Peralatan Lab</h2>

	<a href="index.php">Kembali Ke Dashboard</a>


		<table border="1" widht="800px" cellspasing="0" cellpadding="5">
			<tr>
			<th>ID Peralatan</th>
			<th>Nama Peralatan</th>
			<th>Jumlah</th>
      <th>Baik</th>
			</tr>
			
			<?php 
			while ($data= mysqli_fetch_assoc($hasil)) {
			?>
			<tr>
			<td><?php echo $data['id_peralatan']; ?></td>
	      	<td><?php echo $data['nama_peralatan']; ?></td>
			<td><?php echo $data['jumlah']; ?></td>
			<td><?php echo $data['baik']; ?></td>
			</tr>
			
			<?php
			}
			?>
		</table>
</body>
</html>