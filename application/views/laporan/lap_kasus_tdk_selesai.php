<h4><u>LAPORAN KASUS TIDAK SELESAI</u></h4>
<div class="filters">
	<form method="post" name="frmfilter" action="<?php echo site_url('report/reporttdkselesai');?>">
		<table>
			<tr>
				<td>Keluhan</td>
				<td>:</td>
				<td>
				<select name="cbokeluhandari">
					<?php
						$i = 0;
						$all_keluhan =  objectToArray($keluhan_list);
						while($i < count($all_keluhan)){
					?>
					<option value="<?php echo $all_keluhan[$i]['id_keluhan']?>"><?php echo $all_keluhan[$i]['id_keluhan']?></option>
					<?php $i++; }?>
				</select>
				</td>
				<td>s.d</td>
				<td>
				<select name="cbokeluhansampai">
						<?php
						$i = 0;
						$all_keluhan =  objectToArray($keluhan_list);
						while($i < count($all_keluhan)){
					?>
					<option value="<?php echo $all_keluhan[$i]['id_keluhan']?>"><?php echo $all_keluhan[$i]['id_keluhan']?></option>
					<?php $i++; }?>
				</select>
				</td>
				<td>&nbsp;</td>
				<td><button name="btnfilter">Filter</button></td>
			</tr>
		</table>

</div>
</form>
<br/>
<div class="konseling">
<div style="width:1024px;">
<table style="border-collapse: collapse;">
	<tr class="header">		
		<td>Id Kasus</td>
		<td>Id Keluhan</td>
		<td>Jml. Gejala Cocok</td>
		<td>Jml. Kondisi Basis Kasus</td>
		<td>Jml. Gejala Dipilih</td>
		<td>Pembagi</td>
		<td>Nilai</td>
	</tr>
        <?php 
        if(count($kasus_list) > 0){
        ?>
	{kasus_list}
	<tr class="perrow">
		<td>{id_kasus}</td>		
		<td>{id_keluhan}</td>
		<td>{jml_gejala_cocok}</td>
		<td>{jml_knds_basis_kasus}</td>
		<td>{jml_gejala_dipilih}</td>
		<td>{pembagi}</td>
		<td>{nilai}</td>
	</tr>
	{/kasus_list}
        <?php 
        } else{
            echo "<tr>";
            echo "<td colspan='3' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
        ?>
</table>
</div>
</div>