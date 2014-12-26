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
if ($_SESSION['user_name'] == 'admin')
{

include ("connect.php");

$pr_id = $_GET['pr_id'];

$qP = "SELECT pr_id, pr_items, pr_qty, pr_vat, pr_rate, bill_date, bill_no, pr_remark, supplier FROM purchase WHERE pr_id = '$pr_id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$pr_id = trim($pr_id);
$bill_date = trim($bill_date);
$bill_no = trim($bill_no);
$pr_items = trim($pr_items);
$pr_qty = trim($pr_qty);
$pr_vat = trim($pr_vat);
$pr_rate = trim($pr_rate);
$pr_remark = trim($pr_remark);
$supplier = trim($supplier);


mysql_close();
?>

<table class=table1>
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
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="5" type="text" value="<?php echo $bill_no;?>" name="bill_no"></td>
<td class=td1 style="text-align:center;"><input size="10" type="text" value="<?php echo $bill_date;?>" name="bill_date"></td>
<td class=td1 style="text-align:center;"><input size="12" type="text" value="<?php echo $supplier;?>" name="supplier"></td>
<td class=td1 style="text-align:center;"><input size="12" type="text" value="<?php echo $pr_items;?>" name="pr_items"></td>
<td class=td1 style="text-align:center;"><input size="6" type="text" value="<?php echo $pr_qty;?>" name="upr_qty"></td>
<td class=td1 style="text-align:center;"><input size="6" type="text" value="<?php echo $pr_rate;?>" name="pr_rate"></td>
<td class=td1 style="text-align:center;"><input size="6" type="text" value="<?php echo $pr_vat;?>" name="pr_vat"></td>
<td class=td1 style="text-align:center;"><input size="15" type="text" value="<?php echo $pr_remark;?>" name="pr_remark"></td>

<td class=td1 style="text-align:center;"><input type="submit" name="purchase_update" value="save"> &nbsp; <input type="hidden" name="pr_id" value="<?=$pr_id?>"></td>
</tr>
</table>
</div>
</form>

<?php
if (isset($_POST['purchase_update'])){

$pr_id = $_POST['pr_id'];
$pr_items = $_POST['pr_items'];
$bill_no = $_POST['bill_no'];
$bill_date = $_POST['bill_date'];
$pr_rate = $_POST['pr_rate'];
$upr_qty = $_POST['upr_qty'];
$pr_vat = $_POST['pr_vat'];
$supplier = $_POST['supplier'];
$pr_remark = $_POST['pr_remark'];

include ("connect.php");

//-----------------------update data to purchase -------------------------------//
$data = "UPDATE purchase SET pr_rate='".$pr_rate."', pr_qty='".$upr_qty."', bill_no = '".$bill_no."', bill_date= '".$bill_date."', pr_vat='".$pr_vat."', pr_remark = '".$pr_remark."' WHERE pr_id = '".$pr_id."'";

$update = mysql_query($data);


if($update)
{

//------------------------add data to stock -----------------------------------//
if ($pr_qty == $upr_qty){

$po_qty = $pr_qty - $upr_qty;

$po_data = "UPDATE stock SET st_qty = st_qty - '".$po_qty."', rate = (SELECT (SUM(pr_rate * pr_qty)/SUM(pr_qty)) as 'rate' FROM purchase where pr_items = '".$pr_items."') WHERE st_items = '".$pr_items."'";

$po_purchase = mysql_query($po_data);
}

//------------------------add data to stock -----------------------------------//
if ($pr_qty > $upr_qty){

$add_qty = $pr_qty - $upr_qty;

$add_data = "UPDATE stock SET st_qty = st_qty - '".$add_qty."', rate = (SELECT (SUM(pr_rate * pr_qty)/SUM(pr_qty)) as 'rate' FROM purchase where pr_items = '".$pr_items."') WHERE st_items = '".$pr_items."'";

$add_purchase = mysql_query($add_data);
}

//-----------------------less data to stock-----------------------------------//
if ($pr_qty < $upr_qty){

$less_qty = $pr_qty - $upr_qty;

$less_data = "UPDATE stock SET st_qty = st_qty - '".$less_qty."', rate = (SELECT (SUM(pr_rate * pr_qty)/SUM(pr_qty)) as 'rate' FROM purchase where pr_items = '".$pr_items."') WHERE st_items = '".$pr_items."'";

$less_purchase = mysql_query($less_data);
}

}
if($add_purchase || $less_purchase || $po_purchase)
{
header ("Location: details_purchase.php");
}

if(!$add_purchase || $less_purchase)
{
echo "Not Sucessfull!";
}
}
?>


<?php
}
?>
