<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiPenduduk extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');
	}
	
	function addPenduduk(){
		$data = array(
			'id'		=> uniqid(),
			'nama'		=> $this->input->post('nama'),
			'nik'		=> $this->input->post('nik'),
			'jnsKlm'	=> $this->input->post('jenisKelamin'),
			'agama'		=> $this->input->post('agama'),
			'tmpLahir'	=> $this->input->post('tmpLahir'),
			'tglLahir'	=> $this->input->post('tglLahir'),
			'noHp'		=> $this->input->post('noHp'),
			'dusun'		=> $this->input->post('dusun'),
			'alamat'	=> $this->input->post('alamat'),
			'status'	=> TRUE,
			'createdAt'	=> date('Y-m-d h:i:s'),
			'updatedAt'	=> date('Y-m-d h:i:s')
		);		
		$response 		= $this->MyModel->addData('penduduks', $data);
		echo json_encode($response);

	}

	function getPenduduks(){
		$this->load->model('ModalPenduduk');
		$list = $this->ModalPenduduk->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$verification = $field->status == '0' ? '<button class="btn btn-sm btn-primary m-1 verify"><i class="fa fa-check-square-o"></i> </button>' : '';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->nama;
			$row[] = $field->nik;
			$row[] = $field->dusun;
			$row[] = $field->jnsKlm;
			$row[] = $field->status == '1' ? '<div class="badge badge-info">Terverifikasis</div>': '<div class="badge badge-danger">Data Baru Belum Diverifikasi</div>';
			$row[] = '<button class="btn btn-sm btn-info m-1 info" value="'.$field->id.'"><i class="fa fa-user"></i></button>'.'<button class="btn btn-sm btn-success m-1 update" value="'.$field->id.'"><i class="fa fa-pencil-square-o"></i></button>'.'<button class="btn btn-sm btn-danger m-1 delete" value="'.$field->id.'"><i class="fa fa-trash-o"></i></button>'.$verification;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ModalPenduduk->count_all(),
			"recordsFiltered" => $this->ModalPenduduk->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}
}