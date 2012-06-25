<script language="JavaScript">

function loadPage(list) {

  location.href=list.options[list.selectedIndex].value

}

</script>

<?php
include('includes/linedb.php');



if(isset($_GET['line'])){
	$t = $_GET['line'];}

switch ($t) {
	case 'truck':
		$type = "truck";
		break;
	case 'audio':
		$type = "audio";
		break;
	case 'performance':
		$type = "performance";
		break;
	default:
		$type = "all";
		break;
}
	
	

$alphabet = array ("A","B","C","D","E","F","G","H","I","J","K","L","M",
"N","O","P","Q","R","S","T","U","V","W","X","Y","Z");


$lines = mysql_query("SELECT * FROM `linecard` ORDER BY `name`");
$all_lines = array();
while($row = mysql_fetch_array($lines)){
	$all_lines[$row['id']] = $row;
	$all_lines[$row['id']]['type'] = explode("|",$row['type']);
	
	
}

$lines_2['all'] = array();
$lines_2['all'] = $all_lines;
$lines_2['audio'] = array();
$lines_2['performance'] = array();
$lines_2['truck'] = array();
$lines_2_first['audio'] = array();
$lines_2_first['truck'] = array();
$lines_2_first['performance'] = array();
$lines_2_first['all'] = array();
$lines_2_first['all'] = $alphabet;
foreach($all_lines as $k){

if(is_array($k['type'])){
if(in_array("TD",$k['type'])){
	$lines_2['truck'][$k['id']] = $k;

if(is_array($lines_2_first['truck'])){
	if(!in_array(substr($k['name'],0,1),$lines_2_first['truck'])){
		$lines_2_first['truck'][] .= substr($k['name'],0,1);
		}
	}
	
	}
if(in_array("P",$k['type'])){
	$lines_2['performance'][$k['id']] = $k;


if(is_array($lines_2_first['performance'])){
	if(!in_array(substr($k['name'],0,1),$lines_2_first['performance'])){
		$lines_2_first['performance'][] .= substr($k['name'],0,1);
		}
	}	
	
	
	}
if(in_array("AV",$k['type'])){
	$lines_2['audio'][$k['id']] = $k;
	
if(is_array($lines_2_first['audio'])){
	if(!in_array(substr($k['name'],0,1),$lines_2_first['audio'])){
		$lines_2_first['audio'][] .= substr($k['name'],0,1);
		}
	}	
	
	
	
	}
}
}

?>

<HTML><!-- InstanceBegin template="/Templates/templateMAIN2.dwt" codeOutsideHTMLIsLocked="false" -->
<HEAD>



<meta name="verify-v1" content="eOtsc93Z6G8ZtqbIrSPHPULO8N4PzUZ6sOWCQC2k1Ao=" />
<meta name="description" content="P&E Distributors is one of the largest warehouse distributors of high end auto parts in the United States.  With over 50 years of experience in the auto parts industry, P&E Distributors has become a cornerstone of the aftermarket auto parts foundation.  P&E offers an extensive array of parts, a large delivery area, and unbeatable customer service.  Shop online today!"></meta>
<meta name="keywords" content=" auto parts, auto, cars, trucks, suvs, sema, automotive, parts distributors, car parts, performance, hot rods, audio, stereo, exhaust, nos, drive, tires, wheels, gears, speed,"></meta>

<!-- InstanceBeginEditable name="EditRegion3" -->
<style type="text/css">
table {
background-color: #FFFFFF;
}</style>
<TITLE>P&amp;E Distributors, Inc. - Online Line Card</TITLE> </TITLE>
<meta name="description" content="We offer more than 350 of the automotive aftermarkets greatest products.  View our Online Line Card and you will see that we only sell the best."></meta>
<meta name="keywords" content="line card, vendors, lines, brands, companies, distributor, wholesale, automotive, accessories"></meta>

<!-- InstanceEndEditable --> 
<!--sphider_noindex-->
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="copyright" content="All text, images and code are copyright by P&E Distributors, Inc.  Any copying in part or in whole is not allowed without written consent from P&amp;E Distributors, Inc.">
<meta name="robots" content="index, follow">
<link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="icon" href="favicon.ico" type="image/vnd.microsoft.icon" />
<link href="css_styles/pestyles02.css" rel="stylesheet" type="text/css">
<link href="css_styles/pemenu.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://www.pedistributors.com/cutenews/popup.js"></script>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-10063215-1");
pageTracker._setDomainName(".pedistributors.com");
pageTracker._trackPageview();
} catch(err) {}</script>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script type="text/javascript"><!--//--><![CDATA[//><!--

