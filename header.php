<?php
include ('login/dbc.php');
page_protect();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="new.css" rel="stylesheet" type="text/css" />
</head>
<body class=body_new>
<div style="width:100%; font-size:12px; color:gray;"> 
<div style="width:200px; margin-top:20px; float:right;">
<?php
$date = date ('d-M-Y');
$time = date ('H:i A');

if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{
$user = $_SESSION['user_name'];
?>
<?php
echo "<b>Welcome! ". $_SESSION['user_id']. "</b><br>";
echo "Login - $user<br>";
echo "Time - $time, $date<br>";
echo "IP Address - ". $_SESSION['user_ip']; 
}
?>
</div>
<div style="float:left; margin-left:7px; width:320">
<img style="padding:1px; margin-left:10px; border:0px;" height="55px" width="232px;" src="ssmain.png">
<h1 style="letter-spacing:6px; margin-left:1px;">Sahyadri School<small style="text-align:left; margin-left:18px;">krishnamurti foundation india</small></h1>
</div>
<div class="clear"></div>
</div>
</body>
</html>
