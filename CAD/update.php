
<html>
<head>
<title>Edit student Record...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>
</head>
<body>

<?php
include("index.php");

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'admin')
{
include("connect.php");

$cad_id = $_GET['cad_id'];

$qP = "SELECT * FROM cad_app WHERE cad_id = '$cad_id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$form_no = trim($form_no);
$birth_date = trim($birth_date);
$recd_date = trim($recd_date);
$st_name = trim($st_name);
//$age = trim($age);
$sex = trim($sex);
$class = trim($class);
$remarks = trim($remarks);
$nationality = trim($nationality);
$nri = trim($nri);
$address = trim($address);
$city = trim($city);
$state = trim($state);
$country = trim($country);
$pincode = trim($pincode);
$phone_no = trim($phone_no);
$mobile_no = trim($mobile_no);
$email = trim($email);
$email_m = trim($email_m);
$learning_diffy = trim($learning_diffy);
$phy_illness = trim($phy_illness);
$applied_earlier = trim($applied_earlier);
$info_source_detail = trim($info_source_detail);
$mother_tongue = trim($mother_tongue);
$father_name = trim($father_name);
$mother_name = trim($mother_name);
$father_job = trim($father_job);
$mother_job = trim($mother_job);
$father_edu = trim($father_edu);
$mother_edu = trim($mother_edu);
$siblings = trim($siblings);
$single_parent = trim($single_parent);
$adopted_child = trim($adopted_child);
$separated = trim($separated);
$divorced = trim($divorced);
$fee_paid = trim($fee_paid);
$siblings_no = trim($siblings_no);
$fee_paid = trim($fee_paid);
$kfi_link = trim($kfi_link);
$eng_grade = trim($eng_grade);
$maths_grade = trim($maths_grade);
$overall_grade = trim($overall_grade);
$admn_status = trim($admn_status);
$intervw_date = trim($intervw_date);
$intvw_over = trim($intvw_over);
$pc_profile = trim($pc_profile);
$adm = trim($adm);
$admn_fees_paid = trim($admn_fees_paid);
$age = date_diff(date_create(), date_create($birth_date));
?>

<form method="post" name="std_addform" action="updated.php" onsubmit="return validateForm();">
<div class=addform>
<h3>Edit student record...</h3>
<div class="tbody">
<table class=table1>
<td><b>Students's Information:</b></td>
<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Name: </td><td class=td1><input class="text1" size="25" type="text" name="st_name" value="<?php echo $st_name;?>"></td>
<td class=td1><font color=red><b>* </b></font> Form No: </td><td class=td1><input class="text1" size="8" type="text" name="form_no" value="<?php echo $form_no;?>"></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Date of Birth: </td>
<td class=td1><input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo1" readonly="readonly" name="birth_date" value="<?php echo $birth_date;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/>
&nbsp;&nbsp; Age: <?php echo $age->format("%Y Years, %M Months");?> 
</td>

<td class=td1><font color=red><b>* </b></font> Date of Application: </td>
<td class=td1><input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo2" readonly="readonly" name="recd_date" value="<?php echo $recd_date;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/></td>
</tr>


<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Class: </td><td class=td1>
<SELECT NAME="class">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $class;?>"><?php echo $class;?></option>
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
<option style="margin:5px; padding-left: 10px;" value="<?php echo $sex;?>"><?php echo $sex;?></option>
<option style="margin:5px; padding-left: 10px;" value="B">B</option>
<option style="margin:5px; padding-left: 10px;" value="G">G</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Mother Tounge: </td>
<td class=td1><input class="text1" size="25" type="text" name="mother_tongue" value="<?php echo $mother_tongue;?>"></td>
</td>

<td class=td1><font color=red><b>* </b></font> Applied Earlier: </td>
<td class=td1>
<select name="applied_earlier">
<option value="<?php echo $applied_earlier;?>"><?php echo $applied_earlier;?></option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font> Nationality :</td>
<td class=td1><input class="text1" size="15" type="text" name="nationality" value="<?php echo $nationality;?>"></td>

<td class=td1><font color=red><b>* </b></font>NRI :</td>
<td class=td1>
<select name="nri">
<option value="<?php echo $nri;?>"><?php echo $nri;?></option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Learning Difficulties :</td>
<td class=td1>
<select name="learning_diffy">
<option value="<?php echo $learning_diffy;?>"><?php echo $learning_diffy;?></option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>

<td class=td1>&nbsp;&nbsp; Physical Illness: </td>
<td class=td1>
<select name="phy_illness">
<option value="<?php echo $phy_illness;?>"><?php echo $phy_illness;?></option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>
</tr>
</table>

<table class=table1>
<td><br><b>Parent's Information: </b></td>
<tr class=tr1>
<td class=td1><font color=red><b>* </b></font>Father's Name: </td><td class=td1><input class="text" type="text" name="father_name" value="<?php echo $father_name;?>"></td>
<td class=td1><font color=red><b>* </b></font>Mother's Name: </td><td class=td1><input class="text" type="text" name="mother_name" value="<?php echo $mother_name;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Education (F): </td><td class=td1><input class="text" type="text" name="father_edu" value="<?php echo $father_edu;?>"></td>
<td class=td1>&nbsp;&nbsp; Education (M): </td><td class=td1><input class="text" type="text" name="mother_edu" value="<?php echo $mother_edu;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Occupation (F): </td><td class=td1><input class="text" type="text" name="father_job" value="<?php echo $father_job;?>"></td>
<td class=td1>&nbsp;&nbsp; Occupation (M): </td><td class=td1><input class="text" type="text" name="mother_job" value="<?php echo $mother_job;?>"></td>
</re>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Email (F): </td><td class=td1><input class="text" type="text" name="email" value="<?php echo $email;?>"></td>
<td class=td1>&nbsp;&nbsp; Email (M): </td><td class=td1><input class="text" type="text" name="email_m" value="<?php echo $email_m;?>"></td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Phone No: </td><td class=td1><input class="text" type="text" name="phone_no" value="<?php echo $phone_no;?>"></td>
<td class=td1><font color=red><b>* </b></font>Mobile No: </td><td class=td1><input class="text" type="text" name="mobile_no" value="<?php echo $mobile_no;?>"></td>
</tr>
</table>

<table class=table1>
<td><br><b>Other Details: </b></td>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font>Appl Fees Paid:</td>
<td class=td1>
<select name="fee_paid">
<option value="<?php echo $fee_paid;?>"><?php echo $fee_paid;?></option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>

<td class=td1>&nbsp;&nbsp; KFI Link:</td>
<td class=td1>
<select name="kfi_link">
<option value="<?php echo $kfi_link;?>"><?php echo $kfi_link;?></option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Siblings in Sahyadri:</td>
<td class=td1>
<select name="siblings">
<option value="<?php echo $siblings;?>"><?php echo $siblings;?></option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>

<td class=td1>&nbsp;&nbsp; Siblings No: </td>
<td class=td1>
<select name="siblings_no">
<option value="<?php echo $siblings_no;?>"><?php echo $siblings_no;?></option>
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
<option value="<?php echo $single_parent;?>"><?php echo $single_parent;?></option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>

<td class=td1>&nbsp;&nbsp; Adopted Child: </td><td class=td1>
<select name="adopted_child">
<option value="<?php echo $adopted_child;?>"><?php echo $adopted_child;?></option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Separated: </td><td class=td1>
<select name="separated">
<option value="<?php echo $separated;?>"><?php echo $separated;?></option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>

<td class=td1>&nbsp;&nbsp; Divorced: </td><td class=td1>
<select name="divorced">
<option value="<?php echo $divorced;?>"><?php echo $divorced;?></option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Information source: </td> 
<td class=td1><input class="text1" size="30" type="text" name="info_source_detail" value="<?php echo $info_source_detail;?>"></td> 
<td class=td1>&nbsp;&nbsp; Remark: </td> 
<td class=td1><input class="text1" size="30" type="text" name="remarks" value="<?php echo $remarks;?>">
</td>
</tr> 
</table>

<table class=table1>
<td><br><b>Address: </b></td>
<tr class=tr1>
<td class=td1 rowspan="2">Postal Address:<br> <TEXTAREA ROWS="3" class="textarea" name="address"><?php echo $address;?></TEXTAREA></td>
<td class=td1><font color=red><b>* </b></font>City/Town: </td> 
<td class=td1><input class="text1" size="15" type="text" name="city" value="<?php echo $city;?>"></td> 
<td class=td1><font color=red><b>* </b></font>Postal Code: </td> 
<td class=td1> <input class="text1" size="15" type="text" name="pincode" value="<?php echo $pincode;?>"></td>
</tr>

<tr class=tr1>
<td class=td1><font color=red><b>* </b></font>State: </td> 
<td class=td1><input class="text1" size="15" type="text" name="state" value="<?php echo $state;?>"></td> 
<td class=td1><font color=red><b>* </b></font>Country: </td> 
<td class=td1><input class="text1" size="15" type="text" name="country" value="<?php echo $country;?>">
</td>
</tr> 
</table>

<table class=table1>
<td><br><b>Office Inputs: </b></td>
<tr class=tr1>
<td class=td1>&nbsp;&nbsp; Interview Date: </td>
<td class=td1><input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo5" readonly="readonly" name="intervw_date" value="<?php echo $intervw_date;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo5','yyyyMMdd')" style="cursor:pointer"/>
</td>

<td class=td1>&nbsp;&nbsp; Interview Over: </td><td class=td1>
<select name="intvw_over">
<option value="<?php echo $intvw_over;?>"><?php echo $intvw_over;?></option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>

<td class=td1>&nbsp;&nbsp; Admn Status: </td><td class=td1>
<select name="admn_status">
<option value="<?php echo $admn_status;?>"><?php echo $admn_status;?></option>
<option value="Admit">Admit</option>
<option value="Hold">Hold</option>
<option value="Waitlist">Waitlist</option>
<option value="Reject">Reject</option>
<option value="New">New</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; English Grade: </td>
<td class=td1>
<select name="eng_grade">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $eng_grade;?>"><?php echo $eng_grade;?></option>
<option style="margin:5px; padding-left: 10px;" value="">-</option>
<option style="margin:5px; padding-left: 10px;" value="A+">A+</option>
<option style="margin:5px; padding-left: 10px;" value="A">A</option>
<option style="margin:5px; padding-left: 10px;" value="B+">B+</option>
<option style="margin:5px; padding-left: 10px;" value="B">B</option>
<option style="margin:5px; padding-left: 10px;" value="C">C</option>
<option style="margin:5px; padding-left: 10px;" value="D">D</option>
</select>
</td>

<td class=td1>&nbsp;&nbsp; Maths Grade: </td>
<td class=td1>
<select name="maths_grade">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $maths_grade;?>"><?php echo $maths_grade;?></option>
<option style="margin:5px; padding-left: 10px;" value="">-</option>
<option style="margin:5px; padding-left: 10px;" value="A+">A+</option>
<option style="margin:5px; padding-left: 10px;" value="A">A</option>
<option style="margin:5px; padding-left: 10px;" value="B+">B+</option>
<option style="margin:5px; padding-left: 10px;" value="B">B</option>
<option style="margin:5px; padding-left: 10px;" value="C">C</option>
<option style="margin:5px; padding-left: 10px;" value="D">D</option>
</select>
</td>

<td class=td1>&nbsp;&nbsp; Overall Grade: </td>
<td class=td1>
<select name="overall_grade">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $overall_grade;?>"><?php echo $overall_grade;?></option>
<option style="margin:5px; padding-left: 10px;" value="">-</option>
<option style="margin:5px; padding-left: 10px;" value="A+">A+</option>
<option style="margin:5px; padding-left: 10px;" value="A">A</option>
<option style="margin:5px; padding-left: 10px;" value="B+">B+</option>
<option style="margin:5px; padding-left: 10px;" value="B">B</option>
<option style="margin:5px; padding-left: 10px;" value="C">C</option>
<option style="margin:5px; padding-left: 10px;" value="D">D</option>
</select>
</td>
</tr>

<tr class=tr1>
<td class=td1>&nbsp;&nbsp; PC Profile: </td>
<td class=td1>
<select name="pc_profile">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $pc_profile;?>"><?php echo $pc_profile;?></option>
<option style="margin:5px; padding-left: 10px;" value="">-</option>
<option style="margin:5px; padding-left: 10px;" value="A+">A+</option>
<option style="margin:5px; padding-left: 10px;" value="A">A</option>
<option style="margin:5px; padding-left: 10px;" value="B+">B+</option>
<option style="margin:5px; padding-left: 10px;" value="B">B</option>
<option style="margin:5px; padding-left: 10px;" value="C">C</option>
<option style="margin:5px; padding-left: 10px;" value="D">D</option>
</select>
</td>

<td class=td1>&nbsp;&nbsp; Admn Fees Paid: </td><td class=td1>
<select name="admn_fees_paid">
<option value="<?php echo $admn_fees_paid;?>"><?php echo $admn_fees_paid;?></option>
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
</td>

<td class=td1>&nbsp;&nbsp; Admn No: </td>
<td class=td1><input size="5" style="text-align:center;" name="adm" value="<?php echo $adm;?>">
</td>
</tr>

</table>
<br>
</div>
</div>
<div class="clear"></div>
</div>
<br>
<div align=center>
<input type="submit" name="update" value="Update"/><input type="hidden" name="cad_id" value="<?php echo $cad_id;?>"> &nbsp; <input type="button" value="cancel" onclick="window.location='javascript:history.back()'">
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

