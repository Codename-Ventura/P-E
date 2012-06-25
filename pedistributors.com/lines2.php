
<?php
include('includes/functions/linecard.func.php');

/*echo "<pre>";
print_r($all_lines);
echo "</pre>";*/

?>
<script language="JavaScript">

function loadPage(list) {

  location.href=list.options[list.selectedIndex].value

}

</script>
<form name="form1">VIEW:&nbsp;&nbsp;
  <select name="menu1" onChange="loadPage(this.form.elements[0])">
      <option <?php if($type == "all"){ echo "selected";}?> value="<?php echo $_SERVER['PHP_SELF'];?>?line=all">ALL LINES</option>
      <option value="<?php echo $_SERVER['PHP_SELF'];?>?line=truck" <?php if($type == "truck"){ echo "selected";}?>>Truck &amp; Diesel Accessories</option>
      <option value="<?php echo $_SERVER['PHP_SELF'];?>?line=performance" <?php if($type == "performance"){ echo "selected";}?>>Performance Products &amp; Hard Parts</option>
      <option value="<?php echo $_SERVER['PHP_SELF'];?>?line=audio" <?php if($type == "audio"){ echo "selected";}?>>Mobile Audio/Video/Security</option>
    </select>
</form>
<table cellpadding="10px" align="center" cellspacing="0" style="border:1px #000000 solid; width:775px; margin:1em auto 0 auto; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif; float:left">
<tr style="background:#000000; color:#FFFFFF; padding:1em; text-align:center; font-weight:600">
	<td style="width:10%; padding:1em">Line</td>
    <td style="width:40%; padding:1em">Name</td>
    <td style="width:40%; padding:1em">Description</td>
    <td style="width:40%; padding:1em">Website</td>
</tr>
<?php
foreach($lines_2[$type] as $k=>$v){

?>
<tr>
	<td style="width:20%; border-bottom:1px #000000 solid; border-right:1px #000000 dashed"><?php echo $v[line];?></td>
    <td style="width:20%; border-bottom:1px #000000 solid; border-right:1px #000000 dashed"><?php echo $v[name];?></td>
    <td style="width:20%; border-bottom:1px #000000 solid; border-right:1px #000000 dashed"><?php echo $v[descr];?></td>
    <td style="width:40%; border-bottom:1px #000000 solid"><a href="<?php echo $v[url];?>" target="_blank"><?php echo $v[url];?></a></td>
</tr>
<?php
}
?>
</table>