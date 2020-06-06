<?php
  if(($_SERVER['HTTP_HOST'] == 'localhost')||($_SERVER['HTTP_HOST'] == '192.168.0.0')){
    $url_akses = "/edesa/wps/assets/upload/post/";
  }else{
    $url_akses = "/wps/assets/upload/post/";
  }
?>
<section class="ftco-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="heading-section ftco-animate">
          <h2>
            <?=$konten->judul ?>
          </h2>
          <div class="row" style="font-size: 14px">
            <div class="col-lg-2">Created At</div>
            <div class="col-lg-10">
              <?=date('d-m-Y h:i:s', strtotime($konten->created_at))?> Posted By <?=$konten->user?>
            </div> 
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-lg-12 pb-2">
            <?php $url = $konten->gambar != null ? (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]".$url_akses.$konten->gambar : base_url('assets/upload/no_image.png') ; ?>
            <img src="<?=$url?>" alt="" style="width: 100%;">
          </div>
          <div class="col-lg-12">
            <div class="text bg-white p-4">
              <?=$konten->konten ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="heading-section ftco-animate">
          <h2>Recent Post</h2>
        </div>
        <div class="row ftco-animate">
          <div class="col-lg-12">
            <div class="">
              <div class="card-body">
                  <?php foreach ($recent as $d): ?>
                  <div class="blog-entry">
                    <?php $url = $d->gambar != null ? (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]".$url_akses.$d->gambar : base_url('assets/upload/no_image.png') ; ?>
                    <a href="<?=site_url('berita/').$d->url?>" class="block-20 d-flex align-items-end" style="background-image: url('<?=$url?>');">
                      <div class="meta-date text-center p-2">
                        <span class="day"><?=date('d', strtotime($d->created_at))?></span>
                        <span class="mos"><?=date('M', strtotime($d->created_at))?></span>
                        <span class="yr"><?=date('Y', strtotime($d->created_at))?></span>
                      </div>
                    </a>
                    <div class="text bg-white p-2">
                      <h3 class="heading"><a href="<?=site_url('berita/').$d->url?>"><?=$d->judul?></a></h3>
                      <div class="d-flex align-items-center mt-4">
                        <!-- <p class="mb-0"><a href="<?=site_url('berita/').$d->url?>" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p> -->
                        <p class="ml-auto mb-0">
                          Posted By <a href="#" class="mr-2"><?=$d->user?></a>
                        </p>
                      </div>
                    </div>
                  </div>
                  <?php endforeach ?>  
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
</section>