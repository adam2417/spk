<?php include('upper_submenu.php') ?><br/>
<h4><u>MASTER TRESHOLD</u></h4>
<br/><br/>
<table style="border-collapse: collapse;">
	<tr class="header">		
		<td>Nilai</td>
		<td></td>
	</tr>
        <?php 
        if(count($datalist) > 0){
        ?>
	{datalist}
	<tr class="perrow">
		<td>{nilai}</td>
		<td>			
			<?php if($role == '1'){ ?>			
			<a href="<?php echo site_url('master/treshold_edit');?>">Ubah</a>			
			<?php } ?>
		</td>
	</tr>
	{/datalist}
        <?php 
        } else{
            echo "<tr>";
            echo "<td colspan='3' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
        ?>
</table>