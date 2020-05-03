<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');
		if($this->session->userdata('login') == NULL){
			$this->session->set_flashdata('error', 'Silahkan login terlebih dahulu');
			redirect(site_url('login'));
		}
		$this->MyModel->sess_privilage();
		 
	}

	public function index(){
		$data['tittle'] = 'E-DESA | DASHBOARD';
		$data['view']	= 'dashboard.php';
		$this->load->view('mainTemplate', $data);
	}

	public function template(){
		$data['tittle'] = 'Template View';
		$data['view']	= 'template.php';
		$this->load->view('mainTemplate', $data);
	}
}
