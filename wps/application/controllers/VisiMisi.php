<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VisiMisi extends CI_Controller {
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
		$data['tittle'] = 'E-DESA | VISI MISI';
		$data['view']	= 'visimisi/data.php';
		$data['aksi']	= 'visimisi/visimisi.js';
		$this->load->view('mainTemplate', $data);
	}

	function add_visi(){
		$data['tittle'] = 'E-DESA | VISI MISI';
		$data['view']	= 'visimisi/add_visi.php';
		$data['aksi']	= 'visimisi/visimisi.js';
		$this->load->view('mainTemplate', $data);
	}

	function add_misi(){
		$data['tittle'] = 'E-DESA | VISI MISI';
		$data['view']	= 'visimisi/add_misi.php';
		$data['aksi']	= 'visimisi/visimisi.js';
		$this->load->view('mainTemplate', $data);
	}
}
