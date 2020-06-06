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
          <a class="btn btn-primary" href="<?=site_url()?>InformasiUmum/add"> Add New Post</a>
          <a class="btn btn-primary" href="<?=site_url()?>InformasiUmum/list"><i class="fa fa-list"></i> List Category</a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-primary">
<!--             <div class="card-header">
              <h5 class="text-center"></h5>
            </div> -->
            <div class="card-body">
              <table class="table table-bordered" id="table">
                <thead>
                  <tr>
                    <!-- <th>No</th> -->
                    <th>Tittle</th>
                    <th>Category</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Status</th>
                    <th>Action</th>
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

