<?php
// 本文件获取code以及token（可选）
// 首先检查token情况,无则获取
// 有则判断,没过期则还回去,过期则重新获取
// 若wx_user无,则新建一行
// 最后写login表,标记新旧登录
    include "../../component/header.php";
    include "../pub/conn.php";
    
    include "../pub/jwt.php";
    include "../pub/get_token.php";
    include "../pub/get_sub.php";

    // $appid = "yourappid";
    // $secret = "yoursecret";
    // $js_code = $_GET['code'];
    
    $appid = "wxe4ba609fd1867ce7";
    $secret = "8205eefb1092cc50cbaf0be3abcc9fbb"; // 请在微信公众平台 → 开发管理 → 开发设置 中获取
    $js_code = $_GET['code'];
    $token = $_GET['token'];
    $is_new_login = 1;
    $openid=get_sub($token);

    // 如果没有token
    if(!$token)
    {
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=".$appid."&secret=".$secret."&js_code=".$js_code."&grant_type=authorization_code";
        $str = file_get_contents($url);
        $json = json_decode($str);
        $arr = get_object_vars($json);
        $openid = $arr['openid']; //这是openid
        $session_key = $arr['session_key']; //这是session_key
        // 返回token
        echo get_token($openid);
    }
    // 如果有token
    else
    {
        // 检查过期情况
        {
            // 如果没过期
            if(get_sub($token))
            {
                
                $is_new_login = 0;
                echo $token;
                $openid=get_sub($token);

            }
            else
            {
                // 获取新token
                $url = "https://api.weixin.qq.com/sns/jscode2session?appid=".$appid."&secret=".$secret."&js_code=".$js_code."&grant_type=authorization_code";
                $str = file_get_contents($url);
                $json = json_decode($str);
                $arr = get_object_vars($json);
                $openid = $arr['openid']; //这是openid
                $session_key = $arr['session_key']; //这是session_key
                // 返回token
                echo get_token($openid);
            }
        }
    }
    
    

    // 将openid存入数据库
    $sql = "select * from `wx_user` where `openid` = '$openid'";
    $res = mysqli_query($conn, $sql);
    // 是否存在该用户
    $number = mysqli_num_rows($res);
    if(!$number){
        // 不存在，建立用户行
        $sql = "insert into `wx_user`(openid) values('$openid')";
        $res = mysqli_query($conn, $sql);
    }

    // 写login表
    $sql = "insert into `login`(`platform`,`openid`,`login_time`,`is_new_login`) values('0','".$openid."','".date("Y-m-d H:i:s")."',$is_new_login)";
    $res = mysqli_query($conn, $sql);

?>