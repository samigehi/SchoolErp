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

if (isset($_GET['user_id']) && $_SESSION['user_name'] == 'admin'){

include("connect.php");

$user_id = $_GET['user_id'];

$qP = "SELECT user_id, st_name FROM members WHERE user_id = '$user_id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$st_name = trim($st_name);

mysql_close();
?>

<br>
<table align="center" class=table1 style="text-align:center;">
<tr class=tr1>
<td class=td1>
<p align=center><b> You are deleting the record of : </b><label title="edit record"> <?php echo "<a href=\"update_show.php?user_id=$user_id\">$st_name</a>";?> </label></p>

<font color=red size=3>Are you sure?</font><br><br>

<font color=blue size=3><a href="deleted.php?user_id=<?php echo $user_id;?>"><b>Yes</b></a> &nbsp; &nbsp; -- &nbsp; &nbsp; <a href="index.php"><b>No</b></a></font>
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
