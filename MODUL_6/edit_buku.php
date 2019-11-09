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

    $sql= "SELECT * FROM buku WHERE kode_buku = '$id'";
    $query = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($query)) {
        $kodeB = $data['kode_buku'];
        $namaB = $data['nama_buku'];
        $kodeJ = $data['kode_jenisFK'];
    }
    $sql2 = "SELECT * FROM jenis_buku WHERE kode_jenis = '$kodeJ'";
    $query2 = mysqli_query($conn, $sql2);
    while ($data2 = mysqli_fetch_array($query2)) {
        $kodeJ = $data2['kode_jenis'];
        $namaJ = $data2['nama_jenis'];
        $ketJ = $data2['keterangan_jenis'];
    }
?>
<body>
    <center>
        <h3>Masukkan Data Buku</h3>
        <table border="0" width="30%">
            <form action="" method="POST">
                <tr>
                    <td width="25%">Kode Buku</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="kode_buku" size="10" value=<?php echo $kodeB;?>></td>
                </tr>
                <tr>
                    <td width="25%">Nama Buku</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="nama_buku"  value=<?php echo $namaB;?>></td>
                </tr>
                <tr>
                    <td width="25%">Kode jenis</td>
                    <td width="5%">:</td>
                    <td width="65%"> <select name="kode_jenis">
                        <?php
                        $sql3 = "SELECT * FROM jenis_buku";
                        $query3 = mysqli_query($conn, $sql3);
                        while($row = mysqli_fetch_array($query3)){
                            echo "<option value='$row[kode_jenis]'> $row[nama_jenis]</option>";
                        }
                        ?>
                </tr>
            </table>
            <input type="submit" name="submit" value="Masukkan">
            </form>

            <?php
                error_reporting(E_ALL^E_NOTICE);
                $kode_buku = $_POST['kode_buku'];
                $nama_buku = $_POST['nama_buku'];
                $kode_jenis = $_POST['kode_jenis'];
                $submit = $_POST['submit'];
                $input = "UPDATE buku SET kode_buku='$kode_buku', nama_buku='$nama_buku', kode_jenisFK='$kode_jenis' WHERE kode_buku = '$id'";

                if($submit){
                    mysqli_query($conn, $input);
                    echo "<br> Data Berhasil Ditambahkan !";
                    header('Location: buku.php');
                }
            ?>
            <br>
            <a href="buku.php">Back</a>
    </center>
</body>
</html>

