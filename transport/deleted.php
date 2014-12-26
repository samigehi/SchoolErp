<html>
<head>
<title>leave deleted</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip')
{

if (isset($_GET['leave_id'])){

$leave_id = $_GET['leave_id'];

include("connect.php");

$query = "Delete from leave_app where leave_id = '$leave_id'";

$results = mysql_query($query);

if ($results){
header ("Location: admin_leave_details.php");
}

if (!$results){
echo "Record not deleted successfully";
}
}
}
?>

</body>
</html>
