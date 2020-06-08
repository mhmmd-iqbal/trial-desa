<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class surat extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');		 
	}

	function index(){
		$p = $this->session->userdata('halaman');
		if($p == null){
			$p = 1; 
		}
		$data['p']		= $p;
		$data['surats'] = $this->MyModel->all_surat($p);
		$data['pagination'] = $this->MyModel->count_surats_pagination();

		$data['tittle'] = 'E-DESA | PERMOHONAN SURAT';
		$data['view'] 	= 'permohonan';
		$data['active']	= 'surat';
		$data['aksi']	= 'aksi/permohonan';
		$data['back_url'] = $this->url();
		$this->load->view('template', $data);
	}

	function post_halaman(){
		$halaman = $this->input->post('halaman');
		$this->session->set_userdata('halaman', $halaman);
		echo json_encode(null);
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
}
