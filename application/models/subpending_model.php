<?php
class subpending_model extends CI_Model
{
	private $asal;
	private $ekonomi;
	private $ipk;
	private $keluarga;
	private $lingkungan;
	private $pribadi;
	private $psikologis;
	private $semester;
	private $idasal;
	private $idekonomi;
	private $idipk;
	private $idkeluarga;
	private $idlingkungan;
	private $idpribadi;
	private $idpsikologis;
	private $idsemester;

	function setAsal($asal){
		$this->asal = $asal;
	}

	function getAsal(){
		return $this->asal;
	}

	function setEkonomi($eko){
		$this->ekonomi = $eko;
	}

	function getEkonomi(){
		return $this->ekonomi;
	}

	function setIPK($ipk){
		$this->ipk = $ipk;
	}

	function getIPK(){
		return $this->ipk;
	}

	function setKeluarga($kel){
		$this->keluarga = $kel;
	}

	function getKeluarga(){
		return $this->keluarga;
	}

	function setLingkungan($lingk){
		$this->lingkungan = $lingk;
	}

	function getLingkungan(){
		return $this->lingkungan;
	}

	function setPribadi($pribadi){
		$this->pribadi = $pribadi;
	}

	function getPribadi(){
		return $this->pribadi;
	}

	function setPsikologis($psi){
		$this->psikologis = $psi;
	}

	function getPsikologis(){
		return $this->psikologis;
	}

	function setSemester($smt){
		$this->semester = $smt;
	}

	function getSemester(){
		return $this->semester;
	}

	function setIdAsal($idasal){
		$this->idasal = $idasal;
	}

	function getIdAsal(){
		return $this->idasal;
	}

	function setIdEkonomi($ideko){
		$this->idekonomi = $ideko;
	}

	function getIdEkonomi(){
		return $this->idekonomi;
	}

	function setIdIPK($idipk){
		$this->idipk = $idipk;
	}

	function getIdIPK(){
		return $this->idipk;
	}

	function setIdKeluarga($idkel){
		$this->idkeluarga = $idkel;
	}

	function getIdKeluarga(){
		return $this->idkeluarga;
	}

	function setIdLingkungan($idlingk){
		$this->idlingkungan = $idlingk;
	}

	function getIdLingkungan(){
		return $this->idlingkungan;
	}

	function setIdPribadi($idpribadi){
		$this->idpribadi = $idpribadi;
	}

	function getIdPribadi(){
		return $this->idpribadi;
	}

	function setIdPsikologis($idpsi){
		$this->idpsikologis = $idpsi;
	}

	function getIdPsikologis(){
		return $this->idpsikologis;
	}

	function setIdSemester($idsmt){
		$this->idsemester = $idsmt;
	}

	function getIdSemester(){
		return $this->idsemester;
	}

	function getKeluhan(){
		$this->db->select('nilai')->from('tb_treshold');
		$q = $this->db->get();
		$treshold = $q->result_array();
		$t_val = $treshold[0]['nilai'];
		
		$this->db->select('id_keluhan')->from('vw_max_nilai_kasus')->
		where(array('nilai < '=>$t_val))->
		order_by('cast(id_keluhan as unsigned) desc'); 
		$query = $this->db->get();
		return $query->result();
	}
	function getRekapKeluhan($keluhanId){
		$arr_data = array();
		$this->db->select('*')->from('vw_rekap_keluhan')->where(array('id_keluhan'=>$keluhanId));
		$query = $this->db->get();
		$data = $query->result_array();
		foreach($data as $col){
			if(isset($col["IDAsal"]) && !empty($col["IDAsal"])){
				$arr_data['id_asal'] = $col["IDAsal"];
				$arr_data['asal'] = $col["Asal"];
			}else if(isset($col["IDEkonomi"]) && !empty($col["IDEkonomi"])){
				$arr_data['id_ekonomi'] = $col["IDEkonomi"];
				$arr_data['ekonomi'] = $col["Ekonomi"];
			}else if(isset($col["IDIPK"]) && !empty($col["IDIPK"])){
				$arr_data['id_ipk'] = $col["IDIPK"];
				$arr_data['ipk'] = $col["IPK"];
			}else if(isset($col["IDKeluarga"]) && !empty($col["IDKeluarga"])){
				$arr_data['id_keluarga'] = $col["IDKeluarga"];
				$arr_data['keluarga'] = $col["Keluarga"];
			}else if(isset($col["IDLingkungan"]) && !empty($col["IDLingkungan"])){
				$arr_data['id_lingkungan'] = $col["IDLingkungan"];
				$arr_data['lingkungan'] = $col["Lingkungan"];
			}else if(isset($col["IDPribadi"]) && !empty($col["IDPribadi"])){
				$arr_data['id_pribadi'] = $col["IDPribadi"];
				$arr_data['pribadi'] = $col["Pribadi"];
			}else if(isset($col["IDPsikologis"]) && !empty($col["IDPsikologis"])){
				$arr_data['id_psikologis'] = $col["IDPsikologis"];
				$arr_data['psikologis'] = $col["Psikologis"];
			}else if(isset($col["IDSemester"]) && !empty($col["IDSemester"])){
				$arr_data['id_semester'] = $col["IDSemester"];
				$arr_data['semester'] = $col["Semester"];
			}
		}
		//var_dump($arr_data);exit;
		return $arr_data;
	}
	
	function getRekapKeluhanPsikologi($keluhanId){
		$arr_data = array();
		$query = $this->db->query("SELECT psikologis FROM vw_rekap_keluhan WHERE id_keluhan='".$keluhanId."' and psikologis!=''");
		$data = $query->result_array();
		return $data;
	}
	
	function getRekapKeluhanPribadi($keluhanId){
		$arr_data = array();
		$query = $this->db->query("SELECT pribadi FROM vw_rekap_keluhan WHERE id_keluhan='".$keluhanId."' and pribadi!=''");
		$data = $query->result_array();
		return $data;
	}
	
	function getRekapKeluhanLingkungan($keluhanId){
		$arr_data = array();
		$query = $this->db->query("SELECT lingkungan FROM vw_rekap_keluhan WHERE id_keluhan='".$keluhanId."' and lingkungan!=''");
		$data = $query->result_array();
		return $data;
	}
	
	function getRekapKeluhanKeluarga($keluhanId){
		$arr_data = array();
		$query = $this->db->query("SELECT keluarga FROM vw_rekap_keluhan WHERE id_keluhan='".$keluhanId."' and keluarga!=''");
		$data = $query->result_array();
		return $data;
	}
	
	function getRekapPsikologiID($keluhanId){
		$arr_data = array();
		$query = $this->db->query("SELECT idpsikologis FROM vw_rekap_keluhan WHERE id_keluhan='".$keluhanId."' and idpsikologis!=''");
		$data = $query->result_array();
		return $data;
	}
	
	function getListPendingKeluhan(){
		$this->db->select('nilai')->from('tb_treshold');
		$q = $this->db->get();
		$treshold = $q->result_array();
		$t_val = $treshold[0]['nilai'];
		$query=$this->db->query("SELECT distinct(A.id_keluhan) FROM vw_max_nilai_kasus A INNER JOIN tb_keluhan B where B.active='1' and A.nilai < ".$t_val." ORDER BY A.id_keluhan DESC");	
		return $query->result();
	}
}