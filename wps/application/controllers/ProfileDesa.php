<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileDesa extends CI_Controller {
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
		$data['view']	= 'profiledesa/data.php';
		$data['script']	= 'javascript/profiledesa';
		$this->load->view('iqbal', $data);
	}

	function add_visi(){
		$data['tittle'] = 'E-DESA | VISI MISI';
		$data['view']	= 'profiledesa/add_visi.php';
		$data['script']	= 'javascript/profiledesa';
		$this->load->view('iqbal', $data);
	}

	function add_misi(){
		$data['tittle'] = 'E-DESA | VISI MISI';
		$data['view']	= 'profiledesa/add_misi.php';
		$data['script']	= 'javascript/profiledesa';
		$this->load->view('iqbal', $data);
	}
}
