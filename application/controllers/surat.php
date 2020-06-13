<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');
		$this->load->library('backurl');		 
	}

	function index(){
		$p = $this->session->userdata('halaman');
		if($p == null){
			$p = 1; 
		}
		$data['p']		= $p;
		$data['surats'] = $this->MyModel->all_surat($p);
		$data['pagination'] = $this->MyModel->count_surats_pagination();
		$data['url'] 	= $this->backurl->main_url();

		$data['tittle'] = 'E-DESA | PERMOHONAN SURAT';
		$data['view'] 	= 'permohonan';
		$data['active']	= 'surat';
		$data['aksi']	= 'aksi/permohonan';
		$this->load->view('template', $data);
	}

	function post_halaman(){
		$halaman = $this->input->post('halaman');
		$this->session->set_userdata('halaman', $halaman);
		echo json_encode($halaman);
	}

	function create($id){
		$this->db->select([
			'surats.*',
			'perangkats.jabatan',
			'perangkats.nip',
			'perangkats.nama',
		]);
		$this->db->where('surats.id', $id);
		$this->db->from('surats');
		$this->db->join('perangkats', 'perangkats.id = surats.idPerangkat');
		$data['surat'] =  $this->db->get()->row_array();
		
		$this->db->select('keterangan');
		$this->db->where('idSurat', $data['surat']['id']);
		$this->db->from('list1');
		$data['surat']['list1'] = $this->db->get()->result_array();

		$this->db->select('keterangan');
		$this->db->where('idSurat', $data['surat']['id']);
		$this->db->from('list2');
		$data['surat']['list2'] = $this->db->get()->result_array();

		$data['url'] 	= $this->backurl->main_url();

		$data['tittle'] = 'E-DESA | PERMOHONAN SURAT';
		$data['view'] 	= 'create_permohonan';
		$data['active']	= 'surat';
		$data['aksi']	= 'aksi/permohonan';
		$this->load->view('template', $data);
	}
	
}
