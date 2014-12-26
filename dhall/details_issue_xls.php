<html>
<head>
<title>Export to xls | for Tally</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dsangita' || $_SESSION['user_name'] == 'nspasarkar' )
{
if (!isset($_POST['submit'])){
$fromdate = date('Y-m-d');
$todate = date('Y-m-d');
$field = '';
$find = '';
$customer_type = '';
}

if (isset($_POST['submit'])){
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];
$field = $_POST['field'];
$find = $_POST['find'];
$customer_type = $_POST['customer_type'];
}
?>
 
<h3>Export to xls - For Tally</h3>
<!-------------------------------------------------------- SELECT TYPE ----------------------------------------------------->
<table class=table1>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>" name="theForm">
<tr>
<td class=td1>
Select Type:
<Select NAME="customer_type">
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="">Select</option>
<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="Dining Hall" <?php if($customer_type == "Dining Hall") echo " selected"; ?>>Dining Hall</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="student" <?php if($customer_type == "student") echo " selected"; ?>>Student</option> 
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="staff" <?php if($customer_type == "staff") echo " selected"; ?>>Staff</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="others" <?php if($customer_type == "others") echo " selected"; ?>>Others</option>
</select>

&nbsp; &nbsp; 

<Select NAME="field">
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="issued_to" <?php if($field == "issued_to") echo " selected"; ?>>Customer name</option> 
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="iss_items" <?php if($field == "iss_items") echo " selected"; ?>>Items</option>
</select>	
<b>Enter : </b><input type="text" name="find" value="<?php echo $find;?>"/>

&nbsp; &nbsp; From : <input style="text-align:center; background-color:#D4EDF7;" id="demo1" size="9" class="text1" type="text" name="fromdate" value="<?php echo $fromdate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

To : <input style="text-align:center; background-color:#D4EDF7;" id="demo2" size="9" class="text1" type="text" name="todate"  value="<?php echo $todate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<input type="hidden" name="searching" value="yes" /><input type="submit" name="submit" value="Go" />

</td>
<tr>
</table>
<br>

<!-------------------------------------------------------- ISSUE ITEMS AREA1 ----------------------------------------------------->
<?php
if (isset($_POST['submit']))
{
	$customer_type = $_POST['customer_type'];
	$searching=$_POST['searching'];
	$find=$_POST['find'];
	$field=$_POST['field']; //This code right here was left out
	 
	 //This is only displayed if they have submitted the form
	 if ($searching =="yes")
	 {

	 // We preform a bit of filtering
	 $find = strtoupper($find);
	 $find = strip_tags($find);
	 $find = trim ($find);	

include("connect.php");
?>
	<table class=table1>
	<tr>
	<th class=th1 style="width:2px;">Sr. No.</th>
	<th class=th1 style="width:20px;">Date</th>
	<th class=th1 style="width:40px;">Customer Name</th>
	<th class=th1 style="width:5px;">Total Amount</th>
	</tr>

	<?php
	$sql = "SELECT issued_to, SUM(iss_qty*iss_rate) as 'total' FROM issue WHERE customer_type LIKE '%$customer_type%' AND upper($field) LIKE '%$find%' AND iss_date BETWEEN '$fromdate' AND '$todate' GROUP BY issued_to ORDER BY iss_id";	
	$data = mysql_query($sql);
	$grand_total = '0';
	$count = '0';
	 //And display the results
	 while($result = mysql_fetch_array( $data ))
	{
	$count++;
	$issued_to = $result['issued_to'];
	$total = $result['total'];
	?>
	
	<tr>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1 style="text-align:center;"><?php echo $fromdate;?> - <?php echo $todate;?></td>
	<td class=td1><?php echo $issued_to;?></td>
	<td class=td1 style="text-align:right;"><b><?php echo number_format($total,2);?></b></td>
	</tr>	
	<?php
	$grand_total += $total;	
	 }
	?>
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
	  
	 //And we remind them what they searched for
	 echo "[ <b>Record Found : </b> <font color=red>$anymatches</font> ]";
	 }
	?>
	<div align=right><?php echo "<a href=\"export_xls/tally_xls.php?fromdate=$fromdate&todate=$todate&customer_type=$customer_type&field=$field&find=$find\" title='Export to Excel'>Export to xls</a>";?></div> 
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

