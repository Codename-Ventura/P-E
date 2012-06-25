<?php
require("../includes/global.php");
$usr->auth(1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Admin Control Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css" href="../shared/admin.css" />
<!--[if IE]>
<style type="text/css">
html{
	overflow-y: scroll;
}
</style>
<![endif]-->
</head>
<body>
<div class="menu" style="margin-top: 0px;">
	<h5>Overview</h5>
	<a href="admin_home.php" target="main">Admin Home</a>
	<a href="../" target="_parent">Directory Index</a>
	<a href="../" target="main">Preview Directory</a>
</div>

<div class="menu">
	<h5>My Admin Panel</h5>
	<a href="admin_myprofile.php" target="main">My Profile</a>
	<a href="admin_signout.php" target="_parent">Sign Out</a>
</div>

<?php if ($usr->Access > 1){ ?>
<div class="menu">
	<h5>General Settings</h5>
	<a href="admin_config.php" target="main">Configuration</a>
	<a href="admin_maintenance.php" target="main">Maintenance</a>
</div>

<div class="menu">
	<h5>Languages &amp; Phrases</h5>
	<a href="admin_editphrases.php" target="main">Edit Phrases</a>
	<a href="admin_newphrase.php" target="main">Add New Phrase</a>
	<a href="admin_phrasetools.php" target="main">Import / Export</a>
</div>

<div class="menu">
	<h5>Skins &amp; Templates</h5>
	<a href="admin_newskin.php" target="main">Create Skinset</a>
	<a href="admin_skins.php" target="main">Manage Skinsets</a>
	<a href="admin_newtemplate.php" target="main">Add New Template</a>
</div>

<div class="menu">
	<h5>Manage Users</h5>
	<a href="admin_newuser.php" target="main">Create User</a>
	<a href="admin_users.php" target="main">Manage Users</a>
	<a href="admin_exactmatchuser.php" target="main">Exact Match</a>
</div>

<?php if (ENABLE_PLUGINS === true){ ?>
<div class="menu">
	<h5>Manage Plugins</h5>
	<a href="admin_installplugin.php" target="main">Install Plugin</a>
	<a href="admin_newplugin.php" target="main">Create New Plugin</a>
	<a href="admin_plugins.php" target="main">Manage Plugins</a>
	<a href="admin_newplugincode.php" target="main">New Code Block</a>
</div>
<?php } // end check for plugins being enabled ?>
<?php } // end admin level check ?>
</body>
</html>