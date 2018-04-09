<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>styles/login/style.css" />	
	<title>Sistem Informasi Gereja</title>
	<script type="text/javascript">
		function getValue(){
  			var x=document.getElementById("txtUsername");
  			x.value = "";  			
  		}
  		function setValue(){
  	  		var x = document.getElementById("txtUsername");
  	  		if((x.value == null) || (x.value == ""))
  	  			x.value = "Username";
  	  		else 
				x.value = x.value;
  		}
  		function getValuePaswd(){
  			var x=document.getElementById("txtPassword");
  			x.value = "";  			
  		}
  		function setValuePaswd(){
  	  		var x = document.getElementById("txtPassword");
  	  		if((x.value == null) || (x.value == ""))
  	  			x.value = "Password";
  	  		else 
				x.value = x.value;
  		}
	</script>
</head>
<body>
	<div id="page" align="center">
		<div id="header">
			<div id="companyname" align="left"></div>
			<div class="home"><a href="<?php echo site_url('home');?>"><img src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>images/Home.png" height="30" title="Click to home"/></a></div>
			<div align="right" class="links_menu" id="menu">
			<marquee>Selamat datang di aplikasi Sistem Informasi Gereja. Gereja Kristen Sumba Waingapu</marquee>
			</div>			
		</div>
		<br />
		<div id="content">
			<div id="leftpanel">
				<div class="table_top">
					<div align="center"><span class="title_panel">Login</span> </div>
				</div>
				<div class="table_content">
					<div class="table_text">
					<br />
					Please Login Below:
					<br />
					<br />
					<form name="loginform" action="<?php echo site_url('login/loginProcess');?>" method="post">
					<table>						
						<tr>
							<td><input id="txtUsername" name="username" value="Username" onclick="getValue();" onmouseout="setValue();" style="color:gray;"/></td>
						</tr>						
						<tr>
							<td><input id="txtPassword" name="password" value="Password" type="password" onclick="getValuePaswd();" onmouseout="setValuePaswd();" style="color:gray;" /></td>
						</tr>
						<tr>
							<td>
								<input type="submit" id="btnLogin" name="login" value="Login" /> 
								<input type="reset" id="btnClear" name="clear" value="Clear" />
							</td>
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
					</div>
				</div>
				<div class="table_bottom">
					<img src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>images/login/table_bottom.jpg" width="204" height="23" border="0" alt="" />
				</div>
				<br />
			</div>
			<div id="contenttext">
				<span class="title_blue">Sistem Informasi</span><br />
				<span class="subtitle_gray">Gereja Kristen Waingapu</span><br />
				<br />
				<p class="body_text" align="justify">Aplikasi ini digunakan untuk memberikan informasi seputar
				Gereja Kristen Sumba Waingapu. Informasi disajikan terhadap pengguna berdasarkan aturan-aturan yang telah
				ditetapkan sebelumnya.
				<br /><br />
				Lakukan login dengan memasukkan username dan password yang digunakan untuk dapat menggunakan aplikasi ini
				sesuai dengan aturan-aturan yang telah ditetapkan.</div>
			<br />
			<br />			
			<div class="footer">			
				Copyright@2012 By Admin.<br/>All Right Reserved. This application created only by special purpose.
			</div>
		</div>
	</div>
</body>
</html>