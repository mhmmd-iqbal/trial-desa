<section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(<?=base_url('assets/template/')?>images/bg_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate">
            <span class="subheading">Selamat Datang di SINAR DESA</span>
            <h1 class="mb-4">Sistem Informasi dan Administrasi Desa</h1>
            <p><a href="#" class="btn btn-primary px-4 py-3 mt-3">Our Services</a></p>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(<?=base_url('assets/template/')?>images/bg_2.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate">
            <span class="subheading">Selamat Datang di SINAR DESA</span>
            <h1 class="mb-4">Sistem Informasi dan Administrasi Desa</h1>
            <p><a href="#" class="btn btn-primary px-4 py-3 mt-3">Our Services</a></p>
          </div>
        </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-5 order-md-last wrap-about align-items-stretch">
            <div class="wrap-about-border ftco-animate">
              <div class="img" style="background-image: url(<?=$back_url."/assets/upload/gambar/".$gambar['gambar']?>); border"></div>
              <div class="text">
                <h3>Kata-Kata Sambutan</h3>
                <p id="show_sambutan">
                  <?=$sambutan['sambutan']?>
                </p>
                <!-- <p><a href="#" class="btn btn-primary py-3 px-4">Contact us</a></p> -->
              </div>
            </div>
          </div>
          <div class="col-md-7 wrap-about pr-md-4 ftco-animate">
            <?php if(isset($logo['logo'])) :?>
              <div class="text-center p-1">
                <img src="<?=$back_url ?>assets/upload/logo/<?=$logo['logo']?>" alt="" style = "max-width: 300px; "> 
              </div>
            <?php endif; ?>
            <h2 class="mb-4">Visi Desa</h2>
            <p id="show_visi">
              <?=$visi['visi']?>
            </p>
            <h2 class="mb-4">Misi Desa</h2>
            <p id="show_misi">
              <?=$misi['misi']?>
            </p>
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">Menu Layanan</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-4 d-flex">
            <div class="services-2 noborder-left text-center ftco-animate">
              <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-analysis"></span></div>
              <div class="text media-body">
                <h3>Business Analysis</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-flex">
            <div class="services-2 text-center ftco-animate">
              <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-business"></span></div>
              <div class="text media-body">
                <h3>Business Consulting</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-flex">
            <div class="services-2 text-center ftco-animate">
              <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-insurance"></span></div>
              <div class="text media-body">
                <h3>Business Insurance</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-flex">
            <div class="services-2 noborder-left noborder-bottom text-center ftco-animate">
              <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-money"></span></div>
              <div class="text media-body">
                <h3>Global Investigation</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-flex">
            <div class="services-2 text-center noborder-bottom ftco-animate">
              <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-rating"></span></div>
              <div class="text media-body">
                <h3>Audit &amp; Evaluation</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-flex">
            <div class="services-2 text-center noborder-bottom ftco-animate">
              <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-search-engine"></span></div>
              <div class="text media-body">
                <h3>Marketing Strategy</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <section class="ftco-intro ftco-no-pb img" style="background-image: url(<?=base_url('assets/template/')?>images/bg_3.jpg);">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-10 text-center heading-section heading-section-white ftco-animate">
            <h2 class="mb-0">Data Kependudukan</h2>
          </div>
        </div>  
      </div>
    </section>

    <section class="ftco-counter" id="section-counter">
      <div class="container">
        <div class="row d-md-flex align-items-center justify-content-center">
          <div class="wrapper">
            <div class="row d-md-flex align-items-center">
              <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                  <div class="icon"><span class="flaticon-doctor"></span></div>
                  <div class="text">
                    <strong class="number" data-number="105">0</strong>
                    <span>Kepala Kelurga</span>
                  </div>
                </div>
              </div>
              <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                  <div class="icon"><span class="flaticon-doctor"></span></div>
                  <div class="text">
                    <strong class="number" data-number="320">0</strong>
                    <span>Penduduk Pria</span>
                  </div>
                </div>
              </div>
              <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                  <div class="icon"><span class="flaticon-doctor"></span></div>
                  <div class="text">
                    <strong class="number" data-number="250">0</strong>
                    <span>Penduduk Wanita</span>
                  </div>
                </div>
              </div>
              <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                  <div class="icon"><span class="flaticon-doctor"></span></div>
                  <div class="text">
                    <strong class="number" data-number="35">0</strong>
                    <span>Years of Experienced</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
<!--     <section class="ftco-intro ftco-no-pb img" style="background-image: url(<?=base_url('assets/template/')?>images/bg_1.jpg);">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-9 col-md-8 d-flex align-items-center heading-section heading-section-white ftco-animate">
            <h2 class="mb-3 mb-md-0">You Always Get the Best Guidance</h2>
          </div>
          <div class="col-lg-3 col-md-4 ftco-animate">
            <p class="mb-0"><a href="#" class="btn btn-white py-3 px-4">Request Quote</a></p>
          </div>
        </div>  
      </div>
    </section>

 -->
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">Berita Terkini</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>
        <div class="row">
        <?php foreach ($konten as $i => $d) { ?>
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <?php $url = $d->gambar != null ? (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."wps/assets/upload/post/".$d->gambar : base_url('assets/upload/no_image.png') ; ?>
              <a href="<?=site_url('berita/').$d->url?>" class="block-20 d-flex align-items-end" style="background-image: url('<?=$url?>');">
                <div class="meta-date text-center p-2">
                  <span class="day"><?=date('d', strtotime($d->created_at))?></span>
                  <span class="mos"><?=date('M', strtotime($d->created_at))?></span>
                  <span class="yr"><?=date('Y', strtotime($d->created_at))?></span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="<?=site_url('berita/').$d->url?>"><?=$d->judul?></a></h3>
                <div class="d-flex align-items-center mt-4">
                  <!-- <p class="mb-0"><a href="<?=site_url('berita/').$d->url?>" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p> -->
                  <p class="ml-auto mb-0">
                    Posted By <a href="#" class="mr-2"><?=$d->user?></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
        <!-- <div class="row">
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('images/image_1.jpg');">
                <div class="meta-date text-center p-2">
                  <span class="day">26</span>
                  <span class="mos">June</span>
                  <span class="yr">2019</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">Finance And Legal Working Streams Occur Throughout</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="d-flex align-items-center mt-4">
                  <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                  <p class="ml-auto mb-0">
                    <a href="#" class="mr-2">Admin</a>
                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('images/image_2.jpg');">
                <div class="meta-date text-center p-2">
                  <span class="day">26</span>
                  <span class="mos">June</span>
                  <span class="yr">2019</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">Finance And Legal Working Streams Occur Throughout</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="d-flex align-items-center mt-4">
                  <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                  <p class="ml-auto mb-0">
                    <a href="#" class="mr-2">Admin</a>
                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('images/image_3.jpg');">
                <div class="meta-date text-center p-2">
                  <span class="day">26</span>
                  <span class="mos">June</span>
                  <span class="yr">2019</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">Finance And Legal Working Streams Occur Throughout</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="d-flex align-items-center mt-4">
                  <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                  <p class="ml-auto mb-0">
                    <a href="#" class="mr-2">Admin</a>
                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div> -->
          <p ><a href="#" class="btn btn-primary py-3 px-4">Lihat Selengkapnya</a></p>
      </div>
    </section>

    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">Aparatur Desa</h2>
            <!-- <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p> -->
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <?php foreach ($perangkat as $d ): ?>
              <div class="item">
                <div class="testimony-wrap d-flex">
                <?php $url = $d->photo != null ? (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."wps/assets/upload/".$d->photo : base_url('assets/upload/no_image.png') ; ?>

                  <div class="user-img" style="background-image: url('<?=$url?>')">
                  </div>
                  <div class="text pl-4">
                    <!-- <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span> -->
                    <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p> -->
                    <p class="name"><?=$d->nama?></p>
                    <p class="small">NIP. <?=$d->nip?></p>
                    <span class="position"><?=$d->jabatan?></span>
                  </div>
                </div>
              </div>
              <?php endforeach ?>

            </div>
          </div>
        </div>
      </div>
    </section>