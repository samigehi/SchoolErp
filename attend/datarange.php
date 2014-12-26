<html>
<head>
<title>sort attendance...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php

include("../attend/index.php");

include("../attend/connect.php");
?>

<div style="float:left; width:98%; padding:10px; background-color:#FDF5E6; border:1px #98AFC7 solid;">

<form method="post" action="<?php $_SERVER['PHP_SELF']?>">

<font align=left class=message><font color=red>&nbsp;<b> * </b></font> Please fill the fields </font> &nbsp; &nbsp; From : <input style="text-align:center; background-color:#D4EDF7;" id="inputField8" size="9" class="text1" type="text" name="fromdate" value="<?php echo date('Y-m-d');?>"> &nbsp; &nbsp;

To : <input style="text-align:center; background-color:#D4EDF7;" id="inputField7"size="9" class="text1" type="text" name="todate"  value="<?php echo date('Y-m-d');?>"> &nbsp; &nbsp;

Area : <Select NAME="st_area">
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
<option style="margin:5px; padding-left: 10px;" value="10B"> class 11 </option>
<option style="margin:5px; padding-left: 10px;" value="Art">Art</option>
<option style="margin:5px; padding-left: 10px;" value="Bharatnatyam">Bharatnatyam</option>
<option style="margin:5px; padding-left: 10px;" value="Guitar">Guitar</option>
<option style="margin:5px; padding-left: 10px;" value="Games">Games</option>
<option style="margin:5px; padding-left: 10px;" value="Piano">Piano</option>
<option style="margin:5px; padding-left: 10px;" value="PT">PT</option>
<option style="margin:5px; padding-left: 10px;" value="Sitar">Sitar</option>
<option style="margin:5px; padding-left: 10px;" value="Tabla">Tabla</option>
<option style="margin:5px; padding-left: 10px;" value="Yoga">Yoga</option>
<option style="margin:5px; padding-left: 10px;" value="Vocal Music">Vocal Music</option>
</Select>

&nbsp; &nbsp; <input type="submit" name="submit" value="Go"> 
<hr align=left style="margin-top:-5px;" width=11% color=orange size=1>
</form>
</div>
<div class="clear"></div>
</div>

<?php
//Admin user
if (isset($_POST['submit']))
{
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];
$st_area = $_POST['st_area'];
$data = mysql_query("SELECT * FROM attend WHERE st_area LIKE '%$st_area%' AND school_date BETWEEN '$fromdate' AND '$todate' ORDER BY st_class, st_name");
?>

	<div class="contentB">
	<table class=table1 >
	<tr>
	<th class=th1 style="width:5px;">Sr. No.</th>
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
	
	<?php
	$count = '0';
	 //And display the results
	while($result = mysql_fetch_array( $data ))			
	{
	$count++;
 	include('search3.php');
	 }
	?>
	</table>	
	
	<?php
	//This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	if ($anymatches == 0) 
	 {
	 echo "No entries found matching your query";
	 }
  	}
	mysql_close();
	 ?>
</body>
</html>