startList = function() {
	if (document.all&&document.getElementById) {
		navRoot = document.getElementById("nav");
		for (i=0; i<navRoot.childNodes.length; i++) {
			node = navRoot.childNodes[i];
			if (node.nodeName=="LI") {
				node.onmouseover=function() {
					this.className+=" over";
				}
				node.onmouseout=function() {
					this.className=this.className.replace(" over", "");
				}
			}
		}
	}
}
window.onload=startList;

//--><!]]></script>
<!--/sphider_noindex-->
</HEAD>
<BODY BGCOLOR=#FFFFFF TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>
<center>
  <TABLE WIDTH=701 BORDER=0 CELLPADDING=0 CELLSPACING=0 >
    <!--DWLayoutTable-->
    <TR> 
      <TD HEIGHT=120 colspan="4" valign="top" bgcolor="#F5F5F5" ALT=""><table id="Table_01" width="701" height="120" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
		<td rowspan="3">
			<img src="images/Untitled-2_01.jpg" width="460" height="120" alt=""></td>
		<td rowspan="3">
			<img src="images/Untitled-2_02.jpg" width="79" height="120" alt=""></td>
		<td>
			<img src="images/Untitled-2_03.jpg" width="162" height="78" alt=""></td>
	</tr>
	<tr><form class="search" action="http://www.pedistributors.com/sphider/search.php" method="POST">
		<td width="162" height="27" background="images/Untitled-2_04.jpg">
        
			<input class="search" type="text" name="query" id="query" size="15" value="" action="../sphider/include/js_suggest/suggest.php" columns="2" autocomplete="off" delay="1500"><input class="search" name="search" type="submit" value="Go" width="3">
			<input class="search" type="hidden" name="search" value="1"></td></form>
	</tr>
	<tr>
		<td>
			<img src="images/Untitled-2_05.jpg" width="162" height="15" alt=""></td>
	</tr>
</table></td>
    </TR>
    <TR> 
      <td colspan="3" valign="top" background="images/px_top1.jpg" alt="">
        
        <table width="701" border="0" cellpadding="0" cellspacing="0" style="z-index:0; position:relative;">
          <tr> 
            <td width="700" height="20" align="center" valign="middle" bgcolor="#000000">
                        <ul id="nav" class="nav">

	    <li> 
          <div><a href="http://www.pedistributors.com/index.php" class="nav">HOME</a></div>
        </li>
        <li> 
          <div><a href="http://www.pedistributors.com/company.php" class="nav">COMPANY</a></div>
                  <ul>
                    <li><a href="http://www.pedistributors.com/company.php">Company 
                      News</a></li>
                    <li><a href="http://www.pedistributors.com/company_history.php">Our 
                      History</a></li>
                    <li><a href="http://www.pedistributors.com/company_letter.php">Letter 
                      From Donnie</a></li>
                    <li><a href="http://www.pedistributors.com/company_locations.php">Our 
                      Locations</a></li>
                  </ul>
        </li>
	    <li> 
          <div><a href="http://www.pedistributors.com/customer.php">CUSTOMERS</a></div>
                  <ul>
                    <li><a href="http://www.pedistributors.com/customer.php">Customer 
                      News</a></li>
                    <li><a href="http://www.pedistributors.com/customer_new.php">New 
                      Customers</a></li>
                  </ul>
        </li>
	    <li>
          <div><a href="http://www.pedistributors.com/linecard.php">PRODUCTS</a></div>
                  <ul>
                    <li><a href="http://www.pedistributors.com/linecard.php">Line Cards</a></li>
                    <li><a href="http://www.pedistributors.com/vendor_news.php">Vendor 
                      News</a></li>
                    <li><a href="http://www.pedistributors.com/vendor_promos.php">Rebates 
                      &amp; Promotions</a></li>
                    <li><a href="http://www.pedistributors.com/vendor_newprod.php">New 
                      Products</a></li>
                  </ul>
        </li>
	    <li> 
          <div><a href="#">eTOOLS</a></div>
                  <ul>
                    <li><a href="http://store.pedistributors.com/customer/login">Online<br>
                      Ordering</a></li>
                    <li><a target="_blank" href="http://www.catalograck.com/_Signup/WDFirstCall/US.asp?grp=[WPE]">Catalog 
                      Rack.com</a></li>
                    <li><a href="http://www.pedistributors.com/new_catalog">2009 Catalog 
                      Online</a></li>
                    <li><a href="http://www.pedistributors.com/etools_ups.php">UPS 
                      Package Tracking</a></li>
                  </ul>
        </li>

	    <li> 
          <div><a href="http://www.pedistributors.com/contact.php">CONTACT</a></div>
      </li>
      </ul>
	</td>
  </tr>
