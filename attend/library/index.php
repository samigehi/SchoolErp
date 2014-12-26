<?php

include ('../login/dbc.php');
page_protect();

if ($_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == 'k.vinayak')
{?>

<html>
<head>
<title>Searching for Record...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../av_records/css/new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>
<script type="text/javascript" src="../av_records/js/menu.js"></script>
</head>
<body>

<h3>AV Records</h3>
<div class=maintab>
<form name="search" action="search.php" method="post">

	Search by : 
	<Select NAME="field">
	<option style="margin:5px; padding-left: 10px; color:black;" class=red VALUE="">- Select -</option> 
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="st_name">Name</option>
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="st_adm">Adm No</option>
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="st_class">Class</option>
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="st_area">Area</option>
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="st_house">Dorm</option>

	</Select> &nbsp;

	Enter : <input type="text1" size="20" name="find" /> &nbsp; 
        From : <input style="text-align:center; background-color:#D4EDF7;" type="text1" id="inputField5" size="10" value="<?php echo date('Y-m-d');?>" name="fromdate" /> &nbsp; 
	
	To : <input style="text-align:center; background-color:#D4EDF7;" type="text1" id="inputField6" size="10" value="<?php echo date('Y-m-d');?>" name="todate" /> &nbsp; 	

	<input type="hidden" name="searching" value="yes" />
	<input type="submit" name="search" value="Search" /> &nbsp;

<input type="button" name="New Record" value="New Record" onclick="window.location='../av_records/add.php'"> &nbsp; 
</form>
</div>

<?php

if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{

echo "
			<div style='float:left; margin-top:2px;'>
			<div class=sidebarmenu>
			<ul id=sidebarmenu1>
			<li><a href=#>&nbsp; See Summary &nbsp;-></a>
			<ul>
			<li><a href=../av_records/datarange.php>&nbsp; Summary</a></li>
			<li><a href=exportxls.php>&nbsp; Export to excel</a></li>
			</ul> 
			</div>
			</div>";
			}?>
<div class="clear"></div>
</div>
<hr color=lightgray size=1>
&nbsp; &nbsp;<a href='javascript:history.go(-1)'><b><u><< Back</u></b></a>
<?php			
}
else
{
echo "<br><p align=center><font color=red>No Access! Please contact administrator</font></p>";
}
?>
</body>
</html>




