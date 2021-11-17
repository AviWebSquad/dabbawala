<?php
include 'include/header.php';
?>
<div class="content-wrapper">
  
  <!-- Main content -->
  <section class="content">

<div class="hold-transition login-page" >
<div class="login-box">
  <?php
  include 'include/alert.php';
  ?>
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="https://aviwebsquad.com" class="h1"><b>Spiciezz</b>User</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign up to become a member</p>

      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
      <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="First Name" name='fname' required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Last Name" name='lname' required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name='email' required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number" class="form-control" placeholder="Phone no" name='phno' required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone-alt"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name='password' required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name='sign'>Sign Up</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-1">
        <a id="custom-tabs-four-profile-tab1" data-toggle="pill" href="#custom-tabs-four-profile1" role="tab" aria-controls="custom-tabs-four-profile1" aria-selected="false">Already have an account?</a>
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