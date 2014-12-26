<html>
<head>
<title>deleted record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 

include("index.php");
include("connect.php");

$id = $_GET['id'];

$delete = "DELETE FROM ele_mis WHERE id = '$id' ";
mysql_query($delete);
mysql_close();

if ($delete)
{?>
<script type="text/javascript">
window.history.go(-2);
</script>
<?php
}
?>

</body>
</html>

