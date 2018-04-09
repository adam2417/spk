<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|===========================================================================
| THis part to define a table structure, it's using for simplicity when
| renaming a table name
|===========================================================================
|
*/

define('TABEL_KASUS', 'tb_kasus');
define('TABEL_KELUHAN','tb_keluhan');
define('TABEL_LEVEL','tb_level');
define('TABEL_MASALAH','tb_masalah');
define('TABEL_NUMBERING','tb_msnumbering');
define('TABEL_PENGGUNA','tb_pengguna');
define('TABEL_PARAM_ASAL','tb_prm_asalmhs');
define('TABEL_PARAM_EKONOMI','tb_prm_ekonomi');
define('TABEL_PARAM_KELUARGA','tb_prm_keluarga');
define('TABEL_PARAM_KONDISI_AWAL','tb_prm_kondisiawal');
define('TABEL_PARAM_LINGKUNGAN','tb_prm_lingkungan');
define('TABEL_PARAM_NILAI','tb_prm_nilai');
define('TABEL_PARAM_PRIBADI','tb_prm_pribadi');
define('TABEL_PARAM_PSIKOLOGIS','tb_prm_psikologis');
define('TABEL_PARAM_SEMESTER','tb_prm_semester');
define('TABEL_ROLE','tb_role');
define('TABEL_SOLUSI','tb_solusi');
define('TABEL_TRESHOLD','tb_treshold');
define('TABEL_USER','tb_user');
define('TABEL_SISWA','tb_siswa');
define('TABEL_SYS_PARAM','tb_sysparam');

define('TABEL_DETAIL_KASUS','vw_detail_kasus');
define('TABEL_DETAIL_KASUS_ONE_COLUMN','vw_detail_kasus_onecolumn');
define('TABEL_JUMLAH_GEJALA_COCOK','vw_jml_gejala_cocok');
define('TABEL_JUMLAH_GEJALA_DIPILIH','vw_jml_gejala_dipilih');
define('TABEL_JUMLAH_GEJALA_KASUS','vw_jml_gejala_kasus');
define('TABEL_KONDISI_BASIS_KASUS','vw_knds_basis_kasus');
define('TABEL_MAX_NILAI_KASUS','vw_max_nilai_kasus');
define('TABEL_REKAP_CBR','vw_rekap_cbr');
define('TABEL_REKAP_HASIL_SOLUSI','vw_rekap_hasil_solusi');
define('TABEL_REKAP_KASUS','vw_rekap_kasus');
define('TABEL_REKAP_KASUS_SOLUSI','vw_rekap_kasus_solusi');
define('TABEL_REKAP_KELUHAN','vw_rekap_keluhan');

/* End of file constants.php */
/* Location: ./application/config/constants.php */