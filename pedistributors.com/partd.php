<?php
include('includes/func.php');
include('includes/controllers/index.php');
include('includes/controllers/search.php');

$partno = $_GET['partno'];
$test = $search->checkDB($partno);
$test[image_path] = substr($test[image_path],1);

if($_SERVER['REMOTE_ADDR'] == "192.168.1.ee247"){
echo "<pre>";
print_r(get_defined_vars());
echo "</pre>";
}else{
?>


<?php
}
?>

<div style="width:100%; float:left">

	<div style="float:left; height:100%; padding:1em; text-align:center; width:95%">
    
	<img src="http://www.tennesseespeedsport.com/images/P/<?php echo $test[filename];?>" style="max-width:250px;"/>
    
	</div>

	<div style="float:left; padding:.25em">

		<div style="float:left; clear:left; font-size:18px; width:100%; text-align:center; line-height:110%">
        <?php echo $test['product'];?>
		</div>
        
        <div style="float:left; clear:left; font-size:14px; margin:1em 0 0 0; width:100%; text-align:center">
        <?php
		echo str_replace("<br>", " | ", $test['fulldescr']);?>
		</div>

	</div>

</div>