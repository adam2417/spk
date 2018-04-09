<?php
class mskeluarga_model extends CI_Model {
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
	
	function insertNewMsKeluarga(){
		$data = array(
			'id_keluarga' => $this->getId(),
			'ket' => $this->getKet(),
			'bobot' => $this->getBobot()		
		);
		$this->db->insert('tb_prm_keluarga',$data);
	}
	
	function modifyMsKeluarga(){
		$data = array(
			'ket' => $this->getKet(),
			'bobot' => $this->getBobot()
		);
		$this->db->where('id_keluarga',$this->getId());
		$this->db->update('tb_prm_keluarga',$data);
	}
	
	function deleteMsKeluarga(){
		$data = array(
			'active' => '0'
		);
		$this->db->where('id_keluarga',$this->getId());
		$this->db->update('tb_prm_keluarga',$data);
	}
	
	function getListdata(){
		$this->db->select('id_keluarga,ket,bobot')->from('tb_prm_keluarga')->where(array('active'=>'1'));
		$query = $this->db->get();
		return $query->result();
	}	
	
	function getListDataByKet(){
		$query = $this->db->query("select id_keluarga,ket,bobot from tb_prm_keluarga where lower(ket) like lower('%".$this->getKet()."%')");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getProfileById(){
		$query = $this->db->query("select id_keluarga,ket,bobot from tb_prm_keluarga where id_keluarga = '".$this->getId()."'");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getLatestID(){
		$query = $this->db->query("select id_keluarga from tb_prm_keluarga WHERE id_keluarga LIKE 'KE%'  ORDER BY id_keluarga DESC LIMIT 0,1");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
}