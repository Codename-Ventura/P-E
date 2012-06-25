<?php 
include('includes/vagoo.php');
$userip = $_SERVER['REMOTE_ADDR'];
$thispage = explode('?',$_SERVER['REQUEST_URI']);
$thispage = $thispage[0];
$page = $_SERVER['HTTP_HOST'].$thispage;
$date = date('m-d-Y');
$time = strftime('%r', time());
$addcount = mysql_query("INSERT INTO page_log (page, ip, time, date) VALUES ('$page', '$userip', '$time', '$date')");
?>

<table id="Table_01" width="600" height="704" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="2" width="398" height="257">
			<div id="petv_intro">
            	<h1>Ms. Magnaflow...</h1>
                <p>Well...  after a few weeks break from P&E TV, we are back with an all out showstopper.  Or at the very least a heart stopper.  If you have any history of a heart condition, we recommend you not watch this video of the beautiful Jocelyn Ireland, better known as Miss Magnaflow herself.  Please enjoy... responsibly.</p><br>
                
                
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            </td>
		<td colspan="2" rowspan="2">
			<img src="images/petv/Untitled-3_02.gif" width="202" height="335" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/petv/Untitled-3_03.gif" width="398" height="78" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/petv/Untitled-3_04.gif" width="38" height="322" alt=""></td>
		<td colspan="2" width="440" height="322">
<param name="movie" value="msmag.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" />	<embed src="msmag_f.swf" quality="high" bgcolor="#ffffff" width="440" height="322" name="msmedia" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></td>
		<td rowspan="2" width="122" height="368" background="images/petv/Untitled-3_06.gif">
        <img src="images/petv/up_chan.gif">
        <img src="images/petv/channel.gif">
        <span onMouseOver="this.style.cursor='pointer';" onClick="javascript:ajaxpage('060009.htm', 'petv');"><img src="images/petv/down_chan.gif"></span>
        
        
        <span onMouseOver="this.style.cursor='pointer';" onClick="jQuery('#petv').slideUp(1000);"><img src="images/petv/power_button.gif"></span>
			</td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="images/petv/Untitled-3_07.gif" width="478" height="46" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/petv/spacer.gif" width="38" height="1" alt=""></td>
		<td>
			<img src="images/petv/spacer.gif" width="360" height="1" alt=""></td>
		<td>
			<img src="images/petv/spacer.gif" width="80" height="1" alt=""></td>
		<td>
			<img src="images/petv/spacer.gif" width="122" height="1" alt=""></td>
	</tr>
    <tr>
    <td colspan="4">
    	<div style="color:#FF0000; font-size:18px; padding:1em 0 0 0">Send us your videos...</div>
   		<div style="color:#CCCCCC; padding:1em 0 0 0">We need your products videos.  We are always looking for fresh new videos to incorporate into our P&E TV segments.  If you would like to see your company's videos displayed here on P&E TV, please <a href="mailto:jjames@pedistributors.com">send an email to our webmaster</a>.  Please include links to your videos, or detailed download instructions to where your videos are stored.</div>
    </td></tr>
</table>