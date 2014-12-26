
<?php
include("index.php");
if (isset($_POST['submit']))
{
include("connect.php");
//Add new fields //

$date = trim($_POST['date']);
$author = trim($_POST['author']);
$title = trim($_POST['title']);

$escaped_title = mysql_escape_string($title);

$edition = trim($_POST['edition']);
$place_publisher = trim($_POST['place_publisher']);
$status = trim($_POST['status']);
$class_no = trim($_POST['class_no']);
$year = trim($_POST['year']);
$pages = trim($_POST['pages']);
$volume = trim($_POST['volume']);
$source = trim($_POST['source']);
$isbn_no = trim($_POST['isbn_no']);
$bill_no = trim($_POST['bill_no']);
$cost = trim($_POST['cost']);
$keywords = trim($_POST['keywords']);
$remarks = trim($_POST['remarks']);

$query = "INSERT INTO books (date, author, title, edition, place_publisher, status, class_no, year, pages, volume, source, isbn_no, bill_no, cost, keywords, remarks) VALUES ('$date', '$author', '$escaped_title', '$edition', '$place_publisher', '$status', '$class_no', '$year', '$pages', '$volume', '$source', '$isbn_no', '$bill_no', '$cost', '$keywords', '$remarks')";

$rsquery = mysql_query($query);

if ($rsquery)
{
header("Location: add.php");
}

if (!$rsquery)
{ 
echo "Not Sucessful!";
}
}
?>

</div>
<div class="clear"></div>
</div>

</body>
</html>
