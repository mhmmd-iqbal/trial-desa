<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiAdmin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');

	}
	function addHakAkses(){
		$data  = array(
			'id' 		 => uniqid(),
			'accessName' => $this->input->post('namaPrivilage'), 
			'admin' 	 => $this->input->post('admin'), 
			'struktural' => $this->input->post('struktural'), 
			'kependudukan' => $this->input->post('kependudukan'), 
			'profile' 	 => $this->input->post('profile'), 
			'administrasi' => $this->input->post('administrasi'), 
			'verifikasi' => $this->input->post('verifikasi'), 
			'informasi'  => $this->input->post('informasi'), 
			'opendata' 	 => $this->input->post('opendata'), 
			'activated'  => TRUE,
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s')
		);
		$response 		= $this->MyModel->addData('access', $data);
		echo json_encode($response);
	}

	function getPrivilages(){
		$this->load->model('ModalPrivilage');
		$list = $this->ModalPrivilage->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$button = $field->activated == '1' ? '<button class="btn btn-sm btn-danger off" data-value="'.$field->id.'" >Non Aktifkan</button>' : '<button class="btn btn-sm btn-primary on" data-value="'.$field->id.'">Aktifkan</button>';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->accessName;
			$row[] = $field->activated == '1' ? '<div class="badge badge-info">Aktif</div>': '<div class="badge badge-danger">Non-Aktif</div>';
			$row[] = date('d-m-Y h:i:s', strtotime($field->created_at));
			$row[] = date('d-m-Y h:i:s', strtotime($field->updated_at));
			$row[] = '<button class="btn btn-sm btn-info m-1 info" value="'.$field->id.'">Detail</button>'.$button;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ModalPrivilage->count_all(),
			"recordsFiltered" => $this->ModalPrivilage->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	function getPrivilage($id=null){
		$this->load->model('ModalPrivilage');
		$where 	= array('id' => $id);
		$data 	= $this->ModalPrivilage->get_one_data($where)->row_array();
		echo json_encode($data);
	}

	function activated($id){
		$this->MyModel->action('update', 'access', ['activated' => TRUE], ['id' => $id]);
		$res = [
			'header'=> 'Updated Successfully',
			'msg' 	=> 'Hak Akses Diperbarui',
			'icon' 	=> 'success'
		];
		echo json_encode($res);
	}

	function nonactivated($id){
		$this->MyModel->action('update', 'access', ['activated' => FALSE], ['id' => $id]);
		$res = [
			'header'=> 'Updated Successfully',
			'msg' 	=> 'Hak Akses Diperbarui',
			'icon' 	=> 'success'
		];
		echo json_encode($res);
	}

	function optionPrivilage(){
		$this->load->model('ModalPrivilage');
		$data 	= $this->ModalPrivilage->get_select2_data()->result_array();
		foreach ($data as $i => $d) {
			$response[$i] = array(
				'id' 		=> $d['id'],
				'text' 		=> $d['accessName'],
				'selected'	=> FALSE
			);
		}

		echo json_encode($response);
	}

	function addAdmin(){
		$pass_gnt = strtoupper(uniqid());
		$data = array(
			'id'			=> uniqid(),
			'idAccess'		=> $this->input->post('idAccess'),
			'adminName'		=> $this->input->post('name'),
			'username'		=> $this->input->post('username'),
			'pass'			=> $this->hash_password($pass_gnt),
			'passGenerate'	=> $pass_gnt,
			'createdAt'		=> date('Y-m-d h:i:s'),
			'updatedAt'		=> date('Y-m-d h:i:s'),
			'deletedAt'		=> NULL
		);		
		$response 		= $this->MyModel->addData('admins', $data);
		echo json_encode($response);
	}

	function getAdmins(){
		$this->load->model('ModalAdmin');
		$list = $this->ModalAdmin->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$active = $field->deletedAt == NULL ? '<button class="btn btn-sm btn-danger m-1 delete" value="'.$field->id.'"><i class="fa fa-power-off"></i> Disabled Admin</button>' : '<button class="btn btn-sm btn-success m-1 recovery" value="'.$field->id.'"><i class="fa fa-check-square-o"></i> Enabled Admin</button>';
			$row[] = $no;
			$row[] = $field->adminName;
			$row[] = $field->username;
			$row[] = $field->accessName;
			$row[] = $field->deletedAt == null ? '<div class="badge badge-info">Aktif</div>': '<div class="badge badge-danger">Tidak Aktif</div>';
			$row[] = $field->passGenerate;
			$row[] = $field->createdAt;
			$row[] = '<button class="btn btn-sm btn-info m-1 update" value="'.$field->id.'">Update</button>'.$active.'<button class="btn btn-sm btn-danger m-1 reset" value="'.$field->id.'"><i class="fa fa-refresh" aria-hidden="true"></i > Reset Password</button>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ModalAdmin->count_all(),
			"recordsFiltered" => $this->ModalAdmin->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}


	function disabled_admin($id){
		$this->MyModel->action('update', 'admins', ['deletedAt' => date('Y-m-d h:i:s')], ['id' => $id]);
		$res = [
			'header'=> 'Updated Successfully',
			'msg' 	=> 'Admin Telah Dinonaktivasi',
			'icon' 	=> 'success'
		];
		echo json_encode($res);
	}

	function recovery_admin($id){
		$this->MyModel->action('update', 'admins', ['deletedAt' => NULL], ['id' => $id]);
		$res = [
			'header'=> 'Updated Successfully',
			'msg' 	=> 'Admin Telah Diaktifkan Kembali',
			'icon' 	=> 'success'
		];
		echo json_encode($res);
	}

	private function hash_password($password){
	   return password_hash($password, PASSWORD_BCRYPT);
	}
}