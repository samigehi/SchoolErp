<html>
<head>
<title>staff contacts</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h3>Staff Contacts</h3>
<!-------------------------------------------------------- STOCK ITEMS ----------------------------------------------------->
	<table class=table1 style="width:75%; margin:auto auto auto auto;">
	
	<td><b> Teaching Staff </b></td>
	<tr>
	<td></td>
	</tr>
	<tr class=tr1>
	<th class=th1 style="width:5px;">Sr. No.</th>
	<th class=th1 style="width:120px;">Name</th>
	<th class=th1 style="width:20px;">Email Id</th>		
	<th class=th1 style="width:20px;">Intranet Email Id</th>
	<th class=th1 style="width:20px;">Mobile No.</th>
	</tr>

<?php
include ('../staff/connect.php');
$sql = mysql_query("SELECT * from staff where designation IN ('Teacher', 'Principal', 'Director', 'Secretory') AND status = 'Working' ORDER BY staff_name");
	$count = '0';	
	 //And display the results
	 while($result = mysql_fetch_array( $sql ))
	 {
	$count++;
	?>

	<tr class=tr1>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1><?php echo $result['staff_name'];?></td>
	<td class=td1><?php echo $result['staff_email'];?></td>
	<td class=td1><?php echo $result['login_name'];?>@mail</td>
	<td class=td1><?php echo $result['mobile_no'];?></td>	
<?php
}
?>
</tr>


<td><br><b> Office / Non-Teaching Staff </b></td>
<tr>
<td></td>
</tr>
	<tr class=tr1>
	<th class=th1 style="width:5px;">Sr. No.</th>
	<th class=th1 style="width:120px;">Name</th>
	<th class=th1 style="width:20px;">Email Id</th>		
	<th class=th1 style="width:20px;">Intranet Email Id</th>
	<th class=th1 style="width:20px;">Mobile No.</th>
	</tr>
<?php
include ('../staff/connect.php');
$sql = mysql_query("SELECT * from staff where department IN ('Office', 'Computer', 'Medical Unit') AND status = 'Working' ORDER BY staff_name");
	$count = '0';	
	 //And display the results
	 while($result = mysql_fetch_array( $sql ))
	 {
	$count++;
	?>

	<tr class=tr1>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1><?php echo $result['staff_name'];?></td>
	<td class=td1><?php echo $result['staff_email'];?></td>
	<td class=td1><?php echo $result['login_name'];?>@mail</td>
	<td class=td1><?php echo $result['mobile_no'];?></td>	
<?php
}
?>
</tr>





<td><br><b> Technical / Support Staff </b></td>
<tr>
<td></td>
</tr>
	<tr class=tr1>
	<th class=th1 style="width:5px;">Sr. No.</th>
	<th class=th1 style="width:120px;">Name</th>
	<th class=th1 style="width:20px;">Email Id</th>		
	<th class=th1 style="width:20px;">Intranet Email Id</th>
	<th class=th1 style="width:20px;">Mobile No.</th>
	</tr>
<?php
include ('../staff/connect.php');
$sql = mysql_query("SELECT * from staff where department != 'Teaching' AND department != 'Office' AND department != 'Computer' AND department != 'Medical Unit' AND status = 'Working' ORDER BY staff_name");
	$count = '0';	
	 //And display the results
	 while($result = mysql_fetch_array( $sql ))
	 {
	$count++;
	?>

	<tr class=tr1>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1><?php echo $result['staff_name'];?></td>
	<td class=td1><?php echo $result['staff_email'];?></td>
	<td class=td1><?php echo $result['login_name'];?>@mail</td>
	<td class=td1><?php echo $result['mobile_no'];?></td>	
<?php
}
?>
</tr>



</table>
<br>





<?php
mysql_close();
?>

</body>
</html>




