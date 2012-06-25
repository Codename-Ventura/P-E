<?php
if ($error_req == "0"){
	include('review_form.php');
	exit();
	}
	else {
	?>

<center>There are <?php echo $error_ct; ?> errors in your form.
<br>
There are <?php echo $error_req; ?> required fields that are missing<br>
Please click <a href=# onClick="ShowHide('resubmit')">here</a> to review your form and try again
<?php
}
?>

</center>