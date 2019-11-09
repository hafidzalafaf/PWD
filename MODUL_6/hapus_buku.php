<?php 
	$conn = mysqli_connect('localhost','root','','informatika');

	$id = $_GET['id'];

	$hapus = "DELETE FROM buku WHERE kode_buku = '$id'";
	mysqli_query($conn,$hapus);
	header('Location: buku.php');
 ?>