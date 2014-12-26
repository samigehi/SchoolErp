<html>
<head>
<title>Customer add...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>

<h3>Add Customer</h3>

<?php
if ($_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == 'pusha')
{
?>

<!-------------------------------------------------------- TYPE ----------------------------------------------------->
<table class=table1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Customer Name</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Email</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="20" type="text" value="" name="customer_name"></td>
<td class=td1 style="text-align:center;"><input size="30" type="text" value="" name="customer_email"></td>
<td class=td1 style="text-align:center;"><input type="submit" name="submit" value="Add"></td>
</tr>
</table>
</div>
</form>

<?php
//----------------------------added page function------------------------------//
if (isset($_POST['submit'])){

include ("connect.php");

$customer_name = $_POST['customer_name'];
$customer_email = $_POST['customer_email'];

$data_customer = "INSERT INTO general_customer (customer_name, customer_email) VALUES ('$customer_name', '$customer_email')";

$add_customer = mysql_query($data_customer);

mysql_close();

if($add_customer)
{
header ("Location: customer_add.php");
}

if(!$add_customer)
{
echo "Not Sucessful. <a href='customer_add.php'>Please try again</a>";
}
}
?>


<h4 style="color:darkgreen; font-size:12px; text-decoration:underline; margin-bottom:-12px;">Customer List<h4>

<table class=table1>
<form method="post" action="">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Customer Name</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Email</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>

<?php
//---------------------------shows the customer list---------------------------------------//
include ("connect.php");

$query = "Select * from general_customer ORDER BY customer_name";
$query_show = mysql_query($query);

while($result = mysql_fetch_array($query_show))
		
	{
	$customer_name = $result['customer_name'];
	$customer_id = $result['customer_id'];	
	$customer_email = $result['customer_email'];
	?>	
<tr>
<td class=td1 style="text-align:center;"><input size="20" type="text" readonly="readonly" value="<?php echo $customer_name;?>" name="customer_name"></td>
<td class=td1 style="text-align:center;"><input size="30" type="text" readonly="readonly" value="<?php echo $customer_email;?>" name="customer_email"></td>
<td class=td1 style="text-align:center;"><?php echo "<a href=\"customer_edit.php?customer_id=$customer_id\">Edit</a>";?> &nbsp; <?php echo "<a href=\"customer_delete.php?customer_id=$customer_id\">Delete</a>";?></td>
</tr>
<?php
}
	
}
?>
</form>
</table>
</body>
</html>
