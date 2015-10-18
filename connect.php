<?php

$con = mysql_connect("127.0.0.1", "root", "");
mysql_select_db("bcalendar", $con);
mysql_query("SET NAMES utf8");

if($con)
{
	echo "";
}
else
{
	echo "MySQL Connect Failed : Error : ".mysql_error();
}
?>
