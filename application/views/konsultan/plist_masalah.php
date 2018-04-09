<h3><u>MASALAH LIST</u></h3>


<a href="#" onclick="openForm();">Tambah</a>
<form action="" method="post" name="formtambah" id="formtambah" style="margin-top: 10px; <?php if($konfirmasi!=''){ echo 'visibility: visible; height:160px;'; }else{ echo 'visibility: hidden; height:0;'; } ?>">
	<table>
		<tr>
			<td></td>
			<td><?php if(isset($konfirmasi)){ echo $konfirmasi; } ?></td>
		</tr>
		<tr>
			<td width="40">ID</td>
			<td><input type="text" name="id_masalah" readonly="readonly" value="<?php echo $new_ID; ?>" style="color: #796D5E !important" /></td>
		</tr>
		<tr>
			<td>Desc</td>
			<td><textarea name="desc_masalah" rows="5" cols="40"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="simpandatabaru" value="Save"> <input type="button" value="Cancel" onclick="closeForm();"> <input type="button" value="Clear"></td>
		</tr>
	</table>
</form>

<form name="frmplist">
<table style="border-collapse: collapse;" border="1" cellpadding="5">
	<tr class="header">		
		<td>&nbsp;</td>
		<td>ID</td>
        <td>Desc</td>
	</tr>
    <?php 
        if(count($listdata) > 0){
    ?>
	{listdata}
	<tr>
		<td><input type="radio" name="plist_id" value="{id_masalah}#{ket}"></td>
		<td>{id_masalah}</td>		
		<td>{ket}</td>
	</tr>
	{/listdata}
        <?php 
        } else{
            echo "<tr>";
            echo "<td colspan='3' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
        ?>
</table>
<?php echo $this->pagination->create_links(); ?>
<input type="button" name="btn" value="Back" onclick="post_value();"/>
</form>
<script type="text/javascript">
function post_value(){
	
	var docVal = document.frmplist.plist_id.value; //For Radio Only
	//var docVal = document.getElementById("plist_id"); //For checkbox Only
	//var strData = docVal.value.split('#'); // For checkbox only
	var strData = docVal.split('#');
	//var pLabel = opener.document.getElementById("lblasal");
	opener.document.frmParent.txtmasalah.value = strData[0];
	opener.document.frmParent.txtmasalah_desc.value = strData[1];
	//pLabel.innerHTML = strData[1];
	self.close();
	
}

function openForm(){
	document.getElementById("formtambah").style.visibility = "visible";
	document.getElementById("formtambah").style.height = "160px";
}

function closeForm(){
	document.getElementById("formtambah").style.visibility = "hidden";
	document.getElementById("formtambah").style.height = "0px";
}

</script>