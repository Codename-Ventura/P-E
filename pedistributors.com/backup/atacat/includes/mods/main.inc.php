
	



<table width="750" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td width="750" height="19" align="center" valign="top">
      <?php if ($s == "full") { ?>
      <img src="<?php echo $s . "/" . $retval[$c]; ?>" /></a>
		<?php 
			} 
			else
			{	?>
             <a href="
	  	<?php $count2 = $count * 2; if ($s == "thumbs"){ $slink = "full"; } else { $slink = "thumbs";  } echo "index.php?s=". $slink . "&" . "c=".$count2; ?>"> <img src="<?php echo $s . "/" . $retval_pages[$count]['0']; ?>" /></a>
              <a href="
	  	<?php  $count3 = $count2 + 1; if ($s == "thumbs"){ $slink = "full"; } else { $slink = "thumbs";  } echo "index.php?s=". $slink . "&" . "c=".$count3; ?>"> <img src="<?php echo $s . "/" . $retval_pages[$count]['1']; ?>" /></a>
        <?php } ?>
          


      </td>
    </tr>
  </table>
  