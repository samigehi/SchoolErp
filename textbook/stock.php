<html>
<head>
<title>Textbook :: stock Items</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include("index.php");
include("connect.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'jdeepak' || $_SESSION['user_name'] == 'nspasarkar')
{
?>
 
<h3>Stock Items</h3>
<!-------------------------------------------------------- STOCK ITEMS ----------------------------------------------------->
	<div class=tbody>	
	<table class=table1>
	<tr class=tr1>
	<th class=th1 style="width:10px;">Sr. No.</th>
	<th class=th1 style="width:120px;">Item</th>
	<th class=th1 style="width:20px;">Purchase Rate</th>	
	<th class=th1 style="width:20px;">MRP</th>		
	<th class=th1 style="width:20px;">Qty</th>
	<th class=th1 style="width:20px;">Total</th>
	<th class=th1 style="width:100px;">Description</th>
	</tr>

	<?php
	$sql = "SELECT st_id, st_items, rate, st_qty, sell_rate, unit, min_stock, st_remark FROM text_stock ORDER BY st_items";	
	$data = mysql_query($sql);
	$grand_total = '0';
	$count = '0';	
	 //And display the results
	 while($result = mysql_fetch_array( $data ))
	 {
	$count++;
	$st_id = $result['st_id'];
	$rate = $result['rate'];
	$sell_rate = $result['sell_rate'];
	$st_items = $result['st_items'];
	$st_qty = $result['st_qty'];
	$unit = $result['unit'];
	$min_stock = $result['min_stock'];
	$st_remark = $result['st_remark'];
	$total = $rate * $st_qty;
	?>	

	<tr class=tr1>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1><?php echo "<a href=\"items_edit.php?st_id=$st_id\" title='Edit item - $st_items'>$st_items</a>";?></td>
	<td class=td1 style="text-align:center;"><?php echo $rate;?></td>
	<td class=td1 style="text-align:center;"><?php echo $sell_rate;?></td>		
	<?php	
	if ($st_qty < $min_stock){
	?>	
	<td class=td1 title="Min Stock Level" style="text-align:right; color:red;"><blink><?php echo $st_qty;?> <?php echo $unit;?></blink></td>
	<?php	
	}
	?>
	
	<?php	
	if ($st_qty >= $min_stock){
	?>
	<td class=td1 style="text-align:right;"><?php echo $st_qty;?> <?php echo $unit;?></td>	
	<?php	
	}
	?>

	<td class=td1 style="text-align:right;"><b><?php echo number_format($total,2);?></b></td>
	<td class=td1><?php echo $st_remark;?></td>
	</tr>
	<?php
	$grand_total += $total;		
	 }?>
	
	<tr style="text-align:right; background-color:#A9F5E1;">
	<td class=td1 colspan="5" align="right"><b>[ GRAND TOTAL ] </b></td><td class=td1><b><?php echo number_format($grand_total,2);?></b></td>
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
	else 
	{
	echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
	}
	?>
	
<?php 
$today = date('Y-m-d');
?>
<div align=right><?php echo "<a href=\"export_xls/stock_xls.php?today=$today\" title='Export stock to Excel'>Export to xls</a>";?></div> 
	
	</div>
	</div>
	</body>
	</html>

