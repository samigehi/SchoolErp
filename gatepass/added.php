<html>
<head>
<title>record added</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
if (isset($_POST['submit'])){
include("connect.php");

$gatepass_date = $_POST['gatepass_date'];
$gatepass_no = $_POST['gatepass_no'];
$driver_name = $_POST['driver_name'];
$vehicle_no = $_POST['vehicle_no'];
$prepaired_by = $_POST['prepaired_by'];
$authorised_by = $_POST['authorised_by'];
$items_name = $_POST['items_name'];
$items_qty = $_POST['items_qty'];
$from_dept = $_POST['from_dept'];
$going_to = $_POST['going_to'];
$party_contact = $_POST['party_contact'];
$return_able = $_POST['return_able'];
$reason = $_POST['reason'];

if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{
$added_by_host = $_SESSION['user_ip'];
$added_by = $_SESSION['user_name'];
}

$limit = count($items_name);
for($i=0;$i<$limit;$i++) {
    $items_name[$i] = mysql_real_escape_string($items_name[$i]);
    $items_qty[$i] = mysql_real_escape_string($items_qty[$i]);
    $from_dept[$i] = mysql_real_escape_string($from_dept[$i]);
    $going_to[$i] = mysql_real_escape_string($going_to[$i]);
    $party_contact[$i] = mysql_real_escape_string($party_contact[$i]);
    $return_able[$i] = mysql_real_escape_string($return_able[$i]);
    $reason[$i] = mysql_real_escape_string($reason[$i]);

$query = "INSERT INTO gatepass 

(gatepass_date, gatepass_no, driver_name, vehicle_no, prepaired_by, authorised_by, items_name, items_qty, from_dept, going_to, party_contact, return_able, reason, added_by, added_by_host) 
VALUES 
('".$gatepass_date."', '".$gatepass_no."', '".$driver_name."', '".$vehicle_no."', '".$prepaired_by."', '".$authorised_by."', '".$items_name[$i]."', '".$items_qty[$i]."', '".$from_dept[$i]."', '".$going_to[$i]."', '".$party_contact[$i]."', '".$return_able[$i]."', '".$reason[$i]."', '".$added_by."', '".$added_by_host."')";

//remove blank values from submit//
if ($items_name[$i] != "") {

$results = mysql_query($query);

if ($results)
{
header ("Location: add.php");
}

if (!$results)
{ 
echo mysql_error(); 
}
}
}
mysql_close();
}
?>
 
