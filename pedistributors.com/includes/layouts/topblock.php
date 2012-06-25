
<?php
if(isset($_SESSION['loggedin'])){
?>
<div id="logged_in_box">
	<span style="margin:0; padding:0; float:right;">
    	Logged in as
    </span>
	<span style="margin:0; padding:.0 0 .5em 0; float:right; clear:both; font-size:12px">
		<?php echo $_SESSION['loggedin']; ?>
    </span>
	<span style="margin:0; padding:0; float:right; clear:both;">
    	<?php
        if(!empty($_SESSION['shopping_cart'])){?>
        <a href="index.php?p=cart"> <?php echo count($_SESSION['shopping_cart']);?> Item(s) in Cart</a>  | 
        <?php
		}
		?>
		<a href="index.php?p=members">Member's Page</a> | <a href="index.php?p=logout">Logout</a>
    </span>


</div>


<?php
}
?>