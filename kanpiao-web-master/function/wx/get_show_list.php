<?php
    include "../../component/header.php";
    include "../pub/conn.php";

    $limit    = isset($_GET['limit'])   ? intval($_GET['limit'])   : 100;
    $pageNum  = isset($_GET['pageNum']) ? intval($_GET['pageNum']) : 0;
    $pagestart = $limit * $pageNum;

    $sql = "SELECT * FROM show_item ORDER BY show_id LIMIT $pagestart, $limit";
    $res = mysqli_query($conn, $sql);

    $arr = array(); 
    while($row = mysqli_fetch_array($res))
    {
        $count = count($row);
        for($i = 0; $i < $count; $i++){ 
            unset($row[$i]);
        } 
        array_push($arr, $row); 
    }
    echo json_encode($arr, JSON_UNESCAPED_UNICODE);
?>