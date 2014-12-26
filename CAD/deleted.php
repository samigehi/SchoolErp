<?php
include("index.php");

if (isset($_GET['cad_id'])) 
{
include("connect.php");

$cad_id = $_GET['cad_id'];

$delete = "DELETE FROM cad_app WHERE cad_id = '$cad_id' ";
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
