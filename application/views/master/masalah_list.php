<?php include('upper_submenu.php') ?><br/>
<h4><u>DAFTAR MASTER MASALAH</u></h4>
<?php if(isset($this->session->userdata['userid'])){ ?>
<a href="<?php echo site_url('master/masalah_create');?>">Tambah</a>
<?php }?>
<br/><br/>
<div style="border:0px solid black;">
<table style="border-collapse: collapse;">
	<tr class="header">		
		<td>Id Masalah</td>
		<td>Keterangan</td>
        <!-- <td>Bobot</td> -->
		<td></td>
	</tr>
        <?php 
        if(count($datalist) > 0){
        ?>
	{datalist}
	<tr class="perrow">
		<td>{id_masalah}</td>		
		<td>{ket}</td>
        <!-- <td>{bobot}</td> -->
		<td>
			<!--<a href="<?php echo site_url('master/userProfileById');?>/{id}">Lihat Detail</a>&nbsp;|&nbsp;-->
			<?php if($role == '1'){ ?>			
			<a href="<?php echo site_url('master/masalah_edit');?>/{id_masalah}">Ubah</a>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('master/masalah_delete');?>/{id_masalah}">Hapus</a>
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
</div>