<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiLogin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');
	}
	
	function login(){
		$username    = $this->input->post('username');
		$pass 		 = $this->input->post('password'); 
		$this->db->where(array('username' => $username));
		$this->db->select('pass');
		$this->db->select('id');
		$this->db->select('idPrivilages');
		$admins = $this->db->get('admins')->row_array();
		$pass_encrypt = $admins['pass'];
		$login = $this->hash_password_decrypt($pass, $pass_encrypt);	
		if($login == TRUE){
			$response = array(
				'idAdmin' 	=> $admins['id'],
				'akses' 	=> $admins['idPrivilages'],
				'username' 	=> $username,
				'login'		=> TRUE 
			);
			$this->session->set_userdata($response);
			$data = [
				'ipaddress'	=> $this->getUserIpAddr(),
				'username'	=> $username
			];
			$this->MyModel->action('input', 'logs', $data);
		}else{
			$response = array(
				'login'		=> FALSE
			);
		}
		echo json_encode($response);
	}

	private function hash_password_decrypt($password, $pass_encrypt){
		return password_verify($password, $pass_encrypt);
	}

	function getUserIpAddr(){
	    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }else{
	        $ip = $_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}
}