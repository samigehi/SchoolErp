<html>
<head>
<title>delete record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../std/css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("../std/index.php");
if ($_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == 'adminoff' || $_SESSION['user_name'] == 'office')
{
include("../std/connect.php");

$id = $_GET['id'];

$qP = "SELECT * FROM name WHERE id = '$id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$name = trim($name);

mysql_close();
?>

<br>
<table align="center" class=table2 style="text-align:center;">
<td class=td1>
<p align=center> You are deleting the record : <label title="edit record"> <?php echo "<a href=\"update.php?id=$id\">$name</a>";?> </label></p>

<font color=red size=3>Are you sure?</font><br><br>

<font color=blue size=3><a href="deleted.php?id=<?php echo "$id" ?>"><b>Yes</b></a> &nbsp; &nbsp; -- &nbsp; &nbsp; <a href="javascript: window.history.go(-1)"><b>No</b></a></font>

</td>
</table>
<?php
}
?>
</div>
</body>
</html>
