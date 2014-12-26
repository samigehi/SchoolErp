<html>
<head>
<title>sort data by date</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../av_records/css/new.css" rel="stylesheet" type="text/css" />

</head>
<body>

<?php

include("../av_records/index.php");
include("../av_records/connect.php");
?>
<div style="float:left; width:98%; padding:10px; background-color:#FDF5E6; border:1px #98AFC7 solid;">

<form method="post" action="<?php $_SERVER['PHP_SELF']?>">

<td class=td1> Fromdate: <input style="text-align:center; background-color:#D4EDF7;" id="demo1" size="9" class="text1" type="text" name="fromdate"  value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;</td> &nbsp;

<td class=td1> Todate: <input style="text-align:center; background-color:#D4EDF7;" id="demo2" size="9" class="text1" type="text" name="todate"  value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;</td> &nbsp; 

<td class=td1>
<Select NAME="attend_code">
<option style="padding-left: 10px;" value="P">P</option>
<option style="padding-left: 10px;" value="A">A</option>
<option style="padding-left: 10px;" value="L">L</option>
</select>
</td>

&nbsp; &nbsp; <input type="submit" name="submit" value="Go"> 
</form>
</div>
<div class="clear"></div>
</div>
</div>
<br>

<?php
//Admin user
if (isset($_POST['submit']))
{
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];

$attend_code = $_POST['attend_code'];

$data = mysql_query("SELECT * FROM av_records WHERE attend_code LIKE '%$attend_code%' AND av_date BETWEEN '$fromdate' AND '$todate'");

?>

<div class="contentB">
<table class=table1 >
<tr>
<th class=th1 style="width:70px;"> Date</th>
<th class=th1 style="width:5px;">Event</th>
<th class=th1 style="width:5px;">Event Holder</th>
<th class=th1 style="width:5px;">Reqmnt1</th>
<th class=th1 style="width:5px;">Reqmnt2</th>
<th class=th1 style="width:10px;">Reqmnt3</th>
<th class=th1 style="width:5px;">St Name</th>
<th class=th1 style="width:10px;">Attend code</th>
<th class=th1 style="width:50px;">Remark</th>
</tr>

	<?php
	 //And display the results

	while($result = mysql_fetch_array( $data ))	
	{
 	include('../av_records/search3.php');
	 }
	?>
	</table>	
	<?php 	
	
	//This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	if ($anymatches == 0) 
	 {
	 echo "<p>No entries found matching your query</p>";
	 }
  	 }
	mysql_close();
	 ?>

</body>
</html>

