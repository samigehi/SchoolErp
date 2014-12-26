<html>
<head>
<title>update record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>
<script type="text/javascript">
  var win=null;
  function printIt(printThis)
  {
    win = window.open();
    self.focus();
    win.document.open();
    win.document.write('<'+'html'+'><'+'head'+'><'+'style'+'>');
    win.document.write('body { font-family: Verdana; font-size: 10px;}');
    win.document.write('table {font-family:verdana,arial,sans-serif; margin:auto auto auto auto; width:90%; font-size:10px; color:#333333; border-collapse: collapse;}');
    win.document.write('td {border-width:1px; padding:5px; border-style:solid; border-color:#999999;}');
    win.document.write('input {font-family: Verdana; font-size: 10px; width:250px; border:0px; }');
    win.document.write('select {font-family: Verdana; font-size: 10px; width:200px; border:0px; }');
    win.document.write('textarea {font-family: Verdana; font-size: 10px; width:250px; border:0px; }');
    win.document.write('<'+'/'+'style'+'><'+'/'+'head'+'><'+'body'+'>');
    win.document.write(printThis);
    win.document.write('<'+'/'+'body'+'><'+'/'+'html'+'>');
    win.document.close();
    win.print();
    win.close();
  }
</script>

</head>
<body>

<?php

include("index.php");
include("connect.php");

$id = $_GET['id'];

$qP = "SELECT * FROM std_2012_13 WHERE id = '$id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);
$adm = trim($adm);
$name = trim($name);
$birth_date = trim($birth_date);
$adm_date = trim($adm_date);
$sex = trim($sex);
$class = trim($class);
$bldgroup = trim($bldgroup);
$class_teach = trim($class_teach);
$house = trim($house);
$house_parent = trim($house_parent);
$hobby_1 = trim($hobby_1);
$hobby_2 = trim($hobby_2);
$hobby_3 = trim($hobby_3);
$six_sub = trim($six_sub);
$second_lang = trim($second_lang);
$parent1 = trim($parent1);
$parent2 = trim($parent2);
$occupation = trim($occupation);
$occupation_2 = trim($occupation_2);
$address1 = trim($address1);
$address2 = trim($address2);
$address3 = trim($address3);
$city = trim($city);
$postalcode = trim($postalcode);
$state = trim($state);
$country = trim($country);
$phone = trim($phone);
$mobile_no = trim($mobile_no);
$mobile_no_2 = trim($mobile_no_2);
$email = trim($email);
$email_2 = trim($email_2);
$idphoto = trim($idphoto);

mysql_close();
?>

<div class=addform>
<div class="contentA">

<div align="left"><?php echo "<a href='edit_xls.php?adm=$adm' title='Export to xls'>Export to xls</a>";?> &nbsp; &nbsp; &nbsp; <?php echo "<a href='edit_pdf.php?adm=$adm' title='Export to pdf'>Export to pdf</a>";?> &nbsp; &nbsp; &nbsp; <a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false">
Print Record
</a>
<div id="printme">
<table class=table1>
<h3>Edit student record...</h3>

<td><b>Students's Information:</b></td><td>&nbsp;</td>

<form name="editform" method="GET" action="update.php">

<tr>
<td class=td1> Name: </td><td class=td1><input class="text" type="text" readonly="readonly" name="name" value="<?php echo $name;?>"></td>
</tr>

<tr>
<td class=td1> Admission No: </td><td class=td1><input class="text1" size="10" type="text" readonly="readonly" name="adm" value="<?php echo $adm;?>"></td>
</tr>

<tr>
<td class=td1> Date of Birth: </td>
<td class=td1><input class="text1" size="10" type="text" name="birth_date" readonly="readonly" value="<?php echo $birth_date;?>"></td>
</tr>

<tr>
<td class=td1> Date of Adm: </td>
<td class=td1><input class="text1" size="10" type="text" readonly="readonly" name="adm_date" value="<?php echo $adm_date;?>"></td>
</tr>

<tr>
<td class=td1> Class: </td><td class=td1>
<SELECT class="edit_show" NAME="class" disabled="disabled">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $class;?>"><?php echo $class;?></option>
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
</SELECT> 
</td>
</tr>

<tr>
<td class=td1> House: </td><td class=td1> 
<Select class="edit_show" NAME="house" disabled="disabled">
<Option style="margin:5px; padding-left: 10px;" VALUE="<?php echo $house;?>"><?php echo $house;?></option>
<option style="margin:5px; padding-left: 10px;" value="Vishakha"> Vishakha </option>
<option style="margin:5px; padding-left: 10px;" value="Alaknanda"> Alaknanda </option>
<option style="margin:5px; padding-left: 10px;" value="Indrayani"> Indrayani </option>
<option style="margin:5px; padding-left: 10px;" value="Himadri"> Himadri </option>
<option style="margin:5px; padding-left: 10px;" value="Shivneri"> Shivneri </option>
<option style="margin:5px; padding-left: 10px;" value="Phalguni"> Phalguni </option>
<option style="margin:5px; padding-left: 10px;" value="Shravani"> Shravani </option>
<option style="margin:5px; padding-left: 10px;" value="Krittika"> Krittika </option>
<option style="margin:5px; padding-left: 10px;" value="Torna"> Torna </option>
<option style="margin:5px; padding-left: 10px;" value="Jaintia"> Jaintia </option>
<option style="margin:5px; padding-left: 10px;" value="Palash"> Palash </option>
</Select>
</td>
</tr>

