<?php
class Sysparam_model extends CI_Model {
	private $id;
	private $prm_desc;
	private $prm_val;
	
	function setId($pId) {
		$this->id = $pId;
	}
	
	function getId(){
		return $this->id;
	}
	
	function setParamDesc($pDesc) {
		$this->prm_desc = $pDesc;
	}
	
	function getParamDesc(){
		return $this->prm_desc;
	}
	
	function setParamValue($pVal) {
		$this->prm_val = $pVal;
	}
	
	function getParamValue(){
		return $this->prm_val;
	}
	
	// Call the module constructor
	function __construct(){
		parent::__construct();
	}
	
	function getParamById() {
		$this->db->select('param_val')->from(TABEL_SYS_PARAM)->where(array('param_id'=>$this->getId()));
		$query = $this->db->get();
		return $query->result();
	}
}