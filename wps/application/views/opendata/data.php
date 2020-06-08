<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Open Data Untuk Publik</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="#">Open Data</a></li>
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
        <div class="col-lg-12">
          <div class="alert alert-info">
            <b><i class="fa fa-info"></i> KETERANGAN</b>
            <p>Segala informasi pada data ini akan ditampilkan / muncul pada halaman publik<br>
            File yang disimpan dapat berupa PDF / DOC / EXCEL</p>
          </div>
        </div>
      </div>
      <div class="row pb-2">
        <div class="col-lg-12">
          <button class="btn btn-primary" id="open-modal"> Add New</button>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-primary">
            <div class="card-body">
              <table class="table table-bordered" id="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama File</th>
                    <th>Tipe File</th>
                    <th>Ukuran File</th>
                    <th>Diupload Pada</th>
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

<div class="modal fade" id="modal-box">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Upload Data</h4>
      </div>
      <div class="modal-body">
        <div class="form" enctype="multipart/form-data">
          <input 
            type  = "file"
            id    = "file" 
            name  = "file"
            accept= "application/msword, text/plain, application/pdf" 
          />
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>