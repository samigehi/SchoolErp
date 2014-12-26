
<html>
<head>
<title>Searching for student...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/menu.js"></script>
<script src="calendar/datetimepicker_css.js"></script>
</head>
<body>

<?php

if (!isset($_GET['field'])){
$field = '';
$find = '';
}

if (isset($_GET['field'])){
$field = $_GET['field'];
$find = $_GET['find'];
}
?>

<h4>Student Information System [ Year: 2013-14 ]</h4>
<div class=maintab>
<form name="search" action="search.php" method="GET">
	<b>Select Criterion Here :</b>
	<Select NAME="field">
	<optgroup label=" &nbsp; School's information">
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="name" <?php if($field == "name") echo " selected"; ?>>Name</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="adm" <?php if($field == "adm") echo " selected"; ?>>Adm No</option> 	
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="class" <?php if($field == "class") echo " selected"; ?>>Class</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="house" <?php if($field == "house") echo " selected"; ?>>Dorm</option>
	</optgroup>
	<optgroup label=" &nbsp; Parent's information">
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="city" <?php if($field == "city") echo " selected"; ?>>City</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="state" <?php if($field == "state") echo " selected"; ?>>State</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="country" <?php if($field == "country") echo " selected"; ?>>Country</option>
	</optgroup>
	</Select>
	Enter : <input type="text" name="find" value="<?php echo $find;?>" />
	<input type="hidden" name="searching" value="yes" />
	<input type="submit" name="search" value="Search" />
	<?php
	session_start ();
	if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
	{
	?>
<input type="button" name="new_student" value="New Student" onclick="window.location='add.php'"> &nbsp; 
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
			<li><a href=../std_2012-13/index.php>&nbsp; Year 2012-13</a></li>
			<li><a href=../std_2014-15/index.php>&nbsp; Year 2014-15</a></li>
			<li><a href=exportxls.php>&nbsp; Export to excel</a></li>
			</ul> 
			</div>
			</div>";
		
			}
			?>
</div>
</div>
<div class="clear"></div>
</div>
<hr color=lightgray size=1>

</body>
</html>




