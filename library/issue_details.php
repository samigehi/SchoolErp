<html>
<head>
<title>issue details...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>
</head>

<body>

<?php

include("../library/index.php");

include("../library/connect.php");
?>

<div align=left style="background-color:#CCFFCC; border:1px solid lightgray; font-weight:normal; padding-top:15px;">

<form method="post" action="<?php $_SERVER['PHP_SELF']?>">

&nbsp; &nbsp; &nbsp; From : <input style="text-align:center; background-color:#D4EDF7;" id="demo1" size="9" class="text1" type="text" name="fromdate" value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

To : <input style="text-align:center; background-color:#D4EDF7;" id="demo2" size="9" class="text1" type="text" name="todate"  value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<font color=red><b> * </b></font>Status : <Select NAME="status">
<option style="padding-left: 10px;" value="">-- Select --</option>
<option style="padding-left: 10px;" value="Issued">Issued</option>
<option style="padding-left: 10px;" value="Returned">Returned</option>
</select>
&nbsp; &nbsp; <input type="submit" name="submit" value="Go"> 
</form>
</div>
<div class="clear"></div>
</div>

<?php
//Admin user
if (isset($_POST['submit']))
{
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];
$status = $_POST['status'];

$data = mysql_query("SELECT * FROM books_issue WHERE status LIKE '%$status%' AND issue_date BETWEEN '$fromdate' AND '$todate'");
?>

	<div class="contentB">
	<div class="tbody2">	
	<table class=table1 >
	
	<tr class=tr1>
	<th class=th1 style="width:5px;">Book Id</th>
	<th class=th1 style="width:100px;">Book Title</th>
	<th class=th1 style="width:100px;">Student / Staff Name</th>
	<th class=th1 style="width:5px;">Issued Date</th>
	<th class=th1 style="width:5px;">To be Return On</th>
	<th class=th1 style="width:5px;">Status</th>
	<th class=th1 style="width:5px;">Returned Date</th>
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
	<td class=td1 style="text-align:center;"><?php echo "<a href=\"edit_show.php?id=$id\" title='click to edit'><font color=darkblue>$id</font></a>";?></td>
	<td class=td1><?php echo "<a href=\"edit_show.php?id=$id\" title='click to edit'>$title</a>";?></td>
	<td class=td1><?php echo "<a href=\"user_details.php?staff_name=$staff_name & fromdate=$fromdate & todate=$todate\" title='click to edit'>$staff_name</a>";?></td>
	<td class=td1 style="text-align:center;"><?php echo $result['issue_date']; ?></td>
	<td class=td1 style="text-align:center;"><?php echo $result['to_be_return']; ?></td>
	<td class=td1 style="text-align:center;"><?php echo $result['status']; ?></td>   	
	<td class=td1 style="text-align:center;"><?php echo $result['return_date']; ?></td>
	<?
	 }
	?>
	</table>
	</div>
	<hr color=lightgray size=1>
	<?php
	//This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	if ($anymatches == 0) 
	 {
	 echo "No entries found matching your query<br>";
	 }
	echo "[ <b>Record Found : </b> <font color=red>$anymatches</font> ]";	

	}
	mysql_close();
	 ?>

	</body>
	</html>

