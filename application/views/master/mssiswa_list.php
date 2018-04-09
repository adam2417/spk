<?php include('upper_submenu.php') ?><br/>
<h4><u>DAFTAR MASTER SISWA</u></h4>
<?php if(isset($this->session->userdata['userid'])){ ?>
<a href="<?php echo site_url('master/mssiswa_create');?>">Tambah</a>
<?php }?>
<br/><br/>
<table style="border-collapse: collapse;">
	<tr class="header">		
		<td>NIS</td>
		<td>Nama</td>
        <td>Tempat dan Tanggal Lahir</td>
        <td>Alamat</td>
        <td>Tanggal Masuk</td>
        <td style="display: none;">Bobot</td>
		<td></td>
	</tr>
        <?php 
        if(count($datalist) > 0){
        ?>
	{datalist}
	<tr class="perrow">
		<td>{nis}</td>		
		<td>{nama}</td>
        <td>{tempat_lahir}, {tgl_lahir}</td>
        <td>{alamat}</td>
        <td>{tanggalmasuk}</td>
        <td style="display: none;">{bobot}</td>
		<td>
			<!--<a href="<?php echo site_url('master/userProfileById');?>/{id}">Lihat Detail</a>&nbsp;|&nbsp;-->
			<?php if($role == '1'){ ?>			
			<a href="<?php echo site_url('master/mssiswa_edit');?>/{nis}">Ubah</a>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('master/mssiswa_delete');?>/{nis}">Hapus</a>
			<?php } ?>
		</td>
	</tr>
	{/datalist}
        <?php 
        } else{
            echo "<tr>";
            echo "<td colspan='3' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
        ?>
</table>