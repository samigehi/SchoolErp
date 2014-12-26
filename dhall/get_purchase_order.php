<html>
<head>
<title>Purchase order details</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include("index.php");

include("connect.php");

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dsangita' )
{
?>
<div id="printme"> 
<h3>Purchase Order Details</h3>
<table class="table1">
<tr>
<td class="td1">
<form method="post" action="<?php $_SERVER['PHP_SELF']?>">

&nbsp; &nbsp; From : <input style="text-align:center; background-color:#D4EDF7;" id="demo1" size="9" class="text1" type="text" name="fromdate" value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

To : <input style="text-align:center; background-color:#D4EDF7;" id="demo2" size="9" class="text1" type="text" name="todate"  value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

&nbsp; &nbsp; <input type="submit" name="go" value="Go"> 
</form>
</td>
<td class=td1 align=center><input type="button" value="Purchase Order Form" onclick="window.location='purchase_order.php'"></td>
</tr>
</table>
<br>

<?php
if (isset($_POST['go']))
{
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];
?>
<form method="post" action="order_status.php" name="Form_st">
<table class=table1>
<tr>
<td class=td1 style="width:3px; text-align:center; background-color:lightblue;"><b>PO ID</b></td>
<td class=td1 style="width:5px; text-align:center; background-color:lightblue;"><b>PO Date</b></td>
<td class=td1 style="width:5px; text-align:center; background-color:lightblue;"><b>PO Time</b></td>
<td class=td1 style="width:100px; text-align:center; background-color:lightblue;"><b>Items</b></td>
<td class=td1 style="width:5px; text-align:center; background-color:lightblue;"><b>Qty</b></td>
<td class=td1 style="width:120px; text-align:center; background-color:lightblue;"><b>Remark</b></td>
<td class=td1 style="width:120px; text-align:center; background-color:lightblue;"><b>Order Status</b></td>
<td class=td1 style="width:10px; text-align:center; background-color:lightblue;"><b>Ordered By</b></td>
</tr>
<!-------------------------------------------------------- ISSUE ITEMS AREA1 ----------------------------------------------------->
<?php
$sql="SELECT id, date_format(po_date,'%d-%m-%Y')po_date, po_time, po_qty, po_items, ordered_by, ordered_status, po_remark FROM purchase_order WHERE po_date BETWEEN '$fromdate' AND '$todate' ORDER BY id";
$result=mysql_query($sql);
if (!$result) {
               die("Database query failed: " . mysql_error());
              }
while ($row=mysql_fetch_array($result)) {
?>

<tr>
<td class=td1 style="text-align:center;"><input type="text" size="6" class="input1" style="background-color:#FDF5E6; text-align:center;" readonly="readonly" value="<?php echo $row['id'];?>" name="id[]"></td> 
<td class=td1 style="text-align:center;"><?php echo $row['po_date'];?></td>
<td class=td1 style="text-align:center;"><?php echo $row['po_time'];?></td>
<td class=td1><?php echo $row['po_items'];?></td></td>
<td class=td1 style="text-align:center;"><?php echo $row['po_qty'];?></td>
<td class=td1><?php echo $row['po_remark'];?></td>
<td class=td1 style="text-align:center;"><Select name="ordered_status[]">
<option value="<?php echo $row['ordered_status'];?>"><?php echo $row['ordered_status'];?></option>
<option value="Ordered">Ordred</option>
<option value="Not Ordered">Not Ordred</option>
</Select>
</td>
<td class=td1 style="text-align:center;"><?php echo $row['ordered_by'];?></td>
</tr>
<?php
}
?>
</table>
<br>

<div align=center>
<input type="submit" name="submit" value="Submit"> <input type="reset" value="Reset"></div>
<hr style="margin-top:4px;" width=30% color=orange size=1>
</form>

	<?php
	//This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($result);
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
<a href=\"purchase_order_xls.php?fromdate=$fromdate & todate=$todate\" title='Export to xls'><img src='images2/xls.gif' border='0' alt='xls'> Export</a>";?>
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
 <br>
</body>
</html>
