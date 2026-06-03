<?php
include "../function/web/authorization.php";
include "../function/pub/conn.php";
?>


<!-------html------->
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="\component\css\common.css">
    <link rel="stylesheet" href="\component\css\dashboard.css">
    <link rel="icon" href="https://s1.ax1x.com/2020/06/09/t5LIK0.png" type="image/x-icon" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <script src="https://s3.pstatp.com/cdn/expire-1-M/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://s2.pstatp.com/cdn/expire-1-M/jquery-easing/1.4.1/jquery.easing.js" type="application/javascript"></script>
    <title>工作台-KPS</title>
</head>

<body>
    <main>
        <!-- 顶栏 -->
        <?php include "../component/topbar.php"?>
        <!-- 目录 -->
        <?php include "../component/menu.php"?>
        <!-- 内容流 -->
        <div class="contentflow">
            <div class="noticepad">
                <h1>欢迎</h1></br></br>
                <a>管理员 <?php echo $admin_name;?> ID：<?php echo $admin_id;?>，欢迎回来。</a></br>
                <a>为了防止意外登出导致的数据丢失，「登出系统」按钮仅在本页面顶栏右侧提供。</a></br>
            </div>
            <div class="workspace">
                <h1>系统概述</h1></br></br>
                <a>系统正保管着
                    <?php
                        $sql="select count(*) from wx_user";
                        $rs=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($rs);
                        echo " ".$row[0]." ";
                    ?>
                位用户，
                    <?php
                        $sql="select count(*) from admin_user";
                        $rs=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($rs);
                        echo $row[0];
                    ?>
                    位管理员的信息。</br>请在左侧选择功能来管理。
                </a></br>
                

            </div>

            <div class="bottom">
                <h1>版权信息</h1></br></br>
                <a>© <?php echo date("Y");?> Hank.</a></br>
                <a>All Rights Reserved.</a></br>
                <a>Powered by PHP on PHPSTUDY</a>
            </div>
        </div>
    </main>
    <!--调试用，防止JS被缓存-->
    <script type="text/javascript" src="\component\js\dashboard.js"></script>
</body>
</html>