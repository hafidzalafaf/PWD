<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
?>
<html>
    <head>
        <title>Mengakses Data Session</title>
    </head>
    <body>
        <?php
            $_SESSION['counter']++;
            $_SESSION['nama_pengunjung'] = "Abdul";
            echo "Selamat datang ".$_SESSION['nama_pengunjung']."<br>";
            echo "Anda telah masuk sebanyak ".$_SESSION['counter']." kali.";
        ?>
    </body>
</html>