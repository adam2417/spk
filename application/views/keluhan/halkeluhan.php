<h4>
	<u>TAMBAH KELUHAN</u>
</h4>
<form method="post" name="frmParent"
	action="<?php echo site_url('keluhan/tambahkeluhan');?>"
	onsubmit="javascript:return validate(this);">
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
				{psikologi_list}		
				</div>
               
				</td>
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td colspan="3">
				<table cellpadding="0" cellspacing="0" border="0">
                    <tr><td colspan="3"></td><td></td></tr>
                    <tr>
                    <td width="55">NIS</td>
                    <td>:&nbsp;</td>
                    <td width="140"><input type="hidden" name="txtnis" id="txtnis" value="">
                    <input type="text" name="txtnis_desc" id="txtnis_desc" width="250px"
                        ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_siswa');?>');" value="" />
                    </td>
                    <!--<td>
                    Bobot: &nbsp;{combo_bobot_asal}
                    </td>-->
                    </tr>
                </table>
				</td>
				<td>
				</td>
			</tr>
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
					<table cellpadding="0" cellspacing="0" border="0"><tr><td colspan="3"></td><td></td></tr>
	                <tr>
		            <td width="55">Ekonomi</td>
                    <td>:&nbsp;</td>
		            <td width="140">
	                    <input type="hidden" name="txtekonomi" id="txtekonomi" value="">
	                    <input type="text" name="txtekonomi_desc" id="txtekonomi_desc"
							width="250px"
							ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_ekonomi');?>');" />
		            </td>
					<td>&nbsp;Bobot: &nbsp;{combo_bobot_ekonomi}
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
				<tr><td></td><td></td><td></td><td></td></tr>
				<tr>
					<td><label for="txtsemester">Semester</label>
					</td>
					<td>:</td>
					<td>
                    <input type="hidden" name="txtsemester" id="txtsemester" value="">
                    <input type="text" name="txtsemester_desc" id="txtsemester_desc"
						ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_semester');?>');"
						width="250px" />
					</td>
					<td>Bobot: &nbsp;{combo_bobot_semester}
					</td>
				</tr>
				<tr>
					<td><label for="txtipk">Nilai</label>
					</td>
					<td>:</td>
					<td>
                    <input type="hidden" name="txtipk" id="txtipk" value="">
                    <input type="text" name="txtipk_desc" id="txtipk_desc" width="250px"
						ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_ipk');?>');" />
					</td>
					<td>Bobot: &nbsp;{combo_bobot_ipk}
					</td>
				</tr>
				
			</table>
		</div>
	</div>
</form>

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
    
    function changeBobot(name,exc,bobot_obj_name,bobot) {
        if(document.getElementById(name+exc).checked) {
            document.getElementById(bobot_obj_name+exc).value=bobot;
        } else {
            document.getElementById(bobot_obj_name+exc).value=0;
        }
    }
</script>
