<?php
    session_start();
    session_destroy();
?>
<script language script="Javascript">
    alert('Anda telah logout')
    document.location = 'login.php';
</script>