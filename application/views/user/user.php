<h3><u>DAFTAR USER</u></h3>
<?php if(isset($this->session->userdata['userid'])){ ?>
<a href="<?php echo site_url('user/tambahUser');?>">Tambah User</a>
<?php }?>
<br/><br/>
<table>
	<tr class="header">		
		<td>Nama</td>
		<td>Role</td>
		<td>Email</td>
        <td>Last Login</td>
		<td></td>
	</tr>
        <?php 
        if(count($userlist) > 0){
        ?>
	{userlist}
	<tr>
		<td>{uname}</td>		
		<td>{desc}</td>
        <td>{email}</td>
        <td>{last_login}</td>
		<td>
			<a href="<?php echo site_url('user/userProfileById');?>/{id}">Lihat Detail</a>
			<?php if($role == '1'){ ?>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('user/editProfile');?>/{id}">Ubah</a>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('user/deleteUser');?>/{id}">Hapus</a>
			<?php } ?>
		</td>
	</tr>
	{/userlist}
        <?php 
        } else{
            echo "<tr>";
            echo "<td colspan='4' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
        ?>
</table>