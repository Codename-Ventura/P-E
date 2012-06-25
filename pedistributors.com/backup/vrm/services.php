<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Virtual Restaurant Manager</title>

<link rel="stylesheet" href="./css/styles.css" type="text/css" />
<link rel="stylesheet" href="css/fancy.css" type="text/css" media="screen" />
<script type="text/javascript" src="scripts/js/mootools.js"></script>
<script type="text/javascript" src="scripts/js/fancy.js"></script>
<script type="text/javascript"  src="scripts/js/clock.js">
<script type="text/javascript" 
        src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
  // You may specify partial version numbers, such as "1" or "1.3",
  //  with the same result. Doing so will automatically load the 
  //  latest version matching that partial revision pattern 
  //  (e.g. 1.3 would load 1.3.2 today and 1 would load 1.4.1).
  google.load("jquery", "1.4.1");
 
  google.setOnLoadCallback(function() {
    // Place init code here instead of $(document).ready()
  });
</script>



<script type="text/javascript">   
$(function(){   
$(".module").corner()   
});   
</script>

</head>


<body>

<div id="content">

	<div id="header">
	<img src="images/logos/vrm.gif" class="logo"/>




	<div class="right_box" style="margin:47px 15px 0 0;">
	<label for="search_box"><span style="font-size:13px; line-height:25px">Search: </span></label>  
    	<form>		
        	<input type="text" class="text" name="search_box"/><input type="submit" value="submit" class="btn"/>
            </form>
	</div>



	</div>

	<div id="fancymenu">
	<ul>
    <li id="menu_home"><a class="border_bonus" href="index.php" title="Home">Home</a></li>
	<li id="menu_about"><a href="#" title="About">About</a></li>
	<li id="menu_services" class="current" ><a href="services.php" title="Services">Services</a></li>
	<li id="menu_support"><a href="#" title="Support">Support</a></li>
	<li id="menu_contact"><a href="#" title="Contact">Contact</a></li>

	</ul>
		<div style="float:right"><a href="#"><img src="images/buttons/login_small_red.png"/></a></div>
	</div>


<div id="top"><a href="#"><img src="images/headers/cost_analyses.gif" /></a></div>

<div class="tri_box"><a href="#"><img src="images/buttons/login_button.png" /></a></div>
<div class="tri_box"><a href="#"><img src="images/buttons/tour_button.png" /></a></div>
<div class="tri_box"><a href="#"><img src="images/buttons/pos_button.png" /></a></div>
</div>
</body>
</html>
