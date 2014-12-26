<html>
<head>
<title>delete supplier..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>
<h3>Delete supplier</h3>

<?php
if ($_SESSION['user_name'] == 'admin')
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
<form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Supplier Name</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Supplier Of</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Place</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Contact</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Email</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="20" readonly="readonly" type="text" value="<?php echo $supplier_name;?>" name="supplier_name"></td>
<td class=td1 style="text-align:center;"><input size="10" readonly="readonly" type="text" value="<?php echo $supplier_of;?>" name="supplier_of"></td>
<td class=td1 style="text-align:center;"><input size="12" readonly="readonly" type="text" value="<?php echo $place;?>" name="place"></td>
<td class=td1 style="text-align:center;"><input size="25" readonly="readonly" type="text" value="<?php echo $contact;?>" name="contact"></td>
<td class=td1 style="text-align:center;"><input size="30" readonly="readonly" type="text" value="<?php echo $email;?>" name="email"></td>
<td class=td1 style="text-align:center;"><input type="submit" name="delete" value="delete"> &nbsp; <input type="hidden" name="id" value="<?=$id?>"></td>
</tr>
</table>
</div>
</form>


<?php
//----------------------delete page function-------------------//
if (isset($_GET['delete'])){
include ("connect.php");
$id = $_GET['id'];

$delete = "delete from supplier where id = '$id'";

$query_delete = mysql_query($delete);

mysql_close();

if($query_delete)
{
header ("Location: ../dhall/supplier_add.php");
}

if(!$query_delete)
{
echo mysql_error();
}

}
}
?>
