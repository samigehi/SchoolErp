<?php
include ('../login/dbc.php');
page_protect();
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'admin')
{?>

<html>
<head>
<title>Report Writing :: Spring Term 2014-15</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<link href="css/menu2.css" rel="stylesheet" type="text/css" />
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
    win.document.write('input {font-family: Verdana; font-size: 10px; width:250px; border:0px; }');
    win.document.write('select {font-family: Verdana; font-size: 10px; width:200px; border:0px; }');
    win.document.write('textarea {font-family: Verdana; font-size: 10px; width:250px; border:0px; }');
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

<?php
if (!isset($_POST['find'])){
$find = '';
}

if (isset($_POST['find'])){
$find = $_POST['find'];
}
?>

<h3>Report Writing :: Spring Term 2014-15</h3>
<div class=maintab>
<form name="search" action="search.php" method="GET">
<input placeholder="search" type="text" name="find" value="<?php echo $find;?>"/></div><div class=maintab>
<input type="image" src="images2/search.gif" style="border:1px; background-color:orange; padding:3px;" title="Search" alt="Submit">
&nbsp; &nbsp; &nbsp; &nbsp;
</form> 
</div> 

<?php
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{
?>
			<ul id="menu">	
			<li><a href="index_main.php">Home</a><li>
			<li><a href="edit.php">Write</a><li>
			<li><a href="#">View Reports</a>
			<ul>
			<li><a href="view_sub.php">Subject >></a><li>
			<li><a href="view_std.php">Student >></a><li>
			</ul>
			</li>
			<li><a href="#.php">Configuration</a>
			<ul>
			<li><a href="assign_editor.php">Assign Editor</a><li>
			<li><a href="assign_date.php">Assign Date</a><li>
			</ul>
			</li>
			</ul>			
			</div>					
			<div class="clear"></div>
			</div>
			<hr color=lightgray size=1>
<?php			
}
else
{
echo "<br><p align=center><font color=red>No Access! Please contact administrator</font></p>";
}
}
?>
</body>
</html>
