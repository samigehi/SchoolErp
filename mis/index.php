<html>
<head>
<title>electrical dept...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/menu.js"></script>
<script src="calendar/datetimepicker_css.js"></script>
</head>
<body>
<h3>Electrical Department</h3>

<?php
include ('../login/dbc.php');
page_protect();

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'avinash')
{
if (!isset($_GET['fromdate'])){
$fromdate = date('Y-m-d');
$todate = date('Y-m-d');
}
if (isset($_GET['fromdate'])){
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
}
?>
<div class=maintab>
<form name="search" action="search.php" method="GET">
	<b>Insert the date here :</b> &nbsp; &nbsp;
	
	<b>From : </b>
<input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo3" readonly="readonly" name="fromdate" value="<?php echo $fromdate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo3','yyyyMMdd')" style="cursor:pointer"/>&nbsp; 

<b>To : </b><input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo4" readonly="readonly" name="todate" value="<?php echo $todate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo4','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<input type="hidden" name="searching" value="yes" />
<input type="submit" name="go" value="Go" /> &nbsp; &nbsp;

<input type="button" name="enter data" value="Enter Data" onclick="window.location='add.php'"> &nbsp; 
</form>
</div> 
			<div style="float:left; margin-top:1px;"> 
			<div class="sidebarmenu">
			<ul id="sidebarmenu1">
			<li><a href=#>&nbsp; MIS Summary &nbsp; -></a>
			<ul>
			<li><a href=today.php>&nbsp; Today's </a></li>
			<li><a href=chart_ele.php>&nbsp; Electricity Chart</a></li>
			<li><a href=chart_wat.php>&nbsp; Water Chart</a></li>
			</ul> 
			</div>

</div>
<div class="clear"></div>
</div>
<?php			
}
else
{
echo "<br><p align=center><font color=red>No Access! Please contact administrator.</font></p>";
}
?>
<hr color=lightgray size=1>
</body>
</html>
