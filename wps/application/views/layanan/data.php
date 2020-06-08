<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Surat Desa</h1>
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
            <button class="btn btn-primary mr-1"  onclick="window.location.href = '<?=site_url()?>' +'LayananSurat/add' ">
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
                        <th>No</th>
                        <th>Nama Surat</th>
                        <!-- <th>User Pembuat</th> -->
                        <th>Tanggal Dibuat</th>
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

  <div class="modal fade" id="modal-info">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center" id="head"></h4>
        </div>
        <div class="modal-body" id="body">
          <div class="row">
            <div class="col-lg-12">
              
              <div style="text-align: center; font-size: 16px" id="no-surat-grt">Nomer Surat</div>
                <br>
                <p style="text-align: justify; font-size: 16px" id="paragraf-1-grt">Paragraf 1 ...</p>
                <table class="ml-5 form-group" id="hidden-ket-list-1">
                  <tbody id="hasil-list-1">
                  </tbody>
                </table>
                <p style="text-align: justify; font-size: 16px" id="paragraf-2-grt">Paragraf 2 ...</p>
                <table class="ml-5 form-group" id="hidden-ket-list-2">
                  <tbody id="hasil-list-2">
                  </tbody>
                </table>
                <p style="text-align: justify; font-size: 16px" id="paragraf-3-grt">Paragraf 3 ...</p>
                <br>
                <?php 
                  function bulan(){
                    $bulan = date('m');
                    switch ($bulan) {
                      case '01': return date('d')." Januari ".date('Y'); break;                      
                      case '02': return date('d')." Februari ".date('Y'); break;                      
                      case '03': return date('d')." Maret ".date('Y'); break;                      
                      case '04': return date('d')." April ".date('Y'); break;                      
                      case '05': return date('d')." Mei ".date('Y'); break;                      
                      case '06': return date('d')." Juni ".date('Y'); break;                      
                      case '07': return date('d')." Juli ".date('Y'); break;                      
                      case '08': return date('d')." Agustus ".date('Y'); break;                      
                      case '09': return date('d')." September ".date('Y'); break;                      
                      case '10': return date('d')." Oktober ".date('Y'); break;                      
                      case '11': return date('d')." November ".date('Y'); break;                      
                      case '12': return date('d')." Desember ".date('Y'); break;                      
                    }
                  }
                ?>
                <p>............., <?=bulan() ?></p>
                <p><span id="jabatan">.......</span> Gampong Rantau Panyang</p>
                <br>
                <div style="font-weight: bold;" id="nama-penjabat">NAMA PENJABAT</div>
                <div>NIP. <span id="nip"> ............</span></div>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>