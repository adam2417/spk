<?php
/**
 * This class is created to handling a model
 * from table t_user in database.
 * On this class will handling some function like:
 * - Selecting table,likes getting username,getting password,etc
 * - Inserting data into table
 * - Deleting data from table
 * - Updating data to table
 **/
class User_model extends CI_Model{

	private $id;
	private $uname;
	private $password;
	private $active;
	private $lastLog;
	private $fullname;
	private $role;
	private $email;

	function setId($id){
		$this->id = $id;
	}

	function getId(){
		return $this->id;
	}

	function setUname($uname){
		$this->uname = $uname;
	}

	function getUname(){
		return $this->uname;
	}

	function setPassword($passwd){
		$this->password = $passwd;
	}

	function getPassword(){
		return $this->password;
	}

	function setActive($active){
		$this->active = $active;
	}

	function getActive(){
		return $this->active;
	}

	function setLastLogin($lastLogin){
		$this->lastLog = $lastLogin;
	}

	function getLastLogin(){
		return $this->lastLog;
	}

	function setFullName($fullName){
		$this->fullname = $fullName;
	}

	function getFullName(){
		return $this->fullname;
	}

	function setRole($userRole){
		$this->role = $userRole;
	}

	function getRole(){
		return $this->role;
	}
	
	function setEmail($email){
		$this->email = $email;
	}

	function getEmail(){
		return $this->email;
	}

	// Call the module constructor
	function __construct(){
		parent::__construct();
	}

	function insertNewUser(){
		$data = array(
			'id' => $this->getId(),
			'uname' => $this->getUname(),
			'pass' => $this->getPassword(),
			'active' => $this->getActive(),
			'role' => $this->getRole(),
			'email' => $this->getEmail()			
		);
		$this->db->insert(TABEL_USER,$data);
	}
	
	function modifyUserName(){
		$data = array(
			'uname' => $this->getUname()
		);
		$this->db->where('id',$this->getId());
		$this->db->update(TABEL_USER,$data);
	}

	function modifyLastLogin(){
		$data = array(
			'last_login' => $this->getLastLogin()
		);
		$this->db->where('uname',$this->getUname());
		$this->db->update(TABEL_USER,$data);
	}

	function modifyPassword(){
		$data = array(
			'pass' => md5($this->getPassword())
		);
		$this->db->where('uname',$this->getUname());
		$this->db->update(TABEL_USER,$data);
	}

	function deleteUser(){
		$data = array(
			'active' => $this->getActive()
		);
		$this->db->where('uname',$this->getUname());
		$this->db->update(TABEL_USER,$data);
	}

	function modifyFullname(){
		$data = array(
			'fullname' => $this->getFullName()
		);
		$this->db->where('uname',$this->getUname());
		$this->db->update(TABEL_USER,$data);
	}

	function modifyRole(){
		$data = array(
			'role' => $this->getRole()
		);
		$this->db->where('uname',$this->getUname());
		$this->db->update(TABEL_USER,$data);
	}
	
	function modifyEmail(){
		$data = array(
			'email' => $this->getEmail()
		);
		$this->db->where('uname',$this->getUname());
		$this->db->update(TABEL_USER,$data);
	}
	
	function getListdata(){
		$this->db->select(TABEL_USER.'.id,'.TABEL_USER.'.fullname,'.TABEL_USER.'.uname,'.TABEL_USER.'.last_login,'.TABEL_ROLE.'.desc,'.TABEL_USER.'.email')->from(TABEL_USER)->join(TABEL_ROLE,TABEL_USER.'.role='.TABEL_ROLE.'.id and '.TABEL_ROLE.'.active=1')->where(array(TABEL_USER.'.active'=>'1'));
		$query = $this->db->get();
		return $query->result();
	}
	
	function userLogin(){
        $encryptionLibs = new encryptionhelper();
        $decPass = $encryptionLibs->decrypt($this->getPassword());
		$query = $this->db->query("select id,fullname,uname,role,last_login,email from ".TABEL_USER." where uname='".$this->getUname()."' and pass='".$decPass."' limit 1");		
		if($query->num_rows() > 0){
			foreach($query->result() as $rows){
				$this->setId($rows->id);
				$this->setFullName($rows->fullname);
				$this->setUname($rows->uname);
				$this->setRole($rows->role);
				$this->setLastLogin($rows->last_login);
			}
			return true;
		}else{
			return false;
		}
	}
	
	function getProfileByUname(){
		$query = $this->db->query("select a.uname,a.fullname,b.desc roles,a.email,a.role role_id,date_format(a.last_login,'%d %M %Y') last_login, a.active from ".TABEL_USER." a join ".TABEL_ROLE." b on a.role = b.id where uname='".$this->getUname()."' limit 1");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function getProfileById(){
		$query = $this->db->query("select a.id,a.pass,a.uname,a.fullname,a.email,b.desc roles,a.role role_id,date_format(a.last_login,'%d %M %Y') last_login,a.active from ".TABEL_USER." a join ".TABEL_ROLE." b on a.role = b.id where a.id='".$this->getid()."' limit 1");
		if($query->num_rows() > 0){			
			return $query->result();
		}
	}
	
	function tambahUser(){
        $encryptionLibs = new encryptionhelper();
		$query = $this->db->query("select max(id) id from ".TABEL_USER);
		$res = $query->result();
		$this->setId(($res[0]->id) + 1);
		$data = array(		
			'id' => $this->getId(),
			'uname' => $this->getUname(),
			'pass' => $encryptionLibs->decrypt($this->getPassword()),
			'fullname' => $this->getFullName(),
			'role' => $this->getRole(),
			'email' => $this->getEmail(),
			'active' => '1'
		);
		$this->db->insert(TABEL_USER,$data);
	}
	
	function deleteProfile(){
		$data = array(			
			'active' => '0'
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update(TABEL_USER,$data);
	}
	
	function getPakarDetail(){
		$arr_data = array();
		$query = $this->db->query("SELECT * FROM ".TABEL_USER." WHERE role='2'");
		$data = $query->result_array();
		return $data;
	}
}