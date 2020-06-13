<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModelGrafik extends CI_Model{
	
	function data_jns_klm(){
		$this->db->from('penduduks');
		$this->db->select('jnsKlm, COUNT(jnsKlm) as total');
		$this->db->group_by('jnsKlm'); 
		$this->db->where('status', TRUE);
		$data['penduduk'] =  $this->db->get()->result_array();
		$total = 0;


		foreach ($data['penduduk'] as $i => $d) {
			$total += $d['total'];
		}

		foreach ($data['penduduk'] as $i => $d) { 
			$data['penduduk'][$i]['persen'] = $d['total'] / $total * 100; 
		}
		$data['total_penduduk'] = (string) $total;
		return $data;
	}

	function data_usia(){
		$this->db->from('penduduks');
		$this->db->select('TIMESTAMPDIFF(YEAR, tglLahir, CURDATE()) AS age, COUNT(TIMESTAMPDIFF(YEAR, tglLahir, CURDATE())) as total');
		$this->db->group_by('age'); 
		$this->db->where('status', TRUE);
		$penduduk = $this->db->get()->result_array();

		$total1 = 0;
		$total2 = 0;
		$total3 = 0;
		$total4 = 0;
		$total  = 0;
		foreach ($penduduk as $i => $d) {
			$total += $d['total'];
			if($d['age'] < 17){
				$total1 += $d['total'];
			}else if(($d['age'] >=17)&&($d['age'] < 35)){
				$total2 += $d['total'];
			}else if(($d['age'] >=35)&&($d['age'] < 50)){
				$total3 += $d['total'];
			}
			else{
				$total4 += $d['total'];
			}
		}

		$data['penduduk'] = [
			[
				'keterangan' => '0 - 16 thn',
				'total'		 => $total1
			],
			[
				'keterangan' => '17 - 35 thn',
				'total'		 => $total2
			],
			[
				'keterangan' => '35 - 50 thn',
				'total'		 => $total3
			],
			[
				'keterangan' => 'Usia lanjut > 50 thn',
				'total'		 => $total4
			],
		];
		$data['total'] = $total;

		foreach ($data['penduduk'] as $i => $d) { 
			$data['penduduk'][$i]['persen'] = $d['total'] / $total * 100; 
		}
		

		return $data;
	}
}