<?php
// 销毁session
session_start();
session_destroy();
echo "<script>window.location.href='/pages/login.php'; </script>";
?>
