<html>
<head>
<title>Leave Type | Edit</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include("index.php");
if ($_SESSION['user_level'] == '1'){
include ("connect.php");
$id = $_GET['id'];

$qP = "SELECT * FROM leave_config WHERE id = '$id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$id = trim($id);
$leave_type = trim($leave_type);
$leave_limit = trim($leave_limit);
$leave_color = trim($leave_color);
?>

<body>
<div class=addform>
<div class="contentA">
<table class=table1>
<h2>Edit Leave Type</h2>
<form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="form1">
<tr>
<th class=th1 style="width:2px;">ID</th>
<th class=th1 style="width:100px;"> Leave Type </th>
<th class=th1 style="width:30px;"> Limit </th>
<th class=th1 style="width:30px;"> Color </th>
<th class=th1 style="width:30px;"> Action </th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><?php echo $id; ?></td>
<td class=td1 style="text-align:center;"><input type="text" name="leave_type" size="15" value="<?php echo $leave_type;?>"></td>
<td class=td1 style="text-align:center;">
<select name="leave_limit">
<option value="<?php echo $leave_limit;?>"><?php echo $leave_limit;?></option>
<option value="">-</option>
<?php
$range = range(1,30);
foreach ($range as $days) { 
echo "<option value='$days'>$days</option>";
}
?>
</select>
</td>

<td class=td1 style="text-align:center;">
<select name="leave_color">
<option value="<?php echo $leave_color;?>"><?php echo $leave_color;?></option>
<option value="">-</option>
<option value="red">Red</option>
<option value="yellow">Yellow</option>
<option value="purple">Purple</option>
<option value="blue">Blue</option>
<option value="green">Green</option>
</select>
</td>
<td class=td1 style="text-align:center;">
<input type="submit" name="save" value="save">
<input type="submit" name="delete" value="delete"> &nbsp;
<input type="hidden" name="id" value="<?php echo $id;?>"></td>
</tr>
</table>
</form>
</br>
</div>

<?php
if (isset($_GET['save'])){
$id = $_GET['id'];
$leave_type = trim($_GET['leave_type']);
$leave_limit = trim($_GET['leave_limit']);
$leave_color = trim($_GET['leave_color']);

$edit = "UPDATE leave_config SET leave_type ='$leave_type', leave_limit='$leave_limit', leave_color='$leave_color' WHERE id = '$id'";
$update = mysql_query($edit);

if($update)
{
header ("Location: leave_type_add.php");
}

if(!$update)
{
echo "Not Sucessfull!";
}
mysql_close();
}


if (isset($_GET['delete'])){
$id = $_GET['id'];

$delete = "delete from leave_config WHERE id = '$id'";
$delete_type = mysql_query($delete);

if($delete_type)
{
header ("Location: leave_type_add.php");
}

if(!delete_type)
{
echo "Not Sucessfull!";
}
mysql_close();
}


}
?>
</body>
</html>
