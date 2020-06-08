
<?php $akses = $this->session->userdata('list_akses'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?=$tittle?></title>
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=site_url()?>assets/font-awesome/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="<?=site_url()?>assets/plugins/fontawesome-free/css/all.min.css"> -->

  <!-- IonIcons -->
  <!-- <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=site_url()?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?=site_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/toaster/jquery.toast.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/confirm-button/jquery-confirm.min.css">
  <link href="<?=base_url('assets/datatables/css/jquery.dataTables.min.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/datatables/responsive/css/responsive.dataTables.min.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/select2/select2.min.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/select2/select2-bootstrap.min.css')?>" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/summernote/summernote-bs4.css">

  <style type="text/css">
    .gambar
    {
      max-width: 400px;
      /*width: 400px;*/
      height: auto;
      float: none;
      margin-right: auto;
      margin-left: auto;
      margin-bottom: none;
    }
    .gambar img
    {
      object-fit: cover;
      width: 100%;
    }
    .loader {
      border: 10px solid #f3f3f3; /* Light grey */
      border-top: 10px solid #3498db; /* Blue */
      border-radius: 50%;
      width: 50px;
      height: 50px;
      animation: spin 2s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
  <style type="text/css">
      .container{
        margin-top: 20px;
      }
  </style>
  <style type="text/css">
      #imgView{  
        padding:5px;
    }
    .loadAnimate{
        animation:setAnimate ease 2.5s infinite;
    }
    @keyframes setAnimate{
        0%  {color: #000;}     
        50% {color: transparent;}
        99% {color: transparent;}
        100%{color: #000;}
    }
    .custom-file-label{
        cursor:pointer;
    }
  </style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?=site_url()?>assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="fa fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?=site_url()?>assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="fa fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?=site_url()?>assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="fa fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="<?=site_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light">EDESA Prototype</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=site_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info"> 
          <a href="#" class="d-block"><?=$this->session->userdata('username') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=base_url()?>" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <!-- NEW MENU -->
          <?php if($akses['admin'] != '1') : ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-gears"></i>
              <p>
                Admin
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item " >
                <a href="<?=site_url()?>Admin" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Data Admin</p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="<?=site_url()?>Admin/kategori" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Kategori Hak Akses</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <?php if($akses['struktural'] != '1') : ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-bank"></i>
              <p>
                Struktural
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" >
                <a href="<?=site_url()?>Struktural" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Data Penjabat Desa</p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="<?=site_url()?>Struktural/jabatan" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Kategori Jabatan</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <?php if($akses['kependudukan'] != '1') : ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-line-chart"></i>
              <p>
                Kependudukan
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" >
                <a href="<?=site_url()?>Penduduk/dusun" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Data Dusun</p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="<?=site_url()?>Penduduk/profesi" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Kategori Profesi</p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="<?=site_url()?>Penduduk" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Data Masyarakat</p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="<?=site_url()?>Penduduk/kk" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Data KK</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <?php if($akses['profile'] != '1') : ?>
          <li class="nav-item">
            <a href="<?=site_url('ProfileDesa')?>" class="nav-link">
              <i class="nav-icon fa fa-bell-o"></i>
              <p>
                Profil Desa
              </p>
            </a>
          </li>
          <?php endif; ?>
          <?php if($akses['administrasi'] != '1') : ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-folder-open-o"></i>
              <p>
                Layanan Surat
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" >
                <a href="<?=site_url()?>LayananSurat/kop_surat" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Korp Surat</p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="<?=site_url()?>LayananSurat" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Data Surat</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <?php if($akses['verifikasi'] != '1') : ?>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fa fa-pencil-square-o"></i>
              <p>
                Verifikasi Surat
              </p>
              <span class="right badge badge-danger">12 New</span>
            </a>
          </li>
          <?php endif; ?>
          <?php if($akses['informasi'] != '1') : ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-image"></i>
              <p>
                Informasi Desa
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" >
                <a href="<?=site_url()?>InformasiUmum" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Berita</p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="<?=site_url()?>InformasiUmum" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Galeri</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <?php if($akses['opendata'] != '1') : ?>
          <li class="nav-item">
            <a href="<?=base_url()?>OpenData" class="nav-link">
              <i class="nav-icon fa fa-file-pdf-o"></i>
              <p>
                Open Data
              </p>
            </a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                My Profile
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=site_url()?>Login/logout" class="nav-link">
              <i class="nav-icon fa fa-power-off text-danger"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          <!-- OLD MENU -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <?php  $this->load->view($view) ?>
  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?=base_url()?>assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?=base_url()?>assets/plugins/chart.js/Chart.min.js"></script>
<script src="<?=base_url()?>assets/sweetalert/sweetalert.min.js"></script>
<script src="<?=base_url()?>assets/toaster/jquery.toast.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="<?=base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<!-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->
<script src="<?=base_url('assets/datatables/responsive/js/dataTables.responsive.min.js')?>"></script>
<script src="<?=base_url()?>assets/plugins/summernote/summernote-bs4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script type="text/javascript">  
  const baseurl = "<?php print base_url(); ?>";
  const siteurl = "<?php print site_url(); ?>";
  
  function notif(title, text, icon) {
    swal({ 
      title: title,
      text: text,
      icon: icon,
      buttons: false,
      timer: 1500,
    });
  }

  function loading(){
    swal({
      title: "Memeriksa...",
      text : "Sedang diproses. Harap menunggu...",
      icon : baseurl+"assets/sweetalert/loader.gif",
      button: false,
   });
  }
  
  function toaster(head, text, icon){
    $.toast({
      text: text, // Text that is to be shown in the toast
      heading: head, // Optional heading to be shown on the toast
      icon: icon, // Type of toast icon
      showHideTransition: 'plain', // fade, slide or plain
      allowToastClose: true, // Boolean value true or false
      hideAfter: 4000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
      stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
      position: 'top-right',       
      
      
      textAlign: 'left',  // Text alignment i.e. left, right or center
      loader: false,  // Whether to show loader or not. True by default
      loaderBg: '#9EC600',  // Background color of the toast loader
      beforeShow: function () {}, // will be triggered before the toast is shown
      afterShown: function () {}, // will be triggered after the toat has been shown
      beforeHide: function () {}, // will be triggered before the toast gets hidden
      afterHidden: function () {}  // will be triggered after the toast has been hidden
    });
  }
</script>
<!-- <script type="text/javascript" src="<?=base_url()?>assets/<?=$aksi?>"></script> -->
<?php $this->load->view($script)?>
</body>
</html>
