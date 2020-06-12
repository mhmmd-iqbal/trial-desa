<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');		 
		$this->load->model('ModelHalaman');		 
		$this->load->library('backurl');		 
	}
	function telegram(){
		############ bigbox api-key
		$bigbox_api_key = 'MNDlDBku9VR4Sp6v3EoMofnjFSUeMfgj';
		$bot_key = 'funflight_bot';
		#####
		$entityBody = file_get_contents('php://input');
		$status_resp = 0;
		// validate type request data
		$arr = json_decode($entityBody);
		if(is_object($arr)){
			if(isset($arr->message) && isset($arr->uniqid)){
				$status_resp=1;
			}else{
				$msg_resp = "Bad request, required parameter 'message' and 'uniqid'";
			}
		}else{
			$msg_resp = "Bad request, request should in 'json' format";
		}
		// do backend service reply

		if($status_resp==1){
			switch ($arr->message) {
				case '/pesan':
					$msg_resp = 'Anda Memilih Pesan. uniqid '.$arr->uniqid;
				break;
				
				default:
					$msg_resp = 'Reply from backend developer';
				break;
			}
			$response = array(
				'reply'=>$msg_resp
			);
			$url = 'https://api.thebigbox.id/telegram-config/1.1.0/replychat/'.$bot_key.'/'.$arr->uniqid;
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','x-api-key:'.$bigbox_api_key));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			curl_close($ch);
			// print_r($result);

		}else{
			echo $msg_resp;
		}
	}
	
	public function index(){
		$data['tittle']   = 'E-DESA | HOME';
		$data['view'] 	  = 'home';
		$data['active']	  = 'dashboard';
		$data['aksi']	  = 'aksi/dashboard';

		$data['konten']   = $this->ModelHalaman->get_konten();
		$data['sambutan'] = $this->ModelHalaman->get_sambutan();
		$data['gambar']   = $this->ModelHalaman->get_gambar_kata_sambutan();
		$data['perangkat']= $this->ModelHalaman->get_perangkat();
		$data['logo']	  = $this->ModelHalaman->get_logo();
		$data['back_url'] = $this->backurl->main_url();
		$this->load->view('template', $data);
	}

}
