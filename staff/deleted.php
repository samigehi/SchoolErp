<html>
<head>
<title>deleted record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../staff/css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 

include("index.php");

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip' || $_SESSION['user_name'] == 'office')
{
include("connect.php");

$id = $_GET['id'];

$delete = "DELETE FROM staff WHERE id = '$id' ";
mysql_query($delete);
mysql_close();

if ($delete)
{
header ("Location: index.php");
}

if (!$delete)
{
echo "<h3>Record not deleted successfully, error! </h3>";
}
}
?>
</body>
</html>
