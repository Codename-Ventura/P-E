<div class="main">
<?php
if(isset($_GET['i']) && $_GET['i'] == "reminder"){
?>

<div class="text-box">
<div class="titles">Password Retrieval</div>
<p>
Please enter the email address associated with your account below.  Your password will be then be emailed to you.
</p>
<form id="password_reset" method="post">
<input type="text" size="30" name="email_address" style="padding:.35em;" />
<input type="hidden" name="password_reset" value="true" />
<input type="image" src="images/buttons/submit.png" style="margin-left:1em; line-height:20px" value="Submit">
</form>
</div>

<?php
}elseif(isset($_GET['i']) && $_GET['i'] == "success"){
?>
<div class="text-box">
Your password has been emailed to the address on file.  If you need any further assistance, please call your salesman.  Thank you for choosing P&E Distributors.
</div>
<?php
}else{
?>
<div style="padding:1em; margin:2em 0 0 2em; border:1px #000000 solid; float:left; background:#efefef; width:75%">
<div style="float:left; text-align:right">
<form id="listBuilderForm" name="login_form" method="POST" >
<input type="hidden" name="form_action" value="login" />
<table style="margin-right:1em">
<tr>
<td>User I.D. #:</td><td style="text-align:left;"> <input type="text" name="username" value="" size="24"></td>
</tr>
<tr>
<td>Password:</td><td style="text-align:left"><input type="password" name="password" value="" size="24"></td>
</tr>
<tr>  
<td></td><td><input type="image"  src="images/buttons/login_button.png" name="Log In" border="0" style="margin-top:.5em"></td>
</tr>
<tr><td colspan="2"><a href="?p=login&i=reminder">
<font size="-2">Forget your password?</font></a></td></tr>
</table>
</div>
<div style="border-left:1px #000000 solid; float:right; padding-left:1em">                        
<a href="index.php?p=register" class="style2" \><img src="images/buttons/signupnow.png" border="0" /></a></form>
</div>
</div>

<?php } ?>
</div>