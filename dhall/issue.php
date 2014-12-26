<html>
<head>
<title>Issued : items</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script src="js/validate_addform.js"></script>
</head>
<body>

<?php
$today = date("Y-m-d");

include("index.php");

if(isset($_POST["staff_type"]))
{
  $staff_type = $_POST["staff_type"];
}

if(!isset($_POST["staff_type"]))
{
  $staff_type = "";
}

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dsangita' || $_SESSION['user_name'] == 'nspasarkar')
{
?>
<h3>Issue Items</h3>
<!-------------------------------------------------------- SELECT TYPE ----------------------------------------------------->
<table class=table1>
<form method="post" name="theForm">
<tr class=tr1>
<td class=td1><font color=red><b>* </b></font><b>Issue To:</b>
<Select name="staff_type" onChange="autoSubmit();">
<option value="">-- Select --</option>
<option value="Dining Hall" <?php if($staff_type == "Dining Hall") echo " selected"; ?>>Dining Hall</option>
<option value="student" <?php if($staff_type == "student") echo " selected"; ?>>Student</option>
<option value="staff" <?php if($staff_type == "staff") echo " selected"; ?>>Staff</option>
<option value="others" <?php if($staff_type == "others") echo " selected"; ?>>Others</option>
</Select>
</form>
</td>
<form method="post" action="issued.php" name="formA" onsubmit="return validateForm();">
<td class=td1><font color=red><b>* </b></font><b>Select name:</b>

<SELECT NAME="issued_to">
<?php
//staff select area//
if(isset($_POST["staff_type"]))
{
if($staff_type == "Dining Hall")
{
?>
<option style="width:175px;" value="Dining Hall">Dining Hall</option>
<?php
}
}
?>

<?php
//student select area//
if(isset($_POST["staff_type"]))
{
if($staff_type == "student")
{
include("std_connect.php");

$sql="SELECT account_name FROM std_2014_15 where profile_status = 'Studing' ORDER BY name";
$result=mysql_query($sql);

while ($row=mysql_fetch_array($result)) {

echo ("<option style='margin:2px; padding-left: 15px;' value=\"$row[account_name]\">$row[account_name]</option>"); 
}
}
}

//staff select area//
if(isset($_POST["staff_type"]))
{
if($staff_type == "staff")
{
include("staff_connect.php");
$sql1="SELECT staff_name FROM staff ORDER BY staff_name";
$result1=mysql_query($sql1);

while ($row1=mysql_fetch_array($result1)) {

echo ("<option style='margin:2px; padding-left: 15px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
}
}

//staff select area//
if(isset($_POST["staff_type"]))
{
if($staff_type == "others")
{
include("connect.php");
$sql2="SELECT customer_name FROM dh_customer ORDER BY customer_name";
$result2=mysql_query($sql2);

while ($row2=mysql_fetch_array($result2)) {

echo ("<option style='margin:2px; padding-left: 15px;' value=\"$row2[customer_name]\">$row2[customer_name]</option>");
}
}
}
?>
</SELECT>

&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b>Date : </b>&nbsp; <input style="background-color:#BBCCFF; text-align:center;" readonly="readonly" size="10" type="text" class="text1" id="demo2" name="iss_date" value="<?php echo $today;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/>
</td>

<td class=td1 align=center><input type="button" value="Issue Details" onclick="window.location='details_issue.php'"></td>
<td class=td1 align=center><input type="button" value="Add Customer" onclick="window.location='customer_add.php'"></td>
</tr>
</table>
<br>
    
<table class="table1">
<tr>
<th class=th1 style="text-align:center; background-color:lightblue;"><b>Items Issued</b></th>
<th class=th1 style="text-align:center; background-color:lightblue;"><b>Items For</b></th>
<th class=th1 style="text-align:center; background-color:lightblue;"><b>Qty</b></th>
<th class=th1 style="text-align:center; background-color:lightblue;"><b>Remark</b></th>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 1 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	include("connect.php");
	$sql = "SELECT st_qty, unit, st_items FROM stock ORDER BY st_items";
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items - $st_qty $unit</option>");        
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<SELECT NAME="items_for[]">
<option style="margin:2px; padding-left:10px;" value="Breakfast">Breakfast</option>
<option style="margin:2px; padding-left:10px;" value="Juice Break">Juice Break</option>
<option style="margin:2px; padding-left:10px;" value="Lunch">Lunch</option>
<option style="margin:2px; padding-left:10px;" value="Evening Tea">Evening Tea</option>
<option style="margin:2px; padding-left:10px;" value="Dinner">Dinner</option>
<option style="margin:2px; padding-left:10px;" value="Daily Use">Daily Use</option>
<option style="margin:2px; padding-left:10px;" value="Personal Use">Personal Use</option>
</select> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 2 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items - $st_qty $unit</option>");        
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<SELECT NAME="items_for[]">
<option style="margin:2px; padding-left:10px;" value="Breakfast">Breakfast</option>
<option style="margin:2px; padding-left:10px;" value="Juice Break">Juice Break</option>
<option style="margin:2px; padding-left:10px;" value="Lunch">Lunch</option>
<option style="margin:2px; padding-left:10px;" value="Evening Tea">Evening Tea</option>
<option style="margin:2px; padding-left:10px;" value="Dinner">Dinner</option>
<option style="margin:2px; padding-left:10px;" value="Daily Use">Daily Use</option>
<option style="margin:2px; padding-left:10px;" value="Personal Use">Personal Use</option>
</select> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 3 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items - $st_qty $unit</option>");        
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<SELECT NAME="items_for[]">
<option style="margin:2px; padding-left:10px;" value="Breakfast">Breakfast</option>
<option style="margin:2px; padding-left:10px;" value="Juice Break">Juice Break</option>
<option style="margin:2px; padding-left:10px;" value="Lunch">Lunch</option>
<option style="margin:2px; padding-left:10px;" value="Evening Tea">Evening Tea</option>
<option style="margin:2px; padding-left:10px;" value="Dinner">Dinner</option>
<option style="margin:2px; padding-left:10px;" value="Daily Use">Daily Use</option>
<option style="margin:2px; padding-left:10px;" value="Personal Use">Personal Use</option>
</select> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>


<!-------------------------------------------------------- ISSUE ITEMS Row -> 4 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items - $st_qty $unit</option>");        
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<SELECT NAME="items_for[]">
<option style="margin:2px; padding-left:10px;" value="Breakfast">Breakfast</option>
<option style="margin:2px; padding-left:10px;" value="Juice Break">Juice Break</option>
<option style="margin:2px; padding-left:10px;" value="Lunch">Lunch</option>
<option style="margin:2px; padding-left:10px;" value="Evening Tea">Evening Tea</option>
<option style="margin:2px; padding-left:10px;" value="Dinner">Dinner</option>
<option style="margin:2px; padding-left:10px;" value="Daily Use">Daily Use</option>
<option style="margin:2px; padding-left:10px;" value="Personal Use">Personal Use</option>
</select> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 5 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items - $st_qty $unit</option>");        
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<SELECT NAME="items_for[]">
<option style="margin:2px; padding-left:10px;" value="Breakfast">Breakfast</option>
<option style="margin:2px; padding-left:10px;" value="Juice Break">Juice Break</option>
<option style="margin:2px; padding-left:10px;" value="Lunch">Lunch</option>
<option style="margin:2px; padding-left:10px;" value="Evening Tea">Evening Tea</option>
<option style="margin:2px; padding-left:10px;" value="Dinner">Dinner</option>
<option style="margin:2px; padding-left:10px;" value="Daily Use">Daily Use</option>
<option style="margin:2px; padding-left:10px;" value="Personal Use">Personal Use</option>
</select> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 6 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items - $st_qty $unit</option>");        
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<SELECT NAME="items_for[]">
<option style="margin:2px; padding-left:10px;" value="Breakfast">Breakfast</option>
<option style="margin:2px; padding-left:10px;" value="Juice Break">Juice Break</option>
<option style="margin:2px; padding-left:10px;" value="Lunch">Lunch</option>
<option style="margin:2px; padding-left:10px;" value="Evening Tea">Evening Tea</option>
<option style="margin:2px; padding-left:10px;" value="Dinner">Dinner</option>
<option style="margin:2px; padding-left:10px;" value="Daily Use">Daily Use</option>
<option style="margin:2px; padding-left:10px;" value="Personal Use">Personal Use</option>
</select> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 7 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items - $st_qty $unit</option>");        
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<SELECT NAME="items_for[]">
<option style="margin:2px; padding-left:10px;" value="Breakfast">Breakfast</option>
<option style="margin:2px; padding-left:10px;" value="Juice Break">Juice Break</option>
<option style="margin:2px; padding-left:10px;" value="Lunch">Lunch</option>
<option style="margin:2px; padding-left:10px;" value="Evening Tea">Evening Tea</option>
<option style="margin:2px; padding-left:10px;" value="Dinner">Dinner</option>
<option style="margin:2px; padding-left:10px;" value="Daily Use">Daily Use</option>
<option style="margin:2px; padding-left:10px;" value="Personal Use">Personal Use</option>
</select> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 8 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items - $st_qty $unit</option>");        
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<SELECT NAME="items_for[]">
<option style="margin:2px; padding-left:10px;" value="Breakfast">Breakfast</option>
<option style="margin:2px; padding-left:10px;" value="Juice Break">Juice Break</option>
<option style="margin:2px; padding-left:10px;" value="Lunch">Lunch</option>
<option style="margin:2px; padding-left:10px;" value="Evening Tea">Evening Tea</option>
<option style="margin:2px; padding-left:10px;" value="Dinner">Dinner</option>
<option style="margin:2px; padding-left:10px;" value="Daily Use">Daily Use</option>
<option style="margin:2px; padding-left:10px;" value="Personal Use">Personal Use</option>
</select> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 9 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items - $st_qty $unit</option>");        
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<SELECT NAME="items_for[]">
<option style="margin:2px; padding-left:10px;" value="Breakfast">Breakfast</option>
<option style="margin:2px; padding-left:10px;" value="Juice Break">Juice Break</option>
<option style="margin:2px; padding-left:10px;" value="Lunch">Lunch</option>
<option style="margin:2px; padding-left:10px;" value="Evening Tea">Evening Tea</option>
<option style="margin:2px; padding-left:10px;" value="Dinner">Dinner</option>
<option style="margin:2px; padding-left:10px;" value="Daily Use">Daily Use</option>
<option style="margin:2px; padding-left:10px;" value="Personal Use">Personal Use</option>
</select> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 10 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items - $st_qty $unit</option>");        
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<SELECT NAME="items_for[]">
<option style="margin:2px; padding-left:10px;" value="Breakfast">Breakfast</option>
<option style="margin:2px; padding-left:10px;" value="Juice Break">Juice Break</option>
<option style="margin:2px; padding-left:10px;" value="Lunch">Lunch</option>
<option style="margin:2px; padding-left:10px;" value="Evening Tea">Evening Tea</option>
<option style="margin:2px; padding-left:10px;" value="Dinner">Dinner</option>
<option style="margin:2px; padding-left:10px;" value="Daily Use">Daily Use</option>
<option style="margin:2px; padding-left:10px;" value="Personal Use">Personal Use</option>
</select> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 11 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items - $st_qty $unit</option>");        
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<SELECT NAME="items_for[]">
<option style="margin:2px; padding-left:10px;" value="Breakfast">Breakfast</option>
<option style="margin:2px; padding-left:10px;" value="Juice Break">Juice Break</option>
<option style="margin:2px; padding-left:10px;" value="Lunch">Lunch</option>
<option style="margin:2px; padding-left:10px;" value="Evening Tea">Evening Tea</option>
<option style="margin:2px; padding-left:10px;" value="Dinner">Dinner</option>
<option style="margin:2px; padding-left:10px;" value="Daily Use">Daily Use</option>
<option style="margin:2px; padding-left:10px;" value="Personal Use">Personal Use</option>
</select> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 12 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items - $st_qty $unit</option>");        
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<SELECT NAME="items_for[]">
<option style="margin:2px; padding-left:10px;" value="Breakfast">Breakfast</option>
<option style="margin:2px; padding-left:10px;" value="Juice Break">Juice Break</option>
<option style="margin:2px; padding-left:10px;" value="Lunch">Lunch</option>
<option style="margin:2px; padding-left:10px;" value="Evening Tea">Evening Tea</option>
<option style="margin:2px; padding-left:10px;" value="Dinner">Dinner</option>
<option style="margin:2px; padding-left:10px;" value="Daily Use">Daily Use</option>
<option style="margin:2px; padding-left:10px;" value="Personal Use">Personal Use</option>
</select> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 13 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items - $st_qty $unit</option>");        
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<SELECT NAME="items_for[]">
<option style="margin:2px; padding-left:10px;" value="Breakfast">Breakfast</option>
<option style="margin:2px; padding-left:10px;" value="Juice Break">Juice Break</option>
<option style="margin:2px; padding-left:10px;" value="Lunch">Lunch</option>
<option style="margin:2px; padding-left:10px;" value="Evening Tea">Evening Tea</option>
<option style="margin:2px; padding-left:10px;" value="Dinner">Dinner</option>
<option style="margin:2px; padding-left:10px;" value="Daily Use">Daily Use</option>
<option style="margin:2px; padding-left:10px;" value="Personal Use">Personal Use</option>
</select> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 14 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items - $st_qty $unit</option>");        
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<SELECT NAME="items_for[]">
<option style="margin:2px; padding-left:10px;" value="Breakfast">Breakfast</option>
<option style="margin:2px; padding-left:10px;" value="Juice Break">Juice Break</option>
<option style="margin:2px; padding-left:10px;" value="Lunch">Lunch</option>
<option style="margin:2px; padding-left:10px;" value="Evening Tea">Evening Tea</option>
<option style="margin:2px; padding-left:10px;" value="Dinner">Dinner</option>
<option style="margin:2px; padding-left:10px;" value="Daily Use">Daily Use</option>
<option style="margin:2px; padding-left:10px;" value="Personal Use">Personal Use</option>
</select> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 15 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items - $st_qty $unit</option>");        
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<SELECT NAME="items_for[]">
<option style="margin:2px; padding-left:10px;" value="Breakfast">Breakfast</option>
<option style="margin:2px; padding-left:10px;" value="Juice Break">Juice Break</option>
<option style="margin:2px; padding-left:10px;" value="Lunch">Lunch</option>
<option style="margin:2px; padding-left:10px;" value="Evening Tea">Evening Tea</option>
<option style="margin:2px; padding-left:10px;" value="Dinner">Dinner</option>
<option style="margin:2px; padding-left:10px;" value="Daily Use">Daily Use</option>
<option style="margin:2px; padding-left:10px;" value="Personal Use">Personal Use</option>
</select> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>



</table>
</div>
<div class="clear"></div>
</div>

<div style="margin-top:7px; float:right;">
<a href="#" title="top"><img src="images2/top.jpg"></a>
</div>
<br>
<div align=center>
<input type="submit" name="submit" value="Submit"> <input type="reset" value="Reset"><input type="hidden" name="customer_type" value="<?php echo $staff_type;?>"></div>
<hr style="margin-top:4px;" width=30% color=orange size=1>
</form>
<?php
}
else 
{
echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
}
?>
<br>

</body>
</html>
