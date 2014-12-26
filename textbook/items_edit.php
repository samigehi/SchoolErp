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
<form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Items</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>MRP</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Qty</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Unit</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Min Stock</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Remark</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>

<?php
include ("connect.php");

$st_id = $_GET['st_id'];

$qP = "SELECT st_items, st_qty, sell_rate, rate, unit, min_stock, st_remark FROM text_stock WHERE st_id = '$st_id' ORDER BY st_items";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$st_id = trim($st_id);
$st_items = trim($st_items);
$st_qty = trim($st_qty);
$sell_rate = trim($sell_rate);
$unit = trim($unit);
$min_stock = trim($min_stock);
$st_remark = trim($st_remark);
mysql_close();
?>

<tr>
<td class=td1 style="text-align:center;"><input size="30" type="text" value="<?php echo $st_items;?>" name="st_items"></td>
<td class=td1 style="text-align:center;"><input style="text-align:right;" size="10" name="sell_rate" type="text" value="<?php echo $sell_rate;?>"></td>

<td class=td1 style="text-align:center;"><input style="text-align:right;" size="10" name="st_qty" type="text" value="<?php echo $st_qty;?>"></td>

<td class=td1 style="text-align:center;"><SELECT NAME="unit">
<option style="margin:2px; padding-left:10px;" value="<?php echo $unit;?>"><?php echo $unit;?></option>
<option style="margin:2px; padding-left:10px;" value="nos">nos</option>
<option style="margin:2px; padding-left:10px;" value="g">g</option>
<option style="margin:2px; padding-left:10px;" value="kg">kg</option>
<option style="margin:2px; padding-left:10px;" value="ltrs">ltrs</option>
</select></td>

<td class=td1 style="text-align:center;"><input style="text-align:right;" size="8" type="text" value="<?php echo $min_stock;?>" name="min_stock"></td>

<td class=td1 style="text-align:center;"><input size="20" type="text" value="<?php echo $st_remark;?>" name="st_remark"></td>

<td class=td1>
<input type="submit" name="submit" value="save"> &nbsp; <input type="hidden" name="st_id" value="<?=$st_id?>"><input type="button" value="cancel" onclick="window.location='javascript:history.back()'">
</td>
</tr>
</table>
</div>
</form>


<?php
if (isset($_GET['submit'])){
include ("connect.php");

$st_id = $_GET['st_id'];
$st_items = mysql_escape_string($_GET['st_items']);
$st_qty = $_GET['st_qty'];
$sell_rate = $_GET['sell_rate'];
$unit = $_GET['unit'];
$min_stock = $_GET['min_stock'];
$st_remark = $_GET['st_remark'];

$data = "UPDATE text_stock SET st_items = '".$st_items."', st_qty = '".$st_qty."', sell_rate='".$sell_rate."', unit = '".$unit."', min_stock = '".$min_stock."', st_remark = '".$st_remark."' WHERE st_id = '".$st_id."'";

$update = mysql_query($data);

mysql_close();

if($update)
{
header ("Location: stock.php");
}

if(!$update)
{
include ("index.php");
echo "Not Sucessfull!";
}
}
?>
<?php
}
?>
