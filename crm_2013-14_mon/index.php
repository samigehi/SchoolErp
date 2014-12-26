<?php
include ('../login/dbc.php');
page_protect();
if ($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2' || $_SESSION['user_name'] == 'v.pradnya')
{?>

<html>
<head>
<title>CRM :: Monsoon Term 2013-14</title>
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

<h3>CRM :: Monsoon Term 2013-14</h3>
<div class=maintab>
<form name="search" action="search.php" method="GET">
<input placeholder="search" type="text" name="find" value="<?php echo $find;?>" /> </div> <div class=maintab>
	<input type="image" src="images2/search.gif" style="border:1px; background-color:orange; padding:3px;" title="Search" alt="Submit">
	&nbsp; &nbsp; &nbsp; &nbsp;
</form> 
</div> 
<?php
}
?>
</body>
</html>
