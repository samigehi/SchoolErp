
<?php
include("index.php");

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'amruta' || $_SESSION['user_name'] == 'shikha')
{

if (isset($_POST['issue'])) {
include("connect.php");

//posted data from issue.php//
$issued = trim($_POST['issued']);
$issue_time = date("h:i:s");
$issue_date = trim($_POST['issue_date']);
$to_be_return = trim($_POST['to_be_return']);
$book_id = trim($_POST['book_id']);
$book_author = trim($_POST['book_author']);
$book_name = trim($_POST['book_name']);
$staff_name = trim($_POST['staff_name']);

//insert data to books_issue table//
$query = "INSERT INTO books_issue (issue_date, to_be_return, issue_time, book_id, book_author, book_name, staff_name, status) VALUES ('$issue_date', '$to_be_return', '$issue_time', '$book_id', '$book_author', '$book_name', '$staff_name', '$issued')";
$rsquery = mysql_query($query);

//update data to main books table// 
$update = "UPDATE books SET status = 'Issued', staff_name = '$staff_name', issue_date = '$issue_date' WHERE id = '$book_id'";
$rsUpdate = mysql_query($update);


if ($rsquery)
{
header("Location: edit_show.php?id=$book_id");
}

if (!$rsquery)
{ 
echo "Not Sucessful!";
}
}
}
?>
</div>
<div class="clear"></div>
</div>

</body>
</html>
