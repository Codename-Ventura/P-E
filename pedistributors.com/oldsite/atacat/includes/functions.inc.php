
<?php
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