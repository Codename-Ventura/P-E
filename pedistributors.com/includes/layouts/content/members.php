
<div class="main">

<div class="text-box">
<p style="font-size:16px">Welcome to P&E Distributors Members Section...</p>
</div>

	
	
    <div class="linkbox" style="background:url(images/bkgs/mag_glass.png); background-color:#efefef;
	background-position:left; background-repeat:no-repeat;" onclick="location.href='index.php?p=account';">
    
    <a href="index.php?p=account">Your Account</a>
    <span class="subtitles" style="padding-top:0">View your account information here.  View credit terms, account information, change your password, and more.</span>
    
    </div>    
    
    <div class="linkbox" style="background:url(images/bkgs/lightning.png); background-color:#efefef;
	background-position:left; background-repeat:no-repeat;" onclick="location.href='index.php?p=search';">
    
    <a href="index.php?p=search">Rapid Order</a>
    <span class="subtitles" style="padding-top:0">Know your part numbers and ready to order now?  Then this is the place to be.  Quick order parts, just enter your part numbers and go!</span>
    
    </div>
    
    <div class="linkbox" style="background:url(images/bkgs/ymm.png); background-color:#efefef;
	background-position:left; background-repeat:no-repeat;" onclick="location.href='index.php?p=ymm&hdnb2b=<?php echo $_SESSION['customer']['login'];?>'">
    
    <a href="index.php?p=ymm&hdnb2b=<?php echo $_SESSION['customer']['login'];?>">Year, Make, and Model Lookup</a>
    <span class="subtitles" style="padding-top:0">Shop by your vehicle's Year, Make, and Model.  Browse parts for vehicle specific applications.</span>
    
    </div>
    

    
    <div class="linkbox" style="background:url(images/bkgs/pen.png); background-color:#efefef;
	background-position:left; background-repeat:no-repeat;" onclick="location.href='index.php?p=history';">
    
    <a href="index.php?p=history">Order History</a>
    <span class="subtitles" style="padding-top:0">View your invoices from the past 30 days.  Pricing, quantity, and shipping details are included.</span>
    
    </div>


    
</div>

<?php 
if($_SERVER['REMOTE_ADDR'] == "192.168.1.150")
{

#print_r(get_defined_vars());
}

?>