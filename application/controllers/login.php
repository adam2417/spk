<?php
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('User_model');
		$this->lang->load("form_validation","indonesia");
		$this->lang->load("button","indonesia");	
	}
	
	function index(){
		$this->load->view('login/login');
	}
	
	function loginProcess(){
        $encryptionLibs = new encryptionhelper();
		if(isset($_POST['login'])){
			$rule_config = array(
				array(
					'field'=>'username',
					'label'=>$this->lang->line('username'),
					'rules'=>'trim|required|xss_clean|encode_php_tags|prep_for_form'
				),
				array(
					'field'=>'password',
					'label'=>$this->lang->line('password'),
					'rules'=>'trim|required|xss_clean|encode_php_tags|prep_for_form'
				)
			);
			$this->form_validation->set_rules($rule_config);
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if($this->form_validation->run() == false){
				$this->load->view('login/login');
			}else{
                $encPass = $encryptionLibs->encrypt($_POST['password']);
				$this->User_model->setUname($_POST['username']);
				$this->User_model->setPassword($encPass);
				if($this->User_model->userLogin()){
					$arr_sess = array(
						'userid' => $this->User_model->getId(),
						'username' => $this->User_model->getUname(),
						'role' => $this->User_model->getRole(),
						'name' => $this->User_model->getFullName()
					);
					$array_currsession = array('userid'=>'','username'=>'','role'=>'','name'=>'');
					$this->session->unset_userdata($array_currsession);
					$this->session->set_userdata($arr_sess);
					$this->User_model->setLastLogin(date('Y-m-d H:i:s'));
					$this->User_model->modifyLastLogin();
					
					$data = array(
						'page_title' => 'Home',
						'name' => $this->User_model->getFullName(),
						'last_log' => $this->User_model->getLastLogin(),
						'role' => $this->session->userdata('role'),
						'menu_active' => 0						
					);
					$partials = array(
						'left_content'=> 'home/home',
						'right_content' => 'template/menu_std'
					);
					$this->template->load('template/templates',$partials,$data);
				}else{
					$data = array(
						'page_title' => 'Home',		
						'message' => 'Maaf Username Dan Password Login Anda Salah',
						'role' => $this->session->userdata('role'),
						'menu_active' => 0	
					);
					$partials = array(
						'left_content'=> 'home/home',
						'right_content' => 'template/menu_std'
					);
					$this->template->load('template/templates',$partials,$data);
				}
			}
		}
	}	
}