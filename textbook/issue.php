<html>
<head>
<title>Issued : items</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script src="js/validate_addform.js"></script>
<script language="JavaScript">
function autoSubmit()
{
    var formObject = document.forms['theForm'];
    formObject.submit();
}
</script>

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

if ($_SESSION['user_level'] == '1'|| $_SESSION['user_name'] == 'jdeepak')
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
<option value="student" <?php if($staff_type == "student") echo " selected"; ?>>Student</option>
<option value="staff" <?php if($staff_type == "staff") echo " selected"; ?>>Staff</option>
<option value="others" <?php if($staff_type == "others") echo " selected"; ?>>Others</option>
</Select>
</form>
</td>
<form method="post" action="issued.php" name="formA" onsubmit="return validateForm();">
<td class=td1><font color=red><b>* </b></font><b>Select name:</b>
<SELECT NAME="customer_name">
<option style="width:175px;"; value="">-- Select --</option>
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
$sql2="SELECT customer_name FROM text_customer ORDER BY customer_name";
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
	$sql = "SELECT st_id, st_qty, sell_rate, unit, st_items FROM text_stock ORDER BY st_items";
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){
	
	$st_id = $row['st_id'];
	$st_items = $row['st_items'];
	$st_qty = $row['st_qty'];
	$unit = $row['unit'];
	$rate = $row['sell_rate'];

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
	$rate = $row['sell_rate'];

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
	$rate = $row['sell_rate'];

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
	$rate = $row['sell_rate'];

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
	$rate = $row['sell_rate'];

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


<!-------------------------------------------------------- ISSUE ITEMS Row -> 6 ----------------------------------------------------->
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
	$rate = $row['sell_rate'];

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


<!-------------------------------------------------------- ISSUE ITEMS Row -> 7 ----------------------------------------------------->
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
	$rate = $row['sell_rate'];

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


<!-------------------------------------------------------- ISSUE ITEMS Row -> 8 ----------------------------------------------------->
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
	$rate = $row['sell_rate'];

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

<!-------------------------------------------------------- ISSUE ITEMS Row -> 9 ----------------------------------------------------->
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
	$rate = $row['sell_rate'];

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

<!-------------------------------------------------------- ISSUE ITEMS Row -> 10 ----------------------------------------------------->
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
	$rate = $row['sell_rate'];

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
