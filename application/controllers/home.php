<?php
class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->lang->load("button","indonesia");
	}
	
	function index(){
            
		$this->session->sess_destroy();                
		$dataprofile = array(
			'page_title' => 'Home',
			'name' => $this->session->userdata('name'),
			'role' => $this->session->userdata('role'),
			'menu_active' => 0
		);
		
		$arr_sess = array(			
			'name' => 'Guest'
		);
		$this->session->set_userdata($arr_sess);
		
		$content = array(
			'left_content' => 'home/home',
			'right_content' => 'template/menu_std'		
		);
		$this->template->load('template/templates',$content,$dataprofile);
	}
}