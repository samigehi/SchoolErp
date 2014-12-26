<html>
<head>
<title>Items</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
include ("connect.php");
?>

<h3>Add New Items</h3>
<?php
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dsangita')
{
?>

<!-------------------------------------------------------- TYPE ----------------------------------------------------->
<table class=table1>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Name of the Item</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Rate</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Opening Qty</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Unit</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Min Stock</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Remark</b></b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="30" type="text" value="" name="st_items"></td>
<td class=td1 style="text-align:center;"><input style="text-align:right;" size="10" name="rate" type="text" value="0"></td>
<td class=td1 style="text-align:center;"><input style="text-align:right;" size="10" name="st_qty" type="text" value="0"></td>

<td class=td1 style="text-align:center;"><SELECT NAME="unit">
<option style="margin:2px; padding-left:10px;" value="">Select</option>
<option style="margin:2px; padding-left:10px;" value="g">g</option>
<option style="margin:2px; padding-left:10px;" value="kg">kg</option>
<option style="margin:2px; padding-left:10px;" value="ltrs">ltrs</option>
<option style="margin:2px; padding-left:10px;" value="nos">nos</option>
</select></td>

<td class=td1 style="text-align:center;"><input style="text-align:right;" size="8" type="text" value="" name="min_stock"></td>

<td class=td1 style="text-align:center;"><input size="30" type="text" value="" name="st_remark"></td>
</tr>

</table>
<br>
<div align=center>
<input type="submit" name="submit" value="Add"> &nbsp; <input type="button" value="cancel" onclick="window.location='javascript:history.back()'">
<hr style="margin-top:2px;" width=30% color=orange size=1>
</div>
</form>

<?php
if (isset($_POST['submit'])){
include ("connect.php");

$st_items = $_POST['st_items'];
$rate = $_POST['rate'];
$st_qty = $_POST['st_qty'];
$unit = $_POST['unit'];
$min_stock = $_POST['min_stock'];
$st_date = date("Y-m-d");
$st_remark = $_POST['st_remark'];

$data = "INSERT INTO stock (st_items, rate, st_qty, unit, min_stock, st_date, st_remark) VALUES ('$st_items', '$rate', '$st_qty', '$unit', '$min_stock', '$st_date', '$st_remark')";

$add = mysql_query($data);

mysql_close();

if($add)
{
header ("Location: items_add.php");
}

if(!$add)
{
echo "<br><b>Please try again. (Possible duplicate entry)</b>";
}
}
}
?>
</body>
</html>
