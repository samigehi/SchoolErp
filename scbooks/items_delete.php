<html>
<head>
<title>delete items...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>
<h3>Delete Items</h3>
<?php
if ($_SESSION['user_level'] == '1')
{
include ("connect.php");

$st_id = $_GET['st_id'];

$qP = "SELECT * FROM sc_stock WHERE st_id = '$st_id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$st_id = trim($st_id);
$st_items = trim($st_items);
$language = trim($language);
$unit = trim($unit);
$min_stock = trim($min_stock);
$st_remark = trim($st_remark);
?>

<table class=table1>
<form method="GET" action="" name="delete01">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Name of the Item</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Language</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Unit</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Min Stock</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Remark</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="30" type="text" readonly="readonly" value="<?php echo $st_items;?>" name="st_items"></td>
<td class=td1 style="text-align:center;"><input size="10" type="text" readonly="readonly" value="<?php echo $language;?>" name="language"></td>
<td class=td1 style="text-align:center;"><SELECT NAME="unit" disabled="disabled">
<option style="margin:2px; padding-left:10px;" readonly="readonly" value="<?php echo $unit;?>"><?php echo $unit;?></option>
</select></td>
<td class=td1 style="text-align:center;"><input style="text-align:right;" readonly="readonly" size="8" type="text" value="<?php echo $min_stock;?>" name="min_stock"></td>
<td class=td1 style="text-align:center;"><input readonly="readonly" size="30" type="text" value="<?php echo $st_remark;?>" name="st_remark"></td>
<td class=td1 style="text-align:center;"><input type="submit" name="delete" value="delete"> &nbsp; <input type="hidden" name="st_id" value="<?=$st_id?>"></td>
</tr>
</table>
</div>
</form>

<?php
//----------------------delete page function-------------------//
if (isset($_GET['delete'])){
$st_id = $_GET['st_id'];

$delete = "delete from sc_stock where st_id = '$st_id'";
$query_delete = mysql_query($delete);

mysql_close();

if($query_delete)
{
header ("Location: items_add.php");
}

if(!$query_delete)
{
echo mysql_error();
}

}
}
?>
