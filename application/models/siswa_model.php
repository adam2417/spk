<?php
class siswa_model extends CI_Model {
    private $nis;
    private $tempat_lahir;
    private $tanggal_lahir;
    private $nama;
    private $alamat;
    private $tanggal_masuk;
    private $active = 1;
    
    function setNIS($nnis) {
        $this->nis = $nnis;
    }
    
    function getNIS() {
        return $this->nis;
    }
    
    function setTempatLahir($tlahir) {
        $this->tempat_lahir = $tlahir;
    }
    
    function getTempatLahir() {
        return $this->tempat_lahir;
    }
    
    function setTanggalLahir($tgl_lahir) {
        $this->tanggal_lahir = $tgl_lahir;
    }
    
    function getTanggalLahir() {
        return $this->tanggal_lahir;
    }
    
    function setNama($nnama) {
        $this->nama = $nnama;
    }
    
    function getNama() {
        return $this->nama;
    }
    
    function setAlamat($almt) {
        $this->alamat = $almt;
    }
    
    function getAlamat() {
        return $this->alamat;
    }
    
    function setTanggalMasuk($tglmasuk) {
        $this->tanggal_masuk = $tglmasuk;
    }
    
    function getTanggalMasuk() {
        return $this->tanggal_masuk;
    }
    
    function setActive($act) {
        $this->active = $act;
    }
    
    function getActive() {
        return $this->active;
    }
    
    // Call the module constructor
	function __construct(){
		parent::__construct();
	}
    
    function insertNewSiswa(){
		$data = array(
			'nis' => $this->getNIS(),
			'tempat_lahir' => $this->getTempatLahir(),
			'tgl_lahir' => $this->getTanggalLahir(),
			'nama' => $this->getNama(),
			'alamat' => $this->getAlamat(),
			'tanggalmasuk' => $this->getTanggalMasuk(),
            'active' => $this->getActive()
		);
		$this->db->insert(TABEL_SISWA,$data);
	}
    
    function getListdata(){
		$this->db->select('nis,tempat_lahir,tgl_lahir,nama,alamat,tanggalmasuk')->from(TABEL_SISWA)->where(array('active'=>'1'));
		$query = $this->db->get();
		return $query->result();
	}
	
	function getListdataSegmented($offset){
		$this->db->select('nis,tempat_lahir,tgl_lahir,nama,alamat,tanggalmasuk')->from(TABEL_SISWA)->where(array('active'=>'1'));
		$this->db->limit($this->config->item('page_num'),$offset);
		$query = $this->db->get();
		return $query->result();
	}
    
    function getListdataOneSelect(){
		$this->db->select('nis,tempat_lahir,tgl_lahir,nama,alamat,tanggalmasuk')->from(TABEL_SISWA)->where(array('nis'=>$this->getNIS(),'active'=>'1'));
		$query = $this->db->get();
		return $query->result();
	}
    
    function modifyDataSiswa(){
		$data = array(
			'tempat_lahir' => $this->getTempatLahir(),
			'tgl_lahir' => $this->getTanggalLahir(),
			'nama' => $this->getNama(),
			'alamat' => $this->getAlamat(),
			'tanggalmasuk' => $this->getTanggalMasuk()
		);
		$this->db->where('nis',$this->getNIS());
		$this->db->update(TABEL_SISWA,$data);
	}
	
	function deleteDataSiswa(){
		$data = array(
			'active' => '0'
		);
		$this->db->where('nis',$this->getNIS());
		$this->db->update(TABEL_SISWA,$data);
	}
}