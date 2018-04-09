<h3><u>LINGKUNGAN LIST</u></h3>
<form name="frmplist">
<table>
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
		<td><input type="radio" name="plist_id" value="{id_lingkungan}#{ket}"></td>
		<td>{id_lingkungan}</td>		
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
	//var pLabel = opener.document.getElementById("lbllingkungan");
	opener.document.frmParent.txtlingkungan.value = strData[0];
	opener.document.frmParent.txtlingkungan_desc.value = strData[1];
	//pLabel.innerHTML = strData[1];
	self.close();
}
</script>