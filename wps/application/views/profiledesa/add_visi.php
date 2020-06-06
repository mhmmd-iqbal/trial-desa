<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Visi dan Misi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Desa</a></li>
              <li class="breadcrumb-item">Visi dan misi</a></li>
              <li class="breadcrumb-item active">Add Visi</a></li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h4>Add New Visi</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <p>Dibuat Pada Tanggal  <?=date('d/m/Y') ?></p>
                  </div>
                  <div class="col-lg-12">
                  <textarea class="textarea" placeholder="Place some text here"
                    style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="input-visi"></textarea>
                  </div>
                  <div class="col-lg-12">
                    <button class="btn btn-info" id="home"><i class="fa fa-chevron-left"></i> Kembali</button>
                    <button class="btn btn-primary" id="simpan-visi"> Simpan data</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>