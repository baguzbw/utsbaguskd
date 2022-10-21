<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['namalengkap']);
unset($_SESSION['password']);

session_destroy();
echo "<script>alert('Anda telah Logout');document.location='index.php'</script>"
?>