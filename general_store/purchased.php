<html>
<head>
<title>Items : purchased</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
if (isset($_POST['submit'])){
include ("connect.php");
$pr_date = date("Y-m-d");
$bill_date = $_POST['bill_date'];
$bill_no = $_POST['bill_no'];
$pindt_no = $_POST['pindt_no'];
$supplier_name = $_POST['supplier_name'];
$pr_items = $_POST['pr_items'];
$pr_qty = $_POST['pr_qty'];
$pr_rate = $_POST['pr_rate'];
$pr_vat = $_POST['pr_vat'];
$pr_remark = $_POST['pr_remark'];

session_start ();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{
$ip_1 = $_SESSION['user_ip'];
$by_user = $_SESSION['user_name'];
}

$limit = count($pr_items);

for($i=0;$i<$limit;$i++) {
    $pr_items[$i] = mysql_real_escape_string($pr_items[$i]);
    $pr_qty[$i] = mysql_real_escape_string($pr_qty[$i]);
    $pr_rate[$i] = mysql_real_escape_string($pr_rate[$i]);
    $pr_vat[$i] = mysql_real_escape_string($pr_vat[$i]);
    $pr_remark[$i] = mysql_real_escape_string($pr_remark[$i]);

//insert into purchase table//
$query = "INSERT INTO general_purchase (pr_date, bill_date, bill_no, pindt_no, supplier_name, pr_items, pr_qty, pr_rate, pr_vat, pr_remark, ip_1, by_user) VALUES 

('".$pr_date."', '".$bill_date."', '".$bill_no."', '".$pindt_no."', '".$supplier_name."', '".$pr_items[$i]."', '".$pr_qty[$i]."', '".$pr_rate[$i]."', '".$pr_vat[$i]."', '".$pr_remark[$i]."', '".$ip_1."', '".$by_user."')";

//remove blank values from submit//
if ($pr_items[$i] != "") {

$results = mysql_query($query);

if($results)
{
//update stock table//
$add_data = "UPDATE general_stock SET st_qty = st_qty + '".$pr_qty[$i]."', rate = (SELECT SUM(pr_rate * pr_qty)/SUM(pr_qty) as 'rate' FROM general_purchase where pr_items ='".$pr_items[$i]."') WHERE st_id='".$pr_items[$i]."'";

$update = mysql_query($add_data);

}
}
}
mysql_close();

if($update){
header ("Location: purchase.php");
}

if(!$update)
{
echo mysql_error();
}
}
?>


