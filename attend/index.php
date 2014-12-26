<?php
session_start ();
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == 'k.vinayak' || $_SESSION['user_name'] == 'pusha' || $_SESSION['user_name'] == 'demotest')
{?>

<html>
<head>
<title>Searching for attendance...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<link href="css/menu2.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>
</head>
<body>

<h3>Student Attendance System</h3>
<div class=maintab>
<?php
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{
?>
			<ul id="menu">	
			<li><a href="index.php">Home</a><li>
			<li><a href=add.php>New Attendance</a></li>
			<li><a href="attend_status.php">Attend Status</a></li>	
			<li><a href="summary.php">Summary</a></li>			
			<li><a href=exportxls.php>Export to xls</a></li>
			</ul>			
			</div>					
			<div class="clear"></div>
			</div>
			<hr color=lightgray size=1>
<?php			
}
else
{
echo "<br><p align=center><font color=red>No Access! Please contact administrator</font></p>";
}
}
?>
</body>
</html>
