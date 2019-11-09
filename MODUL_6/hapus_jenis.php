<?php 
	$conn = mysqli_connect('localhost','root','','informatika');

	$id = $_GET['id'];

	$hapus = "DELETE FROM jenis_buku WHERE kode_jenis = '$id'";
	mysqli_query($conn,$hapus);
	header('Location: jenis_buku.php');
 ?>