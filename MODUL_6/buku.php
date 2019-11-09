<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Tugas modul 6</title>
</head>
<?php
    $conn = mysqli_connect('localhost','root','','informatika');
?>
<body>
    <center>
        <h3>Masukkan Data Buku</h3>
        <table border="0" width="30%">
            <form action="buku.php" method="POST">
                <tr>
                    <td width="25%">Kode Buku</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="kode_buku" size="10"></td>
                </tr>
                <tr>
                    <td width="25%">Nama Buku</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="nama_buku" size="30"></td>
                </tr>
                <tr>
                    <td width="25%">Kode jenis</td>
                    <td width="5%">:</td>
                    <td width="65%"> <select name="kode_jenis">
                    <?php
                        $sql = "SELECT * FROM jenis_buku";
                        $retval = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($retval)){
                            echo "<option value='$row[kode_jenis]'> $row[nama_jenis]</option>";
                        }
                    ?></select></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Masukkan">
            </form>

            <?php
                error_reporting(E_ALL^E_NOTICE);
                // print_r($_POST);
                $kode_buku = $_POST['kode_buku'];
                $nama_buku = $_POST['nama_buku'];
                $kode_jenis = $_POST['kode_jenis'];
                $submit = $_POST['submit'];
                $input = "INSERT INTO buku(kode_buku, nama_buku, kode_jenisFK) VALUES ('$kode_buku','$nama_buku','$kode_jenis')";
                if($submit){
                    mysqli_query($conn, $input);
                    echo "<br> Data Berhasil Ditambahkan !";
                }
            ?>
            <hr>
            <h3>Data buku</h3>
            <table border="1" width="50%">
                <tr>
                    <td align="center" width="10%"><b>Kode buku</b></td>
                    <td align="center" width="30%"><b>Nama buku</b></td>
                    <td align="center" width="10%"><b>Kode Jenis Buku</b></td>
                    <td align="center" width="20%"><b>Ubah | Hapus</b></td>
                </tr>
                <?php
                    $cari = "SELECT * FROM buku, jenis_buku WHERE buku.kode_jenisFK = jenis_buku.kode_jenis";
                    $hasil_cari = mysqli_query($conn, $cari);
                    while($data = mysqli_fetch_row($hasil_cari)){
                        echo "
                        <tr>
                            <td width = '20%' align='center'>$data[0]</td>
                            <td width = '30%' align='center'>$data[1]</td>
                            <td width = '10%' align='center'>$data[2]</td>
                            <td width = '10%' align='center'><a href='edit_buku.php?id=$data[0]'>ubah</a> | <a href='hapus_buku.php?id=$data[0]'>hapus</a></td>
                        </tr>";
                    }
                ?>
            </table>
    </center>
</body>
</html>

