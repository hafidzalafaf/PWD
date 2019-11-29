<?php
    session_start();
    if($_SESSION['status']!= 'Member'){
    ?>
        <script language script="Javascript">
            alert('Ini bukan tempat anda bung')
            document.location = 'login.php';
        </script>
    <?php
    }
    echo "INI ADALAH HALAMAN MEMBER<br><br>";
    echo "Anda berhasil Login Sebagai ".$_SESSION['username']." Dan anda Terdaftar sebagai".$_SESSION['status'];
?>
<br>
Silahkan Logout dengan klik link <a href="logout.php">disini</a>