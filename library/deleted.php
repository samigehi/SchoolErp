<html>
<head>
<title>Book deleted</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 

include("../library/index.php");
include("../library/connect.php");

$id = $_GET['id'];

$delete = "DELETE FROM books WHERE id = '$id' ";
mysql_query($delete);
mysql_close();

if ($delete){
echo "
<table align='center' class='table2' style='text-align:center; height:100px; width:400; padding:20px;'>
<td class=td1>
<p style='font-weight:bold; color:red; font-size:13px; text-align:center; background-color:yellow;'>Book is deleted successfully</p>
</div>
</td>
</table>
";
}

if (!$delete)
{
echo "<h3>Record not deleted successfully, error! </h3>";
}
?>
</body>
</html>
