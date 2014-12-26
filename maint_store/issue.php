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

if ($_SESSION['user_level'] == '1'|| $_SESSION['user_name'] == 'avinash')
{
?>
<h3>Issue Items</h3>
<!-------------------------------------------------------- SELECT TYPE ----------------------------------------------------->
<table class=table1>
<tr class=tr1>
<form method="post" action="issued.php" name="issue_addfrom" onsubmit="return validateFormissue();">
<td class=td1><font color=red><b>* </b></font><b>Issue To:</b>

<SELECT NAME="customer_name">
<option style="width:175px;" value="">-- Select --</option>

<?php
include("connect.php");
$sql2="SELECT customer_name FROM maint_customer ORDER BY customer_name";
$result2=mysql_query($sql2);

while ($row2=mysql_fetch_array($result2)) {

echo ("<option style='margin:2px; padding-left: 15px;' value=\"$row2[customer_name]\">$row2[customer_name]</option>");
}
?>
</SELECT>

&nbsp; &nbsp; &nbsp; &nbsp; <b>Issue Type:</b>
<SELECT NAME="customer_type">
<option style="width:100px;" value="Official">Official</option>
<option style="width:100px;" value="Personal">Personal</option>
</SELECT>
</td>

 <td class=td1> <b>Date : </b>&nbsp; <input style="background-color:#BBCCFF; text-align:center;" readonly="readonly" size="10" type="text" class="text1" id="demo2" name="iss_date" value="<?php echo $today;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/>
</td>

<td class=td1>
<font color=red><b>* </b></font><b>Requisition No: </b> <input size="8" type="text" class="text1" name="requisition_no" value="">
</td>

</tr>
</table>
<br>
    
<table class="table1">
<tr>
<th class=th1>Items Issued</th>
<th class=th1>Qty</th>
<th class=th1>Remark</th>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 1 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	include("connect.php");
	$sql = "SELECT st_id, st_qty, rate, unit, st_items FROM maint_stock ORDER BY st_items";
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){
	
	$st_id = $row['st_id'];
	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];
	$rate = $row['rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_id\">$st_items [MRP- $rate] $st_qty$unit</option>");        
        }
   	?>       
	</SELECT> 
	</td>


<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 2 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_id = $row['st_id'];
	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];
	$rate = $row['rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_id\">$st_items [MRP- $rate] $st_qty$unit</option>");      
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 3 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_id = $row['st_id'];
	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];
	$rate = $row['rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_id\">$st_items [MRP- $rate] $st_qty$unit</option>"); 
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 4 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_id = $row['st_id'];
	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];
	$rate = $row['rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_id\">$st_items [MRP- $rate] $st_qty$unit</option>");     
        }
   	?>       
	</SELECT> 
	</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="iss_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="iss_remark[]" value="">
</td>
</tr>

<!-------------------------------------------------------- ISSUE ITEMS Row -> 5 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;">
<SELECT NAME="iss_items[]">
	<option value="">Select Items</option>
	<?php
	$data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_id = $row['st_id'];
	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];
	$rate = $row['rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_id\">$st_items [MRP- $rate] $st_qty$unit</option>");        
        }
   	?>       
	</SELECT> 
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
