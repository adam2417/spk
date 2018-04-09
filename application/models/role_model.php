<?php
class Role_model extends CI_Model{
	private $id;
	private $role;
	private $active;
	
	function setId($id){
		$this->id = $id;
	}
	
	function getId(){
		return $this->id;
	}
	
	function setRole($role){
		$this->role = $role;
	}
	
	function getRole(){
		return $this->role;
	}
	
	function setActive($active){
		$this->active = $active;
	}
	
	function getActive(){
		return $this->active;
	}
	
	function __construct(){
		parent::__construct();
	}
	
	function getRoleData(){
		$query = $this->db->query("select * from tb_role");
		if($query->num_rows > 0){
			return $query->result();
		}
	}
}