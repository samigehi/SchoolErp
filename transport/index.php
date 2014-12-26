<html>
<head>
<title>Leave App : index</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<link href="css/menu2.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>		
</head>
<body bgcolor="#FFFFFF">
<h3>Transport Management</h3>

<div>
<?php
session_start ();
if($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2' || $_SESSION['user_level'] == '4')
{
?>			
			<ul id="menu">	
			<li><a href="index.php">Home</a><li>
			<li><a href=add.php>Booking Form</a></li>
			<li><a href="#">Travel Details</a>			
			<ul>				
			<?php
			if($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip' || $_SESSION['user_name'] == 'milindm' || $_SESSION['user_name'] == 'shailesh' || $_SESSION['user_name'] == 'pusha'){
			?>
			<li><a href="admin_transport_details.php">Travel History</a></li>	
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
			<li><a href="staff_travel_history.php?staff_name=<?php echo $staff_name;?>">Travel History</a></li>
			<?php
			}
			?>	
			</ul>
			</li>
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




