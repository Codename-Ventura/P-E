<?php
if(isset($_SESSION['last_search_results'])){
	$search->responseParts = $_SESSION['last_search_results'];
}
?>


<div class="main">

    
    
    <div class="text-box">
    <div class="titles">Rapid Order Search Page</div><a href="/index.php?p=ymm"><img src="../../../images/buttons/ymm-search-button2.png" alt="Search by Vehicle" width="208" height="88" border="0" align="right" /></a>
   	<form method="post">	
    Line Code:  <input type="text" name="linecode" style="margin-right:1em" size="5" />  Part Number:  <input type="text" name="partnumber" size="10" /><input type="image" src="images/buttons/submit.png" style="margin-left:1em;" value="Submit">
    </form>
<p><br />
<a href="/index.php?p=ymm">Click here to search by Vehicle, Engine, Brand, Keyword, or Part Category</a></p>
    </div>

<?php

if(isset($search->responseParts) && !empty($search->responseParts)){
?>
<form method="post" action="index.php?p=cart">
<table width="100%" style="float:left; clear:left; text-align:center;">
<tr><td colspan="9" style="text-align:right; font-size:10px"><a href="#" onclick="$('td.hide_price').show();"><img src="images/buttons/show.png" border="0" /></a><a href="#" onclick="$('td.hide_price').hide();"><img src="images/buttons/hide.png" border="0" /></a></td></tr>
<tr style="padding:1em; text-align:center; background-color:#efefef; font-size:9px">
<td>Details</td><td>Line Code</td><td>Part Number</td><td>Description</td><td>Qty.<br />
Available</td><td>Retail</td><td class="hide_price">Your Price</td><td class="hide_price">Tru-Blu<br />
Jobber</td><td>Order</td>
</tr>


<?php
	foreach($search->responseParts as $k=>$v){
?>

<tr>



<td style="font-size:9px; line-height:100%">
<?php
if(!empty($v[details])){
?>
<a href="http://www.pedistributors.com/partd.php?height=450&width=400&partno=<?php echo $v[2].$v[3];?>" title="" class="thickbox">view<br />
details</a>
<?php
}


?>

</td><td><?php echo $v[2]; ?></td><td><?php echo $v[3]; ?></td><td style="text-align:left"><?php echo $v[6]; ?></td><td><?php echo $v[7]; ?></td><td>$<?php echo $v[8]; ?></td><td class="hide_price">$<?php echo $v[10]; ?></td><td class="hide_price">$<?php echo $v[12]; ?></td><td><input type="text" size="2" name="parts[<?php echo $v[1];?>]" value="0" style="text-align:center"/></td>
<input type="hidden" name="part_additions" value="True" />
</tr>

<?php
	}
?>
<tr><td colspan="8" align="right"><input type="image" src="images/buttons/add_to_cart.png" style="margin:1em 0 0 1em;" value="Submit"></td></tr>
</table>
</form>
<?php
}

?>



</div>