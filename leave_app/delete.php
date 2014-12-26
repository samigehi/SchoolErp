
<html>
<head>
<title>delete record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip'){

if (isset($_GET['leave_id'])){

include("connect.php");

$leave_id = $_GET['leave_id'];

$qP = "SELECT leave_id, staff_name FROM leave_app WHERE leave_id = '$leave_id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);
$leave_id = trim($leave_id);
$staff_name = trim($staff_name);

mysql_close();
?>

<br>
<table align="center" class=table1 style="text-align:center;">
<tr class=tr1>
<td class=td1>
<p align=center><b> You are deleting the record of : </b><label title="edit record"> <?php echo "<a href=\"update.php?leave_id=$leave_id\">$staff_name</a>";?> </label></p>

<font color=red size=3>Are you sure?</font><br><br>

<font color=blue size=3><a href="deleted.php?leave_id=<?php echo $leave_id;?>"><b>Yes</b></a> &nbsp; &nbsp; -- &nbsp; &nbsp; <a href="index.php"><b>No</b></a></font>
</td>
</tr>
</table>
</div>
<?php
}
}
else
{
echo "<div style='text-align:center; color:red;'>You do not have the right to delete the records. Please contact the administrator.</div>";
}
?>
</body>
</html>
