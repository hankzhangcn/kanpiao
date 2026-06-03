<?php
    include "../../component/header.php";
    include "../pub/conn.php";
    // include "../pub/jwt.php";
    
    function openid_to_user_id($openid)
    {
        $sql = "select user_id from wx_user where openid = '$openid' ";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);
        $user_id = $row[0];
        return $user_id;
    }
?>