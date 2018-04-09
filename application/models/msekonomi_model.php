<?php
class msekonomi_model extends CI_Model {
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
	
	function insertNewMsEkonomi(){
		$data = array(
			'id_eko' => $this->getId(),
			'ket' => $this->getKet(),
			'bobot' => $this->getBobot()		
		);
		$this->db->insert('tb_prm_ekonomi',$data);
	}
	
	function modifyMsEkonomi(){
		$data = array(
			'ket' => $this->getKet(),
			'bobot' => $this->getBobot()
		);
		$this->db->where('id_eko',$this->getId());
		$this->db->update('tb_prm_ekonomi',$data);
	}
	
	function deleteMsEkonomi(){
		$data = array(
			'active' => '0'
		);
		$this->db->where('id_eko',$this->getId());
		$this->db->update('tb_prm_ekonomi',$data);
	}
	
	function getListdata(){
		$this->db->select('id_eko,ket,bobot')->from('tb_prm_ekonomi')->where(array('active'=>'1'));
		$query = $this->db->get();
		return $query->result();
	}	
	
	function getListDataByKet(){
		$query = $this->db->query("select id_eko,ket,bobot from tb_prm_ekonomi where lower(ket) like lower('%".$this->getKet()."%')");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getProfileById(){
		$query = $this->db->query("select id_eko,ket,bobot from tb_prm_ekonomi where id_eko = '".$this->getId()."'");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getLatestID(){
		$query = $this->db->query("select id_eko from tb_prm_ekonomi WHERE id_eko LIKE 'EK%'  ORDER BY id_eko DESC LIMIT 0,1");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
}