<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Struktural Penjabat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#">Struktural</a></li>
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
            <button class="btn btn-primary mr-1"  onclick="window.location.href = '<?=site_url()?>' +'Struktural/add' ">
              Add New
            </button>
            <button class="btn btn-primary mr-1" onclick="window.location.href = '<?=site_url()?>' +'Struktural/jabatan' ">
              Manage Data Jabatan
            </button>
          </div>
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="table" style="width: 99%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Jenis Kelamin</th>
                        <th>HP</th>
                        <th>Status Jabatan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-id">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Data Admin</h4>
        </div>
        <div class="modal-body">
          <div class="row form-group">
            <div class="col-lg-3"><label for="">Nama</label></div>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="name">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-lg-3"><label for="">Username</label></div>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="username">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-lg-3"><label for="">Privilage</label></div>
            <div class="col-lg-9">
              <select class="select-plugin" id="idPrivilages">
                <option value="" selected="" disabled=""></option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary" id="simpan">Simpan Data</button>
        </div>
      </div>
    </div>
  </div>