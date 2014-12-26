<html>
<head>
<title>Edit Customer..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>
<h3>Edit Customer</h3>

<?php
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'v.pradnya' || $_SESSION['user_name'] == 'bchetana' || $_SESSION['user_name'] == 'kkavita')
{

include ("connect.php");

$customer_id = $_GET['customer_id'];

$qP = "SELECT * FROM mu_customer WHERE customer_id = '$customer_id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$customer_id = trim($customer_id);
$customer_name = trim($customer_name);
$customer_email = trim($customer_email);

mysql_close();
?>

<table class=table1>
<form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Customer Name</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Email</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="20" type="text" value="<?php echo $customer_name;?>" name="customer_name"></td>
<td class=td1 style="text-align:center;"><input size="30" type="text" value="<?php echo $customer_email;?>" name="customer_email"></td>
<td class=td1 style="text-align:center;"><input type="submit" name="update" value="save"> &nbsp; <input type="hidden" name="customer_id" value="<?=$customer_id?>"></td>
</tr>
</table>
</form>

<?php
if (isset($_GET['update'])){

include ("connect.php");

$customer_id = $_GET['customer_id'];
$customer_name = $_GET['customer_name'];
$customer_email = $_GET['customer_email'];

$data_update = "UPDATE mu_customer SET customer_name = '".$customer_name."', customer_email='".$customer_email."' WHERE customer_id = '".$customer_id."'";

$update = mysql_query($data_update);

mysql_close();

if($update)
{
header ("Location: customer_add.php");
}

if(!$update)
{
echo mysql_error();
}
}

}
?>
