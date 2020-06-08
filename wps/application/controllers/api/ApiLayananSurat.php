<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiLayananSurat extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MyModel');
	}

	function add_kop(){
		if($_FILES['gambar']['name'] != ''){
			$config['upload_path']          = './assets/upload/kop/';
		    $config['allowed_types']        = 'jpg|jpeg|png';
		    $config['file_name']            = time()."_kop_surat";
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
		    }
		    else{
		    	$data_gmb = $this->upload->data();  
       //          $config['image_library'] = 'gd2';  
       //          $config['source_image'] = './assets/upload/kop/'.$data_gmb["file_name"];  
       //          $config['create_thumb'] = FALSE;  
       //          $config['maintain_ratio'] = TRUE;  
       //          $config['quality'] = '80%';  
       //          $config['width'] = 500;  
       //          $config['new_image'] = './assets/upload/kop/'.$data_gmb["file_name"];  
       //          $this->load->library('image_lib', $config);  
       //          $this->image_lib->resize();
                $photo = $data_gmb['file_name'];
                $data  = [
                	'id' => uniqid(),
                	'kop' => $photo,
                	'created_at' => date('Y-m-d h:i:s')
                ];
                $res = $this->MyModel->addData('kopsurats', $data);
            }
	        echo json_encode($res);    
        }		
	}

	function show_kop_surat(){
		$this->load->model('ModalKopSurat');
		$list = $this->ModalKopSurat->get_datatables('kontens');
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$image = '<img src="'.base_url().'assets/upload/kop/'.$field->kop.'" alt="" style="max-width: 700px">';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $image;
			$row[] = $field->created_at;
			$row[] = '<button class="btn btn-sm btn-info m-1 info" value="'.$field->id.'"><i class="fa fa-exclamation-triangle"></i></button>'.'<button class="btn btn-sm btn-danger m-1 delete" value="'.$field->id.'"><i class="fa fa-trash-o"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ModalKopSurat->count_all('kontens'),
			"recordsFiltered" => $this->ModalKopSurat->count_filtered('kontens'),
			"data" => $data,
		);
		echo json_encode($output);
	}
}