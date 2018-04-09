<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{page_title}</title>
<link rel="stylesheet" type="text/css" href="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>styles/app/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>styles/content.css" />
<script type="text/javascript" src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/highchart/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/galleria/galleria-1.2.7.min.js"></script>
<!--<script type="text/javascript" src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/jquery.js"></script>-->
<script type="text/javascript" src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/highchart/highcharts.js"></script>
</head>
<body>
<div id="container">
<div id="header">
	<div class="logo"><h1>SISTEM INFORMASI GEREJA KRISTEN SUMBA WAINGAPU</h1></div>
	<!--<div class="image_little"></div>-->
	<div class="name_guard">Welcome, <?php if(isset($this->session->userdata['userid'])){ ?><a href="<?php echo site_url('user/userProfile');?>"><?php } ?>{name}</a> |	
	<?php if($this->session->userdata['name'] == 'Guest'){?>
		<a href="<?php echo site_url('login');?>">Login</a>
	<?php } else{?>
		<a href="<?php echo site_url('user/logout');?>">Logout</a>
	<?php }?>
    </div>
</div>
<div id="menu">
<ul id="menu">
	<li><a href="<?php echo site_url('home');?>">Home</a>
		<ul>
			<li><a href="<?php echo site_url('profilegereja');?>">Profil GKS Waingapu</a></li>
			<li><a href="<?php echo site_url('visimisi');?>">Visi dan Misi</a></li>
			<li><a href="<?php echo site_url('strukturorg');?>">Struktur Organisasi</a></li>
			<li><a href="<?php echo site_url('sejarah');?>">Sejarah GKS Waingapu</a></li>
			<li><a href="<?php echo site_url('individu');?>">Info Individu Jema'at</a></li>
                        <?php if(isset($this->session->userdata['userid'])){?>
                        <?php if($this->session->userdata['userid'] == '1'){?>	
			<li><a href="<?php echo site_url('keluarga');?>">Info Keluarga</a></li>
                        <?php }} ?>
			<li><a href="<?php echo site_url('pendeta');?>">Info Pendeta</a></li>
			<li><a href="<?php echo site_url('majelis');?>">Info Majelis</a></li>
                        <?php if(isset($this->session->userdata['userid'])){?>
                        <?php if($this->session->userdata['userid'] == '1'){?>
			<li><a href="<?php echo site_url('wilayah');?>">Info Wilayah</a></li>
                        <?php }} ?>
		</ul>
	</li>
	<li><a href="<?php echo site_url('renungan')?>">Renungan Minggu</a></li>
	<li><a href="">Pengumuman</a>
    	<ul>
        	<li><a href="<?php echo site_url('kegiatan');?>">Kegiatan Gereja</a></li>
            <li><a href="<?php echo site_url('pa');?>">Ibadah Pendalaman Alkitab</a></li>
            <li><a href="<?php echo site_url('atestasi');?>">Surat Atestasi</a></li>
            <li><a href="<?php echo site_url('sidibaptis');?>">Surat Baptis/Sidi</a></li>
        </ul>
    </li>
	<li><a href="<?php echo site_url('gallery');?>">Gallery</a></li>
	<li><a href="<?php echo site_url('artikel');?>">Artikel</a></li>
	<li><a href="<?php echo site_url('bukutamu');?>">Buku Tamu</a></li>
	<li><a href="">Laporan</a>
		<ul>
			<li><a href="<?php echo site_url('lap_keu');?>">Laporan Keuangan</a></li>
			<li><a href="<?php echo site_url('laporan/getDataLaporanUsia');?>">Laporan Data Usia</a></li>
			<li><a href="<?php echo site_url('laporan/getDataLaporanIndividu');?>">Laporan Data Jema'at</a></li>
			<li><a href="<?php echo site_url('laporan/getDataLaporanKeluarga');?>">Laporan Data Keluarga</a></li>
		</ul>
	</li>
	<?php if(isset($this->session->userdata['userid'])){?>
	<?php if($this->session->userdata['userid'] == '1'){?>	
	<li><a href="<?php echo site_url('user');?>">Management Login User</a></li>
	<?php }}?>	
</ul>
</div>
<div id="main">
<?php echo $content;?>
</div>
<div id="footer">Copyright&copy;2012 Gereja Kristen Sumba Waingapu &nbsp;<span class="separator">|</span>&nbsp;
Design by Admin</div>
</div>
</body>
</html>