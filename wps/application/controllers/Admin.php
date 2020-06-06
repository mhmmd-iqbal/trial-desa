<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
		$data['tittle'] = 'E-DESA | ADMIN';
		$data['view']	= 'admin/data.php';
		$data['script']	= 'javascript/admin';
		$this->load->view('iqbal', $data);
	}

	public function privilage(){
		$data['tittle'] = 'E-DESA | ADMIN';
		$data['view']	= 'admin/privilage.php';
		$data['script']	= 'javascript/privilage';
		$this->load->view('iqbal', $data);	
	}
}