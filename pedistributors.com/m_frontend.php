<?php
if(isset($auth) && ($auth == "true")){
	include('m_includes/controllers/secure.php');
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>P&E Distributors - Warehouse Distributor of Performance Auto and Truck Accessories</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="shortcut icon" href="http://www.pedistributors.com/favicon2.ico" type="image/vnd.microsoft.icon" />
<link rel="stylesheet" type="text/css" href="css/m_styles.css" media="screen" />
<link rel="stylesheet" href="css/m_thickbox.css" type="text/css" media="screen" />

<script type="text/javascript" src="js/scripts.js"></script>

<script src="js/jquery.js" language="javascript"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-10063215-1");
pageTracker._setDomainName(".pedistributors.com");
pageTracker._trackPageview();
} catch(err) {}</script>
</head>
<body onLoad="onloads();">
<?php 

//begin site structure
?>

<div id="Table_01">

	<div id="logo_box" onClick="location.href='index.php';"></div>
    
    <!-- Top Navigation Menu -->

    
    <!-- Main Content Area (Contains Phone #) -->     
    
    <!-- Middle Navigation Area (with Icons) -->        
	<div id="action_bar">
    	<?php include('m_includes/layouts/actionbar.php');?>    
    </div>
	
    
    <!-- Toggle Leftbar On/Off & Load content -->    
    <?php
		if(isset($leftbar_on) && $leftbar_on == "true"){?>
    <div id="contents">
    <?php
	include('m_includes/layouts/leftbar.php');
	
	if(isset($_SESSION['loggedin'])){
	?>
    <div class="main">
    <div id="member_nav">
    	<ul>
        	<li style="color:#FFFFFF"><strong>Member's Navigation Menu &raquo;</strong></li>
        	<li><a href="?p=members">Home</a></li>
            <li><a href="?p=account">Your Account</a></li>
            <li><a href="?p=search">Rapid Order</a></li>
            <li><a href="?p=ymm">Search by Vehicle</a></li>
        <li><a href="?p=history">Order History</a></li>
            <li><a href="?p=feedback">Feedback</a></li>
        </ul>
    
    
    </div>
    </div>
    <?php
	}
	if(isset($_SESSION['sitemessage'])){ 
		echo $funcs->pageresponse($_SESSION['sitemessage']);
		unset($_SESSION['sitemessage']);
	}
		}else{
	?>
    <div id="contents_nocol">
    <?php 
	echo $funcs->pageresponse($_SESSION['sitemessage']);
	unset($_SESSION['sitemessage']);
	}
	
	//Loads Main Content Here
	include($_SESSION['configuration'][$mod_type]['dir_location'].$layout);
    ?>    
    </div>
    
    <!-- Footer (Static)-->
    <div id="footer"></div>
    
</div>

<?php
if(ADMIN == 'true'){?>

<div style="width:75%; background:#FFFFFF; clear:both; margin:0 auto 0 auto; text-align:left">
<?php
echo "<pre>";
print_r(get_defined_vars());
echo "</pre>";
?>
</div>
<?php
}
?>

<script type="text/javascript"> 
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www."); 
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E")); 
</script> 
<script type="text/javascript"> 
try{ 
var pageTracker = _gat._getTracker("UA-xxxxxx-x"); 
pageTracker._trackPageview(); 
} catch(err) {}</script>
</body>
</html>