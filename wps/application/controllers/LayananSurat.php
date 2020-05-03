<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LayananSurat extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('login') == NULL){
			$this->session->set_flashdata('error', 'Silahkan login terlebih dahulu');
			redirect(site_url('login'));
		}
		$this->load->model('MyModel');
		$this->MyModel->sess_privilage();
	}

	function index(){
		// print_r($this->session->userdata());
		$data['tittle'] = 'E-DESA | LAYANAN';
		$data['view']	= 'layanan/data.php';
		$data['aksi']	= 'layanan/layanan.js';
		$this->load->view('mainTemplate', $data);
	}

	function add(){
		$data['tittle'] = 'E-DESA | LAYANAN';
		$data['view']	= 'layanan/add.php';
		$data['aksi']	= 'layanan/layanan.js';
		$this->load->view('mainTemplate', $data);	
	}
}
