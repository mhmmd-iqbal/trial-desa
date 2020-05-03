<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Surat Desa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Layanan Surat</a></li>
              <li class="breadcrumb-item">Data</a></li>
              <li class="breadcrumb-item active">Add Data</a></li>
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
            <button class="btn btn-primary mr-1"  onclick="window.location.href = '<?=site_url()?>' +'LayananSurat' ">
              <i class="fa fa-chevron-left"></i> Kembali
            </button>
          </div>
          <div class="col-lg-7">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Form Generate Surat</h4>
              </div>
              <div class="card-body">
               <div class="row pb-2">
                 <div class="col-lg-3">Nama Surat</div>
                 <div class="col-lg-9">
                   <input type="text" class="form-control" id="nama-surat">
                 </div>
               </div>
               <div class="row pb-2">
                 <div class="col-lg-3">Format No. Surat</div>
                 <div class="col-lg-4">
                   <input type="text" class="form-control" id="no-surat">
                 </div>
               </div>
               <div class="row pb-2">
                 <div class="col-lg-3">Penjabat Yang Bertanda Tangan</div>
                 <div class="col-lg-6">
                  <select name="" id="penjabat" class="select-plugin-penjabat"></select>
                 </div>
               </div>
               <div class="row pb-2">
                 <div class="col-lg-3">Isi Paragraf Pertama</div>
                 <div class="col-lg-9">
                   <textarea name="" id="paragraf-1" cols="30" rows="5" class="form-control"></textarea>
                 </div>
               </div>
               <div class="row pb-2">
                 <div class="col-lg-12">
                   List Keterangan
                 </div>
                <div class="col-lg-12" id="list-keterangan-1">
                </div>
                 <div class="col-lg-12 text-right">  
                  <button class="btn btn-primary btn-sm" id="add-list-1">
                    <i class="fa fa-plus">  </i>  Add List
                  </button>
                 </div>
               </div>
               <div class="row pb-2">
                 <div class="col-lg-3">Isi Paragraf Kedua</div>
                 <div class="col-lg-9">
                   <textarea name="" id="paragraf-2" cols="30" rows="5" class="form-control"></textarea>
                 </div>
               </div>
               <div class="row pb-2">
                 <div class="col-lg-12">
                   List Keterangan
                 </div>
                <div class="col-lg-12" id="list-keterangan-2">
                </div>
                 <div class="col-lg-12 text-right">  
                  <button class="btn btn-primary btn-sm" id="add-list-2">
                    <i class="fa fa-plus">  </i>  Add List
                  </button>
                 </div>
               </div>
               <div class="row pb-2">
                 <div class="col-lg-3">Isi Paragraf Ketiga</div>
                 <div class="col-lg-9">
                   <textarea name="" id="paragraf-3" cols="30" rows="5" class="form-control"></textarea>
                 </div>
               </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="card">
              <div class="card-header">
                <h5>PREVIEW SURAT</h5>
              </div>
              <div class="card-body">
                <div class="row pb-5">  
                  <div class="col-lg-12 text-center">
                    KOP SURAT DISINI
                  </div>
                </div>
                <div style="text-align: center; font-size: 18px"><b id="nama-surat-grt">Judul Surat</b></div>
                <div style="text-align: center; font-size: 16px" id="no-surat-grt">Nomer Surat</div>
                <br>
                <p style="text-align: justify; font-size: 16px" id="paragraf-1-grt">Paragraf 1 ...</p>
                <table class="ml-5 form-group" hidden id="hidden-ket-list-1">
                  <tbody id="hasil-list-1">
                  </tbody>
                </table>
                <p style="text-align: justify; font-size: 16px" id="paragraf-2-grt">Paragraf 2 ...</p>
                <table class="ml-5 form-group" hidden id="hidden-ket-list-2">
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
                <br><br><br>
                <div style="font-weight: bold;" id="nama-penjabat">NAMA PENJABAT</div>
                <div>NIP. <span id="nip"> ............</span></div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 pb-2">
            <button class="btn btn-danger">RESET</button>
            <button class="btn btn-primary" id="simpan">SIMPAN DATA</button>
          </div>
        </div>
      </div>
    </div>
  </div>