<?php

function logout()
{
session_start();

/************ Delete the sessions****************/
unset($_SESSION['username']);
session_unset();
session_destroy(); 
header("Location: login.php");
}

logout();
?>
