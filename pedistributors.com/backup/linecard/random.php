<?php
require("includes/global.php");

$sql = "SELECT * FROM " . $dbprefix . "links ORDER BY rand() LIMIT 0, 1";
$rec = $db->execute($sql);
if ($rec->rows < 1){ die("There are no links in the database!"); }

Header("Location: " . $rec->fields["url"]);
Echo('<a href="' . $rec->fields["url"] . '">' . $rec->fields["url"] . '</a>');
?>