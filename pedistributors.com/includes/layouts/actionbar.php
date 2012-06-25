<ul>
<?php
if(!isset($_SESSION['loggedin'])){?>
        	<li class="off" onclick="location.href='index.php?p=login';"><span style="background-image:url(images/lock.png); float:left; padding-left:19px; background-repeat:no-repeat"><p class="header" style="color:#FFFF00">Login Here!</p><p class="subtext">Shop, check prices, &amp; more</p></span></li>
<?php }?>
<li class="off" onclick="location.href='index.php?p=home';"><span style="background-image:url(images/home.png); float:left; padding-left:19px; background-repeat:no-repeat"><p class="header">Home</p><p class="subtext">Return to the main page</p></span></li>
<?php
if(!isset($_SESSION['loggedin'])){?>
           	<li class="on" onclick="location.href='index.php?p=register';"><span style="background-image:url(images/check.png); float:left; padding-left:19px; background-repeat:no-repeat"><p class="header">Register</p><p class="subtext">Become a customer</p></span></li>
<?php }?>
<?php
if(isset($_SESSION['loggedin'])){?>
           	<li class="on" onclick="location.href='index.php?p=search';"><span style="background-image:url(images/search.png); float:left; padding-left:27px; background-repeat:no-repeat">
           	<p class="header">Part# Search</p>
           	<p class="subtext">Rapid Order</p></span></li>
<?php }?>
            <li class="on" onclick="location.href='index.php?p=specials';"><span style="background-image:url(images/dollar.png); float:left; padding-left:19px; background-repeat:no-repeat"><p class="header">Specials</p><p class="subtext">This week's deals</p></span></li>
            <li class="on" onclick="location.href='index.php?p=ups';"><span style="background-image:url(images/box.png); float:left; padding-left:27px; background-repeat:no-repeat"><p class="header">Track a Package</p><p class="subtext">UPS package tracking available</p></span></li>
        <?php
if(!empty($_SESSION['shopping_cart'])){?>
           	<li class="on" onclick="location.href='index.php?p=cart';"><span style="background-image:url(images/shopping_cart.png); float:left; padding-left:32px; background-repeat:no-repeat">
           	<p class="header">Shopping Cart</p>
           	<p class="subtext">View Items or Checkout</p></span></li>
<?php }?>	
        </ul>
        