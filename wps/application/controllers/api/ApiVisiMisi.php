<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiVisiMisi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');
	}

	function addVisi(){
		$data = array(
			'id' 		=> uniqid(),
			'visi'		=> $this->input->post('visi'),
			'status'	=> 0,
			'createdAt'	=> date('Y-m-d h:i:s')
		);

		$res = $this->MyModel->addData('visis', $data);
		echo json_encode($res);
	}

	function addMisi(){
		$data = array(
			'id' 		=> uniqid(),
			'misi'		=> $this->input->post('misi'),
			'status'	=> 0,
			'createdAt'	=> date('Y-m-d h:i:s')
		);

		$res = $this->MyModel->addData('misis', $data);
		echo json_encode($res);
	}

	function getVisis(){
		$this->load->model('ModalVisi');
		$list = $this->ModalVisi->get_datatables('visis');
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->visi;
			$row[] = $field->status == '1' ? '<div class="badge badge-info">Aktif</div>': '<div class="badge badge-danger">Non-Aktif</div>';			
			$row[] = '<button class="btn btn-sm btn-info m-1 check" value="'.$field->id.'"><i class="fa fa-check"></i></button>'.'<button class="btn btn-sm btn-success m-1 update" value="'.$field->id.'"><i class="fa fa-pencil-square-o"></i></button>'.'<button class="btn btn-sm btn-danger m-1 delete" value="'.$field->id.'"><i class="fa fa-trash-o"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ModalVisi->count_all(),
			"recordsFiltered" => $this->ModalVisi->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	function getMisis(){
		$this->load->model('ModalMisi');
		$list = $this->ModalMisi->get_datatables('visis');
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->misi;
			$row[] = $field->status == '1' ? '<div class="badge badge-info">Aktif</div>': '<div class="badge badge-danger">Non-Aktif</div>';			
			$row[] = '<button class="btn btn-sm btn-info m-1 check" value="'.$field->id.'"><i class="fa fa-check"></i></button>'.'<button class="btn btn-sm btn-success m-1 update" value="'.$field->id.'"><i class="fa fa-pencil-square-o"></i></button>'.'<button class="btn btn-sm btn-danger m-1 delete" value="'.$field->id.'"><i class="fa fa-trash-o"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ModalMisi->count_all(),
			"recordsFiltered" => $this->ModalMisi->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	function ativeVisi($id=null){
		$this->load->model('ModalVisi');
		$this->ModalVisi->unselect_visi();
		$this->ModalVisi->select_visi($id);
		echo json_encode(null);
	}

	function ativeMisi($id=null){
		$this->load->model('ModalMisi');
		$this->ModalMisi->unselect_misi();
		$this->ModalMisi->select_misi($id);
		echo json_encode(null);
	}

	function getNowVisi(){
		$this->load->model('ModalVisi');
		$respon = $this->ModalVisi->get_now_visi();
		echo json_encode($respon);
	}

	function getNowMisi(){
		$this->load->model('ModalMisi');
		$respon = $this->ModalMisi->get_now_misi();
		echo json_encode($respon);
	}

}