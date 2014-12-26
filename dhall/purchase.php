<html>
<head>
<title>Purchase : items</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script src="js/validate_addform.js"></script>
</head>

<body>
<?php
$today = date("Y-m-d");
$time = date("H:i:s");

$user_name = "Sangita Dhawle";

include("index.php");

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dsangita' || $_SESSION['user_name'] == 'nspasarkar')
{
?>
 
<h3>Purchase Items</h3>
<!-------------------------------------------------------- SELECT TYPE ----------------------------------------------------->
<table class=table1>
<tr>
<form method="post" action="purchased.php" name="purchase_addform" onsubmit="return validateFormpurchase();">

<td class=td1> Supplier Name: 
<select name="supplier">
<option value=""> -- Select -- </option>
<?php

include("connect.php");

//--------------------------supplier name dropdown------------------------//
$sql="SELECT supplier_name FROM supplier";
$result=mysql_query($sql);

while ($row=mysql_fetch_array($result)) {

echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row[supplier_name]\">$row[supplier_name]</option>"); 
}
?>
</select>
</td>

<td class=td1>
&nbsp; Bill Date: &nbsp; <input style="background-color:#BBCCFF; text-align:center;" size="10" type="text" class="text1" id="demo2" name="bill_date" value="<?php echo $today;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/>
</td>

<td class=td1>
&nbsp; Bill No: &nbsp; <input size="10" type="text" class="text1" name="bill_no" value="">
</td>
<td class=td1><input type="button" value="Add Item" onclick="window.location='items_add.php'"></td>

<?php
if ($_SESSION['user_name'] == 'admin')
{
?>
<td class=td1><input type="button" value="Add Supplier" onclick="window.location='supplier_add.php'"></td>
<?php
}
?>

<td class=td1 align=center><input type="button" value="Purchase Details" onclick="window.location='details_purchase.php'"></td>
</tr></table><br>

<table class=table1>
<tr>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Items Purchased</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Qty</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Rate</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>VAT</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Remark</b></td>
</tr>
<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 1 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	$sql = "SELECT st_qty, unit, st_items FROM stock ORDER BY st_items";
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\"> $st_items - $st_qty $unit </option>");        
        }
   	?>       

</SELECT> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_rate[]" value="">
</td>

<td class=td1 style="text-align:center;">
<select name="pr_vat[]">
<option value="">-</option>
<option value="4">4%</option>
<option value="5">5%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 2 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\"> $st_items - $st_qty $unit </option>");        
        }
   	?>       

</SELECT> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_rate[]" value="">
</td>

<td class=td1 style="text-align:center;">
<select name="pr_vat[]">
<option value="">-</option>
<option value="4">4%</option>
<option value="5">5%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 3 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\"> $st_items - $st_qty $unit </option>");        
        }
   	?>       

</SELECT> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_rate[]" value="">
</td>

<td class=td1 style="text-align:center;">
<select name="pr_vat[]">
<option value="">-</option>
<option value="4">4%</option>
<option value="5">5%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>

<!----------------------------------------- PURCHASE ITEMS ROW -> 4 ------------------------------------------>
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\"> $st_items - $st_qty $unit </option>");        
        }
   	?>       

</SELECT> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_rate[]" value="">
</td>

<td class=td1 style="text-align:center;">
<select name="pr_vat[]">
<option value="">-</option>
<option value="4">4%</option>
<option value="5">5%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 5 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\"> $st_items - $st_qty $unit </option>");        
        }
   	?>       

</SELECT> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_rate[]" value="">
</td>

<td class=td1 style="text-align:center;">
<select name="pr_vat[]">
<option value="">-</option>
<option value="4">4%</option>
<option value="5">5%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 6 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\"> $st_items - $st_qty $unit </option>");        
        }
   	?>       

</SELECT> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_rate[]" value="">
</td>

<td class=td1 style="text-align:center;">
<select name="pr_vat[]">
<option value="">-</option>
<option value="4">4%</option>
<option value="5">5%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 7 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\"> $st_items - $st_qty $unit </option>");        
        }
   	?>       

</SELECT> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_rate[]" value="">
</td>

<td class=td1 style="text-align:center;">
<select name="pr_vat[]">
<option value="">-</option>
<option value="4">4%</option>
<option value="5">5%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 8 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\"> $st_items - $st_qty $unit </option>");        
        }
   	?>       

</SELECT> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_rate[]" value="">
</td>

<td class=td1 style="text-align:center;">
<select name="pr_vat[]">
<option value="">-</option>
<option value="4">4%</option>
<option value="5">5%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 9 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\"> $st_items - $st_qty $unit </option>");        
        }
   	?>       

</SELECT> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_rate[]" value="">
</td>

<td class=td1 style="text-align:center;">
<select name="pr_vat[]">
<option value="">-</option>
<option value="4">4%</option>
<option value="5">5%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 10 ----------------------------------------------------->

<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\"> $st_items - $st_qty $unit </option>");        
        }
   	?>       

</SELECT> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_rate[]" value="">
</td>

<td class=td1 style="text-align:center;">
<select name="pr_vat[]">
<option value="">-</option>
<option value="4">4%</option>
<option value="5">5%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 11 ----------------------------------------------------->

<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\"> $st_items - $st_qty $unit </option>");        
        }
   	?>       

</SELECT> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_rate[]" value="">
</td>

<td class=td1 style="text-align:center;">
<select name="pr_vat[]">
<option value="">-</option>
<option value="4">4%</option>
<option value="5">5%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 12 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\"> $st_items - $st_qty $unit </option>");        
        }
   	?>       

</SELECT> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_rate[]" value="">
</td>

<td class=td1 style="text-align:center;">
<select name="pr_vat[]">
<option value="">-</option>
<option value="4">4%</option>
<option value="5">5%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 13 ----------------------------------------------------->

<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\"> $st_items - $st_qty $unit </option>");        
        }
   	?>       

</SELECT> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_rate[]" value="">
</td>

<td class=td1 style="text-align:center;">
<select name="pr_vat[]">
<option value="">-</option>
<option value="4">4%</option>
<option value="5">5%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 14 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\"> $st_items - $st_qty $unit </option>");        
        }
   	?>       

</SELECT> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_rate[]" value="">
</td>

<td class=td1 style="text-align:center;">
<select name="pr_vat[]">
<option value="">-</option>
<option value="4">4%</option>
<option value="5">5%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 15 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\"> $st_items - $st_qty $unit </option>");        
        }
   	?>       

</SELECT> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="pr_rate[]" value="">
</td>

<td class=td1 style="text-align:center;">
<select name="pr_vat[]">
<option value="">-</option>
<option value="4">4%</option>
<option value="5">5%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
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
