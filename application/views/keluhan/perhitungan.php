<table>
	<tr class="header">
		<td>Kasus</td>
		<td>Masalah #</td>
		<td>Masalah</td>
		<td>Solusi #</td>
		<td>Solusi</td>
		<td>Nilai</td>
	</tr>
	<?php if(count($datalist) > 0){?>
	{datalist}
	<tr>
		<td>{id_kasus}</td>
		<td>{id_masalah}</td>
		<td>{masalah}</td>
		<td>{id_solusi}</td>
		<td>{solusi}</td>
		<td>{nilai}</td>
	</tr>
	{/datalist}
	<?php } ?>
</table>
