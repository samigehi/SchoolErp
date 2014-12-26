<?php
if (!isset($_SESSION)) {
session_start();
}
?>

<html>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>Sahyadri School | Alumni Registration</title>
<link rel="stylesheet" type="text/css" href="css/new.css" />
<script src="calendar/datetimepicker_css.js"></script>
<script src="js/validate_addform.js"></script>
</head>  
<body> 

<?php
include ("index.php");

if (isset($_GET['user_id']) && $_SESSION['user_name'] == 'admin'){
include ("connect.php");
?>
<div id="column2">
<?php
$user_id = $_GET['user_id'];

$qP = "SELECT * FROM members WHERE user_id = '$user_id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);
	$st_name = trim($st_name);
	$st_mobile_no = trim($st_mobile_no);
	$adm = trim($adm);
	$gender = trim($gender);
	$birth_date = trim($birth_date);
	$join_class = trim($join_class);
	$join_year = trim($join_year);
	$left_class = trim($left_class);
	$address = trim($address);
	$city = trim($city);
	$state = trim($state);
	$country = trim($country);
	$postal_code = trim($postal_code);
	$institution_studing = trim($institution_studing);
	$course_studing = trim($course_studing);
	$year_studing = trim($year_studing);
	$location_studing = trim($location_studing);
	$major_studing = trim($major_studing);
	$organisation_working = trim($organisation_working);
	$designation_working = trim($designation_working);
	$location_working = trim($location_working);
	$qualification_working = trim($qualification_working);
	$major_working = trim($major_working);
	$institute_working = trim($institute_working);
	$fa_name = trim($fa_name);
	$fa_email = trim($fa_email);
	$fa_mobile_no = trim($fa_mobile_no);
	$fa_occupation = trim($fa_occupation);		
	$mo_name = trim($mo_name);
	$mo_email = trim($mo_email);	
	$mo_mobile_no = trim($mo_mobile_no);
	$mo_occupation = trim($mo_occupation);
	$added_date = trim($added_date);
	$contribute = trim($contribute);
	$batch = trim($batch);
	mysql_close();
	?>

<form method="post" action="updated.php" name="profile_update">
<div align="right"><font color="green"> Profile updated on - <?php echo $update_date;?></font></div>
<h1>Edit profile</h1>
<table class=table1>
<form method="post" name="a_addform" action="update.php" onsubmit="return validateForm();">

<td><b>Personal Details: </b></td>

<tr class=tr1>
<td class=td1><font color=red>* </font> Name </td><td class=td1><input class="text1" size="40" type="text" name="st_name" value="<?php echo $st_name;?>"></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red>* </font> Email Address (Username)</td><td class=td1><input class="text1" size="40" type="text" name="username" value="<?php echo $username;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; </font> Admission No. </td><td class=td1><input class="text1" size="20" type="text" name="adm" value="<?php echo $adm;?>"></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red>* </font> Gender </td><td class=td1>
<select name="gender">
<option value="<?php echo $gender;?>"><?php echo $gender;?></option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1><font color=red>* </font> Date of Birth </td>
<td class=td1><input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo1" readonly="readonly" name="birth_date" value="<?php echo $birth_date;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/></td></tr>

<tr>
<td class=td1><font color=red>* </font> Joined in </td>
<td class=td1>
Class: &nbsp;
<SELECT NAME="join_class">
<option value="<?php echo $join_class;?>"> <?php echo $join_class;?> </option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6A">6A</option>
<option value="6B">6B</option>
<option value="7A">7A</option>
<option value="7B">7B</option>
<option value="8A">8A</option>
<option value="8B">8B</option>
<option value="9A">9A</option>
<option value="9B">9B</option>
<option value="10A">10A</option>
<option value="10B">10B</option>
</SELECT> 
&nbsp; Year: 
<select name="join_year">
<option value="<?php echo $join_year;?>"> <?php echo $join_year;?> </option> 
<?php
// Make the years array.
$years = range (2020, 1995);

// Make the years pull-down menu.
foreach ($years as $value) {
echo "<option value=\"$value\">$value</option>\n";
}
?>
</select>  
</td>
</tr>

<tr>
<td class=td1><font color=red>* </font> Studied up to </td>
<td class=td1>
Class: &nbsp; 
<SELECT NAME="left_class">
<option value="<?php echo $left_class;?>"> <?php echo $left_class;?> </option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6A">6A</option>
<option value="6B">6B</option>
<option value="7A">7A</option>
<option value="7B">7B</option>
<option value="8A">8A</option>
<option value="8B">8B</option>
<option value="9A">9A</option>
<option value="9B">9B</option>
<option value="10A">10A</option>
<option value="10B">10B</option>
</SELECT>   
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; </font> Batch </td><td class=td1>
<select name="batch">
<option value="<?php echo $batch;?>"> <?php echo $batch;?> </option> 
<?php
// Make the years array.
$cur_date = date ("Y");
$years = range ($cur_date, 1995);
// Make the years pull-down menu.
foreach ($years as $value) {
echo "<option value=\"$value\">$value</option>\n";
}
?>
</select>  
</td>
</tr>

<tr class=tr1>
<td class=td1><font color=red>* </font> Mobile No. </td><td class=td1><input class="text1" size="40" type="text" name="st_mobile_no" value="<?php echo $st_mobile_no;?>"></td>
</tr>

<td><br><b>Address for Correspondence: </b></td>
<tr>
<td class=td1>&nbsp;&nbsp; Street Address </td><td class=td1>
<TEXTAREA ROWS="2" class="textarea" name="address"><?php echo $address;?></TEXTAREA>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; City/Town </td><td class=td1><input class="text1" size="20" type="text" name="city" value="<?php echo $city;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Postal Code </td><td class=td1><input class="text1" size="20" type="text" name="postal_code" value="<?php echo $postal_code;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; State </td><td class=td1><input class="text1" size="20" type="text" name="state" value="<?php echo $state;?>"></td>
</tr> 

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Country </td><td class=td1><input class="text1" size="20" type="text" name="country" value="<?php echo $country;?>"></td>
</tr> 


<td><br><b>If you are studying, fill in the following details</b></td>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; University / College </td><td class=td1><input class="text1" size="40" type="text" name="institution_studing" value="<?php echo $institution_studing;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Course being Pursued </td><td class=td1><input class="text" type="text" name="course_studing" value="<?php echo $course_studing;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Studying in the Year/ Semester </td><td class=td1><input class="text" type="text" name="year_studing" value="<?php echo $year_studing;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp;  Location </td><td class=td1><input class="text" type="text" name="location_studing" value="<?php echo $location_studing;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Specialization / Major </td><td class=td1><input class="text1" size="40" type="text" name="major_studing" value="<?php echo $major_studing;?>"></td>
</tr>

<td><br><b>If you are working, fill in the following details</b></td>
<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Organisation </td><td class=td1><input class="text" type="text" name="organisation_working" value="<?php echo $organisation_working;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Designation </td><td class=td1><input class="text" type="text" name="designation_working" value="<?php echo $designation_working;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp;  Location </td><td class=td1><input class="text" type="text" name="location_working" value="<?php echo $location_working;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp;  Highest Qualification Held </td><td class=td1><input class="text" type="text" name="qualification_working" value="<?php echo $qualification_working;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; University / College </td><td class=td1><input class="text1" size="40" type="text" name="institute_working" value="<?php echo $institute_working;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Specialization / Major </td><td class=td1><input class="text1" size="40" type="text" name="major_working" value="<?php echo $major_working;?>"></td>
</tr>

<td><br><b>Father's Details: </b></td>
<tr class=tr1>
<td class=td1><font color=red><b>&nbsp; </b></font> Father's Name </td><td class=td1><input class="text" type="text" name="fa_name" value="<?php echo $fa_name;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Occupation </td><td class=td1><input class="text1" size="40" type="text" name="fa_occupation" value="<?php echo $fa_occupation;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Email </td><td class=td1><input class="text1" size="40" type="text" name="fa_email" value="<?php echo $fa_email;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Mobile No. </td><td class=td1><input class="text1" size="40" type="text" name="fa_mobile_no" value="<?php echo $fa_mobile_no;?>"></td>
</tr>

<td><br><b>Mother's Details: </b></td>
<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Mother's Name </td><td class=td1><input class="text" type="text" name="mo_name" value="<?php echo $mo_name;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Occupation </td><td class=td1><input class="text1" size="40" type="text" name="mo_occupation" value="<?php echo $mo_occupation;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Email </td><td class=td1><input class="text1" size="40" type="text" name="mo_email" value="<?php echo $mo_email;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Mobile No. </td><td class=td1><input class="text1" size="40" type="text" name="mo_mobile_no" value="<?php echo $mo_mobile_no;?>"></td>
</tr>

<tr>
<td class=td1>&nbsp;&nbsp; Please mention how you would like to participate in school <br> &nbsp;&nbsp; events or contribute to the school.
</td><td class=td1><TEXTAREA ROWS="4" style="width:350px;" name="contribute"><?php echo $contribute;?></TEXTAREA>
</td>
</tr>
</table>

<br>
<div align=center>
<input type="submit" class="submit" name="update" value="update"><input type="button" class="submit" value="cancel" onclick="window.location='login.php'">
<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
<hr style="margin-top:2px;" width=35% color=orange size=1>
</div>
</form>

<?php
}
else
{
echo "<div style='text-align:center; color:red;'>Please contact the administrator for editing rights.</div>";
}
?>
 
</div>
</div>
 
</body>
</html>
