
<?php
include('includes/functions/linecard.func.php');

/*echo "<pre>";
print_r($all_lines);
echo "</pre>";*/

?>
<script language="JavaScript">

function loadPage(list) {

  location.href=list.options[list.selectedIndex].value

}

</script>
<div class="title">Online Line Card</div>
<p>We sell and stock over 350 different manufacturers. We strive to bring our customers only the hottest vendors in the market. The list below is broken down in alphabetical order. If you are looking for a specific vendor, please check to see if we offer it. You can also sort the list by product category by using the drop down menu shown below. Located beside each vendor's name is their corresponding P&amp;E line code, a link to their website home page and a link to their website products listing and/or search page.</p>
<center>
<form name="form1">VIEW:&nbsp;&nbsp;
  <select name="menu1" onChange="loadPage(this.form.elements[0])">
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
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#FFFFFF" style="float:left">
      <?php
	   foreach($alphabet as $v){ 
       	if(in_array($v,$lines_2_first[$type])){
		
		?>
        
	  
          
          <tr> 
      <td width="5%" align="center" valign="top" nowrap><br>
<font color="#990000" size="3"><a name="<?php echo $v;?>name"></a><strong><?php if($v == "3"){ echo "#";} else{echo $v;}?></strong></font></td>
      <td width="80%" valign="top">&nbsp;</td>
      <td width="5%" align="center" valign="top" nowrap>&nbsp;</td>
      
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
        <div style="padding:5px"><?php if(!empty($k['url'])){?><a href="<?php echo $k['url'];?>" class="lookuplink" target="_blank">WEB<BR>
          SITE</a><?php }?></div></td>
      
    </tr>
    <?php } } 
	?>
    <tr style="width:100%"><td colspan="4" style="text-align:center">
    <div style="width:100%; margin:1em">
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
                    - <a href="#top" class="style2">BACK TO TOP</a><br>
</div>
</td></tr>
    <?php
	
	
	}
}?>
    
    </table>
    </div>
      
</td></tr>
        </table>
</center>