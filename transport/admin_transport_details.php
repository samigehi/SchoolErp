<html>
<head>
<title>transport | details</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
  var win=null;
  function printIt(printThis)
  {
    win = window.open();
    self.focus();
    win.document.open();
    win.document.write('<'+'html'+'><'+'head'+'><'+'style'+'>');
    win.document.write('body { font-family: Verdana; font-size: 11px;}');
    win.document.write('table {font-family:verdana,arial,sans-serif; margin:auto auto auto auto; width:98%; font-size:11px; color:#333333; border-collapse: collapse;}');
    win.document.write('td {border-width:1px; padding:5px; border-style:solid; border-color:#999999;}');
    win.document.write('th {border-width:1px; padding:5px; border-style:solid; border-color:#999999; background-color:lightgray;}');
    win.document.write('input {font-family: Verdana; font-size: 10px; border:0px; }');
    win.document.write('select {font-family: Verdana; font-size: 10px; border:0px; }');
    win.document.write('textarea {font-family: Verdana; font-size: 10px; width:250px; border:0px; }');
    win.document.write('<'+'/'+'style'+'><'+'/'+'head'+'><'+'body'+'>');
    win.document.write(printThis);
    win.document.write('<'+'/'+'body'+'><'+'/'+'html'+'>');
    win.document.close();
    win.print();
    win.close();
  }
</script>
</head>

