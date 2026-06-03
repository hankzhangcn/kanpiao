<div class="funclist-pad">
<?php
    if($is_service == 0)
    {
?>
        <a href="dashboard.php">
            <input type="button" class="yibiaopan" value="工作台">
        </a>
        <a href="view.php">
            <input type="button" class="view" value="用户一览">
        </a>
        <a href="login_view.php">
            <input type="button" class="add" value="用户登录记录">
        </a>
        <div class="crossline"></div>
        <a href="changepw.php">
            <input type="button" class="changepw" value="修改密码">
        </a>

        <div class="crossline">演出</div>
        <a href="order_go_to.php">
            <input type="button" class="changepw" value="订单直达">
        </a>
        <a href="show_view.php">
            <input type="button" class="changepw" value="演出一览">
        </a>
<?php
}
?>
<?php
    if($is_service == 1)
    {
?>
        <a href="dashboard.php">
            <input type="button" class="yibiaopan" value="工作台">
        </a>
        <a href="view.php">
            <input type="button" class="view" value="用户一览">
        </a>
        <a href="login_view.php">
            <input type="button" class="add" value="用户登录记录">
        </a>
        <div class="crossline"></div>
        <a href="changepw.php">
            <input type="button" class="changepw" value="修改密码">
        </a>

        <div class="crossline">演出</div>
        <a href="order_go_to.php">
            <input type="button" class="changepw" value="订单管理">
        </a>
<?php
}
?>

</div>