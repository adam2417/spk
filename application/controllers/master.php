<?php
class Master extends CI_Controller {
	// Calling a class constructor
	function __construct(){
		parent::__construct();
		$this->load->model('mspsikologi_model');
		$this->load->model('msasalmhs_model');
		$this->load->model('msekonomi_model');
		$this->load->model('msipk_model');
		$this->load->model('mskeluarga_model');
		$this->load->model('mslingkungan_model');
		$this->load->model('mspribadi_model');
		$this->load->model('mssmt_model');		
		$this->load->model('masalah_model');
		$this->load->model('solusi_model');
		$this->load->model('treshold_model');
        $this->load->model('siswa_model');
		
		$this->lang->load("button","indonesia");
	}
	
	function index(){ 
		$data = array(
			'page_title'=>'Master',
			'name' => $this->session->userdata('name'),
			'role' => $this->session->userdata('role'),
			'menu_active' => 2
		);
		$content = array(
			'left_content' => 'master/master_home',
			'right_content' => 'template/menu_std'
		);
		$this->template->load('template/templates',$content,$data);
	}
	
	function mspsikologi_list(){
		$dataprofile = array(
			'page_title' => 'Master Psikologi',
			'name' => $this->session->userdata('name'),
			'datalist' => $this->mspsikologi_model->getListdata(),
			'role' => $this->session->userdata('role'),
			'menu_active' => 2			
		);
		$content = array(
			'left_content' => 'master/mspsikologi_list',
			'right_content' => 'template/menu_std'			
		);
		$this->template->load('template/templates',$content,$dataprofile);
	}
	
