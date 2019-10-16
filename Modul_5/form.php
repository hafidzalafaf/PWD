<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DATA MAHASISWA</title>
</head>
<?php 
	$conn = mysqli_connect('localhost','root','','informatika');

	// if (!$conn) {
 	//    die("Koneksi gagal: " . mysqli_connect_error());
	// }
	// echo "Koneksi berhasil";
 ?>
<body>
	<center>
		<h3>Masukkan Data Mahasiswa :</h3>
		<table border="0" width="30px">
			<form action="form.php" method="POST">
				<tr>
					<td width="25%">NIM</td>
					<td width="5%">:</td>
					<td width="65%"><input type="text" name="nim" size="10"></td>
				</tr>
				<tr>
					<td width="25%">Nama</td>
					<td width="5%">:</td>
					<td width="65%"><input type="text" name="nama" size="30"></td>
				</tr>
				<tr>
					<td width="25%">Kelas</td>
					<td width="5%">:</td>
					<td width="65%"><input type="radio" value="A" checked name="kelas">A
						<input type="radio" value="B" name="kelas">
						<input type="radio" value="C" name="kelas">
					</td>
				</tr>
				<tr>
					<td width="25%">Alamat</td>
					<td width="5%">:</td>
					<td width="65%"><input type="text" name="alamat" size="40"></td>
				</tr>
				</table>
				<input type="submit" name="submit" value="Masukkan">
			</form>
			<?php 
				error_reporting(E_ALL ^ E_NOTICE);
				$nim = $_POST['nim'];
				$nama = $_POST['nama'];
				$kelas = $_POST['kelas'];
				$alamat = $_POST['alamat'];
				$submit = $_POST['submit'];
				// query untuk memasukkan data ke database
				$input = "INSERT INTO mahasiswa (nim, nama, kelas, alamat) VALUES ($nim, $nama, $kelas, $alamat)";
				// kondisi ketika tombol submit di klik 
				if ($submit) {
					if ($nim =='') {
						echo "NIM tidak boleh kosong, Harap isi dahulu";
					}elseif ($nama == '') {
						echo "Nama tidak boleh kosong, Harap isi dahulu";
					}elseif ($alamat == '') {
						echo "Alamat tidak boleh kosong, Harap isi dahulu";
					}else{
						mysqli_query($conn, $input);
						echo "Data Berhasil dimasukkan";
					}
				}

			 ?>
		<hr>
		<h3>Data Mahasiswa</h3>
		<table border="1" width="50%">
			<tr>
				<td align="center" width="20%"><b>NIM</b></td>
				<td align="center" width="30%"><b>Nama</b></td>
				<td align="center" width="10%"><b>Kelas</b></td>
				<td align="center" width="30%"><b>Alamat</b></td>
			</tr>
			<?php 
				$cari = "SELECT * FROM mahasiswa order by nim";
				$hasil_cari = mysqli_query($conn, $cari);
				while ($data = mysqli_fetch_row($hasil_cari)) {
					echo "
					<tr>
						<td width='20%'>$data[0]</td>
						<td width='30%'>$data[1]</td>
						<td width='10%'>$data[2]</td>
						<td width='30%'>$data[3]</td>
					</tr>";
				}
			 ?>
		</table>
	</center>
</body>
</html>