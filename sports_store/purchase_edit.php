<html>
<head>
<title>Edit purchase</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>
<h3>Edit Purchase</h3>

<?php
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'avinash') 
{

include ("connect.php");

$pr_id = $_GET['pr_id'];
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$field = $_GET['field'];
$find = $_GET['find'];

$qP = "SELECT pr_id, pr_items, pr_qty, pr_vat, pr_rate, bill_date, bill_no, pr_remark, supplier_name, st_items FROM sports_stock, sports_purchase WHERE st_id = pr_items AND pr_id = '$pr_id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$pr_id = trim($pr_id);
$bill_date = trim($bill_date);
$bill_no = trim($bill_no);
$pr_items = trim($st_items);
$pr_qty = trim($pr_qty);
$pr_vat = trim($pr_vat);
$pr_rate = trim($pr_rate);
$pr_remark = trim($pr_remark);
$supplier_name = trim($supplier_name);


mysql_close();
?>

<table class=table1 style="background-color:#CCFFCC;">
<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Bill No</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Bill Date</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Supplier Name</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Items</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Qty</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Rate</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>VAT</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Description</b></th>
</tr>
<tr>
<td class=td1 style="text-align:center;"><input size="10" style="text-align:center;" type="text" value="<?php echo $bill_no;?>" name="bill_no"></td>
<td class=td1 style="text-align:center;"><input size="10" style="text-align:center;" type="text" value="<?php echo $bill_date;?>" name="bill_date"></td>
<td class=td1 style="text-align:center;"><input size="20" type="text" value="<?php echo $supplier_name;?>" name="supplier_name"></td>
<td class=td1 style="text-align:center;"><input readonly="readonly" size="20" type="text" value="<?php echo $pr_items;?>" name="pr_items"></td>
<td class=td1 style="text-align:center;"><input readonly="readonly" size="10" type="text" value="<?php echo $pr_qty;?>" name="pr_qty"></td>
<td class=td1 style="text-align:center;"><input size="5" type="text" value="<?php echo $pr_rate;?>" name="pr_rate"></td>
<td class=td1 style="text-align:center;"><input size="5" type="text" value="<?php echo $pr_vat;?>" name="pr_vat"></td>
<td class=td1 style="text-align:center;"><input size="20" type="text" value="<?php echo $pr_remark;?>" name="pr_remark"></td>
</tr>
</table>
<br>
<?php
if ($_SESSION['user_name'] == 'admin')
{
?>
<div align="center"><input type="submit" name="delete_entry" value="delete"> &nbsp; <input type="hidden" name="pr_id" value="<?=$pr_id?>"><input type="submit" name="purchase_update" value="update"></div><hr style="margin-top:4px;" width=30% color=orange size=1>
<?php
}
?>
</div>
</form>

<?php
//-----------------------update data to purchase -------------------------------//
if (isset($_POST['purchase_update'])){
$pr_id = $_POST['pr_id'];
$bill_no = $_POST['bill_no'];
$bill_date = $_POST['bill_date'];
$pr_rate = $_POST['pr_rate'];
$pr_vat = $_POST['pr_vat'];
$supplier_name = $_POST['supplier_name'];
$pr_remark = $_POST['pr_remark'];

include ("connect.php");

$data_update = "UPDATE sports_purchase SET pr_rate='".$pr_rate."', supplier_name = '".$supplier_name."', bill_no = '".$bill_no."', bill_date= '".$bill_date."', pr_vat='".$pr_vat."', pr_remark = '".$pr_remark."' WHERE pr_id = '".$pr_id."'";

$update_purchase = mysql_query($data_update);

if($update_purchase)
{
header ("Location: details_purchase.php?fromdate=$fromdate&todate=$todate&field=$field&find=$find");
}

if(!$update_purchase)
{
echo "Not Sucessfull!";
}
}

//----------------------delete data -------------------------------//
if (isset($_POST['delete_entry'])){
$pr_id = $_POST['pr_id'];
$pr_items = $_POST['pr_items'];

include ("connect.php");

$data = "delete from sports_purchase where pr_id = '".$pr_id."'";

$delete = mysql_query($data);

if ($delete)
{

$stock_adjust = "UPDATE sports_stock SET st_qty = st_qty - '".$pr_qty."' WHERE st_items = '".$pr_items."'";

$stock_less = mysql_query($stock_adjust);
}

if($stock_less)
{
header ("Location: details_purchase.php?fromdate=$fromdate&todate=$todate&field=$field&find=$find");
}

if(!$stock_less)
{
echo "Not Sucessfull!";
}
}
}
?>
