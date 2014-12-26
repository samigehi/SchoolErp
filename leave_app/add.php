<?php
include("index.php");
if($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2' || $_SESSION['user_level'] == '4')
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
<h2>Leave Form</h2>
<?php 
if ($_SESSION['user_name'] != 'admin' && $_SESSION['user_name'] != 'dilip'){
include ('../staff/connect.php');
$staff_sql = mysql_query("SELECT staff_name FROM staff where login_name = '$user_name' ORDER BY staff_name");
while ($staff = mysql_fetch_array($staff_sql)) {
$staff_name =  $staff ['staff_name'];
}

include ("connect.php");
echo '<td><b>Leave Balance</b></td>';
$sql=mysql_query("SELECT (select leave_limit from leave_config where leave_type= 'CL') - SUM(IF(leave_type = 'CL', leave_days,0)) AS `cl`, 
(select leave_limit from leave_config where leave_type= 'ML') - SUM(IF(leave_type = 'ML', leave_days,0)) AS `ml`, 
(select leave_limit from leave_config where leave_type= 'EL') - SUM(IF(leave_type = 'EL', leave_days,0)) AS `el`,
SUM(IF(leave_type = 'Duty', leave_days,0)) AS `Duty`,
SUM(IF(leave_type = 'C-off', leave_days,0)) AS `C-off`,
SUM(IF(leave_type = 'Weekend', leave_days,0)) AS `Weekend`
FROM leave_app where staff_name = '$staff_name' AND leave_status='Approved'");

while ($row=mysql_fetch_array($sql)) {
$cl = $row['cl'];
$ml = $row['ml'];
$el = $row['el'];
$duty = $row['Duty']; 
$c_off = $row['C-off'];
$Weekend = $row['Weekend'];
}
?>

<tr style="background-color:#FFD7DD;">
<?php
if ($cl < 0){
?>	
<td class=td1><b>CL : </b> &nbsp; <font style="text-align:right; color:red;"><blink><?php echo $cl;?></blink></td> 
<?php
}
else
{
?>
<td class=td1><b>CL : </b> &nbsp; <?php echo $cl;?></td>
<?php
}

if ($ml < 0){
?>	
<td class=td1><b>ML : </b> &nbsp; <font style="text-align:right; color:red;"><blink><?php echo $ml;?></blink></td> 
<?php
}
else
{
?>
<td class=td1><b>ML : </b> &nbsp; <?php echo $ml;?></td> 
<?php
}
?>
  
<?php
if ($el < 0){
?>	
<td class=td1><b>El : </b> &nbsp; <font style="text-align:right; color:red;"><blink><?php echo $el;?></blink></td> 
<?php
}
else
{
?>
<td class=td1><b>El : </b> &nbsp; <?php echo $el;?></td> 
<?php
}
?>
<td class=td1><b>Duty : </b> &nbsp; <?php echo $duty;?></td> 
<td class=td1><b>C-off : </b> &nbsp; <?php echo $c_off;?></td> 
<td class=td1><b>Weekend : </b> &nbsp; <?php echo $Weekend;?></td> 
</tr>
</table>
<br>

<?php
echo "<div align=right><a href='staff_leave_history.php?staff_name=$staff_name' title='history' target='_blank'><img src='images2/history.png' border='0' alt='history'> History</a></div>"; 
}
$today=date('Y-m-d');
?>

<table class=table1>
<form method="post" name="addform" action="added.php" onsubmit="return validateForm();">
<td><b>Apply for Leave</b></td>
<tr class=tr1>
<td class=td1>Name :</td>

<?php
if ($_SESSION['user_name'] != 'admin' && $_SESSION['user_name'] != 'dilip'){
?>
<td class=td1>
<select name="staff_name">
<option class=pink value="<?php echo $staff_name;?>"><?php echo $staff_name;?></option>
</select>
</td>
<?php
}

if ($_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == 'dilip'){
include ('../staff/connect.php');
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
}
else
{
echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
}
?>

</body>
</html>

