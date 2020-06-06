<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?=$konten['judul']?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="#">Informasi Umum</a></li>
            <li class="breadcrumb-item active">Konten Post</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row pb-2">
        <div class="col-lg-12">
          <!-- <a class="btn btn-primary" href="add"> Add New Post</a> -->
          <!-- <a class="btn btn-primary" href="list"><i class="fa fa-list"></i> List Category</a> -->
        </div>
      </div>
      <div class="row">
        <?php if($konten['gambar'] != null): ?>
        <div class="col-lg-12 text-center">
          <img 
            style = "max-height: 300px; border: 1px solid black"
            src   = "<?=base_url()?>assets/upload/post/<?=$konten['gambar']?>"
          >
        </div>
        <?php endif; ?>
        <div class="col-lg-12">
          <div class="row" style="font-size: 14px">
            <div class="col-lg-2">
              <label for="">Created At</label>
            </div>
            <div class="col-lg-9">
              <?=date('d-m-Y h:i:s', strtotime($konten['created_at']))?> By <?=$konten['user']?>
            </div>
            <div class="col-lg-2">
              <label for="">Last Updated</label>
            </div>
            <div class="col-lg-9">
              <?=date('d-m-Y h:i:s', strtotime($konten['updated_at']))?> By <?=$konten['updated_by']?>
            </div>
          </div>
        </div>
        <div class="col-lg-12 pt-2">
          <div class="card">
            <div class="card-body">
              <?=$konten['konten']?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

