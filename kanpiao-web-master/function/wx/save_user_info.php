<?php
    include "../../component/header.php";
    include "../pub/conn.php";
    include "./std_to_arr.php";
    include "../pub/jwt.php";
    include "../pub/get_sub.php";

    $user_info = json_decode($_GET['user_info']);
    $openid = get_sub($_GET['token']);
    $user_info=object_array($user_info);

    $nick_name = htmlspecialchars($user_info['nickName'],ENT_QUOTES);
    $avatarurl = htmlspecialchars($user_info['avatarUrl'],ENT_QUOTES);
    
    // 检查是否已有该用户
    
    $sql = "select count(*) from wx_user where openid = '$openid' ";
    $res = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($res);
    // 有该用户
    if($row[0] != 0)
    {
        $sql = "UPDATE wx_user SET 
        nickname = '$nick_name'
        WHERE openid = '$openid'";
        $res = mysqli_query($conn, $sql);
    }
    else{
        $sql = "INSERT INTO wx_user(nickname,openid) VALUES('$nick_name','$openid')";
        $res = mysqli_query($conn, $sql);
    }
?>