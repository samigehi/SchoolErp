<html>
<head>
<title>supplier edited</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../dhall/css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
//----------------------update page function-------------------//
if (isset($_POST['update'])){
include ("connect.php");

$id = $_POST['id'];
$supplier_name = $_POST['supplier_name'];
$place = $_POST['place'];
$supplier_of = $_POST['supplier_of'];
$contact = $_POST['contact'];
$email = $_POST['email'];

$data_update = "UPDATE supplier SET supplier_name = '".$supplier_name."', place='".$place."', supplier_of='".$supplier_of."', contact='".$contact."', email='".$email."' WHERE id = '".$id."'";

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
