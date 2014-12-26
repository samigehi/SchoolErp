<html>
<head>
<title>sort attendance...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include("index.php");
include("connect.php");

$adm = $_GET['st_adm'];

$fromdate = trim($_GET['fromdate']);
$todate = trim($_GET['todate']);
$st_area = trim($_GET['st_area']);

$qP = "SELECT * FROM attend WHERE st_adm = '$adm' AND st_area = '$st_area' AND school_date BETWEEN '$fromdate' AND '$todate'";

$rsP = mysql_query($qP);
?>

	<div class="contentB">
	<table class=table1 >
	<tr>
	<th class=th1 style="width:5px;">Sr. No.</th>
	<th class=th1 style="width:10px;">Date</th>
	<th class=th1 style="width:100px;">Name</th>	
	<th class=th1 style="width:10px;">Adm No</th>
	<th class=th1 style="width:5px;">Class</th>
	<th class=th1 style="width:10px;">House</th>
	<th class=th1 style="width:10px;">Area</th>
	<th class=th1 style="width:5px;">Attd</th>
	<th class=th1 style="width:50px;">Remark</th>
	<th class=th1 style="width:10px;">Option</th>
	</tr>

	<?php
	 //And display the results
	$count = '0';
	while($result = mysql_fetch_array( $rsP ))			
	{
	$count++;
 	include('search3.php');
	 }
	?>
	</tr>
	</table>
	<?php
	//This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($rsP);
	if ($anymatches == 0) 
	 {
	 echo "No entries found matching your query";
	 }
	echo "<br>[ <b>Record Found : </b> <font color=red>$anymatches</font> ]";	
	mysql_close();	
	?>
	</table>
	</body>
	</html>

