<?php
include("index.php");
?>

<html>
<head>
<title>New gatepass</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<!---------------------**************************** first box *******************************----------------->
<form method="post" action="added.php">
<div class=addform>
<div class="contentA">

<table class=table1>
<h3><font color=yellow> Gatepass Add Form</font></h3>

<tr>
<td class=td1>Date: </td>
<td class=td1><input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo18" readonly="readonly" name="gatepass_date" value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo18','yyyyMMdd')" style="cursor:pointer"/></td>
<td class=td1>Gatepass No:</td>
<td class=td1><input size="10" type="text" name="gatepass_no" value=""/></td>
</tr>

<tr>
<td class=td1>Driver's Name: </td>
<td class=td1><input size="25" type="text" name="driver_name" value=""/></td>

<td class=td1>Vehicle No: </td>
<td class=td1><input size="15" type="text" name="vehicle_no" value=""/></td>
</tr>

<tr>
<td class=td1>Prepaired By: </td>
<td class=td1><input size="25" type="text" name="prepaired_by" value=""/></td>

<td class=td1>Authorised By: </td>
<td class=td1>
<select name="authorised_by">
<option value="">-- Select --</option>
<option value="Milind More">Milind More</option>
<option value="Dilip Shelar">Dilip Shelar</option>
<option value="P Ramesh">P Ramesh</option>
<option value="Amresh Kumar">Amresh Kumar</option>
<option value="Shailesh Shirali">Shailesh Shirali</option>
</select>
</td>
</tr>
</table>
<br><br>

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
<td class=td1 style="text-align:center;"><input size="20" type="text" name="items_name[]" value=""/></td>  

<td class=td1 style="text-align:center;"><input size="6" type="text" name="items_qty[]" value=""/></td>
<td class=td1 style="text-align:center;"><input size="15" type="text" name="from_dept[]" value=""/></td>

<td class=td1 style="text-align:center;">
<select name="reason[]">
<option value="">Select</option>
<option value="Repair">Repair</option>
<option value="Return">Return</option>
<option value="Replace">Replace</option>
<option value="Personal">Personal</option>
<option value="Other">Other</option>
</select>
</td>

<td class=td1 style="text-align:center;"><input size="20" type="text" name="going_to[]" value=""/></td>
<td class=td1 style="text-align:center;"><input size="15" type="text" name="party_contact[]" value=""/></td>

<td class=td1 style="text-align:center;">
<select name="return_able[]">
<option value=""></option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</td>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="20" type="text" name="items_name[]" value=""/></td>  
<td class=td1 style="text-align:center;"><input size="6" type="text" name="items_qty[]" value=""/></td>
<td class=td1 style="text-align:center;"><input size="15" type="text" name="from_dept[]" value=""/></td>
<td class=td1 style="text-align:center;">
<select name="reason[]">
<option value="">Select</option>
<option value="Repair">Repair</option>
<option value="Return">Return</option>
<option value="Replace">Replace</option>
<option value="Personal">Personal</option>
<option value="Other">Other</option>
</select>
</td>
<td class=td1 style="text-align:center;"><input size="20" type="text" name="going_to[]" value=""/></td>
<td class=td1 style="text-align:center;"><input size="15" type="text" name="party_contact[]" value=""/></td>
<td class=td1 style="text-align:center;"><select name="return_able[]">
<option value=""></option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</td>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="20" type="text" name="items_name[]" value=""/></td>  
<td class=td1 style="text-align:center;"><input size="6" type="text" name="items_qty[]" value=""/></td>
<td class=td1 style="text-align:center;"><input size="15" type="text" name="from_dept[]" value=""/></td>
<td class=td1 style="text-align:center;">
<select name="reason[]">
<option value="">Select</option>
<option value="Repair">Repair</option>
<option value="Return">Return</option>
<option value="Replace">Replace</option>
<option value="Personal">Personal</option>
<option value="Other">Other</option>
</select>
</td>
<td class=td1 style="text-align:center;"><input size="20" type="text" name="going_to[]" value=""/></td>
<td class=td1 style="text-align:center;"><input size="15" type="text" name="party_contact[]" value=""/></td>
<td class=td1 style="text-align:center;"><select name="return_able[]">
<option value=""></option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</td>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="20" type="text" name="items_name[]" value=""/></td>  
<td class=td1 style="text-align:center;"><input size="6" type="text" name="items_qty[]" value=""/></td>
<td class=td1 style="text-align:center;"><input size="15" type="text" name="from_dept[]" value=""/></td>
<td class=td1 style="text-align:center;">
<select name="reason[]">
<option value="">Select</option>
<option value="Repair">Repair</option>
<option value="Return">Return</option>
<option value="Replace">Replace</option>
<option value="Personal">Personal</option>
<option value="Other">Other</option>
</select>
</td>
<td class=td1 style="text-align:center;"><input size="20" type="text" name="going_to[]" value=""/></td>
<td class=td1 style="text-align:center;"><input size="15" type="text" name="party_contact[]" value=""/></td>
<td class=td1 style="text-align:center;"><select name="return_able[]">
<option value=""></option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</td>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="20" type="text" name="items_name[]" value=""/></td>  
<td class=td1 style="text-align:center;"><input size="6" type="text" name="items_qty[]" value=""/></td>
<td class=td1 style="text-align:center;"><input size="15" type="text" name="from_dept[]" value=""/></td>
<td class=td1 style="text-align:center;">
<select name="reason[]">
<option value="">Select</option>
<option value="Repair">Repair</option>
<option value="Return">Return</option>
<option value="Replace">Replace</option>
<option value="Personal">Personal</option>
<option value="Other">Other</option>
</select>
</td>
<td class=td1 style="text-align:center;"><input size="20" type="text" name="going_to[]" value=""/></td>
<td class=td1 style="text-align:center;"><input size="15" type="text" name="party_contact[]" value=""/></td>
<td class=td1 style="text-align:center;"><select name="return_able[]">
<option value=""></option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</td>
</tr>

</table>
</div>
<div class="clear"></div>
</div>
</div>
<br>
<div align=center>
<input type="submit" name="submit" value="Submit"> <input type="reset" value="Reset"></div>
<hr style="margin-top:4px;" width=30% color=orange size=1>

</form>
</body>
</html>

