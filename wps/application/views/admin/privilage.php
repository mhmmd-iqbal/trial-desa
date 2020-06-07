<!-- <input type="text" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"><br>    -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kategori Hak Akses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Privilage</a></li>
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
                        <th>Privilage Name</th>
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
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Privilage Access</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <div class="col-lg-3">
                <label for="nama-privilage">
                  Nama Privilage
                </label>
              </div>
              <div class="col-lg-4">
                <input 
                  type="text" 
                  id="nama-privilage" 
                  class="form-control" 
                  oninput="this.value = this.value.replace(/[<;>]/g, '');" >
              </div>
            </div>
          </div>

          <div class="table-responsive">  
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="4" style="text-align: center;" >
                  Daftar Hak Akses Menu</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>Menu Akses</th>
                  <th>Batasi Akses</th>
                  <th>Hanya Melihat</th>
                  <th>Akses Penuh</th>
                </tr>
                <tr>
                  <td>Admin</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="admin1" name="admin" value="1" checked>
                      <label for="admin1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="admin2" name="admin" value="2">
                      <label for="admin2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="admin3" name="admin" value="3">
                      <label for="admin3">
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Struktural</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="struktural1" name="struktural" value="1" checked>
                      <label for="struktural1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="struktural2" name="struktural" value="2">
                      <label for="struktural2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="struktural3" name="struktural" value="3">
                      <label for="struktural3">
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Kependudukan</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="kependudukan1" name="kependudukan" value="1" checked>
                      <label for="kependudukan1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="kependudukan2" name="kependudukan" value="2">
                      <label for="kependudukan2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="kependudukan3" name="kependudukan" value="3">
                      <label for="kependudukan3">
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Profile Desa</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="profile1" name="profile" value="1" checked>
                      <label for="profile1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="profile2" name="profile" value="2">
                      <label for="profile2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="profile3" name="profile" value="3">
                      <label for="profile3">
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Administrasi Surat</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="administrasi1" name="administrasi" value="1" checked>
                      <label for="administrasi1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="administrasi2" name="administrasi" value="2">
                      <label for="administrasi2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="administrasi3" name="administrasi" value="3">
                      <label for="administrasi3">
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Verifikasi Surat</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="verifikasi1" name="verifikasi" value="1" checked>
                      <label for="verifikasi1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="verifikasi2" name="verifikasi" value="2">
                      <label for="verifikasi2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="verifikasi3" name="verifikasi" value="3">
                      <label for="verifikasi3">
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Informasi Desa</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="informasi1" name="informasi" value="1" checked>
                      <label for="informasi1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="informasi2" name="informasi" value="2">
                      <label for="informasi2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="informasi3" name="informasi" value="3">
                      <label for="informasi3">
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Open Data</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="opendata1" name="opendata" value="1" checked>
                      <label for="opendata1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="opendata2" name="opendata" value="2">
                      <label for="opendata2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="opendata3" name="opendata" value="3">
                      <label for="opendata3">
                      </label>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="batal" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary submit"></button>
        </div>
      </div>
    </div>
  </div>