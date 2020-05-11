<?php

$dblocal="localhost";
$dbname="banks";
$dbname1="curr";
$dbname2="klients";


$us="convert";
$uspas="Q9k8H1z3";


$dbcnx=mysql_connect($dblocal,$us,$uspas);
mysql_select_db($dbname,$dbcnx)or die(mysql_error());
$qw=mysql_query("SET NAMES cp1251;");

$bgs2=mysql_connect($dblocal,$us,$uspas);
mysql_select_db($dbname2,$bgs2) or die(mysql_error()); 
$qw=mysql_query("SET NAMES cp1251;");

$bgs=mysql_connect($dblocal,$us,$uspas);
mysql_select_db($dbname1,$bgs) or die(mysql_error()); 
$qw=mysql_query("SET NAMES cp1251;");



$zap='select cod,iso from cur_code';
$qw=mysql_query($zap);
while($sb=mysql_fetch_array($qw))
{
$iso[]=$sb['iso'];
$vals[]=$sb['cod'];
$valsc[$sb['iso']]=$sb['cod'];
$valsi[$sb['cod']]=$sb['iso'];
}

$zap='SELECT name FROM banks.swift WHERE bic_code="EXPNRUMM"';
$qw=mysql_query($zap);
$sb=mysql_fetch_array($qw);
$swiftp="EXPNRUMM";
$bankpl=$sb['name'];

function banks($swift)
{
if (strlen(trim($swift))>8)
{
$sb1=substr(trim($swift),0, 8); 
$sb2=substr(trim($swift),8, 3);
//echo $sb2; 
$zap='SELECT name, COUNTRY, CITY_HEADING, LOCATION,ADDRESS1 FROM banks.swift WHERE bic_code="'.$sb1.'" and BRANCH_CODE="'.$sb2.'"';
}
else 
 {
 $zap='SELECT name, COUNTRY, CITY_HEADING, LOCATION,ADDRESS1 FROM banks.swift WHERE bic_code="'.$swift.'" and BRANCH_CODE="XXX"';
 }
$qw=mysql_query($zap);
while($sb=mysql_fetch_array($qw))
	{
	$mbs['name']=$sb['name'];
	$mbs['city']=$sb['CITY_HEADING'];
	$mbs['count']=$sb['COUNTRY'];
	$mbs['LOCATION']=$sb['LOCATION'];
	$mbs['ADDRESS']=$sb['ADDRESS1'];
	}
	
return $mbs;	
}

function valuts($fnam,$val)
{
$text = file_get_contents($fnam);
$c=0;
$asw= stripos($text,':32A:');
$sb1=substr($text,$asw-1,30);
//echo $sb1; 
//print_r($val); 
while(strpos($sb1,$val[$c])===false)
{
$c++;
}

return $val[$c];
}

?>
