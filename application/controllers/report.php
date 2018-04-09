<?php
class Report extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('laporan_model');
		$this->lang->load("button","indonesia");
	}

	function index(){
	}

	function reportselesai(){
		if(isset($_POST['btnfilter'])){
			$keluhandari = $_POST['cbokeluhandari'];
			$keluhansampai = $_POST['cbokeluhansampai'];
			$data = array(
				'page_title'=>'Report Kasus Selesai',
				'name'=>$this->session->userdata('name'),
				'kasus_list' => $this->laporan_model->getReportByKeluhan($keluhandari,$keluhansampai),
				'keluhan_list' => $this->laporan_model->getMaxNilaiKasus(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 5
			);
		}else{
			$data = array(
				'page_title'=>'Report Kasus Selesai',
				'name'=>$this->session->userdata('name'),
				'kasus_list' => $this->laporan_model->getReportSelesai(),
				'keluhan_list' => $this->laporan_model->getMaxNilaiKasus(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 5
			);
		}
		$content = array(
			'left_content' => 'laporan/lap_kasus_selesai',
			'right_content' => 'template/menu_std'
			);
			//$this->template->add_js('alert("test");','embed');
			$this->template->load('template/templates',$content,$data);
	}

	function reporttdkselesai(){
		if(isset($_POST['btnfilter'])){
			$keluhandari = $_POST['cbokeluhandari'];
			$keluhansampai = $_POST['cbokeluhansampai'];
			$data = array(
				'page_title'=>'Report Kasus Tidak Selesai',
				'name'=>$this->session->userdata('name'),
				'kasus_list' => $this->laporan_model->getReportByKeluhan($keluhandari,$keluhansampai),
				'keluhan_list' => $this->laporan_model->getNilaiKasus(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 5
			);
		}else{
			$data = array(
				'page_title'=>'Report Kasus Tidak Selesai',
				'name'=>$this->session->userdata('name'),
				'kasus_list' => $this->laporan_model->getReportTidakSelesai(),				
				'keluhan_list' => $this->laporan_model->getNilaiKasus(),
				'role' => $this->session->userdata('role'),
				'menu_active' => 6
			);
		}
		$content = array(
			'left_content' => 'laporan/lap_kasus_tdk_selesai',
			'right_content' => 'template/menu_std'
			);
			//$this->template->add_js('alert("test");','embed');
			$this->template->load('template/templates',$content,$data);
	}
}