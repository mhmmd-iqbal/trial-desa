<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformasiUmum extends CI_Controller {
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
		$data['tittle'] = 'E-DESA | INFORMASI UMUM';
		$data['view']	= 'informasi/data.php';
		$data['script']	= 'javascript/berita';
		$this->load->view('iqbal', $data);
	}

	function page($p=null){
		$this->load->database();
		$this->db->select('kontens.*');
		$this->db->select('kategoris.kategori');
		$this->db->join('kategoris', 'kategoris.id = kontens.idKategori');
		$this->db->where('url', $p);
		$this->db->from('kontens');
		$data['konten'] = $this->db->get()->row_array();
		if($data['konten'] != null){
			$data['tittle'] = 'E-DESA | KONTEN';
			$data['view']	= 'informasi/konten.php';
			$data['script']	= 'javascript/detailberita';
			$this->load->view('iqbal', $data);
		}else{
			redirect(site_url('My404'));
		}
	}

	function add(){
		$data['tittle'] = 'E-DESA | INFORMASI UMUM';
		$data['view']	= 'informasi/add.php';
		$data['script']	= 'javascript/post';
		$this->load->view('iqbal', $data);
	}

	function list(){
		$data['tittle'] = 'E-DESA | KATEGORI INFORMASI';
		$data['view']	= 'informasi/list.php';
		$data['script']	= 'javascript/list';
		$this->load->view('iqbal', $data);
	}
} 