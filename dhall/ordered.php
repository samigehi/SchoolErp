<html>
<head>
<title>Items ordered</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
if (isset($_POST['submit'])){
include ("index.php");
include ("connect.php");

$po_date = $_POST['po_date'];
$po_time = $_POST['po_time'];
$po_items = $_POST['po_items'];
$po_qty = $_POST['po_qty'];
$po_remark = $_POST['po_remark'];

if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{
$ordered_by = $_SESSION['user_name'] ;
}

$limit = count($po_items);

for($i=0;$i<$limit;$i++) {
    $po_items[$i] = mysql_real_escape_string($po_items[$i]);
    $po_qty[$i] = mysql_real_escape_string($po_qty[$i]);
    $po_remark[$i] = mysql_real_escape_string($po_remark[$i]);
    
$query = "INSERT INTO purchase_order (po_items, po_qty, po_date, po_time, ordered_by, po_remark) VALUES ('".$po_items[$i]."', '".$po_qty[$i]."', '".$po_date."', '".$po_time."', '".$ordered_by."', '".$po_remark[$i]."')";

//remove blank values from submit
if ($po_items[$i] != "") {
$results = mysql_query($query);
}
}

if($results)
{
header ("Location: purchase_order.php");
}

if(!$results)
{
echo "Not Sucessfull!";
}
}
?>
