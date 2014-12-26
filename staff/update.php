<html>
<head>
<title>update record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>
</head>
<body>

<?php

include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip' || $_SESSION['user_name'] == 'office')
{
include("connect.php");
$id = $_GET['id'];
$qP = "SELECT * FROM staff WHERE id = '$id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);
$staff_name = trim($staff_name);
$birth_date = trim($birth_date);
$join_date = trim($join_date);
$staff_email = trim($staff_email);
$designation = trim($designation);
$teach_area = trim($teach_area);
$teach_area_1 = trim($teach_area_1);
$teach_area_2 = trim($teach_area_2);
$department = trim($department);
$bld_group = trim($bld_group);
$gender = trim($gender);
$address = trim($address);
$city = trim($city);
$postalcode = trim($postalcode);
$state = trim($state);
$country = trim($country);
$phone = trim($phone);
$mobile_no = trim($mobile_no);
$house_parent_of = trim($house_parent_of);
$class_teacher_of = trim($class_teacher_of);
$login_name = trim($login_name);
$status = trim($status);
$leave_cl = trim($leave_cl);
$leave_el = trim($leave_el);
$leave_ml = trim($leave_ml);
$leave_sl = trim($leave_sl);
mysql_close();
?>

<div class=addform>
<div class="contentA">
<table class=table1>
<h3>Edit Staff Record</h3>
<td><b>Staff Information:</b></td>
<form method="POST" name="std_addform" action="updated.php">

<div align=right>
<font class=message><font color=red>&nbsp;<b> * </b></font> Mandatory fields </font>
<hr align=right style="margin-top:-2px;" width=30% color=orange size=1></div>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Name: </td><td class=td1><input class="text" type="text" name="staff_name" value="<?php echo $staff_name;?>"></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Designation: </td><td class=td1><input size="15" type="text" name="designation" value="<?php echo $designation;?>"></td>
</tr>


<tr class=tr1>
<td class=td1><font color=red><b>&nbsp;&nbsp; </b></font>Teaching Area: </td><td class=td1>
<select name="teach_area">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $teach_area;?>"><?php echo $teach_area;?></option>
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
<td class=td1><font color=red><b>&nbsp;&nbsp; </b></font>Teaching Area: </td><td class=td1>
<select name="teach_area_1">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $teach_area_1;?>"><?php echo $teach_area_1;?></option>
<option style="margin:5px; padding-left: 10px;" value="">-</option>
<option style="margin:5px; padding-left: 10px;" value="Art">Art</option>
<option style="margin:5px; padding-left: 10px;" value="Computer_app">Computer App</option>
<option style="margin:5px; padding-left: 10px;" value="Computer_science">Computer Science</option>
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
<td class=td1><font color=red><b>&nbsp;&nbsp; </b></font>Teaching Area: </td><td class=td1>
<select name="teach_area_2">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $teach_area_2;?>"><?php echo $teach_area_2;?></option>
<option style="margin:5px; padding-left: 10px;" value="">-</option>
<option style="margin:5px; padding-left: 10px;" value="Art">Art</option>
<option style="margin:5px; padding-left: 10px;" value="Computer_app">Computer App</option>
<option style="margin:5px; padding-left: 10px;" value="Computer_science">Computer Science</option>
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
<td class=td1><font color=red><b>* </b></font> Department: </td><td class=td1><input size="15" type="text" name="department" value="<?php echo $department;?>"></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Email: </td><td class=td1><input class="text" type="text" name="staff_email" value="<?php echo $staff_email;?>"></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Date of Birth: </td>
<td class=td1><input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo1" readonly="readonly" name="birth_date" value="<?php echo $birth_date;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Date of Join: </td>
<td class=td1><input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo2" readonly="readonly" name="join_date" value="<?php echo $join_date;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/></td>
</tr>


<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Blood Group: </td><td class=td1>  
<select name="bld_group">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $bld_group;?>"><?php echo $bld_group;?></option>
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
<option style="margin:5px; padding-left: 10px;" value="<?php echo $gender;?>"><?php echo $gender;?></option>
<option style="margin:5px; padding-left: 10px;" value="Male">Male</option>
<option style="margin:5px; padding-left: 10px;" value="Female">Female</option>
</select>
</td>
</tr>


<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Class Teacher of : </td><td class=td1>
<Select NAME="class_teacher_of">
<Option style="margin:5px; padding-left: 10px;" VALUE="<?php echo $class_teacher_of;?>"><?php echo $class_teacher_of;?></option>
<option style="margin:5px; padding-left: 10px;" value="">-</option>
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
<Option style="margin:5px; padding-left: 10px;" VALUE="<?php echo $house_parent_of;?>"><?php echo $house_parent_of;?></option>
<option style="margin:5px; padding-left: 10px;" value="">-</option>
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
<td class=td1><font color=red><b> &nbsp;&nbsp; </b></font> Login Id: </td><td class=td1><input size="20" type="text" name="login_name" value="<?php echo $login_name;?>"></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b> &nbsp;&nbsp; </b></font> Working Status: </td><td class=td1>
<Select NAME="status">
<Option style="margin:5px; padding-left: 10px;" VALUE="<?php echo $status;?>"><?php echo $status;?></option>
<option style="margin:5px; padding-left: 10px;" value="">-</option>
<option style="margin:5px; padding-left: 10px;" value="Working"> Working </option>
<option style="margin:5px; padding-left: 10px;" value="Left"> Left </option>
</td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b> &nbsp;&nbsp; </b></font> Leave Details: </td><td class=td1>
CL : <input size="3" type="text" name="leave_cl" value="<?php echo $leave_cl;?>"> &nbsp;
ML : <input size="3" type="text" name="leave_ml" value="<?php echo $leave_ml;?>"> &nbsp;
EL : <input size="3" type="text" name="leave_el" value="<?php echo $leave_el;?>"> &nbsp;
SL : <input size="3" type="text" name="leave_sl" value="<?php echo $leave_sl;?>"> &nbsp;
</td>
</tr>


<td><br><b>Contact & Address: </b></td>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Phone No: </td><td class=td1><input class="text1" size="20" type="text" name="phone" value="<?php echo $phone;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Mobile No </td><td class=td1><input class="text1" size="20" type="text" name="mobile_no" value="<?php echo $mobile_no;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Street Address: </td><td class=td1><input class="text" type="text" name="address" value="<?php echo $address;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; City/Town: </td><td class=td1><input class="text1" size="20" type="text" name="city" value="<?php echo $city;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Postal Code: </td><td class=td1><input class="text1" size="20" type="text" name="postalcode" value="<?php echo $postalcode;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; State: </td><td class=td1><input class="text1" size="20" type="text" name="state" value="<?php echo $state;?>"></td>
</tr> 

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Country: </td><td class=td1><input class="text1" size="20" type="text" name="country" value="<?php echo $country;?>"></td>
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
<?php
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip' || $_SESSION['user_name'] == 'office')
{
?>
<div align=center>
<input type="submit" name="submitButtonName" value="update"> &nbsp; <input type="button" value="cancel" onclick="window.location='javascript:history.back()'"><input type="hidden" name="id" value="<?=$id;?>">
<hr style="margin-top:2px;" width=30% color=orange size=1>
</div>
</form>
<?php 
}
}
else
{
echo "<b>No Access! Please contact administrator.";
}
?>

</body>
</html>


