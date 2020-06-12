<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainApi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');

	}
	function cekAdmin($nik){
		$this->db->where('nik', $nik);
		$this->db->where('status', '1');
		$this->db->from('penduduks');
		$cek = $this->db->get()->num_rows();
		if($cek > 0 ){
			$res = [
				'err' => FALSE,
				'msg' => 'Data Sesuai'
			];
		}else{
			$res = [
				'err' => TRUE,
				'msg' => 'Data Tidak Ditemukan'
			];
		}
		echo json_encode($res);
	}
}