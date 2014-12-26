<html>
<head>
<title>Leave edit</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>
</head>
	
<body>
<?php 
include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip'){

if (isset($_GET['leave_id'])){
$leave_id = $_GET['leave_id'];
}

include ("connect.php");

$qP = "SELECT * FROM leave_app WHERE leave_id = '$leave_id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);
$leave_id = trim($leave_id);
$staff_name = trim($staff_name);
$leave_type = trim($leave_type);
$leave_days = trim($leave_days);
$leave_from = trim($leave_from);
$leave_to = trim($leave_to);
$leave_status = trim($leave_status);
$leave_reason = trim($leave_reason);
$leave_remark = trim($leave_remark);
$apply_date = trim($apply_date);
$apply_by = trim($apply_by);
?>

<div class=addform>
<div class="contentA">
<table class=table1>
<h2>Update Leave Record</h2>

<?php
echo "<div align=right><a href='staff_leave_history.php?staff_name=$staff_name' target='_blank'>View history</a></div>"; 
?>

<table class=table1>
<form method="post" name="addform" action="updated.php">
<td><b>Leave details</b></td>
<tr class=tr1>
<td class=td1>Name :</td>

<td class=td1>
<select name="staff_name">
<option class=pink value="<?php echo $staff_name;?>"><?php echo $staff_name;?></option>
</select>
</td>
</tr>

<tr>
<td class=td1>Type : </td>
<td class=td1>
<select name="leave_type">
<option class=pink value="<?php echo $leave_type;?>"><?php echo $leave_type;?></option>
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
<td class=td1><input style="text-align:center; background-color:#D4EDF7;" id="demo11" size="9" class="text1" type="text" name="leave_from" value="<?php echo $leave_from ;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo11','yyyyMMdd')" style="cursor:pointer"/> &nbsp; To : <input style="text-align:center; background-color:#D4EDF7;" id="demo12" size="9" class="text1" type="text" name="leave_to"  value="<?php echo $leave_to;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo12','yyyyMMdd')" style="cursor:pointer"/>
</td>
</tr>

<tr class=tr1>
<td class=td1>Apply Date : </td>
<td class=td1><input size="20" type="text" readonly="readonly" name="apply_date" value="<?php echo $apply_date;?>"><td>
</tr>


<tr class=tr1>
<td class=td1>Apply By : </td>
<td class=td1><input size="20" type="text" readonly="readonly" name="apply_by" value="<?php echo $apply_by;?>"><td>
</tr>


<tr class=tr1>
<td class=td1>Days : </td>
<td class=td1> 
<select name="leave_days">
<option value="<?php echo $leave_days;?>"><?php echo $leave_days;?></option>
<option value="">select</option>
<option value='0.5'>0.5</option> 
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
<td>
</tr>

<tr class=tr1>
<td class=td1>Purpose : </td>
<td class=td1><input size="40" type="text" readonly="readonly" name="leave_reason" value="<?php echo $leave_reason;?>"><td>
</tr>


<tr class=tr1>
<td class=td1>Leave Status : </td>
<td class=td1>
<select name="leave_status">
<option value="<?php echo $leave_status;?>"><?php echo $leave_status;?></option>
<option value="">select</option>
<option value="Approved">Approved</option>
<option value="Hold">Hold</option>
<option value="Reject">Reject</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>Remark : </td>
<td class=td1><input size="40" type="text" name="leave_remark" value="<?php echo $leave_remark;?>"><td>
</tr>

</table>
</div>
</div>
<div class="clear"></div>
</div>
<br>
<div align=center>
<input type="submit" name="update" value="Submit"> &nbsp; <input type="button" value="Cancel" onclick="window.location='javascript:history.back()'"><input type="hidden" name="leave_id" value="<?php echo $leave_id;?>">  &nbsp; <input type="submit" name="delete" value="Delete"> 
<hr style="margin-top:2px;" width=25% color=orange size=1>
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

