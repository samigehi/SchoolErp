<html>
<head>
<title>Edit issue</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>
<h3>Edit Issue</h3>

<?php
if ($_SESSION['user_level'] == '1')
{
include ("connect.php");

$iss_id = $_GET['iss_id'];
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$field = $_GET['field'];
$find = $_GET['find'];

$qP = "SELECT * FROM tk_issue WHERE iss_id = '$iss_id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$iss_id = trim($iss_id);
$iss_date = trim($iss_date);
$iss_items = trim($iss_items);
$iss_qty = trim($iss_qty);
$iss_rate = trim($iss_rate);
$iss_remark = trim($iss_remark);
$customer_name = trim($customer_name);
mysql_close();
?>

<table class=table1>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Issue Date</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Customer Name</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Items</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Qty</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Rate</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Description</b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="25" type="text" value="<?php echo $iss_date;?>" name="iss_date"></td>
<td class=td1 style="text-align:center;"><input size="25" type="text" value="<?php echo $customer_name;?>" name="customer_name"></td>
<td class=td1 style="text-align:center;"><input readonly="readonly" size="20" type="text" value="<?php echo $iss_items;?>" name="iss_items"></td>
<td class=td1 style="text-align:center;"><input readonly="readonly" size="8" type="text" value="<?php echo $iss_qty;?>" name="iss_qty"></td>
<td class=td1 style="text-align:center;"><input size="8" type="text" value="<?php echo $iss_rate;?>" name="iss_rate"></td>
<td class=td1 style="text-align:center;"><input size="30" type="text" value="<?php echo $iss_remark;?>" name="iss_remark"></td>
</tr>
</table>
<br>
<?php
if ($_SESSION['user_level'] == '1')
{
?>
<div align="center"><input type="submit" name="delete_entry" value="delete"> &nbsp; <input type="hidden" name="iss_id" value="<?=$iss_id?>"><input type="submit" name="issue_update" value="update"></div><hr style="margin-top:4px;" width=30% color=orange size=1>
<?php
}
?>
</div>
</form>

<?php
//-----------------------update data to issue -------------------------------//
if (isset($_POST['issue_update'])){
$iss_id = $_POST['iss_id'];
$iss_date= $_POST['iss_date'];
$iss_rate= $_POST['iss_rate'];
$customer_name = mysql_escape_string($_POST['customer_name']);
$iss_remark = mysql_escape_string($_POST['iss_remark']);

include ("connect.php");

$data_issue = "UPDATE tk_issue SET customer_name = '".$customer_name."', iss_date = '".$iss_date."', iss_rate = '".$iss_rate."', iss_remark = '".$iss_remark."' WHERE iss_id = '".$iss_id."'";

$update_issue = mysql_query($data_issue);

if($update_issue)
{
header ("Location: details_issue.php?fromdate=$fromdate&todate=$todate&field=$field&find=$find");
}
if(!$update_issue)
{
echo "Not Sucessfull!";
}
}

//----------------------delete data -------------------------------//
if (isset($_POST['delete_entry'])){
$iss_id = $_POST['iss_id'];
$iss_items = $_POST['iss_items'];

include ("connect.php");

$data_delete = "delete from tk_issue where iss_id = '".$iss_id."'";

$delete_entry = mysql_query($data_delete);

if ($delete_entry)
{

$stock_adjust = "UPDATE tk_stock SET st_qty = st_qty + '".$iss_qty."' WHERE st_items = '".$iss_items."'";

$stock_add = mysql_query($stock_adjust);
}

if($stock_add)
{
header ("Location: details_issue.php?fromdate=$fromdate&todate=$todate&field=$field&find=$find");
}

if(!$stock_add)
{
echo "Not Sucessfull!";
}
}

}
?>
