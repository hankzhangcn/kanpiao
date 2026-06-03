<?php
    include "../../component/header.php";
    include "../pub/conn.php";

    $session_id = isset($_GET['session_id']) ? intval($_GET['session_id']) : 0;
    $show_id    = isset($_GET['show_id'])    ? intval($_GET['show_id'])    : 0;

    if($session_id && !$show_id)
    {
        // 如果有 session_id 但没 show_id，从数据库查 show_id
        $sql = "select show_id from `show_session` where `session_id` = $session_id";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);
        if ($row && isset($row['show_id'])) {
            $show_id = intval($row['show_id']);
        }
    }

    if (!$show_id) {
        echo json_encode([]);
        exit;
    }

    $sql = "select * from `show_session` where `show_id` = $show_id order by `session_time` asc";
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