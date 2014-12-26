<?php
include("index.php");

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip' || $_SESSION['user_name'] == 'office')
{
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
var x=document.forms["std_addform"]["name"].value;
if (x==null || x=="")
  {
  alert("Name must be filled out");
  return false;
  }

var x=document.forms["std_addform"]["adm"].value;
if (x==null || x=="")
  {
  alert("Admission no. must be filled out");
  return false;
  }

var x=document.forms["std_addform"]["birth_date"].value;
if (x==null || x=="")
  {
  alert("date of birth must be filled out");
  return false;
  }

var x=document.forms["std_addform"]["class"].value;
if (x==null || x=="")
  {
  alert("class must be filled out");
  return false;
  }

var x=document.forms["std_addform"]["weemail"].value;
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
<div class=addform>
<div class="contentA">

<table class=table1>
<h3>Add new student</h3>

<td><b>Students's Information:</b></td>

<form method="post" name="std_addform" action="added.php" onsubmit="return validateForm();">

<div align=right>
<font class=message><font color=red>&nbsp;<b> * </b></font> Mandatory fields </font>
<hr align=right style="margin-top:-2px;" width=30% color=orange size=1></div>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Name: </td><td class=td1><input class="text" type="text" name="name" value=""></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Admission No: </td><td class=td1><input class="text1" size="10" type="text" name="adm" value=""></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Date of Birth: </td>
<td class=td1><input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo1" readonly="readonly" name="birth_date" value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/></td>
</tr>

<tr>
<td class=td1><font color=red><b>* </b></font> Date of Adm: </td>
<td class=td1><input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo2" readonly="readonly" name="adm_date" value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Class: </td><td class=td1>
<SELECT NAME="class">
<option style="margin:5px; padding-left: 10px;" value="">- select -</option>
<option style="margin:5px; padding-left: 10px;" value="4">4</option>
<option style="margin:5px; padding-left: 10px;" value="5">5</option>
<option style="margin:5px; padding-left: 10px;" value="6A">6A</option>
<option style="margin:5px; padding-left: 10px;" value="6B">6B</option>
<option style="margin:5px; padding-left: 10px;" value="7A">7A</option>
<option style="margin:5px; padding-left: 10px;" value="7B">7B</option>
<option style="margin:5px; padding-left: 10px;" value="8A">8A</option>
<option style="margin:5px; padding-left: 10px;" value="8B">8B</option>
<option style="margin:5px; padding-left: 10px;" value="9A">9A</option>
<option style="margin:5px; padding-left: 10px;" value="9B">9B</option>
<option style="margin:5px; padding-left: 10px;" value="10A">10A</option>
<option style="margin:5px; padding-left: 10px;" value="10B">10B</option>
<option style="margin:5px; padding-left: 10px;" value="11">11</option>
<option style="margin:5px; padding-left: 10px;" value="12">12</option>
<option style="margin:5px; padding-left: 10px;" value="Preschool">Preschool</option>
</SELECT> 
</td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b> &nbsp;&nbsp; </b></font> House: </td><td class=td1> 
<Select NAME="house">
<Option style="margin:5px; padding-left: 10px;" VALUE="">- select -</option>
<option style="margin:5px; padding-left: 10px;" value="Alaknanda"> Alaknanda </option>
<option style="margin:5px; padding-left: 10px;" value="Himadri"> Himadri </option>
<option style="margin:5px; padding-left: 10px;" value="Indrayani"> Indrayani </option>
<option style="margin:5px; padding-left: 10px;" value="Jaintia"> Jaintia </option>
<option style="margin:5px; padding-left: 10px;" value="Krittika"> Krittika </option>
<option style="margin:5px; padding-left: 10px;" value="Palash"> Palash </option>
<option style="margin:5px; padding-left: 10px;" value="Phalguni"> Phalguni </option>
<option style="margin:5px; padding-left: 10px;" value="Shivneri"> Shivneri </option>
<option style="margin:5px; padding-left: 10px;" value="Shravani"> Shravani </option>
<option style="margin:5px; padding-left: 10px;" value="Torna"> Torna </option>
<option style="margin:5px; padding-left: 10px;" value="Vishakha"> Vishakha </option>
<option style="margin:5px; padding-left: 10px;" value="BD1"> BD1 </option>
<option style="margin:5px; padding-left: 10px;" value="BD2"> BD2 </option>
<option style="margin:5px; padding-left: 10px;" value="D/s"> D/s </option>
</Select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Blood Group: </td><td class=td1>  
<select name="bldgroup">
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
<select name="sex">
<option style="margin:5px; padding-left: 10px;" value="">- select -</option>
<option style="margin:5px; padding-left: 10px;" value="B">B</option>
<option style="margin:5px; padding-left: 10px;" value="G">G</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; House Parent: </td>
<td class=td1>
<select name="house_parent">
<option style="margin:5px; padding-left: 10px;" value="">-- Select --</option><br>
<?php
//Select teacher's name from staff table
include("staff_connect.php");
$sql1="SELECT staff_name FROM staff WHERE designation = 'teacher' ORDER BY staff_name";
$result1=mysql_query($sql1);

while ($row1=mysql_fetch_array($result1)) {

echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
?>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Class Teacher: </td>
<td class=td1>
<select name="class_teach">
<option style="margin:5px; padding-left: 10px;" value="">-- Select --</option><br>
<?php
//Select teacher's name from staff table
$result1=mysql_query($sql1);
while ($row2=mysql_fetch_array($result1)) {

echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row2[staff_name]\">$row2[staff_name]</option>");
}
?>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Hobby1: </td><td class=td1>
<select name="hobby_1">
<option style="margin:5px; padding-left: 10px;" value="">- select -</option>
<option style="margin:5px; padding-left: 10px;" value="Bharatnatyam">Bharatnatyam</option>
<option style="margin:5px; padding-left: 10px;" value="Guitar">Guitar</option>
<option style="margin:5px; padding-left: 10px;" value="Piano">Piano</option>
<option style="margin:5px; padding-left: 10px;" value="Sitar">Sitar</option>
<option style="margin:5px; padding-left: 10px;" value="Tabla">Tabla</option>
<option style="margin:5px; padding-left: 10px;" value="Violin">Violin</option>
<option style="margin:5px; padding-left: 10px;" value="Vocal Music">Vocal Music</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Hobby2: </td><td class=td1>
<select name="hobby_2">
<option style="margin:5px; padding-left: 10px;" value="">- select -</option>
<option style="margin:5px; padding-left: 10px;" value="Bharatnatyam">Bharatnatyam</option>
<option style="margin:5px; padding-left: 10px;" value="Guitar">Guitar</option>
<option style="margin:5px; padding-left: 10px;" value="Piano">Piano</option>
<option style="margin:5px; padding-left: 10px;" value="Sitar">Sitar</option>
<option style="margin:5px; padding-left: 10px;" value="Tabla">Tabla</option>
<option style="margin:5px; padding-left: 10px;" value="Violin">Violin</option>
<option style="margin:5px; padding-left: 10px;" value="Vocal Music">Vocal Music</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Hobby3: </td><td class=td1>
<select name="hobby_3">
<option style="margin:5px; padding-left: 10px;" value="">- select -</option>
<option style="margin:5px; padding-left: 10px;" value="Bharatnatyam">Bharatnatyam</option>
<option style="margin:5px; padding-left: 10px;" value="Guitar">Guitar</option>
<option style="margin:5px; padding-left: 10px;" value="Piano">Piano</option>
<option style="margin:5px; padding-left: 10px;" value="Sitar">Sitar</option>
<option style="margin:5px; padding-left: 10px;" value="Tabla">Tabla</option>
<option style="margin:5px; padding-left: 10px;" value="Violin">Violin</option>
<option style="margin:5px; padding-left: 10px;" value="Vocal Music">Vocal Music</option>
</select>
</td>
</tr>


<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Class 9/10 - Group VI Subject: </td><td class=td1>
<select name="six_sub">
<option style="margin:5px; padding-left: 10px;" value="">- select -</option>
<option style="margin:5px; padding-left: 10px;" value="Art">Art</option>
<option style="margin:5px; padding-left: 10px;" value="Computer Application">Computer Application</option>
<option style="margin:5px; padding-left: 10px;" value="Economic Application">Economic Application</option>
<option style="margin:5px; padding-left: 10px;" value="Hindustani Music">Hindustani Music</option>
<option style="margin:5px; padding-left: 10px;" value="Physical Education">Physical Education</option>
</select>
</td>
</tr>


<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Second Language: </td><td class=td1>
<select name="second_lang">
<option style="margin:5px; padding-left: 10px;" value="">- select -</option>
<option style="margin:5px; padding-left: 10px;" value="French">French</option>
<option style="margin:5px; padding-left: 10px;" value="Hindi">Hindi</option>
<option style="margin:5px; padding-left: 10px;" value="Marathi">Marathi</option>
<option style="margin:5px; padding-left: 10px;" value="Urdu">Urdu</option>
</select>
</td>
</tr>


<td><br><b>Parent's Information: </b></td>
<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Father's Name: </td><td class=td1><input class="text" type="text" name="parent1" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Mother's Name: </td><td class=td1><input class="text" type="text" name="parent2" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Occupation (F): </td><td class=td1><input class="text" type="text" name="occupation" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Occupation (M): </td><td class=td1><input class="text" type="text" name="occupation_2" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Email (F): </td><td class=td1><input class="text" type="text" name="email" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Email (M): </td><td class=td1><input class="text" type="text" name="email_2" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Phone No: </td><td class=td1><input class="text" type="text" name="phone" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Mobile No (F): </td><td class=td1><input class="text" type="text" name="mobile_no" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Mobile No (M): </td><td class=td1><input class="text" type="text" name="mobile_no_2" value=""></td>
</tr>

<td><br><b>Address: </b></td>

<tr>
<td class=td1>Postal Address: </td><td class=td1>
<TEXTAREA ROWS="2" class="textarea" name="address1"></TEXTAREA>
</td>
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
else 
{
echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
}
?>

</body>
</html>

