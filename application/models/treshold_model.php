<?php
class treshold_model extends CI_Model
{
	private $nilai;
	
	function setNilai($ntreshold) {
		$this->nilai = $ntreshold;
	}
	
	function getNilai(){
		return $this->nilai;
	}
	
	function getNilaiTreshold(){
		$this->db->select('nilai')->from('tb_treshold');
		$query = $this->db->get();
		return $query->result();
	}
	
	function editTreshold(){
		$data = array(
			'nilai' => $this->getNilai()
		);
		$this->db->update('tb_treshold',$data);			
	}
}