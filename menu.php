<?php
include ('login/dbc.php');
page_protect();
?>

<html>
<head>
<title>Main menu</title>
<meta http-equiv="description" content="" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="new.css" rel="stylesheet" type="text/css"/>
   <link rel="stylesheet" href="leftmenu.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
</head>
<body class="body_new">
<div id="cssmenu" style="overflow:auto; height:80%;">
<ul>
<li><a href="login/logout.php" target="_parent" ><b><span><font color=darkred>Logout</font></span></b></a></li>
<li><a href="myaccount.php" target="main"><span>My Account</span></font></a></li>
<li><a href="intranet/" target="_blank"><span>Intranet</span></font></a></li>

<li class='active has-sub'><a href="#"><span>Student</span></a>
<ul>
<?php
if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_level'] == '2' || $_SESSION['user_level'] == '4')
{
?>
<li><a href="std_2014-15/index.php" target="main"><span>Student info</span></a></li>
<?php
}

if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_name'] == 'd.akshata' || $_SESSION['user_name'] == 'k.vinayak' || $_SESSION['user_name'] == 'pusha')
{
?>
<li><a href="attend" target="main"><span>Student attendance</span></a></li>
<?php
}

if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_level'] == '2') 
{
?>
<li><a href="crm_2014-15_spr/" target="main"><span>CRM</span></a></li>
<li><a href="report_writing/index_main.php" target="main"><span>Report Writing</span></a></li>
<?php
}

if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_name'] == 'office') 
{
?>
<li><a href="alumni/index.php" target="main"><span>Alumni</span></a></li>
<li><a href="CAD/" target="main"><span>CAD</span></a></li>
<?php
}
?>
</li>
</ul>

<li class='active has-sub'><a href="#">Staff</a>
<ul>
<?php
if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_name'] == 'office' || $_SESSION['user_name'] == 'dilip')
{
?>
<li><a href="staff" target="main"><span>Staff info</span></a></li>
<?php
}

if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_level'] == '2' || $_SESSION['user_level'] == '4')
{
?>
<li><a href="leave_app" target="main"><span>Staff leave</span></a></li>
<?php
}
if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_name'] == 's.sandip' || $_SESSION['user_name'] == 'office') 
{
?>
<li><a href="cv_app/index.php" target="main"><span>CV Management</span></a></li>
<?php
}
?>
</ul>
</li>

<li class='active has-sub'><a href="#"><span>Admin Management</span></a>
<ul>
<?php
if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_name'] == 'avinash' || $_SESSION['user_name'] == 'nspasarkar')
{
?>
<li><a href="maint_store" target="main"><span>Maintenance</span></a></li>
<li><a href="general_store" target="main"><span>General</span></a></li>
<li><a href="stationery_store" target="main"><span>Stationery</span></a></li>
<?php
}

if ($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_name'] == 'nspasarkar' || $_SESSION['user_name'] == 'd.akshata' || $_SESSION['user_name'] == 'avinash')
{?>
<li><a href="sports_store" target="main"><span>Sports</span></a></li>
<?php
}

if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_name'] == 'jdeepak' || $_SESSION['user_name'] == 'nspasarkar')
{
?>
<li><a href="textbook" target="main"><span>Textbook</span></a></li>
<?php
}

if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_name'] == 'siraj' || $_SESSION['user_name'] == 'nspasarkar') 
{
?>
<li><a href="tkshop_2014_15/index.php" target="main"><span>Tuckshop</span></a></li>
<?php
}

if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_name'] == 'dsangita' || $_SESSION['user_name'] == 'rkulkarni' || $_SESSION['user_name'] == 'nspasarkar')
{
?>
<li><a href="dhall" target="main"><span>Dining Hall Store</span></a></li>
<?php
}

if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_name'] == 'avinash')
{
?>
<li><a href="gatepass" target="main"><span>Gatepass</span></a></li>
<?php
}

if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_name'] == 'avinash') 
{
?>
<li><a href="mis" target="main"><span>Electrical MIS</span></a></li>
<?php
}

if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_name'] == 'smanjani') 
{
?>
<li><a href="scbooks" target="main"><span>Study centre Books</span></a></li>
<?php
}

if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_name'] == 'v.pradnya' || $_SESSION['user_name'] == 'bchetana' || $_SESSION['user_name'] == 'kkavita')
{
?>
<li><a href="mu_store" target="main"><span>Medical store</span></a></li>
<?php
}

if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_name'] == 'nspasarkar') 
{
?>
<li><a href="computers" target="main"><span>Computers & Networks</span></a></li>
<?php
}
?>
</ul>
</li>
<li><a href="maint" target="main"><span>CSR</span></a></li>
<li><a href="library/index_main.php" target="main"><span>Library</span></a></li>
<li><a href="transport/" target="main"><span>Transport</span></a></li>

<?php
if($_SESSION['user_level'] == '1'  ||  $_SESSION['user_name'] == 'demotest' || $_SESSION['user_name'] == 'nspasarkar' || $_SESSION['user_name'] == 'smanjani') 
{
?>
<li class='last'><a href="sckfi" target="main"><span>Gathering-2014</span></a></li>
<?php
}
?>
</ul>
</div>

</body>
</html>
