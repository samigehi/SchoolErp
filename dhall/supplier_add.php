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
if ($_SESSION['user_name'] == 'admin')
{
?>
<!-------------------------------------------------------- TYPE ----------------------------------------------------->
<table class=table1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Supplier Name</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Supplier Of</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Place</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Contact</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Email</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="20" type="text" value="" name="supplier_name"></td>
<td class=td1 style="text-align:center;"><input size="10" type="text" value="" name="supplier_of"></td>
<td class=td1 style="text-align:center;"><input size="12" type="text" value="" name="place"></td>
<td class=td1 style="text-align:center;"><input size="25" type="text" value="" name="contact"></td>
<td class=td1 style="text-align:center;"><input size="30" type="text" value="" name="email"></td>
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
$supplier_name = $_POST['supplier_name'];
$place = $_POST['place'];
$supplier_of = $_POST['supplier_of'];
$contact = $_POST['contact'];
$email = $_POST['email'];

$data_supplier = "INSERT INTO supplier (supplier_name, supplier_of, place, contact, email) VALUES ('$supplier_name', '$supplier_of', '$place', '$contact', '$email')";

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
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Supplier Of</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Place</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Contact</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Email</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>

<?php
//---------------------------shows the supplier list---------------------------------------//
include ("connect.php");
$query = "Select * from supplier ORDER BY supplier_name";
$query_show = mysql_query($query);
while($result = mysql_fetch_array($query_show))
		
	{
	$supplier_name = $result['supplier_name'];
	$supplier_of = $result['supplier_of'];
	$place = $result['place'];
	$id = $result['id'];
	$contact = $result['contact'];	
	$email = $result['email'];
	?>	
<tr>
<td class=td1 style="text-align:center;"><input size="20" type="text" readonly="readonly" value="<?php echo $supplier_name;?>" name="supplier_name"></td>
<td class=td1 style="text-align:center;"><input size="10" type="text" readonly="readonly" value="<?php echo $supplier_of;?>" name="supplier_of"></td>
<td class=td1 style="text-align:center;"><input size="12" type="text" readonly="readonly" value="<?php echo $place;?>" name="place"></td>
<td class=td1 style="text-align:center;"><input size="25" type="text" readonly="readonly" value="<?php echo $contact;?>" name="contact"></td>
<td class=td1 style="text-align:center;"><input size="30" type="text" readonly="readonly" value="<?php echo $email;?>" name="email"></td>
<td class=td1 style="text-align:center;"><?php echo "<a href=\"supplier_edit.php?id=$id\">Edit</a>";?> &nbsp; <?php echo "<a href=\"supplier_delete.php?id=$id\">Delete</a>";?></td>
</tr>
<?php
}
	
}
?>
</form>
</table>
</body>
</html>
