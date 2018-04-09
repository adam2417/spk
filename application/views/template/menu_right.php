<div id='cssmenu'>
<ul>
	<?php if($role == '1') {?>
	<li <?php if($menu_active == 1) echo 'class="active"';?>><a href="<?php echo site_url('user');?>"><span>User</span></a></li>
	<li <?php if($menu_active == 2) echo 'class="active"';?>><a href="<?php echo site_url('master');?>"><span>Master</span></a></li><?php } ?>
	<?php if($role == '2') {?><li <?php if($menu_active == 3) echo 'class="active"';?>><a href="<?php echo site_url('konsultan/konselingPage');?>"><span>Basis Kasus</span></a></li><?php } ?>
	<?php if($role == '2') {?><li <?php if($menu_active == 4) echo 'class="active"';?>><a href="<?php echo site_url('keluhan');?>"><span>Keluhan</span></a></li><?php } ?>
	<?php if($role == '3') {?><li <?php if($menu_active == 4) echo 'class="active"';?>><a href="<?php echo site_url('keluhan');?>"><span>Keluhan</span></a></li><?php } ?>
	
<li <?php if($menu_active == 5) echo 'class="active"';?>><a href="<?php echo site_url('report/reportselesai');?>"><span>Lap. Kasus Selesai</span></a></li>
	<li <?php if($menu_active == 6) echo 'class="active"';?>><a href="<?php echo site_url('report/reporttdkselesai');?>"><span>Lap. Kasus Tdk Sls</span></a></li>
	<?php if($role=='2') {?><li <?php if($menu_active == 7) echo 'class="active"';?>><a href="<?php echo site_url('pakarsubpending/pakarsubpending');?>"><span>Pakar Sub Pending</span></a></li><?php } ?>
</ul>
</div>