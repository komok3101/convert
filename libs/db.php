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

$mysqls=new \mysqli('localhost',config::$nameusbs,config::$passusbs,config::$namebaza);
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