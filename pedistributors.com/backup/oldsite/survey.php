<?php
	if(isset($_POST['action'])){
		include('includes/vagoo.php');
		$often = $_REQUEST['use'];
		$access = $_REQUEST['access'];
		$purpose = $_REQUEST['purpose'];
		$rating = $_REQUEST['rating'];
		$find = $_REQUEST['find'];
		$add = $_REQUEST['add_features'];
		mysql_query("INSERT INTO `survey` VALUES ('$often','$access','$purpose','$rating','$find','$add')");
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style type="text/css">
<!--
	body {
		font-family:Verdana, Arial, Helvetica, sans-serif;
	}


-->

</style>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>P&E Distributors Customer Survey</title>
<meta HTTP-EQUIV="refresh" CONTENT="5; URL=survey.php">
</head>



<body/>

<table cellpadding="15" cellspacing="15" width="100%">
	<tr>
    <td><img src="images/pe_white_logo.jpg" /></td>
    <td style="font-size:24px">Customer Survey</td>
    </tr>
	<tr>
	<td colspan="2" style="text-align:center; font-size:24px">Thank you for your participation</td>
    </tr>
</table>



</body>
</html>
    
    
    
    
    
    <?php
	exit();
	}
	else{
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style type="text/css">
<!--
	body {
		font-family:Verdana, Arial, Helvetica, sans-serif;
	}


-->

</style>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>P&E Distributors Customer Survey</title>
</head>



<body>

<table cellpadding="15" cellspacing="15">
	<form method="post">
	<tr>
    <td><img src="images/pe_white_logo.jpg" /></td>
    <td style="font-size:24px">Customer Survey</td>
    </tr>
	<tr>
	<td style="text-align:right">How often do you use P&E's online ordering system?</td>
    <td>
    	<select name="use">
        	<option value="never">Never</option>
            <option value="1-2">1-2 Times A Week</option>
            <option value="3-4">3-4 Times A Week</option>
            <option value="everyday">Everyday</option>
        </select>
    </td>
    </tr>
	<tr>
	<td style="text-align:right">How do you usually access the internet?</td>
    <td>
    	<select name="access">
        	<option value="dialup">Dial-Up Modem</option>
            <option value="broadband">Broadband Connection (Cable, DSL, etc...)</option>
            <option value="cell">Cellular Network AirCard</option>
            <option value="other">Other/Don't Know</option>
        </select>
    </td>
    </tr>
    <tr>
	<td style="text-align:right">What is your primary purpose for using our Website?</td>
    <td>
    	<select name="purpose">
        	<option value="ordering">Placing Orders</option>
            <option value="availability">Checking Availability</option>
            <option value="pricing">Checking Price</option>
        </select>
    </td>
	</tr>
    <tr>
	<td style="text-align:right">On a scale of 1 (worst) - 10 (best) how would you rate P&E's online ordering system?</td>
    <td>
    	<select name="rating">
        	<option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        	<option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        	<option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </td>
	</tr>
    <tr>
	<td style="text-align:right">Do you usually find what you are looking for?</td>
    <td>
		<input type="radio" name="find" value="yes" />Yes
        <input type="radio" name="find" value="no" />No
    </td>
	</tr>
    <tr>
	<td style="text-align:right">Are there any additional information/features you would like to see on the website?</td>
    <td>
		<textarea cols="20" rows="5" name="add_features"></textarea>
    </td>
	</tr>
    <tr>
    <td colspan="2" style="text-align:center"><button type="submit">Submit</button></td>
    </tr>
    <input type="hidden" name="action" value="submit" />
    </form>
</table>



</body>
</html>
<?php } ?>
