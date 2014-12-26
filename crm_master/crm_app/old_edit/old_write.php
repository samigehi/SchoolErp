<?php

include("index.php");
include("connect.php");

$crm_id = $_GET['crm_id'];
$find = $_GET['find'];

$qP = "SELECT * FROM crm_2013_14 WHERE crm_id = '$crm_id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

//first form
$name = trim($name);
$adm = trim($adm);
$class = trim($class);   
$class_teacher = trim($class_teacher);   
$class_teacher_grade = trim($class_teacher_grade);
$class_teacher_teacher = trim($class_teacher_teacher); 
$house_parent = trim($house_parent); 
$house_parent_grade = trim($house_parent_grade); 
$house_parent_teacher = trim($house_parent_teacher); 
$english = trim($english); 
$english_grade = trim($english_grade); 
$english_teacher = trim($english_teacher); 
$hindi = trim($hindi); 
$hindi_grade = trim($hindi_grade); 
$hindi_teacher = trim($hindi_teacher); 
$social_studies = trim($social_studies); 
$social_studies_grade = trim($social_studies_grade); 
$social_studies_teacher = trim($social_studies_teacher); 
$maths = trim($maths); 
$maths_grade = trim($maths_grade); 
$maths_teacher = trim($maths_teacher); 
$science = trim($science);
$science_grade = trim($science_grade); 
$science_teacher = trim($science_teacher); 
$resource_room = trim($resource_room); 
$resource_room_grade = trim($resource_room_grade); 
$resource_room_teacher = trim($resource_room_teacher); 
$games = trim($games); 
$games_grade = trim($games_grade); 
$games_teacher = trim($games_teacher); 
$yoga = trim($yoga); 
$yoga_grade = trim($yoga_grade); 
$yoga_teacher = trim($yoga_teacher); 
$art = trim($art); 
$art_grade = trim($art_grade); 
$art_teacher = trim($art_teacher); 
$music = trim($music); 
$music_grade = trim($music_grade); 
$music_teacher = trim($music_teacher); 
$remarks = trim($remarks);  
$inputs_from_crm = trim($inputs_from_crm); 
mysql_close();

include("../staff/connect.php");
$data_teach=mysql_query("SELECT teach_area, teach_area_1 FROM staff WHERE designation IN ('Teacher', 'Principal', 'Director', 'Secretory', 'RMO') AND login_name = '$user_name' ORDER BY staff_name");

while($result_teach = mysql_fetch_array( $data_teach ))		
{
$teach_area = $result_teach['teach_area'];
$teach_area_1 = $result_teach['teach_area_1'];
}
?>

<html>
<head>
<title>CRM:wite/edit </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<form method="post" action="edited.php" name="formA">
<div style="color:#575757; font-family:Trebuchet MS; font-size:13px; padding-bottom:10px;"> <img src='images2/arrow.gif' border='0' alt='edit'> <b>Name - </b><?php echo $name;?>, <b>Class - </b><?php echo $class;?></div>
<table class=table1>
<tr bgcolor=#E5EECC>
<th class=th1 style="width:30px;">Subject</th>
<th class=th1 style="width:10px;">Teacher</th>
<th class=th1 style="width:40px;">Remark</th>
<th class=th1 style="width:10px;">Grade</th>
</tr>


<tr>
<td class=td2>Class Teacher</td>
<td class=td2 style="text-align:center;">
<select name="class_teacher_teacher">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $class_teacher_teacher;?>"><?php echo $class_teacher_teacher;?></option><br>
<?php
//Select teacher's name from staff table
include("../staff/connect.php");

$result1=mysql_query($sql1);

