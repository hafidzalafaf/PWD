<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TUGAS</title>
</head>
<body>
    <form action="tugas.php" method="POST">
        <p>Nilai A adalah <input type="text" name="nilaiA" size="20"></p>
        <p>Nilai B adalah <input type="text" name="nilaiB" size="20"></p>
        <p><input type="submit" value="Jumlahkan" name="submit"></p>
    </form>

    <?php
        error_reporting(E_ALL ^ E_NOTICE);
        $nilaiA = $_POST['nilaiA'];
        $nilaiB = $_POST['nilaiB'];
        $submit = $_POST['submit'];
        $jumlah = $nilaiA + $nilaiB;

        if($submit){
            echo"Nilai A adalah $nilaiA <br>";
            echo"Nilai B adalah $nilaiB <br>";
            echo"Jadi Nilai A ditambah Nilai B adalah $jumlah";
        }
    ?>
</body>
</html>