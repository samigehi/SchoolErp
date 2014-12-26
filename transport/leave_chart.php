<html>
<head>
<title>leave | chart</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include("index.php");
if ($_SESSION['user_level'] == '1')
{
if (!isset($_GET['fromdate'])){
$fromdate = date('Y-m-d');
$todate = date('Y-m-d');
$staff_name = '';
$leave_type = '';
$leave_status = '';
}

if (isset($_GET['fromdate'])){
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$staff_name = $_GET['staff_name'];
$leave_type = $_GET['leave_type'];
$leave_status = $_GET['leave_status'];
}
?>
 
<h2>Leave Chart</h2>
<!-------------------------------------------------------- SELECT TYPE ----------------------------------------------------->
<table class=table1>
<form method="GET" action="<?php $_SERVER['PHP_SELF']?>" name="theForm">
<tr class=tr1>
<td class=td1>

<select name="staff_name">
<option class=pink value="">select</option>
<?php
include ('../staff/connect.php');
$staff_sql=mysql_query("SELECT staff_name FROM staff ORDER BY staff_name");
while ($staff=mysql_fetch_array($staff_sql)) {
?>
<option class=pink value="<?php echo $staff['staff_name'];?>" <?php if($staff_name == $staff['staff_name']) echo " selected"; ?>><?php echo $staff['staff_name'];?></option>
<?php
}
?>
</select>

&nbsp; &nbsp; <b>From : </b> <input style="text-align:center; background-color:#D4EDF7;" id="demo1" size="9" class="text1" type="text" name="fromdate" value="<?php echo $fromdate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<b>To : </b><input style="text-align:center; background-color:#D4EDF7;" id="demo2" size="9" class="text1" type="text" name="todate"  value="<?php echo $todate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<input type="hidden" name="searching" value="yes" /><input type="submit" name="submit" value="Go" />

</td>
<tr>
</table>
<br>

<!-------------------------------------------------------- ISSUE ITEMS AREA1 ----------------------------------------------------->
<?php
if (isset($_GET['fromdate']))
{
include ("connect.php");
	$staff_name=$_GET['staff_name'];
	$leave_type=$_GET['leave_type']; //This code right here was left out
	$leave_status=$_GET['leave_status'];
	?>
	<table class=table1>
	<tr class=tr1>
	<th class=th1 style="width:2px;">Sr. No.</th>
	<th class=th1 style="width:80px;">Staff Name</th>
	<th class=th1 style="width:10px;">Apply Date</th>
	<th class=th1 style="width:40px;">Apply By</th>
	<th class=th1 style="width:100px;">From To</th>
	<th class=th1 style="width:20px;">Approved by</th>
	<th class=th1 style="width:20px;">Status</th>
	<th class=th1 style="width:5px;">CL</th>
	<th class=th1 style="width:5px;">ML</th>
	<th class=th1 style="width:5px;">EL</th>
	<th class=th1 style="width:5px;">Duty</th>
	<th class=th1 style="width:80px;">Remarks</th>
	</tr>

	<?php
	$sql = "SELECT *  from leave_app where staff_name LIKE '%$staff_name%' AND leave_type LIKE '%$leave_type%' AND apply_date BETWEEN '$fromdate' AND '$todate' AND leave_status LIKE '%$leave_status%'";
	//$sql = "SELECT * from leave_app where staff_name LIKE '%$staff_name%' AND leave_type LIKE '%$leave_type%' AND apply_date BETWEEN '$fromdate' AND '$todate'";	
	$data = mysql_query($sql);
	$count = '0';
	$cl_total = '0';
	$ml_total = '0';
	$el_total = '0';	
	$duty_total = '0';
	 //And display the results
	 while($result = mysql_fetch_array( $data ))
		
	{
	$count++;
	$leave_id = $result['leave_id'];
	$staff_name = $result['staff_name'];
	$apply_date = $result['apply_date'];
	$apply_by = $result['apply_by'];
	$leave_type = $result['leave_type'];
	$cl = $result['cl'];
	$ml = $result['ml'];
	$el = $result['el'];
	$duty = $result['duty'];
	$leave_from = $result['leave_from'];
	$leave_to = $result['leave_to'];
	$approved_by = $result['approved_by'];
	$leave_status = $result['leave_status'];
	$leave_remark = $result['leave_remark'];
	?>
	
	<tr class=tr1>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1 style="text-align:left;"><?php echo "<a href=\"update.php?leave_id=$leave_id&fromdate=$fromdate&todate=$todate\">$staff_name</a>";?></td>
	<td class=td1 style="text-align:center;"><?php echo $apply_date;?></td>
	<td class=td1 style="text-align:left;"><?php echo $apply_by;?></td>
	<td class=td1 style="text-align:center;"><?php echo $leave_from;?> - <?php echo $leave_to;?></td>
	<td class=td1 style="text-align:left;"><?php echo $approved_by;?></td>
	<td class=td1 style="text-align:left;"><?php echo $leave_status;?></td>
	<td class=td1 style="text-align:center;"><?php echo $cl;?></td>
	<td class=td1 style="text-align:center;"><?php echo $ml;?></td>
	<td class=td1 style="text-align:center;"><?php echo $el;?></td>
	<td class=td1 style="text-align:center;"><?php echo $duty;?></td>	
	<td class=td1><?php echo $leave_remark;?></td>
	</tr>
	<?php
	$cl_total += $cl;	
	$ml_total += $ml;	
	$el_total += $el;	
	$duty_total += $duty;	
	 }
	?>
	<tr style="text-align:right; background-color:#A9F5E1;">
	<td class=td1 colspan="7" style="text-align:center;"><b>[ TOTAL LEAVE ]</b></td>
	<td class=td1 style="text-align:center;"><b><?php echo $cl_total;?></b></td>
	<td class=td1 style="text-align:center;"><b><?php echo $ml_total;?></b></td>
	<td class=td1 style="text-align:center;"><b><?php echo $el_total;?></b></td>	
	<td class=td1 style="text-align:center;"><b><?php echo $duty_total;?></b></td>
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
	 echo "[ <b>Records Found : </b> <font color=red>$anymatches</font> ]";
	 }
	?>
	<div align=right><?php echo "<a href=\"export_xls/issue_details_xls.php?fromdate=$fromdate&todate=$todate&staff_name=$staff_name&leave_type=$leave_type\" title='Export to Excel'>Export to xls</a>";?></div> 
	 <br>
	<?php
	mysql_close();
	}
	else 
	{
	echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
	}
	?>
	</body>
	</html>

