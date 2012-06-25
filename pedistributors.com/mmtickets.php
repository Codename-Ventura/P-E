<?php
include('db.php');
$mmlogin=$_SESSION[customer][login];
 $sql = "SELECT tickets FROM mmtickets WHERE customer_number = '$mmlogin'";
$result = mysql_query($sql);  
$trow = mysql_fetch_assoc($result); 

echo 'Start earning tickets for the March Mayhem $5,000 GRAND PRIZE today! You can earn one drawing ticket for every $100 you purchase!<br><br>';
if ($trow[tickets] != '' && $trow[tickets] >0){
echo 'March Mayhem Tickets Earned: ';
echo $trow[tickets];
echo ' as of January 25th.';}


?>