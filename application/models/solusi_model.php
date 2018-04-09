<?php
class solusi_model extends CI_Model {
	private $id;	
	private	$ket;	
	private	$bobot;
	
	function setId($id) {
		$this->id = $id;
	}
	
	function setKet($keterangan) {
		$this->ket = $keterangan;
	}
	
	function setBobot($bobots) {
		$this->bobot = $bobots;
	}
	
	function getId(){
		return $this->id;
	}
	
	function getKet(){
		return $this->ket;
	}
	
	function getBobot(){
		return $this->bobot;
	}
	
	// Call the module constructor
	function __construct(){
		parent::__construct();
	}
	
	function insertNewSolusi(){
		$data = array(
			'id_solusi' => $this->getId(),
			'ket' => $this->getKet()		
		);
		$this->db->insert('tb_solusi',$data);
	}
	
	function modifySolusi(){
		$data = array(
			'ket' => $this->getKet()
		);
		$this->db->where('id_solusi',$this->getId());
		$this->db->update('tb_solusi',$data);
	}
	
	function deleteSolusi(){
		$data = array(
			'active' => '0'
		);
		$this->db->where('id_solusi',$this->getId());
		$this->db->update('tb_solusi',$data);
	}
	
	function getListdata(){
		$this->db->select('id_solusi,ket')->from('tb_solusi')->where(array('active'=>'1'));
		$query = $this->db->get();
		return $query->result();
	}	
	
	function getListdata_segmented($offset){
		$this->db->select('id_solusi,ket')->from('tb_solusi')->where(array('active'=>'1'));
		$this->db->limit($this->config->item('page_num'),$offset);
		$query = $this->db->get();
		return $query->result();
	}	
	
	function getListDataByKet(){
		$query = $this->db->query("select id_solusi,ket from tb_solusi where lower(ket) like lower('%".$this->getKet()."%')");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getProfileById(){
		$query = $this->db->query("select id_solusi,ket from tb_solusi where id_solusi = '".$this->getId()."'");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	function getLatestID(){
		$query = $this->db->query("select id_solusi from tb_solusi WHERE id_solusi LIKE 'S%'  ORDER BY id_solusi DESC LIMIT 0,1");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
}