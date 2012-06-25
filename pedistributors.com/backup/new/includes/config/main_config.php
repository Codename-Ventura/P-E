<?php

ini_set('display_errors', 0);

$_SESSION['configuration'] = array();
$_SESSION['configuration']['layouts']['dir_location'] = "includes/layouts/content/";
$_SESSION['configuration']['modules']['dir_location'] = "includes/layouts/modules/";

define(INCOMING_QUEUE, "/mnt/web_in");
define(OUTGOING_QUEUE, "/mnt/web_out");

?>