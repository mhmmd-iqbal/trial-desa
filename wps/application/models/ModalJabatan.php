<?php

class ModalJabatan extends CI_Model {

	var $table = 'jabatans'; 
	var $column_order = array(null, 'jabatan'); 
	var $column_search = array('jabatan'); 
	var $order = array('createdAt' => 'asc');  

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query(){
		
		$this->db->from($this->table);
		$i = 0;
		foreach ($this->column_search as $item) {
			if($_POST['search']['value']) {		
				if($i===0) {
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) 
					$this->db->group_end(); 
			}
			$i++;
		}
		
		if(isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if(isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables(){
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered(){
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all(){
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_one_data($where){
		$this->db->where($where);
		return $this->db->get($this->table);
	} 

	public function get_select2_data(){
		$this->db->where(['status' => '1']);
		$this->db->select('id');
		$this->db->select('jabatan');
		return $this->db->get($this->table);
	}
}
