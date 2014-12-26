<?php

include("index.php");
include("connect.php");

$id = $_GET['id'];

$qP = "SELECT * FROM attend WHERE id = '$id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

//first form
$st_name = trim($st_name);
$st_adm = trim($st_adm);
$st_class = trim($st_class);
$st_house = trim($st_house);
$st_area = trim($st_area);
$school_date = trim($school_date);
$coment = trim($coment);
mysql_close();
?>

<html>
<head>
<title>update record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<form method="post" action="updated.php" name="formA">
<div class="contentB">
<table class=table1 >
<tr bgcolor=#E5EECC>
	<th class=th1 style="width:10px;">Date</th>
	<th class=th1 style="width:5px;">Class</th>
	<th class=th1 style="width:100px;">Name</th>
	<th class=th1 style="width:10px;">Adm No</th>
	<th class=th1 style="width:10px;">House</th>
	<th class=th1 style="width:10px;">Area</th>
	<th class=th1 style="width:5px;">Attd</th>
	<th class=th1 style="width:50px;">Remark</th>
	<th class=th1 style="width:10px;">Option</th>
</tr>
<tr>
<td class=td1 style="text-align:center;"><input style="text-align:center; background-color:#D4EDF7;" type="text1" id="inputField8" size="10" name="school_date" value="<?php echo $school_date; ?>"></td>
<td class=td1 style="text-align:center;"><?php echo $st_class; ?></td>
<td class=td1><?php echo $st_name;?></td>
<td class=td1 style="text-align:center;"><?php echo $st_adm; ?></td>
<td class=td1><?php echo $st_house; ?></td>
<td class=td1 style="text-align:center;"><?php echo $st_area; ?></td>
<td align="center" class=td1><Select NAME="attend_code">
<option class=pink value="<?php echo $attend_code; ?>"><?php echo $attend_code; ?></option>
<option class=pink value="P">P</option>
<option class=pink value="L">L</option>
<option class=pink value="A">A</option>
<option class=pink value="M">M</option>
<option class=pink value="H">H</option>
</select> </td>
<td align="center" class=td1><input name="coment" value="<?php echo $coment; ?>" type="text1" size="20" /></td>

<td class=td1 align="center"><a href="#" onclick="document.formA.submit()">Save</a><input type="hidden" name="id" value="<?=$id?>"></td>

</tr>

<!---------------------**************************** first box *******************************----------------->
</form>
</table>
<div class="clear"></div>
</div>

</body>
</html>

