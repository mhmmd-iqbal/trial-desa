<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Informasi Umum</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="#">Informasi Umum</a></li>
            <li class="breadcrumb-item active">Data</a></li>
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
        <div class="col-lg-12">
          <div class="card card-primary">
            <div class="card-header">
              <h4 class="">Add New Post</h4>
            </div>
            <div class="card-body">
              <form action="" method="POST" id="submit-form" enctype="multipart/form-data">
              <div class="row"> 
                <div class="col-lg-12">
                  <div class="row form-group">
                    <div class="col-lg-2"><label for="">User</label></div>
                    <div class="col-lg-6"><input type="text" name="user" readonly="true" class="form-control" value="<?=$this->session->userdata('username')?>"></div>
                  </div>
                  <div class="row form-group">
                    <div class="col-lg-2"><label for="">Judul</label></div>
                    <div class="col-lg-10"><input type="text" name="judul" class="form-control"></div>
                  </div>
                  <div class="row form-group">
                    <div class="col-lg-2"><label for="">kategori</label></div>
                    <div class="col-lg-6">
                      <select name="idKategori" id="idKategori" class="select-plugin"></select>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-lg-2">
                      <label for="">Upload Photo</label>
                    </div>
                    <div class="col-lg-10 ">
                      <div class="custom-file pb-5">
                          <input 
                            type="file" 
                            id="inputFile" 
                            class="imgFile custom-file-input" 
                            aria-describedby="inputGroupFileAddon01"
                            accept="image/*"
                            name="gambar" >
                          <input type="hidden" id="site_url" value="<?=site_url()?>">
                          <input type="hidden" id="base_url" value="<?=base_url()?>">
                          <label class="custom-file-label" for="inputFile">Choose file</label>
                      </div>
                      <div class="imgWrap mb-1">
                          <img 
                            src="<?=base_url()?>assets/logo/no_image.png" 
                            id="imgView" 
                            style="max-height: 300px; width: auto;"
                            class="card-img-top img-fluid" />
                      </div>
                      <div class="text text-danger">
                        <p> Ukuran gambar maksimal 500KB</p>
                        <p id="show-alert"></p>
                      </div>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-lg-2"><label for="">Artikel</label></div>
                    <div class="col-lg-10">
                      <textarea name="konten" class="textarea" id="" cols="30" rows="10"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <button class="btn btn-primary" id="simpan" >Create Post</button>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

