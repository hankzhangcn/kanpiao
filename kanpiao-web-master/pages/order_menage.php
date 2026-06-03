<?php
    include "../function/web/authorization.php";
    include "../function/pub/conn.php";
    include "../component/bootstrap.php";
    $order_id = isset($_GET["order_id"]) ? $_GET["order_id"] : null;

    //如果直接访问，那么后退。
    if($order_id == null)
    {
        echo "<script>alert('请先选择订单。'); window.history.back();</script>";
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
  <title>订单信息修改-KPS</title>
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
                <a>管理员 <?php echo $_SESSION['admin_name'];?>，您可以在本页面修改这位订单信息。</a></br>
                <a>要登出系统，请返回仪表盘。</a></br>
            </div>
            <?php
                //找人
                $sql="select * from orders WHERE order_id = $order_id";
                $rs=mysqli_query($conn,$sql);
                if(mysqli_num_rows($rs)){
                $row=mysqli_fetch_array($rs);
                //将原本信息放入变量，方便嵌套
                $order_session_id=$row["order_session_id"];
                $order_multi_id=$row["order_multi_id"];
                $order_user_id=$row["order_user_id"];
                $order_price=$row["order_price"];
                $order_multi_price=$row["order_multi_price"];
                $order_create_time=$row["order_create_time"];
                $order_pay_time=$row["order_pay_time"];
                $order_close_time=$row["order_close_time"];
                $order_status=$row["order_status"];
                
                
            ?>
            <div class="workspace">
                <h1>订单 <?php echo "$order_id"?> 的订单信息</h1></br>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            
                            <a href="./session_view.php?show_id=<?php echo $show_id;?>">
                                        <input type="button" class="btn btn-info" value="查看场次的检票实况" >
                            </a>
                        </div>
                    </div>
                </div></br>

                <form class="info" action="order_menage_ok.php" method="POST">
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label>订单 ID</label>
                                <input class="form-control" name="order_id" type="text" value="<?php echo $order_id?>" readonly>
                                <small id="idlHelp" class="form-text text-muted">订单 ID 由系统自动生成，不可更改。</small>
                            </div>
                            <div class="form-group">
                                <label>对应的场次 ID</label>
                                <input class="form-control" name="order_session_id" type="text" value="<?php echo $order_session_id?>" readonly>
                                <small id="idlHelp" class="form-text text-muted">敏感信息，不可更改。</small>
                            </div>
                            <div class="form-group">
                                <label>多订单序号</label>
                                <input class="form-control" name="order_multi_id" type="text" value="<?php echo $order_multi_id?>" readonly>
                                <small id="idlHelp" class="form-text text-muted">敏感信息，不可更改。</small>
                            </div>
                            <div class="form-group">
                                <label>下单的用户 ID</label>
                                <input class="form-control" name="order_user_id" type="text" value="<?php echo $order_user_id?>" readonly>
                                <small id="idlHelp" class="form-text text-muted">敏感信息，不可更改。</small>
                            </div>
                            <div class="form-group">
                                <label>创建时间</label>
                                <input type="datetime-local" class="form-control" name="order_create_time" value="<?php echo $order_create_time?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>支付时间</label>
                                <input type="datetime-local" class="form-control" name="order_pay_time" value="<?php echo $order_pay_time?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>关闭时间</label>
                                <input type="datetime-local" class="form-control" name="order_close_time" value="<?php echo $order_close_time?>" readonly>
                            </div>
                            
                        </div>
                        <!-- 右侧 -->
                        <div class="col-sm">
                            <div class="form-group">
                                <label>单品价格</label>
                                <input class="form-control" name="order_price" type="text" value="<?php echo $order_price?>">
                            </div>
                            <div class="form-group">
                                <label>MULTI 总价格</label>
                                <input class="form-control" name="order_multi_price" type="text" value="<?php echo $order_multi_price?>">
                            </div>
                            <div class="form-group">
                                    <label>订单状态</label>
                                    <select class="form-control" name="order_status">
                                        <?php
                                            if($order_status == 0)
                                            {
                                        ?>
                                                <option value = 0 selected>等待检票</option>
                                                <option value = 1 >已入场</option>
                                                <option value = 2 >待付款</option>
                                                <option value = 3 >退款中</option>
                                                <option value = 4 >已退款</option>
                                        <?php
                                            }else if($order_status == 1){
                                        ?>
                                                <option value = 0 >等待检票</option>
                                                <option value = 1 selected>已入场</option>
                                                <option value = 2 >待付款</option>
                                                <option value = 3 >退款中</option>
                                                <option value = 4 >已退款</option>
                                        <?php
                                            }else if($order_status == 2){
                                        ?>
                                                <option value = 0 >等待检票</option>
                                                <option value = 1 >已入场</option>
                                                <option value = 2 selected>待付款</option>
                                                <option value = 3 >退款中</option>
                                                <option value = 4 >已退款</option>
                                        <?php
                                            }else if($order_status == 3){
                                        ?>
                                                <option value = 0 >等待检票</option>
                                                <option value = 1 >已入场</option>
                                                <option value = 2 >待付款</option>
                                                <option value = 3 selected>退款中</option>
                                                <option value = 4 >已退款</option>
                                        <?php
                                            }else if($order_status == 4){
                                        ?>
                                                <option value = 0 >等待检票</option>
                                                <option value = 1 >已入场</option>
                                                <option value = 2 >待付款</option>
                                                <option value = 3 >退款中</option>
                                                <option value = 4 selected>已退款</option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                            </div>
                        </div>
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
