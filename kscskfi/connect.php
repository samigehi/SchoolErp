<?php
$hostname='localhost'; //// specify host, i.e. 'localhost'
$user='gbhau'; //// specify username
$pass='omnamo123'; //// specify password
$dbase='kscskfic_gathering'; //// specify database name
$connection = mysql_connect("$hostname" , "$user" , "$pass") 
or die ("Can't connect to MySQL");

$db = mysql_select_db($dbase , $connection) or die ("Can't select database.");

?>
