<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktural extends CI_Controller {
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
		$data['tittle'] = 'E-DESA | JABATAN';
		$data['view']	= 'struktural/data.php';
		$data['aksi']	= 'struktural/struktural.js';
		$this->load->view('mainTemplate', $data);
	}

	function add(){
		$data['tittle'] = 'E-DESA | JABATAN';
		$data['view']	= 'struktural/add.php';
		$data['aksi']	= 'struktural/struktural.js';
		$this->load->view('mainTemplate', $data);	
	}

	function jabatan(){
		$data['tittle'] = 'E-DESA | JABATAN';
		$data['view']	= 'struktural/jabatan.php';
		$data['aksi']	= 'struktural/jabatan.js';
		$this->load->view('mainTemplate', $data);	
	}
}