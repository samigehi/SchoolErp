
<html>
<head>
<title>C-off Leave</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>
</head>
	
<body>
<?php
include ('index.php');
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip'){
{
if (!isset($_GET['coff_id'])){
$fromdate = date('Y-m-d');
$todate = date('Y-m-d');
$coff_id = '';
}

if (isset($_GET['coff_id'])){
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$coff_id = $_GET['coff_id'];
}

include ('connect.php');

$qP = "SELECT * FROM coff_leave_app WHERE coff_id = '$coff_id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);
$coff_id = trim($coff_id);
$staff_name = trim($staff_name);
$coff_type = trim($coff_type);
$coff_date = trim($coff_date);
$coff_reason = trim($coff_reason);
$recommended_by = trim($recommended_by);
$coff_reason = mysql_escape_string($coff_reason);
$coff_status = trim($coff_status);
?>

<div class="coff">
<div class="contentA">
<table class="table1">
<h2>C-off Form</h2>

<table class="table1">
<form method="post" name="addform" action="<?php $_SERVER['PHP_SELF']?>" onsubmit="return validateForm();">
<td><b>Apply for C-Off</b></td>
<tr class=tr1>
<td class=td1>Name :</td>

<td class=td1>
<select name="staff_name">
<option class=pink value="<?php echo $staff_name;?>"><?php echo $staff_name;?></option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>Date : </td>
<td class=td1><input style="text-align:center; background-color:#D4EDF7;" id="demo11" size="9" class="text1" type="text" name="coff_date" value="<?php echo $coff_date ;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo11','yyyyMMdd')" style="cursor:pointer"/>
</td>
</tr>

<tr class=tr1>
<td class=td1>C-off Type : </td>
<td class=td1>
<select name="coff_type">
<option class=pink value="<?php echo $coff_type;?>"><?php echo $coff_type;?></option>
<option class=pink value="Weekly Off">Weekly Off</option>
<option class=pink value="Republic Day">Republic Day</option>
<option class=pink value="Independence Day">Independence Day</option>
<option class=pink value="Gandhi Birth Anniversary">Gandhi Birth Anniversary</option>
<option class=pink value="Dassera">Dassera</option>
<option class=pink value="Diwali (2 days)">Diwali (2 days)</option>
<option class=pink value="1 May (Labour Day)">1 May (Labour Day)</option>
<option class=pink value="Other">Other</option>
</tr>

<tr class=tr1>
<td class=td1>Recommended by : </td>
<td class=td1>
<select name="recommended_by">
<option class=pink value="<?php echo $recommended_by;?>"><?php echo $recommended_by;?></option>
<option class=pink value="Milind More">Milind More</option>
<option class=pink value="Dilip Shelar">Dilip Shelar</option>
<option class=pink value="Omana Santosh">Omana Santosh</option>
<option class=pink value="Usha Pasarkar">Usha Pasarkar</option>
<option class=pink value="Pradnya Virnak">Pradnya Virnak</option>
<option class=pink value="Satish Gundal">Satish Gundal</option>
</tr>

<tr class=tr1>
<td class=td1>Purpose : </td>
<td class=td1><input size="40" type="text" name="coff_reason" value="<?php echo $coff_reason;?>"><td>
</tr>


<tr class=tr1>
<td class=td1>C-off Status : </td>
<td class=td1>
<select name="coff_status">
<option value="<?php echo $coff_status;?>"><?php echo $coff_status;?></option>
<option value="Approved">Approved</option>
<option value="Pending">Pending</option>
<option value="Hold">Hold</option>
</select>
</td>
</tr>

</table>
</div>
</div>
<div class="clear"></div>
</div>
<br>
<div align=center>
<input type="submit" name="update" value="Update"> &nbsp; <input type="reset" value="Reset" />
<hr style="margin-top:2px;" width=20% color=orange size=1><input type="hidden" name="coff_id" value="<?php echo $coff_id;?>"/>
</div>
</form>

<?php
if (isset($_POST['update']))
{
include("connect.php");
$coff_id = trim($_POST['coff_id']);
$coff_type = trim($_POST['coff_type']);
$coff_date = trim($_POST['coff_date']);
$coff_reason = trim($_POST['coff_reason']);
$coff_status = trim($_POST['coff_status']);
$approved_by = $_SESSION['user_name'];
$approved_date = date ('Y-m-d');

$query = "UPDATE coff_leave_app SET coff_date = '$coff_date', coff_type='$coff_type',  coff_reason='$coff_reason', coff_status = '$coff_status', approved_by = '$approved_by', approved_date = '$approved_date' WHERE coff_id='$coff_id'";

$results = mysql_query($query);
if ($results)
{
header ("Location: coff.php");
}

}
}
}
else
{
echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
}
?>

</body>
</html>

