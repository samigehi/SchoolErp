<html>
<head>
<title>Edit Item</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>

<h3>Edit Item</h3>

<?php
if ($_SESSION['user_level'] == '1')
{
?>
<table class=table1>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Items</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Rate</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Qty</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Unit</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Min Stock</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Remark</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>

<?php
include ("connect.php");

$id = $_GET['id'];

$qP = "SELECT st_items, st_qty, rate, unit, min_stock, st_remark FROM stock WHERE id = '$id' ORDER BY st_items";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$id = trim($id);
$st_items = trim($st_items);
$rate = trim($rate);
$st_qty = trim($st_qty);
$unit = trim($unit);
$min_stock = trim($min_stock);
$st_remark = trim($st_remark);
mysql_close();
?>

<tr>
<td class=td1 style="text-align:center;"><input size="30" type="text" value="<?php echo $st_items;?>" name="st_items"></td>
<td class=td1 style="text-align:center;"><input style="text-align:right;" size="10" readonly="readonly" name="rate" type="text" value="<?php echo $rate;?>"></td>
<td class=td1 style="text-align:center;"><input style="text-align:right;" size="10" readonly="readonly" name="st_qty" type="text" value="<?php echo $st_qty;?>"></td>


<td class=td1 style="text-align:center;"><SELECT NAME="unit">
<option style="margin:2px; padding-left:10px;" value="<?php echo $unit;?>"><?php echo $unit;?></option>
<option style="margin:2px; padding-left:10px;" value="g">g</option>
<option style="margin:2px; padding-left:10px;" value="kg">kg</option>
<option style="margin:2px; padding-left:10px;" value="ltrs">ltrs</option>
<option style="margin:2px; padding-left:10px;" value="nos">nos</option>
</select></td>

<td class=td1 style="text-align:center;"><input style="text-align:right;" size="8" type="text" value="<?php echo $min_stock;?>" name="min_stock"></td>

<td class=td1 style="text-align:center;"><input size="30" type="text" value="<?php echo $st_remark;?>" name="st_remark"></td>

<td class=td1>
<input type="submit" name="save" value="save"> &nbsp; <input type="hidden" name="id" value="<?=$id?>"><input type="button" value="cancel" onclick="window.location='javascript:history.back()'">
</td>
</tr>
</table>
</div>
</form>

<?php
if (isset($_POST['save'])){
include ("connect.php");

$id = $_POST['id'];
$st_items = $_POST['st_items'];
$rate = $_POST['rate'];
$st_qty = $_POST['st_qty'];
$unit = $_POST['unit'];
$min_stock = $_POST['min_stock'];
$st_remark = $_POST['st_remark'];

$data = "UPDATE stock SET st_items = '".$st_items."', rate='".$rate."', st_qty='".$st_qty."', unit = '".$unit."', min_stock = '".$min_stock."', st_remark = '".$st_remark."' WHERE id = '".$id."'";

$update = mysql_query($data);

mysql_close();

if($update)
{
header ("Location: stock.php");
}

if(!$update)
{
echo "Not Sucessfull!";
}
}
}
?>
