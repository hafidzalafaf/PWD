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
    $id = $_GET['id'];

    $sql2 = "SELECT * FROM jenis_buku WHERE kode_jenis = '$id'";
    $query2 = mysqli_query($conn, $sql2);
    while ($data2 = mysqli_fetch_array($query2)) {
        $kodeJ = $data2['kode_jenis'];
        $namaJ = $data2['nama_jenis'];
        $ketJ = $data2['keterangan_jenis'];
    }
?>
<body>
    <center>
        <h3>Masukkan Data jenis</h3>
        <table border="0" width="30%">
            <form action="" method="POST">
                <tr>
                    <td width="25%">Kode jenis</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="kode_jenis" size="10" value=<?php echo $kodeJ;?>></td>
                </tr>
                <tr>
                    <td width="25%">Nama jenis</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="nama_jenis"  value=<?php echo $namaJ;?>></td>
                </tr>
                <tr>
                    <td width="25%">Keterangan jenis</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="ket_jenis"  value=<?php echo $ketJ;?>></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Masukkan">
            </form>

            <?php
                error_reporting(E_ALL^E_NOTICE);
                $kode_jenis = $_POST['kode_jenis'];
                $nama_jenis = $_POST['nama_jenis'];
                $ket_jenis = $_POST['ket_jenis'];
                $submit = $_POST['submit'];
                $input = "UPDATE jenis_buku SET kode_jenis='$kode_jenis', nama_jenis='$nama_jenis', keterangan_jenis='$ket_jenis' WHERE kode_jenis = '$id'";

                if($submit){
                    mysqli_query($conn, $input);
                    echo "<br> Data Berhasil Ditambahkan !";
                    header('Location: jenis_buku.php');
                }
            ?>
            <br>
            <a href="jenis.php">Back</a>
    </center>
</body>
</html>

