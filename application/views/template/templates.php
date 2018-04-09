<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css"
	href="<?php echo $this->load->config->item('base_url').$this->load->config->item('inc_folder')?>styles/style.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo $this->load->config->item('base_url').$this->load->config->item('inc_folder')?>styles/styles_vmenu.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->load->config->item('base_url').$this->load->config->item('inc_folder')?>styles/tabs/default.css">
<link rel="stylesheet" type="text/css" href="<?php echo $this->load->config->item('base_url').$this->load->config->item('inc_folder')?>styles/tabs/demo.css">
<script src="<?php echo $this->load->config->item('base_url').$this->load->config->item('inc_folder')?>scripts/tabs/simple-tabs-pure-js.js"></script>
<script>
window.onload = function() {
    var demoTabs = new SimpleTabs(document.getElementById('demo-tabs'));
};
</script>
<title>{page_title}</title>

</head>
<body>
	<div id="wrap">
		<div id="backtohome" name="backtohome">
			<a href="<?php echo site_url('home');?>"><img src="<?php echo $this->load->config->item('base_url').$this->load->config->item('inc_folder') ?>images/back_home.png" width="25px" height="25px"/></a>
		</div>
		<div id="header">
			<br />
			<h1>&nbsp;</h1>
			<h2 style="text-align: right;">&nbsp;</h2>
		</div>
		<!--<div id="nav">
		<?php include('menu.php');?>
		</div>-->
		<div id="content">
			<table border="0" width="100%">
				<tr valign="top">
					<td style="width: 75%; border-right: 5px solid #cccccc;"><?php echo $left_content;?>
					</td>
					<td
						style="background-color: #bdc3c3; margin-top: 15px; margin-bottom: 15px;"><center>
						<?php echo $right_content?></center></td>
				</tr>
			</table>
		</div>
	</div>
	<div style="text-align: center;" id="footer">© 2015 Designed by Administrator.</div>
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
	<script type="text/javascript">
		function openOtherWindow(url){
			window.open(url, '_blank', 'status=no,toolbar=no,menubar=yes,scrollbars=yes,height=550px,width=640px');
		}
	</script>
</body>
</html>
