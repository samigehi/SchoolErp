<html>
<head>
<title>Sports store : index</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<link href="css/menu2.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>		
</head>
<body bgcolor="#FFFFFF">
<h3>Sports</h3>

<div>
<?php
session_start ();
if($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'd.akshata' || $_SESSION['user_name'] == 'nspasarkar' || $_SESSION['user_name'] == 'avinash')
{
?>			
			<ul id="menu">	
			<li><a href="index.php">Home</a><li>
			<li><a href=stock.php>Stock</a></li>
			<li><a href="#">Purchase</a>
			<ul>
			<li><a href="purchase.php">New Purchase</a></li>
			<li><a href=details_purchase.php>Purchase details</a></li>
			<li><a href=items_add.php>Add items</a></li>
			<li><a href=supplier_add.php>Add supplier</a></li> 	
			</ul>
			</li>
			<ul>
			<li><a href="#">Issue</a>
			<ul>
			<li><a href="issue.php">New Issue</a></li>
			<li><a href=details_issue.php>Issue details</a></li>
			<li><a href=customer_add.php>Add customer</a></li>						
			</ul>
			</li>			
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




