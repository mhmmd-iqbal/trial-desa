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
		echo json_encode($res);
	}

	function gambar_sambutan(){
		if($_FILES['gambar']['name'] != ''){
			$config['upload_path']          = './assets/upload/gambar/';
		    $config['allowed_types']        = 'jpg|jpeg|png';
		    $config['file_name']            = time()."_Kata_Sambutan";
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
		    }else{
		    	$data_gmb = $this->upload->data();  
                $config['image_library'] = 'gd2';  
                $config['source_image'] = './assets/upload/gambar/'.$data_gmb["file_name"];  
                $config['create_thumb'] = FALSE;  
                $config['maintain_ratio'] = TRUE;  
                $config['quality'] = '30%';  
                $config['width'] = 500;  
                $config['new_image'] = './assets/upload/gambar/'.$data_gmb["file_name"];  
                $this->load->library('image_lib', $config);  
                $this->image_lib->resize();
                $photo = $data_gmb['file_name'];

           		$data = [
           			'id' 	 	 => uniqid(),
           			'gambar' 	 => $photo,
           			'updated_at' => date('Y-m-d h:i:s')	
           		];
           		$res = $this->MyModel->addData('gambars', $data);
		    }
		}
		echo  json_encode($res);
	}

	function get_gambar_sambutan(){
		$this->db->from('gambars');
		$this->db->order_by('updated_at', 'desc');
		$res = $this->db->get()->row_array();
		echo json_encode($res);
	}

	function add_logo(){
		if($_FILES['logo']['name'] != ''){
			$config['upload_path']          = './assets/upload/logo/';
		    $config['allowed_types']        = 'jpg|jpeg|png';
		    $config['file_name']            = "logo_".time();
		    $config['overwrite']			= true;
		    $this->load->library('upload', $config);
		    $do_upload = $this->upload->do_upload('logo');
		    if(!$do_upload){
		    	$res = array(
					'header' => 'Gagal Menyimpan Gambar',
					'msg' 	 => $this->upload->display_errors(),
					'icon'	 => 'error',
					'err'	 => TRUE 
				);	
		    }else{
		    	$data_gmb = $this->upload->data();  
                $config['image_library'] = 'gd2';  
                $config['source_image'] = './assets/upload/logo/'.$data_gmb["file_name"];  
                $config['create_thumb'] = FALSE;  
                $config['maintain_ratio'] = TRUE;  
                $config['quality'] = '50%';  
                $config['width'] = 400;  
                $config['new_image'] = './assets/upload/logo/'.$data_gmb["file_name"];  
                $this->load->library('image_lib', $config);  
                $this->image_lib->resize();
                $photo = $data_gmb['file_name'];

           		$data = [
           			'id' 	 	 => uniqid(),
           			'logo' 	 	 => $photo,
           			'status'	 => FALSE,
           			'created_at' => date('Y-m-d h:i:s'),	
           			'updated_at' => date('Y-m-d h:i:s')	
           		];
           		$res = $this->MyModel->addData('logos', $data);
		    }
		}
		echo  json_encode($res);
	}

	function getLogo(){
		$this->load->model('ModalLogo');
		$list = $this->ModalLogo->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$button = $field->status == '0' ? '<button class="btn btn-sm btn-primary m-1 on" value="'.$field->id.'">pilih Logo</button>' : '';
			$gambar = '<a href="#" class="show_logo" data-value="'.$field->logo.'"><img src="'.base_url().'assets/upload/logo/'.$field->logo.'" style="max-width: 100px"></a>';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $gambar;
			$row[] = $field->status == '1' ? '<div class="badge badge-info">Sedang Aktif</div>': '<div class="badge badge-danger">Tidak Aktif</div>';
			$row[] = date('d-m-Y h:i:s', strtotime($field->created_at));
			$row[] = $button.'<button class="btn btn-sm btn-danger m-1 delete" value="'.$field->id.'">Hapus Logo</button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ModalLogo->count_all(),
			"recordsFiltered" => $this->ModalLogo->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	function select_logo($id){
		$res = null;
		$disable = $this->db->update('logos', ['status' => FALSE]);
		if($disable){
			$res = $this->MyModel->updateData('logos', ['status' => TRUE], ['id' => $id]);
		}
		echo json_encode($res);
	}

	function get_active_logo(){
		$this->db->select('logo');
		$this->db->from('logos');
		$this->db->where('status', TRUE);
		$res = $this->db->get()->row_array();
		echo json_encode($res);
	}

}