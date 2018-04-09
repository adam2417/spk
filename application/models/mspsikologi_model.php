<?php
class mspsikologi_model extends CI_Model {
	private $id;	
	private	$ket;	
	private	$bobot;
	
	function setId($ids) {
		$this->id = $ids;
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
	
	function insertNewMsPsikologi(){
		$data = array(
			'id_psikologis' => $this->getId(),
			'ket' => $this->getKet(),
			'bobot' => $this->getBobot()		
		);
		$this->db->insert('tb_prm_psikologis',$data);
	}
	
	function modifyMsPsikologi(){
		$data = array(
			'ket' => $this->getKet(),
			'bobot' => $this->getBobot()
		);
		$this->db->where('id_psikologis',$this->getId());
		$this->db->update('tb_prm_psikologis',$data);
	}
	
	function deleteMsPsikologi(){
		$data = array(
			'active' => '0'
		);
		$this->db->where('id_psikologis',$this->getId());
		$this->db->update('tb_prm_psikologis',$data);
	}
	
	function getListdata(){
		$this->db->select('id_psikologis,ket,bobot')->from('tb_prm_psikologis')->where(array('active'=>'1'));
		$query = $this->db->get();
		return $query->result();
	}	
	
	function getListDataByKet(){
		$query = $this->db->query("select id_psikologis,ket,bobot from tb_prm_psikologis where lower(ket) like lower('%".$this->getKet()."%')");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getProfileById(){		
		$query = $this->db->query("select id_psikologis,ket,bobot from tb_prm_psikologis where id_psikologis = '".$this->getId()."'");		
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getLatestID(){
		$query = $this->db->query("select id_psikologis from tb_prm_psikologis WHERE id_psikologis LIKE 'PS%'  ORDER BY id_psikologis DESC LIMIT 0,1");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	
}