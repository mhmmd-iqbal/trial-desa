<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class berita extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');		 
	}

	function halaman($p){
		$this->db->select([
			'kontens.judul', 
			'kontens.user', 
			'kontens.gambar', 
			'kontens.konten', 
			'kontens.url', 
			'kontens.created_at'
		]);
		$this->db->select('kategoris.kategori');
		$this->db->where('url', $p);
		$this->db->join('kategoris', 'kategoris.id = kontens.idKategori');
		$this->db->from('kontens');
		$data['konten'] = (object) $this->db->get()->row_array();
		$data['recent'] = $this->get_konten();
		$data['tittle'] = 'E-DESA | '.$data['konten']->judul;
		$data['view'] 	= 'konten';
		$data['active']	= 'berita';
		$data['aksi']	= 'aksi/dashboard';
		$this->load->view('template', $data);
	}

	function get_konten(){
		$this->db->select(['judul', 'konten', 'user', 'gambar', 'created_at', 'url']);
		$this->db->from('kontens');
		$this->db->order_by('created_at', 'desc');
		$this->db->limit(3);
		$res =  $this->db->get()->result();	
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
		// echo json_encode($res);
	}
}