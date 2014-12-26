<html>
<head>
<title>Patient Records Summary</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />

</head>
<body>

<?php

include("index.php");

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'v.pradnya' || $_SESSION['user_name'] == 'bchetana' || $_SESSION['user_name'] == 'kkavita')
{
if (!isset($_GET['fromdate'])){
$fromdate = date('Y-m-d');
$todate = date('Y-m-d');
$customer_name = '';
$customer_type = '';
}

if (isset($_GET['fromdate'])){
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$customer_name = $_GET['customer_name'];
$customer_type = $_GET['customer_type'];
}

include("connect.php");
?>
<div style="float:left; width:98%; font-weight:normal; padding:10px; background-color:#FDF5E6; border:1px #98AFC7 solid;">

<form method="GET" action="<?php $_SERVER['PHP_SELF']?>">

From : 
<input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo3" readonly="readonly" name="fromdate" value="<?php echo $fromdate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo3','yyyyMMdd')" style="cursor:pointer"/>&nbsp; 

To : <input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo4" readonly="readonly" name="todate" value="<?php echo $todate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo4','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

&nbsp;
Patient's Type :
<select name="customer_type">
<option class=pink value="">select</option>
<option class=pink value="student" <?php if($customer_type == "student") echo "selected"; ?>>student</option>
<option class=pink value="staff" <?php if($customer_type == "staff" )echo "selected"; ?>>staff</option>
<option class=pink value="other" <?php if($customer_type == "other") echo "selected"; ?>>other</option>
</select>
&nbsp; 

&nbsp;
Patient's Name <input type="text" size="20" name="customer_name" value="" <?php if($customer_name == "customer_name") echo " selected"; ?>> 
&nbsp; 
<input type="submit" name="house" value="Go"> 
<hr align=left style="margin-top:-5px;" width=11% color=orange size=1>
</form>
</div>
<div class="clear"></div>
</div>
</div>
<br>

<?php
if (isset($_GET['fromdate']))
{
$data = mysql_query("SELECT * FROM patient_records WHERE customer_name LIKE '%$customer_name%' AND customer_type LIKE '%$customer_type%' AND pt_date BETWEEN '$fromdate' AND '$todate'");
?>
<table class=table1>
<tr>
<th class=th1 style="width:2px;">Sr. No</th>
<th class=th1 style="width:70px;"> &nbsp; &nbsp; Patient's Name &nbsp; &nbsp; </th>
<th class=th1 style="width:5px;">Date</th>
<th class=th1 style="width:5px;">Patient Type</th>
<th class=th1 style="width:5px;">Complaint</th>
<th class=th1 style="width:5px;">Prescription</th>
<th class=th1 style="width:20px;">Dr Remark</th>
<th class=th1 style="width:5px;">Option</th>
</tr>

	<?php
	//And display the results
	$count = '0';
	while($result = mysql_fetch_array( $data ))		
	{
$count++;
$id = $result['id'];
$customer_name = $result['customer_name'];
$pt_date = $result['pt_date'];
$pt_type = $result['pt_type'];
$complaint = $result['complaint'];
$prescription = $result['prescription'];
$medicine = $result['medicine'];
$dr_remark = $result['dr_remark'];
?>
<tr>
<td class=td1 style="width:2px; text-align:center;"><?php echo $count;?></td>
<td class=td1 style="width:2px;"><?php echo $customer_name;?></td>
<td class=td1 style="width:2px; text-align:center;"><?php echo $pt_date;?></td>
<td class=td1 style="width:2px; text-align:center;"><?php echo $pt_type;?></td>
<td class=td1 style="width:2px;"><?php echo $complaint;?></td>
<td class=td1 style="width:2px;"><?php echo $prescription;?></td>
<td class=td1 style="width:2px;"><?php echo $dr_remark;?></td>
<td class=td1 style="width:2px; text-align:center;"><?php echo "<a href=\"patient_edit.php?id=$id\">Edit</a>";?> &nbsp; &nbsp; <?php echo "<a href=\"patient_delete.php?id=$id\">Delete</a>";?></td>
</tr>
	<?php 
	}
	?>
	</table>	
	<?php
	//This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	if ($anymatches == 0) 
	 {
	 echo "<p>No entries found matching your query</p>";
	 }
	//And we remind them what they searched for
	 echo "[ <b>Record Found : </b> <font color=red>$anymatches</font> ]";	 
	?>	
<div align=right><?php echo "<a href=\"export_xls/purchase_details_xls.php?fromdate=$fromdate&todate=$todate&customer_name=$customer_name&customer_type=$customer_type\" title='Export to Excel'>Export to xls</a>";?></div> 
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

