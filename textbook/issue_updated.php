<html>
<head>
<title>Issue update</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include ("connect.php");

if (isset($_POST['submit'])){

$items = $_POST['items'];
$issue_qty = $_POST['issue_qty'];
$issue_updated = $_POST['issue_updated'];

//update to issue table
$iss_date = date ('Y-m-d');
$iss_time = date ('H:i:s');
$issued_to = $_POST['issued_to'];
$items_for = $_POST['items_for'];

//data add information//
$ip_1 = $_SERVER['HTTP_X_FORWARDED_FOR'];
$ip_2 = $_SERVER['REMOTE_ADDR'];

session_start ();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{
$issued_by = $_SESSION['user_name'] ;
}

$limit = count($items);
for($i=0;$i<$limit;$i++) {
    $issue_updated[$i] = mysql_real_escape_string($issue_updated[$i]);
    $issue_qty[$i] = mysql_real_escape_string($issue_qty[$i]);
    $items[$i] = mysql_real_escape_string($items[$i]); 
    $items_for[$i] = mysql_real_escape_string($items_for[$i]);

//update to daily_issue table
$data = "UPDATE daily_issue SET issue_qty = '".$issue_qty[$i]."', items_for = '".$items_for[$i]."', issue_updated = '".$issue_updated[$i]."' WHERE items = '".$items[$i]."'";
$update = mysql_query($data);


if($update){
//INSERT to issue table
$query = "INSERT INTO issue (iss_date, iss_time, items, qty, dhst_remark, issued_to, items_for, ip_1, ip_2, issued_by) VALUES ('".$iss_date."', '".$iss_time."', '".$items[$i]."', '".$issue_qty[$i]."', '".$issue_updated[$i]."', '".$issued_to."', '".$items_for[$i]."', '".$ip_1."', '".$ip_2."', '".$issued_by."')";
$issue_add = mysql_query($query);
}

if($issue_add){
//update to stock table
$less_data = "UPDATE stock SET qty = qty -'".$issue_qty[$i]."', dh_remark = '".$issue_updated[$i]."' WHERE items = '".$items[$i]."'";
$issued = mysql_query($less_data);
}
}

mysql_close();

if($issued)
{
header ("Location: stock.php");
}

if(!$issued)
{
echo "Not Sucessfull!";
}
}
?>
