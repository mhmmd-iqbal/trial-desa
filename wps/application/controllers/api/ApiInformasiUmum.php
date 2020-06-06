<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiInformasiUmum extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');
	}

	function select_category(){
		$this->load->database();
		$this->db->select(['id', 'kategori']);
		$this->db->from('kategoris');
		$data = $this->db->get()->result_array();

		foreach ($data as $i => $d) {
			$response[$i] = array(
				'id' 		=> $d['id'],
				'text' 		=> $d['kategori'],
				'selected'	=> FALSE
			);
		}
		echo json_encode($response);
	}

	function show_kategori(){
		$this->load->model('ModalInformasiUmum');
		$list = $this->ModalInformasiUmum->get_datatables('kategoris');
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->kategori;
			$row[] = $field->created_at;
			$row[] = $field->updated_at;
			$row[] = '<button class="btn btn-sm btn-success m-1 update" value="'.$field->id.'"><i class="fa fa-pencil-square-o"></i></button>'.'<button class="btn btn-sm btn-danger m-1 delete" value="'.$field->id.'"><i class="fa fa-trash-o"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ModalInformasiUmum->count_all('kategoris'),
			"recordsFiltered" => $this->ModalInformasiUmum->count_filtered('kategoris'),
			"data" => $data,
		);
		echo json_encode($output);
	}

	function add_kategori(){
		$kategori = $this->input->post('kategori');
		$data     = [
			'kategori' 	=> $kategori,
			'id'		=> uniqid(),
			'created_at'=> date('Y-m-d h:i:s'), 
			'updated_at'=> date('Y-m-d h:i:s'), 
		];	
		$res = $this->MyModel->addData('kategoris', $data);
		echo json_encode($res);
	}

	function add_konten(){
		$user  		= $this->input->post('user');
		$judul 		= $this->input->post('judul');
		$idKategori = $this->input->post('idKategori');
		$konten 	= $this->input->post('konten');
		$updated_by = $this->input->post('user');
		$created_at = date('Y-m-d h:i:s');
		$updated_at = date('Y-m-d h:i:s');
		$status		= TRUE;
		$err 		= FALSE;
		if($_FILES['gambar']['name'] != ''){
			$config['upload_path']          = './assets/upload/post';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['file_name']            = time()."_".$_FILES['gambar']['name'];
			$config['overwrite']			= true;
			$this->load->library('upload', $config);
			$do_upload = $this->upload->do_upload('gambar');
			$gambar = $this->upload->data('file_name');

			if(!$do_upload){
		    	$res = array(
					'header' => 'Gagal Menyimpan Gambar',
					'msg' 	 => $this->upload->display_errors(),
					'icon'	 => 'error',
					'err'	 => TRUE 
				);	
				$err = TRUE;
			}
		}else{
			$gambar = null;
		}

		//Buat slug
        $string	  = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $judul);
        $trim	  = trim($string);
        $pre_slug = strtolower(str_replace(" ", "-", $trim));
        $url	  = date('d-m-y')."-".$pre_slug.'.html';

		$data = [
			'id' 		=> uniqid(),
			'user'		=> $user,
			'judul'		=> $judul,
			'idKategori'=> $idKategori,
			'konten'	=> $konten,
			'gambar'	=> $gambar,
			'status'	=> $status,
			'url'		=> $url,
			'created_at'=> $created_at,
			'updated_at'=> $updated_at,
			'updated_by'=> $updated_by,
		];

		if($err == FALSE){
			$res = $this->MyModel->addData('kontens', $data);
		}

		echo json_encode($res);
	}

	function show_konten(){
		$this->load->model('ModalInformasiUmum');
		$list = $this->ModalInformasiUmum->get_datatables('kontens');
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $field->judul;
			$row[] = $field->kategori;
			$row[] = $field->user;
			$row[] = $field->created_at;
			$row[] = $field->updated_at;
			$row[] = $field->status == '1' ? '<div class="badge badge-info">Ditampilkan</div>' : '<div class="badge badge-danger">Disembunyikan</div>';
			$row[] = '<a href="InformasiUmum/page/'.$field->url.'" class="btn btn-sm btn-info m-1 show" value="'.$field->id.'"><i class="fa fa-exclamation-circle"></i></a>'.'<button class="btn btn-sm btn-success m-1 update" value="'.$field->id.'"><i class="fa fa-pencil-square-o"></i></button>'.'<button class="btn btn-sm btn-danger m-1 delete" value="'.$field->id.'"><i class="fa fa-trash-o"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ModalInformasiUmum->count_all('kontens'),
			"recordsFiltered" => $this->ModalInformasiUmum->count_filtered('kontens'),
			"data" => $data,
		);
		echo json_encode($output);
	}
}