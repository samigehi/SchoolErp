<html>
<head>
<title>supplier edited...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../tkshop/css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
//----------------------update page function-------------------//
if (isset($_POST['update'])){
include ("connect.php");

$supplier_id = $_POST['supplier_id'];
$supplier_name = $_POST['supplier_name'];
$supplier_place = $_POST['supplier_place'];
$supplier_contact = $_POST['supplier_contact'];
$supplier_email = $_POST['supplier_email'];

$data_update = "UPDATE tk_supplier SET supplier_name = '".$supplier_name."', supplier_place='".$supplier_place."', supplier_contact='".$supplier_contact."', supplier_email='".$supplier_email."' WHERE supplier_id = '".$supplier_id."'";

$update = mysql_query($data_update);

mysql_close();

if($update)
{
header ("Location: supplier_add.php");
}

if(!$update)
{
echo mysql_error();
}

}
?>
