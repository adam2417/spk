<?php
class Pakarsubpending extends CI_Controller
{
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
		$this->load->model('kasus_model');
		$this->load->model('subpending_model');

		$this->lang->load("button","indonesia");
	}

	function index(){
		
		if(isset($_POST['btnfilter']) and $_POST['cbokeluhan']!=''){
			
					$id_keluhan = $_POST['cbokeluhan'];
			
					$this->keluhan_model->setIdKeluhan($id_keluhan);
					
					/* ASAL,EKONOMI,SEMESTER,IPK,MASALAH,SOLUSI */
					
					$asal_list_saved=objectToArray($this->keluhan_model->getKeluhanByAtribut('AS','tb_prm_asalmhs','id_asal'));
					if(count($asal_list_saved)>0){
						$asal=$asal_list_saved[0]['ket'];
						$id_asal=$asal_list_saved[0]['id_atribut'];
						$asal_bobot=$asal_list_saved[0]['bobot'];
					}else{
						$asal='';
						$id_asal='';
						$asal_bobot='';
					}
					
					$ekonomi_list_saved=objectToArray($this->keluhan_model->getKeluhanByAtribut('EK','tb_prm_ekonomi','id_eko'));
					if(count($ekonomi_list_saved)>0){
						$ekonomi=$ekonomi_list_saved[0]['ket'];
						$id_ekonomi=$ekonomi_list_saved[0]['id_atribut'];
						$ekonomi_bobot=$ekonomi_list_saved[0]['bobot'];
					}else{
						$ekonomi='';
						$id_ekonomi='';
						$ekonomi_bobot='';
					}
					
					$semester_list_saved=objectToArray($this->keluhan_model->getKeluhanByAtribut('SE','tb_prm_semester','id_semester'));
					if(count($semester_list_saved)>0){
						$semester=$semester_list_saved[0]['ket'];
						$id_semester=$semester_list_saved[0]['id_atribut'];
						$semester_bobot=$semester_list_saved[0]['bobot'];
					}else{
						$semester='';
						$id_semester='';
						$semester_bobot='';
					}
					
					$ipk_list_saved=objectToArray($this->keluhan_model->getKeluhanByAtribut('IP','tb_prm_nilai','id_ipk'));
					if(count($ipk_list_saved)>0){
						$ipk=$ipk_list_saved[0]['ket'];
						$id_ipk=$ipk_list_saved[0]['id_atribut'];
						$ipk_bobot=$ipk_list_saved[0]['bobot'];
					}else{
						$ipk='';
						$id_ipk='';
						$ipk_bobot='';
					}
					
					/* BOBOT */
		
					$combo_bobot_asal='<select name="txtasal_bobot">'; $selected='';
					for($v=0;$v<=5;$v++){
						if($v==$asal_bobot){ $selected='selected="selected"'; }else{ $selected=''; }
						$combo_bobot_asal.='<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
					}
					$combo_bobot_asal.='</select>';
					
					$combo_bobot_ekonomi='<select name="txtekonomi_bobot">'; $selected='';
					for($v=0;$v<=5;$v++){
						if($v==$ekonomi_bobot){ $selected='selected="selected"'; }else{ $selected=''; }
						$combo_bobot_ekonomi.='<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
					}
					$combo_bobot_ekonomi.='</select>';
					
					$combo_bobot_semester='<select name="txtsemester_bobot">'; $selected='';
					for($v=0;$v<=5;$v++){
						if($v==$semester_bobot){ $selected='selected="selected"'; }else{ $selected=''; }
						$combo_bobot_semester.='<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
					}
					$combo_bobot_semester.='</select>';
					
					$combo_bobot_ipk='<select name="txtipk_bobot">'; $selected='';
					for($v=0;$v<=5;$v++){
						if($v==$ipk_bobot){ $selected='selected="selected"'; }else{ $selected=''; }
						$combo_bobot_ipk.='<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
					}
					$combo_bobot_ipk.='</select>';
					
					/* START LIST CHECKBOX PSIKOLOGI */
					$clist=''; $disabled='';
					
					$psikologi_list_saved=objectToArray($this->keluhan_model->getKeluhanByAtribut('PS','tb_prm_psikologis','id_psikologis'));
					
					
					for($a=0;$a<count($psikologi_list_saved);$a++){
						$attr=$psikologi_list_saved[$a]['id_atribut'];
						$clist[$a]=$attr;
						$cbobot[$attr]=$psikologi_list_saved[$a]['bobot'];
					}
					
					if($clist!=''){ $clist=','.implode(',',$clist); }
					
					$psikologi_data=objectToArray($this->mspsikologi_model->getListdata());
					$psikologi_list='<table cellpadding="2" cellspacing="0" border="0"><tr><td></td><td>Bobot</td></tr>';
					
					for($a=0;$a<count($psikologi_data);$a++){
						if(strtolower($psikologi_data[$a]['ket'])=='diabaikan'){ $onclick='onclick="disableCBP(\''.count($psikologi_data).'\',\''.$a.'\',\'chkpsikologi_\',\'chkpsikologi_bobot_\')"'; } else { $onclick='onclick="changeBobot(\'chkpsikologi_\',\''.$a.'\',\'chkpsikologi_bobot_\',\''.$psikologi_data[$a]['bobot'].'\')"'; }
						
						$idl=$psikologi_data[$a]['id_psikologis'];
						if(isset($cbobot[$idl])){ $bobotl=$cbobot[$idl]; }else{ $bobotl=''; }
						
						if(strpos($clist, $idl)){ 
							$checked='checked="checked"'; 
							if(strtolower($psikologi_data[$a]['ket'])=='diabaikan'){
								$disabled='<script>disableCBP2(\''.count($psikologi_data).'\',\''.$a.'\',\'chkpsikologi_\',\'chkpsikologi_bobot_\');</script>'; 
							} 
						}else{ $checked='';  }
						
						
						$combo_bobot='<select id="chkpsikologi_bobot_'.$a.'" name="chkpsikologi_bobot['.$idl.']">';
						for($v=0;$v<=5;$v++){
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
					
					$keluarga_list_saved=objectToArray($this->keluhan_model->getKeluhanByAtribut('KE','tb_prm_keluarga','id_keluarga'));
					for($a=0;$a<count($keluarga_list_saved);$a++){
						$attr=$keluarga_list_saved[$a]['id_atribut'];
						$clist[$a]=$attr;
						$cbobot[$attr]=$keluarga_list_saved[$a]['bobot'];
					}
					
					if($clist!=''){ $clist=','.implode(',',$clist); }
					
					$keluarga_data=objectToArray($this->mskeluarga_model->getListData());
					$keluarga_list='<table cellpadding="2" cellspacing="0" border="0"><tr><td></td><td></td><td>Bobot</td></tr>';
					for($a=0;$a<count($keluarga_data);$a++){
						
						if(strtolower($keluarga_data[$a]['ket'])=='diabaikan'){ $onclick='onclick="disableCBP(\''.count($keluarga_data).'\',\''.$a.'\',\'chkkeluarga_\',\'chkkeluarga_bobot_\')"';  }else{ $onclick='onclick="changeBobot(\'chkkeluarga_\',\''.$a.'\',\'chkkeluarga_bobot_\',\''.$keluarga_data[$a]['bobot'].'\')"'; }
						
						$idl=$keluarga_data[$a]['id_keluarga'];
						if(isset($cbobot[$idl])){ $bobotl=$cbobot[$idl]; }else{ $bobotl=''; }
						
						if(strpos($clist, $idl)){ 
							$checked='checked="checked"'; 
							if(strtolower($keluarga_data[$a]['ket'])=='diabaikan'){ 
								$disabled='<script>disableCBP2(\''.count($keluarga_data).'\',\''.$a.'\',\'chkkeluarga_\',\'chkkeluarga_bobot_\');</script>'; 
							} 
						}else{ $checked='';  }
						
						$combo_bobot='<select id="chkkeluarga_bobot_'.$a.'" name="chkkeluarga_bobot['.$idl.']">';
						for($v=0;$v<=5;$v++){
							if($bobotl==$v){ $selected='selected="selected"'; }else{ $selected=''; }
							$combo_bobot.='<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
						}
						$combo_bobot.='</select>';
						
						$keluarga_list.=('<tr><td><input type="checkbox" id="chkkeluarga_'.$a.'" name="chkkeluarga[]" value="'.$idl.'" '.$onclick.' '.$checked.' />'.$keluarga_data[$a]['ket'].'</td><td>&nbsp;</td><td>'.$combo_bobot.'</td></tr>');
						
					}
					
					$keluarga_list.='</table>'.$disabled;
					
					/* END */
					
					/* START LIST CHECKBOX PRIBADI */
					
					$clist='';
					
					$pribadi_list_saved=objectToArray($this->keluhan_model->getKeluhanByAtribut('PR','tb_prm_pribadi','id_pribadi'));
					for($a=0;$a<count($pribadi_list_saved);$a++){
						$attr=$pribadi_list_saved[$a]['id_atribut'];
						$clist[$a]=$attr;
						$cbobot[$attr]=$pribadi_list_saved[$a]['bobot'];
					}
					
					if($clist!=''){ $clist=','.implode(',',$clist); }
					
					$pribadi_data=objectToArray($this->mspribadi_model->getListData());
					$pribadi_list='<table cellpadding="2" cellspacing="0" border="0"><tr><td></td><td></td><td>Bobot</td></tr>';
					for($a=0;$a<count($pribadi_data);$a++){
						
						if(strtolower($pribadi_data[$a]['ket'])=='diabaikan'){ $onclick='onclick="disableCBP(\''.count($pribadi_data).'\',\''.$a.'\',\'chkpribadi_\',\'chkpribadi_bobot_\')"';  }else{ $onclick='onclick="changeBobot(\'chkpribadi_\',\''.$a.'\',\'chkpribadi_bobot_\',\''.$pribadi_data[$a]['bobot'].'\')"'; }
						
						$idl=$pribadi_data[$a]['id_pribadi'];
						if(isset($cbobot[$idl])){ $bobotl=$cbobot[$idl]; }else{ $bobotl=''; }
						
						if(strpos($clist, $idl)){ 
							$checked='checked="checked"'; 
							if(strtolower($pribadi_data[$a]['ket'])=='diabaikan'){ 
								$disabled='<script>disableCBP2(\''.count($pribadi_data).'\',\''.$a.'\',\'chkpribadi_\',\'chkpribadi_bobot_\');</script>'; 
							} 
						}else{ $checked='';  }
						
						$combo_bobot='<select id="chkpribadi_bobot_'.$a.'" name="chkpribadi_bobot['.$idl.']">';
						for($v=0;$v<=5;$v++){
							if($bobotl==$v){ $selected='selected="selected"'; }else{ $selected=''; }
							$combo_bobot.='<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
						}
						$combo_bobot.='</select>';
						
						$pribadi_list.=('<tr><td><input type="checkbox" id="chkpribadi_'.$a.'" name="chkpribadi[]" value="'.$idl.'" '.$onclick.' '.$checked.' />'.$pribadi_data[$a]['ket'].'</td><td>&nbsp;</td><td>'.$combo_bobot.'</td></tr>');
						
					}
					
					$pribadi_list.='</table>'.$disabled;
					
					/* END */
					
					/* START LIST CHECKBOX LINGKUNGAN */
					
					$clist='';
					
					$lingkungan_list_saved=objectToArray($this->keluhan_model->getKeluhanByAtribut('LI','tb_prm_lingkungan','id_lingkungan'));
					for($a=0;$a<count($lingkungan_list_saved);$a++){
						$attr=$lingkungan_list_saved[$a]['id_atribut'];
						$clist[$a]=$attr;
						$cbobot[$attr]=$lingkungan_list_saved[$a]['bobot'];
					}
					
					if($clist!=''){ $clist=','.implode(',',$clist); }
					
					$lingkungan_data=objectToArray($this->mslingkungan_model->getListData());
					$lingkungan_list='<table cellpadding="2" cellspacing="0" border="0"><tr><td></td><td></td><td>Bobot</td></tr>';
					for($a=0;$a<count($lingkungan_data);$a++){
						
						if(strtolower($lingkungan_data[$a]['ket'])=='diabaikan'){ $onclick='onclick="disableCBP(\''.count($lingkungan_data).'\',\''.$a.'\',\'chklingkungan_\',\'chklingkungan_bobot_\')"';  }else{ $onclick='onclick="changeBobot(\'chklingkungan_\',\''.$a.'\',\'chklingkungan_bobot_\',\''.$lingkungan_data[$a]['bobot'].'\')"'; }
						
						$idl=$lingkungan_data[$a]['id_lingkungan'];
						if(isset($cbobot[$idl])){ $bobotl=$cbobot[$idl]; }else{ $bobotl=''; }
						
						if(strpos($clist, $idl)){ 
							$checked='checked="checked"'; 
							if(strtolower($lingkungan_data[$a]['ket'])=='diabaikan'){ 
								$disabled='<script>disableCBP2(\''.count($lingkungan_data).'\',\''.$a.'\',\'chklingkungan_\',\'chklingkungan_bobot_\');</script>'; 
							} 
						}else{ $checked='';  }
						
						$combo_bobot='<select id="chklingkungan_bobot_'.$a.'" name="chklingkungan_bobot['.$idl.']">';
						for($v=0;$v<=5;$v++){
							if($bobotl==$v){ $selected='selected="selected"'; }else{ $selected=''; }
							$combo_bobot.='<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
						}
						$combo_bobot.='</select>';
						
						$lingkungan_list.=('<tr><td><input type="checkbox" id="chklingkungan_'.$a.'" name="chklingkungan[]" value="'.$idl.'" '.$onclick.' '.$checked.' />'.$lingkungan_data[$a]['ket'].'</td><td>&nbsp;</td><td>'.$combo_bobot.'</td></tr>');
						
					}
					
					$lingkungan_list.='</table>'.$disabled;
					
					/* END */
					
					$keluhan_pending=objectToArray($this->subpending_model->getListPendingKeluhan());
								
					$data = array(
						'page_title'=>'Pakar Sub-Pending',
						'name'=>$this->session->userdata('name'),
						'psikologis_list'=>$psikologi_list,
						'keluhan_list' =>$keluhan_pending,
						'lingkungan_list' =>$lingkungan_list,
						'keluarga_list' => $keluarga_list,
						'pribadi_list' =>$pribadi_list,
						'role' => $this->session->userdata('role'),
						'menu_active' => 7,
						'jumlah_kasus' => count($keluhan_pending),
						'tampil_id_keluhan' => $id_keluhan,
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
						'ipk_bobot'=>$ipk_bobot,
						'id_ipk'=>$id_ipk,
						'id_masalah'=>'',
						'masalah_desc'=>'',
						'solusi'=>'',
						'id_solusi'=>'',
						'combo_bobot_asal' => $combo_bobot_asal,
						'combo_bobot_ekonomi' => $combo_bobot_ekonomi,
						'combo_bobot_semester' => $combo_bobot_semester,
						'combo_bobot_ipk' => $combo_bobot_ipk	
					);
			
		}else{
			
			if(isset($_POST['btnSave'])){
					$id_keluhan=$_POST['cbokeluhan'];
						
					$masalah = $_POST["txtmasalah"];
					$solusi = $_POST["txtsolusi"];
						
					if($masalah!='' and $solusi!=''){						
							$i = 0;
							$last_id = 0;
							$new_id = 0;
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
							
							
							$this->keluhan_model->setIdKeluhan($id_keluhan);
							$this->keluhan_model->setActive0();
						
						
						
						
					}else{
					
						/* CLEAR OLD DATA */
                        
						$this->keluhan_model->setIdKeluhan($id_keluhan);
						$this->keluhan_model->deleteKeluhan();
						
						
						$i = 0;
						$arr_data = array(); $arr_data_bobot = array();
						
						$arr_data[0] = $_POST["txtasal"];		
						$arr_data[1] = $_POST['txtekonomi'];
						$arr_data[2] = $_POST["txtsemester"];
						$arr_data[3] = $_POST["txtipk"];
						
						$arr_data_bobot[0] = $_POST["txtasal_bobot"];		
						$arr_data_bobot[1] = $_POST['txtekonomi_bobot'];
						$arr_data_bobot[2] = $_POST["txtsemester_bobot"];
						$arr_data_bobot[3] = $_POST["txtipk_bobot"];
						
						$new_id=$id_keluhan;
						
						while($i < count($arr_data)){
							if(!empty($arr_data[$i]) && (isset($arr_data[$i]))){
								$this->keluhan_model->setIdKeluhan($new_id);
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
					}	
			}
			
			
			
        $combo_bobot_asal='<select name="txtasal_bobot">';
		for($v=0;$v<=5;$v++){
			$combo_bobot_asal.='<option value="'.$v.'">'.$v.'</option>';
		}
		$combo_bobot_asal.='</select>';
		
		$combo_bobot_ekonomi='<select name="txtekonomi_bobot">';
		for($v=0;$v<=5;$v++){
			$combo_bobot_ekonomi.='<option value="'.$v.'">'.$v.'</option>';
		}
		$combo_bobot_ekonomi.='</select>';
		
		$combo_bobot_semester='<select name="txtsemester_bobot">';
		for($v=0;$v<=5;$v++){
			$combo_bobot_semester.='<option value="'.$v.'">'.$v.'</option>';
		}
		$combo_bobot_semester.='</select>';
		
		$combo_bobot_ipk='<select name="txtipk_bobot">';
		for($v=0;$v<=5;$v++){
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
            for($v=0;$v<=5;$v++){
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
for($v=0;$v<=5;$v++){
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
for($v=0;$v<=5;$v++){
$combo_bobot.='<option value="'.$v.'">'.$v.'</option>';
}

$combo_bobot.='</select>';

            $pribadi_list.=('<tr><td><input type="checkbox" id="chkpribadi_'.$a.'" name="chkpribadi[]" value="'.$idl.'" '.$onclick.' />'.$pribadi_data[$a]['ket'].'</td><td>&nbsp;</td><td>'.$combo_bobot.'</td></tr>');
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
for($v=0;$v<=5;$v++){
$combo_bobot.='<option value="'.$v.'">'.$v.'</option>';
}
$combo_bobot.='</select>';

            $lingkungan_list.=('<tr><td><input type="checkbox" id="chklingkungan_'.$a.'" name="chklingkungan[]" value="'.$idl.'" '.$onclick.' />'.$lingkungan_data[$a]['ket'].'</td><td>&nbsp;</td><td>'.$combo_bobot.'</td></tr>');
        }
        $lingkungan_list.='</table>';

        /* END */

        $keluhan_pending=objectToArray($this->subpending_model->getListPendingKeluhan());

        $data = array(
            'page_title'=>'Pakar Sub-Pending',
            'name'=>$this->session->userdata('name'),
            'psikologis_list'=>$psikologi_list,
            'keluhan_list' => $keluhan_pending,
            'lingkungan_list' =>$lingkungan_list,
            'keluarga_list' => $keluarga_list,
            'pribadi_list' =>$pribadi_list,
            'role' => $this->session->userdata('role'),
            'menu_active' => 7,
            'jumlah_kasus' => count($keluhan_pending),
            'tampil_id_keluhan' => '',
            'asal'=>'',
            'id_asal'=>'',
            'asal_bobot'=>'',
            'ekonomi'=>'',
            'id_ekonomi'=>'',
            'ekonomi_bobot'=>'',
            'semester'=>'',
            'semester_bobot'=>'',
            'ipk'=>'',
            'ipk_bobot'=>'',
            'id_masalah'=>'',
            'masalah_desc'=>'',
            'solusi'=>'',
            'id_solusi'=>'',
            'combo_bobot_asal' => $combo_bobot_asal,
            'combo_bobot_ekonomi' => $combo_bobot_ekonomi,
            'combo_bobot_semester' => $combo_bobot_semester,
            'combo_bobot_ipk' => $combo_bobot_ipk	
        );
			
		}

		$content = array(
			'left_content' => 'pakarsubpending/subpending_list',
			'right_content' => 'template/menu_std'
			);
			$this->template->load('template/templates',$content,$data);
	}
}