<?php
class msipk_model extends CI_Model {
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
	
	function insertNewMsIPK(){
		$data = array(
			'id_ipk' => $this->getId(),
			'ket' => $this->getKet(),
			'bobot' => $this->getBobot()		
		);
		$this->db->insert(TABEL_PARAM_NILAI,$data);
	}
	
	function modifyMsIPK(){
		$data = array(
			'ket' => $this->getKet(),
			'bobot' => $this->getBobot()
		);
		$this->db->where('id_ipk',$this->getId());
		$this->db->update(TABEL_PARAM_NILAI,$data);
	}
	
	function deleteMsIPK(){
		$data = array(
			'active' => '0'
		);
		$this->db->where('id_ipk',$this->getId());
		$this->db->update(TABEL_PARAM_NILAI,$data);
	}
	
	function getListdata(){
		$this->db->select('id_ipk,ket,bobot')->from(TABEL_PARAM_NILAI)->where(array('active'=>'1'));
		$query = $this->db->get();
		return $query->result();
	}	
	
	function getListDataByKet(){
		$query = $this->db->query("select id_ipk,ket,bobot from ".TABEL_PARAM_NILAI." where lower(ket) like lower('%".$this->getKet()."%')");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getProfileById(){
		$query = $this->db->query("select id_ipk,ket,bobot from ".TABEL_PARAM_NILAI." where id_ipk = '".$this->getId()."'");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getLatestID(){
		$query = $this->db->query("select id_ipk from ".TABEL_PARAM_NILAI." WHERE id_ipk LIKE 'IP%' ORDER BY id_ipk DESC LIMIT 0,1");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
}