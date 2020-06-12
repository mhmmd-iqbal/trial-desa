<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModelHalaman extends CI_Model{
	function get_logo(){
		$this->db->select('logo');
		$this->db->where('status', 1);
		$this->db->from('logos');
		$res = $this->db->get()->row_array();
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res; 
	}

	function get_gambar_kata_sambutan(){
		$this->db->select('gambar');
		$this->db->from('gambars');
		$this->db->order_by('updated_at', 'desc');
		$res = $this->db->get()->row_array();
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
	}

	function get_sambutan(){
		$this->db->select('sambutan');
		$this->db->from('sambutans');
		$res = $this->db->get()->row_array();
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
		// echo json_encode($res);
	}

	function get_konten(){
		$this->db->select('kategoris.kategori');
		$this->db->select(['kontens.judul', 'kontens.konten', 'kontens.user', 'kontens.gambar', 'kontens.created_at', 'kontens.url']);
		$this->db->from('kontens');
		$this->db->join('kategoris', 'kontens.idKategori = kategoris.id');
		$this->db->order_by('created_at', 'desc');
		$this->db->limit(5);
		$res =  $this->db->get()->result();	
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
		// echo json_encode($res);
	}

	function get_perangkat(){
		$this->db->select('jabatan');
		$this->db->select('nip');
		$this->db->select('nama');
		$this->db->select('photo');
		$this->db->from('perangkats');
		$this->db->order_by('createdAt', 'asc');
		$this->db->where('statusAnggota', '1');
		$res =  $this->db->get()->result();	
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
	}

	function get_kategori(){
		$this->db->select('kategori');
		$this->db->from('kategoris');
		$res =  $this->db->get()->result();	
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
	}

	function get_penjabat(){
		$this->db->select('*');
		$this->db->where('statusAnggota', '1');
		$this->db->from('perangkats');
		$res = $this->db->get()->result();
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
	}

	function get_visi(){
		$this->db->select('visi');
		$this->db->where('status', '1');
		$this->db->from('visis');
		$res = $this->db->get()->row_array();
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
	}

	function get_misi(){
		$this->db->select('misi');
		$this->db->where('status', '1');
		$this->db->from('misis');
		$res = $this->db->get()->row_array();
		if($res == null){
			$res = [
				'result' => null
			];
		}
		return $res;
	}
}