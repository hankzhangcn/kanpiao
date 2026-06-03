<?php


// 请在需要引用的地方
// include "../pub/jwt.php";
// include "../pub/get_sub.php";

    function get_sub($token)
    {
        $getPayload=Jwt::verifyToken($token);
        return $getPayload['sub'];
    }


?>