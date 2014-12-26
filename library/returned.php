
<?php
include("index.php");

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'amruta' || $_SESSION['user_name'] == 'shikha')
{

if (isset($_POST['return'])) {
include("connect.php");

//add new fields //
$returned = trim($_POST['returned']);
$return_date = trim($_POST['return_date']);
$book_id = trim($_POST['book_id']);
$book_author = trim($_POST['book_author']);
$book_name = trim($_POST['book_name']);
$staff_name = trim($_POST['staff_name']);

$var = NULL;

//update data to books_issue table//
$update1 = "UPDATE books_issue SET status = '$returned', return_date = '$return_date' Where book_id = '$book_id' AND staff_name = '$staff_name'";
$rsUpdate1 = mysql_query($update1);

//update data to main books table//
$update2 = "UPDATE books SET status = 'Available', staff_name = '$var', issue_date = '$var' WHERE id = '$book_id' AND staff_name = '$staff_name'";
$rsUpdate2 = mysql_query($update2);

if ($rsUpdate1)
{
header("Location: edit_show.php?id=$book_id");
}

if (!$rsUpdate1)
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
