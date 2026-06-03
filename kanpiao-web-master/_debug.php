<?php
$conn = mysqli_connect('mysql', 'kanpiao', 'kanpiao', 'kanpiao');

echo "=== show_session 表结构 ===\n";
$sql = 'DESCRIBE show_session';
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    echo $row['Field'] . ' | ' . $row['Type'] . ' | ' . $row['Key'] . "\n";
}

echo "\n=== show_session 数据 (前5条) ===\n";
$sql = 'SELECT * FROM show_session LIMIT 5';
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    echo json_encode($row, JSON_UNESCAPED_UNICODE) . "\n";
}

echo "\n=== show_item 表结构 ===\n";
$sql = 'DESCRIBE show_item';
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    echo $row['Field'] . ' | ' . $row['Type'] . ' | ' . $row['Key'] . "\n";
}

echo "\n=== show_item 数据 (前5条) ===\n";
$sql = 'SELECT * FROM show_item LIMIT 5';
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    echo json_encode($row, JSON_UNESCAPED_UNICODE) . "\n";
}
