<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../mis/css/new.css" rel="stylesheet" type="text/css" />
<meta http-equiv="refresh" content="300;url=today.php">
</head>
<?php

include("../mis/index.php");
$today = date("Y-m-d");
include("../mis/connect.php");

$data = mysql_query("SELECT * FROM ele_mis WHERE el_date = '$today'");

?>
<div class="contentB">
<table class=table1 >
<tr>
<th class=th1 style="width:10px;">Date</th>
<th class=th1 style="width:10px;">MSEB kWh</th>
<th class=th1 style="width:10px;">125KVA kWh</th>
<th class=th1 style="width:10px;">30KVA kWh</th>
<th class=th1 style="width:10px;">Diesel Cons. (L)</th>
<th class=th1 style="width:10px;">kWh Per Ltrs. </th>
<th class=th1 style="width:10px;">Total kWh</th>
<th class=th1 style="width:10px;">Water Ltrs. (kL)</th>
<th class=th1 style="width:10px;">Water kWh</th>
</tr>

	<?php	
	 //And display the results
	 while($result = mysql_fetch_array( $data ))
	{

	include('el_search.php');

	 }?>

	</table>

	<?php
//This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	if ($anymatches == 0)
	 {
	 echo "<p>No entries found for today</p>";
	 }

	mysql_close();
	 ?>

</html>
