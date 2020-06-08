<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiSurat extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');

	}

	function addSurat(){
		$id 	= uniqid();
		$data 	= array(
			'id'			=> $id,
			'nmSurat' 		=> $this->input->post('nm_surat'),
			'noSurat' 		=> $this->input->post('no_surat'),
			'idPerangkat'   => $this->input->post('idJabatan'),
			'idAdmin'		=> $this->session->userdata('idAdmin'),
			'paragraf1' 	=> $this->input->post('paragraf1'),
			'paragraf2' 	=> $this->input->post('paragraf2'),
			'paragraf3' 	=> $this->input->post('paragraf3'),
			'createdAt'		=> date('Y-m-d h:i:s'),
			'updatedAt'		=> date('Y-m-d h:i:s'),
		);
		$this->MyModel->action('input', 'surats', $data);

		$list = [];
		$list = $this->input->post('ket1');
		if($list != NULL){
			foreach ($list as $i => $d) {
				$datalist = array(
					'id' 		 => uniqid(), 
					'keterangan' => $d,
					'idSurat'	 => $id
				);
				$this->MyModel->action('input', 'list1', $datalist);
			}
		}

		$list = $this->input->post('ket2');
		if($list != NULL){
			foreach ($list as $i => $d) {
				$datalist = array(
					'id' 		 => uniqid(), 
					'keterangan' => $d,
					'idSurat'	 => $id
				);
				$this->MyModel->action('input', 'list2', $datalist);
			}
		}
		$res = array(
			'header' => 'BERHASIL',
			"msg"	 => 'Data Berhasil Dimasukkan',
			'icon'	 => 'success'
		);
		echo json_encode($res);
	}

	function getSurats(){
		$this->load->model('ModalLayananSurat');
		$list = $this->ModalLayananSurat->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->nmSurat;
			// $row[] = $field->username;
			$row[] = $field->createdAt;
			$row[] = '<button class="btn btn-sm btn-info m-1 info" value="'.$field->id.'"><i class="fa fa-exclamation-triangle"></i></button>'.'<button class="btn btn-sm btn-success m-1 update" value="'.$field->id.'"><i class="fa fa-pencil-square-o"></i></button>'.'<button class="btn btn-sm btn-danger m-1 delete" value="'.$field->id.'"><i class="fa fa-trash-o"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ModalLayananSurat->count_all(),
			"recordsFiltered" => $this->ModalLayananSurat->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	function infoSurat($id){
		$this->load->model('ModalLayananSurat');
		$hasil = $this->ModalLayananSurat->info_surat($id);
		$hasil['list1'] = $this->ModalLayananSurat->list_surat($id, 'list1');
		$hasil['list2'] = $this->ModalLayananSurat->list_surat($id, 'list2');
		echo json_encode($hasil);
	}
}