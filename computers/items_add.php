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
if ($_SESSION['user_level'] == '1'|| $_SESSION['user_name'] == 'admin')
{
?>

<!-------------------------------------------------------- TYPE ----------------------------------------------------->
<table class=table1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<tr>
<th class=th1 style="text-align:center;"><b>Name of the Item</b></th>
<th class=th1 style="text-align:center;"><b>MRP</b></th>
<th class=th1 style="text-align:center;"><b>Unit</b></b></th>
<th class=th1 style="text-align:center;"><b>Min Stock</b></b></th>
<th class=th1 style="text-align:center;"><b>Remark</b></b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="30" type="text" value="" name="st_items"></td>
<td class=td1 style="text-align:center;"><input style="text-align:right;" size="10" name="sell_rate" type="text" value="0"></td>

<td class=td1 style="text-align:center;"><SELECT NAME="unit">
<option style="margin:2px; padding-left:10px;" value="nos">nos</option>
<option style="margin:2px; padding-left:10px;" value="g">g</option>
<option style="margin:2px; padding-left:10px;" value="kg">kg</option>
<option style="margin:2px; padding-left:10px;" value="ltrs">ltrs</option>
</select></td>

<td class=td1 style="text-align:center;"><input style="text-align:right;" size="8" type="text" value="" name="min_stock"></td>

<td class=td1 style="text-align:center;"><input size="30" type="text" value="" name="st_remark"></td>
</tr>

</table>
<br>
<div align=center>
<input type="submit" name="submit" value="Add"> &nbsp; <input type="button" value="cancel" onclick="window.location='javascript:history.back()'">
<hr style="margin-top:2px;" width=30% color=orange size=1>
</div>
</form>


<?php
if (isset($_POST['submit'])){

include ("connect.php");

$st_items = mysql_escape_string($_POST['st_items']);
$sell_rate = $_POST['sell_rate'];
$unit = $_POST['unit'];
$min_stock = $_POST['min_stock'];
$st_date = date("Y-m-d");
$st_remark = $_POST['st_remark'];

$data_st = "INSERT INTO comp_stock (st_items, st_date, unit, sell_rate, min_stock, st_remark) VALUES ('$st_items', '$st_date', '$unit', '$sell_rate', '$min_stock', '$st_remark')";

$add_st = mysql_query($data_st);

mysql_close();

if($add_st)
{
header ("Location: items_add.php");
}

if(!$add_st)
{
include ("index.php");
echo mysql_error(); echo "<br><b><a href='items_add.php'>Please try again!</a></b>"; 
}
}
}
?>
</body>
</html>
