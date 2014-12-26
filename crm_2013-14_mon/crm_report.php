<?php
session_start();
if ($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2' || $_SESSION['user_name'] == 'v.pradnya')
{
$class = $_GET['class'];
?>
<html>
<head>
<title>CRM Report :: <?php echo $class;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<link href="css/menu2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
  var win=null;
  function printIt(printThis)
  {
    win = window.open();
    self.focus();
    win.document.open();
    win.document.write('<'+'html'+'><'+'head'+'><'+'style'+'>');
    win.document.write('body { font-family: Verdana; font-size: 11px;}');
    win.document.write('table {font-family:verdana,arial,sans-serif; margin:auto auto auto auto; width:98%; font-size:11px; color:#333333; border-collapse: collapse;}');
    win.document.write('td {border-width:1px; padding:5px; border-style:solid; border-color:#999999;}');
    win.document.write('th {border-width:1px; padding:5px; border-style:solid; border-color:#999999;}');
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
<body style="width:170%;">

<?php
// *********************************** teachers name for all classes ***************************************//
include("connect.php");
$teacher = mysql_query ("SELECT * FROM crm_2013_14 WHERE class LIKE '%$class%' GROUP BY name ORDER BY class, name");
while($row = mysql_fetch_array( $teacher )){
$class_teacher_teacher = $row['class_teacher_teacher'];
$house_parent_teacher = $row['house_parent_teacher'];
$english_teacher = $row['english_teacher'];
$hindi_teacher = $row['hindi_teacher'];
$marathi_teacher = $row['marathi_teacher'];
$history_teacher = $row['history_teacher'];
$geography_teacher = $row['geography_teacher'];
$social_studies_teacher = $row['social_studies_teacher'];
$maths_teacher = $row['maths_teacher'];
$biology_teacher = $row['biology_teacher'];
$chemistry_teacher = $row['chemistry_teacher'];
$physics_teacher = $row['physics_teacher'];
$science_teacher = $row['science_teacher'];
$resource_room_teacher = $row['resource_room_teacher'];
$games_teacher = $row['games_teacher'];
$yoga_teacher = $row['yoga_teacher'];
$art_teacher = $row['art_teacher'];
$music_teacher = $row['music_teacher'];
$commercial_studies_teacher = $row['commercial_studies_teacher'];
$economics_app_teacher = $row['economics_app_teacher'];
$computer_app_teacher = $row['computer_app_teacher'];
}


//*************************************** classes 4,5 & 6A ***************************************// 
if ($class == '4' || $class == '5' || $class == '6A')
{
$data = mysql_query("SELECT *,
SUM(IF(class_teacher_grade LIKE 'A%',1,0)+
IF(house_parent_grade LIKE 'A%',1,0)+
IF(english_grade LIKE 'A%',1,0)+
IF(hindi_grade LIKE 'A%',1,0)+
IF(marathi_grade LIKE 'A%',1,0)+
IF(social_studies_grade LIKE 'A%',1,0)+
IF(maths_grade LIKE 'A%',1,0)+
IF(science_grade LIKE 'A%',1,0)+
IF(resource_room_grade LIKE 'A%',1,0)+
IF(games_grade LIKE 'A%',1,0)+
IF(yoga_grade LIKE 'A%',1,0)+
IF(art_grade LIKE 'A%',1,0)+
IF(music_grade LIKE 'A%',1,0)) AS `A_grade`,
SUM(IF(class_teacher_grade LIKE 'B%',1,0)+
IF(house_parent_grade LIKE 'B%',1,0)+
IF(english_grade LIKE 'B%',1,0)+
IF(hindi_grade LIKE 'B%',1,0)+
IF(marathi_grade LIKE 'B%',1,0)+
IF(social_studies_grade LIKE 'B%',1,0)+
IF(maths_grade LIKE 'B%',1,0)+
IF(science_grade LIKE 'B%',1,0)+
IF(resource_room_grade LIKE 'B%',1,0)+
IF(games_grade LIKE 'B%',1,0)+
IF(yoga_grade LIKE 'B%',1,0)+
IF(art_grade LIKE 'B%',1,0)+
IF(music_grade LIKE 'B%',1,0)) AS `B_grade`,
SUM(IF(class_teacher_grade LIKE 'C%',1,0)+
IF(house_parent_grade LIKE 'C%',1,0)+
IF(english_grade LIKE 'C%',1,0)+
IF(marathi_grade LIKE 'C%',1,0)+
IF(hindi_grade LIKE 'C%',1,0)+
IF(social_studies_grade LIKE 'C%',1,0)+
IF(maths_grade LIKE 'C%',1,0)+
IF(science_grade LIKE 'C%',1,0)+
IF(resource_room_grade LIKE 'C%',1,0)+
IF(games_grade LIKE 'C%',1,0)+
IF(yoga_grade LIKE 'C%',1,0)+
IF(art_grade LIKE 'C%',1,0)+
IF(music_grade LIKE 'C%',1,0)) AS `C_grade`
FROM crm_2013_14 WHERE class LIKE '%$class%' GROUP BY name ORDER BY class, name");
?>

<div id="printme">
<div style="color:#575757; font-family:Trebuchet MS; font-size:13px; padding-bottom:10px;"> <img src='images2/arrow.gif' border='0' alt='edit'> <b>CRM Report :: </b><?php echo $class;?>, <b>Date :: </b><?php echo date('Y-m-d');?> &nbsp; &nbsp;
<a href="javascript:location.reload(true);" title="refresh"><img src='images2/refresh.png' border='0' alt='refresh'></a> &nbsp; &nbsp;
<?php echo "<a href=\"crm_xls.php?class=$class\" title='export to xls'><img src='images2/xls.gif' border='0' alt='xls'></a>";?> &nbsp; &nbsp; 
<?php echo "<a href=\"export_pdf.php?class=$class\" title='export to pdf'><img src='images2/pdf.gif' border='0' alt='pdf'></a>";?> &nbsp; &nbsp;
<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false" title="print this page"><img src='images2/print.png' border='0' alt='pdf'></a>
</div>

<div id="printme">
<table class="table_report">
<tr>
<th class=th_report style="width:150px;"></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $class_teacher_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $house_parent_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $english_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $hindi_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $marathi_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $social_studies_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $science_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $maths_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $games_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $yoga_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $art_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $music_teacher;?></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:100px;"></th>
<th class=th_report style="width:5px;"></th>
</tr>

<tr>
<th class=th_report style="width:100px;">Student</th>
<th class=th_report colspan="2" style="width:200px;">Class Teacher</th>
<th class=th_report colspan="2" style="width:200px;">House Parent</th>
<th class=th_report colspan="2" style="width:200px;">English</th>
<th class=th_report colspan="2" style="width:200px;">Hindi</th>
<th class=th_report colspan="2" style="width:200px;">Marathi</th>
<th class=th_report colspan="2" style="width:200px;">Social Studies</th>
<th class=th_report colspan="2" style="width:200px;">Science</th>
<th class=th_report colspan="2" style="width:200px;">Maths</th>
<th class=th_report colspan="2" style="width:200px;">Games</th>
<th class=th_report colspan="2" style="width:200px;">Yoga</th>
<th class=th_report colspan="2" style="width:200px;">Art</th>
<th class=th_report colspan="2" style="width:200px;">Music</th>
<th class=th_report style="width:5px;">A's</th>
<th class=th_report style="width:5px;">B's</th>
<th class=th_report style="width:5px;">C's</th>
<th class=th_report style="width:100px;">Inputs After CRM</th>
<th class=th_report style="width:5px;">SC</th>
</tr>

<?php
while($result = mysql_fetch_array( $data )){
include "color_code.php";
?>
<tr class="tr_report" title="<?php echo $result['name'];?>, <?php echo $result['adm'];?>">
<td class=td_report style="font-weight:bold;"> <?php echo $result['name'];?> </td>

<td class=td_report> <?php echo $result['class_teacher'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $color;?>;"> <?php echo $result['class_teacher_grade'];?> </td>

<td class=td_report> <?php echo $result['house_parent'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $hpcolor;?>;"> <?php echo $result['house_parent_grade'];?> </td>

<td class=td_report> <?php echo $result['english'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $eng_color;?>;"> <?php echo $result['english_grade'];?> </td>

<td class=td_report> <?php echo $result['hindi'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $hindi_color;?>;"> <?php echo $result['hindi_grade'];?> </td>

<td class=td_report> <?php echo $result['marathi'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $marathi_color;?>;"> <?php echo $result['marathi_grade'];?> </td>

<td class=td_report> <?php echo $result['social_studies'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $sst_color;?>;"> <?php echo $result['social_studies_grade'];?> </td>

<td class=td_report> <?php echo $result['science'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $science_color;?>;"> <?php echo $result['science_grade'];?> </td>

<td class=td_report> <?php echo $result['maths'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $math_color;?>;"> <?php echo $result['maths_grade'];?> </td>

<td class=td_report> <?php echo $result['games'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $games_color;?>;"> <?php echo $result['games_grade'];?> </td>

<td class=td_report> <?php echo $result['yoga'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $yoga_color;?>;"> <?php echo $result['yoga_grade'];?> </td>

<td class=td_report> <?php echo $result['art'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $art_color;?>;"> <?php echo $result['art_grade'];?> </td>

<td class=td_report> <?php echo $result['music'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $music_color;?>;"> <?php echo $result['music_grade'];?> </td>
<td class=td_report style="text-align:center; background-color:lightblue; border-left:2px solid gray;"> <?php echo $result['A_grade'];?> </td>
<td class=td_report style="text-align:center; background-color:lightblue;"> <?php echo $result['B_grade'];?> </td>
<td class=td_report style="text-align:center; background-color:lightblue;"> <?php echo $result['C_grade'];?> </td>
<td class=td_report style="background-color:lightblue;"><?php echo $result['inputs_from_crm'];?></td>

<?php if ($result['special_concern'] == 'Yes')
{
?>
<td class=td_report style="background-color:#CD5C5C; font-weight:bold;"><?php echo $result['special_concern'];?></td>
<?php
}
else
{
?>
<td class=td_report style="background-color:lightblue; font-weight:bold;"><?php echo $result['special_concern'];?></td>
<?php
}
?>

</tr>
<?php
}
}


//********************************* classes 6B ************************************//

if ($class == '6B')
{

$data = mysql_query("SELECT *,
SUM(IF(class_teacher_grade LIKE 'A%',1,0)+
IF(house_parent_grade LIKE 'A%',1,0)+
IF(english_grade LIKE 'A%',1,0)+
IF(hindi_grade LIKE 'A%',1,0)+
IF(marathi_grade LIKE 'A%',1,0)+
IF(social_studies_grade LIKE 'A%',1,0)+
IF(maths_grade LIKE 'A%',1,0)+
IF(science_grade LIKE 'A%',1,0)+
IF(resource_room_grade LIKE 'A%',1,0)+
IF(games_grade LIKE 'A%',1,0)+
IF(yoga_grade LIKE 'A%',1,0)+
IF(art_grade LIKE 'A%',1,0)+
IF(music_grade LIKE 'A%',1,0)) AS `A_grade`,
SUM(IF(class_teacher_grade LIKE 'B%',1,0)+
IF(house_parent_grade LIKE 'B%',1,0)+
IF(english_grade LIKE 'B%',1,0)+
IF(hindi_grade LIKE 'B%',1,0)+
IF(marathi_grade LIKE 'B%',1,0)+
IF(social_studies_grade LIKE 'B%',1,0)+
IF(maths_grade LIKE 'B%',1,0)+
IF(science_grade LIKE 'B%',1,0)+
IF(resource_room_grade LIKE 'B%',1,0)+
IF(games_grade LIKE 'B%',1,0)+
IF(yoga_grade LIKE 'B%',1,0)+
IF(art_grade LIKE 'B%',1,0)+
IF(music_grade LIKE 'B%',1,0)) AS `B_grade`,
SUM(IF(class_teacher_grade LIKE 'C%',1,0)+
IF(house_parent_grade LIKE 'C%',1,0)+
IF(english_grade LIKE 'C%',1,0)+
IF(marathi_grade LIKE 'C%',1,0)+
IF(hindi_grade LIKE 'C%',1,0)+
IF(social_studies_grade LIKE 'C%',1,0)+
IF(maths_grade LIKE 'C%',1,0)+
IF(science_grade LIKE 'C%',1,0)+
IF(resource_room_grade LIKE 'C%',1,0)+
IF(games_grade LIKE 'C%',1,0)+
IF(yoga_grade LIKE 'C%',1,0)+
IF(art_grade LIKE 'C%',1,0)+
IF(music_grade LIKE 'C%',1,0)) AS `C_grade`
FROM crm_2013_14 WHERE class LIKE '%$class%' GROUP BY name ORDER BY class, name");
?>

<div id="printme">
<div style="color:#575757; font-family:Trebuchet MS; font-size:13px; padding-bottom:10px;"> <img src='images2/arrow.gif' border='0' alt='edit'> <b>CRM Report :: </b><?php echo $class;?>, <b>Date :: </b><?php echo date('Y-m-d');?> &nbsp; &nbsp;
<a href="javascript:location.reload(true);" title="refresh"><img src='images2/refresh.png' border='0' alt='refresh'></a> &nbsp; &nbsp;
<?php echo "<a href=\"crm_xls.php?class=$class\" title='export to xls'><img src='images2/xls.gif' border='0' alt='xls'></a>";?> &nbsp; &nbsp; 
<?php echo "<a href=\"export_pdf.php?class=$class\" title='export to pdf'><img src='images2/pdf.gif' border='0' alt='pdf'></a>";?> &nbsp; &nbsp;
<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false" title="print this page"><img src='images2/print.png' border='0' alt='pdf'></a>
</div>

<div id="printme">
<table class="table_report">
<tr>
<th class=th_report style="width:100px;"></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $class_teacher_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $house_parent_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $english_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $hindi_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $social_studies_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $science_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $maths_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $games_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $yoga_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $art_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $music_teacher;?></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:100px;"></th>
<th class=th_report style="width:5px;"></th>
</tr>

<tr>
<th class=th_report style="width:100px;">Student</th>
<th class=th_report colspan="2" style="width:200px;">Class Teacher</th>
<th class=th_report colspan="2" style="width:200px;">House Parent</th>
<th class=th_report colspan="2" style="width:200px;">English</th>
<th class=th_report colspan="2" style="width:200px;">Hindi</th>
<th class=th_report colspan="2" style="width:250px;">Social Studies</th>
<th class=th_report colspan="2" style="width:200px;">Science</th>
<th class=th_report colspan="2" style="width:200px;">Maths</th>
<th class=th_report colspan="2" style="width:200px;">Games</th>
<th class=th_report colspan="2" style="width:200px;">Yoga</th>
<th class=th_report colspan="2" style="width:200px;">Art</th>
<th class=th_report colspan="2" style="width:200px;">Music</th>
<th class=th_report style="width:5px;">A's</th>
<th class=th_report style="width:5px;">B's</th>
<th class=th_report style="width:5px;">C's</th>
<th class=th_report style="width:100px;">Inputs After CRM</th>
<th class=th_report style="width:5px;">SC</th>
</tr>

<?php
while($result = mysql_fetch_array( $data )){
include "color_code.php";
?>
<tr class="tr_report" title="<?php echo $result['name'];?>, <?php echo $result['adm'];?>">
<td class=td_report style="font-weight:bold;"> <?php echo $result['name'];?> </td>

<td class=td_report> <?php echo $result['class_teacher'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $color;?>;"> <?php echo $result['class_teacher_grade'];?> </td>

<td class=td_report> <?php echo $result['house_parent'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $hpcolor;?>;"> <?php echo $result['house_parent_grade'];?> </td>

<td class=td_report> <?php echo $result['english'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $eng_color;?>;"> <?php echo $result['english_grade'];?> </td>

<td class=td_report> <?php echo $result['hindi'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $hindi_color;?>;"> <?php echo $result['hindi_grade'];?> </td>

<td class=td_report> <?php echo $result['social_studies'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $sst_color;?>;"> <?php echo $result['social_studies_grade'];?> </td>

<td class=td_report> <?php echo $result['science'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $science_color;?>;"> <?php echo $result['science_grade'];?> </td>

<td class=td_report> <?php echo $result['maths'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $math_color;?>;"> <?php echo $result['maths_grade'];?> </td>

<td class=td_report> <?php echo $result['games'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $games_color;?>;"> <?php echo $result['games_grade'];?> </td>

<td class=td_report> <?php echo $result['yoga'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $yoga_color;?>;"> <?php echo $result['yoga_grade'];?> </td>

<td class=td_report> <?php echo $result['art'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $art_color;?>;"> <?php echo $result['art_grade'];?> </td>

<td class=td_report> <?php echo $result['music'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $music_color;?>;"> <?php echo $result['music_grade'];?> </td>
<td class=td_report style="text-align:center; background-color:lightblue; border-left:2px solid gray;"> <?php echo $result['A_grade'];?> </td>
<td class=td_report style="text-align:center; background-color:lightblue;"> <?php echo $result['B_grade'];?> </td>
<td class=td_report style="text-align:center; background-color:lightblue;"> <?php echo $result['C_grade'];?> </td>
<td class=td_report style="background-color:lightblue;"><?php echo $result['inputs_from_crm'];?></td>
<?php if ($result['special_concern'] == 'Yes')
{
?>
<td class=td_report style="background-color:#CD5C5C; font-weight:bold;"><?php echo $result['special_concern'];?></td>
<?php
}
else
{
?>
<td class=td_report style="background-color:lightblue; font-weight:bold;"><?php echo $result['special_concern'];?></td>
<?php
}
?>

</tr>
<?php
}
}



//******************************************* class 7A & 7B ***********************************************//
if ($class == '7A' || $class == '7B')
{
$data = mysql_query("SELECT *,
SUM(IF(class_teacher_grade LIKE 'A%',1,0)+
IF(house_parent_grade LIKE 'A%',1,0)+
IF(english_grade LIKE 'A%',1,0)+
IF(hindi_grade LIKE 'A%',1,0)+
IF(marathi_grade LIKE 'A%',1,0)+
IF(history_grade LIKE 'A%',1,0)+
IF(geography_grade LIKE 'A%',1,0)+
IF(maths_grade LIKE 'A%',1,0)+
IF(science_grade LIKE 'A%',1,0)+
IF(resource_room_grade LIKE 'A%',1,0)+
IF(games_grade LIKE 'A%',1,0)+
IF(yoga_grade LIKE 'A%',1,0)+
IF(art_grade LIKE 'A%',1,0)+
IF(music_grade LIKE 'A%',1,0)) AS `A_grade`,
SUM(IF(class_teacher_grade LIKE 'B%',1,0)+
IF(house_parent_grade LIKE 'B%',1,0)+
IF(english_grade LIKE 'B%',1,0)+
IF(hindi_grade LIKE 'B%',1,0)+
IF(marathi_grade LIKE 'B%',1,0)+
IF(history_grade LIKE 'B%',1,0)+
IF(geography_grade LIKE 'B%',1,0)+
IF(maths_grade LIKE 'B%',1,0)+
IF(science_grade LIKE 'B%',1,0)+
IF(resource_room_grade LIKE 'B%',1,0)+
IF(games_grade LIKE 'B%',1,0)+
IF(yoga_grade LIKE 'B%',1,0)+
IF(art_grade LIKE 'B%',1,0)+
IF(music_grade LIKE 'B%',1,0)) AS `B_grade`,
SUM(IF(class_teacher_grade LIKE 'C%',1,0)+
IF(house_parent_grade LIKE 'C%',1,0)+
IF(english_grade LIKE 'C%',1,0)+
IF(hindi_grade LIKE 'C%',1,0)+
IF(marathi_grade LIKE 'C%',1,0)+
IF(history_grade LIKE 'C%',1,0)+
IF(geography_grade LIKE 'C%',1,0)+
IF(maths_grade LIKE 'C%',1,0)+
IF(science_grade LIKE 'C%',1,0)+
IF(resource_room_grade LIKE 'C%',1,0)+
IF(games_grade LIKE 'C%',1,0)+
IF(yoga_grade LIKE 'C%',1,0)+
IF(art_grade LIKE 'C%',1,0)+
IF(music_grade LIKE 'C%',1,0)) AS `C_grade`
FROM crm_2013_14 WHERE class LIKE '%$class%' GROUP BY name ORDER BY class, name");
?>

<div id="printme">
<div style="color:#575757; font-family:Trebuchet MS; font-size:13px; padding-bottom:10px;"> <img src='images2/arrow.gif' border='0' alt='edit'> <b>CRM Report :: </b><?php echo $class;?>, <b>Date :: </b><?php echo date('Y-m-d');?> &nbsp; &nbsp;
<a href="javascript:location.reload(true);" title="refresh"><img src='images2/refresh.png' border='0' alt='refresh'></a> &nbsp; &nbsp;
<?php echo "<a href=\"crm_xls.php?class=$class\" title='export to xls'><img src='images2/xls.gif' border='0' alt='xls'></a>";?> &nbsp; &nbsp; 
<?php echo "<a href=\"export_pdf.php?class=$class\" title='export to pdf'><img src='images2/pdf.gif' border='0' alt='pdf'></a>";?> &nbsp; &nbsp;
<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false" title="print this page"><img src='images2/print.png' border='0' alt='pdf'></a>
</div>

<div id="printme">
<table class="table_report">
<tr>
<th class=th_report style="width:150px;"></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $class_teacher_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $house_parent_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $english_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $hindi_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $marathi_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $history_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $geography_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $science_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $maths_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $games_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $yoga_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $art_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $music_teacher;?></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:100px;"></th>
<th class=th_report style="width:5px;"></th>
</tr>

<tr>
<th class=th_report style="width:100px;">Student</th>
<th class=th_report colspan="2" style="width:200px;">Class Teacher</th>
<th class=th_report colspan="2" style="width:200px;">House Parent</th>
<th class=th_report colspan="2" style="width:200px;">English</th>
<th class=th_report colspan="2" style="width:200px;">Hindi</th>
<th class=th_report colspan="2" style="width:200px;">Marathi</th>
<th class=th_report colspan="2" style="width:200px;">History</th>
<th class=th_report colspan="2" style="width:200px;">geography</th>
<th class=th_report colspan="2" style="width:200px;">Science</th>
<th class=th_report colspan="2" style="width:200px;">Maths</th>
<th class=th_report colspan="2" style="width:200px;">Games</th>
<th class=th_report colspan="2" style="width:200px;">Yoga</th>
<th class=th_report colspan="2" style="width:200px;">Art</th>
<th class=th_report colspan="2" style="width:200px;">Music</th>
<th class=th_report style="width:5px;">A's</th>
<th class=th_report style="width:5px;">B's</th>
<th class=th_report style="width:5px;">C's</th>
<th class=th_report style="width:100px;">Inputs After CRM</th>
<th class=th_report style="width:5px;">SC</th>
</tr>

<?php
while($result = mysql_fetch_array( $data )){
include "color_code.php";
?>
<tr class="tr_report" title="<?php echo $result['name'];?>, <?php echo $result['adm'];?>">
<td class=td_report style="font-weight:bold;"> <?php echo $result['name'];?> </td>

<td class=td_report> <?php echo $result['class_teacher'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $color;?>;"> <?php echo $result['class_teacher_grade'];?> </td>

<td class=td_report> <?php echo $result['house_parent'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $hpcolor;?>;"> <?php echo $result['house_parent_grade'];?> </td>

<td class=td_report> <?php echo $result['english'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $eng_color;?>;"> <?php echo $result['english_grade'];?> </td>

<td class=td_report> <?php echo $result['hindi'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $hindi_color;?>;"> <?php echo $result['hindi_grade'];?> </td>

<td class=td_report> <?php echo $result['marathi'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $marathi_color;?>;"> <?php echo $result['marathi_grade'];?> </td>

<td class=td_report> <?php echo $result['history'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $his_color;?>;"> <?php echo $result['history_grade'];?> </td>

<td class=td_report> <?php echo $result['geography'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $gog_color;?>;"> <?php echo $result['geography_grade'];?> </td>

<td class=td_report> <?php echo $result['science'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $science_color;?>;"> <?php echo $result['science_grade'];?> </td>

<td class=td_report> <?php echo $result['maths'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $math_color;?>;"> <?php echo $result['maths_grade'];?> </td>

<td class=td_report> <?php echo $result['games'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $games_color;?>;"> <?php echo $result['games_grade'];?> </td>

<td class=td_report> <?php echo $result['yoga'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $yoga_color;?>;"> <?php echo $result['yoga_grade'];?> </td>

<td class=td_report> <?php echo $result['art'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $art_color;?>;"> <?php echo $result['art_grade'];?> </td>

<td class=td_report> <?php echo $result['music'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $music_color;?>;"> <?php echo $result['music_grade'];?> </td>
<td class=td_report style="text-align:center; background-color:lightblue; border-left:2px solid gray;"> <?php echo $result['A_grade'];?> </td>
<td class=td_report style="text-align:center; background-color:lightblue;"> <?php echo $result['B_grade'];?> </td>
<td class=td_report style="text-align:center; background-color:lightblue;"> <?php echo $result['C_grade'];?> </td>
<td class=td_report style="background-color:lightblue;"><?php echo $result['inputs_from_crm'];?></td>

<?php if ($result['special_concern'] == 'Yes')
{
?>
<td class=td_report style="background-color:#CD5C5C; font-weight:bold;"><?php echo $result['special_concern'];?></td>
<?php
}
else
{
?>
<td class=td_report style="background-color:lightblue; font-weight:bold;"><?php echo $result['special_concern'];?></td>
<?php
}
?>
</tr>
<?php
}
}

//*************************************** classes 8A & 8B******************************************//
if ($class == '8A' || $class == '8B')
{
$data = mysql_query("SELECT *,
SUM(IF(class_teacher_grade LIKE 'A%',1,0)+
IF(house_parent_grade LIKE 'A%',1,0)+
IF(english_grade LIKE 'A%',1,0)+
IF(hindi_grade LIKE 'A%',1,0)+
IF(marathi_grade LIKE 'A%',1,0)+
IF(history_grade LIKE 'A%',1,0)+
IF(geography_grade LIKE 'A%',1,0)+
IF(physics_grade LIKE 'A%',1,0)+
IF(chemistry_grade LIKE 'A%',1,0)+
IF(biology_grade LIKE 'A%',1,0)+
IF(maths_grade LIKE 'A%',1,0)+
IF(resource_room_grade LIKE 'A%',1,0)+
IF(games_grade LIKE 'A%',1,0)+
IF(yoga_grade LIKE 'A%',1,0)+
IF(art_grade LIKE 'A%',1,0)+
IF(music_grade LIKE 'A%',1,0)) AS `A_grade`,
SUM(IF(class_teacher_grade LIKE 'B%',1,0)+
IF(house_parent_grade LIKE 'B%',1,0)+
IF(english_grade LIKE 'B%',1,0)+
IF(hindi_grade LIKE 'B%',1,0)+
IF(marathi_grade LIKE 'B%',1,0)+
IF(history_grade LIKE 'B%',1,0)+
IF(geography_grade LIKE 'B%',1,0)+
IF(physics_grade LIKE 'B%',1,0)+
IF(chemistry_grade LIKE 'B%',1,0)+
IF(biology_grade LIKE 'B%',1,0)+
IF(maths_grade LIKE 'B%',1,0)+
IF(resource_room_grade LIKE 'B%',1,0)+
IF(games_grade LIKE 'B%',1,0)+
IF(yoga_grade LIKE 'B%',1,0)+
IF(art_grade LIKE 'B%',1,0)+
IF(music_grade LIKE 'B%',1,0)) AS `B_grade`,
SUM(IF(class_teacher_grade LIKE 'C%',1,0)+
IF(house_parent_grade LIKE 'C%',1,0)+
IF(english_grade LIKE 'C%',1,0)+
IF(hindi_grade LIKE 'C%',1,0)+
IF(marathi_grade LIKE 'C%',1,0)+
IF(history_grade LIKE 'C%',1,0)+
IF(geography_grade LIKE 'C%',1,0)+
IF(physics_grade LIKE 'C%',1,0)+
IF(chemistry_grade LIKE 'C%',1,0)+
IF(biology_grade LIKE 'C%',1,0)+
IF(maths_grade LIKE 'C%',1,0)+
IF(resource_room_grade LIKE 'C%',1,0)+
IF(games_grade LIKE 'C%',1,0)+
IF(yoga_grade LIKE 'C%',1,0)+
IF(art_grade LIKE 'C%',1,0)+
IF(music_grade LIKE 'C%',1,0)) AS `C_grade`
FROM crm_2013_14 WHERE class LIKE '%$class%' GROUP BY name ORDER BY class, name");
?>

<div id="printme">
<div style="color:#575757; font-family:Trebuchet MS; font-size:13px; padding-bottom:10px;"> <img src='images2/arrow.gif' border='0' alt='edit'> <b>CRM Report :: </b><?php echo $class;?>, <b>Date :: </b><?php echo date('Y-m-d');?> &nbsp; &nbsp;
<a href="javascript:location.reload(true);" title="refresh"><img src='images2/refresh.png' border='0' alt='refresh'></a> &nbsp; &nbsp;
<?php echo "<a href=\"crm_xls.php?class=$class\" title='export to xls'><img src='images2/xls.gif' border='0' alt='xls'></a>";?> &nbsp; &nbsp; 
<?php echo "<a href=\"export_pdf.php?class=$class\" title='export to pdf'><img src='images2/pdf.gif' border='0' alt='pdf'></a>";?> &nbsp; &nbsp;
<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false" title="print this page"><img src='images2/print.png' border='0' alt='pdf'></a>
</div>


<div id="printme">
<table class="table_report">
<tr>
<th class=th_report style="width:150px;"></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $class_teacher_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $house_parent_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $english_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $hindi_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $marathi_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $history_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $geography_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $physics_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $chemistry_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $biology_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $maths_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $games_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $yoga_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $art_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $music_teacher;?></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:100px;"></th>
<th class=th_report style="width:5px;"></th>
</tr>

<tr>
<th class=th_report style="width:100px;">Student</th>
<th class=th_report colspan="2" style="width:200px;">Class Teacher</th>
<th class=th_report colspan="2" style="width:200px;">House Parent</th>
<th class=th_report colspan="2" style="width:200px;">English</th>
<th class=th_report colspan="2" style="width:200px;">Hindi</th>
<th class=th_report colspan="2" style="width:200px;">Marathi</th>
<th class=th_report colspan="2" style="width:200px;">History</th>
<th class=th_report colspan="2" style="width:200px;">geography</th>
<th class=th_report colspan="2" style="width:200px;">Physics</th>
<th class=th_report colspan="2" style="width:200px;">Chemistry</th>
<th class=th_report colspan="2" style="width:200px;">Biology</th>
<th class=th_report colspan="2" style="width:200px;">Maths</th>
<th class=th_report colspan="2" style="width:200px;">Games</th>
<th class=th_report colspan="2" style="width:200px;">Yoga</th>
<th class=th_report colspan="2" style="width:200px;">Art</th>
<th class=th_report colspan="2" style="width:200px;">Music</th>
<th class=th_report style="width:5px;">A's</th>
<th class=th_report style="width:5px;">B's</th>
<th class=th_report style="width:5px;">C's</th>
<th class=th_report style="width:100px;">Inputs After CRM</th>
<th class=th_report style="width:5px;">SC</th>
</tr>

<?php
while($result = mysql_fetch_array( $data )){
include "color_code.php";
?>
<tr class="tr_report" title="<?php echo $result['name'];?>, <?php echo $result['adm'];?>">
<td class=td_report style="font-weight:bold;"> <?php echo $result['name'];?> </td>
<td class=td_report> <?php echo $result['class_teacher'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $color;?>;"> <?php echo $result['class_teacher_grade'];?> </td>
<td class=td_report> <?php echo $result['house_parent'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $hpcolor;?>;"> <?php echo $result['house_parent_grade'];?> </td>
<td class=td_report> <?php echo $result['english'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $eng_color;?>;"> <?php echo $result['english_grade'];?> </td>
<td class=td_report> <?php echo $result['hindi'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $hindi_color;?>;"> <?php echo $result['hindi_grade'];?> </td>

<td class=td_report> <?php echo $result['marathi'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $marathi_color;?>;"> <?php echo $result['marathi_grade'];?> </td>

<td class=td_report> <?php echo $result['history'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $his_color;?>;"> <?php echo $result['history_grade'];?> </td>

<td class=td_report> <?php echo $result['geography'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $gog_color;?>;"> <?php echo $result['geography_grade'];?> </td>


<td class=td_report> <?php echo $result['physics'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $phy_color;?>;"> <?php echo $result['physics_grade'];?> </td>


<td class=td_report> <?php echo $result['chemistry'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $chm_color;?>;"> <?php echo $result['chemistry_grade'];?> </td>

<td class=td_report> <?php echo $result['biology'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $bio_color;?>;"> <?php echo $result['biology_grade'];?> </td>

<td class=td_report> <?php echo $result['maths'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $math_color;?>;"> <?php echo $result['maths_grade'];?> </td>

<td class=td_report> <?php echo $result['games'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $games_color;?>;"> <?php echo $result['games_grade'];?> </td>

<td class=td_report> <?php echo $result['yoga'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $yoga_color;?>;"> <?php echo $result['yoga_grade'];?> </td>

<td class=td_report> <?php echo $result['art'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $art_color;?>;"> <?php echo $result['art_grade'];?> </td>

<td class=td_report> <?php echo $result['music'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $music_color;?>;"> <?php echo $result['music_grade'];?> </td>
<td class=td_report style="text-align:center; background-color:lightblue; border-left:2px solid gray;"> <?php echo $result['A_grade'];?> </td>
<td class=td_report style="text-align:center; background-color:lightblue;"> <?php echo $result['B_grade'];?> </td>
<td class=td_report style="text-align:center; background-color:lightblue;"> <?php echo $result['C_grade'];?> </td>
<td class=td_report style="background-color:lightblue;"><?php echo $result['inputs_from_crm'];?></td>
<?php if ($result['special_concern'] == 'Yes')
{
?>
<td class=td_report style="background-color:#CD5C5C; font-weight:bold;"><?php echo $result['special_concern'];?></td>
<?php
}
else
{
?>
<td class=td_report style="background-color:lightblue; font-weight:bold;"><?php echo $result['special_concern'];?></td>
<?php
}
?>
</tr>

<?php
}
}

//*********************************************classes 9A & 9B Area************************************************//
if ($class == '9A' || $class == '9B')
{
$data = mysql_query("SELECT *,
SUM(IF(class_teacher_grade LIKE 'A%',1,0)+
IF(house_parent_grade LIKE 'A%',1,0)+
IF(english_grade LIKE 'A%',1,0)+
IF(hindi_grade LIKE 'A%',1,0)+
IF(marathi_grade LIKE 'A%',1,0)+
IF(history_grade LIKE 'A%',1,0)+
IF(geography_grade LIKE 'A%',1,0)+
IF(physics_grade LIKE 'A%',1,0)+
IF(chemistry_grade LIKE 'A%',1,0)+
IF(biology_grade LIKE 'A%',1,0)+
IF(maths_grade LIKE 'A%',1,0)+
IF(resource_room_grade LIKE 'A%',1,0)+
IF(games_grade LIKE 'A%',1,0)+
IF(yoga_grade LIKE 'A%',1,0)+
IF(art_grade LIKE 'A%',1,0)+
IF(commercial_studies_grade LIKE 'A%',1,0)+
IF(economics_app_grade LIKE 'A%',1,0)+
IF(computer_app_grade LIKE 'A%',1,0)+
IF(music_grade LIKE 'A%',1,0)) AS `A_grade`,
SUM(IF(class_teacher_grade LIKE 'B%',1,0)+
IF(house_parent_grade LIKE 'B%',1,0)+
IF(english_grade LIKE 'B%',1,0)+
IF(hindi_grade LIKE 'B%',1,0)+
IF(marathi_grade LIKE 'B%',1,0)+
IF(history_grade LIKE 'B%',1,0)+
IF(geography_grade LIKE 'B%',1,0)+
IF(physics_grade LIKE 'B%',1,0)+
IF(chemistry_grade LIKE 'B%',1,0)+
IF(biology_grade LIKE 'B%',1,0)+
IF(maths_grade LIKE 'B%',1,0)+
IF(resource_room_grade LIKE 'B%',1,0)+
IF(games_grade LIKE 'B%',1,0)+
IF(yoga_grade LIKE 'B%',1,0)+
IF(art_grade LIKE 'B%',1,0)+
IF(commercial_studies_grade LIKE 'B%',1,0)+
IF(economics_app_grade LIKE 'B%',1,0)+
IF(computer_app_grade LIKE 'B%',1,0)+
IF(music_grade LIKE 'B%',1,0)) AS `B_grade`,
SUM(IF(class_teacher_grade LIKE 'C%',1,0)+
IF(house_parent_grade LIKE 'C%',1,0)+
IF(english_grade LIKE 'C%',1,0)+
IF(hindi_grade LIKE 'C%',1,0)+
IF(marathi_grade LIKE 'C%',1,0)+
IF(history_grade LIKE 'C%',1,0)+
IF(geography_grade LIKE 'C%',1,0)+
IF(physics_grade LIKE 'C%',1,0)+
IF(chemistry_grade LIKE 'C%',1,0)+
IF(biology_grade LIKE 'C%',1,0)+
IF(maths_grade LIKE 'C%',1,0)+
IF(resource_room_grade LIKE 'C%',1,0)+
IF(games_grade LIKE 'C%',1,0)+
IF(yoga_grade LIKE 'C%',1,0)+
IF(art_grade LIKE 'C%',1,0)+
IF(commercial_studies_grade LIKE 'B%',1,0)+
IF(economics_app_grade LIKE 'C%',1,0)+
IF(computer_app_grade LIKE 'C%',1,0)+
IF(music_grade LIKE 'C%',1,0)) AS `C_grade`
FROM crm_2013_14 WHERE class LIKE '%$class%' GROUP BY name ORDER BY class, name");
?>

<div id="printme">
<div style="color:#575757; font-family:Trebuchet MS; font-size:13px; padding-bottom:10px;"> <img src='images2/arrow.gif' border='0' alt='edit'> <b>CRM Report :: </b><?php echo $class;?>, <b>Date :: </b><?php echo date('Y-m-d');?> &nbsp; &nbsp;
<a href="javascript:location.reload(true);" title="refresh"><img src='images2/refresh.png' border='0' alt='refresh'></a> &nbsp; &nbsp;
<?php echo "<a href=\"crm_xls.php?class=$class\" title='export to xls'><img src='images2/xls.gif' border='0' alt='xls'></a>";?> &nbsp; &nbsp; 
<?php echo "<a href=\"export_pdf.php?class=$class\" title='export to pdf'><img src='images2/pdf.gif' border='0' alt='pdf'></a>";?> &nbsp; &nbsp;
<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false" title="print this page"><img src='images2/print.png' border='0' alt='pdf'></a>
</div>


<div id="printme">
<table class="table_report">
<tr>
<th class=th_report style="width:150px;"></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $class_teacher_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $house_parent_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $english_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $hindi_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $marathi_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $history_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $geography_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $physics_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $chemistry_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $biology_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $maths_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $commercial_studies_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $economics_app_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $computer_app_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $games_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $yoga_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $art_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $music_teacher;?></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:100px;"></th>
<th class=th_report style="width:5px;"></th>
</tr>

<tr>
<th class=th_report style="width:100px;">Student</th>
<th class=th_report colspan="2" style="width:200px;">Class Teacher</th>
<th class=th_report colspan="2" style="width:200px;">House Parent</th>
<th class=th_report colspan="2" style="width:200px;">English</th>
<th class=th_report colspan="2" style="width:200px;">Hindi</th>
<th class=th_report colspan="2" style="width:200px;">Marathi</th>
<th class=th_report colspan="2" style="width:200px;">History</th>
<th class=th_report colspan="2" style="width:200px;">geography</th>
<th class=th_report colspan="2" style="width:200px;">Physics</th>
<th class=th_report colspan="2" style="width:200px;">Chemistry</th>
<th class=th_report colspan="2" style="width:200px;">Biology</th>
<th class=th_report colspan="2" style="width:200px;">Maths</th>
<th class=th_report colspan="2" style="width:200px;">Co St</th>
<th class=th_report colspan="2" style="width:200px;">Eco App</th>
<th class=th_report colspan="2" style="width:200px;">Computer App</th>
<th class=th_report colspan="2" style="width:200px;">PE</th>
<th class=th_report colspan="2" style="width:200px;">Yoga</th>
<th class=th_report colspan="2" style="width:200px;">Art</th>
<th class=th_report colspan="2" style="width:200px;">Music</th>
<th class=th_report style="width:5px;">A's</th>
<th class=th_report style="width:5px;">B's</th>
<th class=th_report style="width:5px;">C's</th>
<th class=th_report style="width:100px;">Inputs After CRM</th>
<th class=th_report style="width:5px;">SC</th>
</tr>

<?php
while($result = mysql_fetch_array( $data )){
include "color_code.php";
?>
<tr class="tr_report" title="<?php echo $result['name'];?>, <?php echo $result['adm'];?>">
<td class=td_report style="font-weight:bold;"> <?php echo $result['name'];?> </td>
<td class=td_report> <?php echo $result['class_teacher'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $color;?>;"> <?php echo $result['class_teacher_grade'];?> </td>
<td class=td_report> <?php echo $result['house_parent'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $hpcolor;?>;"> <?php echo $result['house_parent_grade'];?> </td>
<td class=td_report> <?php echo $result['english'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $eng_color;?>;"> <?php echo $result['english_grade'];?> </td>
<td class=td_report> <?php echo $result['hindi'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $hindi_color;?>;"> <?php echo $result['hindi_grade'];?> </td>
<td class=td_report> <?php echo $result['marathi'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $marathi_color;?>;"> <?php echo $result['marathi_grade'];?> </td>

<td class=td_report> <?php echo $result['history'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $his_color;?>;"> <?php echo $result['history_grade'];?> </td>

<td class=td_report> <?php echo $result['geography'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $gog_color;?>;"> <?php echo $result['geography_grade'];?> </td>


<td class=td_report> <?php echo $result['physics'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $phy_color;?>;"> <?php echo $result['physics_grade'];?> </td>


<td class=td_report> <?php echo $result['chemistry'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $chm_color;?>;"> <?php echo $result['chemistry_grade'];?> </td>

<td class=td_report> <?php echo $result['biology'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $bio_color;?>;"> <?php echo $result['biology_grade'];?> </td>

<td class=td_report> <?php echo $result['maths'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $math_color;?>;"> <?php echo $result['maths_grade'];?> </td>

<td class=td_report> <?php echo $result['commercial_studies'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $com_st_color;?>;"> <?php echo $result['commercial_studies_grade'];?> </td>

<td class=td_report> <?php echo $result['economics_app'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $ec_app_color;?>;"> <?php echo $result['economics_app_grade'];?> </td>

<td class=td_report> <?php echo $result['computer_app'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $comp_sc_color;?>;"> <?php echo $result['computer_app_grade'];?> </td>

<td class=td_report> <?php echo $result['games'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $games_color;?>;"> <?php echo $result['games_grade'];?> </td>

<td class=td_report> <?php echo $result['yoga'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $yoga_color;?>;"> <?php echo $result['yoga_grade'];?> </td>

<td class=td_report> <?php echo $result['art'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $art_color;?>;"> <?php echo $result['art_grade'];?> </td>

<td class=td_report> <?php echo $result['music'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $music_color;?>;"> <?php echo $result['music_grade'];?> </td>

<td class=td_report style="text-align:center; background-color:lightblue; border-left:2px solid gray;"> <?php echo $result['A_grade'];?> </td>
<td class=td_report style="text-align:center; background-color:lightblue;"> <?php echo $result['B_grade'];?> </td>
<td class=td_report style="text-align:center; background-color:lightblue;"> <?php echo $result['C_grade'];?> </td>
<td class=td_report style="background-color:lightblue;"><?php echo $result['inputs_from_crm'];?></td>
<?php if ($result['special_concern'] == 'Yes')
{
?>
<td class=td_report style="background-color:#CD5C5C; font-weight:bold;"><?php echo $result['special_concern'];?></td>
<?php
}
else
{
?>
<td class=td_report style="background-color:lightblue; font-weight:bold;"><?php echo $result['special_concern'];?></td>
<?php
}
?>
</tr>
<?php
}
}

//*************************************classes 10A & 10B AREA*******************************************//
if ($class == '10A' || $class == '10B')
{
$data = mysql_query("SELECT *,
SUM(IF(class_teacher_grade LIKE 'A%',1,0)+
IF(house_parent_grade LIKE 'A%',1,0)+
IF(english_grade LIKE 'A%',1,0)+
IF(hindi_grade LIKE 'A%',1,0)+
IF(marathi_grade LIKE 'A%',1,0)+
IF(history_grade LIKE 'A%',1,0)+
IF(geography_grade LIKE 'A%',1,0)+
IF(physics_grade LIKE 'A%',1,0)+
IF(chemistry_grade LIKE 'A%',1,0)+
IF(biology_grade LIKE 'A%',1,0)+
IF(maths_grade LIKE 'A%',1,0)+
IF(resource_room_grade LIKE 'A%',1,0)+
IF(games_grade LIKE 'A%',1,0)+
IF(yoga_grade LIKE 'A%',1,0)+
IF(art_grade LIKE 'A%',1,0)+
IF(economics_app_grade LIKE 'A%',1,0)+
IF(music_grade LIKE 'A%',1,0)) AS `A_grade`,
SUM(IF(class_teacher_grade LIKE 'B%',1,0)+
IF(house_parent_grade LIKE 'B%',1,0)+
IF(english_grade LIKE 'B%',1,0)+
IF(hindi_grade LIKE 'B%',1,0)+
IF(marathi_grade LIKE 'B%',1,0)+
IF(history_grade LIKE 'B%',1,0)+
IF(geography_grade LIKE 'B%',1,0)+
IF(physics_grade LIKE 'B%',1,0)+
IF(chemistry_grade LIKE 'B%',1,0)+
IF(biology_grade LIKE 'B%',1,0)+
IF(maths_grade LIKE 'B%',1,0)+
IF(resource_room_grade LIKE 'B%',1,0)+
IF(games_grade LIKE 'B%',1,0)+
IF(yoga_grade LIKE 'B%',1,0)+
IF(art_grade LIKE 'B%',1,0)+
IF(economics_app_grade LIKE 'B%',1,0)+
IF(music_grade LIKE 'B%',1,0)) AS `B_grade`,
SUM(IF(class_teacher_grade LIKE 'C%',1,0)+
IF(house_parent_grade LIKE 'C%',1,0)+
IF(english_grade LIKE 'C%',1,0)+
IF(hindi_grade LIKE 'C%',1,0)+
IF(marathi_grade LIKE 'C%',1,0)+
IF(history_grade LIKE 'C%',1,0)+
IF(geography_grade LIKE 'C%',1,0)+
IF(physics_grade LIKE 'C%',1,0)+
IF(chemistry_grade LIKE 'C%',1,0)+
IF(biology_grade LIKE 'C%',1,0)+
IF(maths_grade LIKE 'C%',1,0)+
IF(resource_room_grade LIKE 'C%',1,0)+
IF(games_grade LIKE 'C%',1,0)+
IF(yoga_grade LIKE 'C%',1,0)+
IF(art_grade LIKE 'C%',1,0)+
IF(economics_app_grade LIKE 'C%',1,0)+
IF(music_grade LIKE 'C%',1,0)) AS `C_grade`
FROM crm_2013_14 WHERE class LIKE '%$class%' GROUP BY name ORDER BY class, name");
?>

<div id="printme">
<div style="color:#575757; font-family:Trebuchet MS; font-size:13px; padding-bottom:10px;"> <img src='images2/arrow.gif' border='0' alt='edit'> <b>CRM Report :: </b><?php echo $class;?>, <b>Date :: </b><?php echo date('Y-m-d');?> &nbsp; &nbsp;
<a href="javascript:location.reload(true);" title="refresh"><img src='images2/refresh.png' border='0' alt='refresh'></a> &nbsp; &nbsp;
<?php echo "<a href=\"crm_xls.php?class=$class\" title='export to xls'><img src='images2/xls.gif' border='0' alt='xls'></a>";?> &nbsp; &nbsp; 
<?php echo "<a href=\"export_pdf.php?class=$class\" title='export to pdf'><img src='images2/pdf.gif' border='0' alt='pdf'></a>";?> &nbsp; &nbsp;
<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false" title="print this page"><img src='images2/print.png' border='0' alt='pdf'></a>
</div>

<div id="printme">
<table class="table_report">
<tr>
<th class=th_report style="width:150px;"></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $class_teacher_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $house_parent_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $english_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $hindi_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $marathi_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $history_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $geography_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $physics_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $chemistry_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $biology_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $maths_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $economics_app_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $computer_app_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $games_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $yoga_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $art_teacher;?></th>
<th class=th_report colspan="2" style="width:200px;"><?php echo $music_teacher;?></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:5px;"></th>
<th class=th_report style="width:100px;"></th>
<th class=th_report style="width:5px;"></th>
</tr>

<tr>
<th class=th_report style="width:100px;">Student</th>
<th class=th_report colspan="2" style="width:200px;">Class Teacher</th>
<th class=th_report colspan="2" style="width:200px;">House Parent</th>
<th class=th_report colspan="2" style="width:200px;">English</th>
<th class=th_report colspan="2" style="width:200px;">Hindi</th>
<th class=th_report colspan="2" style="width:200px;">Marathi</th>
<th class=th_report colspan="2" style="width:200px;">History</th>
<th class=th_report colspan="2" style="width:200px;">geography</th>
<th class=th_report colspan="2" style="width:200px;">Physics</th>
<th class=th_report colspan="2" style="width:200px;">Chemistry</th>
<th class=th_report colspan="2" style="width:200px;">Biology</th>
<th class=th_report colspan="2" style="width:200px;">Maths</th>
<th class=th_report colspan="2" style="width:200px;">Eco App</th>
<th class=th_report colspan="2" style="width:200px;">Computer App</th>
<th class=th_report colspan="2" style="width:200px;">PE</th>
<th class=th_report colspan="2" style="width:200px;">Yoga</th>
<th class=th_report colspan="2" style="width:200px;">Art</th>
<th class=th_report colspan="2" style="width:200px;">Music</th>
<th class=th_report style="width:5px;">A's</th>
<th class=th_report style="width:5px;">B's</th>
<th class=th_report style="width:5px;">C's</th>
<th class=th_report style="width:100px;">Inputs After CRM</th>
<th class=th_report style="width:5px;">SC</th>
</tr>

<?php
while($result = mysql_fetch_array( $data )){
include "color_code.php";
?>
<tr class="tr_report" title="<?php echo $result['name'];?>, <?php echo $result['adm'];?>">
<td class=td_report style="font-weight:bold;"> <?php echo $result['name'];?> </td>
<td class=td_report> <?php echo $result['class_teacher'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $color;?>;"> <?php echo $result['class_teacher_grade'];?> </td>
<td class=td_report> <?php echo $result['house_parent'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $hpcolor;?>;"> <?php echo $result['house_parent_grade'];?> </td>
<td class=td_report> <?php echo $result['english'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $eng_color;?>;"> <?php echo $result['english_grade'];?> </td>
<td class=td_report> <?php echo $result['hindi'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $hindi_color;?>;"> <?php echo $result['hindi_grade'];?> </td>

<td class=td_report> <?php echo $result['marathi'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $marathi_color;?>;"> <?php echo $result['marathi_grade'];?> </td>

<td class=td_report> <?php echo $result['history'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $his_color;?>;"> <?php echo $result['history_grade'];?> </td>

<td class=td_report> <?php echo $result['geography'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $gog_color;?>;"> <?php echo $result['geography_grade'];?> </td>


<td class=td_report> <?php echo $result['physics'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $phy_color;?>;"> <?php echo $result['physics_grade'];?> </td>


<td class=td_report> <?php echo $result['chemistry'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $chm_color;?>;"> <?php echo $result['chemistry_grade'];?> </td>

<td class=td_report> <?php echo $result['biology'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $bio_color;?>;"> <?php echo $result['biology_grade'];?> </td>

<td class=td_report> <?php echo $result['maths'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $math_color;?>;"> <?php echo $result['maths_grade'];?> </td>

<td class=td_report> <?php echo $result['economics_app'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $ec_app_color;?>;"> <?php echo $result['economics_app_grade'];?> </td>

<td class=td_report> <?php echo $result['computer_app'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $comp_sc_color;?>;"> <?php echo $result['computer_app_grade'];?> </td>

<td class=td_report> <?php echo $result['games'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $games_color;?>;"> <?php echo $result['games_grade'];?> </td>

<td class=td_report> <?php echo $result['yoga'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $yoga_color;?>;"> <?php echo $result['yoga_grade'];?> </td>

<td class=td_report> <?php echo $result['art'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $art_color;?>;"> <?php echo $result['art_grade'];?> </td>

<td class=td_report> <?php echo $result['music'];?> </td>
<td class=td_report style="text-align:center; font-weight:bold; background-color:<?php echo $music_color;?>;"> <?php echo $result['music_grade'];?> </td>

<td class=td_report style="text-align:center; background-color:lightblue; border-left:2px solid gray;"> <?php echo $result['A_grade'];?> </td>
<td class=td_report style="text-align:center; background-color:lightblue;"> <?php echo $result['B_grade'];?> </td>
<td class=td_report style="text-align:center; background-color:lightblue;"> <?php echo $result['C_grade'];?> </td>
<td class=td_report style="background-color:lightblue;"><?php echo $result['inputs_from_crm'];?></td>

<?php if ($result['special_concern'] == 'Yes')
{
?>
<td class=td_report style="background-color:#CD5C5C; font-weight:bold;"><?php echo $result['special_concern'];?></td>
<?php
}
else
{
?>
<td class=td_report style="background-color:lightblue; font-weight:bold;"><?php echo $result['special_concern'];?></td>
<?php
}
?>
</tr>
<?php
}
}
?>

</table>
<br>
<?php
//This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	 if ($anymatches == 0)
	 {
	 echo " <p>No entries found matching your query</p>";
	 }
	  
	 //And we remind them what they searched for
	 echo "[ <b>Record Found : </b> <font color=red>$anymatches</font> ]";		
	}
	?>
</div>
</div>
<div class="clear"></div>
</div>

</body>
</html>

