<html>
<head>
<title>update record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
include("connect.php");

$gatepass_id = $_GET['gatepass_id'];
$field = $_GET['field'];
$find = $_GET['find'];
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];

$qP = "SELECT * FROM gatepass WHERE gatepass_id = '$gatepass_id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$gatepass_date = trim($gatepass_date);
$gatepass_no = trim($gatepass_no);
$driver_name = trim($driver_name);
$vehicle_no = trim($vehicle_no);
$prepaired_by = trim($prepaired_by);
$authorised_by = trim($authorised_by);
$status = trim($status);
$reason = trim($reason);
$return_able = trim($return_able);
$in_date = trim($in_date);
$items_name = trim($items_name);
$items_qty = trim($items_qty);
$from_dept = trim($from_dept);
$going_to = trim($going_to);
$party_contact = trim($party_contact);
$return_able = trim($return_able);

mysql_close();
?>

<!---------------------**************************** first box *******************************----------------->
<form method="post" action="updated.php">
<div class=addform>
<div class="contentA">

<table class=table1>
<h3><font color=yellow> Gatepass Edit Form</font></h3>
<td><br><b>OUT Form</b></td>
<tr>
<td class=td1>Out Date: </td>
<td class=td1><input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo18" readonly="readonly" name="gatepass_date" value="<?php echo $gatepass_date ;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo18','yyyyMMdd')" style="cursor:pointer"/></td>
<td class=td1>Gatepass No:</td>
<td class=td1><input size="10" type="text" name="gatepass_no" value="<?php echo $gatepass_no ;?>"/></td>
</tr>

<tr>
<td class=td1>Driver's Name: </td>
<td class=td1><input size="25" type="text" name="driver_name" value="<?php echo $driver_name ;?>"/></td>

<td class=td1>Vehicle No: </td>
<td class=td1><input size="15" type="text" name="vehicle_no" value="<?php echo $vehicle_no ;?>"/></td>
</tr>

<tr>
<td class=td1>Prepaired By: </td>
<td class=td1><input size="25" type="text" name="prepaired_by" value="<?php echo $prepaired_by ;?>"/></td>

<td class=td1>Authorised By: </td>
<td class=td1>
<select name="authorised_by">
<option value="<?php echo $authorised_by ;?>"><?php echo $authorised_by ;?></option>
<option value="Amresh Kumar">Amresh Kumar</option>
<option value="P Ramesh">P Ramesh</option>
<option value="Rahul Aggrawal">Rahul Aggrawal</option>
<option value="Shailesh Shirali">Shailesh Shirali</option>
<option value="Shubhang Pandya">Shubhang Pandya</option>
</select>
</td>
</table>
<br>

<table class=table1>
<tr>
<th class=th1 style="width:40px;">Items</th>
<th class=th1 style="width:5px;">Qty</th>
<th class=th1 style="width:40px;">From Dept</th>
<th class=th1 style="width:40px;">Reason</th>
<th class=th1 style="width:40px;">Vendor</th>
<th class=th1 style="width:20px;">Vendor's Contact</th>
<th class=th1 style="width:10px;">Returnable</th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="20" type="text" name="items_name" value="<?php echo $items_name ;?>"/></td>  

<td class=td1 style="text-align:center;"><input size="6" type="text" name="items_qty" value="<?php echo $items_qty ;?>"/></td>
<td class=td1 style="text-align:center;"><input size="15" type="text" name="from_dept" value="<?php echo $from_dept ;?>"/></td>

<td class=td1 style="text-align:center;">
<select name="reason">
<option value="<?php echo $reason ;?>"><?php echo $reason ;?></option>
<option value="Repair">Repair</option>
<option value="Return">Return</option>
<option value="Replace">Replace</option>
<option value="Personal">Personal</option>
<option value="Other">Other</option>
</select>
</td>

<td class=td1 style="text-align:center;"><input size="20" type="text" name="going_to" value="<?php echo $going_to ;?>"/></td>
<td class=td1 style="text-align:center;"><input size="15" type="text" name="party_contact" value="<?php echo $party_contact ;?>"/></td>

<td class=td1 style="text-align:center;">
<select name="return_able">
<option value="<?php echo $return_able ;?>"><?php echo $return_able ;?></option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</td>
</tr>
</table>

<br>
<table class=table1>
<td><br><b>IN Form</b></td>
<tr>
<td class=td1>In Date: </td>
<td class=td1><input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo20" readonly="readonly" name="in_date" value="<?php echo $in_date ;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo20','yyyyMMdd')" style="cursor:pointer"/></td>
<td class=td1>Status: </td>
<td class=td1>
<select name="status">
<option value="<?php echo $status ;?>"><?php echo $status ;?></option>
<option value="IN">IN</option>
<option value="OUT">OUT</option>
</select>
</td>
</tr>

<tr>
<td class=td1>Driver's Name: </td>
<td class=td1><input size="25" type="text" name="in_driver_name" value="<?php echo $in_driver_name ;?>"/></td>
<td class=td1>Vehicle No: </td>
<td class=td1><input size="15" type="text" name="in_vehicle_no" value="<?php echo $in_vehicle_no ;?>"/></td>
</tr>
</table>

</div>
<div class="clear"></div>
</div>
</div>
<br>
<div align=center>
<input type="submit" name="submit" value="Submit"><input type="reset" value="Reset"></div>
<hr style="margin-top:4px;" width=30% color=orange size=1>
<input size="20" type="hidden" name="field" value="<?php echo $field;?>"> <input size="20" type="hidden" name="find" value="<?php echo $find;?>">
<input size="20" type="hidden" name="fromdate" value="<?php echo $fromdate;?>"><input size="20" type="hidden" name="todate" value="<?php echo $todate;?>">
<input size="20" type="hidden" name="gatepass_id" value="<?php echo $gatepass_id;?>">
</form>
</form>
</body>
</html>



