<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body style="font-family:Verdana, Arial, Helvetica, sans-serif">
<div style="float:left; width:100%; clear:both; margin:1em 0 1em 0">
P&E B2B Admin Scripts
</div>

<div style="float:left; width:100%; clear:both; margin:1em 0 1em 0">
Total # of orders : <?php echo count($store_log); ?>
</div>

<div style="float:left; width:100%; clear:both; margin:1em 0 1em 0">
Total Sales : $<?php echo get_total_income($store_log);?>
</div>


<table width="100%" border="0">
<tr style="font-size:10px; background:#CCCCCC; text-align:center; padding:.5em">
<td><a href="index.php">#</a></td><td><a href="index.php?sortby=date">Date</a></td><td><a href="index.php?sortby=customer">Customer Number</a></td><td><a href="index.php?sortby=amount">Amount</a></td>
</tr>
<?php
foreach($store_log as $k=>$v){
?>
<tr style="text-align:center">
<td><?php echo $k + 1;?></a></td>
<td><a href="?oneday=<?php echo $v['date'];?>"><?php echo $v['date'];?></a></td>
<td><?php echo $v['cust_num'];?></td>
<td><?php echo $v['amount'];?></td>
</tr>

<?php
}
?>
</table>
</body>
</html>
