<?php
// 本功能实则取sub，虽然从sub取值不太规范，但╮(^_^)╭无所谓啦
    include "../../component/header.php";
    include "../pub/conn.php";
    include "../pub/jwt.php";

    include "../pub/get_token.php";
    include "../pub/get_sub.php";

    eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJrYW5waWFvIiwiaWF0IjoxNjU0Mjc5OTYwLCJleHAiOjE2NTQyODcxNjAsIm5iZiI6MTY1NDI3OTk2MCwic3ViIjoib3NmM3E1TWFILTY3Q3VIMTl5SVpvcmpUMmJ0RSIsImp0aSI6ImUxYjNhMzY1ZTAzYjliM2NjOWI1MDZlNmQ2YTg1NGYyIn0.mg_8TjVMemQw3zXJ3nR9WYw1U4vBqzdS2O2ITqqk3xY
    $getPayload=Jwt::verifyToken("eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJrYW5waWFvIiwiaWF0IjoxNjU0Mjc5OTYwLCJleHAiOjE2NTQyODcxNjAsIm5iZiI6MTY1NDI3OTk2MCwic3ViIjoib3NmM3E1TWFILTY3Q3VIMTl5SVpvcmpUMmJ0RSIsImp0aSI6ImUxYjNhMzY1ZTAzYjliM2NjOWI1MDZlNmQ2YTg1NGYyIn0.mg_8TjVMemQw3zXJ3nR9WYw1U4vBqzdS2O2ITqqk3xY");
    var_dump($getPayload['sub']);
    // echo get_sub("eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJrYW5waWFvIiwiaWF0IjoxNjU0Mjc5MjY5LCJleHAiOjE2NTQyODY0NjksIm5iZiI6MTY1NDI3OTI2OSwic3ViIjoiIiwianRpIjoiZTkzNDhlYzA5YjA1ZTliMmI5ZmQ3YTE0YTJlZDU3ZTUifQ.NMdN0VLp0Re2YB4miqiRrinIKysZCC_cIJ281Xt5UxE");



?>