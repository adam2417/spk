<?php include('upper_submenu.php') ?><br/>
<h4><u>DAFTAR MASTER EKONOMI</u></h4>
<?php if(isset($this->session->userdata['userid'])){ ?>
<a href="<?php echo site_url('master/msekonomi_create');?>">Tambah</a>
<?php }?>
<br/><br/>
<table style="border-collapse: collapse;">
	<tr class="header">		
		<td>Id Ekonomi</td>
		<td>Keterangan</td>
        <td >Bobot</td>
		<td></td>
	</tr>
        <?php 
        if(count($datalist) > 0){
        ?>
	{datalist}
	<tr class="perrow">
		<td>{id_eko}</td>		
		<td>{ket}</td>
        <td>{bobot}</td> <!--style="display: none;"-->
		<td>
			<!--<a href="<?php echo site_url('master/userProfileById');?>/{id}">Lihat Detail</a>&nbsp;|&nbsp;-->
			<?php if($role == '1'){ ?>			
			<a href="<?php echo site_url('master/msekonomi_edit');?>/{id_eko}">Ubah</a>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('master/msekonomi_delete');?>/{id_eko}">Hapus</a>
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