<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
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
		$data['kategori'] = $this->get_kategori();
		$data['tittle'] = 'E-DESA | '.$data['konten']->judul;
		$data['view'] 	= 'konten';
		$data['active']	= 'berita';
		$data['aksi']	= 'aksi/dashboard';
		$data['back_url'] = $this->url();

		$this->load->view('template', $data);
	}

	function get_konten(){
		$this->db->select('kategoris.kategori');
		$this->db->select(['kontens.judul', 'kontens.konten', 'kontens.user', 'kontens.gambar', 'kontens.created_at', 'kontens.url']);
		$this->db->from('kontens');
		$this->db->join('kategoris', 'kontens.idKategori = kategoris.id');
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
	function get_kategori(){
		$this->db->select('kategori');
		$this->db->from('kategoris');
		$res =  $this->db->get()->result();	
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
	}
	function url(){
		$http_req   = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) === 'on' ? "https://" : "http://";
		$server_url = $_SERVER['HTTP_HOST'];
		$back_url   = $http_req.$server_url."/wps/";
		if(( $server_url == 'localhost')||($server_url == '192.168.0.0')){
		    $back_url = $http_req.$server_url."/edesa/wps/";
		}
		return $back_url;
	}
}