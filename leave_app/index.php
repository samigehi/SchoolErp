<html>
<head>
<title>Leave App : index</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<link href="css/menu2.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>		
</head>
<body bgcolor="#FFFFFF">
<h3>Leave Management System :: 2014-15</h3>

<div>
<?php
session_start ();
if($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2' || $_SESSION['user_level'] == '4')
{
?>			
			<ul id="menu">	
			<li><a href="index.php">Home</a><li>
			<li><a href=add.php>Leave Form</a></li>
			<li><a href="#">Leave Details</a>			
			<ul>				
			<?php
			if($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip' || $_SESSION['user_name'] == 'milindm' || $_SESSION['user_name'] == 'shailesh' || $_SESSION['user_name'] == 'pusha'){
			?>
			<li><a href="admin_leave_details.php">Leave History</a></li>	
			<li><a href="leave_type_add.php">Add Leave Type</a></li>
			<?php
			}
			else
			{
			include ('../staff/connect.php');
			$staff_sql = mysql_query("SELECT staff_name FROM staff where login_name = '".$_SESSION['user_name']."' ORDER BY staff_name");
			while ($staff = mysql_fetch_array($staff_sql)) {
			$staff_name =  $staff ['staff_name'];
			}			
			?>			
			<li><a href="staff_leave_history.php?staff_name=<?php echo $staff_name;?>">Leave History</a></li>
			<?php
			}
			?>	
			</ul>
			</li>
			
			<?php
			if($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip')
			{
			?>
			<li><a href="#">Admin Office</a>
			<ul>
			<li><a href=staff_add.php>Leave Form</a></li>
			<li><a href="coff.php">C-off Form</a></li>	
			<li><a href="coff_details.php">C-off Details</a></li>		
			</ul>
			</li>
			<?php			
			}
			?>
			</div>

<?php
}
else 
{
echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
}
?>								
<div class="clear"></div>
</div>
<hr color=lightgray size=1>

</body>
</html>




