<?php
//Early Stages
//Get All Vendor Logos, and decide on layout

include('includes/config/db.php');
include('includes/controllers/vendors.php');

function get_id($line){
	include('includes/config/tssdb.php');
	$query = mysql_query("SELECT * FROM `xcart_manufacturers` WHERE '$line' LIKE `manufacturer`");
	if(mysql_num_rows($query) == "0"){
		return FALSE;
	}else{
		return mysql_fetch_array($query);
	}
}

function get_products($id){
	include('includes/config/tssdb.php');
	$query = mysql_query("SELECT * FROM xcart_products LEFT JOIN xcart_images_T ON xcart_products.productid = xcart_images_T.id   WHERE manufacturerid = $id");
	if(mysql_num_rows($query) == "0"){
		return FALSE;
	}else{
		$products = array();
		$i = "0";
		while($row = mysql_fetch_array($query)){			
			$product_array[$i] = $row;
			$i++;
		}
		return $product_array;
	}
}

$array_slice = array();
foreach($manufacturers as $k=>$v){
	if(isset($v[logo])){
		$array_slice[] = $v;
		}

}





//Build Logo Table
//shuffle($array_slice);
$count = "0";
$cols = "4";

if($main == "home"){
shuffle($array_slice);
$no_of_images = "12";
$image_table = "<table align='center' style='padding:1em; background:#FFF;' width=\"100%\">
<tr>";
}

if($main == "featured_vendors"){

$no_of_images = "70";
$image_table = "<table align='center' style='float:left; padding:1em; background:#FFF; border:1px #000 solid; text-align:center' width=\"100%\">
<tr>";
}


$temp_logos = array_slice($array_slice,0,$no_of_images);


foreach($temp_logos as $k=>$v){
if($count >= $cols){
	$image_table .= "</tr><tr>";
	$count = "0";
	}

$image_table .= "<td align=\"center\" onclick=\"location.href='index.php?p=featured_vendors&vendor_detail=".$v[id]."'\" onMouseOver=\"this.style.border='1px #000 dashed'\" onMouseOut=\"this.style.border='1px #FFF dashed'\" style=\"border:1px #FFF solid; text-align:center\" class=\"image_table_cell\"><a href=\"index.php?p=featured_vendors&vendor_detail=".$v[id]."\"><img src=\"".$v[logo]."\" width=\"120px\" style=\"padding:.25em\" align=\"center\" border=\"0\"></a></td>";
$count++;
}

$image_table .= "</tr></table>";
//End Build Logo Table



?>



<?php
if($main == "home"){


?>
<div class="divider">Featured Vendors</div>
    
    <div class="main">
    
    <?php echo $image_table; ?>
    
    

    
    </div>
    
<?php } ?>
<?php
if($main == "featured_vendors" && !isset($_GET[vendor_detail])){
include('includes/controllers/vendors.php');


?>
<div class="main">
	<div class="text-box">

	<div class="titles">Featured Vendors</div>


	<?php echo $image_table; ?>

	</div>



</div>
    
<?php } ?>



<?php
if(isset($_GET[vendor_detail])){
include('includes/controllers/vendors.php');
foreach($manufacturers as $k=>$v){
	if($_GET[vendor_detail] == $v[0]){
	$vendor_details = $v;
	$vendor_details[products] = get_products($v[db_id]);
	}

}
?>

<div class="main">
	<div class="text-box">

	<div class="titles">Featured Vendor Detail</div>
  		<img src="<?php echo $vendor_details[logo];?>" style="background:#FFFFFF; border:1px #000000 solid; padding:2em; max-width:300px; float:left">
    
    <div style="float:left; margin-left:.5em">
    	<div style="float:left; font-size:24px"><?php echo $vendor_details[name];?></div>
    	<div style="float:left; clear:left; font-size:16px"><?php echo $vendor_details[descr];?></div>
        <?php
			if($vendor_details[url] !== ""){?>
			<div style="float:left; clear:left; font-size:14px"><a href="<?php echo $vendor_details[url];?>" target="_blank">Website</a></div>
          	<?php } ?>
	</div>
</div>





<?php
if(isset($vendor_details[db_id]) &&	 isset($vendor_details[products])){
$count = "0";
shuffle($vendor_details[products]);
$vendor_details[products] = array_slice($vendor_details[products],0,5);
foreach($vendor_details[products] as $k=>$v){
?>
<div style="float:left; width:790px; margin:1em; padding:.5em">
	<div style="width:25%; float:left;"><?php if(isset($v[image_path])){ $v[image_path] = substr($v[image_path],1);?><img src="http://www.tennesseespeedsport.com<?php echo $v[image_path]; ?>" / style="max-width:150px"><?php }else{?><img src="images/no_image.jpg"><?php } ?></div>
    <div style="float:left; width:550px;">
    <div style="float:left; width:70%; font-size:18px; color:#666666"><?php echo $v[product];?></div>
    <div style="float:left; width:70%"><strong>Part Number: </strong><?php echo $v[productcode];?></div>
    <div style="float:left; width:70%"><strong>Description: </strong><?php echo strip_tags(str_replace("<br>"," ",$v[fulldescr]));?></div>
    </div>
</div>
<?php
$count++;
	}  //END OF PRODUCTS LOOP
}
echo "</div>";
} ?>



