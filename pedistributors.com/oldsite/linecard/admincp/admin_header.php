<?php
if (!defined("IN_SCRIPT")){
	die("Hacking attempt");
}
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
<script language="JavaScript" type="text/javascript">
function revert_template(skinid){
	if (document.getElementById("filename_" + skinid).selectedIndex == -1){
		alert('You have not selected a template');
		return false;
	}
	
	return confirm('Are you sure you want to revert this template?');
}

function show_templates(skinid){
	if (document.getElementById("templates" + skinid).style.display == ""){
		document.getElementById("templates" + skinid).style.display = "none";
	} else {
		document.getElementById("templates" + skinid).style.display = "";
	}
}

function show_code_blocks(id){
	if (document.getElementById("codeblocks" + id).style.display == ""){
		document.getElementById("codeblocks" + id).style.display = "none";
	} else {
		document.getElementById("codeblocks" + id).style.display = "";
	}
}
</script>
</head>
<body>

<?php if ($errormsg <> ""){ ?>
<div class="errormsg"><?=$errormsg?></div>
<?php } // errormsg check ?>