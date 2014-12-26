<html>
<head>
<title>Generate list...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>
</head>

<body>
<?php
include("index.php");
if (!isset($_POST['submit'])){
$house = '';
$class = '';
}

if (isset($_POST['submit'])){
$house = $_POST['house'];
$class = $_POST['class'];
}
?>

<!-------------------------------------------------------- SELECT Class ----------------------------------------------------->
<div class="addform">
<table class=table1>
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>" name="theForm">
<tr class=tr1>
<td class=td1> Class List :
<Select NAME="class">
<option style="margin:5px; padding-left: 10px;" value="">- select -</option>
<option style="margin:5px; padding-left: 10px;" value="4" <?php if($class == "4") echo " selected"; ?>>4</option>
<option style="margin:5px; padding-left: 10px;" value="5" <?php if($class == "5") echo " selected"; ?>>5</option>
<option style="margin:5px; padding-left: 10px;" value="6A" <?php if($class == "6A") echo " selected"; ?>>6A</option>
<option style="margin:5px; padding-left: 10px;" value="6B" <?php if($class == "6B") echo " selected"; ?>>6B</option>
<option style="margin:5px; padding-left: 10px;" value="7A" <?php if($class == "7A") echo " selected"; ?>>7A</option>
<option style="margin:5px; padding-left: 10px;" value="7B" <?php if($class == "7B") echo " selected"; ?>>7B</option>
<option style="margin:5px; padding-left: 10px;" value="8A" <?php if($class == "8A") echo " selected"; ?>>8A</option>
<option style="margin:5px; padding-left: 10px;" value="8B" <?php if($class == "8B") echo " selected"; ?>>8B</option>
<option style="margin:5px; padding-left: 10px;" value="9A" <?php if($class == "9A") echo " selected"; ?>>9A</option>
<option style="margin:5px; padding-left: 10px;" value="9B" <?php if($class == "9B") echo " selected"; ?>>9B</option>
<option style="margin:5px; padding-left: 10px;" value="10A" <?php if($class == "10A") echo " selected"; ?>>10A</option>
<option style="margin:5px; padding-left: 10px;" value="10B" <?php if($class == "10B") echo " selected"; ?>>10B</option>
<option style="margin:5px; padding-left: 10px;" value="11" <?php if($class == "11") echo " selected"; ?>>11</option>
<option style="margin:5px; padding-left: 10px;" value="12" <?php if($class == "12") echo " selected"; ?>>12</option>
<option style="margin:5px; padding-left: 10px;" value="Preschool" <?php if($class == "Preschool") echo " selected"; ?>>Preschool</option>
</select>	
<input type="submit" name="submit" value="Go" />
</td>
</form>

