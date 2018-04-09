<?php
class User extends CI_Controller{
	
	// Calling a class constructor
	function __construct(){
		parent::__construct();
		$this->load->model('User_model');

		$this->lang->load("button","indonesia");
	}
	
	function index(){                
		$data = array(
			'page_title'=>'User List',
			'name'=>$this->session->userdata('name'),
			'userlist' => $this->User_model->getListdata(),
			'role' => $this->session->userdata('role'),
			'menu_active' => 1
		);
		$content = array(
			'left_content' => 'user/user',
			'right_content' => 'template/menu_std'
		);
		//$this->template->add_js('alert("test");','embed');
		$this->template->load('template/templates',$content,$data);
	}
	
	function userProfileById(){
		$id = $this->uri->segment(3);
		$this->User_model->setId($id);
		$queryData = array(
			'page_title' => 'Profil User',
			'userloop' => $this->User_model->getProfileById(),
			'name' => $this->session->userdata('name'),
			'role' => $this->session->userdata('role'),
			'menu_active' => 1
		);
		$content = array(
			'left_content' => 'user/user_profile',
			'right_content' => 'template/menu_std'
		);
		$this->template->load('template/templates',$content,$queryData);
	}

	function userProfile(){
		$this->User_model->setUname($this->session->userdata('username'));
		$queryData = array(
			'page_title' => 'Profil User',
			'userloop' => $this->User_model->getProfileByUname(),
			'name' => $this->session->userdata('name'),
			'role' => $this->session->userdata('role'),
			'menu_active' => 1
		);
		$content = array(
			'left_content' => 'user/user_profile',
			'right_content' => 'template/menu_std'
		);
		$this->template->load('template/templates',$content,$queryData);
	}
	
	function editProfile(){		
		if(isset($_POST['btnSave'])){
			$username = $_POST['username'];			
			$fullname = $_POST['fname'];
			$role = $_POST['role'];	
			$email = $_POST['email'];			
			
			$id = $this->uri->segment(3);
			if($id){
				$this->User_model->setId($id);
			}
			
			$this->User_model->setUname($username);
			$this->User_model->setFullName($fullname);			
			$this->User_model->setRole($role);
			$this->User_model->setEmail($email);
						
			$this->User_model->modifyUserName();
			$this->User_model->modifyFullname();
			
			if(isset($_POST['password'])){
				$password = $_POST['password'];
				if($password!=''){
				$this->User_model->setPassword($password);
				$this->User_model->modifyPassword();
				}
			}			
			$this->User_model->modifyRole();
			$this->User_model->modifyEmail();
			
			redirect('user');
		}else{
			$id = $this->uri->segment(3);
			if(!$id){
				//$this->load->model('role_model');			
				$this->User_model->setUname($this->session->userdata('username'));		
				$queryData = array(
					'page_title' => 'Edit Profil User',
					'userloop' => $this->User_model->getProfileByUname(),
					'name' => $this->session->userdata('name'),
					//'datacombo' => $this->role_model->getRoleData(),
					'role' => $this->session->userdata('role'),
					'email' => $this->session->userdata('email'),
					'menu_active' => 1
				);
			}else{				
				$this->User_model->setId($id);
				//$this->load->model('role_model');	
				$queryData = array(
					'page_title' => 'Edit Profil User',
					'userloop' => $this->User_model->getProfileById(),
					'name' => $this->session->userdata('name'),
					//'datacombo' => $this->role_model->getRoleData(),
					'role' => $this->session->userdata('role'),
					'email' => $this->session->userdata('email'),
					'menu_active' => 1
				);
			}
			$content = array(
				'left_content' => 'user/modifyuser',
				'right_content' => 'template/menu_std'
			);
			$this->template->load('template/templates',$content,$queryData);
		}
	}
	
	function tambahUser(){
        $encryptionLibs = new encryptionhelper();
		if(isset($_POST['btnSave'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$fullname = $_POST['fname'];
			$role = $_POST['role'];
			$email = $_POST['email'];
            
            $encPass = $encryptionLibs->encrypt($password);
			
			$this->User_model->setUname($username);
			$this->User_model->setPassword($encPass);
			$this->User_model->setFullName($fullname);
			$this->User_model->setRole($role);
			$this->User_model->setEmail($email);
			$this->User_model->tambahUser();
			
			redirect('user');
		}else{
			//$this->load->model('role_model');		
			$queryData = array(
				'page_title' => 'Tambah User',
				'userloop' => $this->User_model->getProfileByUname(),
				'name' => $this->session->userdata('name'),
				//'datacombo' => $this->role_model->getRoleData(),
				'role' => $this->session->userdata('role'),
				'email' => $this->session->userdata('email'),
				'menu_active' => 1
			);
			$content = array(
				'left_content' => 'user/add',
				'right_content' => 'template/menu_std'
			);
			$this->template->load('template/templates',$content,$queryData);
		}
	}
	
	function deleteUser(){
		$id = $this->uri->segment(3);
		$this->User_model->setId($id);
		$this->User_model->deleteProfile();
		redirect('user');
	}
	
	function logout()
	{		
        $array_currsession = array('userid'=>'','username'=>'','role'=>'','name'=>'');
        $this->session->unset_userdata($array_currsession);             
		$data['message'] = 'Anda telah logout dari sistem.';
		redirect('home/home');
	}
}