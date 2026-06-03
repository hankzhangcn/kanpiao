<?php

//  启动 Session
session_start();
//  声明一个名为 admin 的变量，并赋空值。
$_SESSION["login"] = null;

include "../pub/conn.php";


// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
 
else{
        $id = $_POST['id'];
        $password = md5($_POST['password']);
        $sql = "SELECT * from admin_user WHERE name = '$id' AND password = '$password'";
        $result = mysqli_query($conn,$sql);
        $number = mysqli_num_rows($result);
        $row=mysqli_fetch_array($result);
        if (!empty($number)) {
            //  注册登陆成功的 admin 变量，并赋值 true
            $_SESSION["login"] = true;
            $_SESSION["admin_id"] = $row['admin_id'];
            $_SESSION["admin_name"] = $row['name'];
            $_SESSION["admin_avatar"] = $row['avatar_url'];
            $_SESSION["is_service"] = $row['is_service'];
            echo "<script> window.location.href='/pages/dashboard.php'; </script>";
        } else {
            die("<script> alert('用户名或密码不正确。');window.location.href='/pages/login.php';</script>");
        }

    }

$conn->close();

?>