<section class="ftco-section bg-light">
  <div class="container">
    <div class="row">
      <?php foreach ($surats as $i => $data) : ?>
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="blog-entry">
          <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('<?=base_url()?>assets/template/images/image_1.jpg');"></a>
          <div class="text bg-white p-4">
            <h3 class="heading text-center"><a href="#"><?=strtoupper($data->nmSurat) ?></a></h3>
            <hr>
            <div class="d-flex align-items-center mt-4">
              <p class="mb-0 small">
                Dibuat: <?=date('d-m-Y', strtotime($data->createdAt)) ?>
              </p>
              <p class="ml-auto mb-0">
                <a href="#" class="btn btn-primary">Proses Surat</a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
    <!-- <div class="row">
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="blog-entry">
          <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('<?=base_url()?>assets/template/images/image_1.jpg');">
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
          <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('<?=base_url()?>assets/template/images/image_2.jpg');">
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
          <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('<?=base_url()?>assets/template/images/image_3.jpg');">
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
          <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('<?=base_url()?>assets/template/images/image_4.jpg');">
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
          <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('<?=base_url()?>assets/template/images/image_5.jpg');">
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
          <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('<?=base_url()?>assets/template/images/image_6.jpg');">
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
    <div class="row mt-5">
      <div class="col text-center">
        <div class="block-27">
          <ul>
            <!-- <li><a href="#">&lt;</a></li> -->
            <?php 
              if($pagination < 6){
                $start = 1;
              }else{
                $start = $pagination - 5;
              }
              for ($i=$start; $i <= $pagination ; $i++) : 
            ?>
            <li class="<?=$p == $i ? 'active' : '' ?>"><a href="" class="pagination" data-target="<?=$i?>"><?=$i?></a></li>
            <?php 
              endfor; 
            ?>
            <!-- <li><a href="#">&gt;</a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>