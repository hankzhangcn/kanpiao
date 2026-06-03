<?php
    include "../../component/header.php";
    include "../pub/conn.php";

    $session_id = isset($_GET['session_id']) ? intval($_GET['session_id']) : 0;

    if (!$session_id) {
        echo json_encode([]);
        exit;
    }

    $sql = "select * from `show_session` where `session_id` = $session_id";
    $res = mysqli_query($conn, $sql);
    $arr = array(); 
    while($row = mysqli_fetch_array($res))
    {
        foreach ($row as $key => $value) {
            $row[$key] = htmlspecialchars_decode($value);
        }
        $count = count($row);
        for($i = 0; $i < $count; $i++){ 
            unset($row[$i]);
        } 
        array_push($arr, $row); 
    }
    echo json_encode($arr, JSON_UNESCAPED_UNICODE);
?>