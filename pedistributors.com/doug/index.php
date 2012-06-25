<?php
//Script for Doug Boot of Data Conversion Services
//Example of Pipe Delimited File Handling
//Begin with file upload and parse data within CSV (Default = *Pipe Delimited* data in this instance)

//Create by Jonathan James (jonathanljames@gmail.com) - May 5, 2010

function process_file($filename,$delimiter){
//Takes file input

	$contents_rows = array();
	$contents = file_get_contents($filename);
	$contents = explode("\n",$contents);
	foreach($contents as $k=>$v){
		$contents_rows[$k] = explode($delimiter,$v);
		} 
	
	
	return $contents_rows;
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style type="text/css">

<!--

div{
width:50%;
margin:1em auto 0 auto;
padding:1em;
border:1px #000000 solid;
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:18px;

}

input{
padding:1em;

}
-->


</style>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Example - Processing a character delimited file</title>
</head>

<body>

<form method="POST" enctype="multipart/form-data">
<div>
Choose your file below.  If no file is chosen, a default file will be used. <br />
To download the default file and/or to view an explanation of its structure, click <a href="datafile.php" target="_blank">here</a>.  <br />
<br />
If you choose to use a file of your own, you must specify the type of delimiter the file is using.  The default value is "pipe" (which is this character '|').  The other 2 most common delimiters are comma and semi-colon.  If you use a file that uses either of the latter 2 delimiters, you must change the value in the box labeled "delimter" below.<br />

<input type="file" name="testfile" /><br />


</div>

<div>
DELIMITER<br />
If you are not using your own file, or your file is "PIPE DELIMITED", then simply skip this step.  Otherwise choose the delimiter required to process your file.<br />


<select name="delimiter">
<option value="|">| (Pipe)</option>
<option value=";">; {Semi-Colon)</option>
<option value=",">, (Comma)</option>
</select>

</div>


<div>
<input type="hidden" name="process" value="1" />
<input type="submit" value="Process File">
</div>


</form>

<?php

if(isset($_POST['process'])){

?>
<div>
<?php
	
	if(empty($_FILES['testfile']['name'])){
		echo "Using Default File<br>";
		$file_contents = process_file('datafiles/datafile.csv','|');
		}
	else{
		$target_path="userfiles/";
		$datafile = basename( $_FILES['testfile']['name']).".".rand();
		$target_path = $target_path . $datafile;
		if(move_uploaded_file($_FILES['testfile']['tmp_name'],$target_path)){
			$datafile = "userfiles/".$datafile;
			$file_contents = process_file($datafile,$_POST['delimiter']);
			echo "The file '".  basename( $_FILES['testfile']['name']) ."' has been uploaded and processed<br />";
			unlink($datafile);
			}
		else{
			echo "There was an error retrieving your file, please try again";
			}
	}	

if(isset($file_contents) & !empty($file_contents)){
	echo "<table border=1 align=center>";
	foreach($file_contents as $k=>$v){
	echo "<tr>";
		foreach($file_contents[$k] as $k2=>$v2){
		
			if(is_array($file_contents[$k]) & !empty($file_contents[$k])){
			echo "<td>".$v2."</td>";
			}
		
		}
	
	echo "</tr>";
	
	}
	
	}
	echo "</table>"
?>
</div>
<?php

}

?>



</body>

</html>
