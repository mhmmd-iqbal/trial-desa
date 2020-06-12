<div class="pt-4 bg-light">
	<div class="container pb-2">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<nav aria-label="breadcrumb">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="#">Home</a></li>
			                <li class="breadcrumb-item"><a href="#">Tentang Desa</a></li>
			                <li class="breadcrumb-item active" aria-current="page">Wilayah</li>
			              </ol>
			            </nav>
					</div>
					<?php foreach ($jabatan as $d): ?>
					<div class="col-md-12 pb-2">
						<div class="card">
							<div class="card-header bg-light">
								<h5><?=$d->jabatan ?></h5>
							</div>	
							<div class="card-body">
								<div class="row">
									<div class="col-md-3 text-center pb-2">
										<div class="gambar" style="">
											<img src="<?=$url.'/assets/upload/'.$d->photo ?>" alt="">
										</div>
									</div>
									<div class="col-md-9">
										<div class="table-responsive">
											<table class="table table-bordered table-hover" style="font-size: 13px">
												<tbody>
													<tr>
														<td width="30%">Nama</td>
														<td><?=$d->nama ?></td>
													</tr>
													<tr>
														<td>NIP</td>
														<td><?=$d->nip?></td>
													</tr>
													<tr>
														<td>Jenis Kelamin</td>
														<td></td>
													</tr>
													<tr>
														<td>Tempat Tanggal Lahir</td>
														<td><?=$d->tmpLahir.','.date('d-m-Y', strtotime($d->tglLahir)) ?></td>
													</tr>
													<tr>
														<td>Agama</td>
														<td><?=$d->agama ?></td>
													</tr>
													<tr>
														<td>No HP</td>
														<td><?=$d->noHp ?></td>
													</tr>
													<tr>
														<td>Alamat</td>
														<td><?=$d->alamat ?></td>
													</tr>
												</tbody>
											</table>	
										</div>
									</div>
										
									</div>
								</div>
						</div>
					</div>
					<?php endforeach ?>

				</div>
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

</div>