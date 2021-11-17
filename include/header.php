<?php
include 'action.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spicizz | <?php echo $title; ?></title>
    <meta name="description" content="<?php echo $description; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="admin/image/logo.svg" />
  
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="admin/plugins/summernote/summernote-bs4.min.css">
  
   
  <style type="text/css">
    .glow{
      color: #ff8007;
  text-shadow: 0 0 3px #ff8007;
    }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-top-nav layout-footer-fixed">
<div class="wrapper">

  <!-- 
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
-->
  <!-- Navbar -->
  <?php
  if($page!="Login" && $page!="Register"){

  ?>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <img src="./admin/image/icon.svg" class="img-circle" height="50px" width="50px"/>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link btn btn-warning" style="border-radius: 10px;" ><i class="fas fa-utensils"></i> Become Spicer</a>
  </li>
      <li class="nav-item dropdown d-none d-lg-block">
        <a class="nav-link glow" data-toggle="dropdown" href="#" style="color: #ff8007 !important;padding 9px;">
          <i class="far fa-user" ></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php
          if(isset($_SESSION['newBuyerLogin']) && $_SESSION['newBuyerLogin']!=''){
            ?>

          
        <a href="account.php" class="dropdown-item">
            <i class="fas fa-user"></i> My Account
          </a>
          <div class="dropdown-divider"></div>
          <a href="wallet.php" class="dropdown-item">
            <i class="fas fa-dollar-sign"></i> Wallet
          </a>
          <div class="dropdown-divider"></div>
          <a href="myorder.php" class="dropdown-item">
            <i class="fas fa-tasks"></i> My Orders
          </a>
          <div class="dropdown-divider"></div>
          <a href="support.php" class="dropdown-item">
            <i class="fas fa-phone-alt"></i> Support
          </a>
          <div class="dropdown-divider"></div>
          <a href="setting.php" class="dropdown-item">
            <i class="fas fa-cogs"></i> Setting
          </a>
         
          <div class="dropdown-divider"></div>
          <a href="message.php" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Messages
          </a>
          <div class="dropdown-divider"></div>
          <a href="ask.php" class="dropdown-item">
            <i class="fas fa-hamburger"></i> Ask for dish
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
          <?php
          }else{
            ?>
             <div class="dropdown-divider"></div>
          <a href="about.php" class="dropdown-item">
            <i class="fas fa-question"></i> How it works
          </a>
 <div class="dropdown-divider"></div>
          <a href="login.php" class="dropdown-item">
            <i class="fas fa-sign-in-alt"></i> Log in
          </a>
          <div class="dropdown-divider"></div>
          <a href="register.php" class="dropdown-item">
            <i class="far fa-registered"></i> Register
          </a>
            <?php
          }
          ?>
         
        
      </div>
      </li>

     
    </ul>
  </nav>
  <?php
}
?>
  <!-- /.navbar -->
