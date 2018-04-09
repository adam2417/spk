<?php
class msasalmhs_model extends CI_Model {
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
	
	function insertNewMsAsal(){
		$data = array(
			'id_asal' => $this->getId(),
			'ket' => $this->getKet(),
			'bobot' => $this->getBobot()		
		);
		$this->db->insert('tb_prm_asalmhs',$data);
	}
	
	function modifyMsAsal(){
		$data = array(
			'ket' => $this->getKet(),
			'bobot' => $this->getBobot()
		);
		$this->db->where('id_asal',$this->getId());
		$this->db->update('tb_prm_asalmhs',$data);
	}
	
	function deleteMsAsal(){
		$data = array(
			'active' => '0'
		);
		$this->db->where('id_asal',$this->getId());
		$this->db->update('tb_prm_asalmhs',$data);
	}
	
	function getListdata(){
		$this->db->select('id_asal,ket,bobot')->from('tb_prm_asalmhs')->where(array('active'=>'1'));
		$query = $this->db->get();
		return $query->result();
	}	
	
	function getListDataByKet(){
		$query = $this->db->query("select id_asal,ket,bobot from tb_prm_asalmhs where lower(ket) like lower('%".$this->getKet()."%')");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getProfileById(){
		$query = $this->db->query("select id_asal,ket,bobot from tb_prm_asalmhs where id_asal = '".$this->getId()."'");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getLatestID(){
		$query = $this->db->query("select id_asal from tb_prm_asalmhs WHERE id_asal LIKE 'AS%'  ORDER BY id_asal DESC LIMIT 0,1");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
}