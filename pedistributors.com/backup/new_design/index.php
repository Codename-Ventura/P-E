<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script type="text/javascript">

function toggle_footer(){



$(document).ready(function(){ 


if (document.getElementById('footer_top').className = 'footer_down'){
	
	$("#footer").toggle("slow");
	$("#footer_top").className = 'footer_up';
	}	
else{
	$("#footer").toggle("slow");
	$("#footer_top").className = 'footer_down';
	}
	});
}



</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>P&E Distributors - Your Source for all Your Auto Parts Warehouse Needs</title>
<link rel="stylesheet" href="css/main.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
</head>

<body>


<div id="header">
	<img src="images/logos/pe_main.png" style="margin:1em; float:left" />
    <div id="nav">HOME | ONLINE ORDERING | 2010 CATALOG | ABOUT P&E</div>
</div>


<div id="intro" class="content_box">
<a href="#" onclick="javascript:document.getElementById('footer_top').style.bottom = '66px';">EEE</a>
	<div class="content_inner">
    </div>


</div>

<div id="footer_top" class="footer_up"><a href="#" onclick='javascript:toggle_footer();'><img src="images/icons/close_toolbar.png" /></a></div>
<div id="footer">
	<ul>
    	<li><a href="#"><img src="images/icons/facebook.jpg" /></a></li>
    	<li><a href="#"><img src="images/icons/twitter.jpg" /></a></li>
    	<li><a href="#"><img src="images/icons/rss.jpg" /></a></li>
    	<li style="float:right"><a href="#"><img src="images/icons/email.jpg" /></a></li>
    	<li style="float:right"><a href="#"><img src="images/icons/help.jpg" /></a></li>

    </ul>
</div>

<div class="notice_box" id="notice">Click this button to close this toolbar.</div>
</body>
</html>
