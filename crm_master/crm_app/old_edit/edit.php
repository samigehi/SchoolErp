<html>
<head>
<title>CRM...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
function autoSubmit()
{
    var formObject = document.forms['theForm'];
    formObject.submit();
}
</script>
</head>
<?php
include("index.php");
$user_name = $_SESSION['user_name'];

if(isset($_POST["class"]))
{
    $ss_class = $_POST["class"];
}
if(!isset($_POST["class"]))
{
    $ss_class = ""; 
}

if(isset($_POST["ss_area"]))
{
    $ss_area = $_POST["ss_area"];
}
if(!isset($_POST["ss_area"]))
{
    $ss_area = ""; 
}

?>
<div style="color:#575757; font-family:Trebuchet MS; font-size:13px; padding:5px;">
<table class="table1">
<tr>
<td class="td1">
<form method="post" action="" name="theForm">
<!-------------------------------------------------------- SELECT CLASS ----------------------------------------------------->
Select Class :
<SELECT NAME="class" onChange="autoSubmit();">
<option style="margin:5px; padding-left: 10px;" value="">- Select -</option>
<option style="margin:5px; padding-left: 10px;" value="4" <?php if($ss_class == "4") echo " selected"; ?>>Class 4</option>
<option style="margin:5px; padding-left: 10px;" value="5" <?php if($ss_class == "5") echo " selected"; ?>>Class 5</option>
<option style="margin:5px; padding-left: 10px;" value="6A" <?php if($ss_class == "6A") echo " selected"; ?>>Class 6A</option>
<option style="margin:5px; padding-left: 10px;" value="6B" <?php if($ss_class == "6B") echo " selected"; ?>>Class 6B</option>
<option style="margin:5px; padding-left: 10px;" value="7A" <?php if($ss_class == "7A") echo " selected"; ?>>Class 7A</option>
<option style="margin:5px; padding-left: 10px;" value="7B" <?php if($ss_class == "7B") echo " selected"; ?>>Class 7B</option>
<option style="margin:5px; padding-left: 10px;" value="8A" <?php if($ss_class == "8A") echo " selected"; ?>>Class 8A</option>
<option style="margin:5px; padding-left: 10px;" value="8B" <?php if($ss_class == "8B") echo " selected"; ?>>Class 8B</option>
<option style="margin:5px; padding-left: 10px;" value="9A" <?php if($ss_class == "9A") echo " selected"; ?>>Class 9A</option>
<option style="margin:5px; padding-left: 10px;" value="9B" <?php if($ss_class == "9B") echo " selected"; ?>>Class 9B</option>
<option style="margin:5px; padding-left: 10px;" value="10A" <?php if($ss_class == "10A") echo " selected"; ?>>Class 10A</option>
<option style="margin:5px; padding-left: 10px;" value="10B" <?php if($ss_class == "10B") echo " selected"; ?>>Class 10B</option>
</SELECT> &nbsp; &nbsp; 


<?php
if(isset($_POST["class"]))
{
?>
Select Area :
<SELECT NAME="ss_area" onChange="autoSubmit();">
<option style="margin:5px; padding-left: 10px;" value="">- Select -</option>
<?php
include("../staff/connect.php");
$sql1 = "SELECT staff_name, teach_area, teach_area_1, house_parent_of, class_teacher_of FROM staff Where login_name = '$user_name' ORDER BY staff_name";
$result_2=mysql_query($sql1);
while($row = mysql_fetch_array($result_2))	
{
$teach_area = $row['teach_area'];
$teach_area_1 = $row['teach_area_1'];
if ($teach_area != ''){
?>
<option style="margin:2px; padding-left: 10px;" value="<?php echo $teach_area;?>" <?php if($ss_area == $teach_area) echo " selected"; ?>><?php echo $teach_area;?></option>
<?php
}
if ($teach_area_1 != ''){
?>
<option style="margin:2px; padding-left: 10px;" value="<?php echo $teach_area_1;?>" <?php if($ss_area == $teach_area_1) echo " selected"; ?>><?php echo $teach_area_1;?></option>
<?php
}
if ($row['class_teacher_of'] != ''){
?>
<option style="margin:2px; padding-left: 10px;" value="Class Teacher" <?php if($ss_area == "Class Teacher") echo " selected"; ?>>Class teacher</option>
<?php
}
if ($row['house_parent_of'] != ''){
?>
<option style="margin:2px; padding-left: 10px;" value="House Parent"<?php if($ss_area == "House Parent") echo " selected"; ?> >House parent</option>
<?php
}
}
}
?>
</SELECT> &nbsp; &nbsp;
</form> 

<img src='images2/arrow.gif' border='0' alt='edit'> <?php echo "<a href=\"crm_report.php?class=$ss_class\" title='view report' target='_blank'>view report</a>";?>
<?php
if(isset($_POST["ss_area"]))
{
$ss_class = $_POST["class"];
$ss_area = $_POST["ss_area"];
?>
<form method="post" action="edited.php" name="mainform">
Teacher : 
<select name="<?php echo $ss_area;?>_teacher">
<?php
//Select teacher's name from staff table
$result_1=mysql_query($sql1);
while ($row1=mysql_fetch_array($result_1)) {
echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
?>
</select> &nbsp; &nbsp;
</td>
</tr>
</table>
</div>

<table class="table1">
<!------------------- Name SELECTION AREA ---------------------->
<tr>
<th class=th1 style="width:10px;">Sr. No.</th>
<th class=th1 style="width:70px;">Student</th>
<th class=th1 style="width:50px;">Area Remark</th>
<th class=th1 style="width:10px;">Grade</th>
</tr>
	<?php
	include("connect.php");
        $sql2 = "SELECT * FROM crm_2013_14 WHERE class = '$ss_class' ORDER BY name";
        $data2 = mysql_query($sql2);
	$count1='0';
	$grade = ""; 
	$subject = ""; 
        while($row2 = mysql_fetch_array($data2))	
        {
	$count1++;
	$adm=$row2['adm'];
	$name=$row2['name'];
	$subject=$row2[$ss_area];
	$grade=$row2[$ss_area.'_grade'];
	
echo'     
<tr>
<td class=td1 style="text-align:center;">'.$count1.'</td>
<td class=td1><input type="hidden" name="adm[]" id="adm[]" value="'.$adm.'">
'.$name.'
</td>
<td align="center" class=td1><textarea ROWS="4" class="textarea" id="'.$ss_area.'[]"  name="'.$ss_area.'[]">'.$subject.'</textarea></td>
<td align="center" class=td1>
<Select NAME="'.$ss_area.'_grade[]">
<option class=pink value="'.$grade.'">'.$grade.'</option>
<option class=pink value="A">A</option>
<option class=pink value="B">B</option>
<option class=pink value="B+">B+</option>
<option class=pink value="B-">B-</option>
<option class=pink value="C">C</option>
</select>
</td>';
}
?>
</div>
</table>
<br>
<div align=center>
<input type="submit" name="submit" value="Submit"> <input type="reset" value="Reset"></div>
<hr style="margin-top:4px;" width=30% color=orange size=1></div>
</div>
</form>
<?php
}
else
{
echo "Access denied!";
}
?>
            


