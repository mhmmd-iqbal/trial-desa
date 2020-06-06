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
		$data['script']	= 'javascript/penduduk';
		$this->load->view('iqbal', $data);
	}

	function add(){
		$data['tittle'] = 'E-DESA | PENDUDUK';
		$data['view']	= 'penduduk/add.php';
		$data['script']	= 'javascript/penduduk';
		$this->load->view('iqbal', $data);	
	}

	function dusun(){
		echo "string";
	}

	function profesi(){
		echo "string";
	}

	function kk(){
		echo "string";
	}

}