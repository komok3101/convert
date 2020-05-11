<?php
$dblocal="localhost";
$dbname="banks";

$us="convert";
$uspas="Q9k8H1z3";

$dbcnx=mysql_connect($dblocal,$us,$uspas)or die(mysql_error());
mysql_select_db($dbname,$dbcnx)or die(mysql_error());
$qw=mysql_query("SET NAMES cp1251;");


?>
