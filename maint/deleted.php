<html>
<head>
<title>deleted record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../maint/css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
include ('../login/dbc.php');
page_protect();

include("../maint/index.php");
include("../maint/connect.php");

$id = $_GET['id'];

$delete = "DELETE FROM maint WHERE id = '$id' ";
mysql_query($delete);
mysql_close();

$date = date("d-M-Y");
$time = date("H:i:s A");
?>
<br><hr size="1" color="lightgray">
<div style="align: left; margin-left:25em; width:550px; height:200px; background-color:#FDF5E6; border:1px solid #98AFC7; margin-right:50px;">
<div class="contentA">

<? echo "<p class=new>Entry is deleted successfully for the No : <font color=white> $id </font></p>"?>
<br>
<div align=center>
<? echo "$date, $time";?>

<?php
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

