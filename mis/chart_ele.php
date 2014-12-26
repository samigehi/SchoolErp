<html>
<head>
<title>electrical graph...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>
</head>
<?php
include("index.php");
?>
<body>
<div class=maintab>
<form method="post" action="graph_ele.php">
[ Electrical chart ] &nbsp; <b>From : </b><input style="text-align:center; background-color:#D4EDF7;" id="demo1" size="9" class="text1" type="text" name="fromdate" value="<?php echo $fromdate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/> &nbsp;

<b>To : </b><input style="text-align:center; background-color:#D4EDF7;" id="demo2" size="9" class="text1" type="text" name="todate" value="<?php echo $todate;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/> &nbsp;

&nbsp; <input type="submit" name="submit" value="Submit"> 
</form>
</div>
