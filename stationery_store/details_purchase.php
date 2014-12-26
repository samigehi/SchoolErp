<html>
<head>
<title>purchase | details</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include("index.php");
if ($_SESSION['user_level'] == '1'|| $_SESSION['user_name'] == 'pusha' || $_SESSION['user_name'] == 'nspasarkar')
{
if (!isset($_GET['fromdate'])){
$fromdate = date('Y-m-d');
$todate = date('Y-m-d');
$field = '';
$find = '';
}

if (isset($_GET['fromdate'])){
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$field = $_GET['field'];
$find = $_GET['find'];
}
?>

<h3>Purchase Details</h3>
<!-------------------------------------------------------- SELECT TYPE ----------------------------------------------------->
<table class=table1>
<form method="GET" action="<?php $_SERVER['PHP_SELF']?>" name="theForm">
<tr class=tr1>
<td class=td1>

<Select NAME="field">
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="supplier_name" <?php if($field == "supplier_name") echo " selected"; ?>>Supplier</option> 
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="bill_no" <?php if($field == "bill_no") echo " selected"; ?>>Bill No</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="pr_items" <?php if($field == "pr_items") echo " selected"; ?>>Items</option>
<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="pr_id" <?php if($field == "pr_id") echo " selected"; ?>>Entry No</option>
<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="pindt_no" <?php if($field == "pindt_no") echo " selected"; ?>>Purchase Indent No</option>
</select>	

<b>Enter : </b><input type="text" name="find" value="<?php echo $find;?>"/>
&nbsp; &nbsp; <b>From : </b><input style="text-align:center; background-color:#D4EDF7;" id="demo11" size="9" class="text1" type="text" name="fromdate" value="<?php echo $fromdate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo11','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<b>To : </b><input style="text-align:center; background-color:#D4EDF7;" id="demo12" size="9" class="text1" type="text" name="todate"  value="<?php echo $todate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo12','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

	<input type="hidden" name="searching" value="yes" />
	<input type="submit" name="submit" value="Go" />

</td>
<tr>
</table>
<br>

<!-------------------------------------------------------- PURCHASE ITEMS AREA1 ----------------------------------------------------->
<?php
if (isset($_GET['fromdate']))
{
	$find=$_GET['find'];
	$field=$_GET['field']; //This code right here was left out
	  
	 // We preform a bit of filtering
	 $find = strtoupper($find);
	 $find = strip_tags($find);
	 $find = trim ($find);	
	?>
	<table class=table1>
	<tr>
	<th class=th1 style="width:5px;">Sr. No.</th>
	<th class=th1 style="width:100px;">Item</th>
	<th class=th1 style="width:5px;">Entry No</th>
	<th class=th1 style="width:5px;">Indent No</th>
	<th class=th1 style="width:80px;">Supplier Name</th>
	<th class=th1 style="width:2px;">Bill No</th>
	<th class=th1 style="width:2px;">Bill Date</th>	
	<th class=th1 style="width:2px;">Rate</th>	
	<th class=th1 style="width:2px;">Qty</th>			
	<th class=th1 style="width:2px;">VAT</th>
	<th class=th1 style="width:5px;">Total</th>
	<th class=th1 style="width:60px;">Description</th>
	</tr>

	<?php

	include("connect.php");

	$sql = "SELECT pr_id, bill_date, bill_no, pr_items, pindt_no, pr_vat, pr_qty, pr_rate, supplier_name, pr_remark, unit, ((pr_qty * pr_rate)+((pr_qty * pr_rate)*(pr_vat))/100) as 'total', st_items FROM stationery_stock, stationery_purchase WHERE st_id = pr_items AND upper($field) LIKE '%$find%' AND bill_date BETWEEN '$fromdate' AND '$todate' ORDER BY pr_id";	

	$data = mysql_query($sql);
	$grand_total = '0';
	$count = '0';	
	 //And display the results
	 while($result = mysql_fetch_array( $data ))
		
	{
	$count++;
	$pr_id = $result['pr_id'];
	$bill_date = $result['bill_date'];
	$pr_items = $result['st_items'];
	$pr_qty = $result['pr_qty'];
	$pr_rate = $result['pr_rate'];
	$unit = $result['unit'];
	$pr_vat = $result['pr_vat'];
	$bill_no = $result['bill_no'];
	$pindt_no = $result['pindt_no'];
	$supplier_name = $result['supplier_name'];
	$pr_remark = $result['pr_remark'];
	$total = $result['total'];
	?>	

	<tr class=tr1>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1 style="text-align:left;">	<?php echo "<a href=\"purchase_edit.php?pr_id=$pr_id&fromdate=$fromdate&todate=$todate&field=$field&find=$find\" title='Edit purchase - $pr_items'>$pr_items</a>";?>
	</td>
	<td class=td1 style="text-align:center;"><font color=darkred><?php echo $pr_id;?></font></td>
	<td class=td1 style="text-align:center;"><?php echo $pindt_no;?></td>
	<td class=td1 style="text-align:left;"><?php echo $supplier_name;?></td>
	<td class=td1 style="text-align:center;"><?php echo $bill_no;?></td>
	<td class=td1 style="text-align:center;"><?php echo $bill_date;?></td>	
	<td class=td1 style="text-align:right;"><?php echo $pr_rate;?></td>
	<td class=td1 style="text-align:right;"><?php echo $pr_qty;?> <?php echo $unit;?></td>	
	<td class=td1 style="text-align:right;"><?php echo $pr_vat;?>%</td>
	<td class=td1 style="text-align:right;"><b><?php echo number_format($total,2);?></b></td>
	<td class=td1><?php echo $pr_remark;?></td>	
	</tr>

	<?php	
	$grand_total += $total;
	 }
	?>
	<tr style="text-align:right; background-color:#A9F5E1;">
	<td class=td1 colspan="10" align="right"><b>[ GRAND TOTAL ] </b></td>
	<td class=td1><b><?php echo number_format($grand_total,2);?></b></td>
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
	 echo "<p>No entries found matching your query</p>";
	 }
	//And we remind them what they searched for
	 echo "[ <b>Record Found : </b> <font color=red>$anymatches</font> ]";	 
	?>	
<div align=right><?php echo "<a href=\"export_xls/purchase_details_xls.php?fromdate=$fromdate&todate=$todate&field=$field&find=$find\" title='Export to Excel'>Export to xls</a>";?></div> 
	 <br>	
	<?php
	mysql_close();
	}	
	}
	else 
	{
	echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
	}
	?>
	</body>
	</html>

