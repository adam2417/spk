<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{page_title}</title>
<link rel="stylesheet" type="text/css"
	href="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>styles/church/style.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>styles/content.css" />
<script type="text/javascript"
	src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/highchart/jquery.min.js"></script>
<script type="text/javascript"
	src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/galleria/galleria-1.2.7.min.js"></script>
<!--<script type="text/javascript" src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/jquery.js"></script>-->
<script type="text/javascript"
	src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/highchart/highcharts.js"></script>
<script type="text/javascript">
<!--//
function validate(form){
    var message = 'Isilah Field-Field Di Bawah Ini:\n\n\t';
    var msg = '';
    for(var i=0; i<form.elements.length; i++){
        if(form.elements[i].value.length == 0){
            var field = form.elements[i].name.toUpperCase();            
            message+= field +'\n\t'; 
        }
    } 
    message+= '\n\nTekan OK untuk melakukan submit form atau CANCEL untuk kembali ke form';    
    message = confirm(message);
    if(!message){ return false; }
    else{ return true; }
}
//-->
</script>
</head>

<body>
<table width="100%" height="100%" border="0" cellpadding="0"
	cellspacing="0">
	<tr>
		<td valign="top" class="bord">&nbsp;</td>
		<td width="760" height="100%" valign="top">
		<table width="760" height="100%" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td height="1">
				<div style="position: absolute; top: 179px; margin-left: 30px; width: 350px;">
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="c_name"></td>
					</tr>
				</table>
				</div>
				<div class="name_guard">Welcome, <?php if(isset($this->session->userdata['userid'])){ ?><a href="<?php echo site_url('user/userProfile');?>"><?php } ?>{name}</a> |	
				<?php if($this->session->userdata['name'] == 'Guest'){?>
					<a href="<?php echo site_url('login');?>">Login</a>
				<?php } else{?>
					<a href="<?php echo site_url('user/logout');?>">Logout</a>
				<?php }?>
			    </div>
				<img src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>images/church/p1.jpg"
					alt="" width="760" height="227"></td>			
			</tr>
			<tr>
				<td>
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
				</td>
			</tr>
			<tr>
				<td height="1">
				
				</td>
			</tr>
			<tr>
				<td height="1"><img
					src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>images/church/cont-sep.gif"
					alt="" width="760" height="1"></td>
			</tr>
			<tr>
				<td class="body_txt">                                        
					<?php echo $content;?>
				</td>
			</tr>
			<tr>
				<td height="1"><img src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>images/church/bbg1.gif" width="760" height="3"></td>
			</tr>
			<tr>
				<td height="1" background="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>images/church/bbg0.gif" class="bgy">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td height="1" class="bottom-menu">
						<a href="<?php echo site_url('profilegereja');?>">Profil</a> | 
						<a href="<?php echo site_url('visimisi');?>">Visi Dan Misi</a> | 
						<a href="<?php echo site_url('strukturorg');?>">Struktur Organisasi</a> | 
						<a href="<?php echo site_url('sejarah');?>">Sejarah</a>
					</tr>
					<tr>
						<td height="1" class="bottom_addr">&copy; 2012 Gereja Kristen Sumba Waingapu
						<br>Designed by Admin
						</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td height="1"><img src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>images/church/bbg2.gif" width="760" height="3"></td>
			</tr>
			<tr>
				<td height="1"><img src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>images/church/spacer.gif" alt="" width="1"
					height="7"></td>
			</tr>
		</table>
		</td>
		<td valign="top" class="bord">&nbsp;</td>
	</tr>
</table>
</body>
</html>
