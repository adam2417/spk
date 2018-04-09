<?php
class masalah_model extends CI_Model {
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
	
	function insertNewMasalah(){
		$data = array(
			'id_masalah' => $this->getId(),
			'ket' => $this->getKet(),
            'bobot' => $this->getBobot()
		);
		$this->db->insert(TABEL_MASALAH,$data);
	}
	
	function modifyMasalah(){
		$data = array(
			'ket' => $this->getKet()
		);
		$this->db->where('id_masalah',$this->getId());
		$this->db->update(TABEL_MASALAH,$data);
	}
	
	function deleteMasalah(){
		$data = array(
			'active' => '0'
		);
		$this->db->where('id_masalah',$this->getId());
		$this->db->update(TABEL_MASALAH,$data);
	}
	
	function getListdata(){
		$this->db->select('id_masalah,ket')->from(TABEL_MASALAH)->where(array('active'=>'1'));
		$query = $this->db->get();
		return $query->result();
	}
	
	function getListdata_segmented($offset){
		$this->db->select('id_masalah,ket')->from(TABEL_MASALAH)->where(array('active'=>'1'));
		$this->db->limit($this->config->item('page_num'),$offset);
		$query = $this->db->get();
		return $query->result();
	}
	
	function getListDataByKet(){
		$query = $this->db->query("select id_masalah,ket from ".TABEL_MASALAH." where lower(ket) like lower('%".$this->getKet()."%')");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getProfileById(){
		$query = $this->db->query("select id_masalah,ket from ".TABEL_MASALAH." where id_masalah = '".$this->getId()."'");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getLatestID(){
		$query = $this->db->query("select id_masalah from ".TABEL_MASALAH." WHERE id_masalah LIKE 'M%'  ORDER BY id_masalah DESC LIMIT 0,1");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
}