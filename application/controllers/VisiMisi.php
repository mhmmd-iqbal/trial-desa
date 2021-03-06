<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class VisiMisi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('ModelHalaman');		 		
		$this->load->model('MyModel');		 
	}

	function index(){
		$data['visi']     = $this->ModelHalaman->get_visi();
		$data['misi']     = $this->ModelHalaman->get_misi();

		$data['tittle']   = 'E-DESA | VISI DAN MISI';
		$data['view'] 	  = 'visimisi';
		$data['active']	  = 'tentang';
		$data['aksi']	  = 'aksi/tentang';

		$this->load->view('template', $data);


	}

}