<div class="pt-4 bg-light">
  <div class="row pb-5">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <div class="text-center">
            <h5>Layanan Mandiri</h5>
          </div>
        </div>
        <div class="card-body">
          <div class="container">
            <div class="row">
              <div class="col-md-5">
                <input  type="text" class="form-control" placeholder="Input NIK...">
              </div>
              <div class="col-md-5">
                <input  type="text" class="form-control" placeholder="Input PIN...">
              </div>
              <div class="col-md-2">
                <button class="btn btn-primary">
                  Masukkan Data
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container pb-2">
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
</div>