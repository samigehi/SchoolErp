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

var x=document.forms["addform"]["from_location"].value;
if (x==null || x=="")
  {
  alert("Please select from location");
  return false;
  }

var x=document.forms["addform"]["to_location"].value;
if (x==null || x=="")
  {
  alert("Please select To location");
  return false;
  }

var x=document.forms["addform"]["depart_on"].value;
if (x==null || x=="")
  {
  alert("Please select Departs on field");
  return false;
  }

var x=document.forms["addform"]["depart_time"].value;
if (x==null || x=="")
  {
  alert("Please select Depart time");
  return false;
  }

var x=document.forms["addform"]["return_on"].value;
if (x==null || x=="")
  {
  alert("Please select Return on field");
  return false;
  }

var x=document.forms["addform"]["return_time"].value;
if (x==null || x=="")
  {
  alert("Please select return time");
  return false;
  }

}
//************************************************************************//
</script>
</head>
<body>
<div class=addform>
<table class=table1>
<h2>Vehicle Booking Form</h2>
<?php 
if ($_SESSION['user_name'] != 'admin' && $_SESSION['user_name'] != 'dilip'){
include ('../staff/connect.php');
$staff_sql = mysql_query("SELECT staff_name FROM staff where login_name = '$user_name' ORDER BY staff_name");
while ($staff = mysql_fetch_array($staff_sql)) {
$staff_name =  $staff ['staff_name'];
}
?>

<?php
echo "<div align=right><a href='staff_travel_history.php?staff_name=$staff_name' title='history' target='_blank'><img src='images2/history.png' border='0' alt='history'> History</a></div>"; 
}
$today=date('Y-m-d');
?>

<table class=table1>
<form method="post" name="addform" action="added.php" onsubmit="return validateForm();">
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
<td class=td1>From : </td>
<td class=td1>
<select name="from_location">
<option class=pink value="">select</option>
<option class=pink value="Sahyadri">Sahyadri</option>
<option class=pink value="Pune">Pune</option>
<option class=pink value="Rajgurunagar">Rajgurunagar</option>
<option class=pink value="Wada">Wada</option>
<option class=pink value="Bhimashankar">Bhimashankar</option>
<option class=pink value="Bhorgiri">Bhorgiri</option>
<option class=pink value="Mumbai">Mumbai</option>
<option class=pink value="Nashik">Nashik</option>
<option class=pink value="Other">Other</option>
</select>
&nbsp; &nbsp;

To :
<select name="to_location">
<option class=pink value="">select</option>
<option class=pink value="Sahyadri">Sahyadri</option>
<option class=pink value="Pune">Pune</option>
<option class=pink value="Rajgurunagar">Rajgurunagar</option>
<option class=pink value="Wada">Wada</option>
<option class=pink value="Bhimashankar">Bhimashankar</option>
<option class=pink value="Bhorgiri">Bhorgiri</option>
<option class=pink value="Mumbai">Mumbai</option>
<option class=pink value="Nashik">Nashik</option>
<option class=pink value="Other">Other</option>
</select>
</td>
</tr>


<tr class=tr1>
<td class=td1>Departure : </td>
<td class=td1><input style="text-align:center; background-color:#FFEFDB;" id="demo11" size="9" class="text1" type="text" name="depart_on" value="<?php echo $today ;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo11','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

Time :
<select name="depart_time">
<?php for($i = 0; $i < 24; $i++): ?>
<option value="<?php echo $i+1; ?>"><?php printf('%1$02d.00',(($i+1) > 12)? ($i+1)-12 : $i+1)?><?php echo (($i < 12)? 'AM' : 'PM'); ?></option>
<?php endfor ?>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>Return : </td>
<td class=td1><input style="text-align:center; background-color:#FFEFDB;" id="demo12" size="9" class="text1" type="text" name="return_on"  value="<?php echo $today;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo12','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

Time :
<select name="return_time">
<?php for($i = 0; $i < 24; $i++): ?>
<option value="<?php echo $i+1; ?>"><?php printf('%1$02d.00',(($i+1) > 12)? ($i+1)-12 : $i+1)?><?php echo (($i < 12)? 'AM' : 'PM'); ?></option>
<?php endfor ?>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>Persons Travelling : </td>
<td class=td1> 
<select name="adult">
<option value="">Adult</option>
<?php
$range = range(1,10);
foreach ($range as $adult) { 
echo "<option value='$adult'>$adult</option>";
}
?>
</select>
&nbsp; &nbsp;

<select name="child">
<option value="">Child</option>
<?php
$range = range(1,10);
foreach ($range as $child) { 
echo "<option value='$child'>$child</option>";
}
?>
</select>
</td>
</tr>


<tr class=tr1>
<td class=td1>Trip Type : </td>
<td class=td1> 
<select name="trip_type">
<option value="">select</option>
<option value="Personal">Personal</option>
<option value="Official">Official</option>
<option value="Vacation">Vacation</option>
</select>
&nbsp; &nbsp;

To be Shared :
<select name="to_be_shared">
<option value="">select</option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>Type of Vehicle : </td>
<td class=td1>
<select name="vehicle_type">
<option value="">select</option>
<option value="Scorpio">Scorpio</option>
<option value="Bolero">Bolero</option>
<option value="Cruiser">Cruiser</option>
<option value="Pickup Tempo">Pickup Tempo</option>
</select> &nbsp; &nbsp;
Service Provider :
<select name="service_provider">
<option value="">select</option>
<option value="Sahyadri School">Sahyadri School</option>
<option value="Mr. Dilip Thigle">Mr. Dilip Thigle</option>
<option value="Mr. Ramchandra Tanpure">Mr. Ramchandra Tanpure</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>Your Travel Details : </td>
<td class=td1>
<textarea rows="3" cols="50" name="special_requirement" value=""></textarea>
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
}
else
{
echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
}
?>

</body>
</html>

