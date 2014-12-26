<html>
<head>
<title>leave | history</title>
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
include('index.php');
if (isset($_GET['staff_name']))
{
$staff_name=$_GET['staff_name'];
if ($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2' || $_SESSION['user_level'] == '4')
{
?>
<div id="printme">
 <h2>Leave History :: <?php echo $staff_name;?></h2>
<!-------------------------------------------------------- SELECT TYPE ----------------------------------------------------->
	<table class=table1>
	<tr class=tr1>
	<th class=th1 style="width:5px;">Sr. No.</th>
	<th class=th1 style="width:60px;">Name</th>
	<th class=th1 style="width:5px;">Apply by / date</th>
	<th class=th1 style="width:5px;">From</th>
	<th class=th1 style="width:5px;">To</th>
	<th class=th1 style="width:10px;">Recommended by</th>
	<th class=th1 style="width:5px;">Status</th>
	<th class=th1 style="width:5px;">Approved by</th>
	<th class=th1 style="width:5px;">CL</th>
	<th class=th1 style="width:5px;">ML</th>
	<th class=th1 style="width:5px;">EL</th>
	<th class=th1 style="width:5px;">C-off</th>
	<th class=th1 style="width:5px;">Duty</th>
	<th class=th1 style="width:5px;">Wknd</th>
	<th class=th1 style="width:60px;">Remarks</th>	
	</tr>

	<?php
	include("connect.php");
	$sql = "SELECT *, IF(leave_type='CL', leave_days,0) as `cl`, IF(leave_type='ML', leave_days,0) as `ml`, IF(leave_type='EL', leave_days,0) as `el`,
	IF(leave_type='C-off', leave_days,0) as `c-off`, IF(leave_type='Duty', leave_days,0) as `duty`, IF(leave_type='Weekend', leave_days,0) as `weekend` from leave_app where staff_name = '$staff_name' AND leave_status='Approved' ORDER BY apply_date";	
	$data = mysql_query($sql);
	$count = '0';
	$cl_total = '0';
	$ml_total = '0';
	$el_total = '0';	
	$duty_total = '0';
	$c_off_total = '0';
	$weekend_total = '0';	
	$approved = '0';
	$pending = '0';
	$hold = '0';
	$color = '0';
	//And display the results
	while($result = mysql_fetch_array( $data ))	
	{
	$count++;
	$staff_name = $result['staff_name'];
	$apply_date = $result['apply_date'];
	$apply_by = $result['apply_by'];
	$leave_type = $result['leave_type'];
	$cl = $result['cl'];
	$ml = $result['ml'];
	$el = $result['el'];
	$duty = $result['duty'];
	$c_off = $result['c-off'];
	$weekend = $result['weekend'];
	$leave_from = $result['leave_from'];
	$leave_to = $result['leave_to'];
	$approved_by = $result['approved_by'];
	$approved_date = $result['approved_date'];
 	$recommended_by = $result['recommended_by'];
	$leave_status = $result['leave_status'];
	$leave_days = $result['leave_days'];
	$leave_remark = $result['leave_remark'];

	if ($leave_status == 'Approved'){
$approved++;
$color='green';
}

if ($leave_status == 'Pending'){
$pending++;
$color='blue';
}

if ($leave_status == 'Hold'){
$hold++;
$color='red';
}
	?>
	<tr>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1 style="text-align:left;"><?php echo $staff_name;?></td>
	<td class=td1 style="text-align:left;"><?php echo $apply_by;?> <br> <?php echo $apply_date;?></td>
	<td class=td1 style="text-align:center;"><?php echo $leave_from;?></td>
 	<td class=td1 style="text-align:center;"><?php echo $leave_to;?></td>
	<td class=td1 style="text-align:left;"><?php echo $recommended_by;?></td>
	<td class=td1 style="text-align:center; color:<?php echo $color;?>;"><?php echo $leave_status;?></td>
	<td class=td1 style="text-align:left;"><?php echo $approved_by;?> <br> <?php echo $approved_date;?></td>
	<td class=td1 style="text-align:center;"><?php echo $cl;?></td>
	<td class=td1 style="text-align:center;"><?php echo $ml;?></td>
	<td class=td1 style="text-align:center;"><?php echo $el;?></td>
	<td class=td1 style="text-align:center;"><?php echo $c_off;?></td>
	<td class=td1 style="text-align:center;"><?php echo $duty;?></td>
	<td class=td1 style="text-align:center;"><?php echo $weekend;?></td>	
	<td class=td1><?php echo $leave_remark;?></td>
	</tr>
	
	<?php
	$cl_total += $cl;	
	$ml_total += $ml;	
	$el_total += $el;	
	$duty_total += $duty;	
	$c_off_total += $c_off;
	$weekend_total += $weekend;
	}
	?>
	<tr style="text-align:right; background-color:lightgray;">
	<td class=td1 colspan="8" style="text-align:center;"><b>[ TOTAL LEAVE ]</b></td>
	<td class=td1 style="text-align:center;"><b><?php echo $cl_total;?></b></td>
	<td class=td1 style="text-align:center;"><b><?php echo $ml_total;?></b></td>
	<td class=td1 style="text-align:center;"><b><?php echo $el_total;?></b></td>	
	<td class=td1 style="text-align:center;"><b><?php echo $duty_total;?></b></td>
	<td class=td1 style="text-align:center;"><b><?php echo $c_off_total;?></b></td>
	<td class=td1 style="text-align:center;"><b><?php echo $weekend_total;?></b></td>
	<td class=td1></td>	
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
	 echo "[ <b><font color=green>Approved : </b>$approved</font> ]  &nbsp; &nbsp;";
	 echo "[ <b><font color=red>Hold : </b>$hold</font> ]";
	?>
	</td>
	</div>

	<td><div style="float:right;">	
<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false"><img src='images2/print.png' border='0' alt='print'> Print</a> &nbsp; &nbsp;
	<?php echo "<a href=\"export_xls/issue_details_xls.php?staff_name=$staff_name\"><img src='images2/xls.png' border='0' alt='xls'> Export</a>";?>
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
	else 
	{
	echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
	}
	?>
	</body>
	</html>

