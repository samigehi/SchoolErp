<?php
$hostname='sahyadrischool.org'; //// specify host, i.e. 'localhost'
$user='gbhau'; //// specify username
$pass='pinsah410'; //// specify password
$dbase='alumni_db'; //// specify database name
$connection = mysql_connect("$hostname" , "$user" , "$pass") 
or die ("Can't connect to MySQL");
$db = mysql_select_db($dbase , $connection) or die ("Can't select database.");
?>
