<?php include('upper_submenu.php') ?><br/>
<form method="post" name="frmEdit" action="<?php echo site_url('master/mslingkungan_create');?>" onsubmit="javascript:return validate(this);">
<h4><u>TAMBAH MASTER LINGKUNGAN</u></h4>
<input type="submit" name="btnSave" value="<?php echo lang('save'); ?>" class="btn" />
|
<input type="reset" name="btnClear" value="<?php echo lang('clear'); ?>" class="btn" />
|
<input type="button" name="btnClose" value="<?php echo lang('back'); ?>" class="btn" onclick="javascript:history.back(1);" />
<br />
<br />
<table>
	<tr>
		<td>Id Lingkungan</td>
		<td>:</td>
		<td><input type="text" name="id" readonly="readonly" value="<?php echo $new_ID; ?>" style="color: #796D5E !important" /></td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td>:</td>
		<td><input type="text" name="ket" /></td>
	</tr>
	<tr>
		<td>Bobot</td>
		<td>:</td>
		<td><input type="text" name="bobot" /></td>
	</tr>
</table>
</form>