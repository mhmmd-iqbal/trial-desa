<style type="text/css">
  th, td{
    padding: 10px
  }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Penduduk Desa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Penduduk</a></li>
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
        <div class="row pb-2">
          <div class="col-lg-12 text-right">
            <button class="btn btn-success"><i class="fa fa-download"></i> Download Format Excel</button>
            <button class="btn btn-primary"><i class="fa fa-upload"></i> Tambah Data Dengan Excel</button>
          </div>
        </div>
        <form action="#" method="POST" enctype="multipart/form-data" id="submit-form">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Biodata Penduduk</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-10">
                    <table class="" width="100%">
                      <tr>
                        <td>Nama</td>
                        <td colspan="2">
                          <input 
                            type="text" 
                            class="form-control" 
                            placeholder="Input Nama..." 
                            oninput="this.value = this.value.replace(/[^a-z; A-Z; ]/g, '');" 
                            maxlength="255" 
                            name="nama"
                          >
                          <span class="text-danger small"><i>*field tidak boleh kosong</i></span>
                        </td>
                      </tr>
                      <tr>
                        <td>NIK</td>
                        <td colspan="2">
                          <input 
                            type="text" 
                            class="form-control" 
                            placeholder="Input NIK..." 
                            oninput="this.value = this.value.replace(/[^0-9]/g, '');" 
                            maxlength="255"
                            name="nik" 
                          >
                          <span class="text-danger small"><i>*field tidak boleh kosong</i></span>
                        </td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td colspan="2">
                          <div class="icheck-primary d-inline pr-5">
                            <input type="radio" id="jenisKelamin1" name="jenisKelamin" value="pria" checked>
                            <label for="jenisKelamin1">
                              Pria
                            </label>
                          </div>
                          <div class="icheck-primary d-inline pr-5">
                            <input type="radio" id="jenisKelamin2" name="jenisKelamin" value="wanita" >
                            <label for="jenisKelamin2">
                              Wanita
                            </label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Agama</td>
                        <td colspan="2">
                          <select 
                            class="select-plugin-agama" 
                            id="agama"
                            name="agama">
                            <option value="" selected="" disabled=""> </option>
                            <option value="islam"> Islam</option>
                            <option value="kristen"> Kristen</option>
                            <option value="protestan"> Protestan</option>
                            <option value="hindu"> Hindu</option>
                            <option value="buddha"> Buddha</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Tempat & Tanggal Lahir</td>
                        <td>
                          <input 
                            type="text" 
                            class="form-control" 
                            placeholder="Input Tempat Lahir..." 
                            maxlength="255"
                            name="tmpLahir">
                        </td>
                        <td>
                          <input 
                            type="date" 
                            class="form-control"
                            name="tglLahir">
                        </td>
                      </tr>
                      <tr>
                        <td>Nomer HP</td>
                        <td colspan="2">
                          <input 
                            type="number" 
                            class="form-control" 
                            placeholder="Input Nomer HP..." 
                            maxlength="255"
                            min="0" 
                            name="noHp">
                        </td>
                      </tr>
                      <tr>
                        <td>Dusun Tinggal</td>
                        <td colspan="2">
                          <input 
                            type="text" 
                            class="form-control" 
                            placeholder="Input Dusun..." 
                            maxlength="255"
                            name="dusun">
                        </td>
                      </tr>
                      <tr>
                        <td valign="top">Alamat</td>
                        <td colspan="2" colspan="2">
                          <textarea 
                            name="alamat" 
                            class="form-control" 
                            id="" 
                            rows="5" 
                            style="resize: none"
                            placeholder="Input Alamat..." 
                          ></textarea>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </form>
        <div class="row pb-2">
          <div class="col-lg-12">
            <button class="btn btn-primary" id="simpan">Simpan Data</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  
