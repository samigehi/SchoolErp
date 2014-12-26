<html>
<head>
<title>get daily demand</title>
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
<h3>Daily Demand Details</h3>
<table class="table1">
<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
<tr>
<td class="td1">
&nbsp; &nbsp; From : <input style="text-align:center; background-color:#D4EDF7;" id="demo1" size="9" class="text1" type="text" name="fromdate" value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

To : <input style="text-align:center; background-color:#D4EDF7;" id="demo2" size="9" class="text1" type="text" name="todate"  value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

&nbsp; &nbsp; <input type="submit" name="submit" value="Go"> 
</td>
</tr>
</form>
</table>
<br>

<?php
if (isset($_POST['submit']))
{
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];
?>
<table class=table1>
<form method="post" action="issue_updated.php">
<tr>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Date</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Time</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Items</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Qty</b></b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>For</b></b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Of Date</b></b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>DHM Remark</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Issue Qty</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Store Remark</b></td>
</tr>
<!-------------------------------------------------------- ISSUE ITEMS AREA1 ----------------------------------------------------->
<?php
$sql="SELECT date_format(di_date,'%d-%m-%Y')di_date, di_time, di_items, di_qty, items_for, di_remark, date_format(ofdate,'%d-%m-%Y')ofdate, issue_qty, issue_updated FROM daily_issue WHERE issue_qty = '0' AND di_date BETWEEN '$fromdate' AND '$todate' ORDER BY di_time, di_items";
$result=mysql_query($sql);
if (!$result) {
               die("Database query failed: " . mysql_error());
              }
while ($row=mysql_fetch_array($result)) {
?>
<tr>
<td class=td1 style="text-align:center;"><?php echo $row['di_date'];?></td>
<td class=td1 style="text-align:center;"><?php echo $row['di_time'];?></td>
<td class=td1><input class="input1" size="15" style="background-color:#FDF5E6;" readonly="readonly" type="text" value="<?php echo $row['di_items'];?>" name="di_items[]"></td>
<td class=td1 style="text-align:right;"><?php echo $row['di_qty'];?></td>
<td class=td1 style="text-align:left;"><input class="input1" style="background-color:#FDF5E6;" readonly="readonly" size="15" class="text1" type="text" value="<?php echo $row['items_for'];?>" name="items_for[]"></td>
<td class=td1 style="text-align:center;"><?php echo $row['ofdate'];?></td>
<td class=td1><?php echo $row['di_remark'];?></td>
<td class=td1 style="text-align:center; background-color:#FFF9CC;"><input size="6" class="text1" style="text-align:right;" type="text" value="" name="issue_qty[]"></td>
<td class=td1 style="text-align:center; background-color:#FFF9CC;"><input size="15" class="text1" type="text" value="<?php echo $row['issue_updated'];?>" name="issue_updated[]"></td>
<input type="hidden" value="Dining Hall" name="issued_to">
</tr>
<?php
}
?>
</table>
<br>
	<?php
	//This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($result);
	if ($anymatches == 0) 
	 {
	 echo "No entries found matching your query";
	 }

	//This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($result);
	if ($anymatches != 0) 
	 {
	?>
	<div style="margin-top:7px; float:right;">
	<a href="#" title="top"><img src="images2/top.jpg"></a>
	</div>	
	<br>
	
	<div style="text-align:center;">
	<input type="submit" name="submit" value="update"> &nbsp; <input type="button" value="cancel" onclick="window.location='javascript:history.back()'">
	<hr style="margin-top:2px;" width=30% color=orange size=1>
	</div>
	</form>	 
	<?php
	 }
	mysql_close();
	}
	}	 
	?>
	
	</body>
	</html>
