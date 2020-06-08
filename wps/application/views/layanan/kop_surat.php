<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Upload Kop Surat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#">Layanan Surat</a></li>
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
        <div class="row">
          <div class="col-lg-12 mb-2">
            <button class="btn btn-primary mr-1" id="tambah-kop">
              Add New
            </button>
          </div>
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="table">
                    <thead>
                      <tr>
                        <th width="50px">No</th>
                        <th width="700px">Kop Surat</th>
                        <th>Tanggal Upload</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="modal-kop">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kop Surat</h4>
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
                    style="width: 100%; max-height: 200px;"
                    class="card-img-top img-fluid" />
              </div>
            </form>
          </div>
          <div class="col-md-12">
            <div class="alert alert-info">
              <p><b>KETERANGAN: </b>Format Kop Silahkan disimpan Dalam Bentuk Gambar. Sesuaikan hanya ukuran kop saja</p>
            </div>
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