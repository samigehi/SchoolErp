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
</form> 
</td>
</tr>
</table>

<?php
if(isset($_GET["ss_area"]))
{
$ss_area_f = strtolower($_GET["ss_area"]); //convert letters to lowercase//
$ss_class = $_GET["class"]; 
?>

<form method="POST" action="edited_sub.php" name="edited_sub">
<div class="contentC">
<div class="tbody">
<div id="printme">
<table class="table1">
<!------------------- Name SELECTION AREA ---------------------->
<tr>
<th class=th1 style="width:1px;">Sr. No.</th>
<th class=th1 style="width:5px;">Student</th>
<th class=th1 style="width:1px;">Adm</th>
<th class=th1 style="width:200px;">Report &nbsp; >> &nbsp; <?php echo $ss_class;?> &nbsp; >> &nbsp; <?php echo $ss_area;?> </th>
</tr>
	<?php
	include("connect.php");
	$ss_area_f = strtolower($_GET["ss_area"]); //convert letters to lowercase//
        $ss_class = $_GET["class"]; 

        $sql_f = "SELECT * FROM spring_2015 WHERE class = '$ss_class' ORDER BY name";
        $data_f = mysql_query($sql_f);
	$count1='0';
	$subject = ''; 
        while($row_f = mysql_fetch_array($data_f))	
        {
	$count1++;
	$adm=$row_f['adm'];
	$name=$row_f['name'];
	$subject=$row_f[$ss_area_f];
echo'     
<tr>
<td class=td1 style="text-align:center;">'.$count1.'</td>
<td class=td1 width="120"><b>'.$name.'</b></td>
<td class=td1 align="center"><input style="text-align:center; background:#FFCC99" type="text" size="5" id="adm[]" readonly="readonly" name="adm[]" value="'.$adm.'"></td>
<td align="left" class=td1>
<textarea contenteditable="true" spellcheck="true" rows="10" cols="100" id="subject[]" name="subject[]">'.$subject.'</textarea>
</td>
';
}
?>
</div>
</table>

<br>
</div>
<div class="clear"></div>
</div>
<div style="margin-top:3px; margin-left:10px; float:left;"><input type="submit" style="font-weight:bold;" name="submit" value="Save">
<input type="hidden" name="class" value="<?php echo $ss_class;?>"><input type="hidden" name="ss_area" value="<?php echo $ss_area;?>">
</div>
</form>

<div style="margin-top:3px; float:right;">
<?php echo "<a href=\"view_sub.php?class=$ss_class&ss_area=$ss_area\"><img src='images2/view.png' title='view'  border='0' alt='edit'></a>";?>&nbsp; &nbsp;
 <?php echo "<a href=\"report_sub_pdf.php?class=$ss_class&ss_area=$ss_area_f\" title='export to pdf'><img src='images2/pdf.gif' border='0' alt='pdf'></a>";?>&nbsp; &nbsp;
<?php echo "<a href=\"report_sub_xls.php?class=$ss_class&ss_area=$ss_area_f\" title='export to xls'><img src='images2/xls.gif' border='0' alt='xls'></a>";?>&nbsp; &nbsp;
<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false" title="print this page"><img src='images2/print.png' border='0' alt='pdf'></a>
</div>

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


