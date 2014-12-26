<html>
<head>
<title>Tkshop stock Items</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php

include("index.php");

include("connect.php");

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'siraj' || $_SESSION['user_name'] == 'nspasarkar')
{
?>
<div id="printme"> 
<h3>Stock Items :: <?php echo date ('Y-m-d');?></h3>
<!-------------------------------------------------------- STOCK ITEMS ----------------------------------------------------->
	<div class="tbody">	
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
	$sql = "SELECT id, st_items, rate, st_qty, sell_rate, unit, min_stock, st_remark FROM tk_stock ORDER BY st_items";	
	$data = mysql_query($sql);
	$grand_total = '0';
	$count = '0';	
	 //And display the results
	 while($result = mysql_fetch_array( $data ))
	 {
	$count++;
	$id = $result['id'];
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
	<td class=td1><?php echo "<a href=\"items_edit.php?id=$id\" title='Edit item - $st_items'>$st_items</a>";?></td>
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
	<?php
	//This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	 if ($anymatches == 0)
	 {
	 echo " <p>No entries found matching your query</p>";
	 }
	  
	?>
	<hr color=lightgray size=1>
	<table style="font-size:11px;" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td>	
	<div style="float:left; width:400px;">
	<?php
	//And we remind them what they searched for
	echo "[ <b>Record Found : </b> <font color=red>$anymatches</font> ]";
	?>
	</td>
	</div>
	<td><div style="float:right;">
	<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false"><img src='images2/print.png' border='0' alt='print'> Print</a> &nbsp; &nbsp;	
	<?php echo "<a href=\"export_xls/stock_xls.php\" title='Export to xls'><img src='images2/xls.gif' border='0' alt='xls'> Export</a>";?>
	</div>
	</td>	
	</tr>
	</table>
	<hr color=lightgray size=1>
	<?php
	}
	else 
	{
	echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
	}
	?>
	</div>
	</body>
	</html>

