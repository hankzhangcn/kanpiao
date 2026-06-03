<?php
// 优先从环境变量读取（Docker 容器），否则使用本地默认值
$servername = getenv('DB_HOST') ?: "localhost";
$username   = getenv('DB_USER') ?: "kanpiao";
$password   = getenv('DB_PASSWORD') ?: "kanpiao";
$dbname     = getenv('DB_NAME') ?: "kanpiao";
$port       = getenv('DB_PORT') ?: "3306";
 
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname, (int)$port);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
// echo "连接成功";

$conn->set_charset("utf8mb4");
?>