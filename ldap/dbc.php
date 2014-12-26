<?php
function page_protect() {
session_start();

if(!isset($_SESSION['user_name']))
{
header("Location: ../login/login.php");
}
else
{
$now = time(); // checking the time now when home page starts
$_SESSION['expire'] = $_SESSION['start_time'] + (15 * 60) ;
if($now > $_SESSION['expire'])
{
session_unset();
session_destroy();
header("Location: ../login/login.php?mess=expired");
}
else
{
$_SESSION['start_time']= time();// update last accessed time
}

}
}


function logout()
{
session_start();
/************ Delete the sessions****************/
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['user_level']);
unset ($_SESSION['start_time']);
session_unset();
session_destroy(); 
header("Location: login.php");
exit();
}
?>
