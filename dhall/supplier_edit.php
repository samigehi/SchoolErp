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
if ($_SESSION['user_level'] == '1')
{

include ("connect.php");

$id = $_GET['id'];

$qP = "SELECT * FROM supplier WHERE id = '$id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$id = trim($id);
$supplier_name = trim($supplier_name);
$place = trim($place);
$supplier_of = trim($supplier_of);
$contact = trim($contact);
$email = trim($email);
mysql_close();
?>

<table class=table1>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Supplier Name</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Supplier Of</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Place</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Contact</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Email</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="20" type="text" value="<?php echo $supplier_name;?>" name="supplier_name"></td>
<td class=td1 style="text-align:center;"><input size="10" type="text" value="<?php echo $supplier_of;?>" name="supplier_of"></td>
<td class=td1 style="text-align:center;"><input size="12" type="text" value="<?php echo $place;?>" name="place"></td>
<td class=td1 style="text-align:center;"><input size="25" type="text" value="<?php echo $contact;?>" name="contact"></td>
<td class=td1 style="text-align:center;"><input size="30" type="text" value="<?php echo $email;?>" name="email"></td>
<td class=td1 style="text-align:center;"><input type="submit" name="save" value="save"> &nbsp; <input type="hidden" name="id" value="<?=$id?>"></td>
</tr>
</table>
</div>
</form>

<?php
//----------------------update page function-------------------//
if (isset($_POST['save'])){
include ("connect.php");

$id = $_POST['id'];
$supplier_name = $_POST['supplier_name'];
$place = $_POST['place'];
$supplier_of = $_POST['supplier_of'];
$contact = $_POST['contact'];
$email = $_POST['email'];

$data_update = "UPDATE supplier SET supplier_name = '".$supplier_name."', place='".$place."', supplier_of='".$supplier_of."', contact='".$contact."', email='".$email."' WHERE id = '".$id."'";

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
