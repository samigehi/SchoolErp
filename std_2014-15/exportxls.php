<html>
<head>
<title>export to xls...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="calendar/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="calendar/jsDatePick.min.1.3.js"></script>		
</head>
<body>

<?php
include("index.php");
?>
<table class=table1 style="background-color:#CCFFCC; width:100%;">
<font color=red><b>*</b></font><font style="color:blue; font-weight:normal;"> Export Class / House list to excel </font> 
<tr>
<td class=td1>

<form method="post" action="xls.php" name="form4">
Class List: <Select NAME="class">
<Option style="margin:5px; padding-left: 10px;" VALUE="">-- Class --</option>
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
<option style="margin:5px; padding-left: 10px;"value="10A"> 10A </option>
<option style="margin:5px; padding-left: 10px;"value="10B"> 10B </option>
</Select> &nbsp; &nbsp;

</td>
</tr>
<tr>
</table>
<br>

<table class=table1 style="background-color:#CCFFCC; width:100%;">
<td><b>Students's Information:</b></td>
<tr>
<td class=td1><input type="checkbox" name="name1" checked="checked" value="name">Name </td>
<td class=td1><input type="checkbox" name="adm1" value="adm">Adm No. </td>
<td class=td1><input type="checkbox" name="class1" value="class">Class </td>
<td class=td1><input type="checkbox" name="house1" value="house">House </td>
<td class=td1><input type="checkbox" name="birth_date1" value="birth_date">Date of Birth </td>
<td class=td1><input type="checkbox" name="bldgroup1" value="bldgroup">Blood Group </td>
<td class=td1><input type="checkbox" name="sex1" value="sex">Gender </td>
</tr>

<tr>
<td class=td1><input type="checkbox" name="house_parent1" value="house_parent">House Parent </td>
<td class=td1><input type="checkbox" name="class_teach1" value="class_teach">Class Teacher </td>
<td class=td1><input type="checkbox" name="hobby1_1" value="hobby1">Hobby 1 </td>
<td class=td1><input type="checkbox" name="hobby2_1" value="hobby2">Hobby 2 </td>
<td class=td1><input type="checkbox" name="hobby3_1" value="hobby3">Hobby 3 </td>
<td class=td1><input type="checkbox" name="six_sub1" value="six_sub">Class 9/10 - Group VI Subject </td>
<td class=td1><input type="checkbox" name="second_lang1" value="second_lang">Second Language </td>
</tr>


<td><b>Parent's Information: </b></td>
<tr>
<td class=td1><input type="checkbox" name="parent1" value="parent1">Father's Name </td>
<td class=td1><input type="checkbox" name="parent2" value="parent2">Mother's Name </td>
<td class=td1><input type="checkbox" name="occupation" value="occupation">Occupation (F) </td>
<td class=td1><input type="checkbox" name="occupation_2" value="occupation_2">Occupation (M) </td>
<td class=td1><input type="checkbox" name="email" value="email">Email (F) </td>
<td class=td1><input type="checkbox" name="email_2" value="email_2">Email (M) </td>
<td class=td1><input type="checkbox" name="phone" value="phone">Phone No</td>
</tr>

<tr>
<td class=td1><input type="checkbox" name="mobile_no" value="mobile_no">Moblie (F) </td>
<td class=td1><input type="checkbox" name="mobile_no_2" value="mobile_no_2">Moblie (M) </td>
<td class=td1><input type="checkbox" name="address1" value="address1">Postal Address </td>
<td class=td1><input type="checkbox" name="city" value="city">City</td>
<td class=td1><input type="checkbox" name="pincode" value="pincode">Pin Code</td>
<td class=td1><input type="checkbox" name="state" value="state">State</td>
<td class=td1><input type="checkbox" name="country" value="country">Country </td>
</tr>
</table>
<br>
<div align=center>
<input type="submit" name="submit" value="submit"> &nbsp; <input type="button" value="cancel" onclick="window.location='javascript:history.back()'">
<hr style="margin-top:2px;" width=30% color=orange size=1>
</div>
</form>

</div>
<div class="clear"></div>
</div>
<br>
</body>
</html>


