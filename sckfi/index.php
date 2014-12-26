<?php
if (!isset($_SESSION)) {
session_start();
}
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) 
{
if (!isset($_GET['fromdate'])){
$fromdate = date('Y-m-d');
$todate = date('Y-m-d');
$field = '';
$find = '';
}

if (isset($_GET['fromdate'])){
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$field = $_GET['field'];
$find = $_GET['find'];
}
?>

<html>
<head>
<title>Searching for </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/menu.js"></script>
<script src="calendar/datetimepicker_css.js"></script>
</head>
<body>

<h4>KFI Annual Gathering 2014 - Participant Register</h4>
<div class=maintab>
<form name="search" action="search.php" method="GET">
	Search By :
	<Select NAME="field">
	
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="name" <?php if($field == "name") echo "selected"; ?>>Name</option>
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="email" <?php if($field == "email") echo "selected"; ?>>Email</option>
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="mobile_no" <?php if($field == "mobile_no") echo "selected"; ?>>Mobile No</option>
 </Select> &nbsp;

	From : <input style="text-align:center; background-color:#D4EDF7;" id="demo27" size="9" class="text1" type="text" name="fromdate" value="<?php echo $fromdate ;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo27','yyyyMMdd')" style="cursor:pointer"/> 

&nbsp; To : <input style="text-align:center; background-color:#D4EDF7;" id="demo28" size="9" class="text1" type="text" name="todate" value="<?php echo $todate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo28','yyyyMMdd')" style="cursor:pointer"/> &nbsp;

	Enter : <input type="text" size="25" name="find" value = "<?php echo $find;?>"/>
	<input type="submit" name="search" value="Search" />

	<?php
	if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
	{
	?>
<?php
}
?>
<input type="button" name="new_student" value="Add Form" onclick="window.location='add.php'"> &nbsp; 
</form>
</div>
		
</div>
</div>
<div class="clear"></div>
</div>

<hr color=lightgray size=1>
<?php
}
else
{
echo "<br><p align=center><font color=red>Not Editable Access! <a href='http://fileserver' target='blank'> Click here </a>to login OR please contact administrator</font></p>";
}
?>
</body>
</html>




