<?php
class kasus_model extends CI_Model {
	private $id_kasus;
	private $id_atribut;
	private $id_masalah;
	private $id_solusi;
	private $bobot;

	private $id_atribut_old;
	private $id_masalah_old;
	private $id_solusi_old;

	function setIdKasus($idkasus) {
		$this->id_kasus = $idkasus;
	}

	function setIdAtribut($idatribut) {
		$this->id_atribut = $idatribut;
	}

	function setIdMasalah($idmslh) {
		$this->id_masalah = $idmslh;
	}

	function setIdSolusi($idsolusi) {
		$this->id_solusi = $idsolusi;
	}

	function setIdAtributOld($idatribut) {
		$this->id_atribut_old = $idatribut;
	}

	function setIdMasalahOld($idmslh) {
		$this->id_masalah_old = $idmslh;
	}

	function setIdSolusiOld($idsolusi) {
		$this->id_solusi_old = $idsolusi;
	}
	
	function setBobot($bobot) {
		$this->bobot = $bobot;
	}
	
	function getBobot(){
		return $this->bobot;
	}

	function getIdKasus(){
		return $this->id_kasus;
	}

	function getIdAtribut(){
		return $this->id_atribut;
	}

	function getIdMasalah(){
		return $this->id_masalah;
	}

	function getIdSolusi(){
		return $this->id_solusi;
	}

	function getIdAtributOld(){
		return $this->id_atribut_old;
	}

	function getIdMasalahOld(){
		return $this->id_masalah_old;
	}

	function getIdSolusiOld(){
		return $this->id_solusi_old;
	}

	function getLastId(){
		$this->db->select('max(cast(id_kasus as unsigned)) last_id')->from(TABEL_KASUS)->where(array('active'=>'1'));
		$query = $this->db->get();
		return $query->result_array();
	}

	function insertNewKasus(){
		$last_id = $this->getLastId();
		$data = array(
			'id_kasus' => $this->getIdKasus(),
			'id_atribut' => $this->getIdAtribut(),
			'id_masalah' => $this->getIdMasalah(),
			'id_solusi' => $this->getIdSolusi(),
			'active' => '1',
			'bobot' => $this->getBobot()
			);
			$this->db->insert(TABEL_KASUS,$data);
	}

	function editKasus(){
		$data = array(
			'id_atribut' => $this->getIdAtribut(),
			'id_masalah' => $this->getIdMasalah(),
			'id_solusi' => $this->getIdSolusi()
		);
		$this->db->where(array('id_kasus'=>$this->getIdKasus(),'id_atribut'=>$this->getIdAtributOld()));
		$this->db->update(TABEL_KASUS,$data);
	}

	function getListdata(){
		$this->db->select('*')->from('vw_rekap_kasus');
		$query = $this->db->get();
		return $query->result();
	}

	function getListdata_segmented($offset){
		
		$query=$this->db->query("SELECT A.*, B.ket as desc_masalah FROM ".TABEL_REKAP_KASUS." A INNER JOIN tb_masalah B WHERE A.id_masalah = B.id_masalah  ORDER BY A.id_kasus DESC LIMIT ".$offset.",".$this->config->item('page_num'));
		#$this->db->select('*')->from('vw_rekap_kasus')->order_by('id_kasus desc');
		#$this->db->limit($this->config->item('page_num'),$offset);
		#$query = $this->db->get();
		return $query->result();
	}

	function getListdataById(){
		$this->db->select('*')->from(TABEL_REKAP_KASUS)->where(array('id_kasus'=>$this->getIdKasus()));
		$query = $this->db->get();
		return $query->result();
	}

	function getJumlahKasus(){
		$this->db->select('nilai')->from('tb_treshold');
		$q = $this->db->get();
		$treshold = $q->result_array();
		$t_val = $treshold[0]['nilai'];
		$query=$this->db->query("SELECT count(id_keluhan) as jumlahkasus FROM ".TABEL_MAX_NILAI_KASUS." where nilai < ".$t_val);	
		return $query->result();
	}
	
	
	
	function deleteKasus(){
		$this->db->delete(TABEL_KASUS,array('id_kasus'=>$this->getIdKasus()));
	}
	
	function getKasusByAtribut($prefix){
		$query=$this->db->query("SELECT id_atribut,bobot FROM ".TABEL_KASUS." WHERE id_kasus='".$this->getIdKasus()."' and id_atribut LIKE '".$prefix."%' ");
		return $query->result();
	}
	
	function getBobotByID($id_atribut){
		$query=$this->db->query("SELECT bobot FROM ".TABEL_KASUS." WHERE id_kasus='".$this->getIdKasus()."' and id_atribut = '".$id_atribut."' ");
		return $query->result();
	}
}