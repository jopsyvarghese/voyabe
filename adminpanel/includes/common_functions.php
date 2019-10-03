<?php
/* the DirectoryClass encapsulates all the common task required by the application to manage document directory  */
class CommonClass
{
  	/* Function to get File extension*/
	function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 	}
	
}