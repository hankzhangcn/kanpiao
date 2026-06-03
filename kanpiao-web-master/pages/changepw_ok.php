<?php
include "../function/web/authorization.php";
include "../function/pub/conn.php";
include "../component/bootstrap.php";


$pw=md5($_POST['Pw']);
$sql="UPDATE admin_user SET password = '".$pw."' WHERE admin_id = ".$_SESSION['admin_id'];
$result = mysqli_query($conn,$sql);
if(! $result )
{
    die('本错误来自数据库提示：' . mysqli_error($conn).'。已撤销所有操作，请手动后退');
}
else{
?>
    <!DOCTYPE html>
    <html lang="zh-cn">
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="\component\css\common.css">
    <link rel="icon" href="https://s1.ax1x.com/2020/06/09/t5LIK0.png" type="image/x-icon" />
    <title>密码修改成功-KPS</title>
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
                    <a>管理员 <?php echo $_SESSION['admin_name'];?>，您可以在本页面修改您的登录密码。</a></br>
                    <a>要登出系统，请返回仪表盘。</a></br>
                </div>

                <div class="workspace">
                    <h1>管理员 <?php echo $_SESSION['admin_name'];?> 的密码修改成功</h1></br></br>
                    <a href="../pages/dashboard.php">
                        <input type="button" class="btn btn-success" value="返回" >
                    </a>
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
        <!--<script type="text/javascript" src="../js/menage.js?param=Math.random()"></script>-->
    </body>
    </html>
    
<?php
}
$conn->close();

?>