&nbsp; &nbsp; &nbsp; 
<!-------------------------------------------------------- SELECT House ----------------------------------------------------->
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>" name="theForm_2">
<td class=td1> House List :
<Select NAME="house">
<Option style="margin:5px; padding-left: 10px;" VALUE="">- select -</option>
<option style="margin:5px; padding-left: 10px;" value="Alaknanda" <?php if($house == "Alaknanda") echo " selected"; ?>> Alaknanda </option>
<option style="margin:5px; padding-left: 10px;" value="Himadri" <?php if($house == "Himadri") echo " selected"; ?>> Himadri </option>
<option style="margin:5px; padding-left: 10px;" value="Indrayani" <?php if($house == "Indrayani") echo " selected"; ?>> Indrayani </option>
<option style="margin:5px; padding-left: 10px;" value="Jaintia" <?php if($house == "Jaintia") echo " selected"; ?>> Jaintia </option>
<option style="margin:5px; padding-left: 10px;" value="Kritika" <?php if($house == "Kritika") echo " selected"; ?>> Kritika </option>
<option style="margin:5px; padding-left: 10px;" value="Palash" <?php if($house == "Palash") echo " selected"; ?>> Palash </option>
<option style="margin:5px; padding-left: 10px;" value="Phalguni" <?php if($house == "Phalguni") echo " selected"; ?>> Phalguni </option>
<option style="margin:5px; padding-left: 10px;" value="Shivneri" <?php if($house == "Shivneri") echo " selected"; ?>> Shivneri </option>
<option style="margin:5px; padding-left: 10px;" value="Shravani" <?php if($house == "Shravani") echo " selected"; ?>> Shravani </option>
<option style="margin:5px; padding-left: 10px;" value="Torna" <?php if($house == "Torna") echo " selected"; ?>> Torna </option>
<option style="margin:5px; padding-left: 10px;" value="Vishakha" <?php if($house == "Vishakha") echo " selected"; ?>> Vishakha </option>
<option style="margin:5px; padding-left: 10px;" value="BD1" <?php if($house == "BD1") echo " selected"; ?>> BD1 </option>
<option style="margin:5px; padding-left: 10px;" value="BD2" <?php if($house == "BD2") echo " selected"; ?>> BD2 </option>
<option style="margin:5px; padding-left: 10px;" value="D/s" <?php if($house == "D/s") echo " selected"; ?>> D/s </option>
</select>	
<input type="submit" name="submit" value="Go" />
</td>
<tr>
</table>
</form>
<br>

<?php
if (isset($_POST['class']))
{
$class = $_POST['class'];

$count='0';
include("connect.php");
$data = "SELECT name, adm, class, house, class_teach FROM std_2014_15 WHERE class = '$class' ORDER BY name";
$row = mysql_query($data);
?>


<table class="table1">
Class Teacher : 
<tr>
<th class=th1 style="width:2px;">Sr.No.</th>
<th class=th1 style="width:100px;">Student Name</th>
<th class=th1 style="width:2px;">Adm No.</th>
<th class=th1 style="width:2px;">Class</th>
<th class=th1 style="width:2px;">House</th>
</tr>

<?php
while($result = mysql_fetch_array( $row ))
	 {
$count++;
$adm = $result['adm'];
$name = $result['name'];
$house = $result['house'];
$class = $result['class'];
?>
<tr>
<td class=td1 style="text-align:center;"><?php echo $count;?></td>
<td class=td1><?php echo $name;?></td>
<td class=td1 style="text-align:center;"><?php echo $adm;?></td>
<td class=td1 style="text-align:center;"><?php echo $class;?></td>
<td class=td1 style="text-align:center;"><?php echo $house;?></td>
</tr>
<?php
}
}
?>
</table>

<?php
if (isset($_POST['house']))
{
$house = $_POST['house'];

$count='0';
include("connect.php");
$data = "SELECT name, adm, class, house, house_parent FROM std_2014_15 WHERE house = '$house' ORDER BY name";
$row = mysql_query($data);

?>

<table class="table1">
<tr>
<th class=th1 style="width:2px;">Sr.No.</th>
<th class=th1 style="width:100px;">Student Name</th>
<th class=th1 style="width:2px;">Adm No.</th>
<th class=th1 style="width:2px;">Class</th>
<th class=th1 style="width:2px;">House</th>
</tr>

<?php

while($result = mysql_fetch_array( $row ))
	 {
$count++;
$adm = $result['adm'];
$name = $result['name'];
$class = $result['class'];
$house = $result['house'];
?>
<tr>
<td class=td1 style="text-align:center;"><?php echo $count;?></td>
<td class=td1><?php echo $name;?></td>
<td class=td1 style="text-align:center;"><?php echo $adm;?></td>
<td class=td1 style="text-align:center;"><?php echo $class;?></td>
<td class=td1 style="text-align:center;"><?php echo $house;?></td>
</tr>
<?php
}
}
?>
</table>
<br>
<div class="contentA">
<div align="right"><?php echo "<a href='generate_list_xls.php?house='$house title='Export to xls'>Export to xls</a>";?></div>

<br>
</body>
</html>

