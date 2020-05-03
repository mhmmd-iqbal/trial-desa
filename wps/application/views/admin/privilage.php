<!-- <input type="text" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"><br>    -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Privilage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item">Data</a></li>
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
                  <th colspan="4" style="text-align: center;" >Master Data</th>
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
                  <td>Data Admin</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="data-admin1" name="data-admin" value="1" checked>
                      <label for="data-admin1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="data-admin2" name="data-admin" value="2">
                      <label for="data-admin2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="data-admin3" name="data-admin" value="3">
                      <label for="data-admin3">
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Data Struktural Jabatan</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="data-struktural1" name="data-struktural" value="1" checked>
                      <label for="data-struktural1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="data-struktural2" name="data-struktural" value="2">
                      <label for="data-struktural2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="data-struktural3" name="data-struktural" value="3">
                      <label for="data-struktural3">
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Data Penduduk</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="data-penduduk1" name="data-penduduk" value="1" checked>
                      <label for="data-penduduk1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="data-penduduk2" name="data-penduduk" value="2">
                      <label for="data-penduduk2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="data-penduduk3" name="data-penduduk" value="3">
                      <label for="data-penduduk3">
                      </label>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Data Kategori Informasi</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="data-kategori1" name="data-kategori" value="1" checked>
                      <label for="data-kategori1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="data-kategori2" name="data-kategori" value="2">
                      <label for="data-kategori2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="data-kategori3" name="data-kategori" value="3">
                      <label for="data-kategori3">
                      </label>
                    </div>
                  </td>
                </tr>
              </tbody>
              <thead>
                <tr>
                  <th colspan="4" style="text-align: center;" >Data Desa</th>
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
                  <td>Struktur Organisasi</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="struktur-organisasi1" name="struktur-organisasi" value="1" checked>
                      <label for="struktur-organisasi1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="struktur-organisasi2" name="struktur-organisasi" value="2">
                      <label for="struktur-organisasi2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="struktur-organisasi3" name="struktur-organisasi" value="3">
                      <label for="struktur-organisasi3">
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Visi dan Misi</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="visi-misi1" name="visi-misi" value="1" checked>
                      <label for="visi-misi1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="visi-misi2" name="visi-misi" value="2">
                      <label for="visi-misi2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="visi-misi3" name="visi-misi" value="3">
                      <label for="visi-misi3">
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Potensi Desa</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="potensi-desa1" name="potensi-desa" value="1" checked>
                      <label for="potensi-desa1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="potensi-desa2" name="potensi-desa" value="2">
                      <label for="potensi-desa2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="potensi-desa3" name="potensi-desa" value="3">
                      <label for="potensi-desa3">
                      </label>
                    </div>
                  </td>
                </tr>
              </tbody>
              <thead>
                <tr>
                  <th colspan="4" style="text-align: center;" >Administrasi Surat</th>
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
                  <td>Layanan Surat Desa</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="layanan-surat1" name="layanan-surat" value="1" checked>
                      <label for="layanan-surat1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="layanan-surat2" name="layanan-surat" value="2">
                      <label for="layanan-surat2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="layanan-surat3" name="layanan-surat" value="3">
                      <label for="layanan-surat3">
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Verifikasi Surat</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="verifikasi-surat1" name="verifikasi-surat" value="1" checked>
                      <label for="verifikasi-surat1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="verifikasi-surat2" name="verifikasi-surat" value="2">
                      <label for="verifikasi-surat2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="verifikasi-surat3" name="verifikasi-surat" value="3">
                      <label for="verifikasi-surat3">
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Data Administrasi Surat</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="data-adm-surat1" name="data-adm-surat" value="1" checked>
                      <label for="data-adm-surat1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="data-adm-surat2" name="data-adm-surat" value="2">
                      <label for="data-adm-surat2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="data-adm-surat3" name="data-adm-surat" value="3">
                      <label for="data-adm-surat3">
                      </label>
                    </div>
                  </td>
                </tr>
              </tbody>
              <thead>
                <tr>
                  <th colspan="4" style="text-align: center;" >Layanan Informasi Desa</th>
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
                  <td>Informasi Umum</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="informasi-umum1" name="informasi-umum" value="1" checked>
                      <label for="informasi-umum1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="informasi-umum2" name="informasi-umum" value="2">
                      <label for="informasi-umum2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="informasi-umum3" name="informasi-umum" value="3">
                      <label for="informasi-umum3">
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Photo dan Galeri</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="photo-galeri1" name="photo-galeri" value="1" checked>
                      <label for="photo-galeri1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="photo-galeri2" name="photo-galeri" value="2">
                      <label for="photo-galeri2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="photo-galeri3" name="photo-galeri" value="3">
                      <label for="photo-galeri3">
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Dokumen Lainnya</td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="dokumen1" name="dokumen" value="1" checked>
                      <label for="dokumen1">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="dokumen2" name="dokumen" value="2">
                      <label for="dokumen2">
                      </label>
                    </div>
                  </td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="dokumen3" name="dokumen" value="3">
                      <label for="dokumen3">
                      </label>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary submit"></button>
        </div>
      </div>
    </div>
  </div>