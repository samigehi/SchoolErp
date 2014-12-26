
<?php
include("index.php");
if (isset($_POST['save'])) {
include("connect.php");

$id = $_POST['id'];

//update new fields //

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

$update = "UPDATE books SET date = '$date', author = '$author', title='$escaped_title', edition = '$edition', place_publisher = '$place_publisher', status = '$status', class_no = '$class_no', year = '$year', pages = '$pages', volume = '$volume', source = '$source', isbn_no = '$isbn_no', bill_no = '$bill_no', cost = '$cost', keywords = '$keywords', remarks = '$remarks' WHERE id = '$id'";

$rsUpdate = mysql_query($update);

if ($rsUpdate)
{
header("Location: edit_show.php?id=$id");
}

if (!$rsUpdate)
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
