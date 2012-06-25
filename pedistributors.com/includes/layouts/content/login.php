<?php
if(isset($_GET['a']) && $_GET['a'] == "reminder"){
	include('includes/layouts/content/login/reminder.php');
}else{
	include('includes/layouts/content/login/login.php');
}
/*
if($_SERVER['REMOTE_ADDR'] == '192.168.1.150'){
echo $_SESSION['returnu'];
  $crlf=chr(13).chr(10);
  $br='<br />'.$crlf;
  $p='<br /><br />'.$crlf;

  foreach ($_SERVER as $key => $datum)
  {
    echo $key.' : '.$datum.$br;
  }

  echo $p;

  exit;
} */
/*if($_SERVER['REMOTE_ADDR'] == "192.168.1.150")
{

print_r(get_defined_vars());
}*/
?>