<?php
    include "../function/web/authorization.php";
    include "../function/pub/conn.php";
    include "../component/bootstrap.php";
    $show_id = isset($_GET["show_id"]) ? $_GET["show_id"] : null;

    //如果直接访问，那么后退。
    if($show_id == null)
    {
        echo "<script>alert('请先选择演出。'); window.history.back();</script>";
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
  <title>演出信息修改-KPS</title>
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
                <a>管理员 <?php echo $admin_name;?>，您可以在本页面修改该演出的信息。</a></br>
                <a>要登出系统，请返回仪表盘。</a></br>
            </div>
            <?php
                //找人
                $sql="select * from show_item WHERE show_id = $show_id";
                $rs=mysqli_query($conn,$sql);
                if(mysqli_num_rows($rs)){
                $row=mysqli_fetch_array($rs);
                //将原本演出信息放入变量，方便嵌套
                $show_name=$row["show_name"];
                $show_foreign_name=$row["show_foreign_name"];
                $show_cast=$row["show_cast"];
                $show_city=$row["show_city"];
                $show_place=$row["show_place"];
                $show_abstract=$row["show_abstract"];
                $show_detail=$row["show_detail"];
                $show_issuing_company=$row["show_issuing_company"];
                $show_poster_horizontal=$row["show_poster_horizontal"];
                $show_poster_vertical=$row["show_poster_vertical"];

                if($is_service != 0)//如果不是管理员
                    echo "<script>alert('您没有管理用户的权限。'); window.history.back();</script>";
            ?>
            <div class="workspace">
                <h1><?php echo "$show_cast"?> 的演出信息</h1></br>
                <div class="container">
                    <div class="row">
                        <!-- <div class="col-sm">
                            <button type="button" class="btn btn-info">查看演出的检票实况</button></br>
                        </div> -->
                        <div class="col-sm">
                            
                            <a href="./session_view.php?show_id=<?php echo $show_id;?>">
                                        <input type="button" class="btn btn-info" value="查看演出的场次" >
                            </a>
                        </div>
                    </div>
                </div></br>

                <form class="info" action="show_menage_ok.php" method="POST">
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label>演出 ID</label>
                                <input class="form-control" name="show_id" type="text" value="<?php echo $show_id?>" readonly>
                                <small id="idlHelp" class="form-text text-muted">演出 ID 由系统自动生成，不可更改。</small>
                            </div>

                            <div class="form-group">
                                <label>演出名称</label>
                                <input type="text" class="form-control" name="show_name" value="<?php echo $show_name?>">
                            </div>
                            <div class="form-group">
                                    <label>外文名称</label>
                                    <input type="text" class="form-control" name="show_foreign_name" value='<?php echo $show_foreign_name?>'>
                            </div>
                            <div class="form-group">
                                    <label>卡司</label>
                                    <input type="text" class="form-control" name="show_cast" value='<?php echo $show_cast?>'>
                            </div>
                            
                        </div>
                        <!-- 右侧 -->
                        <div class="col-sm">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label>横版海报</label>
                                            <input type="text" class="form-control" name="show_poster_horizontal" value='<?php echo $show_poster_horizontal?>'>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label>垂直海报</label>
                                            <input type="text" class="form-control" name="show_poster_vertical" value='<?php echo $show_poster_vertical?>'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label>发行公司</label>
                                    <input type="text" class="form-control" name="show_issuing_company" value='<?php echo $show_issuing_company?>'>
                            </div>
                            <div class="form-group">
                                    <label>城市</label>
                                    <input type="text" class="form-control" name="show_city" value='<?php echo $show_city?>'>
                            </div>
                            <div class="form-group">
                                    <label>地点</label>
                                    <input type="text" class="form-control" name="show_place" value='<?php echo $show_place?>'>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>概要提示</label>
                        <textarea type="text" class="form-control" name="show_abstract" rows="2"><?php echo $show_abstract?></textarea>
                    </div>
                    <div class="form-group">
                        <label>详细信息</label>
                        <textarea type="text" class="form-control" name="show_detail" rows="10"><?php echo $show_detail?></textarea>
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
