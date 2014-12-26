<html>
<head>
<title>stock record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include("index.php");
?>
 
<h3>Staff Issue Details</h3>
<!-------------------------------------------------------- SELECT TYPE ----------------------------------------------------->
<table class=table1>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>" name="theForm">
<tr>
<td class=td1>

&nbsp; &nbsp; From : <input style="text-align:center; background-color:#D4EDF7;" id="demo1" size="9" class="text1" type="text" name="fromdate" value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

To : <input style="text-align:center; background-color:#D4EDF7;" id="demo2" size="9" class="text1" type="text" name="todate"  value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<input type="submit" name="submit" value="Go" />

</td>
<tr>
</table>
<br>

<!-------------------------------------------------------- ISSUE ITEMS AREA1 ----------------------------------------------------->
<?php
if ($_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == 'dhstore' )
{
if (isset($_POST['submit']))
{
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];

include("connect.php");
?>
	<table class=table1>
	<tr>
	<th class=th1 style="width:5px;">Name</th>
	<th class=th1 style="width:5px;">Total</th>
	<th class=th1 style="width:100px;">Remarks of SK</th>
	</tr>

	<?php
	$sql = "SELECT iss_date, items, rate, qty, issued_to, dhst_remark FROM issue WHERE iss_date BETWEEN '$fromdate' AND '$todate' GROUP BY issued_to ORDER BY issued_to";	
	$data = mysql_query($sql);

	 //And display the results
	 while($result = mysql_fetch_array( $data ))	
	{
	$items = $result['items'];
	$qty = $result['qty'];
	$rate = $result['rate'];
	$issued_to = $result['issued_to'];
	$remark = $result['dhst_remark'];
	$total = $rate * $qty;
	?>	

	<tr>
	<td class=td1><?php echo $issued_to;?></td>
	<td class=td1 style="text-align:right;"><?php echo $total;?></td>
	<td class=td1><?php echo $remark;?></td>
	</tr>
	</tr>
	<?php	
	 }?>
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
	mysql_close();
	}
	}
	?>
	</body>
	</html>

