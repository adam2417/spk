<h4>
	<u>DAFTAR KASUS</u>
</h4>
<?php if(isset($this->session->userdata['userid'])){ ?>
<a href="<?php echo site_url('konsultan/addformkonseling');?>">Tambah</a>
<?php }?>
<div class="konseling">
	<div style="width:100%;border:0px solid red;">
		
		<table style="border-collapse: collapse;" border="1" cellpadding="5">
			<tr class="header">
				<td width="60">Kasus #</td>
				<td width="60">Masalah</td>
				<!--<td>Solusi #</td>-->
				<td>Solusi</td>
				<!--<td>Asal #</td>
				<td>Asal</td>
				<td>Ekonomi #</td>
				<td>Ekonomi</td>
				<td>IPK #</td>
				<td>IPK</td>
				<td>Keluarga #</td>
				<td>Keluarga</td>
				<td>Lingkungan #</td>
				<td>Lingkungan</td>
				<td>Pribadi #</td>
				<td>Pribadi</td>
				<td>Psikologis #</td>
				<td>Psikologis</td>
				<td>Semester #</td>
				<td>Semester</td>-->
				<?php if($role == '2'){ ?><td width="25"></td><?php } ?>
			</tr>
			<?php
			if(count($kasus_list) > 0){
				?>
			{kasus_list}
			<tr class="perrow">
				<td align="center">{id_kasus}</td>
				<td>{desc_masalah}</td>
				<!--<td>{id_solusi}</td>-->
				<td>{solusi}</td>
				<!--<td>{idasal}</td>
				<td>{asal}</td>
				<td>{idekonomi}</td>
				<td>{ekonomi}</td>
				<td>{idipk}</td>
				<td>{ipk}</td>
				<td>{idkeluarga}</td>
				<td>{keluarga}</td>
				<td>{idlingkungan}</td>
				<td width="5%">{lingkungan}</td>
				<td>{idpribadi}</td>
				<td>{pribadi}</td>
				<td>{idpsikologis}</td>
				<td>{psikologis}</td>
				<td>{idsemester}</td>
				<td>{semester}</td>-->
				<td>
					<!--<a href="<?php echo site_url('master/userProfileById');?>/{id_kasus}">Lihat Detail</a>&nbsp;|&nbsp;-->
				<?php if($role == '2'){ ?> <a
					href="<?php echo site_url('konsultan/konsultan_edit');?>/{id_kasus}">Ubah</a>
					&nbsp;|&nbsp;
			<a href="<?php echo site_url('konsultan/konsultan_delete');?>/{id_kasus}">Hapus</a>
					<?php } ?>
				</td>
			</tr>
			{/kasus_list}
			<?php
			} else{
				echo "<tr>";
				echo "<td colspan='3' style='text-align:center;color:red;'>No Data To Display</td>";
				echo "</tr>";
			}
			?>
		</table>		
	</div>	
</div>
<?php echo $this->pagination->create_links(); ?>
