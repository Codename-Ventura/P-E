<?php
require("../includes/global.php");

$usr->signout();

if ($_GET["from"] <> ""){
	redirect($_GET["from"]);
} else {
	redirect("../");
}
?>