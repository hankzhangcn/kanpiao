<?php
    include "../function/web/authorization.php";
    include "../function/pub/conn.php";
    include "../component/bootstrap.php";
?>

<?php

$show_id = isset($_GET['show_id']) ? $_GET['show_id'] : 0;
$session_id = isset($_GET['session_id']) ? $_GET['session_id'] : 0;

// 如果有session
if($session_id)
{
    // 取回show_id
    $sql="select show_id from show_session where session_id = '$session_id'";
    $rs=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($rs);
    $show_id = $row[0];
}

// 迎合数据库
$order_session_id = $session_id;

// 判断当前的页数
    if(isset($_GET['p']) && $_GET['p'])
        $page = $_GET['p'];
    else
        $page = 1;
    $page_size = 10;
// 确定最大页数
    $sql="select count(*) from orders where order_session_id = '$session_id'";
    $rs=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($rs);
    $max_page = ceil($row[0]/$page_size);
// 确定翻页地址
    $next_url = "./order_view.php?session_id=$session_id";

?>


<!-------html------->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="\component\css\common.css">
  <link rel="stylesheet" href="\component\css\table.css">
  <link rel="icon" href="https://s1.ax1x.com/2020/06/09/t5LIK0.png" type="image/x-icon" />
  <title>订单一览-KPS</title>
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
                <p>管理员 <?php echo $admin_name;?>，您可以在本页面查看或管理所有订单的信息。</p></br>
                <p>要浏览订单列表，请向下滚动页面。</p>
                <p>要管理订单信息，请点击订单ID。</p>
                <p>要登出系统，请返回仪表盘。</p>
            </div>
            <div class="workspace">
                <h1>场次 <?php echo $session_id?> 的订单一览</h1>

                <table class="glance table table-hover table-bordered" >
                    <tr>
                        <td>订单 ID</td>
                        <td>MULTI ID</td>
                        <td>下单用户</td>
                        <td>订单价格</td>
                        <td>下单时间</td>
                        <td>订单状态</td>
                    </tr>
                    <?php
                        $sql="select * from orders where order_session_id ='$session_id' ORDER BY order_id DESC limit ".(($page-1)*$page_size).",".$page_size;
                        $rs=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($rs))
                        {
                    ?>
                    <tr>
                        <td>
                            <a href="order_menage.php?order_id=<?php echo $row['order_id']?>"><?php echo $row['order_id']?></a>
                        </td>
                        <td>
                            <p><?php echo $row['order_multi_id']?></p>
                        </td>
                        <td>
                            <p><?php echo $row['order_user_id']?></p>
                        </td>
                        <td>
                            <p><?php echo $row['order_price']?></p>
                        </td>
                        <td>
                            <p><?php echo $row['order_create_time']?></p>
                        </td>
                        <td>
                            <p><?php 
                                if($row['order_status'] == 0)
                                    echo "等待检票";
                                else if($row['order_status'] == 1)
                                    echo "已入场";
                                else if($row['order_status'] == 2)
                                    echo "待付款";
                                else if($row['order_status'] == 3)
                                    echo "退款中";
                                else if($row['order_status'] == 4)
                                    echo "已退款";
                            ?></p>
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
