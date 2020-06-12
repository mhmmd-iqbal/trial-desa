<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class wilayah extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');		 
	}

	function index(){

		$data['tittle']   = 'E-DESA | Wilayah';
		$data['view'] 	  = 'wilayah';
		$data['active']	  = 'tentang';
		$data['aksi']	  = 'aksi/tentang';

		$this->load->view('template', $data);
	}
}