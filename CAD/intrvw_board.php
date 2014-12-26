
<html>
<head>
<title>CAD :: Intrvw board report...</title>
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

$qP = "SELECT *, TIMESTAMPDIFF(YEAR, birth_date, CURRENT_DATE) AS `age` FROM cad_app WHERE cad_id = '$cad_id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$form_no = trim($form_no);
$birth_date = trim($birth_date);
$st_name = trim($st_name);
$class = trim($class);
$city = trim($city);
$learning_diffy = trim($learning_diffy);
$info_source_detail = trim($info_source_detail);
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
$siblings_no = trim($siblings_no);
$eng_grade = trim($eng_grade);
$maths_grade = trim($maths_grade);
$overall_grade = trim($overall_grade);
$intervw_date = trim($intervw_date);
$admn_status = trim($admn_status);
$age = date_diff(date_create(), date_create($birth_date));
?>

<div id="printme">
<table class=table1 style="border:0px;">
<tr class=tr1>
<td class=td1 style="border:0px;"><b>Student: </b> &nbsp; <?php echo $st_name;?></td>
<td class=td1 style="border:0px;"><b>Class: </b>&nbsp; <?php echo $class;?></td>
<td class=td1 style="border:0px;"><b>Application No: </b>&nbsp; <?php echo $form_no;?></td>
<td class=td1 style="border:0px;"><b> Interview Date: </b> <?php echo $intervw_date;?></td>
</tr>

<tr class=tr1>
<td class=td1 style="border:0px;"><b>Date of Birth: </b>&nbsp; <?php echo $birth_date;?>
<td class=td1 style="border:0px;"><b>Age: </b> &nbsp;<?php echo $age->format("%Y Years, %M Months");?></td>
<td class=td1 style="border:0px;"><b>Age-band for the class: </b>&nbsp; <?php echo $class+4.5;?> to <?php echo $class+5.5;?> Years
</td>
</tr>
</table>

<table class=table1>
<tr class=tr1>
<td class=td1 style="border:0px;"><b>Father's Name: </b>&nbsp; <?php echo $father_name;?></td>
<td class=td1 style="border:0px;"><b>Mother's Name: </b>&nbsp; <?php echo $mother_name;?></td>
</tr>

<tr class=tr1>
<td class=td1 style="border:0px;"><b>Education (F): </b>&nbsp; <?php echo $father_edu;?></td>
<td class=td1 style="border:0px;"><b>Education (M): </b>&nbsp; <?php echo $mother_edu;?></td>
</tr>

<tr class=tr1>
<td class=td1 style="border:0px;"><b>Occupation (F): </b>&nbsp; <?php echo $father_job;?></td>
<td class=td1 style="border:0px;"><b>Occupation (M): </b>&nbsp; <?php echo $mother_job;?></td>
</tr>
</table>

<table class=table1>
<tr class=tr1>
<td class=td1 style="border:0px;"><b>No. of siblings: </b>&nbsp; <?php echo $siblings_no;?></td>
<td class=td1 style="border:0px;"><b></font>City/Town: </b>&nbsp; <?php echo $city;?></td>
<td class=td1 style="border:0px;"><b>Information source: </b>&nbsp; <?php echo $info_source_detail;?></td> 
</tr>

<tr class=tr1>
<td class=td1 style="border:0px;"><b>Single Parent: </b>&nbsp; <?php echo $single_parent;?></td>
<td class=td1 style="border:0px;"><b>Divorced:</b>&nbsp; <?php echo $divorced;?> </td>
<td class=td1 style="border:0px;"><b>Adopted Child: </b>&nbsp; <?php echo $adopted_child;?> &nbsp; &nbsp; &nbsp; &nbsp; <b>Learning Difficulties: </b>&nbsp; <?php echo $learning_diffy;?></td>
</tr>
</table>
<hr width="97%">

<font style="margin-left:20px;"><b>Teacher: </b> &nbsp; --------------------------- </font>
<table class=table1 style="margin-top:26%;">
<tr class=tr1>
<td class=td1 style="border:0px;"><b>English Grade: </b>&nbsp; <?php echo $eng_grade;?></td>
<td class=td1 style="border:0px;"><b>Maths Grade: </b>&nbsp; <?php echo $maths_grade;?></td>
<td class=td1 style="border:0px;"><b>Overall Grade: </b>&nbsp; <?php echo $overall_grade;?></td>
<td class=td1 style="border:0px;"><b>Admn Status: </b>&nbsp; </td>
</tr>
</table>
<hr width="97%">
</div>
</div>
<br>

<div align="center">
<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false"><img src='images2/print.png' border='0' alt='print'> Print</a> 
</div>

<?php
}
else 
{
echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
}
?>

</body>
</html>

