<?php
include("index.php");
if($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip')
{
$today = date('Y-m-d');
?>

<html>
<head>
<title>C-off Leave</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>
</head>
	
<body>
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
<option class=pink value="">-- select --</option>
<?php
include ('../staff/connect.php');
$staff_sql=mysql_query("SELECT staff_name FROM staff where designation != 'Teacher' ORDER BY staff_name");
while ($staff=mysql_fetch_array($staff_sql)) {
?>
<option class=pink value="<?php echo $staff['staff_name'];?>"><?php echo $staff['staff_name'];?></option>
<?php
}
?>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>Date : </td>
<td class=td1><input style="text-align:center; background-color:#FFEFDB;" id="demo11" size="9" class="text1" type="text" name="coff_date" value="<?php echo $today ;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo11','yyyyMMdd')" style="cursor:pointer"/>
</td>
</tr>

<tr class=tr1>
<td class=td1>C-off Type : </td>
<td class=td1>
<select name="coff_type">
<option class=pink value="">-- select --</option>
<option class=pink value="Weekly Off">Weekly Off</option>
<option class=pink value="Republic Day">Republic Day</option>
<option class=pink value="Independence Day">Independence Day</option>
<option class=pink value="Gandhi Birth Anniversary">Gandhi Birth Anniversary</option>
<option class=pink value="Dassera">Dassera</option>
<option class=pink value="Diwali (2 days)">Diwali (2 days)</option>
<option class=pink value="1 May (Labour Day)">1 May (Labour Day)</option>
<option class=pink value="Other">Other</option>
</td>
</tr>

<tr class=tr1>
<td class=td1>Recommended by : </td>
<td class=td1>
<select name="recommended_by">
<option class=pink value="">-- select --</option>
<option class=pink value="Milind More">Milind More</option>
<option class=pink value="Dilip Shelar">Dilip Shelar</option>
<option class=pink value="Omana Santosh">Omana Santosh</option>
<option class=pink value="Usha Pasarkar">Usha Pasarkar</option>
<option class=pink value="Pradnya Virnak">Pradnya Virnak</option>
<option class=pink value="Satish Gundal">Satish Gundal</option>
</tr>

<tr class=tr1>
<td class=td1>Purpose : </td>
<td class=td1><input size="40" type="text" name="coff_reason" value=""></td>
</tr>

</table>
</div>
</div>
<div class="clear"></div>
</div>
<br>
<div align=center>
<input type="submit" name="submit" value="Submit"> &nbsp; <input type="reset" value="Reset" />
<hr style="margin-top:2px;" width=20% color=orange size=1>
</div>
</form>

<?php
if (isset($_POST['submit']))
{
include("connect.php");
$staff_name = trim($_POST['staff_name']);
$coff_date = trim($_POST['coff_date']);
$coff_type = trim($_POST['coff_type']);
$recommended_by = trim($_POST['recommended_by']);
$coff_reason = mysql_escape_string($_POST['coff_reason']);
$added_by = $_SESSION['user_name'];
$added_date = date ('Y-m-d');

$query = "INSERT INTO coff_leave_app (staff_name, coff_date, coff_type, recommended_by, coff_reason, added_by, added_date)
VALUES ('$staff_name', '$coff_date', '$coff_type', '$recommended_by', '$coff_reason', '$added_by', '$added_date')";

$results = mysql_query($query);

if ($results)
{
header ("Location: coff.php");
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

