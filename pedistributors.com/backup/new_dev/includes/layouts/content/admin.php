
<div class="main">
<?php
if(isset($admin->add_entry)){
?>
<div class="text-box">
<div class="titles">Preview Entry</div>
	<div class="text-box-clear">
    Type of Entry: <?php echo $_POST['entry_type'];?>    
    </div>
	<div class="text-box-clear">
    Manufacturer: <?php echo $_POST['manufacturer'];?>    
    </div>
	<div class="text-box-clear">
    Title: <?php echo $_POST['title'];?>    
    </div>
	<div class="text-box-clear">
    Description:<br /> <?php echo $_POST['description'];?>    
    </div>
	<div class="text-box-clear">
    <p>Image:</p> <img src="<?php echo $_POST['image_link'];?> " />   
    </div>
	<div class="text-box-clear">
    PDF Link: <a href="<?php echo $_POST['pdf_link'];?>" target="_blank">(click to test)</a>
    </div>
	<div class="text-box-clear">
    Expiration Date: <?php echo $_POST['exp_month']."/".$_POST['exp_day']."/".$_POST['exp_year'];?>
    </div>
    <div class="text-box-clear">

    </div>
</div>
<?php
}else{?>


	<div class="text-box">
	   	<div class="titles">Administration</div>
    		<p>
        	In the administration section, a user can add a special, a news entry, a new product entry, and/or a rebates/promotion entry
        	</p>
    </div>
    
	<div class="text-box">
       	<div class="subtitles">Add a Special</div>
    		<form name="specials" method="post">
            <div class="text-box-clear">
            Type of Entry:  
            <select name="entry_type">
            	<option value="special">Special</option>
            	<option value="special">Rebate/Promotion</option>
                <option value="special">New Product</option>
                <option value="special">News</option>
            </select>       
            </div>
            <div class="text-box-clear">
            Manufacturer:  <select name="manufacturer">
            	<?php
					sort($manufacturers);
					foreach($manufacturers as $k=>$v){?>
                    
                    <option value="<?php echo $v['line'];?>"><?php echo $v['name'];?></option>
				
				<?php } ?>
            </select>
            </div>
            <div class="text-box-clear">
            Title:  <input type="text" name="title" size="50"  />
            </div>
            <div class="text-box-clear">
            Link to image:  <input type="text" name="image_link" size="50"  />
            </div>
            <div class="text-box-clear">
            Link to PDF (if applicable):  <input type="text" name="pdf_link" size="50"  />
            </div>
            <div class="text-box-clear" style="vertical-align:text-top">
            <p>Description:</p><textarea rows="10" cols="50" name="description"></textarea>
            </div>
            <div class="text-box-clear" style="vertical-align:text-top">
            <p>Applicable Part Numbers (separated by comma):</p><textarea rows="5" cols="50" name="part_numbers"></textarea>
            </div>
			<div class="text-box-clear">
            Expiration Date:  
            	<select name="exp_month">
            	<option value='01'>January</option>
				<option value='02'>February</option>
                <option value='03'>March</option>
				<option value='04'>April</option>
				<option value='05'>May</option>
                <option value='06'>June</option>
				<option value='07'>July</option>
				<option value='08'>August</option>
				<option value='09'>September</option>
				<option value='10'>October</option>
				<option value='11'>November</option>
				<option value='12'>December</option>
                </select>
				<input type="text" name="exp_day" size="2"/>
        		<select name="exp_year">
		        <option value="2010">2010</option>
                <option value="2011">2011</option>
                </select>
            </div>
			<div class="text-box-clear" style="vertical-align:text-top">
            <button type="submit" value="Submit">Submit</button>
            </div>
            <input type="hidden" name="submit_special" value="true" />
            </form>
    </div>


<?php
}
?>

</div>