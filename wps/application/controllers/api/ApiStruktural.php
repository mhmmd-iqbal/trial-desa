<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiStruktural extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');
	}
	
	function addJabatan(){
		$data = array(
			'id'		=> uniqid(),
			'jabatan'	=> $this->input->post('jabatan'),
			'status'	=> TRUE,
			'createdAt'	=> date('Y-m-d h:i:s'),
			'updatedAt'	=> date('Y-m-d h:i:s')
		);		
		$response 		= $this->MyModel->addData('jabatans', $data);
		echo json_encode($response);

	}

	function getJabatans(){
		$this->load->model('ModalJabatan');
		$list = $this->ModalJabatan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$button = $field->status == '1' ? '<button class="btn btn-sm btn-danger m-1">Non Aktifkan</button>' : '<button class="btn btn-sm btn-primary m-1">Aktifkan</button>';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->jabatan;
			$row[] = $field->status == '1' ? '<div class="badge badge-info">Aktif</div>': '<div class="badge badge-danger">Non-Aktif</div>';
			$row[] = date('d-m-Y h:i:s', strtotime($field->createdAt));
			$row[] = date('d-m-Y h:i:s', strtotime($field->updatedAt));
			$row[] = '<button class="btn btn-sm btn-info m-1 info" value="'.$field->id.'">Detail</button>'.$button;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ModalJabatan->count_all(),
			"recordsFiltered" => $this->ModalJabatan->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	function getJabatan($id=null){
		$this->load->model('ModalJabatan');
		$where 	= array('id' => $id);
		$data 	= $this->ModalJabatan->get_one_data($where)->row_array();
		echo json_encode($data);
	}

	function optionJabatan(){
		$this->load->model('ModalJabatan');
		$data 	= $this->ModalJabatan->get_select2_data()->result_array();
		foreach ($data as $i => $d) {
			$response[$i] = array(
				'id' 		=> $d['jabatan'],
				'text' 		=> $d['jabatan'],
				'selected'	=> FALSE
			);
		}
		echo json_encode($response);
	}

	function simpanData(){
		$err = FALSE;
		if($_FILES['gambar']['name'] == ''){
			$photo = 'no_image.png';
			$err   = FALSE;
		}else{
			$config['upload_path']          = './assets/upload/';
		    $config['allowed_types']        = 'jpg|jpeg|png';
		    $config['file_name']            = time()."_".uniqid();
		    $config['overwrite']			= true;
		    $this->load->library('upload', $config);
		    $do_upload = $this->upload->do_upload('gambar');

		    if(!$do_upload){
		    	$res = array(
					'header' => 'Gagal Menyimpan Gambar',
					'msg' 	 => $this->upload->display_errors(),
					'icon'	 => 'error',
					'err'	 => TRUE 
				);	
				$err = TRUE;	
		    }else{
		    	$data_gmb = $this->upload->data();  
                $config['image_library'] = 'gd2';  
                $config['source_image'] = './assets/upload/'.$data_gmb["file_name"];  
                $config['create_thumb'] = FALSE;  
                $config['maintain_ratio'] = TRUE;  
                $config['quality'] = '50%';  
                $config['width'] = 500;  
                $config['new_image'] = './assets/upload/'.$data_gmb["file_name"];  
                $this->load->library('image_lib', $config);  
                $this->image_lib->resize();

                $photo = $data_gmb['file_name'];
				$err = FALSE;	
		    }
		}

		if($err == TRUE){
			echo json_encode($res);
		}else{
			$jabatan 	  = $this->input->post('jabatan');
			$nama 		  = $this->input->post('nama');
			$nip 		  = $this->input->post('nip');
			$jenisKelamin = $this->input->post('jenisKelamin');
			$agama 		  = $this->input->post('agama');
			$tmpLahir 	  = $this->input->post('tmpLahir');
			$tglLahir 	  = $this->input->post('tglLahir');
			$noHp 	 	  = $this->input->post('noHp');
			$alamat 	  = $this->input->post('alamat');

			$data = array(
				'id'			=> uniqid(),
				'jabatan'		=> $jabatan,
				'nip'			=> $nip,
				'nama'			=> $nama,
				'jenisKelamin' 	=> $jenisKelamin,
				'tmpLahir'		=> $tmpLahir,
				'tglLahir'		=> $tglLahir,
				'noHp'			=> $noHp,
				'agama'			=> $agama,
				'alamat'		=> $alamat,
				'photo'			=> $photo,
				'statusAnggota' => TRUE,
				'createdAt'		=> date('Y-m-d h:i:s'),
				'updatedAt'		=> date('Y-m-d h:i:s'),
			);
			$res = $this->MyModel->addData('perangkats', $data);
			echo json_encode($res);
		}
	}

	function getStrukturals(){
		$this->load->model('ModalStruktural');
		$list = $this->ModalStruktural->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			// $button = $field->statusAnggota == '1' ? '<button class="btn btn-sm btn-danger m-1">Non Aktifkan</button>' : '<button class="btn btn-sm btn-primary m-1">Aktifkan</button>';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->nama;
			$row[] = $field->nip;
			$row[] = $field->jabatan;
			$row[] = strtoupper($field->jenisKelamin);
			$row[] = $field->noHp;
			$row[] = $field->statusAnggota == '1' ? '<div class="badge badge-info">Aktif</div>': '<div class="badge badge-danger">Non-Aktif</div>';
			$row[] = '<button class="btn btn-sm btn-info m-1 info" value="'.$field->id.'">Detail</button>'.'<button class="btn btn-sm btn-danger m-1 info" delete="'.$field->id.'">Hapus</button>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ModalStruktural->count_all(),
			"recordsFiltered" => $this->ModalStruktural->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	function getAllStruktural(){
		$this->db->select('id');
		$this->db->select('jabatan');
		$this->db->select('nip');
		$this->db->select('nama');
		$this->db->where(['statusAnggota' => '1']);
		$response = $this->db->get('perangkats')->result_array();
		echo json_encode($response);
	}
}