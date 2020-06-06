<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiProfileDesa extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');
	}

	function add_sambutan(){
		$sambutan = $this->input->post('sambutan');
		$data     = array(
			'id'		 => uniqid(),
			'sambutan'   => $sambutan,
			'created_at' => date('Y-m-d h:i:s'),
			'created_by' => $this->session->userdata('username')
		);
		$this->load->model('ModalInformasiUmum');
		$cek = $this->ModalInformasiUmum->cek_sambutan();
		if($cek == 0){
			$this->ModalInformasiUmum->add_sambutan($data);
			$res = [
				'header' => 'success', 		
				'msg' 	 => 'Kata Sambutan Telah Diperbarui',
				'icon'	 => 'success' 		
			];
		}else{
			$this->ModalInformasiUmum->update_sambutan($data);
			$res = [
				'header' => 'success', 		
				'msg' 	 => 'Kata Sambutan Telah Diperbarui',
				'icon'	 => 'success' 		
			];
		}

		echo json_encode($res);
	}

	function show_sambutan(){
		$this->load->model('ModalInformasiUmum');
		$res = $this->ModalInformasiUmum->show_sambutan();
		if($res){
			echo json_encode($res);
		}else{
			echo json_encode(null);
		}
	}
}