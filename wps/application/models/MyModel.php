<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model{
	public function action($act, $table, $data=null, $where=null){
		if(!is_null($where)){
			$this->db->where($where);
		}

		switch ($act) {
			case 'input'	: $this->db->insert($table,$data); break;
			case 'update'	: $this->db->update($table,$data); break;
			case 'delete'	: $this->db->delete($table); break;			
			default: break;
		}
	}
	public function addData($table, $data){
		if($this->db->insert($table, $data) === FALSE){
			$msg = $this->db->error('message');
			return array(
				'msg' 		=> $msg['message'],
				'header'	=> 'GAGAL',
				'icon'		=> 'error',
				'err'		=> TRUE
			);
		}
		return array(
				'msg' 		=> 'Insert Sukses',
				'header'	=> 'BERHASIL',
				'icon'		=> 'success',
				'err'		=> FALSE
			);
	}

	public function sess_privilage(){
		$this->session->unset_userdata('list_akses');
		$id = $this->session->userdata('akses');
		$this->db->where(['id' => $id]);
	 	$list_akses = $this->db->get('access')->row_array();
		$this->session->set_userdata('list_akses', $list_akses);
	}
}

?>