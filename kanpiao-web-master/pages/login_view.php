<?php
    include "../function/web/authorization.php";
    include "../function/pub/conn.php";
    include "../component/bootstrap.php";
    $openid = '';
?>

<?php
// 判断当前的页数
    if(isset($_GET['p']) && $_GET['p'])
        $page = $_GET['p'];
    else
        $page = 1;
    $page_size = 10;
// 判断是否需要筛选
    if(isset($_GET['openid']) && $_GET['openid'])
    {
        $openid = $_GET['openid'];
        $next_url = './login_view.php?openid='.$openid;
    }
    else
    $next_url = './login_view.php?';

        
    
?>


<!-------html------->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="\component\css\common.css">
  <!-- <link rel="stylesheet" href="\component\css\table.css"> -->
  <link rel="icon" href="https://s1.ax1x.com/2020/06/09/t5LIK0.png" type="image/x-icon" />
  <title>用户一览-KPS</title>
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
                <p>管理员 <?php echo $admin_name;?>，您可以在本页面查看或管理所有用户登录的信息。</p></br>
                <p>要浏览登录列表，请向下滚动页面。</p>
                <p>要筛选用户，请点击用户openid。</p>
                <p>要登出系统，请返回仪表盘。</p>
            </div>
            <div class="workspace">
                <h1>登录流水</h1>
                <h2>
                    <?php if($openid) echo $openid?>
                </h2>
                <form method="get" action="login_view.php">
                <div class="form-group">
                        <label>筛选 openid </label>
                        <input class="form-control" name="openid" type="text" value="" >
                        <small id="idlHelp" class="form-text text-muted">输入要查看的 openid</small>
                        <input type="submit" class="btn btn-primary" />
                </div>
                </form>
                <table class="glance table table-hover table-bordered" >
                    <tr>
                        <td>登录号</td>
                        <td>openid</td>
                        <td>登录平台</td>
                        <td>登陆时间</td>
                        <td>新登录标识</td>
                    </tr>
                    <?php
                        if($openid)
                            $sql="select * from login  WHERE openid = '".$openid."' ORDER BY login_id DESC limit ".(($page-1)*$page_size).",".$page_size;
                        else
                            $sql="select * from login ORDER BY login_id DESC limit ".(($page-1)*$page_size).",".$page_size;
                        $rs=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($rs))
                        {
                    ?>
                    
                    <tr>
                        <td>
                            <p><?php echo $row['login_id']?></p>
                        </td>
                        <td>
                            <a href="login_view.php?openid=<?php echo $row['openid']?>"><?php echo $row['openid']?></a>
                        </td>
                        <td>
                            <?php 
                                if($row['platform'])
                                    echo "管理端";
                                else
                                    echo "小程序";?>
                        </td>
                        <td>
                            <?php echo $row['login_time']?>
                        </td>
                        <td>
                            <?php 
                                if($row['is_new_login'])
                                    echo "<span class=\"badge badge-success\">是</span>";
                                else
                                    echo "否";?>
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
                        if($openid)
                            $sql="select count(*) from login where openid = '".$openid."'";
                        else
                            $sql="select count(*) from login";
                        $rs=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($rs);
                        $max_page = ceil($row[0]/$page_size);
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
