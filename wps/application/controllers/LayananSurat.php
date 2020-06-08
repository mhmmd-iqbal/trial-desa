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
		$data['tittle'] = 'E-DESA | LAYANAN';
		$data['view']	= 'layanan/data.php';
		$data['script']	= 'javascript/administrasisurat';
		$this->load->view('iqbal', $data);
	}

	function add(){
		$data['tittle'] = 'E-DESA | LAYANAN';
		$data['view']	= 'layanan/add.php';
		$data['script']	= 'javascript/administrasisurat';
		$this->load->view('iqbal', $data);	
	}

	function kop_surat(){
		$data['tittle'] = 'E-DESA | LAYANAN';
		$data['view']	= 'layanan/kop_surat.php';
		$data['script']	= 'javascript/layanansurat';
		$this->load->view('iqbal', $data);
	}
}
