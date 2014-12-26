<html>
<head>
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
if (!isset($_SESSION)) {
session_start();
}
	include('index.php');
	$fromdate = $_GET['fromdate'];
	$todate = $_GET['todate'];
	$find=$_GET['find'];
	$field=$_GET['field']; //This code right here was left out
	 	  
	 // Otherwise we connect to our Database 
	include("connect.php");
	  
	 // We preform a bit of filtering
	 $find = strtoupper($find);
	 $find = strip_tags($find);
	 $find = trim ($find);

	$data = mysql_query("SELECT * FROM gathering_2014 WHERE upper($field) LIKE'%$find%' AND app_date BETWEEN '$fromdate' AND '$todate' ORDER BY id");
	?>
<div id="printme">
<table style="margin:auto auto auto auto; width:100%; font-size:11.5px; color:#333333; border-width:1px; border-color:#999999; border-collapse: collapse;">
<tr>
	<th class=th1 style="width:5px;">Sr. No.</th>
	<th class=th1 style="width:60px;">Name</th>
	<th class=th1 style="width:5px;">Date</th>
	<th class=th1 style="width:5px;">Mobile No</th>
	<th class=th1 style="width:5px;">Email</th>	
	<th class=th1 style="width:10px;">Address</th>
	<th class=th1 style="width:10px;">Payment Details</th>
	<th class=th1 style="width:5px;">Status</th>
	<th class=th1 style="width:60px;">Edit / Delete</th>
</tr>
	<?php 
	$count = '0';
	$confirmed = '0';
	$pending = '0';
	$color = 'blue';
	 //And we display the results
	 while($result = mysql_fetch_array( $data ))
	 {
	$count++;
	$name = $result['name'];
	$id = $result['id'];
	$status = $result['status'];
	$update_date = $result['update_date'];

	if ($status == "Confirmed"){
	$confirmed++;
	$color = 'green';
	}
	
	if ($status == "Pending"){
	$pending++;
	$color = 'red';
	}

	?>
	<tr class=tr1>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1><?php echo "<a href=\"update.php?id=$id&fromdate=$fromdate&todate=$todate&find=$find&field=$field\">$name</a>";?></td>
	<td class=td1 style="text-align:center;"><?php echo $result['app_date'];?></td>
	<td class=td1><?php echo $result['mobile_no'];?></td>
	<td class=td1><?php echo $result['email'];?></td>
	<td class=td1><?php echo $result['address'];?></td>
	<td class=td1><?php echo $result['payment_details'];?></td>
	<td class=td1 title="Update Date - <?php echo $update_date;?>" style="color:<?php echo $color;?>;"><?php echo $result['status'];?></td>
	<td class=td1 style="text-align:center;"><?php echo "<a href=\"update.php?id=$id&fromdate=$fromdate&todate=$todate&find=$find&field=$field\">Edit</a>";?> | <?php echo "<a href=\"delete.php?id=$id\">Delete</a>";?></td>
	</tr>

	<?php
	 }?>
	</table>
	<br>
	<div align=right>	
	</div>
	<?php
	 //This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	 if ($anymatches == 0)
	 {
	 echo "Sorry, but we can not find an entry to match your query<br><br>";
	 }
	  
	 //And we remind them what they searched for
	?>
	<hr color=lightgray size=1>
	<table style="font-size:11px;" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td>	
	<div style="float:left; width:600px;">
	<?php
	 echo "[ <b>Searched For : </b>$find ] &nbsp; &nbsp; &nbsp; ";
	 echo "[ <b><font color=blue>Total Records : </b>$anymatches</font> ] &nbsp; &nbsp; &nbsp;";
	 echo "[ <b><font color=red>Pending : </b>$pending</font> ] &nbsp; &nbsp; &nbsp;";
	 echo "[ <b><font color=green>Confirmed : </b>$confirmed</font> ] &nbsp; &nbsp; &nbsp;";
	 ?></td>
	</div>

	<td><div style="float:right;">
	<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false"><img src='images2/print.png' border='0' alt='print'> Print</a> &nbsp; &nbsp;	
	<?php echo "<a href=\"export_xls.php?fromdate=$fromdate&todate=$todate\" title='export to xls'> <img src='images2/xls.gif' border='0' alt='xls'> Export</a>";?>
	</div>
	</td>	
	</tr>
	</table>
	<hr color=lightgray size=1>
	</div>
	<br>
	</body>
	</html>

