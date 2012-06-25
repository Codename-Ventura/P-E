<html>
<head>
<style type="text/css">
table.sample {
	border-width: 3px;
	border-spacing: 2px;
	border-style: outset;
	border-color: gray;
	border-collapse: separate;
	background-color: white;
}
table.sample th {
	border-width: 1px;
	padding: 1px;
	border-style: inset;
	border-color: gray;
	background-color: rgb(255, 255, 240);
	-moz-border-radius: 0px 0px 0px 0px;
}
table.sample td {
	border-width: 1px;
	padding: 1px;
	border-style: inset;
	border-color: gray;
	background-color: rgb(255, 255, 240);
	-moz-border-radius: 0px 0px 0px 0px;
}
</style>
</head>
<body>
<?php
if($_SERVER['REMOTE_ADDR'] !== '192.168.1.150'){
exit();}
$username="store";
$password="store";
$database="pande";

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query="SELECT * FROM ip_list ORDER BY `id` ASC";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();
?>
<table class="sample">
<tr>
<th><font face="Arial, Helvetica, sans-serif">ID</font></th>
<th><font face="Arial, Helvetica, sans-serif">IP ADDRESS</font></th>
<th><font face="Arial, Helvetica, sans-serif">NAME</font></th>
<th><font face="Arial, Helvetica, sans-serif">PHONE EXT</font></th>
<th><font face="Arial, Helvetica, sans-serif">JACK#</font></th>
<th><font face="Arial, Helvetica, sans-serif">LOCATION</font></th>
</tr>

<?php
$i=0;
while ($i < $num) {

$f1=mysql_result($result,$i,"id");
$f2=mysql_result($result,$i,"ip");
$f3=mysql_result($result,$i,"name");
$f4=mysql_result($result,$i,"phone_ext");
$f5=mysql_result($result,$i,"jack_num");
$f6=mysql_result($result,$i,"location");
?>

<tr>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f1; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f4; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f5; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f6; ?></font></td>
</tr>

<?php
$i++;
}
?>
</body>
</html>