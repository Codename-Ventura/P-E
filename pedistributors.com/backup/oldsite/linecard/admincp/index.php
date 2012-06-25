<?php
require("../includes/global.php");
$pagetitle = "Admin Control Panel";

// authorise users
if ($usr->Access < 1){
	redirect("admin_signin.php?from=" . urlencode($_GET["from"]));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html>

<head>
<title>Admin Control Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head>

<frameset cols="200,*">

  <frame name="menu" id="menu" src="admin_menu.php">
  <frame name="main" id="main" src="admin_home.php">

</frameset>

</html>