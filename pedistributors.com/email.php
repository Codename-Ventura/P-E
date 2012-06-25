<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

require_once('Mail.php');
$from = "Jonathan James <online@pedistributors.com>";
$to = "Jonathan James <mj@pedistributors.com>";
$subject = "Hi!";
$body = "Hi,\n\nHow are you?";

$host = "mail.pedistributors.com";
$username = "online@pedistributors.com";
$password = "online";

$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);



echo "<pre>";
print_r(get_defined_vars());
ECHO "</pre>";

?>

EMAIL