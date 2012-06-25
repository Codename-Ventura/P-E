<HTML><!-- InstanceBegin template="/Templates/templateMAIN2.dwt" codeOutsideHTMLIsLocked="false" -->
<HEAD>



<meta name="verify-v1" content="eOtsc93Z6G8ZtqbIrSPHPULO8N4PzUZ6sOWCQC2k1Ao=" />
<meta name="description" content="P&E Distributors is one of the largest warehouse distributors of high end auto parts in the United States.  With over 50 years of experience in the auto parts industry, P&E Distributors has become a cornerstone of the aftermarket auto parts foundation.  P&E offers an extensive array of parts, a large delivery area, and unbeatable customer service.  Shop online today!"></meta>
<meta name="keywords" content=" auto parts, auto, cars, trucks, suvs, sema, automotive, parts distributors, car parts, performance, hot rods, audio, stereo, exhaust, nos, drive, tires, wheels, gears, speed,"></meta>

<!-- InstanceBeginEditable name="EditRegion3" -->



<script type="text/javascript">

function loadandslide(){
	ajaxpage('tvload.htm', 'tvhead');	
	ajaxpage('now.php', 'petv');
	setTimeout("jQuery('#petv').slideDown(1000)",3000);
	setTimeout("ajaxpage('tvhead.htm', 'tvhead')",4000);
	}
</script>

<script type="text/javascript">

function watchvid(){
	jQuery('#semavid').slideToggle(1000);
	}
</script>

<script type="text/javascript">

function closevid(){
	ajaxpage('openvid.htm', 'oc_vid');
	jQuery('#semavid').slideToggle(1000);
	}
</script>


<script type="text/javascript">


var bustcachevar=1
var loadedobjects=""
var rootdomain="http://"+window.location.hostname
var bustcacheparameter=""

