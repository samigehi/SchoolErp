
<?php
include("index.php");

include("connect.php");

//Add new fields //

$req_date = date("Y-m-d");
$req_time = date("h:i:s");
$user_name = trim($_POST['user_name']);
$user_type = trim($_POST['user_type']);
$author = trim($_POST['author']);
$title = trim($_POST['title']);
$edition = trim($_POST['edition']);
$remarks = trim($_POST['remarks']);

$query = "INSERT INTO books_request (req_date, req_time, user_name, user_type, author, title, edition, remarks) VALUES ('$req_date', '$req_time', '$user_name', '$user_type', '$author', '$title', '$edition', '$remarks')";

$rsquery = mysql_query($query);

if ($rsquery)
{

$new_id = mysql_insert_id();

$data = mysql_query("SELECT * FROM books_request WHERE id = '$new_id' ORDER BY id, req_date, user_name");

 //And display the results
while($result = mysql_fetch_array( $data ))			
{
?>
<div class=addform>
<div class="contentA">
<table class=table1>
<h3>Thank you for the request</h3>

<tr class=tr1>
<td class=td_edit>Request No.<br><input size="10" type="text" class="text1" readonly="readonly" name="id" value="<?php echo $result['id']; ?>"></td>
<td class=td_edit>Request Date<br><input size="20" type="text" class="text1" readonly="readonly" name="req_date" value="<?php echo $result['req_date']; ?>"></td>
<tr>

<tr class=tr1>
<td class=td_edit>Requester’s Name<br><input size="50" type="text" class="text1" readonly="readonly" name="user_name" value="<?php echo $result['user_name']; ?>"></td>
<td class=td_edit>Staff / Student<br><input size="20" type="text" class="text1" readonly="readonly" name="user_type" value="<?php echo $result['user_type']; ?>"></td>
<tr>


<tr class=tr1>
<td class=td_edit>Author <br><input size="50" type="text" class="text1" readonly="readonly" name="author" value="<?php echo $result['author']; ?>"></td>
<td class=td_edit>Book Title <br><input size="60" type="text" class="text1" readonly="readonly" name="title" value="<?php echo $result['title']; ?>"></td>
<tr>

<tr class=tr1>
<td class=td_edit>Edition <br><input size="40" type="text" class="text1" readonly="readonly" name="edition" value="<?php echo $result['edition']; ?>"></td>
<td class=td_edit>Remarks <br><TEXTAREA ROWS="3" class="textarea" readonly="readonly" name="remarks"><?php echo $result['remarks']; ?></TEXTAREA></td>
</tr>
</table>

<?php
}
}

if (!$rsquery)
{ 
echo "Not Sucessful!";
}
?>

</div>
<div class="clear"></div>
</div>

</body>
</html>
