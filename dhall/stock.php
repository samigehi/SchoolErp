<html>
<head>
<title>stock Items</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php

include("index.php");

include("connect.php");

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dsangita' || $_SESSION['user_name'] == 'rkulkarni')
{
?>
 <div id="printme">  
<h3>Stock Items</h3>
<!-------------------------------------------------------- STOCK ITEMS ----------------------------------------------------->
	<table class=table1>
	<tr>
	<th class=th1 style="width:2px;">Sr. No.</th>
	<th class=th1 style="width:100px;">Item</th>
	<th class=th1 style="width:50px;">Description</th>
	<th class=th1 style="width:10px;">Qty</th>
	<th class=th1 style="width:10px;">Rate</th>	
	<th class=th1 style="width:10px;">Total</th>
        </tr>

	<?php
	$sql = "SELECT id, st_items, st_qty, unit, min_stock, st_remark, rate FROM stock ORDER BY st_items";	
	$data = mysql_query($sql);
	$grand_total = '0';
	$count = '0';

	 //And display the results
	 while($result = mysql_fetch_array( $data ))	
	 {
	$count++;
	$id = $result['id'];
	$rate = $result['rate'];
	$st_items = $result['st_items'];
	$st_qty = $result['st_qty'];
	//$pr_vat = $result['pr_vat'];
	$unit = $result['unit'];
	$min_stock = $result['min_stock'];
	$st_remark = $result['st_remark'];
	$total = ($st_qty * $rate);
	?>		
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1><?php echo "<a href=\"items_edit.php?id=$id\" title='Edit item - $st_items'>$st_items</a>";?></td>
	<td class=td1><?php echo $st_remark;?></td>
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
	<td class=td1 style="text-align:right;"><?php echo number_format($rate,2);?></td>
	<td class=td1 style="text-align:right;"><b><?php echo number_format($total,2);?></b></td>
	</tr>
	<?php
	$grand_total += $total;		
	 }?>
	</table>

	<table style="margin-top:5px;" class=table1>
	<tr>
	<td class=td1 style="text-align:right; background-color:#A9F5E1;"><b>[ GRAND TOTAL ] &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo number_format($grand_total,2);?></b></td>
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
	</body>
	</html>

