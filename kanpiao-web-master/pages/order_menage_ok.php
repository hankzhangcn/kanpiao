<?php
    include "../function/web/authorization.php";
    include "../function/pub/conn.php";
    include "../component/bootstrap.php";



    $order_price=            htmlspecialchars($_POST['order_price'],ENT_QUOTES);
    $order_multi_price=               htmlspecialchars($_POST["order_multi_price"],ENT_QUOTES);
    $order_status=     htmlspecialchars($_POST["order_status"],ENT_QUOTES);
    $order_id=             htmlspecialchars($_POST["order_id"],ENT_QUOTES);
    

    $sql = "UPDATE orders 
            SET order_price = '".$order_price.
            "', order_multi_price = '".$order_multi_price.
            "', order_status = ".$order_status.
            " WHERE order_id = ".$order_id;

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
                <title>订单信息修改成功-KPS</title>
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
                                <a>管理员 <?php echo $_SESSION['admin_name'];?>，您可以在本页面修改订单信息。</a></br>
                                <a>要登出系统，请返回仪表盘。</a></br>
                            </div>

                            <div class="workspace">
                                    
                                    <h1><?php echo "$order_id"?> 订单的信息已经完善</h1></br></br>

                                    <a href="./order_menage.php?order_id=<?php echo $order_id;?>">
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
