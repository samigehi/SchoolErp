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

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'rkulkarni' )
{
?>
<table class="table1">
<h3>Issued demand details</h3>

<tr>
<td class="td1">
<form method="post" action="<?php $_SERVER['PHP_SELF']?>">

&nbsp; &nbsp; From : <input style="text-align:center; background-color:#D4EDF7;" id="demo1" size="9" class="text1" type="text" name="fromdate" value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

To : <input style="text-align:center; background-color:#D4EDF7;" id="demo2" size="9" class="text1" type="text" name="todate"  value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

&nbsp; &nbsp; <input type="submit" name="submit" value="Go"> 
</form>
</td>
</tr>
</table>
<br>

<?php
if (isset($_POST['submit']))
{
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];
?>

<table class=table1>
<tr>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Date</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Time</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Items</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Qty</b></b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>For</b></b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Of Date</b></b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>DHM Remark</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Issued Qty</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Store Remark</b></td>
</tr>
<!-------------------------------------------------------- ISSUE ITEMS AREA1 ----------------------------------------------------->
<?php
$sql="SELECT date_format(di_date,'%d-%m-%Y')di_date, di_time, di_items, items_for, di_qty, date_format(ofdate,'%d-%m-%Y')ofdate, di_remark, issue_updated, issue_qty FROM daily_issue WHERE di_date BETWEEN '$fromdate' AND '$todate' ORDER BY di_time, di_items";
$result=mysql_query($sql);
if (!$result) {
               die("Database query failed: " . mysql_error());
              }
while ($row=mysql_fetch_array($result)) {
?>
<tr>
<td class=td1 style="text-align:center;"><?php echo $row['di_date'];?></td>
<td class=td1 style="text-align:center;"><?php echo $row['di_time'];?></td>
<td class=td1><input class="input1" size="18" style="background-color:#FDF5E6;" readonly="readonly" type="text" value="<?php echo $row['di_items'];?>" name="items[]"></td>
<td class=td1 style="text-align:center;"><?php echo $row['di_qty'];?></td>
<td class=td1 style="text-align:left;"><?php echo $row['items_for'];?></td>
<td class=td1 style="text-align:center;"><?php echo $row['ofdate'];?></td>
<td class=td1><?php echo $row['di_remark'];?></td></td>
<td class=td1 style="background-color:#FFF9CC; text-align:right;"><?php echo $row['issue_qty'];?></td>
<td class=td1 style="background-color:#FFF9CC;"><?php echo $row['issue_updated'];?></td>
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
	mysql_close();
	}
	}	 
	?>
</body>
</html>
