<?php
include("index.php");
if($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip')
{
$user_name = $_SESSION['user_name'];
?>
<html>
<head>
<title>Apply for Leave</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>
<script language="javascript"> 
//**************************************************************************//
function validateForm()
{
var x=document.forms["addform"]["leave_type"].value;
if (x==null || x=="")
  {
  alert("Please select leave type");
  return false;
  }
}
//************************************************************************//
</script>
</head>
<body>
<div class=addform>
<table class=table1>
<h2>Admin Staff - Leave Form</h2>

<table class=table1>
<form method="post" name="addform" action="<?php $_SERVER['PHP_SELF']?>" onsubmit="return validateForm();">
<td><b>Apply for Leave</b></td>
<tr class=tr1>
<td class=td1>Name :</td>

<?php
if ($_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == 'dilip'){
include ('../staff/connect.php');
$today = date ('Y-m-d');
?>
<td class=td1>
<select name="staff_name">
<option class=pink value="">select</option>
<?php
$staff_sql=mysql_query("SELECT staff_name FROM staff ORDER BY staff_name");
while ($staff=mysql_fetch_array($staff_sql)) {
?>
<option class=pink value="<?php echo $staff['staff_name'];?>"><?php echo $staff['staff_name'];?></option>
<?php
}
?>
</select>
</td>
<?php
}
?>
</tr>

<tr class=tr1>
<td class=td1>Type : </td>
<td class=td1>
<select name="leave_type">
<option class=pink value="">select</option>
<?php
include ("connect.php");
$leave=mysql_query("SELECT leave_type FROM leave_config");
while ($data=mysql_fetch_array($leave)) {
?>
<option class=pink value="<?php echo $data['leave_type'];?>"><?php echo $data['leave_type'];?></option>
<?php
}
?>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>From : </td>
<td class=td1><input style="text-align:center; background-color:#FFEFDB;" id="demo11" size="9" class="text1" type="text" name="leave_from" value="<?php echo $today ;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo11','yyyyMMdd')" style="cursor:pointer"/> &nbsp; To : <input style="text-align:center; background-color:#FFEFDB;" id="demo12" size="9" class="text1" type="text" name="leave_to"  value="<?php echo $today;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo12','yyyyMMdd')" style="cursor:pointer"/>
</td>
</tr>

<tr class=tr1>
<td class=td1>Days : </td>
<td class=td1> 
<select name="leave_days">
<option value="">select</option>
<?php
$range = range(1,30);
foreach ($range as $days) { 
echo "<option value='$days'>$days</option>";
}
?>
</select>
&nbsp;
<select name="half_days">
<option value="">select</option>
<option value="0.5">0.5</option>
</select>
</td>
</tr>

<?php
if ($_SESSION['user_level'] != '2'){
?>
<tr class=tr1>
<td class=td1>Recommended by : </td>
<td class=td1><input size="24" type="text" name="recommended_by" value=""></td>
</tr>
<?php
}
?>
<tr class=tr1>
<td class=td1>Purpose : </td>
<td class=td1><input size="40" type="text" name="leave_reason" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>Approved Status: </td>
<td class=td1>
<select name="leave_status">
<option value="">select</option>
<option value="Approved">Approved</option>
<option value="Pending">Pending</option>
<option value="Hold">Hold</option>
</select> &nbsp; &nbsp; 

By :
</select>
&nbsp;
<select name="approved_by">
<option value="">select</option>
<option value="Milind More">Milind More</option>
<option value="P Ramesh">P Ramesh</option>
<option value="Shailesh Shirali">Shailesh Shirali</option>
</select> &nbsp; &nbsp; Date : <input style="text-align:center; background-color:#FFEFDB;" id="demo15" size="9" class="text1" type="text" name="approved_date" value="<?php echo $today ;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo15','yyyyMMdd')" style="cursor:pointer"/>
</td>
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
$leave_type = trim($_POST['leave_type']);
$leave_from = trim($_POST['leave_from']);
$leave_to = trim($_POST['leave_to']);
$approved_by = trim($_POST['approved_by']);
$approved_date = trim($_POST['approved_date']);
$leave_status = trim($_POST['leave_status']);
$leave_days = trim($_POST['leave_days'] + $_POST['half_days']);

if ($_SESSION['user_level'] != '2'){
$recommended_by = trim($_POST['recommended_by']);
}
else
{
$recommended_by = '';
}

$leave_reason = mysql_escape_string($_POST['leave_reason']);
$apply_date = date("Y-m-d");
$apply_by = $_SESSION['user_name'];

$query = "INSERT INTO leave_app (staff_name, leave_type, leave_from, leave_to, leave_days, recommended_by, leave_reason, apply_by, apply_date, approved_by, approved_date, leave_status)
VALUES ('$staff_name', '$leave_type', '$leave_from', '$leave_to', '$leave_days', '$recommended_by', '$leave_reason', '$apply_by', '$apply_date', '$approved_by', '$approved_date', '$leave_status')";

$results = mysql_query($query);
// -------------------------- show added record --------------------------//
if ($results)
{
header ("Location:add.php");
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

