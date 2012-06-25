<?php
include('db.php');
$customer_number = '59972';

 $sql = "SELECT tickets FROM mmtickets WHERE customer_number = '$_SESSION[customer][login]'";
$result = mysql_query($sql);  
$row = mysql_fetch_assoc($result); 
echo "March Mayhem Tickets Earned: ".$row[tickets];

?>