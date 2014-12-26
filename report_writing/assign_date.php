<html>
<head>
<title>Assign date..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>
<h3>Assign Date</h3>

<?php
if ($_SESSION['user_level'] == '1'){
include ("connect.php");
$qP = "SELECT * FROM report_date";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$date_id = trim($date_id);
$teach_date_start = trim($teach_date_start);
$teach_date_end = trim($teach_date_end);
$edit_date_start = trim($edit_date_start);
$edit_date_end = trim($edit_date_end);
$final_date = trim($final_date);
mysql_close();
?>

<div style="width:80%; padding:15px; border: 1px solid orange; border-radius:25px; margin:auto auto auto auto;">
<table class=table1>
<form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<tr>
<th class=th1><b>Writing start</b></th>
<th class=th1><b>Writing end</b></th>
<th class=th1><b>Editing start</b></b></th>
<th class=th1><b></b>Editing end</b></th>
<th class=th1><b></b>Final</b></th>
<th class=th1><b>Option</b></b></th>
</tr>
<tr>
<td class=td1 style="text-align:center;">
<input style="text-align:center; background-color:#D4EDF7;" id="demo1" size="8" class="text1" type="text" name="teach_date_start" value="<?php echo $teach_date_start ;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:center; background-color:#D4EDF7;" id="demo2" size="8" class="text1" type="text" name="teach_date_end" value="<?php echo $teach_date_end ;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:center; background-color:#D4EDF7;" id="demo3" size="8" class="text1" type="text" name="edit_date_start" value="<?php echo $edit_date_start ;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo3','yyyyMMdd')" style="cursor:pointer"/>
</td>


<td class=td1 style="text-align:center;">
<input style="text-align:center; background-color:#D4EDF7;" id="demo4" size="8" class="text1" type="text" name="edit_date_end" value="<?php echo $edit_date_end ;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo4','yyyyMMdd')" style="cursor:pointer"/>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:center; background-color:#D4EDF7;" id="demo5" size="8" class="text1" type="text" name="final_date" value="<?php echo $final_date;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo5','yyyyMMdd')" style="cursor:pointer"/>
</td>

<td class=td1 style="text-align:center;"><input type="submit" name="update" value="save"> &nbsp; <input type="hidden" name="date_id" value="<?=$date_id?>"></td>
</tr>
</form>
</table>
<br>

<?php
if (isset($_GET['do'])){
echo "<font color=darkblue>Saved...</font>";
}
?>
</div>

<?php
if (isset($_GET['update'])){
include ("connect.php");
$date_id = $_GET['date_id'];
$teach_date_start = $_GET['teach_date_start'];
$teach_date_end = $_GET['teach_date_end'];
$edit_date_start = $_GET['edit_date_start'];
$edit_date_end = $_GET['edit_date_end'];
$final_date = $_GET['final_date'];

$data_update = "UPDATE report_date SET teach_date_start = '".$teach_date_start."', teach_date_end = '".$teach_date_end."', edit_date_start ='".$edit_date_start."', edit_date_end ='".$edit_date_end."', final_date = '".$final_date."' WHERE date_id = '".$date_id."'";

$update = mysql_query($data_update);

mysql_close();

if($update)
{
header ("Location: assign_date?do=save.php");
}

if(!$update)
{
echo mysql_error();
}
}
}
else 
{
echo "<br><p align=center><font color=red>Sorry! You do not have these privileges, please contact administrator.</font></p>";
echo "<br><br>&nbsp; <a href='javascript:history.back()'><< Back</a> &nbsp;";
}
?>
</body>
</html>
