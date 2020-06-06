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
		$this->load->view('template', $data);
	}

	function post_halaman(){
		$halaman = $this->input->post('halaman');
		$this->session->set_userdata('halaman', $halaman);
		echo json_encode(null);
	}
}
