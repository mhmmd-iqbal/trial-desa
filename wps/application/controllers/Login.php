<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	public function index()	{
		$this->load->view('login');
	}

	function logout(){
		$this->session->sess_destroy();
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
		redirect($actual_link."/edesa");
	}
}
