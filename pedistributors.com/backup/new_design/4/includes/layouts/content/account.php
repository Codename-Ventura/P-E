
<div class="main">
	<div class="text-box">
    	<div class="titles" style="width:50%">Your Account Information</div>
        	<ul style="padding:1em; border:1px #000000 solid; float:right">
            	<li>Welcome Back <?php echo $_SESSION['customer']['name'];?></li>
            	<li>Account Number : <?php echo $_SESSION['customer']['accountNumber'];?></li>
            </ul> 
     
    
       
    </div>
    
    
    <div class="linkbox" style="background:url(images/bkgs/lightning.png); background-color:#efefef;
	background-position:left; background-repeat:no-repeat;" onclick="location.href='index.php?p=search';">
    
    <a href="index.php?p=search">Rapid Order</a>
    <span class="subtitles" style="padding-top:0">Know your part numbers and ready to order now?  Then this is the place to be.  Quick order parts, just enter your part numbers and go!</span>
    
    </div>
    
    <div class="linkbox" style="background:url(images/bkgs/ymm.png); background-color:#efefef;
	background-position:left; background-repeat:no-repeat;" onclick="location.href='index.php?p=ymm&hdnb2b=<?php echo $_SESSION['customer']['login'];?>">
    
    <a href="index.php?p=ymm&hdnb2b=<?php echo $_SESSION['customer']['login'];?>">Year, Make, and Model Lookup</a>
    <span class="subtitles" style="padding-top:0">Shop by your vehicle's Year, Make, and Model.  Browse parts for vehicle specific applications.</span>
    
    </div>
    
    
    <div class="linkbox" style="background:url(images/bkgs/pen.png); background-color:#efefef;
	background-position:left; background-repeat:no-repeat;" onclick="location.href='index.php?p=history';">
    
    <a href="index.php?p=search">Order History</a>
    <span class="subtitles" style="padding-top:0">View your invoices from the past 30 days.  Pricing, quantity, and shipping details are included.</span>
    
    </div>


    
</div>