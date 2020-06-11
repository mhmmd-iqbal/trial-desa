<div class="pt-4 bg-light">
	
	<div class="row pb-2">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
		         	<div class="container">
						<div class="row">
				        	<div class="col-md-5">
				        		<img src="<?=$back_url."/assets/upload/gambar/".$gambar['gambar']?>" style="max-height: 300px" alt="">
				          	</div>
				            <div class="col-md-7">
				            	<b>Kata-Kata Sambutan</b>
				                <p class="center" style="text-align: justify;"><?=$sambutan['sambutan']?></p>
				            </div>
				        </div>
		         		
		         	</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="">
		<div class="row m-2">
			<div class="col-md-12 pb-2">
				<div class="text-center">	
					<h5>Pengumuman Penting</h5>
				</div>
			</div>
			<?php for($i=0; $i < 3; $i++) : ?>
			<div class="col-md-4">
				<div 
						class="jumbotron" 
						style="background-image: url('<?=base_url() ?>assets/upload/project-1.jpg'); 
						background-position: center;
						background-repeat: no-repeat;
						background-size: cover;
						height: 300px
						">
				  <!-- <p class="lead text-white">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> -->
				  <!-- <hr class="my-4"> -->
				  <!-- <div class="text-white">Judul</div> -->
				</div>
			</div>
			<?php endfor; ?>
		</div>		
	</div>

	<div class="container pb-2">
		<div class="row">
			<div class="col-md-8">
				<?php foreach ($konten as $i => $d) { ?>
		        	<?php $url = $d->gambar != null ? (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."wps/assets/upload/post/".$d->gambar : ''; ?>

		          	<div class="row pb-2">
			           <div class="col-lg-12">
			          		<div class="card">
			          			<div class="card-body">
			          				<div class="row">
			          					<div class="col-lg-4 gambar">
			          						<img src="<?=$url?>" >
			          					</div>
			          					<div class="col-lg-8">
			          						<div class="small clearfix">
			          							<div class="float-left">
			          							<?=date('d-m-Y h:i:s', strtotime($d->created_at))?> 
			          							</div>
			          							<div class="float-right">
			          							<?=$d->user?> 
				          						</div>
		          							</div>	
			          						<div class="small"><?=$d->kategori ?> </div>
							                <h5 class="heading"><a href="<?=site_url('berita/').$d->url?>"><?=$d->judul?></a></h5>
			          					</div>
			          				</div>
			          			</div>
			          		</div>
			          	</div>
			        </div>
		        <?php } ?>

			</div>

			<div class="col-md-4">
				<!-- <div class="row pb-2">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="">
									<p> Populer Artikel</p>
									<div class="row">
										<div class="col-lg-12">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->

				<div class="row pb-2">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="">
									<b>Download</b>
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-12">
										<div class="card bg-light">
											<div class="card-header">
												<a href="">
													<i class="fa fa-download"> Judul</i>
												</a>
											</div>
											<div class="card-body" style="max-height: 50px">
												<div class="small text-right">
													Tanggal | Kategori
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row pb-2">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="">
									<b>Statistik Pengunjung</b>
									<hr>
									<table class="table table-striped table-bordered" style="font-size: 12px; ">
										<tr>
											<td>IP Address</td>
											<th>
											<?php
											echo get_client_ip();
											function get_client_ip() {
											    $ipaddress = '';
											    if (getenv('HTTP_CLIENT_IP'))
											        $ipaddress = getenv('HTTP_CLIENT_IP');
											    else if(getenv('HTTP_X_FORWARDED_FOR'))
											        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
											    else if(getenv('HTTP_X_FORWARDED'))
											        $ipaddress = getenv('HTTP_X_FORWARDED');
											    else if(getenv('HTTP_FORWARDED_FOR'))
											        $ipaddress = getenv('HTTP_FORWARDED_FOR');
											    else if(getenv('HTTP_FORWARDED'))
											       $ipaddress = getenv('HTTP_FORWARDED');
											    else if(getenv('REMOTE_ADDR'))
											        $ipaddress = getenv('REMOTE_ADDR');
											    else
											        $ipaddress = 'UNKNOWN';
											    return $ipaddress;
											}
											?>
											</th>
										</tr>
										<tr>
											<td>Browser</td>
											<th>
											<?php
												$browser = get_browser(null, true);
												echo $browser['browser'];
											?>
											</th>
										</tr>
										<tr>
											<td>Sistem Operasi</td>
											<th>

											<?php
											$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
											function getOS() { 
											    global $user_agent;
											    $os_platform    =   "Unknown OS Platform";
											    $os_array       =   array(
											        '/windows nt 6.2/i'     =>  'Windows 8',
											        '/windows nt 6.1/i'     =>  'Windows 7',
											        '/windows nt 6.0/i'     =>  'Windows Vista',
											        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
											        '/windows nt 5.1/i'     =>  'Windows XP',
											        '/windows xp/i'         =>  'Windows XP',
											        '/windows nt 5.0/i'     =>  'Windows 2000',
											        '/windows me/i'         =>  'Windows ME',
											        '/win98/i'              =>  'Windows 98',
											        '/win95/i'              =>  'Windows 95',
											        '/win16/i'              =>  'Windows 3.11',
											        '/macintosh|mac os x/i' =>  'Mac OS X',
											        '/mac_powerpc/i'        =>  'Mac OS 9',
											        '/linux/i'              =>  'Linux',
											        '/ubuntu/i'             =>  'Ubuntu',
											        '/iphone/i'             =>  'iPhone',
											        '/ipod/i'               =>  'iPod',
											        '/ipad/i'               =>  'iPad',
											        '/android/i'            =>  'Android',
											        '/blackberry/i'         =>  'BlackBerry',
											        '/webos/i'              =>  'Mobile'
											    );

											    foreach ($os_array as $regex => $value) { 
											        if (preg_match($regex, $user_agent)) {
											            $os_platform    =   $value;
											        }

											    }   
											    return $os_platform;
											}
											$user_os  =   getOS();
											// echo $user_os;
											// var_dump(PHP_OS);
											echo php_uname();
											?>
											</th>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row pb-2">
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header">
					<div class="text-center">
						<h5>Perangkat Desa</h5>
					</div>
				</div>
				<div class="card-body">
					<div class="container">
						<div class="carousel-testimony owl-carousel">
			              <?php foreach ($perangkat as $d ): ?>
			              <div class="item">
			                <div class="testimony-wrap d-flex">
			                <?php $url = $d->photo != null ? (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."wps/assets/upload/".$d->photo : base_url('assets/upload/no_image.png') ; ?>

			                  <div class="user-img" style="background-image: url('<?=$url?>')">
			                  </div>
			                  <div class="text pl-4">
			                    <p class="name"><?=$d->nama?></p>
			                    <p class="small">NIP. <?=$d->nip?></p>
			                    <span class="position"><?=$d->jabatan?></span>
			                  </div>
			                </div>
			              </div>
			              <?php endforeach ?>
			            </div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>