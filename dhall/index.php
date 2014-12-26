<html>
<head>
<title>DH Store : index</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<link href="css/menu2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/menu.js"></script>
<script src="calendar/datetimepicker_css.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="calendar/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="calendar/jsDatePick.min.1.3.js"></script>
			<script type="text/javascript">
			window.onload = function(){
			new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%Y-%m-%d"
			});
			new JsDatePick({
			useMode:2,
			target:"inputField_2",
			dateFormat:"%Y-%m-%d"
			});
			};
			</script>

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
<body bgcolor="#FFFFFF">
<h3>Dining Hall Store</h3>

<div>
<?php
session_start ();
if($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dsangita' || $_SESSION['user_name'] == 'nspasarkar')
{
?>			

			<div class="invertedshiftdown2" style="width:520px; float:left;">
			<ul>	
			<li><a href=purchase.php>Purchase</a></li>
			<li><a href=issue.php>Issue</a></li> 			
			<li><a href=stock.php>Stock</a></li>			
			<li><a href=get_purchase_order.php>Get Purchase Order</a></li>
			<li><a href=get_daily_demand.php>Get Daily Demand</a></li> 
			</ul>
			</div>
									
	<?php
	}
	if($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'rkulkarni')
	{
	?>		
			<div class="invertedshiftdown3" style="width:520px; float:right;">
			<ul>
			<li><a href=stock.php>Stock</a></li>			
			<li><a href=details_issue.php>Issue Details</a></li>			
			<li><a href=details_purchase.php>Purchase Details</a></li>
			<li><a href=daily_demand.php>Daily Demand Form</a></li>
			
			</ul>
			</div>

	<?php			
	}
	else
	{
	echo "<p align=center><font color=red>No Access! Please contact administrator.</font></p>";
	}
	?>

<div class="clear"></div>
</div>
<hr color=lightgray size=1>
</body>
</html>




