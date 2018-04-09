<?php
class Role extends CI_Controller {
// Calling a class constructor
	function __construct(){
		parent::__construct();
		$this->load->model('role_model');
		$this->lang->load("button","indonesia");
	}
	
	function index(){
	}
	
	function plist_role(){
		$data = array(
			'title'=>'Role',
			'name'=>$this->session->userdata('name'),
			'listdata' => $this->role_model->getRoleData(),
			'role' => $this->session->userdata('role')
		);
		$content = array(
			'plist_content' => 'role/plist_role'
		);		
		$this->template->load('template/template_plist',$content,$data);
	}
}