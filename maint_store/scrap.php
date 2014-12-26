<html>
<head>
<title>Scrap Items</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include("index.php");

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'pusha')
{
if (!isset($_POST['submit'])){

$fromdate = date('Y-m-d');

$todate = date('Y-m-d');
}

if (isset($_POST['submit'])){

$fromdate = $_POST['fromdate'];

$todate = $_POST['todate'];
}
?>
<h3>Scrap Items</h3>
<table class=table1>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>" name="theForm">
<tr class=tr1>
<td class=td1>
&nbsp; &nbsp;Select date &nbsp; From : <input style="text-align:center; background-color:#D4EDF7;" id="demo21" size="9" class="text1" type="text" name="fromdate" value="<?php echo $fromdate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo21','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

To : <input style="text-align:center; background-color:#D4EDF7;" id="demo22" size="9" class="text1" type="text" name="todate"  value="<?php echo $todate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo22','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<input type="hidden" name="searching" value="yes" /><input type="submit" name="submit" value="Go" />

</td>
<tr>
</table>
<br>
	<?php
	if (isset($_POST['submit']))
	{
	include ('connect.php');
	$fromdate = $_POST['fromdate'];
	$todate = $_POST['todate'];
	?>

	<table class=table1>
	<tr class=tr1>
	<th class=th1 style="width:15px;">Sr. No.</th>
	<th class=th1 style="width:20px;">Submit Date</th>
	<th class=th1 style="width:120px;">Item</th>
	<th class=th1 style="width:20px;">Qty</th>		
	<th class=th1 style="width:20px;">Department</th>
	<th class=th1 style="width:20px;">Location</th>	
	<th class=th1 style="width:20px;">Submit By</th>	
	<th class=th1 style="width:100px;">Description</th>
	</tr>

	<?php
	$sql = "SELECT * FROM maint_scrap where scrap_date BETWEEN '$fromdate' AND '$todate' ORDER BY scrap_id";	
	$data = mysql_query($sql);
	$count = '0';	
	 //And display the results
	 while($result = mysql_fetch_array( $data ))
	 {
	$count++;
	$scrap_id = $result['scrap_id'];
	$scrap_items = $result['scrap_items'];
	$scrap_qty = $result['scrap_qty'];
	$scrap_date = $result['scrap_date'];
	$scrap_department = $result['scrap_department'];
	$scrap_location = $result['scrap_location'];
	$person_by = $result['person_by'];
	$scrap_remark = $result['scrap_remark'];
	?>	

	<tr class=tr1>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1 style="text-align:center;"><?php echo $scrap_date;?></a></td>
	<td class=td1><?php echo $scrap_items;?></a></td>
	<td class=td1 style="text-align:center;"><?php echo $scrap_qty;?></td>
	<td class=td1><?php echo $scrap_department;?></td>
	<td class=td1><?php echo $scrap_location;?></td>
	<td class=td1><?php echo $person_by;?></td>
	<td class=td1><?php echo $scrap_remark;?></td>	
	</td>
	<?php
	}
	?>
	</tr>
	</table>

	</div>
	<br>
	<?php
	mysql_close();
	//This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	 if ($anymatches == 0)
	 {
	 echo " <p>No entries found matching your query</p>";
	 }
	  
	//And we remind them what they searched for
	echo "[ <b>Record Found : </b> <font color=red>$anymatches</font> ]";
	}
	}
	else 
	{
	echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
	}
	?>
	</div>
	</body>
	</html>

