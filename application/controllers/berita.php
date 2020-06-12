<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');		 
		$this->load->model('ModelHalaman');		 
		$this->load->library('backurl');		 
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
		$this->db->from('kontens');
		$this->db->join('kategoris', 'kategoris.id = kontens.idKategori');
		$data['konten'] = (object) $this->db->get()->row_array();
		$data['recent'] = $this->ModelHalaman->get_konten();
		$data['kategori'] = $this->ModelHalaman->get_kategori();
		$data['tittle'] = 'E-DESA | '.$data['konten']->judul;
		$data['view'] 	= 'konten';
		$data['active']	= 'berita';
		$data['aksi']	= 'aksi/dashboard';
		$data['url']	  = $this->backurl->main_url();

		$this->load->view('template', $data);
	}
}