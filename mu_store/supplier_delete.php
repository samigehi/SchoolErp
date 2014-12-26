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
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'v.pradnya' || $_SESSION['user_name'] == 'bchetana' || $_SESSION['user_name'] == 'kkavita')
{

include ("connect.php");

$supplier_id = $_GET['supplier_id'];

$qP = "SELECT * FROM maint_supplier WHERE supplier_id = '$supplier_id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$supplier_id = trim($supplier_id);
$supplier_name = trim($supplier_name);
$supplier_contact = trim($supplier_contact);
$supplier_email = trim($supplier_email);
mysql_close();
?>

<table class=table1>
<form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Supplier Name</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Contact</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Email</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="20" readonly="readonly" type="text" value="<?php echo $supplier_name;?>" name="supplier_name"></td>
<td class=td1 style="text-align:center;"><input size="25" readonly="readonly" type="text" value="<?php echo $supplier_contact;?>" name="supplier_contact"></td>
<td class=td1 style="text-align:center;"><input size="30" readonly="readonly" type="text" value="<?php echo $supplier_email;?>" name="supplier_email"></td>
<td class=td1 style="text-align:center;"><input type="submit" name="delete" value="delete"> &nbsp; <input type="hidden" name="supplier_id" value="<?=$supplier_id?>"></td>
</tr>
</table>
</div>
</form>


<?php
//----------------------delete page function-------------------//
if (isset($_GET['delete'])){
include ("connect.php");
$supplier_id = $_GET['supplier_id'];

$delete = "delete from maint_supplier where supplier_id = '$supplier_id'";

$query_delete = mysql_query($delete);

mysql_close();

if($query_delete)
{
header ("Location: supplier_add.php");
}

if(!$query_delete)
{
echo mysql_error();
}

}
}
?>
