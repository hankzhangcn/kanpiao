<?php
$conn = mysqli_connect('mysql', 'kanpiao', 'kanpiao', 'kanpiao');

// 测试: show_id 为空时 SQL 行为
echo "=== 测试 1: show_id 为空字符串 ===\n";
$show_id = '';
$sql = "select * from `show_session` where `show_id` = $show_id";
echo "SQL: $sql\n";
$res = @mysqli_query($conn, $sql);
if ($res === false) {
    echo "ERROR: " . mysqli_error($conn) . "\n\n";
} else {
    $rows = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $rows[] = $row;
    }
    echo "结果: " . json_encode($rows, JSON_UNESCAPED_UNICODE) . "\n\n";
}

// 测试 2: show_id 为 null (未设置)
echo "=== 测试 2: show_id 为 null ===\n";
$show_id = null;
// This would cause: ... where `show_id` =   (empty)
echo "null → SQL 会报错（语法错误）\n\n";

// 测试 3: 不带 show_id 参数
echo "=== 测试 3: show_id 不存在于 $_GET ===\n";
$show_id = $_GET['no_exist_key'] ?? null;
echo "show_id 值: ";
var_dump($show_id);
echo "\n";

// 测试 4: 数据库所有场次
echo "=== 测试 4: 所有场次 ===\n";
$sql = "SELECT * FROM show_session";
$res = mysqli_query($conn, $sql);
$rows = [];
while ($row = mysqli_fetch_assoc($res)) {
    $rows[] = $row;
}
echo "总数: " . count($rows) . "\n";
echo json_encode($rows, JSON_UNESCAPED_UNICODE) . "\n\n";

// 测试 5: 模拟 get_session_list.php 的完整逻辑
echo "=== 测试 5: 模拟完整逻辑 show_id=1 ===\n";
$_GET['show_id'] = '1';
$show_id = $_GET['show_id'];
$sql = "select * from `show_session` where `show_id` = $show_id";
$res = mysqli_query($conn, $sql);
$arr = array(); 
while ($row = mysqli_fetch_array($res)) {
    $count = count($row);
    for ($i = 0; $i < $count; $i++) { 
        unset($row[$i]);
    } 
    array_push($arr, $row); 
}
echo json_encode($arr, JSON_UNESCAPED_UNICODE) . "\n";
