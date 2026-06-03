<?php
    include "../../component/header.php";
    include "../pub/conn.php";



    $session_id = $_GET['session_id'];
    $show_id = $_GET['show_id'];
    $buy_num = $_GET['buy_num'];

    if($session_id)
    {
        // 获取show_id
        $sql = "select show_id from `show_session` where `session_id` = $session_id";
        $res = mysqli_query($conn, $sql);
        $row=mysqli_fetch_array($res);
        $show_id = $row['show_id'];
    }

    $sql = "select session_price from `show_session` where `session_id` = $session_id";
    $res = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($res);
    
    echo $row[0]*$buy_num;
    

       


?>