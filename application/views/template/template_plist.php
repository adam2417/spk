<html>
<head>
<title>{title}</title>
<link rel="stylesheet" type="text/css"
	href="<?php echo $this->load->config->item('base_url').$this->load->config->item('inc_folder')?>styles/style.css" />
</head>
<body>
	<div id="wrap">
		<div id="content">
		<?php echo $plist_content;?>
		</div>
	</div>
</body>
</html>
