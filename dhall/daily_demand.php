<html>
<head>
<title>Daily demand</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
$today = date("Y-m-d");

$user_name = "Sangita Dhawle";

include("index.php");

include("connect.php");

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'rkulkarni' )
{

$data = mysql_query("SELECT items FROM stock");
?>
 
<h3>Daily Demand Form</h3>
<!-------------------------------------------------------- SELECT TYPE ----------------------------------------------------->
<table class=table1>
<tr>

<form method="post" action="demanded.php" name="Form2">

<td class=td1 style="width:350px;"> &nbsp;
Of Date: &nbsp; <input style="background-color:#BBCCFF; text-align:center;" size="10" type="text" readonly="readonly" class="text1" id="demo2" name="of_date" value="<?php echo $today;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/>
</td>
</tr></table><br>

<table class=table1>
<tr>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Items</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Items For </b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Reqd. Qty</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>DHM Remark</b></td>
</tr>

<!-------------------------------------------------------- DAILY DEMAND ITEMS 1 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="di_items[]">
	<option value="">Select Items</option>
	<?php
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

<td class=td1 style="width:300px; text-align:center;">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="di_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="di_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- DAILY DEMAND ITEMS 2 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="di_items[]">
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

<td class=td1 style="width:300px; text-align:center;">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="di_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="di_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- DAILY DEMAND ITEMS 3 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="di_items[]">
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

<td class=td1 style="width:300px; text-align:center;">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="di_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="di_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- DAILY DEMAND ITEMS 4 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="di_items[]">
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

<td class=td1 style="width:300px; text-align:center;">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="di_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="di_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- DAILY DEMAND ITEMS 5 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="di_items[]">
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

<td class=td1 style="width:300px; text-align:center;">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="di_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="di_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- DAILY DEMAND ITEMS 6 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="di_items[]">
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

<td class=td1 style="width:300px; text-align:center;">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="di_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="di_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- DAILY DEMAND ITEMS 7 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="di_items[]">
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

<td class=td1 style="width:300px; text-align:center;">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="di_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="di_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- DAILY DEMAND ITEMS 8 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="di_items[]">
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

<td class=td1 style="width:300px; text-align:center;">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="di_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="di_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- DAILY DEMAND ITEMS 9 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="di_items[]">
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

<td class=td1 style="width:300px; text-align:center;">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="di_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="di_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- DAILY DEMAND ITEMS 10 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="di_items[]">
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

<td class=td1 style="width:300px; text-align:center;">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="di_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="di_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- DAILY DEMAND ITEMS 11 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="di_items[]">
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

<td class=td1 style="width:300px; text-align:center;">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="di_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="di_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- DAILY DEMAND ITEMS 12 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="di_items[]">
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

<td class=td1 style="width:300px; text-align:center;">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="di_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="di_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- DAILY DEMAND ITEMS 13 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="di_items[]">
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

<td class=td1 style="width:300px; text-align:center;">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="di_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="di_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- DAILY DEMAND ITEMS 14 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="di_items[]">
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

<td class=td1 style="width:300px; text-align:center;">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="di_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="di_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- DAILY DEMAND ITEMS 15 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="di_items[]">
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

<td class=td1 style="width:300px; text-align:center;">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="di_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="di_remark[]" value="">
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
<input type="submit" name="submit" value="Submit"> <input type="reset" value="Reset"></div>
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