while ($row1=mysql_fetch_array($result1)) {

echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
?>
</select>
</td>
<td class=td2 style="text-align:center;"><textarea ROWS="4" class="textarea" name="class_teacher"><?php echo $class_teacher; ?></textarea></td>
<td align="center" class=td2>
<Select NAME="class_teacher_grade">
<option class=pink value="<?php echo $class_teacher_grade;?>"><?php echo $class_teacher_grade;?></option>
<option class=pink value="A">A</option>
<option class=pink value="B">B</option>
<option class=pink value="B+">B+</option>
<option class=pink value="B-">B-</option>
<option class=pink value="C">C</option>
</select></td>
</tr>



<tr>
<td class=td2>House Parent</td>
<td class=td2 style="text-align:center;">
<select name="house_parent_teacher">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $house_parent_teacher;?>"><?php echo $house_parent_teacher;?></option><br>
<?php
$result1=mysql_query($sql1);
while ($row1=mysql_fetch_array($result1)) {
echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
?>
</select>
</td>
<td class=td2 style="text-align:center;"><textarea ROWS="4" class="textarea" name="house_parent"><?php echo $house_parent;?></textarea></td>
<td align="center" class=td2>
<Select NAME="house_parent_grade">
<option class=pink value="<?php echo $house_parent_grade;?>"><?php echo $house_parent_grade;?></option>
<option class=pink value="A">A</option>
<option class=pink value="B">B</option>
<option class=pink value="B+">B+</option>
<option class=pink value="B-">B-</option>
<option class=pink value="C">C</option>
</select></td>
</tr>

<tr>
<td class=td2>English</td>
<td class=td2 style="text-align:center;">
<select name="english_teacher">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $english_teacher;?>"><?php echo $english_teacher;?></option><br>
<?php
$result1=mysql_query($sql1);
while ($row1=mysql_fetch_array($result1)) {

echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
?>
</select>
</td>
<td class=td2 style="text-align:center;"><textarea ROWS="4" class="textarea" name="english"><?php echo $english; ?></textarea></td>
<td align="center" class=td2>
<Select NAME="english_grade">
<option class=pink value="<?php echo $english_grade; ?>"><?php echo $english_grade; ?></option>
<option class=pink value="A">A</option>
<option class=pink value="B">B</option>
<option class=pink value="B+">B+</option>
<option class=pink value="B-">B-</option>
<option class=pink value="C">C</option>
</select></td>
</tr>

<tr>
<td class=td2>Hindi</td>
<td class=td2 style="text-align:center;">
<select name="hindi_teacher">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $hindi_teacher;?>"><?php echo $hindi_teacher;?></option><br>
<?php
$result1=mysql_query($sql1);
while ($row1=mysql_fetch_array($result1)) {
echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
?>
</select>
</td>
<td class=td2 style="text-align:center;"><textarea ROWS="4" class="textarea" name="hindi"><?php echo $hindi; ?></textarea></td>
<td align="center" class=td2>
<Select NAME="hindi_grade">
<option class=pink value="<?php echo $hindi_grade; ?>"><?php echo $hindi_grade; ?></option>
<option class=pink value="A">A</option>
<option class=pink value="B">B</option>
<option class=pink value="B+">B+</option>
<option class=pink value="B-">B-</option>
<option class=pink value="C">C</option>
</select></td>
</tr>

<tr>
<td class=td2>Social Studies</td>
<td class=td2 style="text-align:center;">
<select name="social_studies_teacher">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $social_studies_teacher;?>"><?php echo $social_studies_teacher;?></option><br>
<?php
$result1=mysql_query($sql1);
while ($row1=mysql_fetch_array($result1)) {
echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
?>
</select>
</td>
<td class=td2 style="text-align:center;"><textarea ROWS="4" class="textarea" name="social_studies"><?php echo $social_studies; ?></textarea></td>
<td align="center" class=td2>
<Select NAME="social_studies_grade">
<option class=pink value="<?php echo $social_studies_grade; ?>"><?php echo $social_studies_grade; ?></option>
<option class=pink value="A">A</option>
<option class=pink value="B">B</option>
<option class=pink value="B+">B+</option>
<option class=pink value="B-">B-</option>
<option class=pink value="C">C</option>
</select></td>
</tr>

<tr>
<td class=td2>Maths</td>
<td class=td2 style="text-align:center;">
<select name="maths_teacher">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $maths_teacher;?>"><?php echo $maths_teacher;?></option><br>
<?php
$result1=mysql_query($sql1);
while ($row1=mysql_fetch_array($result1)) {
echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
?>
</select>
</td>
<td class=td2 style="text-align:center;"><textarea ROWS="4" class="textarea" name="maths"><?php echo $maths; ?></textarea></td>
<td align="center" class=td2>
<Select NAME="maths_grade">
<option class=pink value="<?php echo $maths_grade; ?>"><?php echo $maths_grade; ?></option>
<option class=pink value="A">A</option>
<option class=pink value="B">B</option>
<option class=pink value="B+">B+</option>
<option class=pink value="B-">B-</option>
<option class=pink value="C">C</option>
</select></td>
</tr>

<tr>
<td class=td2>Science</td>
<td class=td2 style="text-align:center;">
<select name="science_teacher">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $science_teacher;?>"><?php echo $science_teacher;?></option><br>
<?php
$result1=mysql_query($sql1);
while ($row1=mysql_fetch_array($result1)) {
echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
?>
</select>
</td>
<td class=td2 style="text-align:center;"><textarea ROWS="4" class="textarea" name="science"><?php echo $science; ?></textarea></td>
<td align="center" class=td2>
<Select NAME="science_grade">
<option class=pink value="<?php echo $science_grade; ?>"><?php echo $science_grade; ?></option>
<option class=pink value="A">A</option>
<option class=pink value="B">B</option>
<option class=pink value="B+">B+</option>
<option class=pink value="B-">B-</option>
<option class=pink value="C">C</option>
</select></td>
</tr>

<tr>
<td class=td2>Resource Room</td>
<td class=td2 style="text-align:center;">
<select name="resource_room_teacher">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $resource_room_teacher;?>"><?php echo $resource_room_teacher;?></option><br>
<?php
$result1=mysql_query($sql1);
while ($row1=mysql_fetch_array($result1)) {
echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
?>
</select>
</td>
<td class=td2 style="text-align:center;"><textarea ROWS="4" class="textarea" name="resource_room"><?php echo $resource_room; ?></textarea></td>
<td align="center" class=td2>
<Select NAME="resource_room_grade">
<option class=pink value="<?php echo $resource_room_grade; ?>"><?php echo $resource_room_grade; ?></option>
<option class=pink value="A">A</option>
<option class=pink value="B">B</option>
<option class=pink value="B+">B+</option>
<option class=pink value="B-">B-</option>
<option class=pink value="C">C</option>
</select></td>
</tr>

<tr>
<td class=td2>Games</td>
<td class=td2 style="text-align:center;">
<select name="games_teacher">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $games_teacher;?>"><?php echo $games_teacher;?></option><br>
<?php
$result1=mysql_query($sql1);
while ($row1=mysql_fetch_array($result1)) {
echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
?>
</select>
</td>
<td class=td2 style="text-align:center;"><textarea ROWS="4" class="textarea" name="games"><?php echo $games; ?></textarea></td>
<td align="center" class=td2>
<Select NAME="games_grade">
<option class=pink value="<?php echo $games_grade; ?>"><?php echo $games_grade; ?></option>
<option class=pink value="A">A</option>
<option class=pink value="B">B</option>
<option class=pink value="B+">B+</option>
<option class=pink value="B-">B-</option>
<option class=pink value="C">C</option>
</select></td>
</tr>

<tr>
<td class=td2>Yoga</td>
<td class=td2 style="text-align:center;">
<select name="yoga_teacher">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $yoga_teacher;?>"><?php echo $yoga_teacher;?></option><br>
<?php
$result1=mysql_query($sql1);
while ($row1=mysql_fetch_array($result1)) {
echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
?>
</select>
</td>
<td class=td2 style="text-align:center;"><textarea ROWS="4" class="textarea" name="yoga"><?php echo $yoga; ?></textarea></td>
<td align="center" class=td2>
<Select NAME="yoga_grade">
<option class=pink value="<?php echo $yoga_grade; ?>"><?php echo $yoga_grade; ?></option>
<option class=pink value="A">A</option>
<option class=pink value="B">B</option>
<option class=pink value="B+">B+</option>
<option class=pink value="B-">B-</option>
<option class=pink value="C">C</option>
</select></td>
</tr>

<tr>
<td class=td2>Art</td>
<td class=td2 style="text-align:center;">
<select name="art_teacher">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $art_teacher;?>"><?php echo $art_teacher;?></option><br>
<?php
$result1=mysql_query($sql1);
while ($row1=mysql_fetch_array($result1)) {
echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
?>
</select>
</td>
<td class=td2 style="text-align:center;"><textarea ROWS="4" class="textarea" name="art"><?php echo $art; ?></textarea></td>
<td align="center" class=td2>
<Select NAME="art_grade">
<option class=pink value="<?php echo $art_grade; ?>"><?php echo $art_grade; ?></option>
<option class=pink value="A">A</option>
<option class=pink value="B">B</option>
<option class=pink value="B+">B+</option>
<option class=pink value="B-">B-</option>
<option class=pink value="C">C</option>
</select></td>
</tr>

<tr>
<td class=td2>Music</td>
<td class=td2 style="text-align:center;">
<select name="music_teacher">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $music_teacher;?>"><?php echo $music_teacher;?></option><br>
<?php
$result1=mysql_query($sql1);
while ($row1=mysql_fetch_array($result1)) {
echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
?>
</select>
</td>
<td class=td2 style="text-align:center;"><textarea ROWS="4" class="textarea" name="music"><?php echo $music; ?></textarea></td>
<td align="center" class=td2>
<Select NAME="music_grade">
<option class=pink value="<?php echo $music_grade; ?>"><?php echo $music_grade; ?></option>
<option class=pink value="A">A</option>
<option class=pink value="B">B</option>
<option class=pink value="B+">B+</option>
<option class=pink value="B-">B-</option>
<option class=pink value="C">C</option>
</select></td>
</tr>
</table>
<br>

<table class=table1>
<tr>
<td class=td2 style="text-align:center;">Remarks by Class Teacher: <textarea ROWS="6" class="textarea" name="remarks"><?php echo $remarks;?></textarea></td>
<td class=td2 style="text-align:center;">Inputs after CRM: <textarea ROWS="6" class="textarea" name="inputs_from_crm"><?php echo $inputs_from_crm;?></textarea></td>
</tr>
</table>

<br>
<div align="center">
<input type="submit" name="submit_crm" value="Submit"> &nbsp; <input type="button" value="Cancel" onclick="window.location='javascript:history.back()'"><input type="hidden" name="crm_id" value="<?=$crm_id?>"><input type="hidden" name="find" value="<?=$find?>">
<!---------------------**************************** first box *******************************----------------->
</form>
<div class="clear"></div>
</div>

</body>
</html>

