<?php

class ModalInformasiUmum extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		$this->load->database();	
	}

	function cek_sambutan(){
		$this->db->from('sambutans');
		return $this->db->get()->num_rows();
	}

	function add_sambutan($data){
		$this->db->insert('sambutans',$data);
	}

	function update_sambutan($data){
		$this->db->where('id !=', null);
		$this->db->update('sambutans',$data);
	}

	function show_sambutan(){
		$this->db->select('sambutan');
		$this->db->from('sambutans');
		return $this->db->get()->row_array();
	}

	private function _get_query_kategoris(){
		$table = 'kategoris'; 
		$column_order = array(null, 'kategori'); 
		$column_search = array('kategori'); 
		$order = array('created_at' => 'asc');

		$this->db->from($table);
		$i = 0;
		foreach ($column_search as $item) {
			if($_POST['search']['value']) {		
				if($i===0) {
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($column_search) - 1 == $i) 
					$this->db->group_end(); 
			}
			$i++;
		}
		
		if(isset($_POST['order'])) {
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if(isset($order)) {
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	private function _get_query_kontens(){
		$table = 'kontens'; 
		$column_order = array('judul', 'kategori', 'user', null, null, null, null ); 
		$column_search = array('judul', 'kategori', 'user'); 
		$order = array('created_at' => 'asc');
		$this->db->select('kontens.id');
		$this->db->select('kontens.judul');
	    $this->db->select('kontens.user');
	    $this->db->select('kontens.status');
	    $this->db->select('kontens.url');
	    $this->db->select('kontens.created_at');
	    $this->db->select('kontens.updated_at');
	    $this->db->select('kategoris.kategori');
		$this->db->join('kategoris', 'kategoris.id = kontens.idKategori');

		$this->db->from($table);
		$i = 0;
		foreach ($column_search as $item) {
			if($_POST['search']['value']) {		
				if($i===0) {
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($column_search) - 1 == $i) 
					$this->db->group_end(); 
			}
			$i++;
		}
		
		if(isset($_POST['order'])) {
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if(isset($order)) {
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables($table){
		if($table == 'kategoris'){
			$this->_get_query_kategoris();
		}else if($table == 'kontens'){
			$this->_get_query_kontens();
		}

		if($_POST['length'] != -1){
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($table){
		if($table == 'kategoris'){
			$this->_get_query_kategoris();
		}else if($table == 'kontens'){
			$this->_get_query_kontens();
		}
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($table){
		$this->db->from($table);
		return $this->db->count_all_results();
	}

}