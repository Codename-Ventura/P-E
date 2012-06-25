

<?php
include('../includes/db.php');
$show_list = array();


$query = "SELECT * ".
 "FROM `final_attendees`";
$result = mysql_query($query) or die(mysql_error()); 
while($row = mysql_fetch_array($result)){
$show_list[] = $row;
}


$final_names = array();
$count = "0";

foreach($show_list as $k=>$v){
$final_names[$count]['comp_name'] = $v[0];
$final_names[$count]['cust_num'] = $v[1];
$final_names[$count]['city'] = $v[2];
$final_names[$count]['state'] = $v[3];

$final_names[$count]['names'] = array();

if(!empty($v[4])){
	$final_names[$count]['names'][] = $v[4];
}
if(!empty($v[5])){
	$final_names[$count]['names'][] = $v[5];
}
if(!empty($v[6])){
	$final_names[$count]['names'][] = $v[6];
}
if(!empty($v[7])){
	$final_names[$count]['names'][] = $v[7];
}
if(!empty($v[8])){
	$final_names[$count]['names'][] = $v[8];
}
if(!empty($v[9])){
	$final_names[$count]['names'][] = $v[9];
}
if(!empty($v[10])){
	$final_names[$count]['names'][] = $v[10];
}
if(!empty($v[11])){
	$final_names[$count]['names'][] = $v[11];
}

$count++;
}
?>
<table>

<?php
foreach($final_names as $k=>$v){

	foreach($v['names'] as $number=>$name){
	?>
    <tr>
    	<td><?php echo strtoupper($name);?></td>
        <td><?php echo strtoupper($v['comp_name']);?></td>
        <td><?php echo strtoupper($v['cust_num']);?></td>
        <td><?php echo strtoupper($v['city'].", ".$v['state']);?></td>
    
    </tr>
    
    <?php
		}
	}






?>

</table>


