<div style="float:left; width:700px">

<?php

if($main == "home"){
include('includes/controllers/news.php');
$newstype = "p";

}

if(isset($_GET['n'])){
	$newstype = $_GET['n'];
}

switch($newstype){	
	case 'n';
		$newstype = "news";
		break;
	case 'p';
		$newstype = "products";
		break;
	case 'r';
		$newstype = "rebates";
		break;	
	default;
		$newstype = "news";
		break;
	}

$data = $news->get_data($newstype);



if(empty($data)){
?>

<div class="text-box">
	
	
    <div style="float:left; margin-left:1em">
    	<div style="float:left; clear:left; width:400px; font-size:16px; font-weight:600; border-bottom:1px #000000 solid; padding-bottom:.25em;">No Information Found</div>
    </div>
</div>
</div>



<?php

exit();
}





foreach($data as $k=>$v){
	

?>
<div class="text-box">

	
	<img src="<?php echo $v[image]; ?>" style="width:200px; border:2px #000000 solid; float:left" />
    <div style="float:left; margin-left:1em">
    	<div style="float:left; clear:left; width:400px; font-size:16px; font-weight:600; border-bottom:1px #000000 solid; padding-bottom:.25em;"><?php echo $v[title];?></div>
        <div style="float:left; clear:left; width:400px; margin-top:.25em"><?php echo $v[fulldescr];?></div>
        <?php if(!empty($v[link])){?>
        <div style="float:left; clear:left; width:400px; margin-top:.25em"><a href="<?php echo $v[link];?>" target="_parent">Click here for more</a></div>
        <?php } ?>
        
    </div>
</div>
<?php
	}



?>

</div>