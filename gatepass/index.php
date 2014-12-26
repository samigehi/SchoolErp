<html>
<head>
<title>Gatepass...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/menu.js"></script>
<script src="calendar/datetimepicker_css.js"></script>
</head>
<body>

<h3>Gatepass</h3>

<?php
if (!isset($_SESSION)) {
session_start();
}
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'avinash')
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



<div class=maintab>
<form name="search" action="search.php" method="GET">
Search by : 
	<Select NAME="field">	
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="status" <?php if($field == "status") echo " selected"; ?>>Status</option>	
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="gatepass_no" <?php if($field == "gatepass_no") echo " selected"; ?>>Gatepass No</option>
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="items_name" <?php if($field == "items_name") echo " selected"; ?>>Item</option>
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="going_to" <?php if($field == "going_to") echo " selected"; ?>>Vendor</option>	
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="from_dept" <?php if($field == "from_dept") echo " selected"; ?>>Department</option>
<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="return_able" <?php if($field == "return_able") echo " selected"; ?>>Returnable</option>
	</Select> &nbsp;

From : <input style="text-align:center; background-color:#D4EDF7;" id="demo21" size="9" class="text1" type="text" name="fromdate" value="<?php echo $fromdate ;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo21','yyyyMMdd')" style="cursor:pointer"/>

&nbsp; To : <input style="text-align:center; background-color:#D4EDF7;" id="demo22" size="9" class="text1" type="text" name="todate" value="<?php echo $todate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo22','yyyyMMdd')" style="cursor:pointer"/>

	&nbsp; Enter : <input type="text1" size="25" name="find" value = "<?php echo $find;?>"/> &nbsp; 

	<input type="submit" name="search" value="Search" /> &nbsp;	

<input type="button" name="enter data" value="Add New" onclick="window.location='add.php'"> &nbsp; 
</form>
</div>

</div>
<div class="clear"></div>
</div>
<hr color=lightgray size=1>
<?php			
}
else
{
echo "<p align=center><font color=red>No Access! Please contact administrator.</font></p>";
}
?>
<hr color=lightgray size=1>
</body>
</html>
