<?php include('upper_submenu.php') ?><br/>
<?php 
$id = $this->uri->segment(3);
if(!$id){?>
<form method="post" name="frmEdit" action="<?php echo site_url('master/mslingkungan_edit');?>">
<?php }else{?>
{datalist}
<form method="post" name="frmEdit" action="<?php echo site_url('master/mslingkungan_edit/');?>/{id_lingkungan}">
<?php }?>
<h4><u>EDIT DATA MASTER LINGKUNGAN</u></h4>
<input type="submit" name="btnSave" value="<?php echo lang('save'); ?>" class="btn" />
|
<input type="reset" name="btnClear" value="<?php echo lang('clear'); ?>" class="btn" />
|
<input type="button" name="btnClose" value="<?php echo lang('back'); ?>" class="btn" onclick="javascript:history.back(1);" />
<br />
<br />
<?php if(!$id){?>
{datalist}
<?php }?>
<table>
	<tr>
		<td>Id Lingkungan</td>
		<td>:</td>
		<td><input type="text" value="{id_lingkungan}" name="id" disabled="disabled" /></td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td>:</td>
		<td><input type="text" value="{ket}" name="ket"/></td>
	</tr>
	<tr>
		<td>Bobot</td>
		<td>:</td>
		<td><input type="text" value="{bobot}" name="bobot" /></td>
	</tr>
</table>
{/datalist}
</form>