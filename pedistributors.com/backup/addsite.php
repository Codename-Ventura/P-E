<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>P&E Distributors Internet Use Consent</title>
<style type="text/css">
<!--
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style4 {font-size: 12px}
.style5 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style7 {font-size: 16px}
-->
</style>
</head>
<?php
if (isset($do) && ($do == "sendsite")){
$rec = "jjames@pedistributors.com";
$rec2 = "donnie@pedistributors.com";
$subj = "Remove Site Block Request";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$message = $_REQUEST['name']."<br>".$_REQUEST['site']."<br>".$_REQUEST['reason'];
mail($rec,$subj,$message,$headers);
mail($rec2,$subj,$message,$headers);
?>

<body>
<form method="post" >
<input type="hidden" name="do" value="sendsite" />
<table style="width:75%; margin-left:auto; margin-right:auto; margin-top:10%" cellpadding="10px">
<tr>
  <td colspan="2" style="text-align:center"><p align="center" class="style1"><span class="style7" style="border-bottom:1px #000000 solid">The site <?php echo $_REQUEST['site'];?> has been submitted.</span></p></td>
</tr>
</table>
</form>
</body>
</html>
<?php } else {?>


<body>
<form method="post" >
<input type="hidden" name="do" value="sendsite" />
<table style="width:85%; margin-left:auto; margin-right:auto; margin-top:10%" cellpadding="10px">
<tr>
  <td colspan="2" style="text-align:center"><p align="center" class="style1"><span class="style7" style="border-bottom:1px #000000 solid">Please enter the site information below and press &quot;SUBMIT&quot; to send this link to management</span></p></td>
</tr>
<tr>
  <td width="46%"><div align="right"><span class="style4 style1">Please enter the site address:</span><br />    
  </div></td>
  <td width="54%"><input type="text" size="30" name="site" value="<?php echo $_SERVER['HTTP_REFERER'];?>"/></td>
</tr><tr>
  <td width="46%"><div align="right"><span class="style4 style1">Enter Your Name:</span><br />    
  </div></td>
  <td width="54%"><input type="text" size="30" name="name"/></td>
</tr>
<tr>
  <td width="46%"><div align="right" style="vertical-align:top"><span class="style5">Please enter a brief description:</span><br />    
  </div></td>
  <td width="54%"><textarea rows="5" cols="40" name="reason"/></textarea></td>
</tr>
<tr>
  <td colspan="2" style="text-align:center"><p align="center" class="style1"><span class="style4"><input type="submit" /></span><br />    </td>
</tr>
</table>
</form>
</body>
</html>

<?php } ?>