<tr>
<td class=td1>Blood Group: </td><td class=td1>  
<select class="edit_show" name="bldgroup" disabled="disabled">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $bldgroup;?>"><?php echo $bldgroup;?></option>
<option style="margin:5px; padding-left: 10px;" value="A+ve">A+ve</option>
<option style="margin:5px; padding-left: 10px;" value="A-ve">A-ve</option>
<option style="margin:5px; padding-left: 10px;" value="B+ve">B+ve</option>
<option style="margin:5px; padding-left: 10px;" value="B-ve">B-ve</option>
<option style="margin:5px; padding-left: 10px;" value="O+ve">O+ve</option>
<option style="margin:5px; padding-left: 10px;" value="O-ve">O-ve</option>
<option style="margin:5px; padding-left: 10px;" value="AB+ve">AB+ve</option>
<option style="margin:5px; padding-left: 10px;" value="AB-ve">AB-ve</option>
</select>
</td>
</tr>

<tr>
<td class=td1>Gender: </td><td class=td1>
<select class="edit_show" name="sex" disabled="disabled">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $sex;?>"><?php echo $sex;?></option>
<option style="margin:5px; padding-left: 10px;" value="B">B</option>
<option style="margin:5px; padding-left: 10px;" value="G">G</option>
</select>
</td>
</tr>

<tr>
<td class=td1>House Parent: </td>
<td class=td1>
<select class="edit_show" name="house_parent" disabled="disabled">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $house_parent;?>"><?php echo $house_parent;?></option><br>
<?php
//Select teacher's name from staff table
include("../std/staff_connect.php");
$sql1="SELECT staff_name FROM staff WHERE designation = 'teacher' ORDER BY staff_name";
$result1=mysql_query($sql1);

