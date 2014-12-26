<?php
session_start();
if ($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2' || $_SESSION['user_level'] == '4')
{
$user_name = $_SESSION['user_name'];
include("../staff/connect.php");
$sql_name = mysql_query("SELECT * from staff where login_name = '$user_name'");  
while($result_n = mysql_fetch_array( $sql_name ))
{
$staff_name = $result_n['staff_name'];
}
?>

<html>
<head>
<title>issue | details</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>	
</head>

<body>
<?php
if (!isset($_GET['fromdate'])){
$fromdate = date('Y-m-d');
$todate = date('Y-m-d');
}

if (isset($_GET['fromdate'])){
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
}
?>
 
<h3>Tuckshop details for :: <?php echo $user_name;?></h3>
<!-------------------------------------------------------- SELECT TYPE ----------------------------------------------------->
<table class=table1>
<form method="GET" action="<?php $_SERVER['PHP_SELF']?>" name="theForm">
<tr class=tr1>
<td class=td1>

<b>From : </b> <input style="text-align:center; background-color:#D4EDF7;" id="demo1" size="9" class="text1" type="text" name="fromdate" value="<?php echo $fromdate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<b>To : </b><input style="text-align:center; background-color:#D4EDF7;" id="demo2" size="9" class="text1" type="text" name="todate"  value="<?php echo $todate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<input type="hidden" name="searching" value="yes" /><input type="submit" name="submit" value="Go" />

</td>
<tr>
</table>
<br>

<!-------------------------------------------------------- ISSUE ITEMS AREA1 ----------------------------------------------------->
<?php
if (isset($_GET['fromdate']))
{
include("connect.php");
	?>
	<table class=table1>
	<tr class=tr1>
	<th class=th1 style="width:2px;">Sr. No.</th>
	<th class=th1 style="width:80px;">Items</th>
	<th class=th1 style="width:130px;">Customer Name</th>
	<th class=th1 style="width:5px;">Date</th>
	<th class=th1 style="width:2px;">Qty</th>
	<th class=th1 style="width:2px;">MRP</th>
	<th class=th1 style="width:5px;">Total</th>
	<th class=th1 style="width:40px;">Description</th>
	</tr>

	<?php
	$sql = "SELECT iss_id, iss_date, iss_items, iss_qty, customer_name, iss_remark, iss_rate, unit FROM tk_stock, tk_issue WHERE st_items = iss_items AND customer_name = '$staff_name' AND iss_date BETWEEN '$fromdate' AND '$todate' ORDER BY iss_id";	
	$data = mysql_query($sql);
	$grand_total = '0';
	$count = '0';
	 //And display the results
	 while($result = mysql_fetch_array( $data ))
		
	{
	$count++;
	$iss_id = $result['iss_id'];
	$iss_date = $result['iss_date'];
	$iss_items = $result['iss_items'];
	$iss_qty = $result['iss_qty'];
	$iss_rate = $result['iss_rate'];
	$unit = $result['unit'];
	$customer_name = $result['customer_name'];
	$iss_remark = $result['iss_remark'];
	$total = $iss_rate * $iss_qty;
	?>
	
	<tr class=tr1>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1 style="text-align:left;"><?php echo $iss_items;?></td>
	<td class=td1><?php echo $customer_name;?></td>
	<td class=td1 style="text-align:center;"><?php echo $iss_date;?></td>
	<td class=td1 style="text-align:right;"><?php echo $iss_qty;?> <?php echo $unit;?></td>
	<td class=td1 style="text-align:right;"><?php echo number_format($iss_rate,2);?></td>
	<td class=td1 style="text-align:right;"><b><?php echo number_format($total,2);?></b></td>
	<td class=td1><?php echo $iss_remark;?></td>
	</tr>
	
	<?php	
	$grand_total += $total;
	 }
	?>
	<tr style="text-align:right; background-color:#A9F5E1;">
	<td class=td1 colspan="6" align="right"><b>[ GRAND TOTAL ]</td><td class=td1><b><?php echo number_format($grand_total,2);?></b></td>
	<td class=td1></td>
	</tr>
	</table>
	</div>
	<br>
		
	<?php
	  
	 //This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	 if ($anymatches == 0)
	 {
	 echo " <p>No entries found matching your query</p>";
	 }
	  
	 //And we remind them what they searched for
	 echo "[ <b>Record Found : </b> <font color=red>$anymatches</font> ]";
	 }
	?>
	 <br>
	<?php
	mysql_close();
	}
	else 
	{
	echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
	}
	?>
	</body>
	</html>

