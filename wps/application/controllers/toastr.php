<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class toastr extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
	}
 
	public function success()
	{
      $this->session->set_flashdata('success', 'Data telah tersimpan');
	}
}