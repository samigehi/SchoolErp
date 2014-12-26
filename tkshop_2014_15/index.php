<html>
<head>
<title>tkshop : index</title>
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
<h3>TuckShop Inventory :: 2014-15</h3>

<div>
<?php
session_start ();
if($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'siraj' || $_SESSION['user_name'] == 'nspasarkar')
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
			<li><a href="../tkshop_2013_14/index.php">2013-14</a>
			<ul>			
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




