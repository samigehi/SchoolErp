<html>
<head>
<title>Searching for complaint...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/menu.js"></script>
<script src="calendar/datetimepicker_css.js"></script>
</head>
<body bgcolor="#FFFFFF">

<h3>Complaints / Suggestions / Requests</h3>

<div class=maintab>
<form name="search" action="search.php" method="post">
	<b>Select Criterion Here :</b>
	<Select NAME="field">
	<option style="margin:5px; padding-left: 10px; color:darkblue;" class=red VALUE="">---- Select ----</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="id">Com / Sug / Req No.</option> 
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="compldate">Com / Sug / Req Date</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="name">Name</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="location">Location</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="department">Department</option>
	</Select>
	<b>Enter : </b><input type="text" name="find" />
	<input type="hidden" name="searching" value="yes" />
	<input type="submit" name="search" value="Search" />

<input type="button" name="New complaint" value="New C.S.R." onclick="window.location='add.php'"> &nbsp; 
</form>
</div>

<?php
session_start ();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) 
{
echo "
			<div style='float:left; margin-top:1px;'>
			<div class=sidebarmenu>
			<ul id=sidebarmenu1>
			<li><a href=#>&nbsp; C.S.R. Summary &nbsp;-></a>
			<ul>
		   	<li><a href=datarange.php>&nbsp; From - To </a></li>
			<li><a href=compl_status.php>&nbsp; By Status</a></li>
			</ul> 
			</div>
			</div>";
			}
			?>
<div class="clear"></div>
</div>
<hr color=lightgray size=1>
</body>
</html>




