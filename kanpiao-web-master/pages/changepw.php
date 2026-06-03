<?php
include "../function/web/authorization.php";
include "../function/pub/conn.php";
include "../component/bootstrap.php";

?>


<!-------html------->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="\component\css\common.css">

  <!--调试用，防止CSS被缓存-->
  <link rel="icon" href="https://s1.ax1x.com/2020/06/09/t5LIK0.png" type="image/x-icon" />
  <title>修改密码-KPS</title>
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
                <a>管理员 <?php echo $admin_name;?>，您可以在本页面修改您的登录密码。</a></br>
                <a>要登出系统，请返回仪表盘。</a></br>
            </div>
            <div class="workspace">
                <h1>修改密码</h1>
                <form id="myForm" action="changepw_ok.php" method="post">
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label>您的 ID</label>
                                <input class="form-control" name="admin_id" type="text" value="<?php echo $_SESSION['admin_id']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>新密码</label>
                                <input class="form-control" id="Pw" name="Pw" type="password" value="" required/>
                            </div>
                            <div class="form-group">
                                <label>再次输入您的新密码</label>
                                <input class="form-control" id="Repw" name="Repw" type="password" value="" required/>
                            </div>
                            <span id="divPw"></span></br>
                            <span id="divRepw"></span></br>
                        </div>
                        <div class="col-sm">

                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary"/>
                </form>
            </div>

            <div class="bottom">
                <h1>版权信息</h1></br></br>
                <a>© <?php echo date("Y");?> Hank.</a></br>
                <a>All Rights Reserved.</a></br>
                <a>Powered by PHP on PHPSTUDY</a>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="\component\js\formcheck.js"></script>
</body>
</html>


