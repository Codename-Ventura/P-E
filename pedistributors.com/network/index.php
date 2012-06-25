<?php
//Get PC Info
$ip = $_SERVER['REMOTE_ADDR'];

if(isset($_POST['addip']) && !empty($_POST)){

$host="localhost"; //Host Name
$uname="store";
$pword="store";
$db_name="pande";


mysql_connect("$host", "$uname", "$pword")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

foreach($_POST as $k=>$v){
	$_POST[$k] = mysql_escape_string($v);
}


if(mysql_query("INSERT INTO `ip_list` (`id`,`ip`,`name`,`phone_ext`,`jack_num`,`location`) VALUES (NULL,'$ip','$_POST[name]','$_POST[phone]','','$_POST[location]')")){

	header('Location:http://www.pedistributors.com/network/thanks.html');
	}

}

?>


<div style="width:100%; float:left; font-family:Verdana, Arial, Helvetica, sans-serif; color:#FFFFFF; background:url(../images/Untitled-1_03.jpg);">

<div style="width:100%; float:left">
	<img src="../images/Untitled-1_01.jpg">
</div>
<form method="post">
<input type="hidden" name="addip" value="true">
<div style="float:left; clear:left; width:100%; padding:1em">

<div style="float:left; width:100%; clear:left; padding:.5em">

</div>

<div style="float:left; width:100%; clear:left; padding:.5em">
Name: <input type="text" size="50" name="name">
</div>

<div style="float:left; width:100%; clear:left; padding:.5em">
Location: 
<select name="location">
<option value="Front Counter">Front Counter</option>
<option value="Admin Office (Right Down Stairs)">Admin Office (Right Down Stairs)</option>
<option value="Admin Office (Left Down Stairs)">Admin Office (Left Down Stairs)</option>
<option value="Admin/Marketing Dept (Upstairs)">Admin/Marketing Dept (Upstairs)</option>
<option value="Sales Office (Upstairs)">Sales Office (Upstairs)</option>
<option value="Sales Office (Downstairs)">Sales Office (Downstairs)</option>
<option value="Back Counter">Back Counter</option>
<option value="Warehouse (Shipping/Receiving)">Warehouse (Shipping/Receiving)</option>
<option value="Warehouse (Floor)">Warehouse (Floor)</option>
</select>
</div>

<div style="float:left; width:100%; clear:left; padding:.5em">
Phone Extension: <input type="text" size="50" name="phone">
</div>



<div style="float:left; width:100%; clear:left; padding:.5em">
<button type="submit">Submit</button>
<br/>
<?php echo $ip ?>
</div>

</form>

</div>


</div>