while ($row1=mysql_fetch_array($result1)) {

echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
?>
</select>
</td>
</tr>

<tr>
<td class=td1>Class Teacher: </td>
<td class=td1>
<select class="edit_show" name="class_teach" disabled="disabled">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $class_teach;?>"><?php echo $class_teach;?></option><br>
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

<tr>
<td class=td1>Hobby1: </td><td class=td1>
<select class="edit_show" name="hobby_1" disabled="disabled">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $hobby_1;?>"><?php echo $hobby_1;?></option>
<option style="margin:5px; padding-left: 10px;" value="Sitar">Sitar</option>
<option style="margin:5px; padding-left: 10px;" value="Guitar">Guitar</option>
<option style="margin:5px; padding-left: 10px;" value="Tabla">Tabla</option>
<option style="margin:5px; padding-left: 10px;" value="Bharatnatyam">Bharatnatyam</option>
<option style="margin:5px; padding-left: 10px;" value="Piano">Piano</option>
<option style="margin:5px; padding-left: 10px;" value="Violin">Violin</option>
<option style="margin:5px; padding-left: 10px;" value="Vocal Music">Vocal Music</option>
</select>
</td>
</tr>

<tr>
<td class=td1>Hobby2: </td><td class=td1>
<select class="edit_show" name="hobby_2" disabled="disabled">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $hobby_2;?>"><?php echo $hobby_2;?></option>
<option style="margin:5px; padding-left: 10px;" value="Sitar">Sitar</option>
<option style="margin:5px; padding-left: 10px;" value="Guitar">Guitar</option>
<option style="margin:5px; padding-left: 10px;" value="Tabla">Tabla</option>
<option style="margin:5px; padding-left: 10px;" value="Bharatnatyam">Bharatnatyam</option>
<option style="margin:5px; padding-left: 10px;" value="Piano">Piano</option>
<option style="margin:5px; padding-left: 10px;" value="Violin">Violin</option>
<option style="margin:5px; padding-left: 10px;" value="Vocal Music">Vocal Music</option>
</select>
</td>
</tr>

<tr>
<td class=td1>Hobby3: </td><td class=td1>
<select class="edit_show" name="hobby_3" disabled="disabled">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $hobby_3;?>"><?php echo $hobby_3;?></option>
<option style="margin:5px; padding-left: 10px;" value="Sitar">Sitar</option>
<option style="margin:5px; padding-left: 10px;" value="Guitar">Guitar</option>
<option style="margin:5px; padding-left: 10px;" value="Tabla">Tabla</option>
<option style="margin:5px; padding-left: 10px;" value="Bharatnatyam">Bharatnatyam</option>
<option style="margin:5px; padding-left: 10px;" value="Piano">Piano</option>
<option style="margin:5px; padding-left: 10px;" value="Violin">Violin</option>
<option style="margin:5px; padding-left: 10px;" value="Vocal Music">Vocal Music</option>
</select>
</td>
</tr>

<tr>
<td class=td1>Class 9/10 - Group VI Subject: </td><td class=td1>
<select class="edit_show" name="six_sub" disabled="disabled">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $six_sub;?>"><?php echo $six_sub;?></option>
<option style="margin:5px; padding-left: 10px;" value="Hindustani Music">Hindustani Music</option>
<option style="margin:5px; padding-left: 10px;" value="Physical Education">Physical Education</option>
<option style="margin:5px; padding-left: 10px;" value="Computer Application">Computer Application</option>
<option style="margin:5px; padding-left: 10px;" value="Economic Application">Economic Application</option>
</select>
</td>
</tr>

<tr>
<td class=td1>Second Language: </td><td class=td1>
<select class="edit_show" name="second_lang" disabled="disabled">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $second_lang;?>"><?php echo $second_lang;?></option>
<option style="margin:5px; padding-left: 10px;" value="Hindi">Hindi</option>
<option style="margin:5px; padding-left: 10px;" value="Marathi">Marathi</option>
<option style="margin:5px; padding-left: 10px;" value="French">French</option>
<option style="margin:5px; padding-left: 10px;" value="Urdu">Urdu</option>
</select>
</td>
</tr>

<td><br><b>Parent's Information: </b></td>
<tr>
<td class=td1>Father's Name: </td><td class=td1><input class="text" type="text" readonly="readonly" name="parent1" value="<?php echo $parent1;?>"></td>
</tr>

<tr>
<td class=td1>Mother's Name: </td><td class=td1><input class="text" type="text" readonly="readonly" name="parent2" value="<?php echo $parent2;?>"></td>
</tr>

<tr>
<td class=td1>Occupation (F): </td><td class=td1><input class="text" type="text" readonly="readonly" name="occupation" value="<?php echo $occupation;?>"></td>
</tr>

<tr>
<td class=td1>Occupation (M): </td><td class=td1><input class="text" type="text" readonly="readonly" name="occupation_2" value="<?php echo $occupation_2;?>"></td>
</tr>

<tr>
<td class=td1>Email (F): </td><td class=td1><input class="text" type="text" readonly="readonly" name="email" value="<?php echo $email;?>"></td>
</tr>

<tr>
<td class=td1>Email (M): </td><td class=td1><input class="text" type="text" readonly="readonly" name="email_2" value="<?php echo $email_2;?>"></td>
</tr>

<tr>
<td class=td1>Phone No: </td><td class=td1><input class="text" type="text" readonly="readonly" name="phone" value="<?php echo $phone;?>"></td>
</tr>

<tr>
<td class=td1>Mobile No (F): </td><td class=td1><input class="text1" size="20" type="text" readonly="readonly" name="mobile_no" value="<?php echo $mobile_no;?>"></td>
</tr>

<tr>
<td class=td1>Mobile No (M): </td><td class=td1><input class="text1" size="20" type="text" readonly="readonly" name="mobile_no_2" value="<?php echo $mobile_no_2;?>"></td>
</tr>

<td><br><b>Address: </b></td>

<tr>
<td class=td1>Postal Address: </td><td class=td1>
<TEXTAREA ROWS="2" class="textarea" readonly="readonly" name="address1"><?php echo $address1;?></TEXTAREA>
</td>
</tr>

<tr>
<td class=td1>City/Town: </td><td class=td1><input class="text1" size="20" type="text" readonly="readonly" name="city" value="<?php echo $city;?>"></td>
</tr>

<tr>
<td class=td1>Postal Code: </td><td class=td1><input class="text1" size="20" type="text" readonly="readonly" name="postalcode" value="<?php echo $postalcode;?>"></td>
</tr>

<tr>
<td class=td1>State: </td><td class=td1><input class="text1" size="20" type="text" readonly="readonly" name="state" value="<?php echo $state;?>"></td>
</tr> 

<tr>
<td class=td1>Country: </td><td class=td1><input class="text1" size="20" type="text" readonly="readonly" name="country" value="<?php echo $country;?>"></td>
</tr> 

</table>
</div>
</div>
<div class="clear"></div>
</div>
<br>
<?php
if ($_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == 'gbhau' || $_SESSION['user_name'] == 'adminoff' || $_SESSION['user_name'] == 'office' || $_SESSION['user_name'] == 'pusha')
{
?>
<div align=center>
<input type="submit" name="submitButtonName" value="edit"> &nbsp; <input type="button" value="cancel" onclick="window.location='javascript:history.back()'"><input type="hidden" name="id" value="<?=$id;?>">
<hr style="margin-top:2px;" width=30% color=orange size=1>
</div>
</form>
<?php }?>

</body>
</html>