</table></td>
    </TR>
	<!-- InstanceBeginEditable name="EditRegion4" -->EditRegion4<!-- InstanceEndEditable -->
    <TR>
      <TD WIDTH=457 valign="top" ><!-- InstanceBeginEditable name="EditRegion1" -->
        <table width=457 border=0 cellpadding=0 cellspacing=0>
          <!--DWLayoutTable-->
          <tr> 
            <td width="457" valign="top" bgcolor="#000000"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
          <tr> 
            
                      <td valign="top"><div style="padding-top:10px; padding-right:10px; padding-left:30px; padding-bottom:10px"> 
                <font class="news_homepagehead">Online Line Card </font><br>
                We sell and stock over 350 different manufacturers. We strive 
                to bring our customers only the hottest vendors in the market. 
                The list below is broken down in alphabetical order. If you are 
                looking for a specific vendor, please check to see if we offer 
                it. You can also sort the list by product category by using the 
                drop down menu shown below. Located beside each vendor's name 
                is their corresponding P&amp;E line code, a link to their website 
                home page and a link to their website products listing and/or 
                search page. If you need help using this Online Line Card, <a href="http://www.pedistributors.com/news.php?subaction=showfull&id=1182260620&archive=&start_from=&ucat=2&" class="style2">click 
                here</a> for instructions.<br></script>
<br><CENTER>
  <strong><font color="red">A RED LINE CODE INDICATES A NEW LINE</font></strong><a name="Aname"></a> 
  <form name="form1">VIEW:&nbsp;&nbsp;
  <select name="menu1" onchange="loadPage(this.form.elements[0])">
      <option <?php if($type == "all"){ echo "selected";}?> value="<?php echo $_SERVER['PHP_SELF'];?>?line=all">ALL LINES</option>
      <option value="<?php echo $_SERVER['PHP_SELF'];?>?line=truck" <?php if($type == "truck"){ echo "selected";}?>>Truck &amp; Diesel Accessories</option>
      <option value="<?php echo $_SERVER['PHP_SELF'];?>?line=performance" <?php if($type == "performance"){ echo "selected";}?>>Performance Products &amp; Hard Parts</option>
      <option value="<?php echo $_SERVER['PHP_SELF'];?>?line=audio" <?php if($type == "audio"){ echo "selected";}?>>Mobile Audio/Video/Security</option>
    </select>
