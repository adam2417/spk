<?php include('upper_submenu.php') ?><br/>
<form method="post" name="frmEdit" action="<?php echo site_url('master/treshold_edit');?>">
<h4><u>EDIT DATA MASTER TRESHOLD</u></h4>
<input type="submit" name="btnSave" value="<?php echo lang('save'); ?>" class="btn" />
|
<input type="reset" name="btnClear" value="<?php echo lang('clear'); ?>" class="btn" />
|
<input type="button" name="btnClose" value="<?php echo lang('back'); ?>" class="btn" onclick="javascript:history.back(1);" />
<br />
<br />
{datalist}
<table>
	<tr>
		<td>Nilai</td>
		<td>:</td>
		<td><input type="text" value="{nilai}" name="nilai" /></td>
	</tr>
</table>
{/datalist}
</form>