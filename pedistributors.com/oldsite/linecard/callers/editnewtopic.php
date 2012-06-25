<?php
require("../includes/global.php");

// run authoriser
$usr->auth(1);

// call function
endcaller(editnewtopic($_GET["newtopicid"], $_POST["title"], $_POST["email"], $_POST["topicid"], $_POST["description"]));
?>