	function mspsikologi_create(){
		if(isset($_POST['btnSave'])){			
			$this->mspsikologi_model->setId($_POST['id']);
			$this->mspsikologi_model->setKet($_POST['ket']);
			$this->mspsikologi_model->setBobot($_POST['bobot']);
			$this->mspsikologi_model->insertNewMsPsikologi();			
			
			redirect('master/mspsikologi_list');
		}else{		
			
			// NEW ID
			
			$latest_ID=$this->mspsikologi_model->getLatestID();
			$latest_ID=objectToArray($latest_ID);
			$latest_ID=$latest_ID[0]['id_psikologis']; 
			
			if(substr($latest_ID,0,2)=='PS' and substr($latest_ID,2,2)==0){
				$latest_ID=0;
			}else{
				if(substr($latest_ID,0,2)=='PS' and substr($latest_ID,2,2)>0){
					$latest_ID=intval(substr($latest_ID,2,2));
				}else{
					$latest_ID=0;
				}
			}
			
			
			
			if($latest_ID==0){
				$new_ID='PS'.'01';
			}else{
				
				if($latest_ID<9){
					$new_ID='PS'.'0'.($latest_ID+1);
				}else{
					$new_ID='PS'.($latest_ID+1);
				}
				
			}
			
			// END NEW ID
				
			$dataprofile = array(
				'page_title' => 'Tambah Master Psikologi',
				'name' => $this->session->userdata('name'),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2,
				'new_ID'=>$new_ID		
			);
			$content = array(
				'left_content' => 'master/mspsikologi_add',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function mspsikologi_edit(){
		$id = $this->uri->segment(3);
		if(isset($_POST['btnSave'])){			
			$this->mspsikologi_model->setId($id);
			$this->mspsikologi_model->setKet($_POST['ket']);
			$this->mspsikologi_model->setBobot($_POST['bobot']);
			$this->mspsikologi_model->modifyMsPsikologi();			
			
			redirect('master/mspsikologi_list');
		}else{			
			$this->mspsikologi_model->setId($id);		
			$dataprofile = array(
				'page_title' => 'Edit Master Psikologi',
				'name' => $this->session->userdata('name'),
				'datalist' => $this->mspsikologi_model->getProfileById(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2			
			);
			$content = array(
				'left_content' => 'master/mspsikologi_edit',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function mspsikologi_delete(){
		$id = $this->uri->segment(3);
		$this->mspsikologi_model->setId($id);
		$this->mspsikologi_model->deleteMsPsikologi();
		redirect('master/mspsikologi_list');	
	}
	
	function msasal_list(){
		$dataprofile = array(
			'page_title' => 'Master Asal Mahasiswa',
			'name' => $this->session->userdata('name'),
			'datalist' => $this->msasalmhs_model->getListdata(),
			'role' => $this->session->userdata('role'),
			'menu_active' => 2			
		);
		$content = array(
			'left_content' => 'master/msasal_list',
			'right_content' => 'template/menu_std'			
		);
		$this->template->load('template/templates',$content,$dataprofile);
	}
	
	function msasal_create(){
		if(isset($_POST['btnSave'])){			
			$this->msasalmhs_model->setId($_POST['id']);
			$this->msasalmhs_model->setKet($_POST['ket']);
			$this->msasalmhs_model->setBobot($_POST['bobot']);
			$this->msasalmhs_model->insertNewMsAsal();			
			
			redirect('master/msasal_list');
		}else{			
			
			// NEW ID
			
			$latest_ID=$this->msasalmhs_model->getLatestID();
			$latest_ID=objectToArray($latest_ID);
			$latest_ID=$latest_ID[0]['id_asal']; 
			
			if(substr($latest_ID,0,2)=='AS' and substr($latest_ID,2,2)==0){
				$latest_ID=0;
			}else{
				if(substr($latest_ID,0,2)=='AS' and substr($latest_ID,2,2)>0){
					$latest_ID=intval(substr($latest_ID,2,2));
				}else{
					$latest_ID=0;
				}
			}
			
			
			
			if($latest_ID==0){
				$new_ID='AS'.'01';
			}else{
				
				if($latest_ID<9){
					$new_ID='AS'.'0'.($latest_ID+1);
				}else{
					$new_ID='AS'.($latest_ID+1);
				}
				
			}
			
			// END NEW ID
			
			$dataprofile = array(
				'page_title' => 'Tambah Master Asal',
				'name' => $this->session->userdata('name'),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2,
				'new_ID' => $new_ID			
			);
			$content = array(
				'left_content' => 'master/msasal_add',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function msasal_edit(){
		$id = $this->uri->segment(3);
		if(isset($_POST['btnSave'])){			
			$this->msasalmhs_model->setId($id);
			$this->msasalmhs_model->setKet($_POST['ket']);
			$this->msasalmhs_model->setBobot($_POST['bobot']);
			$this->msasalmhs_model->modifyMsAsal();			
			
			redirect('master/msasal_list');
		}else{
			$this->msasalmhs_model->setId($id);			
			$dataprofile = array(
				'page_title' => 'Edit Master Asal',
				'name' => $this->session->userdata('name'),
				'datalist' => $this->msasalmhs_model->getProfileById(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2			
			);
			$content = array(
				'left_content' => 'master/msasal_edit',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function msasal_delete(){
		$id = $this->uri->segment(3);
		$this->msasalmhs_model->setId($id);
		$this->msasalmhs_model->deleteMsAsal();
		redirect('master/msasal_list');	
	}
	
	function msekonomi_list(){
		$dataprofile = array(
			'page_title' => 'Master Ekonomi',
			'name' => $this->session->userdata('name'),
			'datalist' => $this->msekonomi_model->getListdata(),
			'role' => $this->session->userdata('role'),
			'menu_active' => 2			
		);
		$content = array(
			'left_content' => 'master/msekonomi_list',
			'right_content' => 'template/menu_std'			
		);
		$this->template->load('template/templates',$content,$dataprofile);
	}
	
	function msekonomi_create(){
		if(isset($_POST['btnSave'])){			
			$this->msekonomi_model->setId($_POST['id']);
			$this->msekonomi_model->setKet($_POST['ket']);
			$this->msekonomi_model->setBobot($_POST['bobot']);
			$this->msekonomi_model->insertNewMsEkonomi();			
			
			redirect('master/msekonomi_list');
		}else{	
			
			// NEW ID
			
			$latest_ID=$this->msekonomi_model->getLatestID();
			$latest_ID=objectToArray($latest_ID);
			$latest_ID=$latest_ID[0]['id_eko']; 
			
			if(substr($latest_ID,0,2)=='EK' and substr($latest_ID,2,2)==0){
				$latest_ID=0;
			}else{
				if(substr($latest_ID,0,2)=='EK' and substr($latest_ID,2,2)>0){
					$latest_ID=intval(substr($latest_ID,2,2));
				}else{
					$latest_ID=0;
				}
			}
			
			
			
			if($latest_ID==0){
				$new_ID='EK'.'01';
			}else{
				
				if($latest_ID<9){
					$new_ID='EK'.'0'.($latest_ID+1);
				}else{
					$new_ID='EK'.($latest_ID+1);
				}
				
			}
			
			// END NEW ID
					
			$dataprofile = array(
				'page_title' => 'Tambah Master Ekonomi',
				'name' => $this->session->userdata('name'),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2,
				'new_ID' => $new_ID				
			);
			$content = array(
				'left_content' => 'master/msekonomi_add',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function msekonomi_edit(){
		$id = $this->uri->segment(3);
		if(isset($_POST['btnSave'])){			
			$this->msekonomi_model->setId($id);
			$this->msekonomi_model->setKet($_POST['ket']);
			$this->msekonomi_model->setBobot($_POST['bobot']);
			$this->msekonomi_model->modifyMsEkonomi();			
			
			redirect('master/msekonomi_list');
		}else{
			$this->msekonomi_model->setId($id);			
			$dataprofile = array(
				'page_title' => 'Edit Master Ekonomi',
				'name' => $this->session->userdata('name'),
				'datalist' => $this->msekonomi_model->getProfileById(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2			
			);
			$content = array(
				'left_content' => 'master/msekonomi_edit',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function msekonomi_delete(){
		$id = $this->uri->segment(3);
		$this->msekonomi_model->setId($id);
		$this->msekonomi_model->deleteMsEkonomi();
		redirect('master/msekonomi_list');	
	}
	
	function msipk_list(){
		$dataprofile = array(
			'page_title' => 'Master Nilai',
			'name' => $this->session->userdata('name'),
			'datalist' => $this->msipk_model->getListdata(),
			'role' => $this->session->userdata('role'),
			'menu_active' => 2			
		);
		$content = array(
			'left_content' => 'master/msipk_list',
			'right_content' => 'template/menu_std'			
		);
		$this->template->load('template/templates',$content,$dataprofile);
	}
	
	function msipk_create(){
		if(isset($_POST['btnSave'])){			
			$this->msipk_model->setId($_POST['id']);
			$this->msipk_model->setKet($_POST['ket']);
			$this->msipk_model->setBobot($_POST['bobot']);
			$this->msipk_model->insertNewMsIPK();			
			
			redirect('master/msipk_list');
		}else{	
			
			// NEW ID
			
			$latest_ID=$this->msipk_model->getLatestID();
			$latest_ID=objectToArray($latest_ID);
			$latest_ID=$latest_ID[0]['id_ipk']; 
			
			if(substr($latest_ID,0,2)=='IP' and substr($latest_ID,2,2)==0){
				$latest_ID=0;
			}else{
				if(substr($latest_ID,0,2)=='IP' and substr($latest_ID,2,2)>0){
					$latest_ID=intval(substr($latest_ID,2,2));
				}else{
					$latest_ID=0;
				}
			}
			
			
			
			if($latest_ID==0){
				$new_ID='IP'.'01';
			}else{
				
				if($latest_ID<9){
					$new_ID='IP'.'0'.($latest_ID+1);
				}else{
					$new_ID='IP'.($latest_ID+1);
				}
				
			}
			
			// END NEW ID
					
			$dataprofile = array(
				'page_title' => 'Tambah Master Nilai',
				'name' => $this->session->userdata('name'),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2,
				'new_ID'=> $new_ID			
			);
			$content = array(
				'left_content' => 'master/msipk_add',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function msipk_edit(){
		$id = $this->uri->segment(3);
		if(isset($_POST['btnSave'])){			
			$this->msipk_model->setId($id);
			$this->msipk_model->setKet($_POST['ket']);
			$this->msipk_model->setBobot($_POST['bobot']);
			$this->msipk_model->modifyMsIPK();			
			
			redirect('master/msipk_list');
		}else{
			$this->msipk_model->setId($id);			
			$dataprofile = array(
				'page_title' => 'Edit Master Nilai',
				'name' => $this->session->userdata('name'),
				'datalist' => $this->msipk_model->getProfileById(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2			
			);
			$content = array(
				'left_content' => 'master/msipk_edit',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function msipk_delete(){
		$id = $this->uri->segment(3);
		$this->msipk_model->setId($id);
		$this->msipk_model->deleteMsIPK();
		redirect('master/msipk_list');	
	}
	
	function mskeluarga_list(){
		$dataprofile = array(
			'page_title' => 'Master Keluarga',
			'name' => $this->session->userdata('name'),
			'datalist' => $this->mskeluarga_model->getListdata(),
			'role' => $this->session->userdata('role'),
			'menu_active' => 2			
		);
		$content = array(
			'left_content' => 'master/mskeluarga_list',
			'right_content' => 'template/menu_std'			
		);
		$this->template->load('template/templates',$content,$dataprofile);
	}
	
	function mskeluarga_create(){
		if(isset($_POST['btnSave'])){			
			$this->mskeluarga_model->setId($_POST['id']);
			$this->mskeluarga_model->setKet($_POST['ket']);
			$this->mskeluarga_model->setBobot($_POST['bobot']);
			$this->mskeluarga_model->insertNewMsKeluarga();			
			
			redirect('master/mskeluarga_list');
		}else{	
			
			// NEW ID
			
			$latest_ID=$this->mskeluarga_model->getLatestID();
			$latest_ID=objectToArray($latest_ID);
			$latest_ID=$latest_ID[0]['id_keluarga']; 
			
			if(substr($latest_ID,0,2)=='KE' and substr($latest_ID,2,2)==0){
				$latest_ID=0;
			}else{
				if(substr($latest_ID,0,2)=='KE' and substr($latest_ID,2,2)>0){
					$latest_ID=intval(substr($latest_ID,2,2));
				}else{
					$latest_ID=0;
				}
			}
			
			
			
			if($latest_ID==0){
				$new_ID='KE'.'01';
			}else{
				
				if($latest_ID<9){
					$new_ID='KE'.'0'.($latest_ID+1);
				}else{
					$new_ID='KE'.($latest_ID+1);
				}
				
			}
			
			// END NEW ID
					
			$dataprofile = array(
				'page_title' => 'Tambah Master Keluarga',
				'name' => $this->session->userdata('name'),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2,
				'new_ID' => $new_ID			
			);
			$content = array(
				'left_content' => 'master/mskeluarga_add',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function mskeluarga_edit(){
		$id = $this->uri->segment(3);
		if(isset($_POST['btnSave'])){			
			$this->mskeluarga_model->setId($id);
			$this->mskeluarga_model->setKet($_POST['ket']);
			$this->mskeluarga_model->setBobot($_POST['bobot']);
			$this->mskeluarga_model->modifyMsKeluarga();			
			
			redirect('master/mskeluarga_list');
		}else{
			$this->mskeluarga_model->setId($id);			
			$dataprofile = array(
				'page_title' => 'Edit Master Keluarga',
				'name' => $this->session->userdata('name'),
				'datalist' => $this->mskeluarga_model->getProfileById(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2			
			);
			$content = array(
				'left_content' => 'master/mskeluarga_edit',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function mskeluarga_delete(){
		$id = $this->uri->segment(3);
		$this->mskeluarga_model->setId($id);
		$this->mskeluarga_model->deleteMsKeluarga();
		redirect('master/mskeluarga_list');	
	}
	
	function mspribadi_list(){
		$segment = 0;
		if($this->uri->segment(3)){
			$segment = $this->uri->segment(3);
		}
		$config['base_url'] = base_url() . 'index.php/master/mspribadi_list/';
		$config['uri_segment'] = 3;
		$config['per_page'] = $this->config->item('page_num');
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open'] = '<div id="paging">';
		$config['full_tag_close'] = '</div>';
		$config['total_rows'] = count($this->mspribadi_model->getListdata());
		$this->pagination->initialize($config);
		
		$dataprofile = array(
			'page_title' => 'Master Pribadi',
			'name' => $this->session->userdata('name'),
			'datalist' => $this->mspribadi_model->getListdata_segmented($segment),
			'role' => $this->session->userdata('role'),
			'menu_active' => 2			
		);
		$content = array(
			'left_content' => 'master/mspribadi_list',
			'right_content' => 'template/menu_std'			
		);
		$this->template->load('template/templates',$content,$dataprofile);
	}
	
	function mspribadi_create(){
		if(isset($_POST['btnSave'])){			
			$this->mspribadi_model->setId($_POST['id']);
			$this->mspribadi_model->setKet($_POST['ket']);
			$this->mspribadi_model->setBobot($_POST['bobot']);
			$this->mspribadi_model->insertNewMsPribadi();			
			
			redirect('master/mspribadi_list');
		}else{
			
			// NEW ID
			
			$latest_ID=$this->mspribadi_model->getLatestID();
			$latest_ID=objectToArray($latest_ID);
			$latest_ID=$latest_ID[0]['id_pribadi']; 
			
			if(substr($latest_ID,0,2)=='PR' and substr($latest_ID,2,2)==0){
				$latest_ID=0;
			}else{
				if(substr($latest_ID,0,2)=='PR' and substr($latest_ID,2,2)>0){
					$latest_ID=intval(substr($latest_ID,2,2));
				}else{
					$latest_ID=0;
				}
			}
			
			
			
			if($latest_ID==0){
				$new_ID='PR'.'01';
			}else{
				
				if($latest_ID<9){
					$new_ID='PR'.'0'.($latest_ID+1);
				}else{
					$new_ID='PR'.($latest_ID+1);
				}
				
			}
			
			// END NEW ID
						
			$dataprofile = array(
				'page_title' => 'Tambah Master Pribadi',
				'name' => $this->session->userdata('name'),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2,
				'new_ID'=>$new_ID			
			);
			$content = array(
				'left_content' => 'master/mspribadi_add',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function mspribadi_edit(){
		$id = $this->uri->segment(3);
		if(isset($_POST['btnSave'])){			
			$this->mspribadi_model->setId($id);
			$this->mspribadi_model->setKet($_POST['ket']);
			$this->mspribadi_model->setBobot($_POST['bobot']);
			$this->mspribadi_model->modifyMsPribadi();			
			
			redirect('master/mspribadi_list');
		}else{
			$this->mspribadi_model->setId($id);			
			$dataprofile = array(
				'page_title' => 'Edit Master Pribadi',
				'name' => $this->session->userdata('name'),
				'datalist' => $this->mspribadi_model->getProfileById(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2			
			);
			$content = array(
				'left_content' => 'master/mspribadi_edit',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function mspribadi_delete(){
		$id = $this->uri->segment(3);
		$this->mspribadi_model->setId($id);
		$this->mspribadi_model->deleteMsPribadi();
		redirect('master/mspribadi_list');	
	}
	
	function mslingkungan_list(){
		$dataprofile = array(
			'page_title' => 'Master Pribadi',
			'name' => $this->session->userdata('name'),
			'datalist' => $this->mslingkungan_model->getListdata(),
			'role' => $this->session->userdata('role'),
			'menu_active' => 2			
		);
		$content = array(
			'left_content' => 'master/mslingkungan_list',
			'right_content' => 'template/menu_std'			
		);
		$this->template->load('template/templates',$content,$dataprofile);
	}
	
	function mslingkungan_create(){
		if(isset($_POST['btnSave'])){			
			$this->mslingkungan_model->setId($_POST['id']);
			$this->mslingkungan_model->setKet($_POST['ket']);
			$this->mslingkungan_model->setBobot($_POST['bobot']);
			$this->mslingkungan_model->insertNewMsLingkungan();			
			
			redirect('master/mslingkungan_list');
		}else{		
			
			// NEW ID
			
			$latest_ID=$this->mslingkungan_model->getLatestID();
			$latest_ID=objectToArray($latest_ID);
			$latest_ID=$latest_ID[0]['id_lingkungan']; 
			
			if(substr($latest_ID,0,2)=='LI' and substr($latest_ID,2,2)==0){
				$latest_ID=0;
			}else{
				if(substr($latest_ID,0,2)=='LI' and substr($latest_ID,2,2)>0){
					$latest_ID=intval(substr($latest_ID,2,2));
				}else{
					$latest_ID=0;
				}
			}
			
			
			
			if($latest_ID==0){
				$new_ID='LI'.'01';
			}else{
				
				if($latest_ID<9){
					$new_ID='LI'.'0'.($latest_ID+1);
				}else{
					$new_ID='LI'.($latest_ID+1);
				}
				
			}
			
			// END NEW ID
				
			$dataprofile = array(
				'page_title' => 'Tambah Master Lingkungan',
				'name' => $this->session->userdata('name'),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2,
				'new_ID'=> $new_ID		
			);
			$content = array(
				'left_content' => 'master/mslingkungan_add',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function mslingkungan_edit(){
		$id = $this->uri->segment(3);
		if(isset($_POST['btnSave'])){			
			$this->mslingkungan_model->setId($id);
			$this->mslingkungan_model->setKet($_POST['ket']);
			$this->mslingkungan_model->setBobot($_POST['bobot']);
			$this->mslingkungan_model->modifyMsLingkungan();			
			
			redirect('master/mslingkungan_list');
		}else{
			$this->mslingkungan_model->setId($id);			
			$dataprofile = array(
				'page_title' => 'Edit Master Lingkungan',
				'name' => $this->session->userdata('name'),
				'datalist' => $this->mslingkungan_model->getProfileById(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2			
			);
			$content = array(
				'left_content' => 'master/mslingkungan_edit',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function mslingkungan_delete(){
		$id = $this->uri->segment(3);
		$this->mslingkungan_model->setId($id);
		$this->mslingkungan_model->deleteMsLingkungan();
		redirect('master/mslingkungan_list');	
	}
	
	function mssmt_list(){
		$dataprofile = array(
			'page_title' => 'Master Semester',
			'name' => $this->session->userdata('name'),
			'datalist' => $this->mssmt_model->getListdata(),
			'role' => $this->session->userdata('role'),
			'menu_active' => 2			
		);
		$content = array(
			'left_content' => 'master/mssmt_list',
			'right_content' => 'template/menu_std'			
		);
		$this->template->load('template/templates',$content,$dataprofile);
	}
	
	function mssmt_create(){
		if(isset($_POST['btnSave'])){			
			$this->mssmt_model->setId($_POST['id']);
			$this->mssmt_model->setKet($_POST['ket']);
			$this->mssmt_model->setBobot($_POST['bobot']);
			$this->mssmt_model->insertNewMsSMT();			
			
			redirect('master/mssmt_list');
		}else{
			
			// NEW ID
			
			$latest_ID=$this->mssmt_model->getLatestID();
			$latest_ID=objectToArray($latest_ID);
			$latest_ID=$latest_ID[0]['id_semester']; 
			
			if(substr($latest_ID,0,2)=='SE' and substr($latest_ID,2,2)==0){
				$latest_ID=0;
			}else{
				if(substr($latest_ID,0,2)=='SE' and substr($latest_ID,2,2)>0){
					$latest_ID=intval(substr($latest_ID,2,2));
				}else{
					$latest_ID=0;
				}
			}
			
			
			
			if($latest_ID==0){
				$new_ID='SE'.'01';
			}else{
				
				if($latest_ID<9){
					$new_ID='SE'.'0'.($latest_ID+1);
				}else{
					$new_ID='SE'.($latest_ID+1);
				}
				
			}
			
			// END NEW ID
						
			$dataprofile = array(
				'page_title' => 'Tambah Master Semester',
				'name' => $this->session->userdata('name'),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2,
				'new_ID' => $new_ID			
			);
			$content = array(
				'left_content' => 'master/mssmt_add',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function mssmt_edit(){
		$id = $this->uri->segment(3);
		if(isset($_POST['btnSave'])){			
			$this->mssmt_model->setId($id);
			$this->mssmt_model->setKet($_POST['ket']);
			$this->mssmt_model->setBobot($_POST['bobot']);
			$this->mssmt_model->modifyMsSMT();			
			
			redirect('master/mssmt_list');
		}else{
			$this->mssmt_model->setId($id);	
					
			$dataprofile = array(
				'page_title' => 'Edit Master Semester',
				'name' => $this->session->userdata('name'),
				'datalist' => $this->mssmt_model->getProfileById(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2			
			);
			$content = array(
				'left_content' => 'master/mssmt_edit',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function mssmt_delete(){
		$id = $this->uri->segment(3);
		$this->mssmt_model->setId($id);
		$this->mssmt_model->deleteMsSMT();
		redirect('master/mssmt_list');	
	}
	
	function masalah_list(){
		$dataprofile = array(
			'page_title' => 'Master Masalah',
			'name' => $this->session->userdata('name'),
			'datalist' => $this->masalah_model->getListdata(),
			'role' => $this->session->userdata('role'),
			'menu_active' => 2			
		);
		$content = array(
			'left_content' => 'master/masalah_list',
			'right_content' => 'template/menu_std'			
		);
		$this->template->load('template/templates',$content,$dataprofile);
	}
	
	function masalah_create(){
		if(isset($_POST['btnSave'])){			
			$this->masalah_model->setId($_POST['id']);
			$this->masalah_model->setKet($_POST['ket']);
			$this->masalah_model->setBobot($_POST['bobot']);
			$this->masalah_model->insertNewMasalah();			
			
			redirect('master/masalah_list');
		}else{		
			
			// NEW ID
			
			$latest_ID=$this->masalah_model->getLatestID();
			$latest_ID=objectToArray($latest_ID);
			$latest_ID=$latest_ID[0]['id_masalah']; 
			
			if(substr($latest_ID,0,1)=='M' and substr($latest_ID,1,2)==0){
				$latest_ID=0;
			}else{
				if(substr($latest_ID,0,1)=='M' and substr($latest_ID,1,2)>0){
					$latest_ID=intval(substr($latest_ID,1,2));
				}else{
					$latest_ID=0;
				}
			}
			
			
			
			if($latest_ID==0){
				$new_ID='M'.'01';
			}else{
				
				if($latest_ID<9){
					$new_ID='M'.'0'.($latest_ID+1);
				}else{
					$new_ID='M'.($latest_ID+1);
				}
				
			}
			
			// END NEW ID
				
			$dataprofile = array(
				'page_title' => 'Tambah Master Masalah',
				'name' => $this->session->userdata('name'),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2,
				'new_ID' => $new_ID			
			);
			$content = array(
				'left_content' => 'master/masalah_add',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function masalah_edit(){
		$id = $this->uri->segment(3);
		if(isset($_POST['btnSave'])){			
			$this->masalah_model->setId($id);
			$this->masalah_model->setKet($_POST['ket']);
			$this->masalah_model->setBobot($_POST['bobot']);
			$this->masalah_model->modifyMasalah();			
			
			redirect('master/masalah_list');
		}else{
			$this->masalah_model->setId($id);			
			$dataprofile = array(
				'page_title' => 'Edit Master Masalah',
				'name' => $this->session->userdata('name'),
				'datalist' => $this->masalah_model->getProfileById(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2			
			);
			$content = array(
				'left_content' => 'master/masalah_edit',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function masalah_delete(){
		$id = $this->uri->segment(3);
		$this->masalah_model->setId($id);
		$this->masalah_model->deleteMasalah();
		redirect('master/masalah_list');	
	}
	
	function solusi_list(){
		$dataprofile = array(
			'page_title' => 'Master Solusi',
			'name' => $this->session->userdata('name'),
			'datalist' => $this->solusi_model->getListdata(),
			'role' => $this->session->userdata('role'),
			'menu_active' => 2			
		);
		$content = array(
			'left_content' => 'master/solusi_list',
			'right_content' => 'template/menu_std'			
		);
		$this->template->load('template/templates',$content,$dataprofile);
	}
	
	function solusi_create(){
		if(isset($_POST['btnSave'])){			
			$this->solusi_model->setId($_POST['id']);
			$this->solusi_model->setKet($_POST['ket']);
			$this->solusi_model->setBobot($_POST['bobot']);
			$this->solusi_model->insertNewSolusi();			
			
			redirect('master/solusi_list');
		}else{
			
			// NEW ID
			
			$latest_ID=$this->solusi_model->getLatestID();
			$latest_ID=objectToArray($latest_ID);
			$latest_ID=$latest_ID[0]['id_solusi']; 
			
			if(substr($latest_ID,0,1)=='S' and substr($latest_ID,1,2)==0){
				$latest_ID=0;
			}else{
				if(substr($latest_ID,0,1)=='S' and substr($latest_ID,1,2)>0){
					$latest_ID=intval(substr($latest_ID,1,2));
				}else{
					$latest_ID=0;
				}
			}
			
			
			
			if($latest_ID==0){
				$new_ID='S'.'01';
			}else{
				
				if($latest_ID<9){
					$new_ID='S'.'0'.($latest_ID+1);
				}else{
					$new_ID='S'.($latest_ID+1);
				}
				
			}
			
			// END NEW ID
						
			$dataprofile = array(
				'page_title' => 'Tambah Master Solusi',
				'name' => $this->session->userdata('name'),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2,
				'new_ID' => $new_ID			
			);
			$content = array(
				'left_content' => 'master/solusi_add',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function solusi_edit(){
		$id = $this->uri->segment(3);
		if(isset($_POST['btnSave'])){			
			$this->solusi_model->setId($id);
			$this->solusi_model->setKet($_POST['ket']);
			$this->solusi_model->setBobot($_POST['bobot']);
			$this->solusi_model->modifySolusi();			
			
			redirect('master/solusi_list');
		}else{
			$this->solusi_model->setId($id);			
			$dataprofile = array(
				'page_title' => 'Edit Master Solusi',
				'name' => $this->session->userdata('name'),
				'datalist' => $this->solusi_model->getProfileById(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2			
			);
			$content = array(
				'left_content' => 'master/solusi_edit',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
	
	function solusi_delete(){
		$id = $this->uri->segment(3);
		$this->solusi_model->setId($id);
		$this->solusi_model->deleteSolusi();
		redirect('master/solusi_list');	
	}
	
	function treshold_list(){
		$dataprofile = array(
			'page_title' => 'Master Treshold',
			'name' => $this->session->userdata('name'),
			'datalist' => $this->treshold_model->getNilaiTreshold(),
			'role' => $this->session->userdata('role'),
			'menu_active' => 2			
		);
		$content = array(
			'left_content' => 'master/treshold_list',
			'right_content' => 'template/menu_std'			
		);
		$this->template->load('template/templates',$content,$dataprofile);
	}
	
	function treshold_edit(){
		if(isset($_POST['btnSave'])){			
			$this->treshold_model->setNilai($_POST['nilai']);			
			$this->treshold_model->editTreshold();
			
			redirect('master/treshold_list');
		}else{			
			$dataprofile = array(
				'page_title' => 'Edit Master Treshold',
				'name' => $this->session->userdata('name'),
				'datalist' => $this->treshold_model->getNilaiTreshold(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2			
			);
			$content = array(
				'left_content' => 'master/treshold_edit',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
    
    function mssiswa_list(){
		$dataprofile = array(
			'page_title' => 'Master Siswa',
			'name' => $this->session->userdata('name'),
			'datalist' => $this->siswa_model->getListdata(),
			'role' => $this->session->userdata('role'),
			'menu_active' => 2			
		);
		$content = array(
			'left_content' => 'master/mssiswa_list',
			'right_content' => 'template/menu_std'			
		);
		$this->template->load('template/templates',$content,$dataprofile);
	}
    
    function mssiswa_create(){
		if(isset($_POST['btnSave'])){                
			$this->siswa_model->setNIS($_POST['nis']);
			$this->siswa_model->setTempatLahir($_POST['tempat_lahir']);
			$this->siswa_model->setTanggalLahir($_POST['tgl_lahir']);
            $this->siswa_model->setNama($_POST['nama']);
            $this->siswa_model->setAlamat($_POST['alamat']);
            $this->siswa_model->setTanggalMasuk($_POST['tgl_masuk']);
			$this->siswa_model->insertNewSiswa();			
			
			redirect('master/mssiswa_list');
		}else{	
			
			// NEW ID
			
			/*$latest_ID=$this->msipk_model->getLatestID();
			$latest_ID=objectToArray($latest_ID);
			$latest_ID=$latest_ID[0]['id_ipk']; 
			
			if(substr($latest_ID,0,2)=='IP' and substr($latest_ID,2,2)==0){
				$latest_ID=0;
			}else{
				if(substr($latest_ID,0,2)=='IP' and substr($latest_ID,2,2)>0){
					$latest_ID=intval(substr($latest_ID,2,2));
				}else{
					$latest_ID=0;
				}
			}
			
			
			
			if($latest_ID==0){
				$new_ID='IP'.'01';
			}else{
				
				if($latest_ID<9){
					$new_ID='IP'.'0'.($latest_ID+1);
				}else{
					$new_ID='IP'.($latest_ID+1);
				}
				
			}*/
			
			// END NEW ID
					
			$dataprofile = array(
				'page_title' => 'Tambah Master Siswa',
				'name' => $this->session->userdata('name'),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2			
			);
			$content = array(
				'left_content' => 'master/mssiswa_add',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
    
    function mssiswa_edit(){
        $id = $this->uri->segment(3);
		if(isset($_POST['btnSave'])){
            $this->siswa_model->setNIS($id);
			$this->siswa_model->setTempatLahir($_POST['tempat_lahir']);
			$this->siswa_model->setTanggalLahir($_POST['tgl_lahir']);
            $this->siswa_model->setNama($_POST['nama']);
            $this->siswa_model->setAlamat($_POST['alamat']);
            $this->siswa_model->setTanggalMasuk($_POST['tgl_masuk']);
            $this->siswa_model->modifyDataSiswa();
			
			redirect('master/mssiswa_list');
		}else{
            $this->siswa_model->setNIS($id);
			$dataprofile = array(
				'page_title' => 'Edit Master Siswa',
				'name' => $this->session->userdata('name'),
				'datalist' => $this->siswa_model->getListdataOneSelect(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 2			
			);
			$content = array(
				'left_content' => 'master/mssiswa_edit',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
    
    function mssiswa_delete() {
        $id = $this->uri->segment(3);
		$this->siswa_model->setNIS($id);
		$this->siswa_model->deleteDataSiswa();
		redirect('master/mssiswa_list');	
    }
}