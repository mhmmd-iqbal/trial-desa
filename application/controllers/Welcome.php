<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');		 
	}

	public function index(){
		$data['tittle'] = 'E-DESA | HOME';
		$data['view'] 	= 'dashboard';
		$data['active']	= 'dashboard';
		$data['aksi']	= 'aksi/dashboard';

		$data['konten'] = $this->get_konten();
		$data['visi']   = $this->get_visi();
		$data['misi']   = $this->get_misi();
		$data['sambutan']   = $this->get_sambutan();
		$data['perangkat']	= $this->get_perangkat();
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
		// echo json_encode($res);
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
		// echo json_encode($res);
	}

	function get_sambutan(){
		$this->db->select('sambutan');
		$this->db->from('sambutans');
		$res = $this->db->get()->row_array();
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
		// echo json_encode($res);
	}

	function get_konten(){
		$this->db->select(['judul', 'konten', 'user', 'gambar', 'created_at', 'url']);
		$this->db->from('kontens');
		$this->db->order_by('created_at', 'desc');
		$this->db->limit(5);
		$res =  $this->db->get()->result();	
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
		// echo json_encode($res);
	}

	function get_perangkat(){
		$this->db->select('jabatan');
		$this->db->select('nip');
		$this->db->select('nama');
		$this->db->select('photo');
		$this->db->from('perangkats');
		$this->db->order_by('createdAt', 'asc');
		$this->db->where('statusAnggota', '1');
		$res =  $this->db->get()->result();	
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
	}
}
