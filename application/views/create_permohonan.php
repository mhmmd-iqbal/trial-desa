<div class="pt-4 bg-light">
	<div class="container pb-2">
<!-- 		<div class="row">
	      	<div class="col-md-8">
	        	<div class="row">
	          		<div class="col md-12">
	            		<nav aria-label="breadcrumb">
	              			<ol class="breadcrumb">
	                			<li class="breadcrumb-item"><a href="#">Home</a></li>
				                <li class="breadcrumb-item active" aria-current="page">Permohonan Surat</li>
			              	</ol>
		            	</nav>
	          		</div>
	      		</div>
	  		</div>
		</div> -->
		<div class="row">
          	<div class="col-md-12">
            	<div class="alert p-5" style="background-color: #1b9ce3; border-radius: 20px; box-shadow: 2px 5px #EEE">
              		<b class="text-white" style="font-size: 20px"><i class="fa fa-exclamation"></i> Persyaratan Pengajuan Surat</b>
              		<hr class="text-white">
              		<p class="text-white">File berikut perlu di upload sebagai persyaratan pengajuan surat. Antara lain :</p>
              		<ol class="text-white">
              			<li>KTP</li>
              		</ol>
              		<p class="text-white">Harap File dipersiapkan dalam bentuk PDF</p>
            	</div>
          	</div>
        </div>
        <div class="row">
        	<div class="col-md-12">
        		<div class="card bg-light">
        			<div class="card-header">
        				<h5 class="text-uppercase text-center"><?=$surat['nmSurat'] ?></h5>
        			</div>
        			<div class="card-body">
        				<div class="row form-group">
    						<div class="col-md-3">
    							<label for="">NIK Anda</label>
    						</div>
    						<div class="col-md-9">
    							<input type="text"  class="form-control" id="nik">
    						</div>
    						<div class="col-md-12 pt-2">
    							<p class="text-danger"><b>Silahkan Masukkan NIK Anda Terlebih Dahulu. Apabila NIK Belum Terdaftar, Harap Segera Menghubungi Admin Desa</b></p>
    						</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-success" style="border-radius: 0px" id="cek-nik">
									Verifikasi NIK
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 mt-2" hidden="true" id="hidden">
				<div class="card bg-light">
					<div class="card-body">
						<p style="font-weight: bold;">Form Yang Harus Dimasukkan Pada Pengajuan <?=$surat['nmSurat'] ?></p>
						<input type="hidden" id="list1" value="<?=count($surat['list1'])?>">
						<input type="hidden" id="list2" value="<?=count($surat['list2'])?>">
    					<?php foreach($surat['list1'] as $i => $d) :?>
    						<div class="row form-group">
	    						<div class="col-md-3">
	    							<label for="">Masukkan <?=$d['keterangan']?></label>
	    						</div>
	    						<div class="col-md-9">
	    							<input 
	    								type="text" class="form-control list1" data-target="<?=$i?>">
	    						</div>
    						</div>
						<?php endforeach;  ?>
						<?php foreach($surat['list2'] as $i => $d) :?>
							<div class="row form-group">
								<div class="col-md-3">
	    							<label for="">Masukkan <?=$d['keterangan']?></label>
	    						</div>
	    						<div class="col-md-9">
	    							<input type="text" class="form-control list2" data-target="<?=$i?>">
	    						</div>
							</div>
						<?php endforeach;  ?>
						<div class="row form-group">
							<div class="col-md-3">
    							<label for="">File KTP</label>
    						</div>
    						<div class="col-md-9">
    							<input type="file" class="form-control">
    						</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<button style="border-radius: 0px" class="btn btn-success">Buat Pengajuan</button>
								<button style="border-radius: 0px" class="btn btn-primary" id="preview">Lihat Hasil</button>
							</div>
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
			<div class="modal-body">
				<ul>
				<?php foreach ($surat['list1'] as $i => $d) { ?>
					<li><?=$d['keterangan']?> : <span id="hasil-list1-<?=$i?>"></span></li>
				<?php } ?>
				<?php foreach ($surat['list2'] as $i => $d ) { ?>
					<li><?=$d['keterangan']?> : <span id="hasil-list2-<?=$i?>"></span></li>
				<?php } ?>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
			</div>
		</div>
	</div>
</div>