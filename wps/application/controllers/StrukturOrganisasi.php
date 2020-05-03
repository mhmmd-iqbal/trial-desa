<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class strukturOrganisasi extends CI_Controller {
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
		$data['tittle'] = 'E-DESA | STRUKTUR ORGANISASI';
		$data['view']	= 'struktur/data.php';
		$data['aksi']	= 'struktur/strukturOrganisasi.js';
		$this->load->view('mainTemplate', $data);
	}
}
