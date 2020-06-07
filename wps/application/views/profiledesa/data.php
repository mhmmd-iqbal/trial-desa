<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile Desa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Desa</a></li>
              <li class="breadcrumb-item active">Profile Desa</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div role="">
          <!-- Nav tabs -->
              <button 
              	data-value="visimisi" 
              	class="tab btn btn-default mr-1" 
              	aria-controls="visimisi" 
              	role="tab" data-toggle="tab">Visi dan Misi</button>
              <button 
              	data-value="sambutan" 
              	class="tab btn btn-default mr-1" 
              	aria-controls="sambutan" 
              	role="tab" data-toggle="tab">Kata Sambutan Web Desa</button>
              <button 
              	data-value="logo" 
              	class="tab btn btn-default mr-1" 
              	aria-controls="logo" 
              	role="tab" data-toggle="tab">Logo Desa</button>
              <button 
              	data-value="alamat" 
              	class="tab btn btn-default mr-1" 
              	aria-controls="alamat" 
              	role="tab" data-toggle="tab">Alamat Desa</button>
        
          <!-- Tab panes -->
          <div class="mt-2">
            <div class="tab-pane active" id="visimisi">
            	<div class="row">
            		<div class="col-lg-12">
			            <div class="card">
			              <div class="card-body">
			                <div class="row">
			                  <div class="col-lg-12">
			                    <h2>VISI</h2>
			                    <p id="this-visi">Belum ditetapkan...</p>
			                  </div>
			                </div>
			              </div>
			            </div>
			          </div>
			          <div class="col-lg-12">
			          	<div class="card">
			          		<div class="card-body">
			                <div class="row">
			                  <div class="col-lg-12">
			                    <h2>MISI</h2>
			                    <p id="this-misi">Belum ditetapkan...</p>
			                  </div>
			                </div>
			              </div>
			            </div>
			          </div>
            	</div>
            	<div class="row pb-3">
			          <div class="col-lg-12">
			            <button class="btn btn-primary" id="visi-baru">Buat Visi Baru</button>
			            <button class="btn btn-primary" id="misi-baru">Buat Misi Baru</button>
			          </div>
			        </div>
			        <div class="row">
			          <div class="col-lg-6">
			            <div class="card">
			              <div class="card-body">
			                <table class="table" id="table-visi">
			                  <thead>
			                    <tr>
			                      <th>No</th>
			                      <th>Daftar Visi</th>
			                      <th>Status</th>
			                      <th>Aksi</th>
			                    </tr>
			                  </thead>
			                </table>
			              </div>
			            </div>  
			          </div>
			          <div class="col-lg-6">
			            <div class="card">
			              <div class="card-body">
			                <table class="table" id="table-misi">
			                  <thead>
			                    <tr>
			                      <th>No</th>
			                      <th>Daftar Misi</th>
			                      <th>Status</th>
			                      <th>Aksi</th>
			                    </tr>
			                  </thead>
			                </table>
			              </div>
			            </div>
			          </div>
			        </div>
            </div>
            
            <div class="tab-pane" id="sambutan">
            	
            	<div class="row">
			          <div class="col-lg-7">
				          <div class="card card-primary">
				            <div class="card-header">
				              <h5 class="text-center">Kata-Kata Sambutan</h5>
				            </div>
				            <div class="card-body" style="text-align: justify;" id="show_sambutan"></div>
				            <div class="card-footer text-right">
				              <button class="btn btn-info" id="btn-sambutan"><i class="fa fa-gear"></i> Perbarui Kata Sambutan</button>
				            </div>
				          </div>
				        </div>
                <div class="col-md-5">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h5 class="text-center">Gambar Untuk Kata-Kata Sambutan</h5>
                    </div>
                    <div class="card-body text-center" style="text-align: justify;">
                      <img 
                        id="gambar" 
                        style="max-width: 70%;" 
                        src="<?=base_url()?>assets/logo/no_image.png" 
                        alt="">
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-info" id="btn-gambar"><i class="fa fa-gear"></i> Perbarui gambar</button>
                    </div>
                  </div>
                </div>
	            </div>
	          </div>
            
            <div class="tab-pane" id="logo">

              <div class="row">
                <div class="col-md-3">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h5 class="text-center">Actived Logo</h5>
                    </div>
                    <div class="card-body text-center" style="text-align: justify;">
                      <img 
                        id="actived-logo" 
                        style="max-width: 70%;" 
                        src="<?=base_url()?>assets/logo/no_image.png" 
                        alt="">
                    </div>
                  </div>
                </div>
                <div class="col-lg-9">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h5 class="text-center">Daftar Logo Desa</h5>
                    </div>
                    <div class="card-body">
                      <button class="btn btn-primary mb-2" id="btn-logo"><i class="fa fa-gear"></i> Perbarui Logo</button>
                      <table class="table table-bordered" id="table-logo">
                        <thead class="">
                          <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th>Dibuat Pada</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>              
            </div>
            <div class="tab-pane" id="alamat">..3.</div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

<div class="modal fade" id="modal-sambutan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perbarui Kata Sambutan</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <textarea name="" class="form-control" id="sambutan" cols="30" rows="10"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="simpan-sambutan">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-gambar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perbarui Gambar Pada Kata Sambutan</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <form action="#" method="POST" enctype="multipart/form-data" id="upload">
              <div class="custom-file">
                  <input 
                    type="file" 
                    id="inputFile" 
                    class="imgFile custom-file-input" 
                    aria-describedby="inputGroupFileAddon01"
                    accept="image/*"
                    name="gambar" >
                  <label class="custom-file-label" for="inputFile">Choose file</label>
              </div>
              <div class="imgWrap mb-1 text-center">
                  <img 
                    src="<?=base_url()?>assets/logo/no_image.png" 
                    id="imgView" 
                    style="max-height: 300px; width: auto;"
                    class="card-img-top img-fluid" />
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="batal" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="simpan-gambar"><i id="spinner" hidden class="fa fa-spinner fa-spin fa-fw"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal-logo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Logo</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <form action="#" method="POST" enctype="multipart/form-data" id="upload-logo">
              <div class="custom-file">
                  <input 
                    type="file" 
                    id="inputFile2" 
                    class="imgFile custom-file-input" 
                    aria-describedby="inputGroupFileAddon01"
                    accept="image/*"
                    name="logo" >
                  <label class="custom-file-label" for="inputFile">Choose file</label>
              </div>
              <div class="imgWrap mt-1 text-center">
                  <img 
                    src="<?=base_url()?>assets/logo/no_image.png" 
                    id="imgView2" 
                    style="max-height: 300px; width: auto;"
                    class="card-img-top img-fluid" />
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="batal2" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="simpan-logo"><i id="spinner-logo" hidden class="fa fa-spinner fa-spin fa-fw"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-show-logo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="gambar">
          <img src="" alt="logo" id="modal-detail-show-logo">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>