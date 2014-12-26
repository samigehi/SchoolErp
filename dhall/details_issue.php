<html>
<head>
<title>issue | details</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dsangita' || $_SESSION['user_name'] == 'nspasarkar' || $_SESSION['user_name'] == 'rkulkarni')
{
include("connect.php");
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
<div id="printme">  
<h3>Issued Details</h3>
<!-------------------------------------------------------- SELECT TYPE ----------------------------------------------------->
<table class=table1>
<form method="GET" action="<?php $_SERVER['PHP_SELF']?>" name="theForm">
<tr class=tr1>
<td class=td1>
<Select NAME="field">
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="issued_to" <?php if($field == "issued_to") echo " selected"; ?>>Customer name</option>
 	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="iss_id" <?php if($field == "iss_id") echo " selected"; ?>>Entry No.</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="iss_items" <?php if($field == "iss_items") echo " selected"; ?>>Items</option>
</select>	

<b>Enter : </b><input type="text" name="find" value="<?php echo $find;?>"/>

&nbsp; &nbsp; <b>From : </b> <input style="text-align:center; background-color:#D4EDF7;" id="demo1" size="9" class="text1" type="text" name="fromdate" value="<?php echo $fromdate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<b>To : </b><input style="text-align:center; background-color:#D4EDF7;" id="demo2" size="9" class="text1" type="text" name="todate"  value="<?php echo $todate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<input type="hidden" name="searching" value="yes" /><input type="submit" name="submit" value="Go" />
</td>

<td class=td1 align=center><input type="button" value="Export For Tally" onclick="window.location='details_issue_xls.php'"></td>
<tr>
</table>
<br>

<!-------------------------------------------------------- ISSUE ITEMS AREA1 ----------------------------------------------------->
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
	<tr class=tr1>
	<th class=th1 style="width:2px;">Sr. No.</th>
	<th class=th1 style="width:2px;">Entry No.</th>
	<th class=th1 style="width:80px;">Items</th>
	<th class=th1 style="width:50px;">Customer Name</th>
	<th class=th1 style="width:5px;">Date</th>
	<th class=th1 style="width:2px;">Qty</th>
	<th class=th1 style="width:2px;">MRP</th>
	<th class=th1 style="width:5px;">Total</th>
	<th class=th1 style="width:40px;">Description</th>
	</tr>

	<?php
	$sql = "SELECT iss_id, iss_date, iss_items, iss_qty, issued_to, iss_remark, iss_rate, unit FROM stock, issue WHERE st_items = iss_items AND upper($field) LIKE '%$find%' AND iss_date BETWEEN '$fromdate' AND '$todate' ORDER BY iss_id";	
	$data = mysql_query($sql);
	$grand_total = '0';
	$count = '0';
	$qty_total = '0';
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
	$customer_name = $result['issued_to'];
	$iss_remark = $result['iss_remark'];
	$total = $iss_rate * $iss_qty;
	?>
	
	<tr class=tr1>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1 style="text-align:center;"><?php echo $iss_id;?></td>
	<td class=td1 style="text-align:left;"><?php echo "<a href=\"issue_edit.php?iss_id=$iss_id&fromdate=$fromdate&todate=$todate&field=$field&find=$find\" title='Edit issue - $iss_items'>$iss_items</a>";?></td>
	<td class=td1><?php echo $customer_name;?></td>
	<td class=td1 style="text-align:center;"><?php echo $iss_date;?></td>
	<td class=td1 style="text-align:right;"><?php echo $iss_qty;?> <?php echo $unit;?></td>
	<td class=td1 style="text-align:right;"><?php echo number_format($iss_rate,2);?></td>
	<td class=td1 style="text-align:right;"><b><?php echo number_format($total,2);?></b></td>
	<td class=td1><?php echo $iss_remark;?></td>
	</tr>
	
	<?php	
	$grand_total += $total;
	$qty_total += $iss_qty;
	 }
	?>
	<tr>
	<td style="text-align:right; background-color:#A9F5E1;" class=td1 colspan="5" align="right"><b>[ GRAND TOTAL ]</td>
	<td style="text-align:right; background-color:#A9F5E1;" class=td1><b><?php echo number_format($qty_total,2);?> <?php echo $unit;?></b></td>
	<td style="text-align:right; background-color:#A9F5E1;" class=td1></td>
        <td style="text-align:right; background-color:#A9F5E1;" class=td1><b><?php echo number_format($grand_total,2);?></b></td>
	<td class=td1 style="text-align:right; background-color:#A9F5E1;"></td>
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
	<?php echo "
<a href=\"export_xls/issue_details_xls.php?fromdate=$fromdate&todate=$todate&field=$field&find=$find\" title='Export to xls'><img src='images2/xls.gif' border='0' alt='xls'> Export</a>";?>
	</div>
	</td>	
	</tr>
	</table>
	<hr color=lightgray size=1>
	<?php
	}
	}
	else 
	{
	echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
	}
	?>
	</body>
	</html>

