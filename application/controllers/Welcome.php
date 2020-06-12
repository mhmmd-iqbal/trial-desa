<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');		 
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
	
	function url(){
		$http_req   = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) === 'on' ? "https://" : "http://";
		$server_url = $_SERVER['HTTP_HOST'];
		$back_url   = $http_req.$server_url."/wps/";
		if(( $server_url == 'localhost')||($server_url == '192.168.0.0')||($server_url == '192.168.1.3')){
		    $back_url = $http_req.$server_url."/edesa/wps/";
		}
		return $back_url;
	}

	public function index(){
		$data['tittle']   = 'E-DESA | HOME';
		$data['view'] 	  = 'home';
		$data['active']	  = 'dashboard';
		$data['aksi']	  = 'aksi/dashboard';

		$data['konten']   = $this->get_konten();
		$data['sambutan'] = $this->get_sambutan();
		$data['gambar']   = $this->get_gambar_kata_sambutan();
		$data['perangkat']= $this->get_perangkat();
		$data['logo']	  = $this->get_logo();
		$data['back_url'] = $this->url();
		$this->load->view('template', $data);
	}

	function get_logo(){
		$this->db->select('logo');
		$this->db->where('status', 1);
		$this->db->from('logos');
		$res = $this->db->get()->row_array();
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res; 
	}

	function get_gambar_kata_sambutan(){
		$this->db->select('gambar');
		$this->db->from('gambars');
		$this->db->order_by('updated_at', 'desc');
		$res = $this->db->get()->row_array();
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
	}

	function get_sambutan(){
		$this->db->select('sambutan');
		$this->db->from('sambutans');
		$res = $this->db->get()->row_array();
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
		// echo json_encode($res);
	}

	function get_konten(){
		$this->db->select('kategoris.kategori');
		$this->db->select(['kontens.judul', 'kontens.konten', 'kontens.user', 'kontens.gambar', 'kontens.created_at', 'kontens.url']);
		$this->db->from('kontens');
		$this->db->join('kategoris', 'kontens.idKategori = kategoris.id');
		$this->db->order_by('created_at', 'desc');
		$this->db->limit(5);
		$res =  $this->db->get()->result();	
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
		// echo json_encode($res);
	}

	function get_perangkat(){
		$this->db->select('jabatan');
		$this->db->select('nip');
		$this->db->select('nama');
		$this->db->select('photo');
		$this->db->from('perangkats');
		$this->db->order_by('createdAt', 'asc');
		$this->db->where('statusAnggota', '1');
		$res =  $this->db->get()->result();	
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
	}

	function backend_url(){
	    $url_akses = "/wps/assets/upload/post/";
		if(($_SERVER['HTTP_HOST'] == 'localhost')||($_SERVER['HTTP_HOST'] == '192.168.0.0')){
		    $url_akses = "/edesa/wps/assets/upload/post/";
		}

		return $url_akses;
	}
}
