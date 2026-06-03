<?php
    include "../function/web/authorization.php";
    include "../function/pub/conn.php";
    include "../component/bootstrap.php";
    $session_id = isset($_GET["session_id"]) ? $_GET["session_id"] : null;

    //如果直接访问，那么后退。
    if($session_id == null)
    {
        echo "<script>alert('请先选择场次。'); window.history.back();</script>";
        exit;
    }


?>


<!-------html------->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="\component\css\common.css">
  <!-- <link rel="stylesheet" href="\component\css\shadow.css">
  <link rel="stylesheet" href="\component\css\table.css"> -->
  <link rel="icon" href="https://s1.ax1x.com/2020/06/09/t5LIK0.png" type="image/x-icon" />
  <script src="https://s3.pstatp.com/cdn/expire-1-M/jquery/3.4.0/jquery.min.js"></script>
  <title>场次信息修改-KPS</title>
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
                <a>管理员 <?php echo $admin_name;?>，您可以在本页面修改场次的信息。</a></br>
                <a>要登出系统，请返回仪表盘。</a></br>
            </div>
            <?php
                //找人
                $sql="select * from show_session WHERE session_id = $session_id";
                $rs=mysqli_query($conn,$sql);
                if(mysqli_num_rows($rs)){
                $row=mysqli_fetch_array($rs);
                //将原本场次信息放入变量，方便嵌套
                $show_id=$row["show_id"];
                $session_time=$row["session_time"];
                $session_end_time=$row["session_end_time"];
                $session_sub=$row["session_sub"];
                $session_sell_time=$row["session_sell_time"];
                $session_status=$row["session_status"];
                
                if($is_service != 0)//如果不是管理员
                    echo "<script>alert('您没有管理用户的权限。'); window.history.back();</script>";
            ?>
            <div class="workspace">
                <h1>演出 <?php echo "$show_id"?> 场号 <?php echo "$session_id"?> 的场次信息</h1></br>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            
                            <a href="./session_view.php?show_id=<?php echo $show_id;?>">
                                        <input type="button" class="btn btn-info" value="查看场次的检票实况" >
                            </a>
                            <a href="./order_view.php?session_id=<?php echo $session_id;?>">
                                        <input type="button" class="btn btn-info" value="查看场次的所有订单" >
                            </a>
                        </div>
                    </div>
                </div></br>

                <form class="info" action="session_menage_ok.php" method="POST">
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label>场次 ID</label>
                                <input class="form-control" name="session_id" type="text" value="<?php echo $session_id?>" readonly>
                                <small id="idlHelp" class="form-text text-muted">场次 ID 由系统自动生成，不可更改。</small>
                            </div>
                            <div class="form-group">
                                <label>演出 ID</label>
                                <input class="form-control" name="show_id" type="text" value="<?php echo $show_id?>" readonly>
                                <small id="idlHelp" class="form-text text-muted">演出 ID 唯一确定，不可更改。</small>
                            </div>

                            <div class="form-group">
                                <label>场次开始时间</label>
                                <input type="datetime-local" class="form-control" name="session_time" value="<?php echo $session_time?>">
                            </div>
                            <div class="form-group">
                                <label>场次结束时间</label>
                                <input type="datetime-local" class="form-control" name="session_end_time" value="<?php echo $session_end_time?>">
                            </div>
                            
                        </div>
                        <!-- 右侧 -->
                        <div class="col-sm">
                            <div class="form-group">
                                    <label>发售开始时间</label>
                                    <input type="datetime-local" class="form-control" name="session_sell_time" value='<?php echo $session_sell_time?>'>
                            </div>
                            <div class="form-group">
                                    <label>场次状态</label>
                                    <select class="form-control" name="session_status">
                                        <?php
                                            if($session_status == 1)
                                            {
                                        ?>
                                                <option value =1 selected>正常</option>
                                                <option value =0>已取消</option>
                                        <?php
                                            }else{
                                        ?>
                                                <option value =1 >正常</option>
                                                <option value =0 selected>已取消</option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>场次说明</label>
                        <textarea type="text" class="form-control" name="session_sub" rows="2"><?php echo $session_sub?></textarea>
                    </div>

                    <!-- 提交按钮 -->
                    <button type="submit"  name="save" class="btn btn-primary">提交更改</button>
                </form>
                                    </br>
                    <?php
                        }else{
                            echo "<script>alert('场次不存在。'); window.history.back();</script>";
                        }
                    ?>
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
      <script type="text/javascript" src="../js/tcheck.js?param=Math.random()"></script>
</body>
</html>
