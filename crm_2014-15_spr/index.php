<?php
include ('../login/dbc.php');
page_protect();
if ($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2' || $_SESSION['user_name'] == 'v.pradnya' || $_SESSION['user_name'] == 'milindm' )
{?>

<html>
<head>
<title>CRM :: Spring Term 2014-15</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<link href="css/menu2.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
if (!isset($_POST['find'])){
$find = '';
}

if (isset($_POST['find'])){
$find = $_POST['find'];
}
?>

<h3>CRM :: Spring Term 2014-15</h3>
<div class=maintab>
<form name="search" action="search.php" method="GET">
<input placeholder="search" type="text" name="find" value="<?php echo $find;?>"/> </div> <div class=maintab>
	<input type="image" src="images2/search.gif" style="border:1px; background-color:orange; padding:3px;" title="Search" alt="Submit">
	&nbsp; &nbsp; &nbsp; &nbsp;
</form> 
</div> 

<?php
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{
?>
			<ul id="menu">	
			<li><a style="background-color:#CC3333;" href="edit.php">Write</a><li> &nbsp; &nbsp; &nbsp;
<li><a style="color:white; background-color:green;" href="../crm_2013-14_mon/" target="_blank">Monsoon term_2013-14</a></li>
<li><a style="color:white; background-color:green;" href="../crm_2013-14_spr/" target="_blank">Spring term_2013-14</a></li>
<li><a style="color:white; background-color:green;" href="../crm_2014-15_mon/" target="_blank">Monsoon term_2014-15</a></li>	
			</ul>			
			</div>					
			<div class="clear"></div>
			</div>
			<hr color=lightgray size=1>
<?php			
}
}
else
{
echo "<br><p align=center><font color=red>No Access! Please contact administrator</font></p>";
}
?>
</body>
</html>
