<html>
<head>
<title>C-off | details</title>
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
    win.document.write('th {border-width:1px; padding:5px; border-style:solid; border-color:#999999;}');
    win.document.write('input {font-family: Verdana; font-size: 10px; width:100px; border:0px; }');
    win.document.write('select {font-family: Verdana; font-size: 10px; width:150px; border:0px; }');
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
$coff_status = '';
}

if (isset($_GET['fromdate'])){
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$staff_name = $_GET['staff_name'];
$coff_status = $_GET['coff_status'];
}
?>
<div id="printme">
<h2>C-off Details</h2>
<!-------------------------------------------------------- SELECT TYPE ----------------------------------------------------->
<table class=table1>
<form method="GET" action="<?php $_SERVER['PHP_SELF']?>" name="theForm">
<tr class=tr1>
<td class=td1>
<b>Name : </b>
<select name="staff_name">
<option class=pink value="">select</option>
<?php
include ('../staff/connect.php');
$staff_sql=mysql_query("SELECT staff_name FROM staff WHERE designation != 'Teacher' ORDER BY staff_name");
while ($staff=mysql_fetch_array($staff_sql)) {
?>
<option class=pink value="<?php echo $staff['staff_name'];?>" <?php if($staff_name == $staff['staff_name']) echo " selected"; ?>><?php echo $staff['staff_name'];?></option>
<?php
}
?>
</select>

&nbsp; &nbsp; <b>From : </b> <input style="text-align:center; background-color:#FFEFDB;" id="demo1" size="9" class="text1" type="text" name="fromdate" value="<?php echo $fromdate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<b>To : </b><input style="text-align:center; background-color:#FFEFDB;" id="demo2" size="9" class="text1" type="text" name="todate"  value="<?php echo $todate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<b>Status : </b>
<select name="coff_status">
<option value="">All</option>
<option value="Approve" <?php if($coff_status == 'Approved') echo " selected"; ?>>Approved</option>
<option value="Pending" <?php if($coff_status == 'Pending') echo " selected"; ?>>Pending</option>
<option value="Hold" <?php if($coff_status == 'Hold') echo " selected"; ?>>Hold</option>
</select>

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
	?>
	<table class=table1>
	<tr class=tr1>
	<th class=th1 style="width:2px;">Sr. No.</th>
	<th class=th1 style="width:80px;">Staff Name</th>
	<th class=th1 style="width:10px;">Date</th>
	<th class=th1 style="width:10px;">Type</th>
	<th class=th1 style="width:10px;">Recommend by</th>
	<th class=th1 style="width:20px;">Purpose</th>
	<th class=th1 style="width:30px;">Approved Details</th>
	<th class=th1 style="width:10px;">Status</th>
	<th class=th1 style="width:10px;">Option</th>
	</tr>

	<?php
	$sql = "SELECT * from coff_leave_app where staff_name LIKE '%$staff_name%' AND coff_date BETWEEN '$fromdate' AND '$todate' AND coff_status LIKE '%$coff_status%'";
	//$sql = "SELECT * from leave_app where staff_name LIKE '%$staff_name%' AND leave_type LIKE '%$leave_type%' AND apply_date BETWEEN '$fromdate' AND '$todate'";	
	$data = mysql_query($sql);
	$count = '0';
	$approved = '0';
	$pending = '0';
	$hold = '0';
	 //And display the results
	 while($result = mysql_fetch_array( $data ))
		
	{
	$count++;
	$coff_id = $result['coff_id'];
	$staff_name = $result['staff_name'];
	$coff_date = $result['coff_date'];
	$coff_type = $result['coff_type'];
	$added_by = $result['added_by'];
	$added_date = $result['added_date'];
	$recommended_by = $result['recommended_by'];
	$coff_reason = $result['coff_reason'];
	$approved_by = $result['approved_by'];
	$approved_date = $result['approved_date'];
	$coff_status = $result['coff_status'];

if ($coff_status == 'Approved'){
$approved++;
$color='green';
}

if ($coff_status == 'Pending'){
$pending++;
$color='blue';
}

if ($coff_status == 'Hold'){
$hold++;
$color='red';
}	
	?>	
	<tr class=tr1>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1 style="text-align:left;"><?php echo "<a href=\"coff_update.php?coff_id=$coff_id&fromdate=$fromdate&todate=$todate\">$staff_name</a>";?></td>
	<td class=td1 style="text-align:center;"><?php echo $coff_date;?></td>
	<td class=td1><?php echo $coff_type;?></td>
	<td class=td1 style="text-align:left;"><?php echo $recommended_by;?></td>
	<td class=td1 style="text-align:left;"><?php echo $coff_reason;?></td>
	<td class=td1 style="text-align:left;"><?php echo $approved_by;?> &nbsp; <?php echo $approved_date;?></td>
	<td class=td1 style="text-align:left; color:<?php echo $color;?>;"><?php echo $coff_status;?></td>
	<td class=td1 style="text-align:center;">
<?php echo "<a href=\"coff_update.php?coff_id=$coff_id&fromdate=$fromdate&todate=$todate\" title='edit'><img src='images2/edit.gif' border='0' alt='edit'></a>";?> &nbsp; 
<?php echo "<a href=\"coff_delete.php?coff_id=$coff_id&fromdate=$fromdate&todate=$todate\" title='delete'><img src='images2/delete.png' border='0' alt='delete'></a>";?></td>
	</tr>
	<?php	
        }
	?>
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
	 echo "[ <b>Total Records : </b> $anymatches ] &nbsp; &nbsp; ";
	 echo "[ <b><font color=blue>Pending : </b>$pending</font> ]  &nbsp; &nbsp;";
	 echo "[ <b><font color=green>Approved : </b>$approved</font> ]  &nbsp; &nbsp;";
	 echo "[ <b><font color=red>Hold : </b>$hold</font> ]";
	?>
	</td>
	</div>

	<td><div style="float:right;">	
<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false"><img src='images2/print.png' border='0' alt='print'> Print</a> &nbsp; &nbsp;
<?php echo "<a href=\"details_leave_xls.php?fromdate=$fromdate&todate=$todate&staff_name=$staff_name\"><img src='images2/xls.png' border='0' alt='xls'> Export</a>";?></div> </td>
	</tr>
	</table>
	<hr color=lightgray size=1>
	 <br>
	</div>
	<?php
	}
	mysql_close();
	}
	else 
	{
	echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
	}
	?>
	</body>
	</html>

