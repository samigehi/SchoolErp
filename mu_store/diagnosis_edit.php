<html>
<head>
<title>Medical unit | Edit diagnosis </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include("index.php");

include ("connect.php");
$id = $_GET['id'];
$qP = "SELECT * FROM diagnosis_name WHERE id = '$id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$id = trim($id);
$di_name = trim($di_name);

?>
<h3>Add / Remove Diagnosis</h3>
<div class="contentB">
<div style="width:700px; margin:auto auto auto auto;">
<table class=table1>
<form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="form1">
<tr>
<th class=th1 style="width:2px;">ID</th>
<th class=th1 style="width:100px;"> Diagnosis Name </th>
<th class=th1 style="width:30px;"> Action </th>
</tr>
<tr>
<td class=td1 style="text-align:center; background-color:#FFCC66;"><input type="text" readonly=readonly size="5" name="id" value="<?php echo $id; ?>"></td>
<td class=td1><input type="text" name="di_name" size="40" value="<?php echo $di_name;?>"></td>
<td class=td1 style="text-align:center;"><input type="submit" name="submit" value="save"></td>
</tr>
</table>
</form>
</br>
</div>


<?php
if (isset($_GET['submit'])){
$id = $_GET['id'];
$di_name = trim($_GET['di_name']);
$edit = "UPDATE diagnosis_name SET di_name ='$di_name' WHERE id = '$id'";
$update = mysql_query($edit);
if($update)
{
header ("Location: diagnosis_add.php?id=$id");
}

if(!$update)
{
echo "Not Sucessfull!";
}
mysql_close();
}
?>
</body>
</html>
