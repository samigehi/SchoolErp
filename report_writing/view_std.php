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
if ($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2')
{
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

while ($std_row=mysql_fetch_array($std)) {

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
<form method="GET" action="edit_std.php" name="edit_std">
<div class="tbody">
<div id="printme">
<table class="table1">

<tr>
<th class=th1>Subject / Area</th>
<th class=th1>Report &nbsp; >> &nbsp; <?php echo $name;?> - <?php echo $adm;?></th>
<th class=th1>Checked</th>
<th class=th1>Action</th>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Class Teacher</b><br><?php echo trim($class_teacher_teacher);?></td>
<td class=td1><?php echo trim($class_teacher); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=class_teacher&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>House Parent</b><br><?php echo trim($house_parent_teacher);?></td>
<td class=td1><?php echo trim($house_parent); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=house_parent&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>English</b><br><?php echo trim($english_teacher);?></td>
<td class=td1><?php echo trim($english); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=English&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Hindi</b><br><?php echo trim($hindi_teacher);?></td>
<td class=td1><?php echo trim($hindi); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=Hindi&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Marathi</b><br><?php echo trim($marathi_teacher);?></td>
<td class=td1><?php echo trim($marathi); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=Marathi&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Geography</b><br><?php echo trim($geography_teacher);?></td>
<td class=td1><?php echo trim($geography); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=Geography&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>History</b><br><?php echo trim($history_teacher);?></td>
<td class=td1><?php echo trim($history); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=History&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Social Studies</b><br><?php echo trim($social_studies_teacher);?></td>
<td class=td1><?php echo trim($social_studies); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=Social Studies&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Science</b><br><?php echo trim($science_teacher);?></td>
<td class=td1><?php echo trim($science); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=Science&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Physics</b><br><?php echo trim($physics_teacher);?></td>
<td class=td1><?php echo trim($physics); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=Physics&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Chemistry</b><br><?php echo trim($chemistry_teacher);?></td>
<td class=td1><?php echo trim($chemistry); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=Chemistry&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Biology</b><br><?php echo trim($biology_teacher);?></td>
<td class=td1><?php echo trim($biology); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=Biology&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Maths</b><br><?php echo trim($maths_teacher);?></td>
<td class=td1><?php echo trim($maths); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=Maths&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>


<tr>
<td class=td1 style="width:150px;"><b>Commercial studies</b><br><?php echo trim($commercial_studies_teacher);?></td>
<td class=td1><?php echo trim($commercial_studies); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=Commercial_Studies&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Economics App</b><br><?php echo trim($economics_app_teacher);?></td>
<td class=td1><?php echo trim($economics_app); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=Economics_App&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Computer App</b><br><?php echo trim($computer_app_teacher);?></td>
<td class=td1><?php echo trim($computer_app); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=Computer_app&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>


<tr>
<td class=td1 style="width:150px;"><b>Games</b><br><?php echo trim($games_teacher);?></td>
<td class=td1><?php echo trim($games); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=Games&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Yoga</b><br><?php echo trim($yoga_teacher);?></td>
<td class=td1><?php echo trim($yoga); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=Yoga&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Art</b><br><?php echo trim($art_teacher);?></td>
<td class=td1><?php echo trim($art); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=Art&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
<tr/>

<tr>
<td class=td1 style="width:150px;"><b>Music</b><br><?php echo trim($music_teacher);?></td>
<td class=td1><?php echo trim($music); ?></td>
<td class=td1 align="center"><?php echo trim($status); ?></td>
<td class=td1 align="center"><?php echo "<a href=\"edit.php?class=$class&ss_area=Music&st_name=$name\"><img src='images2/edit.gif' border='0' alt='edit'></a>";?></td>
</tr>
</table>

<br>
</div>
<div class="clear"></div>
</div>

<div style="margin-top:5px; margin-left:10px; float:left;"><input style="font-weight:bold;" type="submit" name="submit" value="Edit"><input type="hidden" name="adm" value="<?php echo $adm;?>"><input type="hidden" name="class" value="<?php echo $class;?>"></div>

<div style="margin-top:5px; float:right;">
<?php echo "<a href=\"final_report.php?class=$class&adm=$adm\"><img src='images2/view.png' title='view'  border='0' alt='edit'></a>";?>&nbsp; &nbsp;
<?php echo "<a href=\"report_std_pdf.php?&adm=$adm\" title='export to pdf'><img src='images2/pdf.gif' border='0' alt='pdf'></a>";?>&nbsp; &nbsp;
<?php echo "<a href=\"report_std_xls.php?&adm=$adm&name=$name\" title='export to xls'><img src='images2/xls.gif' border='0' alt='xls'></a>";?>&nbsp; &nbsp;
<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false" title="print this page"><img src='images2/print.png' border='0' alt='pdf'></a>
</div>

<?php	
}
}
?>
</body>
</html>            


