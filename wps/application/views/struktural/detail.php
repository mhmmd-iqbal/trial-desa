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
            <h1 class="m-0 text-dark">Data Penjabat Desa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Struktural</a></li>
              <li class="breadcrumb-item">Data</a></li>
              <li class="breadcrumb-item active">Detail</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <form action="#" method="POST" enctype="multipart/form-data" id="submit-update-form">          
        <input type="hidden" id="id" value="<?=$data->id?>">
        <div class="row">
          <div class="col-lg-9">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Biodata <?=$data->nama ?></h4>
              </div>
              <div class="card-body">
                <table class="" width="100%">
                  <tr>
                    <td>Status Anggota</td>
                    <td align="">
                      <?php if($data->statusAnggota == TRUE): ?>
                        <div style="font-size: 15px" class="badge badge-success">Aktif</div>
                      <?php else : ?>
                        <div style="font-size: 15px" class="badge badge-danger">Tidak Aktif</div>
                    <?php endif; ?>
                    </td>
                    <td class="update" hidden>
                      <select 
                        class="select-plugin-anggota" 
                        name="statusAnggota" 
                        >
                        <option value="1" > Aktif</option>
                        <option value="0" > Tidak Aktif</option>
                      </select>
                      <input type="hidden" value="<?=$data->statusAnggota?>" id="statusAnggota">
                    </td>
                  </tr>
                  <tr>
                    <td width="25%">Jabatan</td>
                    <td>
                       <input type="text" readonly value="<?=$data->jabatan ?>" class="form-control">
                    </td>
                    <td class="update" hidden>
                      <select 
                        disabled="" 
                        class="select-plugin-id" 
                        id="jabatan" 
                        name="jabatan">
                      </select>
                      <input type="hidden" id="id-jabatan" value="<?=$data->jabatan ?>">
                    </td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td colspan="2">
                      <input 
                        readonly 
                        value="<?=$data->nama ?>" 
                        type="text" 
                        class="form-control change" 
                        placeholder="Input Nama..." 
                        oninput="this.value = this.value.replace(/[^a-z; A-Z; ]/g, '');" 
                        maxlength="255" 
                        name="nama"
                      >
                    </td>
                  </tr>
                  <tr>
                    <td>NIP</td>
                    <td colspan="2">
                      <input 
                        value="<?=$data->nip ?>" 
                        readonly="" 
                        type="text" 
                        class="form-control change" 
                        placeholder="Input NIP..." 
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');" 
                        maxlength="255"
                        name="nip" 
                      >
                    </td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td colspan="2">
                      <div class="icheck-primary d-inline pr-5">
                        <input 
                          type="radio" 
                          id="jenisKelamin1" 
                          name="jenisKelamin" 
                          value="pria"  
                          <?=$data->jenisKelamin == 'pria' ? 'checked' : '' ?>
                          disabled 
                        >
                        <label for="jenisKelamin1" >
                          Pria
                        </label>
                      </div>
                      <div class="icheck-primary d-inline pr-5">
                        <input 
                          type="radio" 
                          id="jenisKelamin2" 
                          name="jenisKelamin" 
                          value="wanita" 
                          <?=$data->jenisKelamin == 'wanita' ? 'checked' : '' ?>
                          disabled 
                        >
                        <label for="jenisKelamin2">
                          Wanita
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td>
                      <input type="text" readonly="" value="<?=$data->agama?>" class="form-control">
                    </td>
                    <td class="update" hidden>
                      <select 
                        class="select-plugin-agama" 
                        name="agama"
                        >
                        <option value="" disabled="" selected=""></option>
                        <option value="islam"> Islam</option>
                        <option value="kristen"> Kristen</option>
                        <option value="protestan" > Protestan</option>
                        <option value="hindu" > Hindu</option>
                        <option value="buddha" > Buddha</option>
                      </select>
                      <input type="hidden" id="agama" value="<?=$data->agama ?>">
                    </td>
                  </tr>
                  <tr>
                    <td>Tempat & Tanggal Lahir</td>
                    <td>
                      <input 
                        type="text" 
                        class="form-control change" 
                        placeholder="Input Tempat Lahir..." 
                        maxlength="255"
                        name="tmpLahir"
                        readonly=""
                        value="<?=$data->tmpLahir ?>" 
                      >
                    </td>
                    <td>
                      <input 
                        type="date" 
                        class="form-control change"
                        name="tglLahir"
                        readonly=""
                        value="<?=$data->tglLahir ?>" 
                      >
                    </td>
                  </tr>
                  <tr>
                    <td>Nomer HP</td>
                    <td colspan="2">
                      <input 
                        type="number" 
                        class="form-control change" 
                        placeholder="Input Nomer HP..." 
                        maxlength="255"
                        min="0" 
                        name="noHp"
                        readonly="" 
                        value="<?=$data->noHp ?>" 
                      >
                    </td>
                  </tr>
                  <tr>
                    <td valign="top">Alamat</td>
                    <td colspan="2" colspan="2">
                      <textarea 
                        name="alamat" 
                        class="form-control change" 
                        id="" 
                        rows="5" 
                        style="resize: none"
                        placeholder="Input Alamat..." 
                        readonly="" 
                      ><?=$data->alamat?></textarea>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="">
              <div class="card">
                <div class="card-body">
                  <div class="imgWrap text-center">
                    <img 
                      src="<?=base_url()?>assets/upload/<?=$data->photo ?>" 
                      alt="Gambar"
                      style="max-height: 200px; width: auto;"
                      class="card-img-top img-fluid"
                    />
                  </div>
                </div>
              </div>
              <div class="card update" hidden>
                <div class="card-body">
                    <div class="custom-file">
                        <input 
                          disabled="" 
                          type="file" 
                          id="inputFile" 
                          class="imgFile custom-file-input" 
                          aria-describedby="inputGroupFileAddon01"
                          accept="image/*"
                          name="gambar" >
                        <input type="hidden" id="site_url" value="<?=site_url()?>">
                        <input type="hidden" id="base_url" value="<?=base_url()?>">
                        <label class="custom-file-label" for="inputFile">Choose file</label>
                    </div>
                </div>
                <hr>
                <div class="imgWrap mb-1 text-center">
                    <img 
                      src="<?=base_url()?>assets/logo/no_image.png" 
                      id="imgView" 
                      style="max-height:250px; width: auto;"
                      class="card-img-top img-fluid" 
                    />
                </div>
                <div class="mb-3" style="margin: 0px 10px">
                  <!-- <button class="btn btn-block btn-success" type="submit">Upload File</button> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        </form>
        <div class="row pb-2">
          <div class="col-lg-12 detail">
            <button class="btn btn-success" id="edit">Edit Data</button>
          </div>
          <div class="col-lg-12 update" hidden>
            <button class="btn btn-danger" id="reset">Kembali</button>
            <button class="btn btn-primary" id="update">Simpan Data</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  