</form>
                    <a href="#Aname" class="style2">A</a> - <a href="#Bname" class="style2">B</a> 
                    - <a href="#Cname" class="style2">C</a> - <a href="#Dname" class="style2">D</a> 
                    - <a href="#Ename" class="style2">E</a> - <a href="#Fname" class="style2">F</a> 
                    - <a href="#Gname" class="style2">G</a> - <a href="#Hname" class="style2">H</a> 
                    - <a href="#Iname" class="style2">I</a> - <a href="#Jname" class="style2">J</a> 
                    - <a href="#Kname" class="style2">K</a> - <a href="#Lname" class="style2">L</a> 
                    - <a href="#Mname" class="style2">M</a> - <a href="#Nname" class="style2">N</a> 
                    - <a href="#Oname" class="style2">O</a><br>
                    <a href="#Pname" class="style2">P</a> - <a href="#Qname" class="style2">Q</a> 
                    - <a href="#Rname" class="style2">R</a> - <a href="#Sname" class="style2">S</a> 
                    - <a href="#Tname" class="style2">T</a> - <a href="#Uname" class="style2">U</a> 
                    - <a href="#Vname" class="style2">V</a> - <a href="#Wname" class="style2">W</a> 
                    - <a href="#Xname" class="style2">X</a> - <a href="#Yname" class="style2">Y</a> - <a href="#Zname" class="style2">Z</a>
                    - <a href="#top" class="style2">BACK TO TOP</a> 
  <br>
      <?php
	   foreach($alphabet as $v){ 
       	if(in_array($v,$lines_2_first[$type])){
		
		?>
        
       <div style="padding:1em 0 1em 0; float:left">
	  <table width="390" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="float:left">
          
          <tr> 
      <td width="5%" align="center" valign="top" nowrap><font color="#990000" size="3"><a name="<?php echo $v;?>name"></a><strong><?php echo $v;?></strong></font></td>
      <td width="80%" valign="top">&nbsp;</td>
      <td width="5%" align="center" valign="top" nowrap>&nbsp;</td>
      <td width="10%" align="center" valign="top" nowrap>&nbsp;</td>
    </tr>
      <?php 
	 
	  foreach($lines_2[$type] as $k){
	  	if(substr($k['name'],0,1) == $v){
	  ?>
      
      <tr> 
      <td align="center" valign="top" nowrap bgcolor="#f7f7f7" style="border-bottom: thin solid #CCCCCC"> 
        <div style="padding:5px"><font color="#000000"><?php echo $k['line'];?></font></div></td>
      <td valign="top" style="border-bottom: thin solid #CCCCCC"><div style="padding:5px"><strong><?php echo $k['name'];?></strong><br>
          <?php echo $k['descr'];?></div></td>
      <td align="center" valign="top" nowrap bgcolor="#f7f7f7" style="border-bottom: thin solid #CCCCCC; border-right: thin solid #ffffff"> 
        <div style="padding:5px"><a href="<?php if(!empty($k['url'])){ echo $k['url'];}?>" class="lookuplink" target="_blank">WEB<BR>
          SITE</a></div></td>
      <td valign="top" nowrap bgcolor="#f7f7f7" style="border-bottom: thin solid #CCCCCC; text-align:center"><div style="padding:5px"><a href="<?php if(!empty($k['lookup'])){ echo $k['lookup'];}?>" class="lookuplink" target="_blank"><?php if(!empty($k['lookup'])){ echo "PARTS<BR>LOOKUP";}?></a></div></td>
    </tr>
    <?php } } 
	?>
    <tr><td colspan="4" style="text-align:center"><a href="#Aname" class="style2">A</a> - <a href="#Bname" class="style2">B</a> 
                    - <a href="#Cname" class="style2">C</a> - <a href="#Dname" class="style2">D</a> 
                    - <a href="#Ename" class="style2">E</a> - <a href="#Fname" class="style2">F</a> 
                    - <a href="#Gname" class="style2">G</a> - <a href="#Hname" class="style2">H</a> 
                    - <a href="#Iname" class="style2">I</a> - <a href="#Jname" class="style2">J</a> 
                    - <a href="#Kname" class="style2">K</a> - <a href="#Lname" class="style2">L</a> 
                    - <a href="#Mname" class="style2">M</a> - <a href="#Nname" class="style2">N</a> 
                    - <a href="#Oname" class="style2">O</a><br>
                    <a href="#Pname" class="style2">P</a> - <a href="#Qname" class="style2">Q</a> 
                    - <a href="#Rname" class="style2">R</a> - <a href="#Sname" class="style2">S</a> 
                    - <a href="#Tname" class="style2">T</a> - <a href="#Uname" class="style2">U</a> 
                    - <a href="#Vname" class="style2">V</a> - <a href="#Wname" class="style2">W</a> 
                    - <a href="#Xname" class="style2">X</a> - <a href="#Yname" class="style2">Y</a> - <a href="#Zname" class="style2">Z</a>
                    - <a href="#top" class="style2">BACK TO TOP</a></td></tr>
    <?php
	
	
	}
}?>
    
    </table>
    </div>
      
              </div>
</td></tr>
        </table>
        <!-- InstanceEndEditable --></TD>
		
		<!--sphider_noindex-->
		
      <TD WIDTH=244 valign="top" bgcolor="#000000" ALT="" > <TABLE WIDTH=244 BORDER=0 CELLPADDING=0 CELLSPACING=0>
          <TR> 
            <TD height="40" valign="top" background="images/menutopper_onlineordering.jpg">
