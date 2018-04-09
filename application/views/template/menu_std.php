<?php if(!isset($this->session->userdata['role'])){?>
<div>
	<div align="center"><span class="login_title">Login</span> </div>
</div>
<?php }?>
<?php if(isset($this->session->userdata['userid'])){ ?>
<table>
	<tr>
		<td>Selamat datang, <?php echo $this->session->userdata['name']; ?>&nbsp;<a href="<?php echo site_url('user/logout');?>">Logout</a></td>		
	</tr>
</table>
<?php } else { ?>
<form name="loginform" action="<?php echo site_url('login/loginProcess');?>" method="post">
	<table>
		<tr>
			<td><input id="txtUsername" name="username" value="Username"
				onclick="getValue();" onmouseout="setValue();" style="color: gray;" />
			</td>
		</tr>
		<tr>
			<td><input id="txtPassword" name="password" value="Password"
				type="password" onclick="getValuePaswd();"
				onmouseout="setValuePaswd();" style="color: gray;" />
			</td>
		</tr>
		<tr>
			<td><input type="submit" id="btnLogin" name="login" value="<?php echo lang('login'); ?>" />
				<input type="reset" id="btnClear" name="clear" value="<?php echo lang('clear'); ?>" /></td>
		</tr>
	</table>
</form>
<div style="color: red;">
<?php echo validation_errors();?>
<?php if(isset($message)){
	echo $message;
}
?>
</div>
<br/>
<?php }?>
<?php include('menu_right.php');?>