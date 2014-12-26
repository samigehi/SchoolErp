<html>
<head>
<title>Purchase Order</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
$today = date("Y-m-d");

$time = date("H:i:s");

include("index.php");

include("connect.php");

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'rkulkarni' || $_SESSION['user_name'] == 'dsangita')
{
?>
 <h3>Purchase Order Form</h3>
<!-------------------------------------------------------- SELECT TYPE ----------------------------------------------------->
<table class=table1>
<tr>

<form method="post" action="ordered.php" name="Form2">
<td class=td1>
&nbsp; PO Date: &nbsp; <input style="background-color:#BBCCFF; text-align:center;" size="10" type="text" readonly="readonly" class="text1" name="po_date" value="<?php echo $today;?>">
</td>

<td class=td1>
&nbsp; PO Time: &nbsp; <input style="background-color:#BBCCFF; text-align:center;" size="10" type="text" readonly="readonly" class="text1" name="po_time" value="<?php echo $time;?>">
</td>


<td class=td1 align=center><input type="button" value="Purchase Details" onclick="window.location='details_purchase.php'"></td>

</tr>
</table>
<br>

<table class=table1>
<tr>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Items</b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>Reqd. Qty</b></b></td>
<td class=td1 style="text-align:center; background-color:lightblue;"><b>DHM Remark</b></td>
</tr>
<!-------------------------------------------------------- PURCHASE ORDER 1 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="po_items[]">
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

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="po_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="po_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- PURCHASE ORDER 2 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="po_items[]">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="po_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="po_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- PURCHASE ORDER 3 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="po_items[]">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="po_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="po_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ORDER 4 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="po_items[]">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="po_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="po_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ORDER 5 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="po_items[]">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="po_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="po_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ORDER 6 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="po_items[]">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="po_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="po_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ORDER 7 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="po_items[]">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="po_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="po_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ORDER 8 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="po_items[]">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="po_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="po_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ORDER 9 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="po_items[]">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="po_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="po_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ORDER 10 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="po_items[]">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="po_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="po_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ORDER 11 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="po_items[]">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="po_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="po_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ORDER 12 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="po_items[]">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="po_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="po_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ORDER 13 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="po_items[]">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="po_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="po_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ORDER 14 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="po_items[]">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="po_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="po_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- PURCHASE ORDER 15 ----------------------------------------------------->
<tr>
<td class=td1 style="text-align:center;">
<SELECT NAME="po_items[]">
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
<input style="text-align:right;" size="10" type="text" class="text1" name="po_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="po_remark[]" value="">
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
