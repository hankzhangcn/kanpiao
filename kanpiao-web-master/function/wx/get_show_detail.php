<?php
    include "../../component/header.php";
    include "../pub/conn.php";

    $show_id = isset($_GET['show_id']) ? intval($_GET['show_id']) : 0;

    if (!$show_id) {
        echo json_encode([]);
        exit;
    }

    $sql = "select * from `show_item` where `show_id` = $show_id";
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