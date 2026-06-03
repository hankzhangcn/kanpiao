<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <!--调试用，防止CSS被缓存-->
  <link rel="stylesheet" href="../component/css/login.css">
  <link rel="icon" href="https://s1.ax1x.com/2020/06/09/t5LIK0.png" type="image/x-icon" />
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
  <script src="https://s3.pstatp.com/cdn/expire-1-M/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://s2.pstatp.com/cdn/expire-1-M/jquery-easing/1.4.1/jquery.easing.js" type="application/javascript">
  </script>
  <title>欢迎使用-看票</title>
</head>

<body>
  <main>
    <div class="loginpad">
      <div class="title">
        <img src="https://s1.ax1x.com/2020/06/09/t5LIK0.png" /><br />
        <a>KPS 看票管理员端</a>
      </div>
      <div class="content">
        <div class="errormsg"></div>
        <form action="../function/web/login_ok.php" method="post">
          <div class="input-field">
            <input name="id" type="text" placeholder="用户名">
          </div>
          <div class="input-field">
            <input name="password" type="password" placeholder="密码">
          </div>
          <div class="input-field">
            <input type="submit" value="登录">
          </div>
        </form>
      </div>
    </div>
  </main>
  <script type="text/javascript" src="/component/js/login.js?param=Math.random()"></script>
</body>

</html>