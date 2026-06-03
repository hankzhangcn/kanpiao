<?php
    include "../function/web/authorization.php";
    include "../function/pub/conn.php";
    include "../component/bootstrap.php";



    $show_id=               htmlspecialchars($_POST['show_id'],ENT_QUOTES);
    $show_name=             htmlspecialchars($_POST["show_name"],ENT_QUOTES);
    $show_foreign_name=     htmlspecialchars($_POST["show_foreign_name"],ENT_QUOTES);
    $show_cast=             htmlspecialchars($_POST["show_cast"],ENT_QUOTES);
    $show_city=             htmlspecialchars($_POST["show_city"],ENT_QUOTES);
    $show_place=            htmlspecialchars($_POST["show_place"],ENT_QUOTES);
    $show_abstract=         htmlspecialchars($_POST["show_abstract"],ENT_QUOTES);
    $show_detail=           htmlspecialchars($_POST["show_detail"],ENT_QUOTES);
    $show_issuing_company=  htmlspecialchars($_POST["show_issuing_company"],ENT_QUOTES);
    $show_poster_horizontal=htmlspecialchars($_POST["show_poster_horizontal"],ENT_QUOTES);
    $show_poster_vertical=  htmlspecialchars($_POST["show_poster_vertical"],ENT_QUOTES);
    

    $sql = "INSERT INTO show_item(show_name,
    show_foreign_name,
    show_cast,
    show_city,
    show_place,
    show_abstract,
    show_detail,
    show_issuing_company,
    show_poster_horizontal,
    show_poster_vertical)
    VALUES('$show_name',
    '$show_foreign_name',
    '$show_cast',
    '$show_city',
    '$show_place',
    '$show_abstract',
    '$show_detail',
    '$show_issuing_company',
    '$show_poster_horizontal',
    '$show_poster_vertical')";


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
                                <a>管理员 <?php echo $_SESSION['admin_name'];?>，您可以在本页面新增演出。</a></br>
                                <a>要登出系统，请返回仪表盘。</a></br>
                            </div>

                            <div class="workspace">
                                    
                                    <h1>管理员 <?php echo $_SESSION['admin_name'];?>，演出的信息已经完善</h1></br></br>

                                    <a href="./show_menage.php?show_id=<?php echo $show_id;?>">
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
