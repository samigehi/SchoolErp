<html>
<head>
<title>Items edited</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
if (isset($_POST['submit'])){
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
?>
