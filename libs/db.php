<?php
namespace libs;

use libs\conf;

class db
{

	
function connect()
{
//global $namebaza;
//global $nameusbs;
//global $passusbs;

$mysqls=new \mysqli('localhost',conf::$nameusbs,conf::$passusbs,conf::$namebaza);
if (mysqli_connect_errno())
   {
    $m[1]='0';
   }
 else 
   {
    $m[1]=1;
	$m[2]=$mysqls;
   }  
return $m;

}	

function closec($base)
{
$base->close();
}
}

?>