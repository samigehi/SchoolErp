<html>
<head>
<title>export to excel...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../attend/css/new.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="../calendar/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="../calendar/jsDatePick.min.1.3.js"></script>
			<script type="text/javascript">
			window.onload = function(){
			new JsDatePick({
			useMode:2,
			target:"inputField8",
			dateFormat:"%Y-%m-%d"
			});
			new JsDatePick({
			useMode:2,
			target:"inputField7",
			dateFormat:"%Y-%m-%d"
			});
			};
			</script>
</head>
<body>

<?php
include("../attend/index.php");
?>
<div style="float:left; width:98%; padding:10px; background-color:#FDF5E6; border:1px #98AFC7 solid;">

<form method="post" action="../attend/xls.php">
<font align=left class=message><font color=red>&nbsp;<b> * </b></font> Export Attendance Reports to Excel </font>&nbsp; &nbsp; &nbsp; &nbsp; From : <input size="9" style="text-align:center; background-color:#D4EDF7;" id="inputField8" class="text1" type="text" name="fromdate" value="<?php echo date('Y-m-d');?>">&nbsp; &nbsp; &nbsp; 

To : <input style="text-align:center; background-color:#D4EDF7;" size="9" id="inputField7" class="text1" type="text" name="todate" value="<?php echo date('Y-m-d');?>"> &nbsp;

Class : <Select NAME="attend_area">
<Option style="margin:5px; padding-left: 10px;" VALUE="">- Select -</option>
<option style="margin:5px; padding-left: 10px;" value="4"> class 4 </option>
<option style="margin:5px; padding-left: 10px;" value="5"> class 5 </option>
<option style="margin:5px; padding-left: 10px;" value="6A"> class 6A </option>
<option style="margin:5px; padding-left: 10px;" value="6B"> class 6B </option>
<option style="margin:5px; padding-left: 10px;" value="7A"> class 7A </option>
<option style="margin:5px; padding-left: 10px;" value="7B"> class 7B </option>
<option style="margin:5px; padding-left: 10px;" value="8A"> class 8A </option>
<option style="margin:5px; padding-left: 10px;" value="8B"> class 8B </option>
<option style="margin:5px; padding-left: 10px;" value="9A"> class 9A </option>
<option style="margin:5px; padding-left: 10px;" value="9B"> class 9B </option>
<option style="margin:5px; padding-left: 10px;" value="10A"> class 10A </option>
<option style="margin:5px; padding-left: 10px;" value="10B"> class 10B </option>
<option style="margin:5px; padding-left: 10px;" value="11"> class 11 </option>
<option style="margin:5px; padding-left: 10px;" value="Art">Art</option>
<option style="margin:5px; padding-left: 10px;" value="Bharatnatyam">Bharatnatyam</option>
<option style="margin:5px; padding-left: 10px;" value="Guitar">Guitar</option>
<option style="margin:5px; padding-left: 10px;" value="Piano">Piano</option>
<option style="margin:5px; padding-left: 10px;" value="Sitar">Sitar</option>
<option style="margin:5px; padding-left: 10px;" value="Tabla">Tabla</option>
<option style="margin:5px; padding-left: 10px;" value="Vocal Music">Vocal Music</option>
</Select>

&nbsp; &nbsp; <input type="submit" name="submit" value="Go">
<hr align=left style="margin-top:-5px;" width=18% color=orange size=1>
</form>
</div>
<div class="clear"></div>
</div>
<br>

