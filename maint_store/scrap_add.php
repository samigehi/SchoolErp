<html>
<head>
<title>Scrap add...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include('index.php');
?>

<h3>Add Scrap</h3>

<?php
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'pusha')
{
?>
<table class=table1>
<tr class=tr1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="Form2">
<td class=td1><b>Department:</b> 
<select name="scrap_department">
<option value=""> -- Select -- </option>
<?php
include("connect.php");
//--------------------------customer name dropdown------------------------//
$sql="SELECT customer_name FROM maint_customer";
$result=mysql_query($sql);

while ($row=mysql_fetch_array($result)) {

echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row[customer_name]\">$row[customer_name]</option>"); 
}
?>
</select>
</td>

<td class=td1><b>Location:</b> 
<input size="20" type="text" class="text1" name="scrap_location" value="">
</td>

<td class=td1><b>Submit by:</b> 
<input size="25" type="text" class="text1" name="person_by" value="">
</td>

</tr>
</table>
<br>

<table class=table1>
<tr>
<th class=th1>Sr.No.</th>
<th class=th1>Items</th>
<th class=th1>Qty</th>
<th class=th1>Remark</th>
</tr>
<!-------------------------------------------------------- Scrap ITEMS ROW -> 1 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;" >1</td>
<td class=td1 style="text-align:center;">
<SELECT NAME="scrap_items[]">
	<option value="">Select Items</option>
	<?php
	$sql = "SELECT st_items, rate FROM maint_stock ORDER BY st_items";
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$rate = $row['rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items [MRP- $rate]</option>");        
        }
   	?>       

</SELECT> 
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="scrap_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="scrap_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- Scrap ITEMS ROW -> 2 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;" >2</td>
<td class=td1 style="text-align:center;">
<SELECT NAME="scrap_items[]">
	<option value="">Select Items</option>
	<?php
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$rate = $row['rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items [MRP- $rate]</option>");        
        }
   	?>       

</SELECT> 
</td>
<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="scrap_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="scrap_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- Scrap ITEMS ROW -> 3 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;" >3</td>
<td class=td1 style="text-align:center;">
<SELECT NAME="scrap_items[]">
	<option value="">Select Items</option>
	<?php
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$rate = $row['rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items [MRP- $rate]</option>");        
        }
   	?>       

</SELECT> 
</td>
<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="scrap_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="scrap_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- Scrap ITEMS ROW -> 4 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;" >4</td>
<td class=td1 style="text-align:center;">
<SELECT NAME="scrap_items[]">
	<option value="">Select Items</option>
	<?php
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$rate = $row['rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items [MRP- $rate]</option>");        
        }
   	?>       

</SELECT> 
</td>
<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="scrap_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="scrap_remark[]" value="">
</td>
</tr>
<!-------------------------------------------------------- Scrap ITEMS ROW -> 5 ----------------------------------------------------->
<tr class=tr1>
<td class=td1 style="text-align:center;" >5</td>
<td class=td1 style="text-align:center;">
<SELECT NAME="scrap_items[]">
	<option value="">Select Items</option>
	<?php
        $data = mysql_query($sql);
        
        while($row = mysql_fetch_array($data)){

	$st_items = $row['st_items'];
	$rate = $row['rate'];

        echo ("<option style='padding:1px; margin-left:10px;' value=\"$st_items\">$st_items [MRP- $rate]</option>");        
        }
   	?>       

</SELECT> 
</td>
<td class=td1 style="text-align:center;">
<input style="text-align:right;" size="10" type="text" class="text1" name="scrap_qty[]" value="">
</td>

<td class=td1 style="text-align:center;">
<input style="text-align:left;" size="25" type="text" class="text1" name="scrap_remark[]" value="">
</td>
</tr>

</table>
</div>
<div class="clear"></div>
</div>

<br>
<div align=center>
<input type="submit" name="submit" value="Submit"> <input type="reset" value="Reset"></div>
<hr style="margin-top:4px;" width=30% color=orange size=1>
</form>

<?php
//----------------------------added page function------------------------------//
if (isset($_POST['submit'])){
$scrap_items = $_POST['scrap_items'];
$person_by = $_POST['person_by'];
$scrap_qty = $_POST['scrap_qty'];
$scrap_location = $_POST['scrap_location'];
$scrap_department = $_POST['scrap_department'];
$scrap_remark = $_POST['scrap_remark'];
$scrap_date = date('Y-m-d');

$limit = count($scrap_items);
for($i=0;$i<$limit;$i++) {
    $scrap_items[$i] = mysql_real_escape_string($scrap_items[$i]);
    $scrap_qty[$i] = mysql_real_escape_string($scrap_qty[$i]);
    $scrap_remark[$i] = mysql_real_escape_string($scrap_remark[$i]);

$data_scrap = "INSERT INTO maint_scrap (scrap_date, scrap_department, person_by, scrap_location, scrap_items, scrap_qty, scrap_remark) VALUES ('$scrap_date', '$scrap_department', '$person_by', '$scrap_location', '".$scrap_items[$i]."', '".$scrap_qty[$i]."', '".$scrap_remark[$i]."')";

//remove blank values from submit//
if ($scrap_items[$i] != "") {
$add_scrap = mysql_query($data_scrap);
}
}
mysql_close();

if($add_scrap)
{
header ("Location: scrap_add.php");
}

if(!$add_scrap)
{
echo "Not sucessfull! Please try again.";
}
}
}
?>
</form>
</table>
</body>
</html>
