<html>
<head>
<title>Report Writing :: Spring Term 2014-15</title>
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
<body>
<?php
include("index.php");
$user_name = $_SESSION['user_name'];

if(isset($_GET["class"]))
{
    $ss_class = $_GET["class"];
}
if(!isset($_GET["class"]))
{
    $ss_class = ""; 
}

if(isset($_GET["adm"]))
{
    $st_adm = $_GET["adm"];
}
if(!isset($_GET["adm"]))
{
    $st_adm = ""; 
}

include("connect.php");
$qP = "SELECT * FROM report_editor WHERE editor_user = '$user_name'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);
$class1 = trim($class1);
$class2 = trim($class2);

$Dt = "SELECT * FROM report_date";
$eDt = mysql_query($Dt);
$eDt_row = mysql_fetch_array($eDt);
extract($eDt_row);
$teach_date_end = trim($teach_date_end);

if ($_SESSION['user_level'] == '1' || ($ss_class == $class1 || $ss_class == $class2 && $edit_date_end >= $today)){
?>

<table class="table1">
<tr>
<td class="td1">
<form method="GET" action="" name="theForm">
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
<option style="margin:5px; padding-left: 10px;" value="11" <?php if($ss_class == "11") echo " selected"; ?>>Class 11</option>
</SELECT> &nbsp; &nbsp; 
 
<?php
if(isset($_GET["class"]))
{
?>
Student : 
<select NAME="adm" onChange="autoSubmit();">
<option value="">Select</option>
<?php
 include("connect.php");
 $sql_f_std = "SELECT name, adm FROM spring_2015 WHERE class = '$ss_class' ORDER BY name";
 $std = mysql_query($sql_f_std);

while ($std_row=mysql_fetch_array($std)){
$name = $std_row['name'];
$adm = $std_row['adm'];
?>
<option style="margin:2px; padding-left: 10px;" <?php if($adm == $st_adm) echo " selected"; ?> value="<?php echo $adm;?>"><?php echo $name;?> - <?php echo $adm;?></option>
<?php
}
}
?>
</select>
</form>

</td>
</tr>
</table>
</div>

<?php
if(isset($_GET["adm"]))
{
$st_adm = $_GET["adm"];
?>
<!------------------- Name SELECTION AREA ---------------------->
	<?php
	include("connect.php");
        $qP = "SELECT * FROM spring_2015 WHERE adm = '$st_adm'";
	$rsP = mysql_query($qP);
	$row = mysql_fetch_array($rsP);
	extract($row);
	$class = trim($class);
	$name = trim($name);
	$adm = trim($adm);
	?>
<br>
<form method="POST" action="edited_std.php" name="edited_std">
<div class="tbody">
<div id="printme">
<table class="table1">
<tr>
<th class=th1>Subject / Area</th>
<th class=th1>Report &nbsp; >> &nbsp; <?php echo $name;?> - <?php echo $adm;?> 
<input type="hidden" name="adm" value="<?php echo $adm;?>">
<input type="hidden" name="class" value="<?php echo $class;?>">
</th>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Class Teacher</b><br><?php echo trim($class_teacher_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="class_teacher"><?php echo trim($class_teacher); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>House Parent</b><br><?php echo trim($house_parent_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="house_parent"><?php echo trim($house_parent); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>English</b><br><?php echo trim($english_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="english"><?php echo trim($english); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Hindi</b><br><?php echo trim($hindi_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="hindi"><?php echo trim($hindi); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Marathi</b><br><?php echo trim($marathi_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="marathi"><?php echo trim($marathi); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Geography</b><br><?php echo trim($geography_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="geography"><?php echo trim($geography); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>History</b><br><?php echo trim($history_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="history"><?php echo trim($history); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Social Studies</b><br><?php echo trim($social_studies_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="social_studies"><?php echo trim($social_studies); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Science</b><br><?php echo trim($science_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="science"><?php echo trim($science); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Physics</b><br><?php echo trim($physics_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="physics"><?php echo trim($physics); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Chemistry</b><br><?php echo trim($chemistry_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="chemistry"><?php echo trim($chemistry); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Biology</b><br><?php echo trim($biology_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="biology"><?php echo trim($biology); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Maths</b><br><?php echo trim($maths_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="maths"><?php echo trim($maths); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Commercial studies</b><br><?php echo trim($commercial_studies_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="commercial_studies"><?php echo trim($commercial_studies); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Economics App</b><br><?php echo trim($economics_app_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="economics_app"><?php echo trim($economics_app); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Computer App</b><br><?php echo trim($computer_app_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="computer_app"><?php echo trim($computer_app); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Games</b><br><?php echo trim($games_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="games"><?php echo trim($games); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Yoga</b><br><?php echo trim($yoga_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="yoga"><?php echo trim($yoga); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Art</b><br><?php echo trim($art_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="art"><?php echo trim($art); ?></textarea></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Music</b><br><?php echo trim($music_teacher);?></td>
<td class=td1><textarea contenteditable="true" spellcheck="true" rows="10" cols="100" name="music"><?php echo trim($music); ?></textarea></td>
</tr>
</table>

<br>
</div>
<div class="clear"></div>
</div>
<div style="margin-top:5px; margin-left:10px; float:left;"><input type="submit" style="font-weight:bold;" name="submit" value="Save"></div>

<div style="margin-top:5px; float:right;">
<?php echo "<a href=\"view_std.php?class=$class&adm=$adm\"><img src='images2/view.png' title='view'  border='0' alt='edit'></a>";?>&nbsp; &nbsp;
<?php echo "<a href=\"report_std_pdf.php?&adm=$adm\" title='export to pdf'><img src='images2/pdf.gif' border='0' alt='pdf'></a>";?>&nbsp; &nbsp;
<?php echo "<a href=\"report_std_xls.php?&adm=$adm&name=$name\" title='export to xls'><img src='images2/xls.gif' border='0' alt='xls'></a>";?>&nbsp; &nbsp;
<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false" title="print this page"><img src='images2/print.png' border='0' alt='pdf'></a> &nbsp;
</div>
</form>

<?php	
}
}
else
{
echo '<br><p align=center><font color=red>Sorry! You do not have these privileges, please contact administrator.</font></p>';
echo "<br><br>&nbsp; <a href='javascript:history.back()'><< Back</a> &nbsp;";
}
?>
</body>
</html>            


