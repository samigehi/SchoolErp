<?php
if (!isset($_SESSION)) {
session_start();
}
?>

<html>
<head>
<title>delete record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");

if (isset($_GET['id'])){

include("connect.php");

$id = $_GET['id'];

$qP = "SELECT id, name FROM gathering_2014 WHERE id = '$id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$name = trim($name);

mysql_close();
?>

<br>
<table align="center" class=table1 style="text-align:center;">
<tr class=tr1>
<td class=td1>
<p align=center><b> You are deleting the record of : </b><label title="edit record"> <?php echo "<a href=\"update_show.php?id=$id\">$name</a>";?> </label></p>

<font color=red size=3>Are you sure?</font><br><br>

<font color=blue size=3><a href="deleted.php?id=<?php echo $id;?>"><b>Yes</b></a> &nbsp; &nbsp; -- &nbsp; &nbsp; <a href="index.php"><b>No</b></a></font>
</td>
</tr>
</table>
</div>
<?php
}
else
{
echo "<div style='text-align:center; color:red;'>You do not have the right to delete the records. Please contact the administrator.</div>";
}
?>
</body>
</html>