<body>
<?php
include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip')
{
if (!isset($_GET['fromdate'])){
$fromdate = date('Y-m-d');
$todate = date('Y-m-d');
$staff_name = '';
$vehicle_status = '';
}

if (isset($_GET['fromdate'])){
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$staff_name = $_GET['staff_name'];
$vehicle_status = $_GET['vehicle_status'];
}
?>
<div id="printme">
<h2>Transport Details</h2>
<!-------------------------------------------------------- SELECT TYPE ----------------------------------------------------->
<table class=table1>
<form method="GET" action="<?php $_SERVER['PHP_SELF']?>" name="theForm">
<tr class=tr1>
<td class=td1>
<b>Name : </b>
<select name="staff_name">
<option class=pink value="">All</option>
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

&nbsp; &nbsp;
<b>Status : </b>
<select name="vehicle_status">
<option value="">All</option>
<option value="Approve" <?php if($vehicle_status == 'Approved') echo " selected"; ?>>Confirmed</option>
<option value="Pending" <?php if($vehicle_status == 'Pending') echo " selected"; ?>>Pending</option>
<option value="Hold" <?php if($vehicle_status == 'Cancled') echo " selected"; ?>>Cancled</option>
</select>

&nbsp; &nbsp; <b>From : </b> <input style="text-align:center; background-color:#FFEFDB;" id="demo1" size="9" class="text1" type="text" name="fromdate" value="<?php echo $fromdate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<b>To : </b><input style="text-align:center; background-color:#FFEFDB;" id="demo2" size="9" class="text1" type="text" name="todate"  value="<?php echo $todate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

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
	$vehicle_status=$_GET['vehicle_status'];
	?>
	<table class=table1>
	<tr class=tr1>
	<th class=th1 style="width:2px;">Sr. No.</th>
	<th class=th1 style="width:80px;">Staff Name</th>
	<th class=th1 style="width:10px;">Booked Details</th>
	<th class=th1 style="width:20px;">From - To</th>
	<th class=th1 style="width:20px;">Adult</th>
	<th class=th1 style="width:20px;">Child</th>
	<th class=th1 style="width:20px;">Type</th>
        <th class=th1 style="width:20px;">To be Shared</th>
	<th class=th1 style="width:20px;">Type of Vehicle</th>
	<th class=th1 style="width:20px;">Service Provider</th>
	<th class=th1 style="width:20px;">Itinerary Details</th>
	<th class=th1 style="width:5px;">Status</th>
	<th class=th1 style="width:5px;">Option</th>
	</tr>

	<?php
	$sql = "SELECT * from transport_app where staff_name LIKE '%$staff_name%' AND depart_on BETWEEN '$fromdate' AND '$todate'";
		
	$data = mysql_query($sql);
	$count = '0';
	$confirmed = '0';
	$pending = '0';
	$cancled = '0';
	 //And display the results
	 while($result = mysql_fetch_array( $data ))
		
	{
	$count++;
	$trans_id = $result['trans_id'];
	$staff_name = $result['staff_name'];
	$booked_date = $result['booked_date'];
	$booked_by = $result['booked_by'];
	$from_location = $result['from_location'];
	$to_location = $result['to_location'];
	$adult = $result['adult'];
	$child = $result['child'];
	$trip_type = $result['trip_type'];
	$to_be_shared = $result['to_be_shared'];
	$vehicle_type = $result['vehicle_type'];
	$service_provider = $result['service_provider'];
	$vehicle_status = $result['vehicle_status'];
	$special_requirement = $result['special_requirement'];
if ($vehicle_status == 'Confirmed'){
$confirmed++;
$color='green';
}

if ($vehicle_status == 'Pending'){
$pending++;
$color='blue';
}

if ($vehicle_status == 'Cancled'){
$cancled++;
$color='red';
}
	?>
	
	<tr class=tr1>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1 style="text-align:left;"><?php echo "<a href=\"update.php?trans_id=$trans_id&fromdate=$fromdate&todate=$todate\">$staff_name</a>";?></td>
	<td class=td1 style="text-align:left;"><?php echo $booked_by;?>, <?php echo $booked_date;?></td>
	<td class=td1 style="text-align:left;"><?php echo $from_location;?> - <?php echo $to_location;?></td>
	<td class=td1 style="text-align:left;"><?php echo $adult;?></td>
	<td class=td1 style="text-align:left;"><?php echo $child;?></td>
	<td class=td1 style="text-align:left;"><?php echo $trip_type;?></td>
	<td class=td1 style="text-align:left;"><?php echo $to_be_shared;?></td>
	<td class=td1 style="text-align:left;"><?php echo $vehicle_type;?></td>
	<td class=td1 style="text-align:left;"><?php echo $service_provider;?></td>
	<td class=td1 style="text-align:left;"><?php echo $special_requirement;?></td>
	<td class=td1 style="text-align:left; color:<?php echo $color;?>;"><?php echo $vehicle_status;?></td>
	<td class=td1 style="text-align:center;">
<?php echo "<a href=\"update.php?trans_id=$trans_id&fromdate=$fromdate&todate=$todate\" title='edit'><img src='images2/edit.gif' border='0' alt='edit'></a>";?> &nbsp; 
<?php echo "<a href=\"delete.php?trans_id=$trans_id&fromdate=$fromdate&todate=$todate\" title='delete'><img src='images2/delete.png' border='0' alt='delete'></a>";?>

	</td>
	</tr>
	</table>
	
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
	<div style="float:left; width:600px;">	 
	<?php 
	 //And we remind them what they searched for
	 echo "[ <b>Records Found : </b>$anymatches ] &nbsp; &nbsp; ";
	 echo "[ <b><font color=blue>Pending : </b>$pending</font> ]  &nbsp; &nbsp;";
	 echo "[ <b><font color=green>Confirmed : </b>$confirmed</font> ]  &nbsp; &nbsp;";
	 echo "[ <b><font color=red>Cancled : </b>$cancled</font> ]";
	?>
	</td>
	</div>

	<td><div style="float:right;">	
<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false"><img src='images2/print.png' border='0' alt='print'> Print</a> &nbsp; &nbsp;
	<?php echo "<a href=\"details_transport_xls.php?fromdate=$fromdate&todate=$todate&vehicle_status=$vehicle_status\"><img src='images2/xls.png' border='0' alt='xls'> Export</a>";?>
	</div></td>
	</tr>
	</table>
	<hr color=lightgray size=1>
	 <br>
	</div>
	<?php
	 }
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

