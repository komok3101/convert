<?php

$filename=$_GET['name'];

 if (!file_exists($filename)) {
     header ("HTTP/1.0 404 Not Found");
     exit;
   }


 $fsize = filesize($filename);
 
 $ftime = date("D, d M Y H:i:s T", filemtime($filename));

 
 $range = 0;

 
 $handle = @fopen($filename, "rb");
 
 
 if (!$handle){

   header ("HTTP/1.0 403 Forbidden");
   exit;
 }
 
 if ($_SERVER["HTTP_RANGE"]) {

 $range = $_SERVER["HTTP_RANGE"];
 $range = str_replace("bytes=", "", $range);
 $range = str_replace("-", "", $range);
 
 if ($range) {
     fseek($handle, $range);
     }


 }

 if ($range) {
  header("HTTP/1.1 206 Partial Content");
 } 
 else {
  header("HTTP/1.1 200 OK");
 }
 header("Content-Disposition: attachment; filename=\"{$filename}\"");
 header("Last-Modified: {$ftime}");
 header("Content-Length: ".($fsize-$range));
 header("Accept-Ranges: bytes");
 header("Content-Range: bytes {$range}-".($fsize - 1)."/".$fsize);

 
 if(isset($_SERVER['HTTP_USER_AGENT']) and strpos($_SERVER['HTTP_USER_AGENT'],'MSIE'))
   Header('Content-Type: application/force-download');
 else
  Header('Content-Type: application/octet-stream');
 while(!feof($handle)) {
 $buf = fread($handle,512);
 print($buf);
 }

 fclose($handle);

//-----------------------------------




chmod($filename,0777);
chmod('tt'.$filename,0777);
//chmod($na,0777);
unlink($filename);
unlink('tt'.$filename);
//unlink($fname);
//unlink($na);

//Header('location:http://convert.expobank.ru/');

?>