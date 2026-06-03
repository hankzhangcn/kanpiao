<?php

// 请在需要引用的地方
// include "../pub/jwt.php";
// include "../pub/get_token.php";


    function get_token($sub)
    {
        $payload_test=array('iss'=>'kanpiao','iat'=>time(),'exp'=>time()+7200,'nbf'=>time(),'sub'=>"$sub",'jti'=>md5(uniqid('JWT').time()));;
        return Jwt::getToken($payload_test);
    }

?>