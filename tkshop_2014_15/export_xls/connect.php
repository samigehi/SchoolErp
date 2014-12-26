<?php
$hostname='localhost'; //// specify host, i.e. 'localhost'
$user='root'; //// specify username
$pass='root'; //// specify password
$dbase='tkshop_2014_15'; //// specify database name
$connection = mysql_connect("$hostname" , "$user" , "$pass") 
or die ("Can't connect to MySQL");

$db = mysql_select_db($dbase , $connection) or die ("Can't select database.");

?>
