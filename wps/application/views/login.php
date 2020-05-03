<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-DESA | JABATAN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/toaster/jquery.toast.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url()?>assets/index2.html"><b>E-Desa</b>TRIAL</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body" style="border-radius: 10px">
      <p class="login-box-msg">Silahkan Login Untuk Melanjutkan</p>

      <form action="" method="post" id="submit-login">
        <div class="input-group mb-3">
          <input 
            type="text" 
            class="form-control" 
            id="username" 
            placeholder="Username..."
            autocomplete="off" 
          >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input 
            type="password" 
            class="form-control" 
            id="password" 
            placeholder="Password..."
            autocomplete="off" 
          >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
<!-- 
      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

<!--       <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<script src="<?=site_url()?>assets/sweetalert/sweetalert.min.js"></script>
<script src="<?=base_url()?>assets/toaster/jquery.toast.min.js"></script>

</body>
</html>

<script type="text/javascript">
  const siteurl = "<?php print site_url(); ?>";
  function toaster(head, text, icon){
    $.toast({
      text: text, // Text that is to be shown in the toast
      heading: head, // Optional heading to be shown on the toast
      icon: icon, // Type of toast icon
      showHideTransition: 'fade', // fade, slide or plain
      allowToastClose: true, // Boolean value true or false
      hideAfter: 4000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
      stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
      position: 'top-center',       
      
      
      textAlign: 'left',  // Text alignment i.e. left, right or center
      loader: false,  // Whether to show loader or not. True by default
      loaderBg: '#9EC600',  // Background color of the toast loader
      beforeShow: function () {}, // will be triggered before the toast is shown
      afterShown: function () {}, // will be triggered after the toat has been shown
      beforeHide: function () {}, // will be triggered before the toast gets hidden
      afterHidden: function () {}  // will be triggered after the toast has been hidden
    });
  }
  
  <?php if($this->session->flashdata('error') != NULL): ?>
  toaster('PERHATIAN', "Harap Login Terlebih Dahulu", "error")  
  <?php endif; ?>

  $('#submit-login').on('submit', function(event) {
    event.preventDefault();
    let username = $('#username').val()
    let password = $('#password').val()
    $.ajax({
      url: siteurl+'index.php/api/ApiLogin/login',
      type: 'post',
      dataType: 'JSON',
      data: {username: username, password: password},
      success: function(res){
        if(res.login === true){
          window.location.href = siteurl+'Welcome'
        }else{
          swal({ 
            title: "Gagal Login" ,
            text: "Username dan Password Salah",
            icon: "warning",
            buttons: false,
            timer: 1500,
          });
        }
      }
    })
  }); 
</script>