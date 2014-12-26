<?php
if (!isset($_SESSION)) {
session_start();
}
include("index.php");

if (isset($_GET['user_id']) && $_SESSION['user_name'] == 'admin') 
{
include("connect.php");

$user_id = $_GET['user_id'];

$delete = "DELETE FROM members WHERE user_id = '$user_id' ";
mysql_query($delete);
mysql_close();

if ($delete)
{
echo "Record deleted successfully";
}

if (!$delete)
{
echo "<h3>Record not deleted successfully, error! </h3>";
}
}
?>
</body>
</html>
