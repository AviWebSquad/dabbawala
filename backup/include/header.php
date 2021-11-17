<?php
include 'engine.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spicizz</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
   <!-- Select2 -->
   <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php">
    <img class="img-circle" src="admin/image/symbol.svg" height="45" width="45"/>
</a>  
  </li>
      
     
    </ul>

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
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-shopping-cart"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-warning" href="./kitchen/index.php" role="button" style="border-radius:20px;">
          <i class="fas fa-utensils"></i> Become Spicier
        </a>
      </li>
  <!-- Notifications Dropdown Menu -->
  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="./admin/image/user.jpg" class="img-circle" height="40" width="40"/>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <?php
          if(isset($_SESSION['newBuyerLogin']) && $_SESSION['newBuyerLogin']!=''){
            ?>
<div class="dropdown-divider"></div>
          <a href="index.php" class="dropdown-item">
            <i class="fas fa-home"></i> Home
          </a>
          <div class="dropdown-divider"></div>
          <a href="order.php" class="dropdown-item">
            <i class="fas fa-bars"></i> Order
          </a>
          <div class="dropdown-divider"></div>
          <a href="wallet.php" class="dropdown-item">
            <i class="fas fa-wallet"></i> Wallet
          </a>
          <div class="dropdown-divider"></div>
          <a href="account.php" class="dropdown-item">
            <i class="fas fa-user"></i> My Account
          </a>
          <div class="dropdown-divider"></div>
          <a href="bookmark.php" class="dropdown-item">
            <i class="fas fa-bookmark"></i> Bookmark
          </a>
          <div class="dropdown-divider"></div>
          <a href="support.php" class="dropdown-item">
            <i class="fas fa-phone-alt"></i> Support
          </a>
          <div class="dropdown-divider"></div>
          <a href="setting.php" class="dropdown-item">
            <i class="fas fa-cogs"></i> Settings
          </a>
         
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item">
            <i class="fas fa-sign-out-alt"></i> Sign out
          </a>
            <?php
 
          }else{
            ?>

<div class="dropdown-divider"></div>
          <a href="login.php" class="dropdown-item">
            <i class="fas fa-sign-in-alt"></i> Sign in
          </a>
          <div class="dropdown-divider"></div>
          <a href="register.php" class="dropdown-item">
            <i class="fas fa-registered"></i> Sign up
          </a>
<?php
          }
          ?>
          <div class="dropdown-divider"></div>
          <a href="./kitchen/index.php" class="dropdown-item">
            <i class="fas fa-dollar-sign"></i> Become Spicer
          </a>
         
          </div>
      </li>

      
    </ul>
  </nav>
  <!-- /.navbar -->