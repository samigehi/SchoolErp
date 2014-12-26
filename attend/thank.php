<html>
<head>
<title>Add New complaint</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../attend/new.css" rel="stylesheet" type="text/css" />
<script type = "text/javascript" >

window.history.forward();
</script>
</head>
<body>

<?php
include("../attend/index.php");
include("../attend/connect.php");

?>

<div align=center>
<?php
$id = $result['Id'];

echo "<input type='button' value='Edit' onclick=window.location.href=\"../medical/update.php?Id=$id\">"; 

echo "&nbsp &nbsp &nbsp";

echo "<input type='button' value='Delete' onclick=window.location.href=\"../medical/delete.php?Id=$id\">";

?>
</div>

</div>
</div>
</div>
<p class=new> To new attendance, please <a href=../attend/add.php><font color = blue><b> click here </b></font></a></p>
</div>

</body>
</html>
