<?php
class Keluhan extends CI_Controller {
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
		$this->load->model('keluhan_model');
		
		$this->load->model('subpending_model');
		$this->load->model('user_model');
		
		$this->lang->load("button","indonesia");
	}
	
	function index(){
		$param_val = get_sysparam('1');
		/* BOBOT */		
		
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
			
			if(strtolower($psikologi_data[$a]['ket'])=='diabaikan'){ $onclick='onclick="disableCBP(\''.count($psikologi_data).'\',\''.$a.'\',\'chkpsikologi_\',\'chkpsikologi_bobot_\')"';  }else{ $onclick='onclick="changeBobot(\'chkpsikologi_\',\''.$a.'\',\'chkpsikologi_bobot_\',\''.$psikologi_data[$a]['bobot'].'\')"'; }
			
			$combo_bobot='<select id="chkpsikologi_bobot_'.$a.'" name="chkpsikologi_bobot['.$idl.']">';
			for($v=0;$v<=intval($param_val);$v++){
				$combo_bobot.='<option value="'.$v.'">'.$v.'</option>';
			}
			$combo_bobot.='</select>';
			
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
			
			if(strtolower($keluarga_data[$a]['ket'])=='diabaikan'){ $onclick='onclick="disableCBP(\''.count($keluarga_data).'\',\''.$a.'\',\'chkkeluarga_\',\'chkkeluarga_bobot_\')"';  }else{ $onclick='onclick="changeBobot(\'chkkeluarga_\',\''.$a.'\',\'chkkeluarga_bobot_\',\''.$keluarga_data[$a]['bobot'].'\')"'; }
			
			$combo_bobot='<select id="chkkeluarga_bobot_'.$a.'" name="chkkeluarga_bobot['.$idl.']">';
			for($v=0;$v<=intval($param_val);$v++){
				$combo_bobot.='<option value="'.$v.'">'.$v.'</option>';
			}
			$combo_bobot.='</select>';
			
			$keluarga_list.=('<tr><td><input type="checkbox" id="chkkeluarga_'.$a.'" name="chkkeluarga[]" value="'.$idl.'" '.$onclick.' />'.$keluarga_data[$a]['ket'].'</td><td>&nbsp;</td><td>'.$combo_bobot.'</td></tr>');
			
		}
		
		$keluarga_list.='</table>';
		
		/* END */
		
		/* START LIST CHECKBOX PRIBADI */
		$pribadi_data=objectToArray($this->mspribadi_model->getListData());
		$pribadi_list='<table cellpadding="2" cellspacing="0" border="0"><tr><td></td><td></td><td>Bobot</td></tr>';
		for($a=0;$a<count($pribadi_data);$a++){
			
			$idl=$pribadi_data[$a]['id_pribadi'];
			
			if(strtolower($pribadi_data[$a]['ket'])=='diabaikan'){ $onclick='onclick="disableCBP(\''.count($pribadi_data).'\',\''.$a.'\',\'chkpribadi_\',\'chkpribadi_bobot_\')"';  }else{ $onclick='onclick="changeBobot(\'chkpribadi_\',\''.$a.'\',\'chkpribadi_bobot_\',\''.$pribadi_data[$a]['bobot'].'\')"'; }
			
			$combo_bobot='<select id="chkpribadi_bobot_'.$a.'" name="chkpribadi_bobot['.$idl.']">';
			for($v=0;$v<=intval($param_val);$v++){
				$combo_bobot.='<option value="'.$v.'">'.$v.'</option>';
			}
			$combo_bobot.='</select>';
			
			$pribadi_list.=('<tr><td><input type="checkbox" id="chkpribadi_'.$a.'" name="chkpribadi[]" value="'.$idl.'" '.$onclick.' />'.$pribadi_data[$a]['ket'].'</td><td>&nbsp;</td><td>'.$combo_bobot.'</td></td></tr>');
		}
		$pribadi_list.='</table>';
		/* END */
		
		/* START LIST CHECKBOX LINGKUNGAN */
		$lingkungan_data=objectToArray($this->mslingkungan_model->getListData());
		$lingkungan_list='<table cellpadding="2" cellspacing="0" border="0"><tr><td></td><td></td><td>Bobot</td></tr>';
		for($a=0;$a<count($lingkungan_data);$a++){
			
			$idl=$lingkungan_data[$a]['id_lingkungan'];
			
			if(strtolower($lingkungan_data[$a]['ket'])=='diabaikan'){ $onclick='onclick="disableCBP(\''.count($lingkungan_data).'\',\''.$a.'\',\'chklingkungan_\',\'chklingkungan_bobot_\')"';  }else{ $onclick='onclick="changeBobot(\'chklingkungan_\',\''.$a.'\',\'chklingkungan_bobot_\',\''.$lingkungan_data[$a]['bobot'].'\')"'; }
			
			$combo_bobot='<select id="chklingkungan_bobot_'.$a.'" name="chklingkungan_bobot['.$idl.']">';
			for($v=0;$v<=intval($param_val);$v++){
				$combo_bobot.='<option value="'.$v.'">'.$v.'</option>';
			}
			$combo_bobot.='</select>';
			
			$lingkungan_list.=('<tr><td><input type="checkbox" id="chklingkungan_'.$a.'" name="chklingkungan[]" value="'.$idl.'" '.$onclick.' />'.$lingkungan_data[$a]['ket'].'</td><td>&nbsp;</td><td>'.$combo_bobot.'</td></tr>');
		}
		$lingkungan_list.='</table>';
		
		/* END */
		
		$data = array(
			'page_title'=>'Keluhan',
			'name'=>$this->session->userdata('name'),
			'userlist' => 'null',
			'role' => $this->session->userdata('role'),
			'lingkungan_list' => $this->mslingkungan_model->getListdata(),
			'keluarga_list' => $this->mskeluarga_model->getListData(),
			'pribadi_list' => $this->mspribadi_model->getListData(),
			'menu_active' => 4,
			'psikologi_list'=> $psikologi_list,
			'lingkungan_list' => $lingkungan_list,
			'keluarga_list' => $keluarga_list,
			'pribadi_list' =>$pribadi_list,
			/*'combo_bobot_asal' => $combo_bobot_asal,*/
			'combo_bobot_ekonomi' => $combo_bobot_ekonomi,
			'combo_bobot_semester' => $combo_bobot_semester,
			'combo_bobot_ipk' => $combo_bobot_ipk
		);
		$content = array(
			'left_content' => 'keluhan/halkeluhan',
			'right_content' => 'template/menu_std'
		);
		//$this->template->add_js('alert("test");','embed');
		$this->template->load('template/templates',$content,$data);
	}
	
	function tambahkeluhan(){			
		$i = 0;
		$last_id = "";
		$new_id = 0;
		$arr_data = array();
		$keluhanIsValid = 0;
		
		$arr_data = array(); 
		$arr_data_bobot = array();
		
		//$arr_data[0] = $_POST["txtasal"];		
		$arr_data[0] = $_POST['txtekonomi'];
		$arr_data[1] = $_POST["txtsemester"];
		$arr_data[2] = $_POST["txtipk"];
		
		$nis = $_POST['txtnis'];
		
		//$arr_data_bobot[0] = $_POST["txtasal_bobot"];		
		$arr_data_bobot[0] = $_POST['txtekonomi_bobot'];
		$arr_data_bobot[1] = $_POST["txtsemester_bobot"];
		$arr_data_bobot[2] = $_POST["txtipk_bobot"];
		
		$last_id = $this->keluhan_model->getLastId();
		$new_id = ($last_id[0]["last_id"]);	
		
		if($new_id==''){ $new_id=1; }
		
		while($i < count($arr_data)){
			if(!empty($arr_data[$i]) && (isset($arr_data[$i]))){
				$this->keluhan_model->setIdKeluhan($new_id);
				$this->keluhan_model->setNamaMahasiswa($nis);
				$this->keluhan_model->setIdAtribut($arr_data[$i]);
				$this->keluhan_model->setBobot($arr_data_bobot[$i]);
				$this->keluhan_model->insertNewKeluhan();
			}
			$i++;
		}
		
		// Psikologi
		
		if(isset($_POST['chkpsikologi'])){
			$arr_psikologi = $_POST['chkpsikologi'];
			$j = 0;
			while($j < count($arr_psikologi)){
				if(!empty($arr_psikologi[$j]) && (isset($arr_psikologi[$j]))){
					$this->keluhan_model->setIdKeluhan($new_id);
					$this->keluhan_model->setIdAtribut($arr_psikologi[$j]);
					$this->keluhan_model->setBobot($_POST['chkpsikologi_bobot'][$arr_psikologi[$j]]);
					$this->keluhan_model->insertNewKeluhan();
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
					$this->keluhan_model->setIdKeluhan($new_id);
					$this->keluhan_model->setIdAtribut($arr_pribadi[$j]);
					$this->keluhan_model->setBobot($_POST['chkpribadi_bobot'][$arr_pribadi[$j]]);
					$this->keluhan_model->insertNewKeluhan();
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
					$this->keluhan_model->setIdKeluhan($new_id);
					$this->keluhan_model->setIdAtribut($arr_keluarga[$j]);
					$this->keluhan_model->setBobot($_POST['chkkeluarga_bobot'][$arr_keluarga[$j]]);
					$this->keluhan_model->insertNewKeluhan();
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
					$this->keluhan_model->setIdKeluhan($new_id);
					$this->keluhan_model->setIdAtribut($arr_lingkungan[$j]);
					$this->keluhan_model->setBobot($_POST['chklingkungan_bobot'][$arr_lingkungan[$j]]);
					$this->keluhan_model->insertNewKeluhan();
				}
				$j++;
			}
		}
		
		
		$keluhanIsValid = $this->keluhan_model->getIsKeluhanValid();
		$keluhanval = intval($keluhanIsValid[0]["jmdata"]);
		if($keluhanval > 0){
			$data = array(
				'page_title'=>'Keluhan',
				'name'=>$this->session->userdata('name'),
				'datalist' => $this->keluhan_model->getKeluhanValidNilai(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 4
			);
			$content = array(
				'left_content' => 'keluhan/perhitungan',
				'right_content' => 'template/menu_std'
			);
			$this->template->load('template/templates',$content,$data);
			
			//echo "<script type=\"text/javascript\">alert(\"KELUHAN NO.".$new_id.", NILAI: \");window.location.href = '".site_url('keluhan')."';</script>";
		} else {
			$detail_keluhan=$this->subpending_model->getRekapKeluhan($new_id);
			$detail_pakar=$this->user_model->getPakarDetail();
			
			$pakar_email=array(); $pakar_nama=array();
			
			if(count($detail_pakar)>0){
				$a=0;
				for($x=0;$x<count($detail_pakar);$x++){
					$pakar_nama[$a]=$detail_pakar[$x]['fullname'];
					$pakar_email[$a]=$detail_pakar[$x]['email'];
					$a++;
				}				
			}
			/*$message_email=('<p style="font-family:arial; font-size:12px; color:#333">Yth. Pakar Konseling</p>
							 <p style="font-family:arial; font-size:12px; color:#333">
							 	Laporan : <br>
							 	Kasus Konseling No : '.$new_id.' , (Kasus Belum Selesai)
							 </p>
							 <p style="font-family:arial; font-size:12px; color:#333">Rincian Kasus :</p>');
			
			$message_email.=('<table cellpadding="5" border="1" cellspacing="0" width="500" style="font-family:\'Arial\'; font-size:12px; color:#333; border-collapse:collapse;">');
			$message_email.=('<tr><td colspan="2"><strong>Kondisi Awal</strong></td> </tr>');
			
			$ketpsikologi=$this->subpending_model->getRekapKeluhanPsikologi($new_id);
			
			if(count($ketpsikologi)>0){
				$list_psikologi='<ul>';
				for($x=0;$x<count($ketpsikologi);$x++){
					$list_psikologi.='<li>'.$ketpsikologi[$x]['psikologis'].'</li>';
				}
				$list_psikologi.='</ul>';
			}else{
				$list_psikologi='-';
			}
			
			$message_email.=('<tr><td width="60">Psikologis</td><td>: '.$list_psikologi.'</td></tr>');
			$message_email.=('<tr><td>Semester</td><td>: '.$detail_keluhan["semester"].'</td> </tr>');
			$message_email.=('<tr><td>IPK</td><td>: '.$detail_keluhan["ipk"].'</td></tr>');
			$message_email.=('<tr><td>Asal</td><td>: '.$detail_keluhan["asal"].'</td></tr>');
			$message_email.=('<tr><td colspan="2"><strong>Keluhan</strong></td> </tr>');
			$message_email.=('<tr><td>Ekonomi</td><td>: '.$detail_keluhan["ekonomi"].'</td></tr>');
			$message_email.=('<tr><td colspan="2"><strong>Keluarga</strong></td> </tr>');
			
			$ketkeluarga=$this->subpending_model->getRekapKeluhanKeluarga($new_id);
			
			if(count($ketkeluarga)>0){
				$list_keluarga='<ul>';
				for($x=0;$x<count($ketkeluarga);$x++){
					$list_keluarga.='<li>'.$ketkeluarga[$x]['keluarga'].'</li>';
				}
				$list_keluarga.='</ul>';
			}else{
				$list_keluarga='-';
			}
			
			$message_email.=('<tr><td colspan="2">'.$list_keluarga.'</td></tr>');
			
			$message_email.=('<tr><td colspan="2"><strong>Pribadi</strong></td> </tr>');
			
			$ketpribadi=$this->subpending_model->getRekapKeluhanPribadi($new_id);
			
			if(count($ketpribadi)>0){
				$list_pribadi='<ul>';
				for($x=0;$x<count($ketpribadi);$x++){
					$list_pribadi.='<li>'.$ketpribadi[$x]['pribadi'].'</li>';
				}
				$list_pribadi.='</ul>';
			}else{
				$list_pribadi='-';
			}
			
			
			$message_email.=('<tr><td colspan="2">'.$list_pribadi.'</td></tr>');
			
			$message_email.=('<tr><td colspan="2"><strong>Lingkungan</strong></td> </tr>');
			
			$ketlingkungan=$this->subpending_model->getRekapKeluhanLingkungan($new_id);
			
			if(count($ketlingkungan)>0){
				$list_lingkungan='<ul>';
				for($x=0;$x<count($ketlingkungan);$x++){
					$list_lingkungan.='<li>'.$ketlingkungan[$x]['lingkungan'].'</li>';
				}
				$list_lingkungan.='</ul>';
			}else{
				$list_lingkungan='-';
			}
			
			$message_email.=('<tr><td colspan="2">'.$list_lingkungan.'</td></tr>');
			
			$message_email.=('</table>');
			
			$message_email.=('<p style="font-family:arial; font-size:12px; color:#333">Perlu dilakukan revisi terhadap kasus tersebut. Silahkan klik tautan berikut : <a href="'.site_url('pakarsubpending').'">klik disini</a> Untuk melakukan revise. <br><br>
Terima Kasih. </p>');

			if(count($pakar_email)>0){				
				$this->load->library('email');
				$config['protocol'] = 'smtp';
				$config['charset'] = 'iso-8859-1';
				$config['smtp_host'] = 'mail.birungu.com';
				$config['smtp_user'] = 'mailtest@birungu.com';
				$config['smtp_pass'] = 'tmOR!lDzy3wh';
				$config['smtp_port'] = 25;
				$config['mailtype'] = 'html'; 
				$config['wordwrap'] = TRUE;
				$config['priority'] = 1;
				
				$this->email->initialize($config);
				$success=0;
				
				for ($w=0;$w<count($pakar_email);$w++)
				{
				       $this->email->clear();
				
				       $this->email->from('mailtest@birungu.com', 'SISTEM BERBASIS KASUS KONSELING MAHASISWA', 'mailtest@birungu.com');
				
					   $this->email->to($pakar_email[$w],$pakar_nama[$w]); 
					   $this->email->subject('Laporan Kasus Konseling No : '.$new_id.' (Kasus Belum Selesai)');
					   $this->email->message($message_email);
				
				       if($this->email->send()){ $success++; }
				}
				
				if($success>0){ echo "<script type=\"text/javascript\">alert(\"Maaf Jenis Masalah dan Solusi Tidak Ditemukan,Kasus Anda Sudah Tersimpan,Menunggu Verifikasi Pakar.\");window.location.href = \"".site_url('keluhan')."\";</script>"; }
				
			}*/
		}
		//echo "<script type=\"text/javascript\">alert(\"Maaf Jenis Masalah dan Solusi Tidak Ditemukan,Kasus Anda Sudah Tersimpan,Menunggu Verifikasi Pakar.\");window.location.href = \"".site_url('keluhan')."\";</script>";
		echo "<script type=\"text/javascript\">alert(\"Kasus nomor :".$new_id." tidak terselesaikan.Kasus telah masuk sub pending\");window.location.href = \"".site_url('keluhan')."\";</script>";
		//redirect('keluhan');
	}
	
	function keluhan_edit(){
			$id = $this->uri->segment(3);
			if(isset($_POST['btnSave'])){			
				$i = 0;
				$arr_data = array();
				$arr_data_old = array();
				$arr_data[0] = $_POST["txtpsikologi"];
				$arr_data[1] = $_POST["txtasal"];		
				$arr_data[2] = $_POST["txtekonomi"];
				$arr_data[3] = $_POST["txtsemester"];
				$arr_data[4] = $_POST["txtipk"];
				
				$arr_data_old[0] = $_POST["txtpsikologi_old"];
				$arr_data_old[1] = $_POST["txtasal_old"];		
				$arr_data_old[2] = $_POST["txtekonomi_old"];
				$arr_data_old[3] = $_POST["txtsemester_old"];
				$arr_data_old[4] = $_POST["txtipk_old"];
				
				while($i < count($arr_data)){
					if(!empty($arr_data[$i]) && (isset($arr_data[$i]))){						
						$this->keluhan_model->setIdKeluhan($id);
						$this->keluhan_model->setIdAtribut($arr_data[$i]);
						$this->keluhan_model->setIdMasalah($masalah);
						$this->keluhan_model->setIdSolusi($solusi);

						$this->keluhan_model->setIdAtributOld($arr_data_old[$i]);
						$this->keluhan_model->setIdMasalahOld($masalah_old);
						$this->keluhan_model->setIdSolusiOld($solusi_old);
						
						if(($arr_data[$i] != $arr_data_old[$i]) || ($masalah != $masalah_old) || ($solusi != $solusi_old)){
							$this->keluhan_model->editKasus();
						}
					}
					$i++;
				}				
				
				// Pribadi
				$pribadi_oldval = $_POST['txtpribadi_old'];
				if(isset($_POST['chkpribadi'])){
					$arr_pribadi = $_POST['chkpribadi'];
					$j = 0;
					while($j < count($arr_pribadi)){
						if(!empty($arr_pribadi[$j]) && (isset($arr_pribadi[$j]))){
							$this->keluhan_model->setIdKeluhan($id);
							$this->keluhan_model->setIdAtribut($arr_pribadi[$j]);
							$this->keluhan_model->setIdMasalah($masalah);
							$this->keluhan_model->setIdSolusi($solusi);

							$this->keluhan_model->setIdAtributOld($pribadi_oldval);
							$this->keluhan_model->setIdMasalahOld($masalah_old);
							$this->keluhan_model->setIdSolusiOld($solusi_old);
							
							if(($arr_pribadi[$i] != $pribadi_oldval) || ($masalah != $masalah_old) || ($solusi != $solusi_old)){
								$this->keluhan_model->editKasus();
							}
						}
						$j++;
					}
				}
				// Keluarga
				$keluarga_oldval = $_POST['txtkeluarga_old'];
				if(isset($_POST['chkkeluarga'])){
					$arr_kel = $_POST['chkkeluarga'];
					$k = 0;
					while($k < count($arr_kel)){
						if(!empty($arr_kel[$k]) && (isset($arr_kel[$k]))){
							$this->keluhan_model->setIdKeluhan($id);
							$this->keluhan_model->setIdAtribut($arr_kel[$k]);
							$this->keluhan_model->setIdMasalah($masalah);
							$this->keluhan_model->setIdSolusi($solusi);

							$this->keluhan_model->setIdAtributOld($keluarga_oldval);
							$this->keluhan_model->setIdMasalahOld($masalah_old);
							$this->keluhan_model->setIdSolusiOld($solusi_old);
							
							if(($arr_kel[$i] != $keluarga_oldval) || ($masalah != $masalah_old) || ($solusi != $solusi_old)){
								$this->keluhan_model->editKasus();
							}
						}
						$k++;
					}
				}
				// Lingkungan
				$lingkungan_oldval = $_POST['txtlingkungan_old'];
				if(isset($_POST['chklingkungan'])){
					$arr_lingkungan = $_POST['chklingkungan'];
					$l = 0;
					while($l < count($arr_lingkungan)){
						if(!empty($arr_lingkungan[$l]) && (isset($arr_lingkungan[$l]))){
							$this->keluhan_model->setIdKeluhan($id);
							$this->keluhan_model->setIdAtribut($arr_lingkungan[$l]);
							$this->keluhan_model->setIdMasalah($masalah);
							$this->keluhan_model->setIdSolusi($solusi);

							$this->keluhan_model->setIdAtributOld($lingkungan_oldval);
							$this->keluhan_model->setIdMasalahOld($masalah_old);
							$this->keluhan_model->setIdSolusiOld($solusi_old);
							
							if(($arr_lingkungan[$i] != $lingkungan_oldval) || ($masalah != $masalah_old) || ($solusi != $solusi_old)){
								$this->keluhan_model->editKasus();
							}
						}
						$l++;
					}
				}		
			
			redirect('konsultan/konselingPage');
		}else{			
			$this->keluhan_model->setIdKeluhan($id);		
			$dataprofile = array(
				'page_title' => 'Edit Konsultan',
				'name' => $this->session->userdata('name'),
				'datalist' => $this->keluhan_model->getListdataById(),
				'role' => $this->session->userdata('role'),
				'lingkungan_list' => $this->mslingkungan_model->getListdata(),
				'keluarga_list' => $this->mskeluarga_model->getListData(),
				'pribadi_list' => $this->mspribadi_model->getListData(),
				'menu_active' => 3		
			);
			$content = array(
				'left_content' => 'konsultan/konselingedit',
				'right_content' => 'template/menu_std'			
			);
			$this->template->load('template/templates',$content,$dataprofile);
		}		
	}
}