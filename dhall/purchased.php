<html>
<head>
<title>Items : purchased</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
if (isset($_POST['submit'])){
include ("index.php");
include ("connect.php");

$pr_date = date("Y-m-d");
$bill_date = $_POST['bill_date'];
$bill_no = $_POST['bill_no'];
$supplier = $_POST['supplier'];
$pr_items = $_POST['pr_items'];
$pr_qty = $_POST['pr_qty'];
$pr_vat = $_POST['pr_vat'];
$pr_rate = $_POST['pr_rate'];
$pr_remark = $_POST['pr_remark'];

if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{
$ip_1 = $_SESSION['user_ip'];
$added_by = $_SESSION['user_name'];
}

$limit = count($pr_items);

for($i=0;$i<$limit;$i++) {
    $pr_items[$i] = mysql_real_escape_string($pr_items[$i]);
    $pr_qty[$i] = mysql_real_escape_string($pr_qty[$i]);
    $pr_vat[$i] = mysql_real_escape_string($pr_vat[$i]);
    $pr_remark[$i] = mysql_real_escape_string($pr_remark[$i]);
    $pr_rate[$i] = mysql_real_escape_string($pr_rate[$i]);    

$query = "INSERT INTO purchase (pr_date, bill_date, bill_no, supplier, pr_items, pr_qty, pr_remark, ip_1, added_by, pr_rate, pr_vat) VALUES ('".$pr_date."', '".$bill_date."', '".$bill_no."', '".$supplier."', '".$pr_items[$i]."', '".$pr_qty[$i]."', '".$pr_remark[$i]."', '".$ip_1."', '".$added_by."', '".$pr_rate[$i]."', '".$pr_vat[$i]."')";

//remove blank values from submit//
if ($pr_items[$i] != "") {

$results = mysql_query($query);

if($results)
{

//add avg rates in stock table//
$add_data = "UPDATE stock SET st_qty = st_qty + '".$pr_qty[$i]."', rate = (SELECT (SUM(pr_rate * pr_qty)/SUM(pr_qty)) as 'rate' FROM purchase where pr_items = '".$pr_items[$i]."') WHERE st_items='".$pr_items[$i]."'";

$update = mysql_query($add_data);

}
}
}
mysql_close();

if($update){
header ("Location: purchase.php");
}

if(!$results)
{
include ('index.php');
echo mysql_error();
}
}
?>


