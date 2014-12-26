<html>
<head>
<title>Items : issued</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
if (isset($_POST['submit'])){
include ("index.php");
include ("connect.php");

$iss_date = $_POST['iss_date'];
$issued_to = $_POST['issued_to'];
$items_for = $_POST['items_for'];
$iss_items = $_POST['iss_items'];
$iss_qty = $_POST['iss_qty'];
$iss_remark = $_POST['iss_remark'];
$customer_type = $_POST['customer_type'];

if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{
$ip_1 = $_SESSION['user_ip'];
$issued_by = $_SESSION['user_name'] ;
}
$limit = count($iss_items);

for($i=0;$i<$limit;$i++) {
    $iss_items[$i] = mysql_real_escape_string($iss_items[$i]);
    $items_for[$i] = mysql_real_escape_string($items_for[$i]);
    $iss_qty[$i] = mysql_real_escape_string($iss_qty[$i]);
    $iss_remark[$i] = mysql_real_escape_string($iss_remark[$i]);
    
$query = "INSERT INTO issue (iss_date, iss_items, iss_qty, items_for, iss_remark, issued_to, customer_type, ip_1, issued_by, iss_rate) VALUES ('".$iss_date."', '".$iss_items[$i]."', '".$iss_qty[$i]."', '".$items_for[$i]."', '". $iss_remark[$i]."', '".$issued_to."', '".$customer_type."', '".$ip_1."', '".$issued_by."', (SELECT rate from stock where st_items = '".$iss_items[$i]."'))";

//remove blank values from submit//
if ($iss_items[$i] != "") {

$results = mysql_query($query);

if($results)
{
$less_data = "UPDATE stock SET st_qty = st_qty -'".$iss_qty[$i]."' WHERE st_items='".$iss_items[$i]."'";

$update = mysql_query($less_data);
}
}
}

mysql_close();

if($update)
{
header ("Location: issue.php");
}

if(!$update)
{
include ('index.php');
echo mysql_error();
}
}
?>


