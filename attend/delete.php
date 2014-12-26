<?php

include("../attend/index.php");
include("../attend/connect.php");

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
$school_date = trim($school_date);
$coment = trim($coment);
mysql_close();
?>

<html>
<head>
<title>update record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../attend/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<form method="post" action="deleted.php" name="formA">
<div class="contentB">
<table class=table1 >
<tr bgcolor=#E5EECC>
<th class=th1 style="width:10px;">Date</th>
<th class=th1 style="width:10px;">Class</th>
<th class=th1 style="width:100px;">Name</th>
<th class=th1 style="width:30px;">Adm No</th>
<th class=th1 style="width:20px;">House</th>
<th class=th1 style="width:20px;">Attd Areas</th>
<th class=th1 style="width:5px;">Attd</th>
<th class=th1 style="width:80px;">Remark</th>
<th class=th1 style="width:5px;">Option</th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><?php echo $school_date; ?></td>
<td class=td1 style="text-align:center;"><?php echo $st_class; ?></td>
<td class=td1><?php echo $st_name; ?></td>
<td class=td1 style="text-align:center;"><?php echo $st_adm; ?></td>
<td class=td1><?php echo $st_house; ?></td>
<td class=td1 style="text-align:center;"><?php echo $attend_area; ?></option></td>
<td align="center" class=td1><?php echo $attend_code; ?></td>
<td align="center" class=td1><?php echo $coment; ?></td>

<td class=td1 align="center"><input type="submit" align="center" name="delete" value="Delete"></a><input type="hidden" name="id" value="<?=$id?>"></td>
</tr>

<!---------------------**************************** first box *******************************----------------->
</form>
</table>
<div class="clear"></div>
</div>

</body>
</html>

