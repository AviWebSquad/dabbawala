
<footer class="d-lg-none main-footer btn-group" style="padding: 0px;">
<a href="#" class="btn btn-default bg-white glow" ><i class="fa fa-tasks" style="color: #ff8007 !important; padding-top:13px;"></i></a>
<a href="#" class="btn btn-default bg-white glow" ><i class="fa fa-bars" style="color: #ff8007 !important; padding-top:13px;"></i></a>
<li class="nav-item dropdown btn btn-default bg-white">
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
      
</footer>
<!-- /.content-wrapper -->
<footer class="d-none d-lg-block main-footer">

    <strong>Copyright &copy; 2021 <a href="https://myclevergeeks.com">Spicizz</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> Beta
    </div>
  </footer>
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- BS-Stepper -->
<script src="../admin/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
  // BS-Stepper Init
  $("#acpt").click(function() {
  $("#go").attr("disabled", !this.checked);
});
</script>
<!-- Bootstrap 4 -->
<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../admin/plugins/moment/moment.min.js"></script>
<script src="../admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../admin/dist/js/pages/dashboard.js"></script>
</body>
</html>
