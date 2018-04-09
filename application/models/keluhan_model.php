<?php
class keluhan_model extends CI_Model {
	private $id_keluhan;
	private $nama_mhs;
	private $id_atribut;
	private $bobot = 0;
	
	function setIdKeluhan($idkeluhan) {
		$this->id_keluhan = $idkeluhan;
	}
	
	function setNamaMahasiswa($nmmhs) {
		$this->nama_mhs = $nmmhs;
	}
	
	function setIdAtribut($idatribut) {
		$this->id_atribut = $idatribut;
	}
	
	function getIdKeluhan(){
		return $this->id_keluhan;
	}
	
	function getNamaMahasiswa(){
		return $this->nama_mhs;
	}
	
	function getIdAtribut(){
		return $this->id_atribut;
	}
	
	function setBobot($bobot) {
		$this->bobot = $bobot;
	}
	
	function getBobot(){
		return $this->bobot;
	}
	
	function getLastId(){
		$this->db->select('(max(cast(id_keluhan as signed))+1) last_id')->from(TABEL_KELUHAN)->/*where(array('active'=>'1'))->*/order_by('id_keluhan');		
		$query = $this->db->get();		
		return $query->result_array();		
	}
	
	function insertNewKeluhan(){
		$last_id = $this->getLastId();
		$data = array(
			'id_keluhan' => $this->getIdKeluhan(),
			'nis' => $this->getNamaMahasiswa(),
			'id_atribut' => $this->getIdAtribut(),
			'bobot' => $this->getBobot(),
			'active' => '1'
		);
		$this->db->insert(TABEL_KELUHAN,$data);		
	}
	
	function editKasus(){
		$data = array(
			'id_atribut' => $this->getIdAtribut()
		);		
		$this->db->where(array('id_keluhan'=>$this->getIdKeluhan(),'id_atribut'=>$this->getIdAtributOld()));
		$this->db->update(TABEL_KELUHAN,$data);			
	}
	
	function getIsKeluhanValid(){
		$this->db->select('nilai')->from(TABEL_TRESHOLD);
		$q = $this->db->get();
		$treshold = $q->result_array();
		$t_val = $treshold[0]['nilai'];
		
		$this->db->select('count(*) jmdata')->from(TABEL_REKAP_CBR.' cbr')->
		where(array('cbr.nilai >'=>$t_val,'id_keluhan'=>$this->getIdKeluhan()));
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getKeluhanValidNilai(){
		$this->db->select('nilai')->from(TABEL_TRESHOLD);
		$q = $this->db->get();
		$treshold = $q->result_array();
		$t_val = $treshold[0]['nilai'];
		
		$this->db->select('cbr.id_kasus,kasus.id_masalah,masalah.ket masalah,kasus.id_solusi,solusi.ket solusi,cbr.nilai')->from(TABEL_REKAP_CBR.' cbr')->
		join('(SELECT id_kasus,id_masalah,id_solusi,count(*) FROM '.TABEL_KASUS.' group by id_kasus,id_masalah,id_solusi) kasus','cbr.id_kasus=kasus.id_kasus','left')->
		join(TABEL_MASALAH . ' masalah','kasus.id_masalah=masalah.id_masalah','left')->
		join(TABEL_SOLUSI . ' solusi','kasus.id_solusi=solusi.id_solusi','left')->
		where(array('cbr.nilai >'=>$t_val,'id_keluhan'=>$this->getIdKeluhan()))->
		order_by('cbr.nilai','desc');		
		$query = $this->db->get();
		return $query->result_array();		
	}
	
	function getKeluhanById(){
		$this->db->select('*')->from(TABEL_REKAP_CBR.' cbr')->where(array('cbr.nilai >'=>('(select nilai from '.TABEL_TRESHOLD.')'),'id_keluhan'=>$this->getIdKeluhan()));
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getKeluhanByAtribut($prefix,$tablejoin,$fieldjoin){
		$query=$this->db->query("SELECT A.id_atribut,A.bobot,B.ket FROM ".TABEL_KELUHAN." A INNER JOIN ".$tablejoin." B WHERE A.id_atribut = B.".$fieldjoin." AND  A.id_keluhan='".$this->getIdKeluhan()."' and A.id_atribut LIKE '".$prefix."%' and A.active=1 ");
		return $query->result();
	}
	
	function getBobotByID($id_atribut){
		$query=$this->db->query("SELECT bobot FROM ".TABEL_KELUHAN." WHERE id_keluhan='".$this->getIdKeluhan()."' and id_atribut = '".$id_atribut."' ");
		return $query->result();
	}
	
	function getListdataById(){
		$this->db->select('*')->from('vw_rekap_keluhan')->where(array('id_keluhan'=>$this->getIdKeluhan()));
		$query = $this->db->get();
		return $query->result();
	}
	
	function deleteKeluhan(){
		$this->db->delete(TABEL_KELUHAN,array('id_keluhan'=>$this->getIdKeluhan()));
	}
	
	function setActive0(){
		$this->db->query("UPDATE ".TABEL_KELUHAN." SET active='0' WHERE id_keluhan='".$this->getIdKeluhan()."'");
	}
	
	
}