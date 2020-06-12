<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class VisiMisi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');		 
	}

	function index(){
		$data['visi']     = $this->get_visi();
		$data['misi']     = $this->get_misi();

		$data['tittle']   = 'E-DESA | VISI DAN MISI';
		$data['view'] 	  = 'visimisi';
		$data['active']	  = 'tentang';
		$data['aksi']	  = 'aksi/tentang';

		$this->load->view('template', $data);


	}

	function get_visi(){
		$this->db->select('visi');
		$this->db->where('status', '1');
		$this->db->from('visis');
		$res = $this->db->get()->row_array();
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
	}

	function get_misi(){
		$this->db->select('misi');
		$this->db->where('status', '1');
		$this->db->from('misis');
		$res = $this->db->get()->row_array();
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
	}
}