<?php
        include "../../component/header.php";
        include "../pub/conn.php";

        include "../pub/jwt.php";
        include "../pub/get_sub.php";


        $token = $_GET['qrcode'];


        // 返回前端要处理的order_id
        $order_id = get_sub($token);
        // 此处应该返回订单的详细信息：演出、场次、座位
?>