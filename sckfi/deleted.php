<?php
if (!isset($_SESSION)) {
session_start();
}
include("index.php");

if (isset($_GET['id'])) 
{
include("connect.php");

$id = $_GET['id'];

$delete = "DELETE FROM gathering_2014 WHERE id = '$id' ";
mysql_query($delete);
mysql_close();

if ($delete)
{
echo "Record deleted successfully.";
}

if (!$delete)
{
echo "<h3>Record not deleted successfully, error! </h3>";
}
}
?>
</body>
</html>
