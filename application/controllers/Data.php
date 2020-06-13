<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');		 
		$this->load->model('ModelHalaman');		 
		$this->load->model('ModelGrafik');		 
		$this->load->library('backurl');		 
	}


	function Gender(){
		$data ['data'] =  $this->ModelGrafik->data_jns_klm();
		$data['tittle'] = 'E-DESA | DATA JENIS KELAMIN';
		$data['view'] 	= 'data/gender';
		$data['active']	= 'data';
		$data['aksi']	= 'aksi/data';
		$data['url']	  = $this->backurl->main_url();
		$this->load->view('template', $data);
	}

	function Age(){
		$data['data']  	=  $this->ModelGrafik->data_usia();
		$data['tittle'] = 'E-DESA | DATA USIA';
		$data['view'] 	= 'data/age';
		$data['active']	= 'data';
		$data['aksi']	= 'aksi/data';
		$data['url']	  = $this->backurl->main_url();
		$this->load->view('template', $data);
	}

	function api_get_gender(){
		$res = $this->ModelGrafik->data_jns_klm();
		echo json_encode($res);
	}

	function api_get_age(){
		$res = $this->ModelGrafik->data_usia();
		echo json_encode($res);
	}
}