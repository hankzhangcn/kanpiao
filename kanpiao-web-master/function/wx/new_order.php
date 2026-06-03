<?php

    include "../../component/header.php";
    include "../pub/conn.php";

    include "../pub/jwt.php";
    include "../pub/get_sub.php";

    // 取token，变成openid
    $token = $_GET['token'];
    $openid = get_sub($token);
    
    // 取session_id
    $session_id = $_GET['session_id'];
    // 取票数
    $buy_num = $_GET['buy_num'];


    // 从数据库找user_id
    $sql = "select user_id from `wx_user` where `openid` = '$openid'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    $user_id = $row[0];



    // 计算totalprice
    $sql = "select session_price from `show_session` where `session_id` = $session_id";
    $res = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($res);
    $total_price= $row[0]*$buy_num;

    // 取回单价
    $single_price=$row[0];
    for($i = 1;$i<=$buy_num;$i++)
    {
        $sql = "INSERT INTO orders(order_session_id, 
        order_multi_id, 
        order_user_id, 
        order_price, 
        order_multi_price, 
        order_create_time, 
        order_pay_time, 
        order_status)
        VALUES($session_id,
        $i, 
        $user_id, 
        $single_price, 
        $total_price, '".
        date('Y-m-d\TH:i:s')."','". 
        date('Y-m-d\TH:i:s')."'," ."
        0)";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);
    }
    

?>