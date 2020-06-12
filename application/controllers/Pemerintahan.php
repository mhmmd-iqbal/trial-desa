<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class pemerintahan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');		 
		$this->load->model('ModelHalaman');		 
		$this->load->library('backurl');		 
	}

	function index(){

		$data['tittle']   = 'E-DESA | Wilayah';
		$data['view'] 	  = 'pemerintahan';
		$data['active']	  = 'tentang';
		$data['aksi']	  = 'aksi/tentang';
		$data['jabatan']  = $this->ModelHalaman->get_penjabat();
		$data['url']	  = $this->backurl->main_url();

		$this->load->view('template', $data);

	}

}