<html>
<head>
<title>Purchase : items</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script src="js/validate_addform.js"></script>
</head>

<body>
<?php
$today = date('Y-m-d');
include("index.php");
include("connect.php");

if ($_SESSION['user_level'] == '1'|| $_SESSION['user_name'] == 'admin')
{
?>
 
<h3>Purchase Items</h3>
<table class=table1>
<tr class=tr1>
<form method="post" action="purchased.php" name="purchase_addform" onsubmit="return validateFormpurchase();">

<!-------------------------------------------------------- SELECT TYPE ----------------------------------------------------->
<td class=td1><font color=red><b>* </b></font><b> Supplier Name:</b> 
<select name="supplier_name">
<option value=""> -- Select -- </option>
<?php
//--------------------------supplier name dropdown------------------------//
$sql="SELECT supplier_name FROM comp_supplier";
$result=mysql_query($sql);

while ($row=mysql_fetch_array($result)) {

echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row[supplier_name]\">$row[supplier_name]</option>"); 
}
?>
</select>
</td>

<td class=td1>
&nbsp;<b> Bill Date:</b> &nbsp; <input style="background-color:#BBCCFF; text-align:center;" size="10" type="text" class="text1" id="demo29" name="bill_date" value="<?php echo $today;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo29','yyyyMMdd')" style="cursor:pointer"/>
</td>

<td class=td1>
<font color=red><b>* </b></font> <b>Bill No: </b>&nbsp; <input size="10" type="text" class="text1" name="bill_no" value="">
</td>

<td class=td1>
<font color=red><b>* </b></font><b>Purchase Indent No: </b>&nbsp; <input size="8" type="text" class="text1" name="pindt_no" value="">
</td>

</tr>
</table>
<br>

<table class=table1>
<tr>
<th class=th1>Items Purchased</th>
<th class=th1>Qty</th>
<th class=th1>Rate</th>
<th class=th1>VAT</th>
<th class=th1>Remark</th>
</tr>
<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 1 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	$sql = "SELECT st_id, st_items, sell_rate FROM comp_stock ORDER BY st_items";
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){
	
	$st_id = $row['st_id'];
	$st_items = $row['st_items'];
	$rate = $row['sell_rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_id\">$st_items [MRP- $rate]</option>");        
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
<option value="12">12%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 2 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_id = $row['st_id'];
	$st_items = $row['st_items'];
	$rate = $row['sell_rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_id\">$st_items [MRP- $rate]</option>");          
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
<option value="12">12%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 3 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_id = $row['st_id'];
	$st_items = $row['st_items'];
	$rate = $row['sell_rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_id\">$st_items [MRP- $rate]</option>");    
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
<option value="12">12%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 4 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_id = $row['st_id'];
	$st_items = $row['st_items'];
	$rate = $row['sell_rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_id\">$st_items [MRP- $rate]</option>");             
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
<option value="12">12%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 5 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_id = $row['st_id'];
	$st_items = $row['st_items'];
	$rate = $row['sell_rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_id\">$st_items [MRP- $rate]</option>");                    
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
<option value="12">12%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 6 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_id = $row['st_id'];
	$st_items = $row['st_items'];
	$rate = $row['sell_rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_id\">$st_items [MRP- $rate]</option>");              
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
<option value="12">12%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 7 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_id = $row['st_id'];
	$st_items = $row['st_items'];
	$rate = $row['sell_rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_id\">$st_items [MRP- $rate]</option>");                    
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
<option value="12">12%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 8 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_id = $row['st_id'];
	$st_items = $row['st_items'];
	$rate = $row['sell_rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_id\">$st_items [MRP- $rate]</option>");                    
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
<option value="12">12%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 9 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_id = $row['st_id'];
	$st_items = $row['st_items'];
	$rate = $row['sell_rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_id\">$st_items [MRP- $rate]</option>");                
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
<option value="12">12%</option>
<option value="12.5">12.5%</option>
</select>
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="pr_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- PURCHASE ITEMS ROW -> 10 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;">
<SELECT NAME="pr_items[]">
	<option value="">Select Items</option>
	<?php
	
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_id = $row['st_id'];
	$st_items = $row['st_items'];
	$rate = $row['sell_rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_id\">$st_items [MRP- $rate]</option>");                          
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
<option value="12">12%</option>
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
