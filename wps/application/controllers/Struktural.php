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
		$data['script']	= 'javascript/struktural';
		$this->load->view('iqbal', $data);
	}

	function add(){
		$data['tittle'] = 'E-DESA | JABATAN';
		$data['view']	= 'struktural/add.php';
		$data['script']	= 'javascript/struktural';
		$this->load->view('iqbal', $data);	
	}

	function jabatan(){
		$data['tittle'] = 'E-DESA | JABATAN';
		$data['view']	= 'struktural/jabatan.php';
		$data['script']	= 'javascript/jabatan';
		$this->load->view('iqbal', $data);	
	}

	function detail($id){
		$this->db->where('id', $id);
		$this->db->from('perangkats');
		$data['data'] 	= (object) $this->db->get()->row_array();
		$data['tittle'] = 'E-DESA | JABATAN';
		$data['view']	= 'struktural/detail.php';
		$data['script']	= 'javascript/struktural';
		$this->load->view('iqbal', $data);	
	}
}