<div align="right" style="padding-right:30px" class="style6"><font color="#FFFFFF"><?PHP echo date("M d, Y");?></font></div></TD>
          </TR>
          <TR> 
            <TD WIDTH=244 ALT="" valign="top"> <table width=244 border=0 cellpadding=0 cellspacing=0>
                <tr> 
                  <td background="images/lpx.jpg"> <img src="images/spacer.gif" alt="" width=12 height="8"></td>
                  <td background="images/px2.jpg" bgcolor="#F7F7F7" style="background-position:top; background-repeat:repeat-x " width=220 alt=""> 
                    <div style="padding-left:7px"> 
                      <table width=206 border=0 cellpadding=0 cellspacing=0>
                        <!--DWLayoutTable-->
                        
                        <form id="listBuilderForm" name="login_form" action="http://store.pedistributors.com/customer/login" method="POST" >
                          <input type="hidden" name="PHPSESSID" value="45f3aff64176536be12069595bd341bb" />
                          <input type="hidden" name="return_url" value="http://store.pedistributors.com/">
                          <tr> 
                            <td width="166" valign="top"><div class="style6" align="right" style="padding-right:13px; padding-bottom:3px;">User 
                                I.D. #: <input type="text" name="username" value="" size="10" maxlength="13" class="style6"><br>
                                Password: <input type="password" name="password" value="" size="10" maxlength="13" class="style6">
                              </div></td>
                            <td width="40"><div>
                                <input type="image"  src="images/gobutton.jpg" name="Log In" width="30" height="30" border="0"> 
                              </div></td>
                          </tr>
                          <tr>
                          
                            <td height=15 colspan="2" valign="top"><div align="center"><a href="http://store.pedistributors.com/customer/reminder">
                            
                            
                            <font size="-2">Forget your password?</font></a><br><br><a href="register.php" class="style2" \>Click Here to Sign Up!</a></div></td>
                          </tr>
                        </form>
                        
                      </table>
                   </td>
                  <td background="images/rpx.jpg"> <img src="images/spacer.gif" alt="" width=12 height="8"></td>
                </tr>
              </table></TD>
          </TR>
          <TR> 
            <TD background="images/menutopper_featured.jpg"> <IMG SRC="images/spacer.gif" WIDTH=244 HEIGHT=52 ALT=""></TD>
          </TR>
          <TR> 
            <TD WIDTH=244 HEIGHT=100 ALT="" valign="top"> <table width=244 border=0 cellpadding=0 cellspacing=0>
                <tr> 
                  <td background="images/lpx.jpg"> <img src="images/spacer.gif" width=12 height=100 alt=""></td>
                  <td background="images/px2.jpg" bgcolor="#F7F7F7" style="background-position:top; background-repeat:repeat-x " width=220 height=100 alt=""> 
                    <div class="style6" style="padding-left:8px; padding-top:3px "> 
                    </div>
                    <div style="padding-left:7px"> 
                      <table width=206 border=0 cellpadding=0 cellspacing=0>
                        <!--DWLayoutTable-->
                        <tr> 
                          <td width=206 align="center" alt="" valign="top"><div class="style6">
                            <p><a href="register.php"><img src="images/featured_signup.jpg" alt="Sign Up Now!"></a><a href="http://www.pedistributors.com/new_catalog/index.php"><img src="images/featured_catalog.jpg"></a></p>
                            <a href="http://store.pedistributors.com/catalog" target="_blank"><img src="images/12vcat.gif" alt="Audio Video Catalog"></a>
                            <a href="http://store.pedistributors.com/catalog/specials" target="_blank"><img src="images/hotdeals.gif" alt="Audio Video Catalog"></a>
                            <p><a href="etools_ups.php"><img src="images/featured_ups_2.jpg" alt="UPS Package Tracking" width="205" height="94"></a><br>
                              <img src="images/spacer.gif" height="1" border="0"><br>
                              <a href="http://www.catalograck.com/_Signup/WDFirstCall/US.asp?grp=[WPE]" target="_blank"><img src="images/CatlogRackbttn.gif" width="203" height="44" border="0"></a>                              </p>
                          </div></td>
                        </tr>
                      </table>
                    </div></td>
                  <td background="images/rpx.jpg"> <img src="images/spacer.gif" width=12 height=100 alt=""></td>
                </tr>
              </table></TD>
          </TR>
          <TR> 
            <TD background="images/menutopper_recentnews.jpg"> <IMG SRC="images/spacer.gif" WIDTH=244 HEIGHT=52 ALT=""></TD>
          </TR>
          <TR> 
            <TD WIDTH=244 ALT="" valign="top"> <TABLE WIDTH=244 BORDER=0 CELLPADDING=0 CELLSPACING=0>
                <TR> 
                  <TD height="100%" background="images/lpx.jpg"> <IMG SRC="images/spacer.gif" WIDTH=12 ALT=""></TD>
                  <TD background="images/px2.jpg" bgcolor="#FeFeFe" style="background-position:top; background-repeat:repeat-x " WIDTH=220 ALT=""> 
                    <div class="style6" style="padding-left:8px; padding-right:8px; padding-bottom:3px;"><!-- InstanceBeginEditable name="EditRegion11" --><?PHP
