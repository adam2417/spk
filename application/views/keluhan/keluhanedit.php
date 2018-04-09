<?php
$id = $this->uri->segment(3); 
?>
<form method="post" name="frmParent" action="<?php echo site_url('konsultan/konsultan_edit');?>/<?php echo $id;?>" onsubmit="javascript:return validate(this);">
<input type="submit" name="btnSave" value="Save" class="btn" />
|
<input type="reset" name="btnClear" value="Clear" class="btn" />
|
<input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
<br />
<br />
{datalist}
<div style="border: 0px solid black;">
	<label><b>Kondisi Awal</b></label><br />
	<table>
		<tr>
			<td><label for="txtpsikologi">Psikologis</label></td>
			<td>:</td>
			<td><input type="text" name="txtpsikologi" id="txtpsikologi" ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_psikologi');?>');" class="txtplist" value="{idpsikologis}"/></td>
			<td><label for="txtpsikologi" id="lblpsikologi">{psikologis}</label></td>
		</tr>
		<tr>
			<td><label for="txtnis">NIS</label></td>
			<td>:</td>
			<td><input type="text" name="txtnis" id="txtnis" class="txtplist" ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_siswa');?>');" value="{nis}"/></td>
			<td><label for="txtnis" id="lblnis">{nis}</label></td>
		</tr>
	</table>
</div>
<div style="border: 0px solid black;">
<div id="left" style="border: 0px solid blue;width: 49%;float:left;">
<label><b>Keluhan</b></label><br/>
<table>
		<tr>
			<td valign="top"><label for="txtekonomi">Ekonomi</label></td>
			<td valign="top">:</td>
			<td><input type="text" name="txtekonomi" id="txtekonomi" class="txtplist" ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_ekonomi');?>');" value="{idekonomi}"/>
			<label for="txtekonomi" id="lblekonomi">{ekonomi}</label>
			</td>
		</tr>
		<tr>
			<td><label for="txtkeluarga">Keluarga</label></td>
			<td>:</td>
			<td><!--<input type="text" name="txtkeluarga" id="txtkeluarga" class="txtplist" ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_keluarga');?>');" /></td>
			<td><label for="txtkeluarga" id="lblkeluarga"></label>-->
				<div class="container">
					<?php
						$id_kel = $datalist[0]->idkeluarga;
						$idkel = objectToArray($keluarga_list);
						$idk = '';
						$i = 0;
						while($i < count($idkel)){
							$checked = '';
							$idk = $idkel[$i]['id_keluarga'];
							if(strcasecmp($idk,$id_kel) == 0){ $checked = 'checked'; }
					?>
						<input type="checkbox" id="chkkeluarga" name="chkkeluarga[]" value="<?php echo $idk;?>" <?php echo $checked;?> /><?php echo $idkel[$i]['ket'];?><br />					
					<?php $i++; } ?>
				</div>				
			</td>
		</tr>
		<tr>
			<td valign="top"><label for="txtpribadi">Pribadi</label></td>
			<td valign="top">:</td>
			<td>
			<!--<input type="text" name="txtpribadi" id="txtpribadi" class="txtplist" ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_pribadi');?>');" /></td>
			<td><label for="txtpribadi" id="lblpribadi"></label>-->
			<div class="container">
				<?php 	
					$id_pribadi = $datalist[0]->idpribadi;
					$idpribadi = objectToArray($pribadi_list);
					$idp = '';
					$i = 0;
					while($i < count($idpribadi)){
						$checked = '';
						$idp = $idpribadi[$i]['id_pribadi'];
						if(strcasecmp($idp,$id_pribadi) == 0){ $checked = 'checked'; }
				?>
				<input type="checkbox" id="chkpribadi" name="chkpribadi[]" value="<?php echo $idp; ?>" <?php echo $checked;?> /><?php echo $idpribadi[$i]['ket']?><br />
				<?php $i++; } ?>		    
			</div>			
			 </td>
		</tr>
		<tr>
			<td valign="top"><label for="txtlingkungan">Lingkungan</label></td>
			<td valign="top">:</td>
			<!--<td><input type="text" name="txtlingkungan" id="txtlingkungan" class="txtplist" ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_lingkungan');?>');" /></td>
			<td><label for="txtlingkungan" id="lbllingkungan"></label></td>-->
			<td>
			<div class="container">
				<?php 
					$id_lingkungan = $datalist[0]->idlingkungan;
					$idlingkungan = objectToArray($lingkungan_list);
					$idl = '';
					$i = 0;
					while($i < count($idlingkungan)){
						$checked = '';
						$idl = $idlingkungan[$i]['id_lingkungan'];
						if(strcasecmp($idl,$id_lingkungan) == 0){ $checked = 'checked'; }
				?>
				<input type="checkbox" id="chklingkungan" name="chklingkungan[]" value="<?php echo $idl; ?>" <?php echo $checked;?> /><?php echo $idlingkungan[$i]['ket'];?><br />
				<?php $i++; } ?>			    
			</div>			
			</td>
		</tr>
	</table>
</div>
<div id="right" style="border: 0px solid red;width: 50%;float:right;">
<br/>
<table>
		<tr>
			<td><label for="txtsemester">Semester</label></td>
			<td>:</td>
			<td><input type="text" name="txtsemester" id="txtsemester" ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_semester');?>');" class="txtplist" value="{idsemester}"/>
			</td><td><label for="txtsemester" id="lblsemester">{semester}</label></td>
		</tr>
		<tr>
			<td><label for="txtipk">IPK</label></td>
			<td>:</td>
			<td><input type="text" name="txtipk" id="txtipk" class="txtplist" ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_ipk');?>');" value="{idipk}" />
			</td><td><label for="txtipk" id="lblipk">{ipk}</label></td>
		</tr>
		<tr>
			<td><label for="txtmasalah">Masalah</label></td>
			<td>:</td>
			<td><input type="text" name="txtmasalah" id="txtmasalah" class="txtplist" ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_masalah');?>');" />
			</td><td><label for="txtmasalah" id="lblmasalah"></label></td>
		</tr>
		<tr>
			<td valign="top"><label for="txtsolusi">Solusi</label></td>
			<td valign="top">:</td>
			<td valign="top"><input type="text" name="txtsolusi" id="txtsolusi" class="txtplist" ondblclick="openOtherWindow('<?php echo site_url('konsultan/plist_solusi');?>');" /></td>
			<td><label for="txtsolusi" id="lblsolusi"></label></td>
		</tr>
</table>
</div>
</div>
<div style="visibility: hidden;">
<input type="text" name="txtpsikologi_old" id="txtpsikologi_old" value="{idpsikologis}"/>
<input type="text" name="txtasal_old" id="txtasal_old" value="{idasal}"/>
<input type="text" name="txtekonomi_old" id="txtekonomi_old" value="{idekonomi}"/>
<input type="text" name="txtkeluarga_old" id="txtkeluarga_old" value="{idkeluarga}"/>
<input type="text" name="txtpribadi_old" id="txtpribadi_old" value="{idpribadi}" />
<input type="text" name="txtlingkungan_old" id="txtlingkungan_old" value="{idlingkungan}"/>
<input type="text" name="txtsemester_old" id="txtsemester_old" value="{idsemester}"/>
<input type="text" name="txtipk_old" id="txtipk_old" value="{idipk}" />
</div>
{/datalist}
</form>
