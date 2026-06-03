<?php
    include "../function/web/authorization.php";
    include "../function/pub/conn.php";
    include "../component/bootstrap.php";
?>

<?php
// 判断当前的页数
    if(isset($_GET['p']) && $_GET['p'])
        $page = $_GET['p'];
    else
        $page = 1;
    $page_size = 10;
// 确定最大页数
    $sql="select count(*) from show_item";
    $rs=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($rs);
    $max_page = ceil($row[0]/$page_size);
// 确定翻页地址
    $next_url = "./show_view.php?";
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
                <p>管理员 <?php echo $admin_name;?>，您可以在本页面查看或管理所有演出的信息。</p></br>
                <p>『一览』仅显示部分信息，要查看详细信息，请单击演出 ID。</p>
                <p>要浏览演出列表，请向下滚动页面。</p>
                <p>要管理演出信息，请点击演出 ID。</p>
                <p>要登出系统，请返回仪表盘。</p>
            </div>
            <div class="workspace">
                <h1>演出一览</h1>
                <form method="get" action="show_menage.php">
                    <div class="form-group">
                        <label>通过演出 ID 直达管理</label>
                        <input class="form-control" name="show_id" type="text" value="" >
                        <small id="idlHelp" class="form-text text-muted">输入要管理的演出 ID</small>
                        <input type="submit" class="btn btn-primary" />
                    </div>
                </form>
                <!-- 新增演出 -->
                <a href="./show_add.php">
                    <input type="button" class="btn btn-info" value="新增演出" >
                </a>
                <table class="glance table table-hover table-bordered" >
                    <tr>
                        <td>ID</td>
                        <td>名称</td>
                        <td>卡司</td>
                        <td>城市</td>
                    </tr>
                    <?php
                        $sql="select * from show_item ORDER BY show_id limit ".(($page-1)*$page_size).",".$page_size;
                        $rs=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($rs))
                        {
                    ?>
                    <tr>
                        <td>
                            <a href="show_menage.php?show_id=<?php echo $row['show_id']?>"><?php echo $row['show_id']?></a>
                        </td>
                        <td>
                            <a href="show_menage.php?show_id=<?php echo $row['show_id']?>"><?php echo $row['show_name']?></a>
                        </td>
                        <td>
                            <p><?php echo $row['show_cast']?></p>
                        </td>
                        <td>
                            <p><?php echo $row['show_city']?></p>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        
                    <!-- 算出最大页面数 -->
                    <?php
                        $sql="select count(*) from wx_user";
                        $rs=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($rs);
                        // 引入分页
                        include "../component/pagination.php";
                    ?>
                        </li>
                    </ul>
                    </nav>
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
