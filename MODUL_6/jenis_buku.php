<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Tugas modul 6 Jenis Buku</title>
</head>
<?php
    $conn = mysqli_connect('localhost','root','','informatika');
?>
<body>
    <center>
        <h3>Masukkan Data Buku</h3>
        <table border="0" width="30%">
            <form action="jenis_buku.php" method="POST">
                <tr>
                    <td width="25%">Kode Jenis</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="kode_jenis" size="10"></td>
                </tr>
                <tr>
                    <td width="25%">Nama Jenis</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="nama_jenis" size="30"></td>
                </tr>
                <tr>
                    <td width="25%">Keterangan jenis</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="keterangan_jenis" size="30"></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Masukkan">
            </form>

            <?php
                error_reporting(E_ALL^E_NOTICE);
                $kode_jenis = $_POST['kode_jenis'];
                $nama_jenis = $_POST['nama_jenis'];
                $keterangan_jenis = $_POST['keterangan_jenis'];
                $submit = $_POST['submit'];
                $input = "INSERT INTO jenis_buku(kode_jenis, nama_jenis, keterangan_jenis) VALUES ('$kode_jenis','$nama_jenis','$keterangan_jenis')";

                if($submit){
                    mysqli_query($conn, $input);
                    echo "<br> Data Berhasil Ditambahkan !";
                }
            ?>
            <hr>
            <h3>Data Jenis buku</h3>
            <table border="1" width="50%">
                <tr>
                    <td align="center" width="10%"><b>Kode buku</b></td>
                    <td align="center" width="30%"><b>Nama buku</b></td>
                    <td align="center" width="10%"><b>Kode Jenis Buku</b></td>
                    <td align="center" width="20%"><b>Ubah | Hapus</b></td>
                </tr>
                <?php
                    $cari = "SELECT * FROM jenis_buku";
                    $hasil_cari = mysqli_query($conn, $cari);
                    while($data = mysqli_fetch_row($hasil_cari)){
                        echo "
                        <tr>
                            <td width = '20%' align='center'>$data[0]</td>
                            <td width = '30%' align='center'>$data[1]</td>
                            <td width = '10%' align='center'>$data[2]</td>
                            <td width = '10%' align='center'><a href='edit_jenis.php?id=$data[0]'>ubah</a> | <a href='hapus_jenis.php?id=$data[0]'>hapus</a></td>
                        </tr>";
                    }
                ?>
            </table>
    </center>
</body>
</html>

