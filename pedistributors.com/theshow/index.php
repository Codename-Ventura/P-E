<?php
session_start();
	if(isset($_GET['p'])){
		$p = $_GET['p'];
		}
	else{
		$p = "main";
		}
		
	switch ($p) {
	
	case 'main':
		$h = "main.header.inc.htm";
		$p = "main.body.inc.htm";
		$r = "main.right_col.inc.htm";
		$x = "main";
		break;

	case 'schedule':
		$h = "schedule.header.inc.htm";
		$p = "schedule.body.inc.htm";
		$r = "schedule.right_col.inc.htm";
		$x = "schedule";
		break;

	case 'venue':
		$h = "schedule.header.inc.htm";
		$p = "venue.body.inc.htm";
		$r = "venue.right_col.inc.htm";
		$x = "venue";
		break;

	case 'events':
		$h = "events.header.inc.htm";
		$p = "events.body.inc.htm";
		$r = "events.right_col.inc.htm";
		$x = "events";
		break;
	
	case 'register':
		$h = "events.header.inc.htm";
		$p = "register.body.inc.htm";
		$r = "register.right_col.inc.htm";
		$x = "register";
		break;

	case 'emailreg':
		$h = "events.header.inc.htm";
		$p = "email.body.inc.htm";
		$r = "register.right_col.inc.htm";
		$x = "register";
		break;
	default :
		$h = "main.header.inc.htm";
		$p = "main.body.inc.htm";
		$r = "main.right_col.inc.htm";
		$x = "main";
		break;
	
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
function sendandmail(){
document.registration.submit();
window.location = "index.php?p=emailreg";
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>P&E Distributors - The Show 2010</title>
<link rel="stylesheet" href="css/main.css" />
<script language="javascript">AC_FL_RunContent = 0;</script>
<script src="AC_RunActiveContent.js" language="javascript"></script>

</head>

<body>

<div id="main">

<?php include('includes/'.$h); ?>


	<div style="width:100%; float:left; clear:both;">

	<?php include('includes/'.$p); ?>
	</div>    
</div>


<div id="rightcol">
	
<?php include('includes/'.$r); ?>
        

</div>

</body>
</html>
