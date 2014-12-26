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
if ($_SESSION['user_level'] == '1')
{

include ("connect.php");

$customer_id = $_GET['customer_id'];

$qP = "SELECT * FROM comp_customer WHERE customer_id = '$customer_id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$customer_id = trim($customer_id);
$customer_name = trim($customer_name);
$customer_place = trim($customer_place);
$customer_contact = trim($customer_contact);
$customer_email = trim($customer_email);

mysql_close();
?>

<table class=table1>
<form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<tr>
<th class=th1 style="text-align:center;"><b>Customer Name</b></th>
<th class=th1 style="text-align:center;"><b>Place</b></b></th>
<th class=th1 style="text-align:center;"><b>Contact</b></b></th>
<th class=th1 style="text-align:center;"><b>Email</b></b></th>
<th class=th1 style="text-align:center;"><b>Option</b></b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="20" type="text" value="<?php echo $customer_name;?>" name="customer_name"></td>
<td class=td1 style="text-align:center;"><input size="12" type="text" value="<?php echo $customer_place;?>" name="customer_place"></td>
<td class=td1 style="text-align:center;"><input size="25" type="text" value="<?php echo $customer_contact;?>" name="customer_contact"></td>
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
$customer_place = $_GET['customer_place'];
$customer_contact = $_GET['customer_contact'];
$customer_email = $_GET['customer_email'];

$data_update = "UPDATE comp_customer SET customer_name = '".$customer_name."', customer_place='".$customer_place."', customer_contact='".$customer_contact."', customer_email='".$customer_email."' WHERE customer_id = '".$customer_id."'";

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
