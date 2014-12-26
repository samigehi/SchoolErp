<html>
<head>
</head>
<body>

<?php
session_start();

$username = $_SESSION['username'];
echo $username;
?>

<li class=li_new><a href="logout.php" target="_parent" ><b>Logout</b></a></li>

</body>
</html>
