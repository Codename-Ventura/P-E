<html>
<head>
<title>PricEr - Pricing Retrieval Application</title>
</head>
<body style="margin:0; padding:0">
<img src="images/pricer/pricer2.jpg" style="float:left; margin-bottom:2em"><?php include('menu.php'); ?>
<div style="clear:both; float:left; width:100%">



<table align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; clear:both; padding:.5em" cellpadding="0" cellspacing="5px" border="0" bgcolor="#CCCCCC">
<tr style="font-size:9px; text-align:center">
<td>Engine Make</td>
<td>Engine Size</td>
<td>Engine Family</td>
<td></td>
</tr>


<tr><td>
<form method="post" action="ymm.php">
<select name="make">
		<option value="">Choose a Make</option>
		<option value="AC">AC</option>
		<option value="ACURA">ACURA</option>
		<option value="ALFA-ROMEO">ALFA ROMEO</option>
		<option value="ALLARD">ALLARD</option>
		<option value="ALLSTATE">ALLSTATE</option>
		<option value="AM-GENERAL">AM GENERAL</option>
		<option value="AMERICAN-MOTORS">AMERICAN MOTORS</option>
		<option value="ASTON-MARTIN">ASTON MARTIN</option>
		<option value="ASUNA">ASUNA</option>
		<option value="AUDI">AUDI</option>
		<option value="AUSTIN">AUSTIN</option>
		<option value="AVANTI">AVANTI</option>
		<option value="BENTLEY">BENTLEY</option>
		<option value="BERTONE">BERTONE</option>
		<option value="BIZZARRINI">BIZZARRINI</option>
		<option value="BMW">BMW</option>
		<option value="BRICKLIN">BRICKLIN</option>
		<option value="BUICK">BUICK</option>
		<option value="CADILLAC">CADILLAC</option>
		<option value="CHECKER">CHECKER</option>
		<option value="CHEVROLET">CHEVROLET</option>
		<option value="CHRYSLER">CHRYSLER</option>
		<option value="CITROEN">CITROEN</option>
		<option value="CROSLEY">CROSLEY</option>
		<option value="CUNNINGHAM">CUNNINGHAM</option>
		<option value="DAEWOO">DAEWOO</option>
		<option value="DAIHATSU">DAIHATSU</option>
		<option value="DAIMLER">DAIMLER</option>
		<option value="DELOREAN">DELOREAN</option>
		<option value="DESOTO">DESOTO</option>
		<option value="DETOMASO">DETOMASO</option>
		<option value="DODGE">DODGE</option>
		<option value="EAGLE">EAGLE</option>
		<option value="EDSEL">EDSEL</option>
		<option value="EXCALIBUR">EXCALIBUR</option>
		<option value="FACEL-VEGA">FACEL VEGA</option>
		<option value="FERRARI">FERRARI</option>
		<option value="FIAT">FIAT</option>
		<option value="FORD">FORD</option>
		<option value="FRAZER">FRAZER</option>
		<option value="FREIGHTLINER">FREIGHTLINER</option>
		<option value="GEO">GEO</option>
		<option value="GMC">GMC</option>
		<option value="HENRY-J">HENRY J</option>
		<option value="HILLMAN">HILLMAN</option>
		<option value="HONDA">HONDA</option>
		<option value="HUDSON">HUDSON</option>
		<option value="HUMMER">HUMMER</option>
		<option value="HYUNDAI">HYUNDAI</option>
		<option value="INFINITI">INFINITI</option>
		<option value="INTERNATIONAL">INTERNATIONAL</option>
		<option value="ISUZU">ISUZU</option>
		<option value="JAGUAR">JAGUAR</option>
		<option value="JEEP">JEEP</option>
		<option value="JENSEN">JENSEN</option>
		<option value="KAISER">KAISER</option>
		<option value="KIA">KIA</option>
		<option value="LADA">LADA</option>
		<option value="LAFORZA">LAFORZA</option>
		<option value="LAMBORGHINI">LAMBORGHINI</option>
		<option value="LANCIA">LANCIA</option>
		<option value="LAND-ROVER">LAND ROVER</option>
		<option value="LEXUS">LEXUS</option>
		<option value="LINCOLN">LINCOLN</option>
		<option value="LLOYD">LLOYD</option>
		<option value="LOTUS">LOTUS</option>
		<option value="MASERATI">MASERATI</option>
		<option value="MAYBACH">MAYBACH</option>
		<option value="MAZDA">MAZDA</option>
		<option value="MERCEDES-BENZ">MERCEDES-BENZ</option>
		<option value="MERCURY">MERCURY</option>
		<option value="MERKUR">MERKUR</option>
		<option value="METROPOLITAN">METROPOLITAN</option>
		<option value="MG">MG</option>
		<option value="MINI">MINI</option>
		<option value="MITSUBISHI">MITSUBISHI</option>
		<option value="MONTEVERDI">MONTEVERDI</option>
		<option value="MORGAN">MORGAN</option>
		<option value="MORRIS">MORRIS</option>
		<option value="MOTORHOME">MOTORHOME</option>
		<option value="NASH">NASH</option>
		<option value="NISSAN">NISSAN</option>
		<option value="NSU">NSU</option>
		<option value="OLDSMOBILE">OLDSMOBILE</option>
		<option value="OPEL">OPEL</option>
		<option value="PACKARD">PACKARD</option>
		<option value="PANHARD">PANHARD</option>
		<option value="PANOZ">PANOZ</option>
		<option value="PEUGEOT">PEUGEOT</option>
		<option value="PLYMOUTH">PLYMOUTH</option>
		<option value="PONTIAC">PONTIAC</option>
		<option value="PORSCHE">PORSCHE</option>
		<option value="QVALE">QVALE</option>
		<option value="RELIANT">RELIANT</option>
		<option value="RENAULT">RENAULT</option>
		<option value="RILEY">RILEY</option>
		<option value="ROLLS-ROYCE">ROLLS ROYCE</option>
		<option value="ROVER">ROVER</option>
		<option value="SAAB">SAAB</option>
		<option value="SABRA">SABRA</option>
		<option value="SALEEN">SALEEN</option>
		<option value="SATURN">SATURN</option>
		<option value="SCION">SCION</option>
		<option value="SHELBY">SHELBY</option>
		<option value="SIMCA">SIMCA</option>
		<option value="SMART">SMART</option>
		<option value="STERLING">STERLING</option>
		<option value="STREET-ROD">STREET ROD</option>
		<option value="STUDEBAKER">STUDEBAKER</option>
		<option value="SUBARU">SUBARU</option>
		<option value="SUNBEAM">SUNBEAM</option>
		<option value="SUZUKI">SUZUKI</option>
		<option value="TOYOTA">TOYOTA</option>
		<option value="TRIUMPH">TRIUMPH</option>
		<option value="VAUXHALL">VAUXHALL</option>
		<option value="VOLKSWAGEN">VOLKSWAGEN</option>
		<option value="VOLVO">VOLVO</option>
		<option value="WORKHORSE">WORKHORSE</option>
		<option value="YUGO">YUGO</option>
</select></td>
<td><input type="text" name="size"></td><td><input type="text" name="family"></td>
<td><input type="hidden" name="engine_get" value="1"></td>
<td><button type="submit">Submit</button></td>

</tr>


</form>



<?php

if(isset($_POST['engine_get'])){
include('includes/tssdb.php');
 
$size = $_POST['size'];
$make = $_POST['make'];
$family = $_POST['family'];
$query = mysql_query("INSERT INTO `app_data_eng` (`id`,`make`,`size`,`family`) VALUES (NULL,'$make','$size','$family')");
}
?>

</table>
</div>

<div style="float:left; clear:left; width:100%">
<?php
echo "<pre>";
print_r(get_defined_vars());
echo "</pre>";


?>
</div>

</body>
</html>
