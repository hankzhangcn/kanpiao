<?php
    include "../../component/header.php";
    include "../pub/conn.php";

    $sql = "select `img` from `banner`";
    $res = mysqli_query($conn, $sql);
    if(!$res){
        die("数据库没有数据!");
    }

    $arr = array(); 
    while($row=mysqli_fetch_array($res))
    {
        $count=count($row);
        for($i=0;$i<$count;$i++){ 
            unset($row[$i]);//删除冗余数据 
          } 
          array_push($arr,$row); 
    }
    // print_r($arr);
    echo json_encode($arr);
?>