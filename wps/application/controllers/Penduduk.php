<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller {
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
		$data['tittle'] = 'E-DESA | PENDUDUK';
		$data['view']	= 'penduduk/data.php';
		$data['aksi']	= 'penduduk/penduduk.js';
		$this->load->view('mainTemplate', $data);
	}

	function add(){
		$data['tittle'] = 'E-DESA | PENDUDUK';
		$data['view']	= 'penduduk/add.php';
		$data['aksi']	= 'penduduk/penduduk.js';
		$this->load->view('mainTemplate', $data);	
	}
}