<html>
<head>
<title>Items</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>

<h3>Add New Items</h3>

<?php
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'pusha')
{
?>

<!-------------------------------------------------------- TYPE ----------------------------------------------------->
<table class=table1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Name of the Item</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Unit</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Min Stock</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Remark</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="30" type="text" value="" name="st_items"></td>
<td class=td1 style="text-align:center;"><SELECT NAME="unit">
<option style="margin:2px; padding-left:10px;" value="nos">nos</option>
<option style="margin:2px; padding-left:10px;" value="g">g</option>
<option style="margin:2px; padding-left:10px;" value="kg">kg</option>
<option style="margin:2px; padding-left:10px;" value="ltrs">ltrs</option>
<option style="margin:2px; padding-left:10px;" value="ft">ft</option>
</select></td>
<td class=td1 style="text-align:center;"><input style="text-align:right;" size="8" type="text" value="" name="min_stock"></td>
<td class=td1 style="text-align:center;"><input size="30" type="text" value="" name="st_remark"></td>
<td class=td1 style="text-align:center;"><input type="submit" name="submit" value="Add"></td>
</tr>
</table>
</div>
</form>


<?php
if (isset($_POST['submit'])){
include ("connect.php");
$st_items = $_POST['st_items'];
$unit = $_POST['unit'];
$min_stock = $_POST['min_stock'];
$st_date = date("Y-m-d");
$st_remark = $_POST['st_remark'];

$data_st = "INSERT INTO stationery_stock (st_items, st_date, unit, min_stock, st_remark) VALUES ('$st_items', '$st_date', '$unit', '$min_stock', '$st_remark')";

$add_st = mysql_query($data_st);

mysql_close();

if($add_st)
{
header ("Location: items_add.php");
}

if(!$add_st)
{
echo "Not Sucessful. <a href='items_add.php'>Please try again</a>"; 
}
}
?>

<h4 style="color:darkgreen; font-size:12px; text-decoration:underline; margin-bottom:-12px;">Items List<h4>
<table class=table1>
<form method="post" action="">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Name of the Item</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Unit</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Min Stock</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Remark</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>


<?php
//---------------------------shows the supplier list---------------------------------------//
include ("connect.php");

$query = "Select * from stationery_stock ORDER BY st_items";
$query_show = mysql_query($query);

while($result = mysql_fetch_array($query_show))
		
	{
	$st_id = $result['st_id'];
	$st_items = $result['st_items'];
	$unit = $result['unit'];
	$min_stock = $result['min_stock'];
	$st_remark = $result['st_remark'];
	
?>

<tr>
<td class=td1 style="text-align:center;"><input size="30" type="text" readonly="readonly" value="<?php echo $st_items;?>" name="st_items"></td>
<td class=td1 style="text-align:center;"><input style="text-align:center;" size="6" type="text" readonly="readonly" value="<?php echo $unit;?>" name="unit"></td>
<td class=td1 style="text-align:center;"><input style="text-align:right;" readonly="readonly" size="8" type="text" value="<?php echo $min_stock;?>" name="min_stock"></td>
<td class=td1 style="text-align:center;"><input readonly="readonly" size="30" type="text" value="<?php echo $st_remark;?>" name="st_remark"></td>
<td class=td1 style="text-align:center;"><?php echo "<a href=\"items_edit.php?st_id=$st_id\">Edit</a>";?> &nbsp; <?php echo "<a href=\"items_delete.php?st_id=$st_id\">Delete</a>";?></td>
</tr>
<?php
}
}
?>
</table>
</body>
</html>
