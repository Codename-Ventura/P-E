<?php
include('includes/controllers/vendors.php');
?>


<div class="main">


		<div id="main_content_header">
			<img src="images/headers/hotrod.gif">
		</div>

	<div id="features_bar">
    <ul>
    	<?php
			foreach($_SESSION[image_array] as $k=>$v){?>
    	<li id="feat<?php echo $k;?>" onclick="flip(<?php echo $k;?>);"><?php echo $v['manufacturer'];?></li>
        <?php } ?>
    </ul>
    
    </div>
    
    <!-- LANDING PAGE STUFF -->
    
	<?php include('includes/layouts/content/vendors.php');?>
    
    <div class="divider">New Products</div>
    
    <div class="main"><?php include('includes/layouts/content/news.php');?></div>

    
    
</div>

