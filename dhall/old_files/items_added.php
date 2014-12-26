<html>
<head>
<title>Items added</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

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
?>
