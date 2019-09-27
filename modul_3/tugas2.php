<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TUGAS</title>
</head>
<body>
    <form action="tugas2.php" method="POST">
        <p>Masukkan Angka <input type="text" name="nilaiA" size="20"></p>
        <p><input type="submit" value="Jumlahkan" name="submit"></p>
    </form>

    <?php
        error_reporting(E_ALL ^ E_NOTICE);
        $nilaiA = $_POST['nilaiA'];
        $submit = $_POST['submit'];

        if($submit){
            if($nilaiA == ''){
                echo"Kosong";
            }elseif($nilaiA % 2 == 1){
                echo "$nilaiA adalah bilangan ganjil";
            }elseif($nilai % 2 == 0){
                echo "$nilaiA adalah bilangan genap";
            }else{
                echo "Data yang anda masukkan salah";
            }
        }
    ?>
</body>
</html>