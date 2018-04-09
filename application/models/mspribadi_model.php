<?php
class mspribadi_model extends CI_Model {
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
	
	function insertNewMsPribadi(){
		$data = array(
			'id_pribadi' => $this->getId(),
			'ket' => $this->getKet(),
			'bobot' => $this->getBobot()		
		);
		$this->db->insert('tb_prm_pribadi',$data);
	}
	
	function modifyMsPribadi(){
		$data = array(
			'ket' => $this->getKet(),
			'bobot' => $this->getBobot()
		);
		$this->db->where('id_pribadi',$this->getId());
		$this->db->update('tb_prm_pribadi',$data);
	}
	
	function deleteMsPribadi(){
		$data = array(
			'active' => '0'
		);
		$this->db->where('id_pribadi',$this->getId());
		$this->db->update('tb_prm_pribadi',$data);
	}
	
	function getListdata(){
		$this->db->select('id_pribadi,ket,bobot')->from('tb_prm_pribadi')->where(array('active'=>'1'));
		$query = $this->db->get();
		return $query->result();
	}

	function getListdata_segmented($offset){
		$this->db->select('id_pribadi,ket,bobot')->from('tb_prm_pribadi')->where(array('active'=>'1'));
		$this->db->limit($this->config->item('page_num'),$offset);
		$query = $this->db->get();
		return $query->result();
	}
	
	function getListDataByKet(){
		$query = $this->db->query("select id_pribadi,ket,bobot from tb_prm_pribadi where lower(ket) like lower('%".$this->getKet()."%')");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getProfileById(){
		$query = $this->db->query("select id_pribadi,ket,bobot from tb_prm_pribadi where id_pribadi = '".$this->getId()."'");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getLatestID(){
		$query = $this->db->query("select id_pribadi from tb_prm_pribadi WHERE id_pribadi LIKE 'PR%'  ORDER BY id_pribadi DESC LIMIT 0,1");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
}