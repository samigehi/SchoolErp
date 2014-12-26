<html>
<head>
<title>deleted record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../attend/css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 

include("../attend/index.php");
include("../attend/connect.php");

$id = $_POST['id'];

$delete = "DELETE FROM attend WHERE id = '$id' ";
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

<br><br>
<p> To go back main page, please <a href=../attend/index.php><font color=blue>click here</font></a></p> 
<hr align=center style="margin-top:-17px;" width=60% color=orange size=1>
</div>
<br>
<br>

</body>
</html>