function ajaxpage(url, containerid){
var page_request = false
if (window.XMLHttpRequest) // if Mozilla, Safari etc
page_request = new XMLHttpRequest()
else if (window.ActiveXObject){ // if IE
try {
page_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
page_request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
page_request.onreadystatechange=function(){
loadpage(page_request, containerid)
}
if (bustcachevar) //if bust caching of external page
bustcacheparameter=(url.indexOf("?")!=-1)? "&"+new Date().getTime() : "?"+new Date().getTime()
page_request.open('GET', url+bustcacheparameter, true)
page_request.send(null)
}

function loadpage(page_request, containerid){
if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(containerid).innerHTML=page_request.responseText
}

function loadobjs(){
if (!document.getElementById)
return
for (i=0; i<arguments.length; i++){
var file=arguments[i]
var fileref=""
if (loadedobjects.indexOf(file)==-1){
if (file.indexOf(".js")!=-1){ 
fileref=document.createElement('script')
fileref.setAttribute("type","text/javascript");
fileref.setAttribute("src", file);
}
else if (file.indexOf(".css")!=-1){ 
fileref=document.createElement("link")
fileref.setAttribute("rel", "stylesheet");
fileref.setAttribute("type", "text/css");
fileref.setAttribute("href", file);
}
}
if (fileref!=""){
document.getElementsByTagName("head").item(0).appendChild(fileref)
loadedobjects+=file+" "
}
}
}

</script>

<script src="scripts/jquery.js" language="javascript"></script>
<script language="javascript">AC_FL_RunContent = 0;</script>
<script src="AC_RunActiveContent.js" language="javascript"></script>
<script type="text/javascript">


var bustcachevar=1
var loadedobjects=""
var rootdomain="http://"+window.location.hostname
var bustcacheparameter=""

function ajaxpage(url, containerid){
var page_request = false
if (window.XMLHttpRequest) // if Mozilla, Safari etc
page_request = new XMLHttpRequest()
else if (window.ActiveXObject){ // if IE
try {
page_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
page_request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
page_request.onreadystatechange=function(){
loadpage(page_request, containerid)
}
if (bustcachevar) //if bust caching of external page
bustcacheparameter=(url.indexOf("?")!=-1)? "&"+new Date().getTime() : "?"+new Date().getTime()
page_request.open('GET', url+bustcacheparameter, true)
page_request.send(null)
}

function loadpage(page_request, containerid){
if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(containerid).innerHTML=page_request.responseText
}

function loadobjs(){
if (!document.getElementById)
return
for (i=0; i<arguments.length; i++){
var file=arguments[i]
var fileref=""
if (loadedobjects.indexOf(file)==-1){
if (file.indexOf(".js")!=-1){ 
fileref=document.createElement('script')
fileref.setAttribute("type","text/javascript");
fileref.setAttribute("src", file);
}
else if (file.indexOf(".css")!=-1){ 
fileref=document.createElement("link")
fileref.setAttribute("rel", "stylesheet");
fileref.setAttribute("type", "text/css");
fileref.setAttribute("href", file);
}
}
if (fileref!=""){
document.getElementsByTagName("head").item(0).appendChild(fileref)
loadedobjects+=file+" "
}
}
}

</script>

<TITLE>P&amp;E Distributors, Inc. - Home</TITLE>
<meta name="description" content="P&E Distributors is one of the largest warehouse distributors of high end auto parts in the United States.  With over 50 years of experience in the auto parts industry, P&E Distributors has become a cornerstone of the aftermarket auto parts foundation.  P&E offers an extensive array of parts, a large delivery area, and unbeatable customer service.  Shop online today!"></meta>
<meta name="keywords" content="distributor, wholesale, automotive, accessories "></meta>
<SCRIPT type="text/javascript">

var month = '2'; // 1 through 12 or '*' within the next month, '0' for the current month
var day = '28';   // day of month or + day offset
var dow = 0;     // day of week sun=1 sat=7 or 0 for whatever day it falls on
var hour = 14;    // 0 through 23 for the hour of the day
var min = 0;    // 0 through 59 for minutes after the hour
var tz = 10;     // offset in hours from UTC to your timezone
var lab = 'cd';  // id of the entry on the page where the counter is to be inserted

function start() {displayCountdown(setCountdown(month,day,hour,min,tz),lab);}
loaded(lab,start);

// Countdown Javascript
// copyright 20th April 2005, 1st November 2009 by Stephen Chapman
// permission to use this Javascript on your web page is granted
// provided that all of the code in this script (including these
// comments) is used without any alteration
// you may change the start function if required
var pageLoaded = 0; window.onload = function() {pageLoaded = 1;}
function loaded(i,f) {if (document.getElementById && document.getElementById(i) != null) f(); else if (!pageLoaded) setTimeout('loaded(\''+i+'\','+f+')',100);
}
function setCountdown(month,day,hour,min,tz) {var m = month; if (month=='*') m = 0;  var c = setC(m,day,hour,tz); if (month == '*' && c < 0)  c = setC('*',day,hour,tz); return c;} function setC(month,day,hour,tz) {var toDate = new Date();if (day.substr(0,1) == '+') {var day1 = parseInt(day.substr(1));toDate.setDate(toDate.getDate()+day1);} else{toDate.setDate(day);}if (month == '*')toDate.setMonth(toDate.getMonth() + 1);else if (month > 0) { if (month <= toDate.getMonth())toDate.setFullYear(toDate.getFullYear() + 1);toDate.setMonth(month-1);}
if (dow >0) toDate.setDate(toDate.getDate()+(dow-1-toDate.getDay())%7);
toDate.setHours(hour);toDate.setMinutes(min-(tz*60));toDate.setSeconds(0);var fromDate = new Date();fromDate.setMinutes(fromDate.getMinutes() + fromDate.getTimezoneOffset());var diffDate = new Date(0);diffDate.setMilliseconds(toDate - fromDate);return Math.floor(diffDate.valueOf()/1000);}
function displayCountdown(countdn,cd) {if (countdn < 0) document.getElementById(cd).innerHTML = "Sorry, you are too late."; else {var secs = countdn % 60; if (secs < 10) secs = '0'+secs;var countdn1 = (countdn - secs) / 60;var mins = countdn1 % 60; if (mins < 10) mins = '0'+mins;countdn1 = (countdn1 - mins) / 60;var hours = countdn1 % 24;var days = (countdn1 - hours) / 24;document.getElementById(cd).innerHTML = days+' days '+hours+' hours '+mins+' minutes '+secs+' seconds ';setTimeout('displayCountdown('+(countdn-1)+',\''+cd+'\');',999);}}
</SCRIPT>

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
	<!-- InstanceBeginEditable name="EditRegion4" --><tr><td colspan="2" align="center"><div id="tvhead"><span onMouseOver="this.style.cursor='pointer';" onClick="loadandslide();"><img src="images/petv_tvset.jpg"></span></div>
	  
      
      <div style="display:none; padding-bottom:2em; padding-top:2em;" id="petv"></div></td></tr><!-- InstanceEndEditable -->
    <TR>
      <TD WIDTH=457 valign="top" ><!-- InstanceBeginEditable name="EditRegion1" -->  
        <table width=457 border=0 cellpadding=0 cellspacing=0>
          <!--DWLayoutTable-->
          <tr> 
            <td height="120" width="457" valign="top" bgcolor="000000"><p style="z-index:999">
              <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="457" height="118" id="header" align="middle">
	<param name="wmode" value="opaque" />
  <PARAM NAME="Movie" VALUE="flash/header.swf">
  <PARAM NAME="quality" VALUE="high">
  <PARAM NAME="play" VALUE="true">
  <EMBED SRC="flash/header.swf" WIDTH="457" HEIGHT="118" QUALITY="high"></EMBED>
              </OBJECT>
</p>            </td>
          </tr>
          
          
          

		  <tr> 
            <td valign="top" bgcolor="000000" alt=""> <div class="style3" style="padding-top:5px; padding-left:14px "></div></td>
          </tr>
          <tr> 
            <td valign="top" alt="">
         

              <br>
              
              <div style="background:#FFFFFF; margin-left:2em; width:400px; margin-right:2em; margin-top:.5em"><div class="tr"><div class="tl"><div class="br"><div class="bl"><div style="padding:9px; text-align:center">
<a href="/new"><img src="images/winner.jpg" border="0"></a>
<div id="oc_vid" style="margin-bottom:1em">We are letting you preview our new site now! We have lots of new features, a new look, more information and news, and a new Year, Make, and Model part search. Check it now!</div>


<div id="semavid" style="display:none; text-align:center">      
<object width="390" height="309"><param name="movie" value="http://www.youtube.com/v/M334Gv62sF0&hl=en_US&fs=1&rel=0&border=1"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/M334Gv62sF0&hl=en_US&fs=1&rel=0&border=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="390" height="309"></embed></object>
</div>

</div></div></div></div></div></div>      </td>
          </tr>
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
                    <div class="style6" style="padding-left:8px; padding-right:8px; padding-bottom:3px;"><!-- InstanceBeginEditable name="EditRegion11" --><?php
function RemoveExtension($strName) 
{ 
     $ext = strrchr($strName, '.'); 

     if($ext !== false) 
     { 
         $strName = substr($strName, 0, -strlen($ext)); 
     } 
     return $strName; 
}  
?>
<?php
$count = 0;
if ($handle = opendir('flip_ads2')) {
	$retval = array();
    while (false !== ($file = readdir($handle))) {
		if (($file <> ".") && ($file <> "..")) {
        $retval[$count] = $file;
		$count = $count + 1;
			}
    }

    closedir($handle);
}
shuffle($retval);
$current_image = $retval[0];
$name = RemoveExtension($current_image);
?>
<a href="http://www.pedistributors.com/news.php?subaction=showfull&id=<?php echo $name; ?>"><img src="flip_ads2/<?php echo $current_image; ?>"></a>
<br>
<a href="http://www.pedistributors.com/vendor_newprod.php" class="style2">See More New Products</a>
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
<!-- InstanceEnd --></HTML>