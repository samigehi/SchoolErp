<html>
<head>
<title>Delete editor..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>
<h3>Delete editor</h3>

<?php
if ($_SESSION['user_level'] == '1')
{

include ("connect.php");

$editor_id = $_GET['editor_id'];

$qP = "SELECT * FROM report_editor WHERE editor_id = '$editor_id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$editor_id = trim($editor_id);
$editor_name = trim($editor_name);
$editor_user = trim($editor_user);
$class1 = trim($class1);
$class2 = trim($class2);
mysql_close();
?>

<div style="width:90%; padding:15px; border: 1px solid orange; border-radius:25px; margin:auto auto auto auto;">
<table class=table1>
<form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<tr>
<th class=th1><b>editor Name</b></th>
<th class=th1><b>Username</b></th>
<th class=th1><b>Class1</b></b></th>
<th class=th1><b>Class2</b></b></th>
<th class=th1><b>Option</b></b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="20" readonly="readonly" type="text" value="<?php echo $editor_name;?>" name="editor_name"></td>
<td class=td1 style="text-align:center;"><input size="20" readonly="readonly" type="text" value="<?php echo $editor_user;?>" name="editor_user"></td>
<td class=td1 style="text-align:center;"><input size="10" readonly="readonly" type="text" value="<?php echo $class1;?>" name="class1"></td>
<td class=td1 style="text-align:center;"><input size="10" readonly="readonly" type="text" value="<?php echo $class2;?>" name="class2"></td>
<td class=td1 style="text-align:center;"><input type="submit" name="delete" value="delete" onclick="return confirm('Are you sure you want to delete?');"> &nbsp; <input type="hidden" name="editor_id" value="<?=$editor_id?>"></td>
</tr>
</table>
</div>
</form>


<?php
//----------------------delete page function-------------------//
if (isset($_GET['delete'])){
include ("connect.php");
$editor_id = $_GET['editor_id'];

$delete = "delete from report_editor where editor_id = '$editor_id'";

$query_delete = mysql_query($delete);

mysql_close();

if($query_delete)
{
header ("Location: assign_editor.php");
}

if(!$query_delete)
{
echo mysql_error();
}

}
}
?>
