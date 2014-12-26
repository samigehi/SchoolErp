<html>
<head>
<title>export to xls</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>
<div style="float:left; width:98%; padding:10px; background-color:#FDF5E6; border:1px #98AFC7 solid;">

<form method="post" action="../mis/xls.php">
<font align=left class=message><font color=red>&nbsp;<b> * </b></font> Export MIS Reports to Excel </font>&nbsp; &nbsp; &nbsp; &nbsp; <b>From : </b><input size="10" style="text-align:center; background-color:#D4EDF7;" id="inputField_2" class="text1" type="text" name="fromdate" value="<?php echo date('Y-m-d');?>">&nbsp; &nbsp; &nbsp; 

<b>To : </b><input style="text-align:center; background-color:#D4EDF7;" size="10" id="inputField_3" class="text1" type="text" name="todate"  value="<?php echo date('Y-m-d');?>"> &nbsp; &nbsp;

&nbsp; &nbsp; <input type="submit" name="submitButtonName" value="Go">
<hr align=left style="margin-top:-5px;" width=18% color=orange size=1>
</form>
</div>
<div class="clear"></div>
</div>
<br>

