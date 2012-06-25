<ul>
    	<li><a href="index.php" <?php if($x == "main"){ echo 'class="active"'; } ?>>Home</a></li> <span style="font-weight:600">/</span>
        <li><a href="index.php?p=schedule" <?php if($x == "schedule"){ echo 'class="active"'; } ?>>Schedule</a></li> <span style="font-weight:600">/</span> 
        <li><a href="index.php?p=venue" <?php if($x == "venue"){ echo 'class="active"'; } ?>>Venue</a></li> <span style="font-weight:600">/</span> 
        <li><a href="index.php?p=events" <?php if($x == "events"){ echo 'class="active"'; } ?>>Events</a></li> 
        <li style="background-color:#000000; color:#CCCCCC; text-align:center; padding-right:.25em; padding-left:.25em; margin-left:1em"><a href="index.php?p=register" <?php if($x == "register"){ echo 'class="active"'; } ?> style="color:#CCCCCC">Register</a></li>
        
    </ul> 