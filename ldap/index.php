<?php
include ('dbc.php');
page_protect();
?>

<html>
<head>
</head>

<body>
<?php

if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{

$user_id = $_SESSION['user_id']; 
$user_name = $_SESSION['user_name'];
$access = $_SESSION['user_level'];

echo "username : ".$user_id; 

echo "<br><br>";
echo "username :".$user_name;

echo "<br><br>access level :".$access."<br><br>";

echo $_SESSION['start_time'];

echo "<br><br>11 down vote
Is this to log the user out after a set time? Setting the session creation time (or an expiry time) when it is registered, and then checking that on each page load could handle that.";

}
?>
<br>
&nbsp; <a href="logout.php" title="logout"><font color="darkred">logout</font></a>

</body>
</html>
