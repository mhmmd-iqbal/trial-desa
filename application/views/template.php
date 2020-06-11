<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?=$tittle ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?=base_url()?>assets/template/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/template/css/animate.css">
    
    <link rel="stylesheet" href="<?=base_url()?>assets/template/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/template/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/template/css/magnific-popup.css">

    <link rel="stylesheet" href="<?=base_url()?>assets/template/css/aos.css">

    <link rel="stylesheet" href="<?=base_url()?>assets/template/css/ionicons.min.css">
    
    <link rel="stylesheet" href="<?=base_url()?>assets/template/css/flaticon.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/template/css/icomoon.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/template/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
      
      hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
      }
      .gambar
      {
        /*max-width: 400px;*/
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
  </head>
  <body>
    <div class="bg-top navbar-light">
      <div class="container">
        <div class="row no-gutters d-flex align-items-center align-items-stretch">
          <div class="col-md-4 d-flex align-items-center py-4">
            <a class="navbar-brand" href="index.html"> 
              SINAR DESA
            </a>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container d-flex align-items-center px-4">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav mr-auto">
            <li 
              class="nav-item <?=$active == 'dashboard' ? 'active': ''?>" 
              id="dashboard"><a href="<?=base_url()?>" class="nav-link pl-0">Beranda</a></li>
            <li class="nav-item" id="about"><a href="about.html" class="nav-link">Tentang Desa</a></li>
            <li class="nav-item <?=$active == 'berita' ? 'active': ''?>" id="berita"><a href="services.html" class="nav-link">Berita</a></li>
            <li class="nav-item" id="dokumentasi"><a href="project.html" class="nav-link">Dokumentasi</a></li>
            <li class="nav-item" id="dokumentasi"><a href="project.html" class="nav-link">Inventaris</a></li>
            <li class="nav-item <?=$active == 'surat' ? 'active': ''?>" id="surat"><a href="<?=base_url('surat')?>" class="nav-link">Permohonan Surat</a></li>
            <li class="nav-item" id="contact"><a href="contact.html" class="nav-link">Regulasi & Informasi</a></li>
          </ul>
        </div>
      </div>
    </nav>


    <?php $this->load->view($view); ?>
    
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> June 27, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-5 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> June 27, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Services</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Projects</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Subscribe Us!</h2>
              <form action="#" class="subscribe-form">
                <div class="form-group">
                  <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="form-control submit px-3">
                </div>
              </form>
            </div>
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2 mb-0">Connect With Us</h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?=base_url()?>assets/template/js/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/template/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?=base_url()?>assets/template/js/popper.min.js"></script>
  <script src="<?=base_url()?>assets/template/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/template/js/jquery.easing.1.3.js"></script>
  <script src="<?=base_url()?>assets/template/js/jquery.waypoints.min.js"></script>
  <script src="<?=base_url()?>assets/template/js/jquery.stellar.min.js"></script>
  <script src="<?=base_url()?>assets/template/js/owl.carousel.min.js"></script>
  <script src="<?=base_url()?>assets/template/js/jquery.magnific-popup.min.js"></script>
  <script src="<?=base_url()?>assets/template/js/aos.js"></script>
  <script src="<?=base_url()?>assets/template/js/jquery.animateNumber.min.js"></script>
  <script src="<?=base_url()?>assets/template/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?=base_url()?>assets/template/js/google-map.js"></script>
  <script src="<?=base_url()?>assets/template/js/main.js"></script>
  <script>
      const baseurl = "<?php print base_url(); ?>";
      const siteurl = "<?php print site_url(); ?>";
  </script>
  <?php $this->load->view($aksi) ?>
  <script>
    var active  = '<?=$active?>'
    // var halaman = document.getElementById(active);
    // halaman.classList.add("active");
  </script>
  </body>
</html>