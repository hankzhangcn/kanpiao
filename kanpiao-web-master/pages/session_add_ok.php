<?php
    include "../function/web/authorization.php";
    include "../function/pub/conn.php";
    include "../component/bootstrap.php";



    $session_id=            htmlspecialchars($_POST['session_id'],ENT_QUOTES);
    $show_id=               htmlspecialchars($_POST["show_id"],ENT_QUOTES);
    $session_time=     htmlspecialchars($_POST["session_time"],ENT_QUOTES);
    $session_end_time=             htmlspecialchars($_POST["session_end_time"],ENT_QUOTES);
    $session_sub=             htmlspecialchars($_POST["session_sub"],ENT_QUOTES);
    $session_sell_time=            htmlspecialchars($_POST["session_sell_time"],ENT_QUOTES);
    $session_status=         htmlspecialchars($_POST["session_status"],ENT_QUOTES);
    

    $sql = "INSERT INTO show_session(show_id,
            session_time,
            session_end_time,
            session_sub,
            session_sell_time,
            session_status) 
            VALUES('$show_id',
            '$session_time',
            '$session_end_time',
            '$session_sub',
            '$session_sell_time',
            $session_status)";

    $result = mysqli_query($conn,$sql);
    if(! $result )
    {
        echo $sql;
        die('本错误来自数据库提示：' . mysqli_error($conn).' 。已撤销所有操作，请手动后退');
    }
else{
?>
                <!DOCTYPE html>
                <html lang="zh-cn">
                <head>
                <meta charset="UTF-8">
                <link rel="stylesheet" href="\component\css\common.css">
                <link rel="icon" href="https://s1.ax1x.com/2020/06/09/t5LIK0.png" type="image/x-icon" />
                <script src="https://s3.pstatp.com/cdn/expire-1-M/jquery/3.4.0/jquery.min.js"></script>
                <title>演出信息修改成功-KPS</title>
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
                                <a>管理员 <?php echo $_SESSION['admin_name'];?>，您可以在本页面修改这位场次的信息。</a></br>
                                <a>要登出系统，请返回仪表盘。</a></br>
                            </div>

                            <div class="workspace">
                                    
                                    <h1><?php echo "$session_id"?> 场次的信息已经完善</h1></br></br>

                                    <a href="./session_menage.php?session_id=<?php echo $session_id;?>">
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
                </body>
                </html>
    
<?php
}
$conn->close();

?>
