<div class="pt-4 bg-light">
	<div class="col-md-12 bg-white">
		<div class="container">
			<div class="row">
				<div class="col-md-5 gambar" >
	        		<img src="<?=$back_url."/assets/upload/gambar/".$gambar['gambar']?>" style=""  alt="">
	        	</div>
				<div class="col-md-7">
					<b>Kata-Kata Sambutan</b>
	                <p class="center" style="text-align: justify;"><?=$sambutan['sambutan']?></p>
				</div>
			</div>
		</div>
	</div>

	<div class="row mt-2">
		<div class="col-md-12 pb-2">
			<div class="text-center">	
				<h5>PENGUMUMAN PENTING</h5>
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
											function getBrowser()
											{
											    $u_agent = $_SERVER['HTTP_USER_AGENT'];
											    $bname = 'Unknown';
											    $platform = 'Unknown';
											    $version= "";

											    //First get the platform?
											    if (preg_match('/linux/i', $u_agent)) {
											        $platform = 'linux';
											    }
											    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
											        $platform = 'mac';
											    }
											    elseif (preg_match('/windows|win32/i', $u_agent)) {
											        $platform = 'windows';
											    }

											    // Next get the name of the useragent yes seperately and for good reason
											    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
											    {
											        $bname = 'Internet Explorer';
											        $ub = "MSIE";
											    }
											    elseif(preg_match('/Firefox/i',$u_agent))
											    {
											        $bname = 'Mozilla Firefox';
											        $ub = "Firefox";
											    }
											    elseif(preg_match('/Chrome/i',$u_agent))
											    {
											        $bname = 'Google Chrome';
											        $ub = "Chrome";
											    }
											    elseif(preg_match('/Safari/i',$u_agent))
											    {
											        $bname = 'Apple Safari';
											        $ub = "Safari";
											    }
											    elseif(preg_match('/Opera/i',$u_agent))
											    {
											        $bname = 'Opera';
											        $ub = "Opera";
											    }
											    elseif(preg_match('/Netscape/i',$u_agent))
											    {
											        $bname = 'Netscape';
											        $ub = "Netscape";
											    }

											    // finally get the correct version number
											    $known = array('Version', $ub, 'other');
											    $pattern = '#(?<browser>' . join('|', $known) .
											    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
											    if (!preg_match_all($pattern, $u_agent, $matches)) {
											        // we have no matching number just continue
											    }

											    // see how many we have
											    $i = count($matches['browser']);
											    if ($i != 1) {
											        //we will have two since we are not using 'other' argument yet
											        //see if version is before or after the name
											        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
											            $version= $matches['version'][0];
											        }
											        else {
											            $version= $matches['version'][1];
											        }
											    }
											    else {
											        $version= $matches['version'][0];
											    }

											    // check if we have a number
											    if ($version==null || $version=="") {$version="?";}

											    return array(
											        'userAgent' => $u_agent,
											        'name'      => $bname,
											        'version'   => $version,
											        'platform'  => $platform,
											        'pattern'    => $pattern
											    );
											}

											// now try it
											$ua=getBrowser();
											$yourbrowser=  $ua['name'];
											echo $yourbrowser;
											?>
											</th>
										</tr>
										<tr>
											<td>Sistem Operasi</td>
											<th>

											<?php
											function get_operating_system() {
											    $u_agent = $_SERVER['HTTP_USER_AGENT'];
											    $operating_system = 'Unknown Operating System';

											    //Get the operating_system
											    if (preg_match('/linux/i', $u_agent)) {
											        $operating_system = 'Linux';
											    } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
											        $operating_system = 'Mac';
											    } elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
											        $operating_system = 'Windows';
											    } elseif (preg_match('/ubuntu/i', $u_agent)) {
											        $operating_system = 'Ubuntu';
											    } elseif (preg_match('/iphone/i', $u_agent)) {
											        $operating_system = 'IPhone';
											    } elseif (preg_match('/ipod/i', $u_agent)) {
											        $operating_system = 'IPod';
											    } elseif (preg_match('/ipad/i', $u_agent)) {
											        $operating_system = 'IPad';
											    } elseif (preg_match('/android/i', $u_agent)) {
											        $operating_system = 'Android';
											    } elseif (preg_match('/blackberry/i', $u_agent)) {
											        $operating_system = 'Blackberry';
											    } elseif (preg_match('/webos/i', $u_agent)) {
											        $operating_system = 'Mobile';
											    }
											    
											    return $operating_system;
											}

											echo get_operating_system();
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

	
	<div class="row ">
		<div class="col-md-12 pb-2">
			<div class="card">
				<div class="card-header text-center">	
					<h5>PENJABAT DESA</h5>
				</div>
				<div class="card-body">
					<div class="container">
						<div class="carousel-testimony owl-carousel">
			              <?php foreach ($perangkat as $d ): ?>
			              	<?php $url = $d->photo != null ? (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."wps/assets/upload/".$d->photo : base_url('assets/upload/no_image.png') ; ?>
				              <div class="">
				              	<div class="card bg-light ">
						          <div class="penjabat-img">
							          <img 	class="" src="<?=$url?>" >
						          </div>
					
						          <div class="card-body text-center">
						            <h5 class="card-title"><?=$d->jabatan?></h5>
						            <div class="name"><?=$d->nama?></div>
				                    <div class="small">NIP. <?=$d->nip?></div>
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

	<div class="row mb-2">
		<div class="col-md-12">
			<div class="card bg-dark">
				<div class="card-header text-center">
					<h5 class="text-white">LAPORAN MASYARAKAT</h5>
				</div>
				<div class="card-body">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="card bg-white">
									<div class="card-body" style="height: 300px">
									</div>
								</div>
							</div>
							<div class="col-md-12 mt-2 text-center">
								<button class="btn btn-primary "> Lihat Selengkapnya</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>