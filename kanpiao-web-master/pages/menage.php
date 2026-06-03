<?php
    include "../function/web/authorization.php";
    include "../function/pub/conn.php";
    include "../component/bootstrap.php";
    $user_id = isset($_GET["user_id"]) ? $_GET["user_id"] : null;
    $openid  = isset($_GET["openid"]) ? $_GET["openid"] : null;
    // open->user_Id
    if($openid)
    {
        $sql="select * from wx_user WHERE openid = '$openid'";
        $rs=mysqli_query($conn,$sql);
        if(mysqli_num_rows($rs))
        $row=mysqli_fetch_array($rs);
        echo $user_id=$row["user_id"];
    }
    //如果直接访问，那么后退。
    if($user_id == null)
    {
        echo "<script>alert('请先选择用户。'); window.history.back();</script>";
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
  <title>用户信息修改-KPS</title>
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
                <a>管理员 <?php echo $admin_name;?>，您可以在本页面修改这位用户的信息。</a></br>
                <a>要登出系统，请返回仪表盘。</a></br>
            </div>
            <?php
                //找人
                $sql="select * from wx_user WHERE user_id = $user_id";
                $rs=mysqli_query($conn,$sql);
                if(mysqli_num_rows($rs)){
                $row=mysqli_fetch_array($rs);
                //将原本用户信息放入变量，方便嵌套
                $openid=$row["openid"];
                $nickname=$row["nickname"];
                $avatarurl=$row["avatarurl"];
                $gender=$row["gender"];
                $country=$row["country"];
                $province=$row["province"];
                $city=$row["city"];
                $language=$row["language"];
                $mobile=$row["mobile"];
                $is_checker=$row["is_checker"];
                $last_login=$row["last_login"];
                $create_time=$row["create_time"];
                $is_banned= $row["is_banned"];
                if($is_service != 0)//如果不是管理员
                    echo "<script>alert('您没有管理用户的权限。'); window.history.back();</script>";
            ?>
            <div class="workspace">
                <h1><?php echo "$nickname"?> 用户的信息</h1></br>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <button type="button" class="btn btn-info">查看该用户的订单信息</button></br>
                        </div>
                        <div class="col-sm">
                            
                            <!-- <a href="./login_view.php?openid=<?php echo $openid;?>">
                                        <input type="button" class="btn btn-info" value="查看该用户的登录信息" >
                            </a> -->
                        </div>
                    </div>
                </div></br>

                <form class="info" action="menage_ok.php" method="POST">
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label>用户 ID</label>
                                <input class="form-control" name="user_id" type="text" value="<?php echo $user_id?>" readonly>
                                <small id="idlHelp" class="form-text text-muted">用户 ID 由系统自动生成，不可更改。</small>
                            </div>
                            <div class="form-group">
                                <label>OpenID</label>
                                <input class="form-control" name="openid" type="text" value="<?php echo $openid?>" readonly>
                                <small id="idlHelp" class="form-text text-muted">Open ID 由微信自动生成，请勿外泄。</small>
                            </div>
                            <div class="form-group">
                                <label>昵称</label>
                                <input type="text" class="form-control" name="nickname" value="<?php echo "$nickname"?>">
                            </div>
                            <div class="form-group">
                                <label>性别</label>
                                    <select class="form-control" name="gender">
                                        <?php
                                            if($gender == 1)
                                            {
                                        ?>
                                                <option value =1 selected>男</option>
                                                <option value =0>女</option>
                                        <?php
                                            }else{
                                        ?>
                                                <option value =1 >男</option>
                                                <option value =0 selected>女</option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label>手机号码</label>
                                    <input type="text" class="form-control" name="mobile" value="<?php echo "$mobile"?>">
                            </div>
                        </div>
                        <!-- 右侧 -->
                        <div class="col-sm">

                            <div class="form-group">
                                <?php
                                    if($avatarurl)
                                        echo "<img class='avatar' style='width: 90px;border-radius:45px' src='".$avatarurl."' alt='用户头像'/>";
                                    else
                                        echo "<img class='avatar' style='width: 90px;border-radius:45px' src='https://s1.ax1x.com/2020/06/10/tTPhHH.png' alt='用户头像'/>";
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">上次登录时间</label>
                                <input class="form-control" type="datetime" name="last_login" value="<?php echo $last_login?>" readonly>
                                <small id="idlHelp" class="form-text text-muted">用户上次登录小程序的时间。</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">创建账号时间</label>
                                <input class="form-control" type="datetime" name="create_time" value="<?php echo $create_time?>" readonly>
                                <small id="idlHelp" class="form-text text-muted">该账号首次登录的时间。</small>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">检票员标识</label>
                                <select class="form-control" name="is_checker">
                                    <?php
                                        if($is_checker == 1)
                                        {
                                    ?>
                                            <option value =1 selected>检票员</option>
                                            <option value =0 >普通用户</option>
                                    <?php
                                        }else{
                                    ?>
                                            <option value =1 >检票员</option>
                                            <option value =0 selected>普通用户</option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">封禁标识</label>
                                <select class="form-control" name="is_banned">
                                    <?php
                                        if($is_banned == 1)
                                        {
                                    ?>
                                            <option value = 0 >未被封禁</option>
                                            <option value = 1 selected>封禁中</option>
                                    <?php
                                        }else{
                                    ?>
                                            <option value = 0 selected>未被封禁</option>
                                            <option value = 1 >封禁中</option>
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
                            echo "<script>alert('用户不存在。'); window.history.back();</script>";
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
