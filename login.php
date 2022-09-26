<?php
  session_start();
  error_reporting(0);
  include 'function/connect.php';
  
  date_default_timezone_set('Asia/Jakarta');

  if($_SESSION['akses']=="Admin"){
    header("location:admin.php");
  }else if ($_SESSION['akses']=="Pegawai") {
    header("Location:pegawai.php");
  }
?> 
<!DOCTYPE html>
<html>
<head>
  <title>Login | Aplikasi Penggajian</title>
  <link href="css_login/assets/css/login.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="css_login/assets/js/a81368914c.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-lava.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

  <div class="container">
 
    <div class="img">
      <img src="assets/images/4.png">
    </div>
    <div class="login-content">
      <form class="user" method="POST" action="function/login_act.php">
        <img src="css_login/assets/img/avatar.svg">
        <h2 class="title"><font size="5">Absensi Karyawan</font></h2>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Username <div class="text-small text-danger"> </div></h5>
                    <input type="text" class="input" name="username">
                 </div>
              </div>
              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Password <div class="text-small text-danger"> </div></h5>
                    <input type="password" class="input" name="password">
                 </div>
              </div>
              <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="css_login/assets/js/main.js"></script>
</body>
</html>
