<?php

    include "../../component/header.php";
    include "../pub/conn.php";

    include "../pub/jwt.php";
    include "../pub/get_sub.php";

    // 取token，变成openid
    $token = $_GET['token'];
    $openid = get_sub($token);

    // 取order_id
    $order_id = $_GET['order_id'];
    // 从数据库找user_id
    $sql = "select user_id from `wx_user` where `openid` = '$openid'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    $user_id = $row[0];
    // 从数据库找用户订单列表
    $sql = "select * from `orders` where `order_id` = '$order_id'";
    $res = mysqli_query($conn, $sql);
    

    $arr = array();
    // 录入order_array
    while($row=mysqli_fetch_array($res))
    {
        $sql = "select * from `show_item` where `show_id` = (select show_id from show_session where session_id = ".$row['order_session_id'].")";
        $res_2 = mysqli_query($conn, $sql);
        $row_2=mysqli_fetch_array($res_2);
        
        // 从订单的session找session_detail
        $sql = "select * from `show_session` where `session_id` = ".$row['order_session_id'];
        $res_3 = mysqli_query($conn, $sql);
        $row_3=mysqli_fetch_array($res_3);
        
        
        // 实体化
        foreach ($row_2 as $key => $value) {
            $row[$key] = htmlspecialchars_decode($value);
        }
        foreach ($row_3 as $key => $value) {
            $row[$key] = htmlspecialchars_decode($value);
        }

        array_push($row,$row_2);
        array_push($row,$row_3);

        $count=count($row);
        for($i=0;$i<$count;$i++)
        { 
            unset($row[$i]);//删除冗余数据 
        }

        array_push($arr,$row); 
    }

    echo json_encode($arr);
?>