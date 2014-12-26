<html>
<head>
<title>ordered status</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
if (isset($_POST['submit'])){
include ("index.php");
include ("connect.php");

$id = $_POST['id'];
$ordered_status = $_POST['ordered_status'];

$limit = count($id);

for($i=0;$i<$limit;$i++) {
    $id[$i] = mysql_real_escape_string($id[$i]);
    $ordered_status[$i] = mysql_real_escape_string($ordered_status[$i]);
   
$query = "UPDATE purchase_order set ordered_status = '".$ordered_status[$i]."' WHERE id = '".$id[$i]."'";

$results = mysql_query($query);
}
}

if($results)
{
header ("Location: get_purchase_order.php");
}

if(!$results)
{
echo "Not Sucessfull!";
}
?>
