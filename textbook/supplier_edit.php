<html>
<head>
<title>Edit supplier..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>
<h3>Edit supplier</h3>

<?php
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'jdeepak')
{

include ("connect.php");

$supplier_id = $_GET['supplier_id'];

$qP = "SELECT * FROM text_supplier WHERE supplier_id = '$supplier_id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$supplier_id = trim($supplier_id);
$supplier_name = trim($supplier_name);
$supplier_place = trim($supplier_place);
$supplier_contact = trim($supplier_contact);
$supplier_email = trim($supplier_email);

mysql_close();
?>

<table class=table1>
<form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Supplier Name</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Place</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Contact</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Email</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="20" type="text" value="<?php echo $supplier_name;?>" name="supplier_name"></td>
<td class=td1 style="text-align:center;"><input size="12" type="text" value="<?php echo $supplier_place;?>" name="supplier_place"></td>
<td class=td1 style="text-align:center;"><input size="25" type="text" value="<?php echo $supplier_contact;?>" name="supplier_contact"></td>
<td class=td1 style="text-align:center;"><input size="30" type="text" value="<?php echo $supplier_email;?>" name="supplier_email"></td>
<td class=td1 style="text-align:center;"><input type="submit" name="update" value="save"> &nbsp; <input type="hidden" name="supplier_id" value="<?=$supplier_id?>"></td>
</tr>
</table>
</div>
</form>

<?php
if (isset($_GET['update'])){
include ("connect.php");

$supplier_id = $_GET['supplier_id'];
$supplier_name = mysql_escape_string($_GET['supplier_name']);
$supplier_place = $_GET['supplier_place'];
$supplier_contact = $_GET['supplier_contact'];
$supplier_email = $_GET['supplier_email'];

$data_update = "UPDATE text_supplier SET supplier_name = '".$supplier_name."', supplier_place='".$supplier_place."', supplier_contact='".$supplier_contact."', supplier_email='".$supplier_email."' WHERE supplier_id = '".$supplier_id."'";

$update = mysql_query($data_update);

mysql_close();

if($update)
{
header ("Location: supplier_add.php");
}

if(!$update)
{
echo mysql_error();
}
}
}
?>
