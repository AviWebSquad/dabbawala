<?php
include 'include/header.php';
?>
<div class="content-wrapper">
  
  <!-- Main content -->
  <section class="content">
  <div class="hold-transition login-page" >
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="https://aviwebsquad.com" class="h1"><b>Spicizz</b>User</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="email" name='Email' value="<?php echo (isset($_COOKIE['email'])) ? $_COOKIE['email'] :''; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name='Password' value="<?php echo (isset($_COOKIE['password'])) ? $_COOKIE['password'] :''; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name='rem'>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name='login'>Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.php">I forgot my password</a>
      </p>
      <p class="mb-1">
        <a id="custom-tabs-four-profile-tab2" data-toggle="pill" href="#custom-tabs-four-profile2" role="tab" aria-controls="custom-tabs-four-profile2" aria-selected="false">Don't have account?</a>
      </p>
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
</div>
  </section>
</div>
<?php
include 'include/footer.php';
?>