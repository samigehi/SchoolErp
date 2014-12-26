<html>
<head>
<title>Items demanded</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
if (isset($_POST['submit'])){
include ("connect.php");

$di_time = date("H:i:s");
$di_date = date("Y-m-d");

$of_date = $_POST['of_date'];
$di_items = $_POST['di_items'];
$di_qty = $_POST['di_qty'];
$items_for = $_POST['items_for'];
$di_remark = $_POST['di_remark'];
$limit = count($di_items);

for($i=0;$i<$limit;$i++) {
    $di_items[$i] = mysql_real_escape_string($di_items[$i]);
    $di_qty[$i] = mysql_real_escape_string($di_qty[$i]);
    $items_for[$i] = mysql_real_escape_string($items_for[$i]);
    $di_remark[$i] = mysql_real_escape_string($di_remark[$i]);
    
$query = "INSERT INTO daily_issue (ofdate, di_date, di_time, di_items, di_qty, items_for, di_remark) VALUES ('".$of_date."', '".$di_date."', '".$di_time."', '".$di_items[$i]."', '".$di_qty[$i]."', '".$items_for[$i]."', '". $di_remark[$i]."')";

//remove blank values from submit
if ($di_items[$i] != "") {
$results = mysql_query($query);
}
}

mysql_close();

if($results)
{
header ("Location: daily_demand.php");
}

if(!$results)
{
echo "Not Sucessfull!";
}
}
?>


