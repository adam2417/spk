<?php 
$id = $this->uri->segment(3);
if(!$id){?>
<form method="post" name="frmParent" action="<?php echo site_url('user/editProfile');?>">
<?php }else{?>
{userloop}
<form method="post" name="frmParent" action="<?php echo site_url('user/editProfile/');?>/{id}">
<?php }?>
<h3><u>EDIT DATA PROFILE</u></h3>
<input type="submit" name="btnSave" value="Save" class="btn" />
|
<input type="reset" name="btnClear" value="Clear" class="btn" />
|
<input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
<br />
<br />
<?php if(!$id){?>
{userloop}
<?php }?>
<table>
	<tr>
		<td>Username</td>
		<td>:</td>
		<td><input type="text" value="{uname}" name="username" /></td>
	</tr>
	<tr>
		<td>Password</td>
		<td>:</td>
		<td><input type="password" value="" name="password" size="25"/></td>
	</tr>
	<tr>
		<td>Full Name</td>
		<td>:</td>
		<td><input type="text" value="{name}" name="fname" /></td>
	</tr>
	<tr>
		<td>Role</td>
		<td>:</td>
		<td>
		<input type="text" name="role" id="role" maxlength="5" value="{role_id}" ondblclick="openOtherWindow('<?php echo site_url('role/plist_role');?>');" class="txtplist" />
		<label id="lblName">{roles}</label>
		<!-- <select name="role">
			{datacombo}
			<option value="{id}">{desc}</option>
			{/datacombo} -->
		</select>
		</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><input type="text" value="{email}" name="email" /></td>
	</tr>
	<tr>
		<td>Last Login</td>
		<td>:</td>
		<td>{last_login}</td>
	</tr>
</table>
{/userloop}
</form>