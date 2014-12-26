<html>
<head>
<title>user details...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="new.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php

include("index.php");

include("connect.php");

$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$staff_name = $_GET['staff_name'];

$data = mysql_query("SELECT * FROM books_issue WHERE staff_name = '$staff_name'");
?>

	<div class="contentB">
	<table class=table1 >
	<tr class=tr1>
	<th class=th1 style="width:100px; background-color:#FFCF35;">Staff / Student Name</th>
	<th class=th1 style="width:20px; background-color:#FFCF35;">Book Id</th>
	<th class=th1 style="width:50px; background-color:#FFCF35;">Book Title</th>
	<th class=th1 style="width:10px; background-color:#FFCF35;">Issue Date</th>
	<th class=th1 style="width:10px; background-color:#FFCF35;">Status</th>
	<th class=th1 style="width:10px; background-color:#FFCF35;">Return Date</th>
	</tr>

	<?php
	 //And display the results
	while($result = mysql_fetch_array( $data ))			
	{
	$id = $result['book_id'];
	$title = $result['book_name'];
	$staff_name = $result['staff_name'];
 	?>
	<tr class=tr1>
	<td class=td1><?php echo $staff_name; ?></td>
	<td class=td1 style="text-align:center; font-weight:bold;"><?php echo $id;?></td>
	<td class=td1><?php echo $result['book_name']; ?></td>
	<td class=td1><?php echo $result['issue_date']; ?></td>
	<td class=td1><?php echo $result['status']; ?></td>
	<td class=td1><?php echo $result['return_date']; ?></td>
	<?
	 }
	?>
	</table>
	<?php
	//This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	if ($anymatches == 0) 
	 {
	 echo "No entries found matching your query";
	 }
	mysql_close();
	 ?>
	</body>
	</html>

