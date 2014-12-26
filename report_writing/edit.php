<html>
<head>
<title>Report Wiriting...</title>
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
$today = date('Y-m-d');
include("connect.php");
$qP = "SELECT * FROM report_date";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);
$teach_date_end = trim($teach_date_end);
//Report start date
if ($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2' && $teach_date_end >= $today){

if(isset($_GET["class"]))
{
    $ss_class = $_GET["class"];
}
if(!isset($_GET["class"]))
{
    $ss_class = ""; 
}


if(isset($_GET["ss_area"]))
{
    $ss_area = $_GET["ss_area"];
}
if(!isset($_GET["ss_area"]))
{
    $ss_area = ""; 
}


if(isset($_GET["st_name"]))
{
    $st_name = $_GET["st_name"];
}
if(!isset($_GET["st_name"]))
{
    $st_name = ""; 
}
?>


<div style="color:#575757; font-family:Trebuchet MS; font-size:13px; padding:5px;">
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
$subject = ""; 
?>
Select Subject :
<SELECT NAME="ss_area" onChange="autoSubmit();">
<option style="margin:5px; padding-left: 10px;" value="">- Select -</option>
<?php
include("../staff/connect.php");
$sql1 = "SELECT staff_name, teach_area, teach_area_1, teach_area_2, house_parent_of, class_teacher_of FROM staff Where login_name = '$user_name' ORDER BY staff_name";
$result_2=mysql_query($sql1);
while($row = mysql_fetch_array($result_2))	
{
$teach_area = $row['teach_area'];
$teach_area_1 = $row['teach_area_1'];
$teach_area_2 = $row['teach_area_2'];
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
if ($teach_area_2 != ''){
?>
<option style="margin:2px; padding-left: 10px;" value="<?php echo $teach_area_2;?>" <?php if($ss_area == $teach_area_2) echo " selected"; ?>><?php echo $teach_area_2;?></option>

<?php
}
if ($row['class_teacher_of'] != ''){
?>
<option style="margin:2px; padding-left: 10px;" value="class_teacher" <?php if($ss_area == "class_teacher") echo " selected"; ?>>Class teacher</option>
<?php
}
if ($row['house_parent_of'] != ''){
?>
<option style="margin:2px; padding-left: 10px;" value="house_parent" <?php if($ss_area == "house_parent") echo " selected"; ?> >House parent</option>
<?php
}
}
?>
</SELECT> &nbsp; &nbsp;

<?php
if(isset($_GET["ss_area"]))
{
?>
Student : 
<select NAME="st_name" onChange="autoSubmit();">
<option value="">Select</option>
<?php
 include("connect.php");
 $sql_f_std = "SELECT * FROM spring_2015 WHERE class = '$ss_class' ORDER BY name";
 $std = mysql_query($sql_f_std);

while ($std_row=mysql_fetch_array($std)) {

$name = $std_row['name'];
$adm = $std_row['adm'];
?>
<option style="margin:2px; padding-left: 10px;" <?php if($name == $st_name) echo " selected"; ?> value="<?php echo $name;?>"><?php echo $name;?> - <?php echo $adm;?></option>
<?php
}
}
?>
</select>
</form> 
</td>
</tr>
</table>

<?php
$ss_area_f = '';
if(isset($_GET["st_name"]))
{
$ss_area_f = strtolower($_GET["ss_area"]); //convert letters to lowercase//
$ss_class = $_GET["class"]; 
$st_name = $_GET["st_name"];
?>

<form method="post" action="edited.php" name="mainform">
<div class="contentC">
<div class="tbody">
<table class="table1">
<!------------------- Name SELECTION AREA ---------------------->
<th class=th1 style="width:50px;">Report &nbsp; >> &nbsp; <?php echo $st_name;?> </th>
</tr>
	<?php
	$sql_f = "SELECT * FROM spring_2015 WHERE class = '$ss_class' AND name = '$st_name' ORDER BY name";
        $data_f = mysql_query($sql_f);
	$subject = ''; 
        while($row_f = mysql_fetch_array($data_f))	
        {
	$adm=$row_f['adm'];
	$class=$row_f['class'];
	$name=$row_f['name'];
	$subject = $row_f[$ss_area_f]; 
	
echo'     
<tr>
<input type="hidden" name="class" value="'.$class.'">
<input type="hidden" name="ss_area" value="'.$ss_area.'">
<input type="hidden" name="adm" value="'.$adm.'">
<td align="center" class=td1><textarea contenteditable="true" spellcheck="true" rows="21" cols="85" name='.$ss_area_f.'">'.$subject.'</textarea>
</td>
</tr>';
}
?>
</div>
</table>
<br>
<div align="center">
<input type="submit" style="font-weight:bold" name="submit" value="Save"> &nbsp; <input type="button" style="font-weight:bold" name="cancel" value="Cancel" onClick="window.location='index.php';"/>
<hr style="margin-top:3px;" width=13% color=orange size=1>
</div>
</form>
</div>
<div class="clear"></div>
</div>
<br>
	<?php
	}
	}
	}
	else
	{
	echo '<br><p align=center><font color=red>Sorry! Report submission date <b>'.$teach_date_end.' </b> is over, please contact administrator.</font></p>';
	}
	?>
</body>
</html>            