$template="NewProd-Sideline";
$category = 5;
$number = 5;
$static = TRUE;
$PHP_SELF="news.php";
include("cutenews/show_news.php"); 
?><br><a href="http://www.pedistributors.com/vendor_newprod.php" class="style2">See More New Products</a>
                      <!-- InstanceEndEditable --></div></TD>
                  <TD height="100%" background="images/rpx.jpg"> <IMG SRC="images/spacer.gif" WIDTH=12 ALT=""></TD>
                </TR>
              </TABLE></TD>
          </TR>
        </TABLE>
        <TABLE WIDTH=244 BORDER=0 CELLPADDING=0 CELLSPACING=0>
<TR> 
            <TD background="images/menubottom01.jpg"><IMG SRC="images/spacer.gif" ALT="" WIDTH=244 HEIGHT=22 border="0"></TD>
          </TR>
        </TABLE>
		
		
		</TD>
    </TR>
	
	<!--/sphider_noindex-->
	
    <TR> 
      <TD HEIGHT=110 colspan="3" bgcolor="#000000" ALT="" class="footermenu"> <center>
          <font class="footermenu"><a href="http://www.pedistributors.com/index.php" class="footermenu">HOME</a> 
          | <a href="http://www.pedistributors.com/company.php" class="footermenu">COMPANY</a> | <a href="http://www.pedistributors.com/customer.php" class="footermenu">CUSTOMERS</a> 
          | <a href="http://www.pedistributors.com/vendor_news.php" class="footermenu">PRODUCTS</a> | <a target="_blank" href="http://store.pedistributors.com/customer/login" class="footermenu">eTOOLS</a> 
          | <a href="http://www.pedistributors.com/contact.php" class="footermenu">CONTACT</a><BR>
          <a href="http://www.pedistributors.com/sitemap.php" class="footermenu">SITE 
          MAP</a> | <a href="http://www.pedistributors.com/termsandconditions.php" class="footermenu">TERMS 
          &amp; CONDITIONS</a> | <a href="http://mail.pedistributors.com" class="footermenu">WEB 
          eMAIL</a><br>
          <br></font>
          <a href="http://www.sema.org"><img src="images/semabutton.jpg" width="55" height="30" border="0" alt="Specialty Equipment Market Association (SEMA) Member Company"></a> 
           <a href="http://www.pwa-par.org"><img src="images/pwabutton.jpg" width="55" height="30" border="0" alt="Performance Warehouse Association (PWA) Member Company"></a> &nbsp;&nbsp;
           <a href="http://www.partspro.com"><img src="images/partsprobutton.jpg" width="55" height="30" border="0" alt="AAM Group (Parts Pro and Total Truck Centers) Member Company"></a><br>
          
          <font class="footertext">All information is copyright © 1962-<?PHP print (date("Y")); ?>, P&amp;E 
          Distributors, Inc. Reproduction of any kind in whole or in part is not 
          permitted.</font> 
        </center></TD>
    </TR>
  </TABLE>
</center>
<!-- End ImageReady Slices -->
<map name="Map2">
  <area shape="rect" coords="28,0,56,7" href="http://www.pedistributors.com/etools_penews.php">
</map>
<map name="Map3">
  <area shape="rect" coords="568,99,570,100" href="#">
</map>
</BODY>
<!-- InstanceEnd -->

</HTML>