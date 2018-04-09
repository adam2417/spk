<?php
class mslingkungan_model extends CI_Model {
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
	
	function insertNewMsLingkungan(){
		$data = array(
			'id_lingkungan' => $this->getId(),
			'ket' => $this->getKet(),
			'bobot' => $this->getBobot()		
		);
		$this->db->insert('tb_prm_lingkungan',$data);
	}
	
	function modifyMsLingkungan(){
		$data = array(
			'ket' => $this->getKet(),
			'bobot' => $this->getBobot()
		);
		$this->db->where('id_lingkungan',$this->getId());
		$this->db->update('tb_prm_lingkungan',$data);
	}
	
	function deleteMsLingkungan(){
		$data = array(
			'active' => '0'
		);
		$this->db->where('id_lingkungan',$this->getId());
		$this->db->update('tb_prm_lingkungan',$data);
	}
	
	function getListdata(){
		$this->db->select('id_lingkungan,ket,bobot')->from('tb_prm_lingkungan')->where(array('active'=>'1'));
		$query = $this->db->get();
		return $query->result();
	}
	
	function getListdata_segmented($offset){
		$this->db->select('id_lingkungan,ket,bobot')->from('tb_prm_lingkungan')->where(array('active'=>'1'));
		$this->db->limit($this->config->item('page_num'),$offset);
		$query = $this->db->get();
		return $query->result();
	}	
	
	function getListDataByKet(){
		$query = $this->db->query("select id_lingkungan,ket,bobot from tb_prm_lingkungan where lower(ket) like lower('%".$this->getKet()."%')");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getProfileById(){
		$query = $this->db->query("select id_lingkungan,ket,bobot from tb_prm_lingkungan where id_lingkungan = '".$this->getId()."'");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	function getLatestID(){
		$query = $this->db->query("select id_lingkungan from tb_prm_lingkungan WHERE id_lingkungan LIKE 'LI%'  ORDER BY id_lingkungan DESC LIMIT 0,1");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
}