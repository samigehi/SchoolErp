<html>
<head>
<title>daily issue update</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
if (isset($_POST['submit'])){
include ("index.php");
include ("connect.php");

$di_items = $_POST['di_items'];
$issue_qty = $_POST['issue_qty'];
$issue_updated = $_POST['issue_updated'];

//update to issue table
$iss_date = date ('Y-m-d');
$issued_to = $_POST['issued_to'];
$items_for = $_POST['items_for'];

//data add information//
$ip_1 = $_SERVER['REMOTE_ADDR'].'|'.$_SERVER['HTTP_X_FORWARDED_FOR'];

if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{
$issued_by = $_SESSION['user_name'] ;
}

$limit = count($di_items);
for($i=0;$i<$limit;$i++) {
    $issue_updated[$i] = mysql_real_escape_string($issue_updated[$i]);
    $issue_qty[$i] = mysql_real_escape_string($issue_qty[$i]);
    $di_items[$i] = mysql_real_escape_string($di_items[$i]); 
    $items_for[$i] = mysql_real_escape_string($items_for[$i]);

//update to daily_issue table
$data = "UPDATE daily_issue SET issue_qty = '".$issue_qty[$i]."', items_for = '".$items_for[$i]."', issue_updated = '".$issue_updated[$i]."' WHERE di_items = '".$di_items[$i]."'";
$update = mysql_query($data);


if($update){
//INSERT to issue table
$query = "INSERT INTO issue (iss_date, iss_items, iss_qty, iss_remark, issued_to, items_for, ip_1, issued_by, iss_rate) VALUES ('".$iss_date."', '".$di_items[$i]."', '".$issue_qty[$i]."', '".$issue_updated[$i]."', '".$issued_to."', '".$items_for[$i]."', '".$ip_1."', '".$issued_by."', (SELECT rate from stock where st_items = '".$di_items[$i]."'))";
$issue_add = mysql_query($query);
}

if($issue_add){
//update to stock table
$less_data = "UPDATE stock SET st_qty = st_qty -'".$issue_qty[$i]."' WHERE st_items = '".$di_items[$i]."'";
$issued = mysql_query($less_data);
}
}
mysql_close();

if($issued)
{
header ("Location: get_daily_demand.php");
}

if(!$issued)
{
include ("index.php");
echo mysql_error();
}
}
?>
