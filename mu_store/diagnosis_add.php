<html>
<head>
<title>medical unit daily report</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include("index.php");

include ("connect.php");
?>
<h3>Add / Remove Diagnosis</h3>
<div class="contentB">
<div style="width:700px; margin:auto auto auto auto;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="form1">
<table class=table1>
<tr><td class=td1> Add New Diagnosis: </td><td class=td1><input type="text" name="di_name" size="40" value=""> &nbsp; <input type="submit" name="submit" value="Add"></td>
</table></form>

<table class=table1>
<tr>
<th class=th1 style="width:5px;">ID</th>
<th class=th1 style="width:70px;"> Diagnosis Name </th>
<th class=th1 style="width:20px;"> Action </th>
</tr>
<?php
$query = "SELECT id, di_name FROM diagnosis_name ORDER BY di_name";
$data = mysql_query($query);

while($result = mysql_fetch_array( $data ))	
	{
$id = $result['id']; 
$di_name = $result['di_name'];
?>
<tr>
<td class=td1 style="text-align:center;"><b><?php echo $id; ?></b></td>
<td class=td1><?php echo "<a href=\"diagnosis_edit.php?id=$id\">$di_name</a>";?></td>
<td class=td1 style="text-align:center;"><?php echo "<a href=\"diagnosis_edit.php?id=$id\">Edit</a>";?> &nbsp; &nbsp; <?php echo "<a href=\"diagnosis_delete.php?id=$id\">Delete</a>";?></td>
</tr>
<?php
}
mysql_close();
?>
</table>
</br>
</div>

<?php
if (isset($_POST['submit'])){
include ("connect.php");

$di_name = trim($_POST['di_name']);

$query = "INSERT INTO diagnosis_name (di_name) VALUES ('".$di_name."')";
$results = mysql_query($query);

if($results)
{
header ("Location: diagnosis_add.php");
}
if(!$results)
{
echo "Not Sucessfull!";
}
mysql_close();
}
?>
</body>
</html>
