<?php
class mssmt_model extends CI_Model {
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
	
	function insertNewMsSMT(){
		$data = array(
			'id_semester' => $this->getId(),
			'ket' => $this->getKet(),
			'bobot' => $this->getBobot()		
		);
		$this->db->insert(TABEL_PARAM_SEMESTER,$data);
	}
	
	function modifyMsSMT(){
		$data = array(
			'ket' => $this->getKet(),
			'bobot' => $this->getBobot()
		);
		$this->db->where('id_semester',$this->getId());
		$this->db->update(TABEL_PARAM_SEMESTER,$data);
	}
	
	function deleteMsSMT(){
		$data = array(
			'active' => '0'
		);
		$this->db->where('id_semester',$this->getId());
		$this->db->update(TABEL_PARAM_SEMESTER,$data);
	}
	
	function getListdata(){
		$this->db->select('id_semester,ket,bobot')->from(TABEL_PARAM_SEMESTER)->where(array('active'=>'1'));
		$query = $this->db->get();
		return $query->result();
	}	
	
	function getListDataByKet(){
		$query = $this->db->query("select id_semester,ket,bobot from ".TABEL_PARAM_SEMESTER." where lower(ket) like lower('%".$this->getKet()."%')");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getProfileById(){
		$query = $this->db->query("select id_semester,ket,bobot from ".TABEL_PARAM_SEMESTER." where id_semester = '".$this->getId()."'");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getLatestID(){
		$query = $this->db->query("select id_semester from ".TABEL_PARAM_SEMESTER." WHERE id_semester LIKE 'SE%'  ORDER BY id_semester DESC LIMIT 0,1");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
}