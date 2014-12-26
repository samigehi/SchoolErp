<html>
<head>
<title>std index main page...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<link href="new.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/menu.js"></script>
</head>
<body>

 <div align="center" class="img1" style="margin-top:5%;">
<h1 style="font-size:26px; color:#0000CD; font-family:Trebuchet MS, Helvetica, sans-serif;">STUDENT INFORMATION SYSTEM</h1>
<hr color="orange" size="1" width="50%" style="margin-top:-20px;">
 <img style="margin-top:5%;" src="main.png" alt="Klematis" class="image"/>
 <br><br> 

 <a href="index.php">
 <img class="result9268514" width="70" height="22" onmouseover="this.src = 'button52195770.png'" onmouseout="this.src = 'button26434737.png'" src="button26434737.png"/>
 </a>
</div>
<?php
include ('connect.php');

$data = mysql_query("SELECT * from name");

$num_rows = mysql_num_rows($data);

echo "<br><div align=center><div style='background-color:orange; border:1px solid black; font-size:12px; width:300px;'>Total Students : <font color=red><b>$num_rows </b></font></div></div>";

mysql_close();

?>
</body>
</html>




