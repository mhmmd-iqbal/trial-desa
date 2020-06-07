<!-- <input type="text" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"><br>    -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kategori Jabatan Desa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Struktural</a></li>
              <li class="breadcrumb-item active">Kategori Jabatan</a></li>
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
            <button class="btn btn-primary mr-1" id="add" href='#modal-id'>
              Add New
            </button>
          </div>
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="table" style="width: 99%">
                    <thead>
                      <tr>
                        <th width="50px">No</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th width="150px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
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
          <h4 class="modal-title">Jabatan Desa</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="row form-group">
              <div class="col-lg-3">
                <label for="nama-privilage">
                  Created At
                </label>
              </div>
              <div class="col-lg-9">
                <div id="time"></div>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-3">
                <label for="nama-privilage">
                  Nama Jabatan
                </label>
              </div>
              <div class="col-lg-9">
                <input 
                  type="text" 
                  id="jabatan" 
                  class="form-control" 
                  oninput="this.value = this.value.replace(/[<;>]/g, '');" >
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary submit">Save Data</button>
        </div>
      </div>
    </div>
  </div>