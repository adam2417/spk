<?php
class laporan_model extends CI_Model {
	private $idkasus;
	private $idkeluhan;
	private $jmlgejalacocok;
	private $jmlkondbasiskasus;
	private $jmlgejaladipilih;
	private $pembagi;
	private $nilai;

	function setIdKasus($idkasus){
		$this->idkasus = $idkasus;
	}

	function setIdKeluhan($idkeluhan){
		$this->idkeluhan = $idkeluhan;
	}

	function setJmlGejalaCocok($jmgejalacocok){
		$this->jmlgejalacocok = $jmgejalacocok;
	}

	function setJmlKondisiBasisKasus($kondbasiskasus){
		$this->jmlkondbasiskasus = $kondbasiskasus;
	}

	function setJmlGejalaDipilih($jmlgejaladipilih){
		$this->jmlgejaladipilih = $jmlgejaladipilih;
	}

	function setPembagi($pembagi){
		$this->pembagi = $pembagi;
	}

	function setNilai($nilai){
		$this->nilai = $nilai;
	}

	function getIdKasus(){
		return $this->idkasus;
	}

	function getIdKeluhan(){
		return $this->idkeluhan;
	}

	function getJmlGejalaCocok(){
		return $this->jmlgejalacocok;
	}

	function getJmlKondisiBasisKasus(){
		return $this->jmlkondbasiskasus;
	}

	function getJmlGejalaDipilih(){
		return $this->jmlgejaladipilih;
	}

	function getPembagi(){
		return $this->pembagi;
	}

	function getNilai(){
		return $this->nilai;
	}
	
	function getReportSelesai(){
		$this->db->select('nilai')->from('tb_treshold');
		$q = $this->db->get();
		$treshold = $q->result_array();
		$t_val = $treshold[0]['nilai'];
		
		$this->db->select('cbr.*')->from('vw_rekap_cbr cbr')->
		join('vw_max_nilai_kasus kasus','cbr.id_keluhan=kasus.id_keluhan')->
		where(array('kasus.nilai >='=>$t_val));
		$query = $this->db->get();
		return $query->result();
	}
	
	function getMaxNilaiKasus(){
		$this->db->select('nilai')->from('tb_treshold');
		$q = $this->db->get();
		$treshold = $q->result_array();
		$t_val = $treshold[0]['nilai'];
		
		$this->db->select('id_keluhan')->from('vw_max_nilai_kasus')->where(array('nilai >='=>$t_val));
		$query = $this->db->get();
		return $query->result();
	}
	
	function getNilaiKasus(){
		$this->db->select('nilai')->from('tb_treshold');
		$q = $this->db->get();
		$treshold = $q->result_array();
		$t_val = $treshold[0]['nilai'];
		
		$this->db->select('id_keluhan')->from('vw_max_nilai_kasus')->where(array('nilai <'=>$t_val));
		$query = $this->db->get();
		return $query->result();
	}
	
	function getReportByKeluhan($idkeluhandari,$idkeluhansampai){
		$this->db->select('cbr.*')->from('vw_rekap_cbr cbr')->
		where(array('cbr.id_keluhan >='=>$idkeluhandari,'cbr.id_keluhan <='=>$idkeluhansampai));
		$query = $this->db->get();
		return $query->result();
	}
	
	function getReportTidakSelesai(){
		$this->db->select('nilai')->from('tb_treshold');
		$q = $this->db->get();
		$treshold = $q->result_array();
		$t_val = $treshold[0]['nilai'];
		
		$this->db->select('cbr.*')->from('vw_rekap_cbr cbr')->join('vw_max_nilai_kasus kasus','cbr.id_keluhan=kasus.id_keluhan')->
		where(array('kasus.nilai <'=>$t_val));
		$query = $this->db->get();
		return $query->result();
	}
}