<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');		 
	}

	function url(){
		$http_req   = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) === 'on' ? "https://" : "http://";
		$server_url = $_SERVER['HTTP_HOST'];
		$back_url   = $http_req.$server_url."/wps/";
		if(( $server_url == 'localhost')||($server_url == '192.168.0.0')){
		    $back_url = $http_req.$server_url."/edesa/wps/";
		}
		return $back_url;
	}

	public function index(){
		$data['tittle']   = 'E-DESA | HOME';
		$data['view'] 	  = 'dashboard';
		$data['active']	  = 'dashboard';
		$data['aksi']	  = 'aksi/dashboard';

		$data['konten']   = $this->get_konten();
		$data['visi']     = $this->get_visi();
		$data['misi']     = $this->get_misi();
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
	function get_visi(){
		$this->db->select('visi');
		$this->db->where('status', '1');
		$this->db->from('visis');
		$res = $this->db->get()->row_array();
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
	}

	function get_misi(){
		$this->db->select('misi');
		$this->db->where('status', '1');
		$this->db->from('misis');
		$res = $this->db->get()->row_array();
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
		// echo json_encode($res);
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
		$this->db->select(['judul', 'konten', 'user', 'gambar', 'created_at', 'url']);
		$this->db->from('kontens');
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
