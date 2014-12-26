<?php
session_start();
if ($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2' || $_SESSION['user_level'] == '4')
{
$user_name = $_SESSION['user_name'];
include("staff/connect.php");
$sql_name = mysql_query("SELECT * from staff where login_name = '$user_name'");  
while($result_n = mysql_fetch_array( $sql_name ))
{
$staff_name = $result_n['staff_name'];
}
?>

<html>
<head>
<title>My account</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>	
</head>

<body>
<?php
if (!isset($_GET['fromdate'])){
$fromdate = date('Y-m-d');
$todate = date('Y-m-d');
$store_name = '';
}

if (isset($_GET['fromdate'])){
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$store_name = $_GET['store_name'];
}
?>
 
<h3>My Account Details For :: <?php echo $user_name;?></h3>
<!-------------------------------------------------------- SELECT TYPE ----------------------------------------------------->
<p style="color:gray;">Select store name from the dropdown list.</p>

<table class=table1>
<form method="GET" action="<?php $_SERVER['PHP_SELF']?>" name="theForm">
<tr class=tr1>
<td class=td1>

Details of : 
<select name="store_name">
<option value="">Select</option>
<option value="tuckshop" <?php if($store_name == "tuckshop") echo " selected"; ?>>Tuckshop</option>
<option value="medical_unit" <?php if($store_name == "medical_unit") echo " selected"; ?>>Medical Unit</option>
<option value="dining_hall" <?php if($store_name == "dining_hall") echo " selected"; ?>>Dining Hall</option>
</select> &nbsp; &nbsp;

<b>From : </b> <input style="text-align:center; background-color:#D4EDF7;" id="demo1" size="9" class="text1" type="text" name="fromdate" value="<?php echo $fromdate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<b>To : </b><input style="text-align:center; background-color:#D4EDF7;" id="demo2" size="9" class="text1" type="text" name="todate"  value="<?php echo $todate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<input type="hidden" name="searching" value="yes" /><input type="submit" name="submit" value="Submit" />

</td>
<tr>
</table>
<br>

<!-------------------------------------------------------- TUCKSHOP ----------------------------------------------------->
<?php
if (isset($_GET['store_name']))
{
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
$sql='';
if ($store_name == "tuckshop"){
include("tkshop_2014_15/connect.php");
$sql = "SELECT iss_id, iss_date, iss_items, iss_qty, customer_name, iss_remark, sell_rate as 'iss_rate', unit, st_items FROM tk_stock, tk_issue WHERE st_items = iss_items AND customer_name = '$staff_name' AND iss_date BETWEEN '$fromdate' AND '$todate' ORDER BY iss_id";
}

if ($store_name == "medical_unit"){
include("mu_store/connect.php");
$sql = "SELECT iss_id, iss_date, iss_items, iss_qty, customer_name, iss_remark, iss_rate, unit, st_items FROM mu_stock, mu_issue WHERE st_id = iss_items AND customer_name = '$staff_name' AND iss_date BETWEEN '$fromdate' AND '$todate' ORDER BY iss_id";
}
	
if ($store_name == "dining_hall"){
include("dhall/connect.php");
$sql = "SELECT iss_id, iss_date, iss_items, iss_qty, issued_to as `customer_name`, iss_remark, iss_rate, unit, st_items FROM stock, issue WHERE st_items = iss_items AND issued_to = '$staff_name' AND iss_date BETWEEN '$fromdate' AND '$todate' ORDER BY iss_id";


}	$data = mysql_query($sql);
	$grand_total = '0';
	$count = '0';
	 //And display the results
	 while($result = mysql_fetch_array( $data ))
		
	{
	$count++;
	$iss_id = $result['iss_id'];
	$iss_date = $result['iss_date'];
	$st_items = $result['st_items'];
	$iss_qty = $result['iss_qty'];
	$iss_rate = $result['iss_rate'];
	$unit = $result['unit'];
	$customer_name = $result['customer_name'];
	$iss_remark = $result['iss_remark'];
	$total = $iss_rate * $iss_qty;
	?>
	
	<tr class=tr1>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1 style="text-align:left;"><?php echo $st_items;?></td>
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
	<tr style="text-align:right;">
	<th class=th1 colspan="6" align="right"><b>[ GRAND TOTAL ]</th><th class=th1><b><?php echo number_format($grand_total,2);?></b></th>
	<th class=th1></th>
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

