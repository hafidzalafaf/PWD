<?php
    session_start();
    echo "Anda berhasil Login Sebagai ".$_SESSION['username']." Dan anda Terdaftar sebagai".$_SESSION['status'];
?>
<br>
Silahkan Logout dengan klik link <a href="logout.php">disini</a>