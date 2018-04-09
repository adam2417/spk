<script>
	
	function disableCBP(total,exc,name,name2){
		if(document.getElementById(name+exc).checked) {
		    for(a=0;a<total;a++){
			    if(a!=exc){ document.getElementById(name+a).disabled=true; document.getElementById(name2+a).disabled=true; }
		    }
		} else {
			for(a=0;a<total;a++){
			    if(a!=exc){ document.getElementById(name+a).disabled=false; document.getElementById(name2+a).disabled=false; }
		    }
		}
	}
	
	function disableCBP2(total,exc,name,name2){
		   for(a=0;a<total;a++){
			    if(a!=exc){ document.getElementById(name+a).disabled=true; document.getElementById(name2+a).disabled=true; }
		    }
	}
</script>


<h4>
	<u>PAKAR SUB PENDING</u>
</h4>
<div class="filters">
	<form method="post" name="frmfilter"
		action="<?php echo site_url('pakarsubpending');?>">
		<table>
        
			<tr>
				<td>Keluhan</td>
				<td>:</td>
				<td><select name="cbokeluhan"><option value="">-</option>
				<?php
				$i = 0;
				$all_keluhan =  objectToArray($keluhan_list);
				while($i < count($all_keluhan)){
					
					if($tampil_id_keluhan==$all_keluhan[$i]['id_keluhan']){ $check='selected="selected"'; }
					else{ $check=''; } 
					
					?>
						<option value="<?php echo $all_keluhan[$i]['id_keluhan']?>" <?php echo $check; ?>>
						<?php echo $all_keluhan[$i]['id_keluhan']?>
						</option>
						<?php $i++; }?>
				</select>
				</td>
				<td>&nbsp;</td>
				<td><button name="btnfilter">Filter</button></td>
                <td>Jumlah kasus pending : <?php echo $jumlah_kasus; ?> </td>
			</tr>
		</table> 
        
        
		
	</form>
</div>



<form method="post" name="frmParent"
	action="<?php echo site_url('pakarsubpending');?>"
	onsubmit="javascript:return validate(this);">
	<input type="hidden" name="cbokeluhan" value="<?php echo $tampil_id_keluhan; ?>">	
	<input type="submit" name="btnSave" value="Save" class="btn" /> | <input
		type="reset" name="btnClear" value="Clear" class="btn" /> | <input
		type="button" name="btnClose" value="Back" class="btn"
		onclick="javascript:history.back(1);" /> <br /> <br />
	<div style="border: 0px solid black;">
		<label><b>Kondisi Awal</b>
		</label><br />
		<table>
			<tr>
				<td><label for="txtpsikologi">Psikologis</label>
				</td>
				<td>:</td>
				<td>               
				<div style="border: solid 1px #333; padding: 0;">
				{psikologis_list}	
				</div>               
				</td>
				</td>				
			</tr>
			<!--<tr>
				<td colspan="3">
				
				<table cellpadding="0" cellspacing="0" border="0"><tr><td colspan="3"></td><td>Bobot</td></tr>
                <tr>
	            <td width="55">Asal</td>
                <td>:&nbsp;</td>
	            <td width="140"><input type="hidden" name="txtasal" id="txtasal" value="{id_asal}">
                <input type="text" name="txtasal_desc" id="txtasal_desc" width="250px"
					ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_asal');?>');" value="{asal}" />
                </td><td>
				&nbsp;{combo_bobot_asal}
                </td>
                </tr>
                </table>
                
                
				</td>
				<td>
				</td>
			</tr>-->
		</table>
	</div>
    <br>
	<div style="border: 0px solid black;">
		<div id="left"
			style="border: 0px solid blue; width: 49%; float: left;">
			<label><b>Keluhan</b>
			</label><br />
			<table>
				<tr>
					<td colspan="3">
					<table cellpadding="0" cellspacing="0" border="0"><tr><td colspan="3"></td><td>Bobot</td></tr>
	                <tr>
		            <td width="55">Ekonomi</td>
                    <td>:&nbsp;</td>
		            <td width="140">
	                    <input type="hidden" name="txtekonomi" id="txtekonomi" value="{id_ekonomi}">
	                    <input type="text" name="txtekonomi_desc" id="txtekonomi_desc" value="{ekonomi}"
							width="250px"
							ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_ekonomi');?>');" />
		            </td>
					<td>
					&nbsp;{combo_bobot_ekonomi}
		            </td>
	                </tr>
					</table>		
					
					
					</td>
				</tr>
			</table>
			<br />
			<ul class="simple-tabs" id="demo-tabs">
				<li class="keluarga active">Keluarga</li>
				<li class="pribadi">Pribadi</li>
				<li class="lingkungan">Lingkungan</li>
			</ul>
			<div class="clear-float"></div>
			<div id="keluarga" class="tab-page active-page">
				<div class="ninety-percent-pad">
				{keluarga_list}	
				</div>
			</div>

			<div id="pribadi" class="tab-page">
				<div class="ninety-percent-pad">
					{pribadi_list}
				</div>
			</div>

			<div id="lingkungan" class="tab-page">
				<div class="ninety-percent-pad">
					{lingkungan_list}
				</div>
			</div>
		</div>
		<div id="right"
			style="border: 0px solid red; width: 50%; float: right;">
			<br />
			<table>
				<tr><td></td><td></td><td></td><td>Bobot</td></tr>
				<tr>
					<td><label for="txtsemester">Semester</label>
					</td>
					<td>:</td>
					<td>
                    <input type="hidden" name="txtsemester" id="txtsemester" value="{id_semester}">
                    <input type="text" name="txtsemester_desc" id="txtsemester_desc" value="{semester}"
						ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_semester');?>');"
						width="250px" />
					</td>
					<td>{combo_bobot_semester}
					</td>
				</tr>
				<tr>
					<td><label for="txtipk">Nilai</label>
					</td>
					<td>:</td>
					<td>
                    <input type="hidden" name="txtipk" id="txtipk" value="{id_ipk}">
                    <input type="text" name="txtipk_desc" id="txtipk_desc" width="250px" value="{ipk}"
						ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_ipk');?>');" />
					</td>
					<td>{combo_bobot_ipk}
					</td>
				</tr>
				<tr>
					<td><label for="txtmasalah">Masalah</label>
					</td>
					<td>:</td>
					<td><input type="hidden" name="txtmasalah" id="txtmasalah" value="{id_masalah}">
                    <input type="text" name="txtmasalah_desc" id="txtmasalah_desc" value="{masalah_desc}"
						width="250px"
						ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_masalah');?>');" />
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td><label for="txtsolusi">Solusi</label>
					</td>
					<td>:</td>
					<td><input type="hidden" name="txtsolusi" id="txtsolusi" value="{id_solusi}">
                    <input type="text" name="txtsolusi_desc" id="txtsolusi_desc" value="{solusi}"
						width="250px"
						ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_solusi');?>');" />
					</td>
					<td>
					</td>
				</tr>
			</table>
		</div>
	</div>
</form>
<script>
    function changeBobot(name,exc,bobot_obj_name,bobot) {
        if(document.getElementById(name+exc).checked) {
            document.getElementById(bobot_obj_name+exc).value=bobot;
        } else {
            document.getElementById(bobot_obj_name+exc).value=0;
        }
    }
</script>



