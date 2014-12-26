<html>
<head>
<title>add new form...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>
<script language="javascript"> 
//**************************************************************************//
function validateForm()
{
var x=document.forms["std_addform"]["st_name"].value;
if (x==null || x=="")
  {
  alert("Name must be filled out");
  return false;
  }

var x=document.forms["std_addform"]["form_no"].value;
if (x==null || x=="")
  {
  alert("Form no. must be filled out");
  return false;
  }

var x=document.forms["std_addform"]["birth_date"].value;
if (x==null || x=="")
  {
  alert("Date of birth must be filled out");
  return false;
  }

var x=document.forms["std_addform"]["class"].value;
if (x==null || x=="")
  {
  alert("Class must be select");
  return false;
  }

var x=document.forms["std_addform"]["sex"].value;
if (x==null || x=="")
  {
  alert("Gender must be select");
  return false;
  }

var x=document.forms["std_addform"]["mother_tongue"].value;
if (x==null || x=="")
  {
  alert("Mother tongue must be filled out");
  return false;
  }

var x=document.forms["std_addform"]["nationality"].value;
if (x==null || x=="")
  {
  alert("Nationality must be filled out");
  return false;
  }

var x=document.forms["std_addform"]["nri"].value;
if (x==null || x=="")
  {
  alert("Nri must be filled out");
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

var x=document.forms["std_addform"]["fee_paid"].value;
if (x==null || x=="")
  {
  alert("Fee Paid must be select");
  return false;
  }

var x=document.forms["std_addform"]["mobile_no"].value;
if (x==null || x=="")
  {
  alert("Mobile no. must be filled out");
  return false;
  }

var x=document.forms["std_addform"]["city"].value;
if (x==null || x=="")
  {
  alert("City must be filled out");
  return false;
  }

var x=document.forms["std_addform"]["state"].value;
if (x==null || x=="")
  {
  alert("State must be filled out");
  return false;
  }

var x=document.forms["std_addform"]["country"].value;
if (x==null || x=="")
  {
  alert("Country must be filled out");
  return false;
  }
}
//************************************************************************//
</script>
</head>
<body>

<?php
include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip' || $_SESSION['user_name'] == 'office')
{
?>
<form method="post" name="std_addform" action="added.php" onsubmit="return validateForm();">
<div class=addform>
<h3>Add New Form</h3>
<div class="tbody">	
<table class=table1>
<td><b>Students's Information:</b></td>
<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Name: </td><td class=td1><input class="text1" size="25" type="text" name="st_name" value=""></td>
<td class=td1><font color=red><b>* </b></font> Form No: </td><td class=td1><input class="text1" size="8" type="text" name="form_no" value=""></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Date of Birth: </td>
<td class=td1><input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo1" readonly="readonly" name="birth_date" value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/></td>

<td class=td1><font color=red><b>* </b></font> Date of Application: </td>
<td class=td1><input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo2" readonly="readonly" name="recd_date" value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/></td>
</tr>


<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Class: </td><td class=td1>
<SELECT NAME="class">
<option style="margin:5px; padding-left: 10px;" value="">Select</option>
<option style="margin:5px; padding-left: 10px;" value="4">4</option>
<option style="margin:5px; padding-left: 10px;" value="5">5</option>
<option style="margin:5px; padding-left: 10px;" value="6">6</option>
<option style="margin:5px; padding-left: 10px;" value="6">6</option>
<option style="margin:5px; padding-left: 10px;" value="7">7</option>
<option style="margin:5px; padding-left: 10px;" value="7">7</option>
<option style="margin:5px; padding-left: 10px;" value="8">8</option>
<option style="margin:5px; padding-left: 10px;" value="8">8</option>
<option style="margin:5px; padding-left: 10px;" value="9">9</option>
<option style="margin:5px; padding-left: 10px;" value="9">9</option>
<option style="margin:5px; padding-left: 10px;" value="10">10</option>
<option style="margin:5px; padding-left: 10px;" value="10">10</option>
<option style="margin:5px; padding-left: 10px;" value="11">11</option>
<option style="margin:5px; padding-left: 10px;" value="12">12</option>
<option style="margin:5px; padding-left: 10px;" value="Preschool">Preschool</option>
</SELECT> 
</td>

<td class=td1><font color=red><b>* </b></font> Gender: </td><td class=td1>
<select name="sex">
<option style="margin:5px; padding-left: 10px;" value="">Select</option>
<option style="margin:5px; padding-left: 10px;" value="B">B</option>
<option style="margin:5px; padding-left: 10px;" value="G">G</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font>Mother Tongue: </td>
<td class=td1><input class="text1" size="25" type="text" name="mother_tongue" value=""></td>
</td>

<td class=td1><font color=red><b>* </b></font> Applied Earlier: </td>
<td class=td1>
<select name="applied_earlier">
<option value="">Select</option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Nationality :</td>
<td class=td1><input class="text1" size="15" type="text" name="nationality" value=""></td>

<td class=td1><font color=red><b>* </b></font>NRI :</td>
<td class=td1>
<select name="nri">
<option value="">Select</option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Learning Difficulties :</td>
<td class=td1>
<select name="learning_diffy">
<option value="">Select</option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>

<td class=td1>&nbsp;&nbsp; Physical Illness: </td>
<td class=td1>
<select name="phy_illness">
<option value="">Select</option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>
</tr>
</table>

<table class=table1>
<td><br><b>Parent's Information: </b></td>
<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Father's Name: </td><td class=td1><input class="text" type="text" name="father_name" value=""></td>
<td class=td1>&nbsp;&nbsp; Mother's Name: </td><td class=td1><input class="text" type="text" name="mother_name" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Education (F): </td><td class=td1><input class="text" type="text" name="father_edu" value=""></td>
<td class=td1>&nbsp;&nbsp; Education (M): </td><td class=td1><input class="text" type="text" name="mother_edu" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Occupation (F): </td><td class=td1><input class="text" type="text" name="father_job" value=""></td>
<td class=td1>&nbsp;&nbsp; Occupation (M): </td><td class=td1><input class="text" type="text" name="mother_job" value=""></td>
</re>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Email (F): </td><td class=td1><input class="text" type="text" name="email" value=""></td>
<td class=td1>&nbsp;&nbsp; Email (M): </td><td class=td1><input class="text" type="text" name="email_m" value=""></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Phone No: </td><td class=td1><input class="text" type="text" name="phone_no" value=""></td>
<td class=td1><font color=red><b>* </b></font>Mobile No: </td><td class=td1><input class="text" type="text" name="mobile_no" value=""></td>
</tr>
</table>

<table class=table1>
<td><br><b>Other Details: </b></td>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Fee Paid:</td>
<td class=td1>
<select name="fee_paid">
<option value="">Select</option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>

<td class=td1>&nbsp;&nbsp; KFI Link:</td>
<td class=td1>
<select name="kfi_link">
<option value="">Select</option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Siblings in Sahyadri:</td>
<td class=td1>
<select name="siblings">
<option value="">Select</option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>

<td class=td1>&nbsp;&nbsp; Siblings No: </td>
<td class=td1>
<select name="siblings_no">
<option value="">Select</option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Single Parent: </td><td class=td1>
<select name="single_parent">
<option value="">Select</option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>

<td class=td1>&nbsp;&nbsp; Adopted Child: </td><td class=td1>
<select name="adopted_child">
<option value="">Select</option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Separated: </td><td class=td1>
<select name="separated">
<option value="">Select</option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>

<td class=td1>&nbsp;&nbsp; Divorced: </td><td class=td1>
<select name="divorced">
<option value="">Select</option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Information source: </td> 
<td class=td1><input class="text1" size="30" type="text" name="info_source_detail" value=""></td> 
<td class=td1>&nbsp;&nbsp; Remark: </td> 
<td class=td1><input class="text1" size="30" type="text" name="remarks" value="">
</td>
</tr> 
</table>

<table class=table1>
<td><br><b>Address: </b></td>
<tr class=tr1>
<td class=td1 rowspan="2">Postal Address:<br> <TEXTAREA ROWS="3" class="textarea" name="address"></TEXTAREA></td>
<td class=td1><font color=red><b>* </b></font>City/Town: </td> 
<td class=td1><input class="text1" size="15" type="text" name="city" value=""></td> 
<td class=td1><font color=red><b>* </b></font>Postal Code: </td> 
<td class=td1> <input class="text1" size="15" type="text" name="pincode" value=""></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font>State: </td> 
<td class=td1><input class="text1" size="15" type="text" name="state" value=""></td> 
<td class=td1><font color=red><b>* </b></font>Country: </td> 
<td class=td1><input class="text1" size="15" type="text" name="country" value="">
</td>
</tr> 
</table>
</div>
<br>

</div>
<div class="clear"></div>
</div>
<br>
<div align=center>
<input type="submit" name="submit" value="Save Record">
<hr style="margin-top:2px;" width=15% color=orange size=1>
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

