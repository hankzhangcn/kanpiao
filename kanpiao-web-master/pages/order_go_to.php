<?php
    include "../function/web/authorization.php";
    include "../function/pub/conn.php";
    include "../component/bootstrap.php";
?>


<!-------html------->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="\component\css\common.css">
  <link rel="stylesheet" href="\component\css\table.css">
  <link rel="icon" href="https://s1.ax1x.com/2020/06/09/t5LIK0.png" type="image/x-icon" />
  <title>演出一览-KPS</title>
</head>
<body>
    <main>
        <!-- 顶栏 -->
        <?php include "../component/topbar.php"?>
        <!-- 目录 -->
        <?php include "../component/menu.php"?>
        
        <div class="contentflow">
            <div class="noticepad">
                <h1></h1>
                <p>管理员 <?php echo $admin_name;?>，您可以在本页面快速定位订单。</p></br>
                <p>要登出系统，请返回仪表盘。</p>
            </div>
            <div class="workspace">
                <h1>前往订单</h1>
                <form method="get" action="order_menage.php">
                    <div class="form-group">
                        <label>通过订单 ID 直达管理</label>
                        <input class="form-control" name="order_id" type="text" value="" >
                        <small id="idlHelp" class="form-text text-muted">输入要管理的订单 ID</small>
                        <input type="submit" class="btn btn-primary" />
                    </div>
                </form>
</div>

            <div class="bottom">
                <h1>版权信息</h1>
                <p>© <?php echo date("Y");?> Hank.</p>
                <p>All Rights Reserved.</p>
                <p>Powered by PHP on PHPSTUDY</p>
            </div>
        </div>
    </main>
      <!--调试用，防止JS被缓存-->
    <!--<script type="text/javascript" src="../js/view.js?param=Math.random()"></script>-->
</body>
</html>
