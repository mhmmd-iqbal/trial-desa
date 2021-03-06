<?php

class ModalAdmin extends CI_Model {

	var $table = 'admins'; 
	var $column_order = array(null, 'adminName','username','admins.createdAt'); 
	var $column_search = array('adminName', 'username' );
	var $order = array('admins.createdAt' => 'asc');
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	
	    $this->db->select('admins.id');
	    // $this->db->select('idPrivilages');
	    $this->db->select('access.accessName');
	    $this->db->select('adminName');
	    $this->db->select('username');
	    $this->db->select('passGenerate');
	    $this->db->select('admins.createdAt');
	    $this->db->select('admins.deletedAt');
		$this->db->join('access', 'access.id = admins.idAccess');
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
}
