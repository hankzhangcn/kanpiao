<?php
session_start();
//如果没有经过../PHP/login.php的登录验证，就不允许进入
//同时，只有点击了“登录”按钮才会清空admin信息。
if($_SESSION['login']==true)
{   
    $is_service = $_SESSION["is_service"];
    $admin_id = $_SESSION["admin_id"];
    $admin_name = $_SESSION["admin_name"];
    $admin_avatar = $_SESSION["admin_avatar"];
}
else{
    echo "<script>alert('请先登录。'); window.location.href='login.php';</script>";
}