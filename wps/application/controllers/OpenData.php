<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OpenData extends CI_Controller {
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
		$data['tittle'] = 'E-DESA | OPEN DATA';
		$data['view']	= 'opendata/data.php';
		$data['script']	= 'javascript/opendata';
		$this->load->view('iqbal', $data);
	}
}