<html>
<head>
<title>tkshop : index</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<link href="css/menu2.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>		
</head>
<body bgcolor="#FFFFFF">
<h3>TuckShop Inventory :: 2013-14</h3>

<div>
<?php
session_start ();
if($_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == 'siraj' || $_SESSION['user_name'] == 'nspasarkar')
{
?>			
			
			<ul id="menu">	
			<li><a href="index.php">Home</a><li>
			<li><a href=stock.php>Stock</a></li>
			<li><a href="purchase.php">Purchase</a>
			<ul>
			<li><a href=details_purchase.php>Purchase details</a></li>
			<li><a href=items_add.php>Add items</a></li>
			<li><a href=supplier_add.php>Add supplier</a></li> 	
			</ul>
			</li>
			<ul>
			<li><a href="issue.php">Issue</a>
			<ul>
			<li><a href=details_issue.php>Issue details</a></li>
			<li><a href=details_issue_xls.php>Export to xls - For Tally</a></li>
			<li><a href=customer_add.php>Add customer</a></li>			
			</ul>
			</li>
			<ul>
			<li><a href="../tkshop_2014_15/index.php">2014-15</a>
			<ul>
			</div>
 
<?php
}
?>								
<div class="clear"></div>
</div>
<hr color=lightgray size=1>

</body>
</html>




