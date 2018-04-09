<?php include('upper_submenu.php') ?><br/>
<form method="post" name="frmEdit" action="<?php echo site_url('master/mssiswa_create');?>" onsubmit="javascript:return validate(this);">
<h4><u>TAMBAH MASTER SISWA</u></h4>
<input type="submit" name="btnSave" value="<?php echo lang('save'); ?>" class="btn" />
|
<input type="reset" name="btnClear" value="<?php echo lang('clear'); ?>" class="btn" />
|
<input type="button" name="btnClose" value="<?php echo lang('back'); ?>" class="btn" onclick="javascript:history.back(1);" />
<br />
<br />
<table>
	<tr>
		<td>NIS</td>
		<td>:</td>
		<td><input type="text" name="nis" style="color: #796D5E !important" /></td>
	</tr>
    <tr>
		<td>Nama</td>
		<td>:</td>
		<td><input type="text" name="nama" style="color: #796D5E !important" /></td>
	</tr>
    <tr>
		<td>Tempat Lahir</td>
		<td>:</td>
		<td><input type="text" name="tempat_lahir" style="color: #796D5E !important" /></td>
        <td>&nbsp;</td>
        <td>Tanggal Lahir</td>
		<td>:</td>
		<td><input type="text" name="tgl_lahir" /></td>
	</tr>
	<tr>
		<td valign="top">Alamat</td>
		<td valign="top">:</td>
        <td colspan="2"><textarea name="alamat" cols="30" rows="6"></textarea></td>
	</tr>
    <tr>
		<td>Tanggal Masuk</td>
		<td>:</td>
		<td colspan="2"><input type="text" name="tgl_masuk" style="color: #796D5E !important" /></td>
	</tr>
</table>
</form>