<html>
<head>
<title>Searching for books...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<link href="new.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../library/js/menu.js"></script>
</head>
<body>
<h3 class="index">Books Search</h3>
<div class=maintab>
<form name="search" action="search.php" method="post">

	Search Book by : 
	<Select NAME="field">	
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="title">Title</option>
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="id">Id</option>	
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="author">Author</option>
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="class_no">Class No.</option>
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="keywords">Keywords</option>
	<Option style="margin:5px; padding-left: 10px; color:black;" class=pink VALUE="status">Status</option>
	</Select> &nbsp;

	Enter : <input type="text1" size="30" name="find" /> &nbsp; 

	<input type="hidden" name="searching" value="yes" />
	<input type="submit" name="search" value="Search" /> &nbsp;

	<?php
	session_start ();
	if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
	{
	?>
	<input type="button" name="add" value="Add New Book" onclick="window.location='add.php'"> &nbsp;
	<?php
	}
	?>

</form>
</div> 

<?php
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ) 
{
?>
<input type="button" name="add" value="Issue / Return details" onclick="window.location='issue_details.php'"> &nbsp;
<a href="http://fileserver/library/request_show.php">View Request</a> &nbsp; 
<?php
}
?>
<a href="http://fileserver/library/book_request.php">Request a new Book</a>
</div>
<div class="clear"></div>
</div>
<a href="books_xls.php">Export xls</a>
<hr color=lightgray size=1>
</body>
</html>




