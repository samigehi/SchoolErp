<html>
<head>
<title>return book</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>
</head>
<body>

<?php
include("index.php");

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'amruta' || $_SESSION['user_name'] == 'shikha')
{
include("connect.php");

$today = date("Y-m-d");

$id = $_GET['id'];
$staff_name = $_GET['staff_name'];

$qP = "SELECT * FROM books_issue WHERE book_id = '$id' AND staff_name = '$staff_name'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);
$issue_date = trim($issue_date);
$book_id = trim($book_id);
$book_author = trim($book_author);
$book_title = trim($book_name);
mysql_close();
?>

<form method="post" action="returned.php" name="formA">

<div class=addform>
<div class="contentA">

<table class=table1>
<h3>Return Book Details</h3>

<input type="hidden" name="returned" value="Returned">

<tr>
<td class=td_edit>Author <br><input size="50" type="text" class="text1" readonly="readonly" name="book_author" value="<?php echo $book_author;?>"></td>

<td class=td_edit>Title <br><input size="60" type="text" class="text1" readonly="readonly" name="book_name" value="<?php echo $book_name;?>"></td>
</tr>

<tr>
<td class=td_edit>Book Id <br><input size="12" type="text" class="text1" readonly="readonly" name="book_id" value="<?php echo $book_id;?>"></td>
<td class=td_edit>Book Issued By <br><input size="30" type="text" class="text1" readonly="readonly" name="staff_name" value="<?php echo $staff_name;?>"></td>
</tr>


<tr>
<td class=td_edit>Issued Date <br><input style="text-align:center; background-color:#D4EDF7;" id="demo1" size="9" class="text1" type="text" name="issue_date" value="<?php echo $issue_date;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/></td>
<td class=td_edit>Return Date<br><input style="text-align:center; background-color:#D4EDF7;" id="demo2" size="9" class="text1" type="text" name="return_date" value="<?php echo $today;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/></td>
</tr>
</table>

<br>
<div align=center>
<input type="submit" name="return" value="Return"> &nbsp;
</div>
<div class="clear"></div>
</div>
<?php
}
?>

</form>
</body>
</html>
