<?php
$dblocal="localhost";
$dbname="banks";
//$dbname1="expo";
//$dbname2="dbo_bd_bk";


$us="convert";
$uspas="Q9k8H1z3";

$dbcnx=mysql_connect($dblocal,$us,$uspas)or die(mysql_error());
mysql_select_db($dbname,$dbcnx)or die(mysql_error());
$qw=mysql_query("SET NAMES cp1251;");

//$bgs2=mysql_connect($dblocal,$us,$uspas);
//mysql_select_db($dbname2,$bgs2) or die(mysql_error()); 
//$qw=mysql_query("SET NAMES cp1251;");
// 
//$bgs=mysql_connect($dblocal,$us,$uspas);
//mysql_select_db($dbname1,$bgs) or die(mysql_error()); 
//$qw=mysql_query("SET NAMES cp1251;");
?>
