<html>
<head>
<title>CAD</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/menu.js"></script>
<script src="calendar/datetimepicker_css.js"></script>
<script type="text/javascript">
  var win=null;
  function printIt(printThis)
  {
    win = window.open();
    self.focus();
    win.document.open();
    win.document.write('<'+'html'+'><'+'head'+'><'+'style'+'>');
    win.document.write('body { font-family: Verdana; font-size: 11px;}');
    win.document.write('table {font-family:verdana,arial,sans-serif; margin:auto auto auto auto; width:98%; font-size:11px; color:#333333; border-collapse: collapse;}');
    win.document.write('td {border-width:1px; padding:5px; border-style:solid; border-color:#999999;}');
    win.document.write('th {border-width:1px; padding:5px; border-style:solid; border-color:#999999;}');
    win.document.write('input {font-family: Verdana; font-size: 10px; border:0px; }');
    win.document.write('select {font-family: Verdana; font-size: 10px; border:0px; }');
    win.document.write('textarea {font-family: Verdana; font-size: 10px; border:0px; }');
    win.document.write('<'+'/'+'style'+'><'+'/'+'head'+'><'+'body'+'>');
    win.document.write(printThis);
    win.document.write('<'+'/'+'body'+'><'+'/'+'html'+'>');
    win.document.close();
    win.print();
    win.close();
  }
</script>
</head>
<body>
<h4>CAD </h4>
<?php
if (!isset($_SESSION)) {
session_start();
}
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == 'demotest') 
{
if (!isset($_GET['find'])){
$field = '';
$find = '';
}

if (isset($_GET['find'])){
$field = $_GET['field'];
$find = $_GET['find'];
}
?>

<div class=maintab>
<form name="search" action="search.php" method="GET">
Search By :
<Select NAME="field">
<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="st_name" <?php if($field == "st_name") echo "selected"; ?>>Name</option>
<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="class" <?php if($field == "class") echo "selected"; ?>>Class</option>
<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="admn_status" <?php if($field == "admn_status") echo "selected"; ?>>Status</option>
<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="email" <?php if($field == "email") echo "selected"; ?>>Email</option>
<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="nri" <?php if($field == "nri") echo "selected"; ?>>NRI</option>
<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="recd_date" <?php if($field == "recd_date") echo "selected"; ?>>Application Date</option>
<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="city" <?php if($field == "city") echo "selected"; ?>>City</option>
<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="state" <?php if($field == "state") echo "selected"; ?>>State</option>	
<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="country" <?php if($field == "country") echo "selected"; ?>>Country</option>
</Select> &nbsp;
	Enter : <input type="text" size="25" name="find" value = "<?php echo $find;?>"/>
	<input type="submit" name="search" value="Search" />

	<?php
	if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
	{
	?>
<?php
}
?>
<input type="button" name="new_student" value="Add Form" onclick="window.location='add.php'"> &nbsp; 
</form>
</div>
		
</div>
</div>
<div class="clear"></div>
</div>

<hr color=lightgray size=1>
<?php
}
else
{
echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
}
?>
</body>
</html>




