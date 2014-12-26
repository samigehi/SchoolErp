<html>
<head>
<title>Searching for staff...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/menu.js"></script>
</head>
<body>

<h4>Staff Information System</h4>
<div class=maintab>
<form name="search" action="search.php" method="post">
	<b>Select Criterion Here :</b>
	<Select NAME="field">
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="staff_name">Name</option>	
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="designation">Designation</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="department">Department</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="house_parent_of">House Parent</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="class_teacher_of">Class Teacher</option>
	</Select>
	Enter : <input type="text" name="find" />
	<input type="hidden" name="searching" value="yes" />
	<input type="submit" name="search" value="Search" />

	<?php
	session_start ();
	if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
	{
	?>
<input type="button" name="new_staff" value="New Staff" onclick="window.location='add.php'"> &nbsp; 
<?php
}
?>

</form>
</div>

		<?php
		if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
		{

		echo "  <div style='float:left; margin-top:2px;'>
			<div class=sidebarmenu>
			<ul id=sidebarmenu1>
			<li><a href=#>&nbsp; &nbsp; Summary &nbsp; -></a>
			<ul>
		
			</ul> 
			</div>";
		
			}
			?>

</div>
<div class="clear"></div>
</div>
<hr color=lightgray size=1>
</body>
</html>




