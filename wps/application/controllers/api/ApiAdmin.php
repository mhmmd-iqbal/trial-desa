<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiAdmin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');

	}
	
	function addPrivilage(){
		$data = array(
			'id'		=> uniqid(),
			'priviName'	=> $this->input->post('namaPrivilage'),
			'm1m1'		=> $this->input->post('dataAdmin'),
			'm1m2'		=> $this->input->post('dataStruktural'),
			'm1m3'		=> $this->input->post('dataPenduduk'),
			'm1m4'		=> $this->input->post('dataKategori'),
			'm2m1'		=> $this->input->post('strukturOrg'),
			'm2m2'		=> $this->input->post('visiMisi'),
			'm2m3'		=> $this->input->post('potensiDesa'),
			'm3m1'		=> $this->input->post('layananSurat'),
			'm3m2'		=> $this->input->post('verifikasiSurat'),
			'm3m3'		=> $this->input->post('dataAdmSurat'),
			'm4m1'		=> $this->input->post('informasiUmum'),
			'm4m2'		=> $this->input->post('photoGaleri'),
			'm4m3'		=> $this->input->post('dokumen'),
			'active'	=> TRUE,
			'createdAt'	=> date('Y-m-d h:i:s'),
			'updatedAt'	=> date('Y-m-d h:i:s')
		);		
		$response 		= $this->MyModel->addData('privilages', $data);
		echo json_encode($response);

	}

	function getPrivilages(){
		$this->load->model('ModalPrivilage');
		$list = $this->ModalPrivilage->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$button = $field->active == '1' ? '<button class="btn btn-sm btn-danger m-1">Non Aktifkan</button>' : '<button class="btn btn-sm btn-primary m-1">Aktifkan</button>';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->priviName;
			$row[] = $field->active == '1' ? '<div class="badge badge-info">Aktif</div>': '<div class="badge badge-danger">Non-Aktif</div>';
			$row[] = date('d-m-Y h:i:s', strtotime($field->createdAt));
			$row[] = date('d-m-Y h:i:s', strtotime($field->updatedAt));
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

	function optionPrivilage(){
		$this->load->model('ModalPrivilage');
		$data 	= $this->ModalPrivilage->get_select2_data()->result_array();
		foreach ($data as $i => $d) {
			$response[$i] = array(
				'id' 		=> $d['id'],
				'text' 		=> $d['priviName'],
				'selected'	=> FALSE
			);
		}

		echo json_encode($response);
	}

	function addAdmin(){
		$pass_gnt = strtoupper(uniqid());
		$data = array(
			'id'			=> uniqid(),
			'idPrivilages'	=> $this->input->post('idPrivilages'),
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
			$row[] = $no;
			$row[] = $field->adminName;
			$row[] = $field->username;
			$row[] = $field->priviName;
			$row[] = $field->passGenerate;
			$row[] = $field->createdAt;
			$row[] = '<button class="btn btn-sm btn-info m-1 update" value="'.$field->id.'">Update</button>'.'<button class="btn btn-sm btn-danger m-1 delete" value="'.$field->id.'">Delete</button>'.'<button class="btn btn-sm btn-danger m-1 reset" value="'.$field->id.'"><i class="fa fa-refresh" aria-hidden="true"></i > Reset Password</button>';

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

	private function hash_password($password){
	   return password_hash($password, PASSWORD_BCRYPT);
	}
}