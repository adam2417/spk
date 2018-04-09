<?php
class Konsultan extends CI_Controller {
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
		$this->load->model('kasus_model');
		$this->load->model('siswa_model');
		
		$this->lang->load("button","indonesia");
	}
	
	function index(){		
	}
	
	function plist_psikologi(){
		$data = array(
			'title'=>'Psikologi',
			'name'=>$this->session->userdata('name'),
			'listdata' => $this->mspsikologi_model->getListdata(),
			'role' => $this->session->userdata('role')
		);
		$content = array(
			'plist_content' => 'konsultan/plist_psikologi'
		);
		
		$this->template->load('template/template_plist',$content,$data);
	}
	
	function plist_asal(){
		$data = array(
			'title'=>'Asal',
			'name'=>$this->session->userdata('name'),
			'listdata' => $this->msasalmhs_model->getListdata(),
			'role' => $this->session->userdata('role')
		);
		$content = array(
			'plist_content' => 'konsultan/plist_asal'
		);		
		$this->template->load('template/template_plist',$content,$data);
	}
	
	function plist_ekonomi(){
		$data = array(
			'title'=>'Ekonomi',
			'name'=>$this->session->userdata('name'),
			'listdata' => $this->msekonomi_model->getListdata(),
			'role' => $this->session->userdata('role')
		);
		$content = array(
			'plist_content' => 'konsultan/plist_ekonomi'
		);		
		$this->template->load('template/template_plist',$content,$data);
	}
	
	function plist_ipk(){
		$data = array(
			'title'=>'IPK',
			'name'=>$this->session->userdata('name'),
			'listdata' => $this->msipk_model->getListdata(),
			'role' => $this->session->userdata('role')
		);
		$content = array(
			'plist_content' => 'konsultan/plist_ipk'
		);		
		$this->template->load('template/template_plist',$content,$data);
	}
	
	function plist_keluarga(){
		$data = array(
			'title'=>'Keluarga',
			'name'=>$this->session->userdata('name'),
			'listdata' => $this->mskeluarga_model->getListdata(),
			'role' => $this->session->userdata('role')
		);
		$content = array(
			'plist_content' => 'konsultan/plist_keluarga'
		);		
		$this->template->load('template/template_plist',$content,$data);
	}
	
	function plist_lingkungan(){
		$segment = 0;
		if($this->uri->segment(3)){
			$segment = $this->uri->segment(3);
		}
		$config['base_url'] = base_url() . 'index.php/konsultan/plist_lingkungan/';
		$config['uri_segment'] = 3;
		$config['per_page'] = $this->config->item('page_num');
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open'] = '<div id="paging">';
		$config['full_tag_close'] = '</div>';
		$config['total_rows'] = count($this->mslingkungan_model->getListdata());
		$this->pagination->initialize($config);
		
		$data = array(
			'title'=>'Lingkungan',
			'name'=>$this->session->userdata('name'),
			'listdata' => $this->mslingkungan_model->getListdata_segmented($segment),
			'role' => $this->session->userdata('role')
		);
		$content = array(
			'plist_content' => 'konsultan/plist_lingkungan'
		);		
		$this->template->load('template/template_plist',$content,$data);
	}
	
	function plist_masalah(){
		$segment = 0;
		if($this->uri->segment(3)){
			$segment = $this->uri->segment(3);
		}
		$config['base_url'] = base_url() . 'index.php/konsultan/plist_masalah/';
		$config['uri_segment'] = 3;
		$config['per_page'] = $this->config->item('page_num');
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open'] = '<div id="paging">';
		$config['full_tag_close'] = '</div>';
		$config['total_rows'] = count($this->masalah_model->getListdata());
		$this->pagination->initialize($config);
		
		if(isset($_POST['simpandatabaru'])){
			
			$id_masalah=$_POST['id_masalah'];
			$desc_masalah=$_POST['desc_masalah'];
			
			if($id_masalah!='' and $desc_masalah!=''){
				
				$this->masalah_model->setID($id_masalah);
				$this->masalah_model->setKet($desc_masalah);
				$this->masalah_model->insertNewMasalah();
				
				$konfirmasi_simpan='data berhasil disimpan! <meta http-equiv="refresh" content="1">';
				
			}else{
				$konfirmasi_simpan='data harus lengkap!';
			}
			
			
		}else{
			$konfirmasi_simpan='';
		}
		
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
		
		$data = array(
			'title'=>'Masalah',
			'name'=>$this->session->userdata('name'),
			'listdata' => $this->masalah_model->getListdata_segmented($segment),
			'role' => $this->session->userdata('role'),
			'konfirmasi'=>$konfirmasi_simpan,
			'new_ID' => $new_ID
		);
		$content = array(
			'plist_content' => 'konsultan/plist_masalah'
		);		
		$this->template->load('template/template_plist',$content,$data);
	}
	
	function plist_pribadi(){
		$segment = 0;
		if($this->uri->segment(3)){
			$segment = $this->uri->segment(3);
		}
		$config['base_url'] = base_url() . 'index.php/konsultan/plist_pribadi/';
		$config['uri_segment'] = 3;
		$config['per_page'] = $this->config->item('page_num');
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open'] = '<div id="paging">';
		$config['full_tag_close'] = '</div>';
		$config['total_rows'] = count($this->mspribadi_model->getListdata());
		$this->pagination->initialize($config);
		
		$data = array(
			'title'=>'Pribadi',
			'name'=>$this->session->userdata('name'),
			'listdata' => $this->mspribadi_model->getListdata_segmented($segment),
			'role' => $this->session->userdata('role')
		);
		$content = array(
			'plist_content' => 'konsultan/plist_pribadi'
		);
		
		$this->template->load('template/template_plist',$content,$data);
	}
	
	function plist_siswa(){
		$segment = 0;
		if($this->uri->segment(3)){
			$segment = $this->uri->segment(3);
		}
		$config['base_url'] = base_url() . 'index.php/konsultan/plist_siswa/';
		$config['uri_segment'] = 3;
		$config['per_page'] = $this->config->item('page_num');
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open'] = '<div id="paging">';
		$config['full_tag_close'] = '</div>';
		$config['total_rows'] = count($this->siswa_model->getListdata());
		$this->pagination->initialize($config);
		
		$data = array(
			'title'=>'Pribadi',
			'name'=>$this->session->userdata('name'),
			'listdata' => $this->siswa_model->getListdataSegmented($segment),
			'role' => $this->session->userdata('role')
		);
		$content = array(
			'plist_content' => 'konsultan/plist_siswa'
		);
		
		$this->template->load('template/template_plist',$content,$data);
	}
	
	function plist_semester(){
		$data = array(
			'title'=>'Semester',
			'name'=>$this->session->userdata('name'),
			'listdata' => $this->mssmt_model->getListdata(),
			'role' => $this->session->userdata('role')
		);
		$content = array(
			'plist_content' => 'konsultan/plist_semester'
		);		
		$this->template->load('template/template_plist',$content,$data);
	}
	
	function plist_solusi(){
		$segment = 0;
		if($this->uri->segment(3)){
			$segment = $this->uri->segment(3);
		}
		$config['base_url'] = base_url() . 'index.php/konsultan/plist_solusi/';
		$config['uri_segment'] = 3;
		$config['per_page'] = $this->config->item('page_num');
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open'] = '<div id="paging">';
		$config['full_tag_close'] = '</div>';
		$config['total_rows'] = count($this->solusi_model->getListdata());
		$this->pagination->initialize($config);
		
		if(isset($_POST['simpandatabaru'])){
			
			$id_solusi=$_POST['id_solusi'];
			$desc_solusi=$_POST['desc_solusi'];
			
			if($id_solusi!='' and $desc_solusi!=''){
				
				$this->solusi_model->setID($id_solusi);
				$this->solusi_model->setKet($desc_solusi);
				$this->solusi_model->insertNewSolusi();
				
				$konfirmasi_simpan='data berhasil disimpan! <meta http-equiv="refresh" content="1">';
				
			}else{
				$konfirmasi_simpan='data harus lengkap!';
			}
			
			
		}else{
			$konfirmasi_simpan='';
		}
		
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
		
		$data = array(
			'title'=>'Solusi',
			'name'=>$this->session->userdata('name'),
			'listdata' => $this->solusi_model->getListdata_segmented($segment),
			'role' => $this->session->userdata('role'),
			'konfirmasi'=>$konfirmasi_simpan,
			'new_ID' => $new_ID
		);
		$content = array(
			'plist_content' => 'konsultan/plist_solusi'
		);		
		$this->template->load('template/template_plist',$content,$data);
	}
	
	function tambahkasus(){
		$i = 0;
		$last_id = 0;
		$new_id = 0;
		$arr_data = array(); $arr_data_bobot = array();
		
		//$arr_data[0] = $_POST["txtasal"];		
		$arr_data[0] = $_POST['txtekonomi'];
		$arr_data[1] = $_POST["txtsemester"];
		$arr_data[2] = $_POST["txtipk"];
		
		//$arr_data_bobot[0] = $_POST["txtasal_bobot"];		
		$arr_data_bobot[0] = $_POST['txtekonomi_bobot'];
		$arr_data_bobot[1] = $_POST["txtsemester_bobot"];
		$arr_data_bobot[2] = $_POST["txtipk_bobot"];
		
		$masalah = $_POST["txtmasalah"];
		$solusi = $_POST["txtsolusi"];
		
		$last_id = $this->kasus_model->getLastId();
		$new_id = ($last_id[0]["last_id"]) + 1;	
		
		
		
		while($i < count($arr_data)){
			if(!empty($arr_data[$i]) && (isset($arr_data[$i]))){
				$this->kasus_model->setIdKasus($new_id);
				$this->kasus_model->setIdAtribut($arr_data[$i]);
				$this->kasus_model->setIdMasalah($masalah);
				$this->kasus_model->setIdSolusi($solusi);				
				$this->kasus_model->setBobot($arr_data_bobot[$i]);
				$this->kasus_model->insertNewKasus();
			}
			$i++;
		}
	
		// Psikologi
		
		if(isset($_POST['chkpsikologi'])){
			$arr_psikologi = $_POST['chkpsikologi'];
			$j = 0;
			while($j < count($arr_psikologi)){
				if(!empty($arr_psikologi[$j]) && (isset($arr_psikologi[$j]))){
					$this->kasus_model->setIdKasus($new_id);
					$this->kasus_model->setIdAtribut($arr_psikologi[$j]);
					$this->kasus_model->setIdMasalah($masalah);
					$this->kasus_model->setIdSolusi($solusi);				
					$this->kasus_model->setBobot($_POST['chkpsikologi_bobot'][$arr_psikologi[$j]]);
					$this->kasus_model->insertNewKasus();
				}
				
				$j++;
			}
		}
				
		// Pribadi
		if(isset($_POST['chkpribadi'])){
			$arr_pribadi = $_POST['chkpribadi'];
			$j = 0;
			while($j < count($arr_pribadi)){
				if(!empty($arr_pribadi[$j]) && (isset($arr_pribadi[$j]))){
					$this->kasus_model->setIdKasus($new_id);
					$this->kasus_model->setIdAtribut($arr_pribadi[$j]);
					$this->kasus_model->setIdMasalah($masalah);
					$this->kasus_model->setIdSolusi($solusi);				
					$this->kasus_model->setBobot($_POST['chkpribadi_bobot'][$arr_pribadi[$j]]);
					$this->kasus_model->insertNewKasus();
					
				}
				$j++;
			}
		}
		
		// Keluarga
		if(isset($_POST['chkkeluarga'])){
			$arr_keluarga = $_POST['chkkeluarga'];
			$j = 0;
			while($j < count($arr_keluarga)){
				if(!empty($arr_keluarga[$j]) && (isset($arr_keluarga[$j]))){
					$this->kasus_model->setIdKasus($new_id);
					$this->kasus_model->setIdAtribut($arr_keluarga[$j]);
					$this->kasus_model->setIdMasalah($masalah);
					$this->kasus_model->setIdSolusi($solusi);				
					$this->kasus_model->setBobot($_POST['chkkeluarga_bobot'][$arr_keluarga[$j]]);
					$this->kasus_model->insertNewKasus();
				}
				$j++;
			}
		}
		
		// Lingkungan
		if(isset($_POST['chklingkungan'])){
			$arr_lingkungan = $_POST['chklingkungan'];
			$j = 0;
			while($j < count($arr_lingkungan)){
				if(!empty($arr_lingkungan[$j]) && (isset($arr_lingkungan[$j]))){
					$this->kasus_model->setIdKasus($new_id);
					$this->kasus_model->setIdAtribut($arr_lingkungan[$j]);
					$this->kasus_model->setIdMasalah($masalah);
					$this->kasus_model->setIdSolusi($solusi);				
					$this->kasus_model->setBobot($_POST['chklingkungan_bobot'][$arr_lingkungan[$j]]);
					$this->kasus_model->insertNewKasus();
					}
				$j++;
			}
		}
		
		redirect('konsultan/konselingpage');
	}
	
	function addformkonseling(){
		$param_val = get_sysparam('1');
		
		/* BOBOT */		
		$combo_bobot_asal='<select name="txtasal_bobot">';
		for($v=0;$v<=intval($param_val);$v++){
			$combo_bobot_asal.='<option value="'.$v.'">'.$v.'</option>';
		}
		$combo_bobot_asal.='</select>';
		
		$combo_bobot_ekonomi='<select name="txtekonomi_bobot">';
		for($v=0;$v<=intval($param_val);$v++){
			$combo_bobot_ekonomi.='<option value="'.$v.'">'.$v.'</option>';
		}
		$combo_bobot_ekonomi.='</select>';
		
		$combo_bobot_semester='<select name="txtsemester_bobot">';
		for($v=0;$v<=intval($param_val);$v++){
			$combo_bobot_semester.='<option value="'.$v.'">'.$v.'</option>';
		}
		$combo_bobot_semester.='</select>';
		
		$combo_bobot_ipk='<select name="txtipk_bobot">';
		for($v=0;$v<=intval($param_val);$v++){
			$combo_bobot_ipk.='<option value="'.$v.'">'.$v.'</option>';
		}
		$combo_bobot_ipk.='</select>';
		
		/* START LIST CHECKBOX PSIKOLOGI */
		$psikologi_data=objectToArray($this->mspsikologi_model->getListdata());
		$psikologi_list='<table cellpadding="2" cellspacing="0" border="0"><tr><td></td><td>Bobot</td></tr>';
		
		for($a=0;$a<count($psikologi_data);$a++){
			
			$idl=$psikologi_data[$a]['id_psikologis'];
			
			$combo_bobot='<select id="chkpsikologi_bobot_'.$a.'" name="chkpsikologi_bobot['.$idl.']">';
			for($v=0;$v<=intval($param_val);$v++){
				$combo_bobot.='<option value="'.$v.'">'.$v.'</option>';
			}
			$combo_bobot.='</select>';
			
			if(strtolower($psikologi_data[$a]['ket'])=='diabaikan'){ $onclick='onclick="disableCBP(\''.count($psikologi_data).'\',\''.$a.'\',\'chkpsikologi_\',\'chkpsikologi_bobot_\')"';  }else{ $onclick='onclick="changeBobot(\'chkpsikologi_\',\''.$a.'\',\'chkpsikologi_bobot_\',\''.$psikologi_data[$a]['bobot'].'\')"'; }
			$psikologi_list.=('<tr><td>
			<input type="checkbox" id="chkpsikologi_'.$a.'" name="chkpsikologi[]" value="'.$idl.'" '.$onclick.' />'.$psikologi_data[$a]['ket'].' 
			</td>
			<td>
			'.$combo_bobot.'
			</td></tr>');
		}
		
		$psikologi_list.='</table>';
		
		/* END */
		
		/* START LIST CHECKBOX KELUARGA */
		$keluarga_data=objectToArray($this->mskeluarga_model->getListData());
		$keluarga_list='<table cellpadding="2" cellspacing="0" border="0"><tr><td></td><td></td><td>Bobot</td></tr>';
		for($a=0;$a<count($keluarga_data);$a++){
			
			$idl=$keluarga_data[$a]['id_keluarga'];
			
			$combo_bobot='<select id="chkkeluarga_bobot_'.$a.'" name="chkkeluarga_bobot['.$idl.']">';
			for($v=0;$v<=intval($param_val);$v++){
				$combo_bobot.='<option value="'.$v.'">'.$v.'</option>';
			}
			$combo_bobot.='</select>';
			
			if(strtolower($keluarga_data[$a]['ket'])=='diabaikan'){ $onclick='onclick="disableCBP(\''.count($keluarga_data).'\',\''.$a.'\',\'chkkeluarga_\',\'chkkeluarga_bobot_\')"';  }else{ $onclick='onclick="changeBobot(\'chkkeluarga_\',\''.$a.'\',\'chkkeluarga_bobot_\',\''.$keluarga_data[$a]['bobot'].'\')"'; }
			
			$keluarga_list.=('<tr><td><input type="checkbox" id="chkkeluarga_'.$a.'" name="chkkeluarga[]" value="'.$idl.'" '.$onclick.' />'.$keluarga_data[$a]['ket'].'</td><td>&nbsp;</td><td>'.$combo_bobot.'</td></tr>');
			
		}
		
		$keluarga_list.='</table>';
		
		/* END */
		
		/* START LIST CHECKBOX PRIBADI */
		$pribadi_data=objectToArray($this->mspribadi_model->getListData());
		$pribadi_list='<table cellpadding="2" cellspacing="0" border="0"><tr><td></td><td></td><td>Bobot</td></tr>';
		for($a=0;$a<count($pribadi_data);$a++){
			
			$idl=$pribadi_data[$a]['id_pribadi'];
			
			$combo_bobot='<select id="chkpribadi_bobot_'.$a.'" name="chkpribadi_bobot['.$idl.']">';
			for($v=0;$v<=intval($param_val);$v++){
				$combo_bobot.='<option value="'.$v.'">'.$v.'</option>';
			}
			$combo_bobot.='</select>';
			
			if(strtolower($pribadi_data[$a]['ket'])=='diabaikan'){ $onclick='onclick="disableCBP(\''.count($pribadi_data).'\',\''.$a.'\',\'chkpribadi_\',\'chkpribadi_bobot_\')"';  }else{ $onclick='onclick="changeBobot(\'chkpribadi_\',\''.$a.'\',\'chkpribadi_bobot_\',\''.$pribadi_data[$a]['bobot'].'\')"'; }
			
			$pribadi_list.=('<tr><td><input type="checkbox" id="chkpribadi_'.$a.'" name="chkpribadi[]" value="'.$idl.'" '.$onclick.' />'.$pribadi_data[$a]['ket'].'</td><td>&nbsp;</td><td>'.$combo_bobot.'</td></td></tr>');
		}
		$pribadi_list.='</table>';
		/* END */
		
		/* START LIST CHECKBOX LINGKUNGAN */
		$lingkungan_data=objectToArray($this->mslingkungan_model->getListData());
		$lingkungan_list='<table cellpadding="2" cellspacing="0" border="0"><tr><td></td><td></td><td>Bobot</td></tr>';
		for($a=0;$a<count($lingkungan_data);$a++){
			
			$idl=$lingkungan_data[$a]['id_lingkungan'];
			
			$combo_bobot='<select id="chklingkungan_bobot_'.$a.'" name="chklingkungan_bobot['.$idl.']">';
			for($v=0;$v<=intval($param_val);$v++){
				$combo_bobot.='<option value="'.$v.'">'.$v.'</option>';
			}
			$combo_bobot.='</select>';
			
			if(strtolower($lingkungan_data[$a]['ket'])=='diabaikan'){ $onclick='onclick="disableCBP(\''.count($lingkungan_data).'\',\''.$a.'\',\'chklingkungan_\',\'chklingkungan_bobot_\')"';  }else{ $onclick='onclick="changeBobot(\'chklingkungan_\',\''.$a.'\',\'chklingkungan_bobot_\',\''.$lingkungan_data[$a]['bobot'].'\')"'; }
			
			$lingkungan_list.=('<tr><td><input type="checkbox" id="chklingkungan_'.$a.'" name="chklingkungan[]" value="'.$idl.'" '.$onclick.' />'.$lingkungan_data[$a]['ket'].'</td><td>&nbsp;</td><td>'.$combo_bobot.'</td></tr>');
		}
		$lingkungan_list.='</table>';
		
		/* END */
		
		$data = array(
			'page_title'=>'Konseling',
			'name'=>$this->session->userdata('name'),
			'role' => $this->session->userdata('role'),
			'lingkungan_list' => $lingkungan_list,
			'keluarga_list' => $keluarga_list,
			'pribadi_list' =>$pribadi_list,
			'menu_active' => 3,
			'psikologi_list' =>$psikologi_list,
			//'combo_bobot_asal' => $combo_bobot_asal,
			'combo_bobot_ekonomi' => $combo_bobot_ekonomi,
			'combo_bobot_semester' => $combo_bobot_semester,
			'combo_bobot_ipk' => $combo_bobot_ipk
		);
		$content = array(
			'left_content' => 'konsultan/halkonseling',
			'right_content' => 'template/menu_std'
		);
		//$this->template->add_js('alert("test");','embed');
		$this->template->load('template/templates',$content,$data);
	}
	
	function konselingPage(){
		$segment = 0;
		if($this->uri->segment(3)){
			$segment = $this->uri->segment(3);
		}
		$config['base_url'] = base_url() . 'index.php/konsultan/konselingPage/';
		$config['uri_segment'] = 3;
		$config['per_page'] = $this->config->item('page_num');
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open'] = '<div id="paging">';
		$config['full_tag_close'] = '</div>';
		$config['total_rows'] = count($this->kasus_model->getListdata());
		$this->pagination->initialize($config);
		
		$data = array(
			'page_title'=>'Konseling',
			'name'=>$this->session->userdata('name'),
			'kasus_list' => $this->kasus_model->getListdata_segmented($segment),
			'role' => $this->session->userdata('role'),
			'menu_active' => 3
		);
		$content = array(
			'left_content' => 'konsultan/konseling_list',
			'right_content' => 'template/menu_std'
		);
		//$this->template->add_js('alert("test");','embed');
		$this->template->load('template/templates',$content,$data);
	}
	
	function konsultan_edit(){
		$param_val = get_sysparam('1');
		$id = $this->uri->segment(3);
		
		if(isset($_POST['btnSave'])){
			/* Clear Old Data */
			$this->kasus_model->setIdKasus($id);
			$this->kasus_model->deleteKasus();
			/* Save new */
			
			$new_id=$id;
			
			$arr_data = array(); $arr_data_bobot = array();

			$arr_data[0] = $_POST["txtasal"];		
			$arr_data[1] = $_POST['txtekonomi'];
			$arr_data[2] = $_POST["txtsemester"];
			$arr_data[3] = $_POST["txtipk"];
			
			$arr_data_bobot[0] = $_POST["txtasal_bobot"];		
			$arr_data_bobot[1] = $_POST['txtekonomi_bobot'];
			$arr_data_bobot[2] = $_POST["txtsemester_bobot"];
			$arr_data_bobot[3] = $_POST["txtipk_bobot"];
			
			$masalah = $_POST["txtmasalah"];
			$solusi = $_POST["txtsolusi"];
			
			$i=0;
			
			while($i < count($arr_data)){
				if(!empty($arr_data[$i]) && (isset($arr_data[$i]))){
					$this->kasus_model->setIdKasus($new_id);
					$this->kasus_model->setIdAtribut($arr_data[$i]);
					$this->kasus_model->setIdMasalah($masalah);
					$this->kasus_model->setIdSolusi($solusi);				
					$this->kasus_model->setBobot($arr_data_bobot[$i]);
					$this->kasus_model->insertNewKasus();
				}
				$i++;
			}
			
			// Psikologi
			
			if(isset($_POST['chkpsikologi'])){
				$arr_psikologi = $_POST['chkpsikologi'];
				$j = 0;
				while($j < count($arr_psikologi)){
					if(!empty($arr_psikologi[$j]) && (isset($arr_psikologi[$j]))){
						$this->kasus_model->setIdKasus($new_id);
						$this->kasus_model->setIdAtribut($arr_psikologi[$j]);
						$this->kasus_model->setIdMasalah($masalah);
						$this->kasus_model->setIdSolusi($solusi);				
						$this->kasus_model->setBobot($_POST['chkpsikologi_bobot'][$arr_psikologi[$j]]);
						$this->kasus_model->insertNewKasus();
					}
					$j++;
				}
			}
			
			
			// Pribadi
			if(isset($_POST['chkpribadi'])){
				$arr_pribadi = $_POST['chkpribadi'];
				$j = 0;
				while($j < count($arr_pribadi)){
					if(!empty($arr_pribadi[$j]) && (isset($arr_pribadi[$j]))){
						$this->kasus_model->setIdKasus($new_id);
						$this->kasus_model->setIdAtribut($arr_pribadi[$j]);
						$this->kasus_model->setIdMasalah($masalah);
						$this->kasus_model->setIdSolusi($solusi);				
						$this->kasus_model->setBobot($_POST['chkpribadi_bobot'][$arr_pribadi[$j]]);
						$this->kasus_model->insertNewKasus();
					}
					$j++;
				}
			}
			
			// Keluarga
			if(isset($_POST['chkkeluarga'])){
				$arr_keluarga = $_POST['chkkeluarga'];
				$j = 0;
				while($j < count($arr_keluarga)){
					if(!empty($arr_keluarga[$j]) && (isset($arr_keluarga[$j]))){
						$this->kasus_model->setIdKasus($new_id);
						$this->kasus_model->setIdAtribut($arr_keluarga[$j]);
						$this->kasus_model->setIdMasalah($masalah);
						$this->kasus_model->setIdSolusi($solusi);				
						$this->kasus_model->setBobot($_POST['chkkeluarga_bobot'][$arr_keluarga[$j]]);
						$this->kasus_model->insertNewKasus();
					}
					$j++;
				}
			}
			// Lingkungan
			if(isset($_POST['chklingkungan'])){
				$arr_lingkungan = $_POST['chklingkungan'];
				$j = 0;
				while($j < count($arr_lingkungan)){
					if(!empty($arr_lingkungan[$j]) && (isset($arr_lingkungan[$j]))){
						$this->kasus_model->setIdKasus($new_id);
						$this->kasus_model->setIdAtribut($arr_lingkungan[$j]);
						$this->kasus_model->setIdMasalah($masalah);
						$this->kasus_model->setIdSolusi($solusi);				
						$this->kasus_model->setBobot($_POST['chklingkungan_bobot'][$arr_lingkungan[$j]]);
						$this->kasus_model->insertNewKasus();
					}
					$j++;
				}
			}
			redirect('konsultan/konselingpage');			
		}else{
			$this->kasus_model->setIdKasus($id);
			
			/* ASAL,EKONOMI,SEMESTER,IPK,MASALAH,SOLUSI */
			
			$datalist=objectToArray($this->kasus_model->getListdataById());
			
			$asal=$datalist[0]['asal'];
			$id_asal=$datalist[0]['idasal'];
			$data_bobot=objectToArray($this->kasus_model->getBobotByID($id_asal));
			$asal_bobot=$data_bobot[0]['bobot'];
			
			$ekonomi=$datalist[0]['ekonomi'];
			$id_ekonomi=$datalist[0]['idekonomi'];
			$data_bobot=objectToArray($this->kasus_model->getBobotByID($id_ekonomi));
			$ekonomi_bobot=$data_bobot[0]['bobot'];
			
			$semester=$datalist[0]['semester'];
			$id_semester=$datalist[0]['idsemester'];
			$data_bobot=objectToArray($this->kasus_model->getBobotByID($id_semester));
			$semester_bobot=$data_bobot[0]['bobot'];
			
			$ipk=$datalist[0]['ipk'];
			$id_ipk=$datalist[0]['idipk'];
			$data_bobot=objectToArray($this->kasus_model->getBobotByID($id_ipk));
			$ipk_bobot=$data_bobot[0]['bobot'];
			
			$solusi=$datalist[0]['solusi'];
			$id_solusi=$datalist[0]['id_solusi'];
			
			$masalah=$datalist[0]['solusi'];
			$id_masalah=$datalist[0]['id_masalah'];
			$this->masalah_model->setId($id_masalah);
			$data_masalah=objectToArray($this->masalah_model->getProfileById());
			$masalah=$data_masalah[0]['ket'];
			
			/* BOBOT */

			$combo_bobot_asal='<select name="txtasal_bobot">'; $selected='';
			for($v=0;$v<=intval($param_val);$v++){
				if($v==$asal_bobot){ $selected='selected="selected"'; }else{ $selected=''; }
				$combo_bobot_asal.='<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
			}
			$combo_bobot_asal.='</select>';
			
			$combo_bobot_ekonomi='<select name="txtekonomi_bobot">'; $selected='';
			for($v=0;$v<=intval($param_val);$v++){
				if($v==$ekonomi_bobot){ $selected='selected="selected"'; }else{ $selected=''; }
				$combo_bobot_ekonomi.='<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
			}
			$combo_bobot_ekonomi.='</select>';
			
			$combo_bobot_semester='<select name="txtsemester_bobot">'; $selected='';
			for($v=0;$v<=intval($param_val);$v++){
				if($v==$semester_bobot){ $selected='selected="selected"'; }else{ $selected=''; }
				$combo_bobot_semester.='<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
			}
			$combo_bobot_semester.='</select>';
			
			$combo_bobot_ipk='<select name="txtipk_bobot">'; $selected='';
			for($v=0;$v<=intval($param_val);$v++){
				if($v==$ipk_bobot){ $selected='selected="selected"'; }else{ $selected=''; }
				$combo_bobot_ipk.='<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
			}
			$combo_bobot_ipk.='</select>';
			
			/* START LIST CHECKBOX PSIKOLOGI */
			$clist=''; $disabled='';
			
			$psikologi_list_saved=objectToArray($this->kasus_model->getKasusByAtribut('PS'));
			for($a=0;$a<count($psikologi_list_saved);$a++){
				$attr=$psikologi_list_saved[$a]['id_atribut'];
				$clist[$a]=$attr;
				$cbobot[$attr]=$psikologi_list_saved[$a]['bobot'];
			}
			
			$clist=','.implode(',',$clist);
			
			$psikologi_data=objectToArray($this->mspsikologi_model->getListdata());
			$psikologi_list='<table cellpadding="2" cellspacing="0" border="0"><tr><td></td><td>Bobot</td></tr>';
			
			for($a=0;$a<count($psikologi_data);$a++){
				if(strtolower($psikologi_data[$a]['ket'])=='diabaikan'){ $onclick='onclick="disableCBP(\''.count($psikologi_data).'\',\''.$a.'\',\'chkpsikologi_\',\'chkpsikologi_bobot_\')"';  }else{ $onclick=''; }
				
				$idl=$psikologi_data[$a]['id_psikologis'];
				if(isset($cbobot[$idl])){ $bobotl=$cbobot[$idl]; }else{ $bobotl=''; }
				
				if(strpos($clist, $idl)){ 
					$checked='checked="checked"'; 
					if(strtolower($psikologi_data[$a]['ket'])=='diabaikan'){ 
						$disabled='<script>disableCBP2(\''.count($psikologi_data).'\',\''.$a.'\',\'chkpsikologi_\',\'chkpsikologi_bobot_\');</script>'; 
					} 
				}else{ $checked='';  }
				
				$combo_bobot='<select id="chkpsikologi_bobot_'.$a.'" name="chkpsikologi_bobot['.$idl.']">';
				for($v=0;$v<=intval($param_val);$v++){
					if($bobotl==$v){ $selected='selected="selected"'; }else{ $selected=''; }
					$combo_bobot.='<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
				}
				$combo_bobot.='</select>';
				
				$psikologi_list.=('<tr><td>
				<input type="checkbox" id="chkpsikologi_'.$a.'" name="chkpsikologi[]" value="'.$idl.'" '.$onclick.' '.$checked.' />'.$psikologi_data[$a]['ket'].' 
				</td>
				<td>
				'.$combo_bobot.'
				</td></tr>');
			}
			
			$psikologi_list.='</table>'.$disabled;
			
			/* END */
			
			/* START LIST CHECKBOX KELUARGA */
			
			$clist=''; $disabled='';
			
			$keluarga_list_saved=objectToArray($this->kasus_model->getKasusByAtribut('KE'));
			for($a=0;$a<count($keluarga_list_saved);$a++){
				$attr=$keluarga_list_saved[$a]['id_atribut'];
				$clist[$a]=$attr;
				$cbobot[$attr]=$keluarga_list_saved[$a]['bobot'];
			}
			
			$clist=','.implode(',',$clist);
			
			$keluarga_data=objectToArray($this->mskeluarga_model->getListData());
			$keluarga_list='<table cellpadding="2" cellspacing="0" border="0"><tr><td></td><td></td><td>Bobot</td></tr>';
			for($a=0;$a<count($keluarga_data);$a++){
				
				if(strtolower($keluarga_data[$a]['ket'])=='diabaikan'){ $onclick='onclick="disableCBP(\''.count($keluarga_data).'\',\''.$a.'\',\'chkkeluarga_\',\'chkkeluarga_bobot_\')"';  }else{ $onclick=''; }
				
				$idl=$keluarga_data[$a]['id_keluarga'];
				if(isset($cbobot[$idl])){ $bobotl=$cbobot[$idl]; }else{ $bobotl=''; }
				
				if(strpos($clist, $idl)){ 
					$checked='checked="checked"'; 
					if(strtolower($keluarga_data[$a]['ket'])=='diabaikan'){ 
						$disabled='<script>disableCBP2(\''.count($keluarga_data).'\',\''.$a.'\',\'chkkeluarga_\',\'chkkeluarga_bobot_\');</script>'; 
					} 
				}else{ $checked='';  }
				
				$combo_bobot='<select id="chkkeluarga_bobot_'.$a.'" name="chkkeluarga_bobot['.$idl.']">';
				for($v=0;$v<=intval($param_val);$v++){
					if($bobotl==$v){ $selected='selected="selected"'; }else{ $selected=''; }
					$combo_bobot.='<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
				}
				$combo_bobot.='</select>';
				
				$keluarga_list.=('<tr><td><input type="checkbox" id="chkkeluarga_'.$a.'" name="chkkeluarga[]" value="'.$idl.'" '.$onclick.' '.$checked.' />'.$keluarga_data[$a]['ket'].'</td><td>&nbsp;</td><td>'.$combo_bobot.'</td></tr>');
				
			}
			
			$keluarga_list.='</table>'.$disabled;
			
			/* END */
			
			/* START LIST CHECKBOX PRIBADI */
			
			$clist=''; $disabled='';
			
			$pribadi_list_saved=objectToArray($this->kasus_model->getKasusByAtribut('PR'));
			for($a=0;$a<count($pribadi_list_saved);$a++){
				$attr=$pribadi_list_saved[$a]['id_atribut'];
				$clist[$a]=$attr;
				$cbobot[$attr]=$pribadi_list_saved[$a]['bobot'];
			}
			
			$clist=','.implode(',',$clist);
			
			$pribadi_data=objectToArray($this->mspribadi_model->getListData());
			$pribadi_list='<table cellpadding="2" cellspacing="0" border="0"><tr><td></td><td></td><td>Bobot</td></tr>';
			for($a=0;$a<count($pribadi_data);$a++){
				
				if(strtolower($pribadi_data[$a]['ket'])=='diabaikan'){ $onclick='onclick="disableCBP(\''.count($pribadi_data).'\',\''.$a.'\',\'chkpribadi_\',\'chkpribadi_bobot_\')"';  }else{ $onclick=''; }
				
				$idl=$pribadi_data[$a]['id_pribadi'];
				if(isset($cbobot[$idl])){ $bobotl=$cbobot[$idl]; }else{ $bobotl=''; }
				
				if(strpos($clist, $idl)){ 
					$checked='checked="checked"'; 
					if(strtolower($pribadi_data[$a]['ket'])=='diabaikan'){ 
						$disabled='<script>disableCBP2(\''.count($pribadi_data).'\',\''.$a.'\',\'chkpribadi_\',\'chkpribadi_bobot_\');</script>'; 
					} 
				}else{ $checked='';  }
				
				$combo_bobot='<select id="chkpribadi_bobot_'.$a.'" name="chkpribadi_bobot['.$idl.']">';
				for($v=0;$v<=intval($param_val);$v++){
					if($bobotl==$v){ $selected='selected="selected"'; }else{ $selected=''; }
					$combo_bobot.='<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
				}
				$combo_bobot.='</select>';
				
				$pribadi_list.=('<tr><td><input type="checkbox" id="chkpribadi_'.$a.'" name="chkpribadi[]" value="'.$idl.'" '.$onclick.' '.$checked.' />'.$pribadi_data[$a]['ket'].'</td><td>&nbsp;</td><td>'.$combo_bobot.'</td></tr>');
				
			}
			
			$pribadi_list.='</table>'.$disabled;
			
			/* END */
			
			/* START LIST CHECKBOX LINGKUNGAN */
			
			$clist=''; $disabled='';
			
			$lingkungan_list_saved=objectToArray($this->kasus_model->getKasusByAtribut('LI'));
			for($a=0;$a<count($lingkungan_list_saved);$a++){
				$attr=$lingkungan_list_saved[$a]['id_atribut'];
				$clist[$a]=$attr;
				$cbobot[$attr]=$lingkungan_list_saved[$a]['bobot'];
			}
			
			$clist=','.implode(',',$clist);
			
			$lingkungan_data=objectToArray($this->mslingkungan_model->getListData());
			$lingkungan_list='<table cellpadding="2" cellspacing="0" border="0"><tr><td></td><td></td><td>Bobot</td></tr>';
			for($a=0;$a<count($lingkungan_data);$a++){
				
				if(strtolower($lingkungan_data[$a]['ket'])=='diabaikan'){ $onclick='onclick="disableCBP(\''.count($lingkungan_data).'\',\''.$a.'\',\'chklingkungan_\',\'chklingkungan_bobot_\')"';  }else{ $onclick=''; }
				
				$idl=$lingkungan_data[$a]['id_lingkungan'];
				if(isset($cbobot[$idl])){ $bobotl=$cbobot[$idl]; }else{ $bobotl=''; }
				
				if(strpos($clist, $idl)){ 
					$checked='checked="checked"'; 
					if(strtolower($lingkungan_data[$a]['ket'])=='diabaikan'){ 
						$disabled='<script>disableCBP2(\''.count($lingkungan_data).'\',\''.$a.'\',\'chklingkungan_\',\'chklingkungan_bobot_\');</script>'; 
					} 
				}else{ $checked='';  }
				
				$combo_bobot='<select id="chklingkungan_bobot_'.$a.'" name="chklingkungan_bobot['.$idl.']">';
				for($v=0;$v<=intval($param_val);$v++){
					if($bobotl==$v){ $selected='selected="selected"'; }else{ $selected=''; }
					$combo_bobot.='<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
				}
				$combo_bobot.='</select>';
				
				$lingkungan_list.=('<tr><td><input type="checkbox" id="chklingkungan_'.$a.'" name="chklingkungan[]" value="'.$idl.'" '.$onclick.' '.$checked.' />'.$lingkungan_data[$a]['ket'].'</td><td>&nbsp;</td><td>'.$combo_bobot.'</td></tr>');
				
			}
			
			$lingkungan_list.='</table>'.$disabled;
			
			/* END */
			
			$dataprofile = array(
				'page_title' => 'Edit Konsultan',
				'name' => $this->session->userdata('name'),
				'role' => $this->session->userdata('role'),
				'lingkungan_list' => $lingkungan_list,
				'keluarga_list' => $keluarga_list,
				'pribadi_list' => $pribadi_list,
				'menu_active' => 3,
				'psikologis_list' => $psikologi_list,
				'asal'=>$asal,
				'id_asal'=>$id_asal,
				'asal_bobot'=>$asal_bobot,
				'ekonomi'=>$ekonomi,
				'id_ekonomi'=>$id_ekonomi,
				'ekonomi_bobot'=>$ekonomi_bobot,
				'semester'=>$semester,
				'id_semester'=>$id_semester,
				'semester_bobot'=>$semester_bobot,
				'ipk'=>$ipk,
				'id_ipk'=>$id_ipk,
				'ipk_bobot'=>$ipk_bobot,
				'solusi'=>$solusi,
				'id_solusi'=>$id_solusi,
				'id_masalah'=>$id_masalah,
				'masalah_desc'=>$masalah,
				'combo_bobot_asal' => $combo_bobot_asal,
				'combo_bobot_ekonomi' => $combo_bobot_ekonomi,
				'combo_bobot_semester' => $combo_bobot_semester,
				'combo_bobot_ipk' => $combo_bobot_ipk			
			);
			$content = array(
				'left_content' => 'konsultan/konselingedit',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);		
		}		
	}
	
	function konsultan_delete(){
		$id = $this->uri->segment(3);
		$this->kasus_model->setIdKasus($id);
		$this->kasus_model->deleteKasus();
		redirect('konsultan/konselingPage');	
	}
}