<?php
// 检票员对订单检札
    include "../../component/header.php";
    include "../pub/conn.php";
    // include "../pub/jwt.php";

    // 得到前端传来的订单号
    $order_id = $_GET['order_id'];
    // $order_id = 1;

    // 首先查看订单状态是否可以被检票
    $sql = "select `order_status` from `orders` where `order_id` = ".$order_id;
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    if($row[0] == 1)
    {
        $sql = "update `orders` set `order_status` = 0 where `order_id` = ".$order_id;
        $res = mysqli_query($conn, $sql);
    }
    else
    {
        echo false;
    }

?>