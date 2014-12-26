<?php
include("index.php");
include("connect.php");

$gatepass_id = $_POST['gatepass_id'];
$field = $_POST['field'];
$find = $_POST['find'];
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];
$in_driver_name = $_POST['in_driver_name'];
$in_vehicle_no = $_POST['in_vehicle_no'];
$status = $_POST['status'];
$in_date = $_POST['in_date'];

if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{
$updated_by = $_SESSION['user_name'] ;
}
$updated_by_host = $_SERVER['REMOTE_ADDR'].''.$_SERVER['HTTP_X_FORWARDED_FOR'];

$update = "UPDATE gatepass SET in_driver_name = '$in_driver_name', in_vehicle_no = '$in_vehicle_no', status = '$status', in_date = '$in_date', updated_by = '$updated_by', updated_by_host = '$updated_by_host' WHERE gatepass_id = '$gatepass_id'";

$rsUpdate = mysql_query($update);

if ($rsUpdate)
{
header ("Location: search.php?field=$field&find=$find&fromdate=$fromdate&todate=$todate");
}
if (!$rsUpdate)
{
echo "<h3>Record not Updated successfully, error!</h3>";
}
mysql_close();
?>
</body>
</html>
