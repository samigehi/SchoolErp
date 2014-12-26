<?php
include("index.php");
?>

<html>
<head>
<title>add new student...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>
<script language="javascript"> 
//**************************************************************************//
function validateForm()
{
var x=document.forms["std_addform"]["staff_name"].value;
if (x==null || x=="")
  {
  alert("Name must be filled out");
  return false;
  }

var x=document.forms["std_addform"]["birth_date"].value;
if (x==null || x=="")
  {
  alert("date of birth must be filled out");
  return false;
  }

var x=document.forms["std_addform"]["join_date"].value;
if (x==null || x=="")
  {
  alert("date of addmission must be filled out");
  return false;
  }

var x=document.forms["std_addform"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }

}
//************************************************************************//
</script>
</head>
	
<body>
<?php
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == 'dilip')
{?>
<div class=addform>
<div class="contentA">

<table class=table1>
<h3>Add new Staff</h3>

<td><b>Staff's Information:</b></td>

<form method="post" name="std_addform" action="added.php" onsubmit="return validateForm();">

<div align=right>
<font class=message><font color=red>&nbsp;<b> * </b></font> Mandatory fields </font>
<hr align=right style="margin-top:-2px;" width=30% color=orange size=1></div>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Name: </td><td class=td1><input class="text" type="text" name="staff_name" value=""></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Designation: </td><td class=td1><input size="15" type="text" name="designation" value=""></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>&nbsp;&nbsp; </b></font>Teaching Area 1: </td><td class=td1>
<select name="teach_area">
<option style="margin:5px; padding-left: 10px;" value="">-</option>
<option style="margin:5px; padding-left: 10px;" value="Art">Art</option>
<option style="margin:5px; padding-left: 10px;" value="Commercial_Studies">Commercial Studies</option>
<option style="margin:5px; padding-left: 10px;" value="Computer_app">Computer App</option>
<option style="margin:5px; padding-left: 10px;" value="English">English</option>
<option style="margin:5px; padding-left: 10px;" value="Economics_App">Economics App</option>
<option style="margin:5px; padding-left: 10px;" value="Games">Games</option>
<option style="margin:5px; padding-left: 10px;" value="Hindi">Hindi</option>
<option style="margin:5px; padding-left: 10px;" value="Marathi">Marathi</option>
<option style="margin:5px; padding-left: 10px;" value="Maths">Mathematics</option>
<option style="margin:5px; padding-left: 10px;" value="Music">Music</option>
<option style="margin:5px; padding-left: 10px;" value="Geography">Geography</option>
<option style="margin:5px; padding-left: 10px;" value="History">History</option>
<option style="margin:5px; padding-left: 10px;" value="Social_studies">Social Studies</option>
<option style="margin:5px; padding-left: 10px;" value="Chemistry">Chemistry</option>
<option style="margin:5px; padding-left: 10px;" value="Biology">Biology</option>
<option style="margin:5px; padding-left: 10px;" value="Physics">Physics</option>
<option style="margin:5px; padding-left: 10px;" value="Science">Science</option>
<option style="margin:5px; padding-left: 10px;" value="Resource_room">Resource Room</option>
<option style="margin:5px; padding-left: 10px;" value="Yoga">Yoga</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>&nbsp;&nbsp; </b></font>Teaching Area 2: </td><td class=td1>
<select name="teach_area_1">
<option style="margin:5px; padding-left: 10px;" value="">-</option>
<option style="margin:5px; padding-left: 10px;" value="Art">Art</option>
<option style="margin:5px; padding-left: 10px;" value="Commercial_Studies">Commercial Studies</option>
<option style="margin:5px; padding-left: 10px;" value="Computer_app">Computer App</option>
<option style="margin:5px; padding-left: 10px;" value="English">English</option>
<option style="margin:5px; padding-left: 10px;" value="Economics_App">Economics Applications</option>
<option style="margin:5px; padding-left: 10px;" value="Games">Games</option>
<option style="margin:5px; padding-left: 10px;" value="Hindi">Hindi</option>
<option style="margin:5px; padding-left: 10px;" value="Marathi">Marathi</option>
<option style="margin:5px; padding-left: 10px;" value="Maths">Mathematics</option>
<option style="margin:5px; padding-left: 10px;" value="Music">Music</option>
<option style="margin:5px; padding-left: 10px;" value="Geography">Geography</option>
<option style="margin:5px; padding-left: 10px;" value="History">History</option>
<option style="margin:5px; padding-left: 10px;" value="Social_studies">Social Studies</option>
<option style="margin:5px; padding-left: 10px;" value="Chemistry">Chemistry</option>
<option style="margin:5px; padding-left: 10px;" value="Biology">Biology</option>
<option style="margin:5px; padding-left: 10px;" value="Physics">Physics</option>
<option style="margin:5px; padding-left: 10px;" value="Science">Science</option>
<option style="margin:5px; padding-left: 10px;" value="Resource_room">Resource Room</option>
<option style="margin:5px; padding-left: 10px;" value="Yoga">Yoga</option>
</select>
</td>
</tr>



<tr class=tr1>
<td class=td1><font color=red><b>&nbsp;&nbsp; </b></font>Teaching Area 3: </td><td class=td1>
<select name="teach_area_2">
<option style="margin:5px; padding-left: 10px;" value="">-</option>
<option style="margin:5px; padding-left: 10px;" value="Art">Art</option>
<option style="margin:5px; padding-left: 10px;" value="Commercial_Studies">Commercial Studies</option>
<option style="margin:5px; padding-left: 10px;" value="Computer_app">Computer App</option>
<option style="margin:5px; padding-left: 10px;" value="English">English</option>
<option style="margin:5px; padding-left: 10px;" value="Economics_App">Economics Applications</option>
<option style="margin:5px; padding-left: 10px;" value="Games">Games</option>
<option style="margin:5px; padding-left: 10px;" value="Hindi">Hindi</option>
<option style="margin:5px; padding-left: 10px;" value="Marathi">Marathi</option>
<option style="margin:5px; padding-left: 10px;" value="Maths">Mathematics</option>
<option style="margin:5px; padding-left: 10px;" value="Music">Music</option>
<option style="margin:5px; padding-left: 10px;" value="Geography">Geography</option>
<option style="margin:5px; padding-left: 10px;" value="History">History</option>
<option style="margin:5px; padding-left: 10px;" value="Social_studies">Social Studies</option>
<option style="margin:5px; padding-left: 10px;" value="Chemistry">Chemistry</option>
<option style="margin:5px; padding-left: 10px;" value="Biology">Biology</option>
<option style="margin:5px; padding-left: 10px;" value="Physics">Physics</option>
<option style="margin:5px; padding-left: 10px;" value="Science">Science</option>
<option style="margin:5px; padding-left: 10px;" value="Resource_room">Resource Room</option>
<option style="margin:5px; padding-left: 10px;" value="Yoga">Yoga</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Department: </td><td class=td1><input size="15" type="text" name="department" value=""></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Email: </td><td class=td1><input class="text" type="text" name="staff_email" value=""></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Date of Birth: </td>
<td class=td1><input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo1" readonly="readonly" name="birth_date" value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Date of Join: </td>
<td class=td1><input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo2" readonly="readonly" name="join_date" value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/></td>
</tr>


<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Blood Group: </td><td class=td1>  
<select name="bld_group">
<option style="margin:5px; padding-left: 10px;" value="">- select -</option>
<option style="margin:5px; padding-left: 10px;" value="A+ve">A+ve</option>
<option style="margin:5px; padding-left: 10px;" value="A-ve">A-ve</option>
<option style="margin:5px; padding-left: 10px;" value="B+ve">B+ve</option>
<option style="margin:5px; padding-left: 10px;" value="B-ve">B-ve</option>
<option style="margin:5px; padding-left: 10px;" value="AB+ve">AB+ve</option>
<option style="margin:5px; padding-left: 10px;" value="AB-ve">AB-ve</option>
<option style="margin:5px; padding-left: 10px;" value="O+ve">O+ve</option>
<option style="margin:5px; padding-left: 10px;" value="O-ve">O-ve</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Gender: </td><td class=td1>
<select name="gender">
<option style="margin:5px; padding-left: 10px;" value="">- select -</option>
<option style="margin:5px; padding-left: 10px;" value="Male">Male</option>
<option style="margin:5px; padding-left: 10px;" value="Female">Female</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Class Teacher of : </td><td class=td1>
<Select NAME="class_teacher_of">
<Option style="margin:5px; padding-left: 10px;" VALUE="">- Select Class -</option>
<option style="margin:5px; padding-left: 10px;" value="4"> 4 </option>
<option style="margin:5px; padding-left: 10px;" value="5"> 5 </option>
<option style="margin:5px; padding-left: 10px;" value="6A"> 6A </option>
<option style="margin:5px; padding-left: 10px;" value="6B"> 6B </option>
<option style="margin:5px; padding-left: 10px;" value="7A"> 7A </option>
<option style="margin:5px; padding-left: 10px;" value="7B"> 7B </option>
<option style="margin:5px; padding-left: 10px;" value="8A"> 8A </option>
<option style="margin:5px; padding-left: 10px;" value="8B"> 8B </option>
<option style="margin:5px; padding-left: 10px;" value="9A"> 9A </option>
<option style="margin:5px; padding-left: 10px;" value="9B"> 9B </option>
<option style="margin:5px; padding-left: 10px;" value="10A"> 10A </option>
<option style="margin:5px; padding-left: 10px;" value="10B"> 10B </option>
<option style="margin:5px; padding-left: 10px;" value="11"> 11 </option>
<option style="margin:5px; padding-left: 10px;" value="12"> 12 </option>
<option style="margin:5px; padding-left: 10px;" value="Preschool"> Preschool </option>
</Select>
</td>
</tr>



<tr class=tr1>
<td class=td1>&nbsp;&nbsp; House Parent of : </td><td class=td1>
<Select NAME="house_parent_of">
<Option style="margin:5px; padding-left: 10px;" VALUE="">--- Select House ---</option>
<option style="margin:5px; padding-left: 10px;" value="Alaknanda"> Alaknanda </option>
<option style="margin:5px; padding-left: 10px;" value="Indrayani"> Indrayani </option>
<option style="margin:5px; padding-left: 10px;" value="Himadri"> Himadri </option>
<option style="margin:5px; padding-left: 10px;" value="Jaintia"> Jaintia </option>
<option style="margin:5px; padding-left: 10px;"value="Palash"> Palash </option>
<option style="margin:5px; padding-left: 10px;" value="Phalguni"> Phalguni </option>
<option style="margin:5px; padding-left: 10px;" value="Krittika"> Krittika </option>
<option style="margin:5px; padding-left: 10px;" value="Torna"> Torna </option>
<option style="margin:5px; padding-left: 10px;" value="Shravani"> Shravani </option>
<option style="margin:5px; padding-left: 10px;" value="Shivneri"> Shivneri </option>
<option style="margin:5px; padding-left: 10px;" value="Vishakha"> Vishakha </option>
<option style="margin:5px; padding-left: 10px;" value="Chinar"> Chinar </option>
<option style="margin:5px; padding-left: 10px;" value="Chandan"> Chandan </option>
</Select>
</td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b> &nbsp;&nbsp; </b></font> Login Id: </td><td class=td1><input size="20" type="text" name="login_name" value=""></td>
</tr>


<tr class=tr1>
<td class=td1><font color=red><b> &nbsp;&nbsp; </b></font> Leave Details: </td><td class=td1>
CL : <input size="3" type="text" name="leave_cl" value=""> &nbsp;
ML : <input size="3" type="text" name="leave_ml" value=""> &nbsp;
EL : <input size="3" type="text" name="leave_el" value=""> &nbsp;
SL : <input size="3" type="text" name="leave_sl" value=""> &nbsp;
</td>
</tr>

<td><br><b>Contact & Address: </b></td>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Phone No: </td><td class=td1><input class="text1" size="20" type="text" name="phone" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Mobile No </td><td class=td1><input class="text1" size="20" type="text" name="mobile_no" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Street Address: </td><td class=td1><input class="text" type="text" name="address" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; City/Town: </td><td class=td1><input class="text1" size="20" type="text" name="city" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Postal Code: </td><td class=td1><input class="text1" size="20" type="text" name="postalcode" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; State: </td><td class=td1><input class="text1" size="20" type="text" name="state" value=""></td>
</tr> 

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Country: </td><td class=td1><input class="text1" size="20" type="text" name="country" value=""></td>
</tr> 


<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Remarks: </td><td class=td1><TEXTAREA ROWS="3" class="textarea" name="ss_remark"></TEXTAREA></td>
</tr>

</table>
</div>
</div>
<div class="clear"></div>
</div>
<br>
<div align=center>
<input type="submit" name="submit" value="Save Record">
<hr style="margin-top:2px;" width=30% color=orange size=1>
</div>
</form>
<?php
}
else {echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";}
?>

</body>
</html>

