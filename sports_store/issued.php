<html>
<head>
<title>Items : issued</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
if (isset($_POST['submit'])){
include ("connect.php");

$iss_date = $_POST['iss_date'];
$requisition_no = $_POST['requisition_no'];
$customer_name = $_POST['customer_name'];
$iss_items = $_POST['iss_items'];
$iss_qty = $_POST['iss_qty'];
$customer_type = $_POST['customer_type'];
$iss_remark = $_POST['iss_remark'];

session_start ();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{
$ip_1 = $_SESSION['user_ip'];
$by_user = $_SESSION['user_name'] ;
}

$limit = count($iss_items);

for($i=0;$i<$limit;$i++) {
    $iss_items[$i] = mysql_real_escape_string($iss_items[$i]);
    $iss_qty[$i] = mysql_real_escape_string($iss_qty[$i]);
    $iss_remark[$i] = mysql_real_escape_string($iss_remark[$i]);
    
$query = "INSERT INTO sports_issue (iss_date, requisition_no, iss_items, iss_qty, iss_remark, customer_name, ip_1, by_user, customer_type, iss_rate) VALUES ('".$iss_date."', '".$requisition_no."', '".$iss_items[$i]."', '".$iss_qty[$i]."', '". $iss_remark[$i]."', '".$customer_name."', '".$ip_1."', '".$by_user."', '".$customer_type."', (SELECT rate from sports_stock where st_id = '".$iss_items[$i]."'))";

//remove blank values from submit//
if ($iss_items[$i] != "") {

$results = mysql_query($query);

if($results)
{
$less_data = "UPDATE sports_stock SET st_qty = st_qty -'".$iss_qty[$i]."' WHERE st_id='".$iss_items[$i]."'";
$update = mysql_query($less_data);
}
}
}

mysql_close();

if($results && $update)
{
header ("Location: issue.php");
}

if(!$results && $update)
{
echo mysql_error();
}
}
?>


