<html>
<head>
<title>supplier add...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>

<h3>Add Supplier</h3>

<?php
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'siraj')
{
?>

<!-------------------------------------------------------- TYPE ----------------------------------------------------->
<table class=table1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Supplier Name</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Place</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Contact</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Email</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="20" type="text" value="" name="supplier_name"></td>
<td class=td1 style="text-align:center;"><input size="12" type="text" value="" name="supplier_place"></td>
<td class=td1 style="text-align:center;"><input size="25" type="text" value="" name="supplier_contact"></td>
<td class=td1 style="text-align:center;"><input size="30" type="text" value="" name="supplier_email"></td>
<td class=td1 style="text-align:center;"><input type="submit" name="submit" value="Add"></td>
</tr>
</table>
<br>
</div>
</form>

<?php
//----------------------------added page function------------------------------//
include ("connect.php");

if (isset($_POST['submit'])){
$supplier_name = mysql_escape_string($_POST['supplier_name']);
$supplier_place = $_POST['supplier_place'];
$supplier_contact = $_POST['supplier_contact'];
$supplier_email = $_POST['supplier_email'];

$data_supplier = "INSERT INTO tk_supplier (supplier_name, supplier_place, supplier_contact, supplier_email) VALUES ('$supplier_name', '$supplier_place', '$supplier_contact', '$supplier_email')";

$add_supplier = mysql_query($data_supplier);

mysql_close();

if($add_supplier)
{
header ("Location: supplier_add.php");
}

if(!$add_supplier)
{
echo mysql_error();
}
}
?>


<h4 style="color:darkgreen; font-size:12px; text-decoration:underline; margin-bottom:-12px;">Supplier List<h4>

<table class=table1>
<form method="post" action="">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Supplier Name</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Place</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Contact</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Email</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>

<?php
//---------------------------shows the supplier list---------------------------------------//
include ("connect.php");

$query = "Select * from tk_supplier ORDER BY supplier_name";
$query_show = mysql_query($query);

while($result = mysql_fetch_array($query_show))
		
	{
	$supplier_name = $result['supplier_name'];
	$supplier_place = $result['supplier_place'];
	$supplier_id = $result['supplier_id'];
	$supplier_contact = $result['supplier_contact'];	
	$supplier_email = $result['supplier_email'];
	?>	
<tr>
<td class=td1 style="text-align:center;"><input size="20" type="text" readonly="readonly" value="<?php echo $supplier_name;?>" name="supplier_name"></td>
<td class=td1 style="text-align:center;"><input size="12" type="text" readonly="readonly" value="<?php echo $supplier_place;?>" name="supplier_place"></td>
<td class=td1 style="text-align:center;"><input size="25" type="text" readonly="readonly" value="<?php echo $supplier_contact;?>" name="supplier_contact"></td>
<td class=td1 style="text-align:center;"><input size="30" type="text" readonly="readonly" value="<?php echo $supplier_email;?>" name="supplier_email"></td>
<td class=td1 style="text-align:center;"><?php echo "<a href=\"supplier_edit.php?supplier_id=$supplier_id\">Edit</a>";?> &nbsp; <?php echo "<a href=\"supplier_delete.php?supplier_id=$supplier_id\">Delete</a>";?></td>
</tr>
<?php
}
	
}
?>
</form>
</table>
</body>
</html>
