<?php
include("index.php");
include("connect.php");

$id = $_GET['id'];

$qP = "SELECT * FROM books WHERE id = '$id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

//first form
$date = trim($date);
$author = trim($author);
$title = trim($title);
$edition = trim($edition);
$place_publisher = trim($place_publisher);
$status = trim($status);
$class_no = trim($class_no);
$year = trim($year);
$pages = trim($pages);
$volume = trim($volume);
$source = trim($source);
$isbn_no = trim($isbn_no);
$bill_no = trim($bill_no);
$cost = trim($cost);
$keywords = trim($keywords);
$remarks = trim($remarks);
$staff_name = trim($staff_name);
$issue_date = trim($issue_date);
mysql_close();
?>

<html>
<head>
<title>edit book</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<form method="GET" action="edit.php" name="formA">
<div class=addform>
<div class="contentA">

<table class=table1>
<h3>Edit Book Id - <?php echo $id;?></h3>
<tr>
<td class=td_edit>Author <br><input size="50" type="text" class="text1" readonly="readonly" name="author" value="<?php echo $author;?>"></td>

<td class=td_edit>Title <br><input size="60" type="text" class="text1" readonly="readonly" name="title" value="<?php echo $title;?>"></td>
<tr>

<tr>
<td class=td_edit>Edition <br><input size="40" type="text" class="text1" readonly="readonly" name="edition" value="<?php echo $edition;?>"></td>

<td class=td_edit>Place publisher <br><input size="40" type="text" class="text1" readonly="readonly" name="place_publisher" value="<?php echo $place_publisher;?>"></td>
</tr>

<tr>
<td class=td_edit>Status <br><input size="15" type="text" class="text1" readonly="readonly" name="status" value="<?php echo $status;?>"></td>

<td class=td_edit>Class No. <br><input size="20" type="text" class="text1" readonly="readonly" name="class_no" value="<?php echo $class_no;?>"></td>
</tr>

<tr>
<td class=td_edit>Year <br><input size="15" type="text" class="text1" readonly="readonly" name="year" value="<?php echo $year;?>"></td>

<td class=td_edit>Pages <br><input size="15" type="text" class="text1" readonly="readonly" name="pages" value="<?php echo $pages;?>"></td>
</tr>

<tr>
<td class=td_edit>Volume <br><input size="15" type="text" class="text1" readonly="readonly" name="volume" value="<?php echo $volume;?>"></td>

<td class=td_edit>Source <br><input size="40" type="text" class="text1" readonly="readonly" name="source" value="<?php echo $source;?>"></td>
</tr>

<tr>
<td class=td_edit>Bill No. <br><input size="30" type="text" class="text1" readonly="readonly" name="bill_no" value="<?php echo $bill_no;?>"></td>

<td class=td_edit>Cost <br><input size="15" type="text" class="text1" readonly="readonly" name="cost" value="<?php echo $cost;?>"></td>
</tr>

<tr>
<td class=td_edit>Purchase Date <br><input size="15" type="text" class="text1" readonly="readonly" name="date" value="<?php echo $date;?>"></td>

<td class=td_edit>Isbn <br><input size="15" type="text" class="text1" readonly="readonly" name="isbn_no" value="<?php echo $isbn_no;?>"></td>
</tr>

<tr>
<td class=td_edit>Keywords <br><TEXTAREA ROWS="3" class="textarea" readonly="readonly" name="keywords"><?php echo $keywords;?></TEXTAREA></td>

<td class=td_edit>Remarks <br><TEXTAREA ROWS="3" class="textarea" readonly="readonly" name="remarks"><?php echo $remarks;?></TEXTAREA></td>
</tr>


<?php 
if ($staff_name != '')
 {
?>
<tr class=tr2>
<td class=td_edit>Book Issued By <br><input size="30" type="text" class="text1" readonly="readonly" name="staff_name" value="<?php echo $staff_name;?>"></td>

<td class=td_edit>Issued Date <br><input size="15" type="text" class="text1" readonly="readonly" name="issue_date" value="<?php echo $issue_date;?>"></td>
</tr>
<?php
}
?>
</table>

<?php
if ($_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == 'amruta')
{
?>
<br>
<div align=center>
<input type="hidden" name="id" value="<?=$id;?>">
<input type="submit" name="submit" value="Edit"> &nbsp; 

<?php 
if ($staff_name == '')
 {
?>
<input type="button" name="issue" value="Issue" onclick="window.location.href='issue.php?id=<?=$id;?>'"> &nbsp;
<?php
}
?>

<?php 
if ($staff_name != '')
 {
?>
<input type="button" name="return" value="Return" onclick="window.location.href='return.php?id=<?=$id;?> & staff_name=<?=$staff_name;?>'"> &nbsp;
<?php
}
?>

<input type="button" value="cancel" onclick="window.location='javascript:history.back()'">
</div>
<div class="clear"></div>
</div>
</form>
<?php 
}
?>
<!---------------------**************************** first box *******************************----------------->
</body>
</html>

