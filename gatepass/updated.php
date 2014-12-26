
<?php
include("index.php");
include("connect.php");

$gatepass_id = $_POST['gatepass_id'];
$field = $_POST['field'];
$find = $_POST['find'];
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];
$gatepass_date = $_POST['gatepass_date'];
$gatepass_no = $_POST['gatepass_no'];
$driver_name = $_POST['driver_name'];
$vehicle_no = $_POST['vehicle_no'];
$prepaired_by = $_POST['prepaired_by'];
$authorised_by = $_POST['authorised_by'];
$items_name = $_POST['items_name'];
$items_qty = $_POST['items_qty'];
$from_dept = $_POST['from_dept'];
$going_to = $_POST['going_to'];
$party_contact = $_POST['party_contact'];
$return_able = $_POST['return_able'];
$reason = $_POST['reason'];
$status = $_POST['status'];
$in_date = $_POST['in_date'];
$in_driver_name = $_POST['in_driver_name'];
$in_vehicle_no = $_POST['in_vehicle_no'];

if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{
$updated_by = $_SESSION['user_name'] ;
}
$updated_by_host = $_SERVER['REMOTE_ADDR'].''.$_SERVER['HTTP_X_FORWARDED_FOR'];

$update = "UPDATE gatepass SET gatepass_date = '$gatepass_date', gatepass_no = '$gatepass_no', driver_name = '$driver_name', vehicle_no = '$vehicle_no', prepaired_by = '$prepaired_by', authorised_by = '$authorised_by', items_name = '$items_name', items_qty = '$items_qty', from_dept = '$from_dept', going_to = '$going_to', party_contact = '$party_contact', return_able = '$return_able', reason = '$reason', status = '$status', in_date = '$in_date', in_driver_name = '$in_driver_name', in_vehicle_no = '$in_vehicle_no', updated_by = '$updated_by', updated_by_host = '$updated_by_host' WHERE gatepass_id = '$gatepass_id'";

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
