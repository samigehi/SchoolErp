<html>
<head>
<title>Edit editor..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>
<h3>Edit editor</h3>

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
<th class=th1><b>Name</b></th>
<th class=th1><b>Username</b></th>
<th class=th1><b>Class1</b></b></th>
<th class=th1><b>Class2</b></b></th>
<th class=th1><b>Option</b></b></th>
</tr>
<tr>
<td class=td1 style="text-align:center;">
<select name="editor_name">
<option value="<?php echo $editor_name;?>"><?php echo $editor_name;?></option>
<?php
include("../staff/connect.php");
$sql1 = "SELECT staff_name from staff where designation = 'Teacher' AND status = 'Working' ORDER BY staff_name";
$result_2=mysql_query($sql1);
while($row = mysql_fetch_array($result_2))	
{
?>
<option value="<?php echo $row['staff_name'];?>"><?php echo $row['staff_name'];?></option>
<?php
}
?>
</select>
</td>

<td class=td1 style="text-align:center;"><input type="text" size="15" name="editor_user" value="<?php echo $editor_user;?>"></td>

<td class=td1 style="text-align:center;">
<SELECT NAME="class1">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $class1;?>"><?php echo $class1;?></option>
<option style="margin:5px; padding-left: 10px;" value="4">Class 4</option>
<option style="margin:5px; padding-left: 10px;" value="5">Class 5</option>
<option style="margin:5px; padding-left: 10px;" value="6A">Class 6A</option>
<option style="margin:5px; padding-left: 10px;" value="6B">Class 6B</option>
<option style="margin:5px; padding-left: 10px;" value="7A">Class 7A</option>
<option style="margin:5px; padding-left: 10px;" value="7B">Class 7B</option>
<option style="margin:5px; padding-left: 10px;" value="8A">Class 8A</option>
<option style="margin:5px; padding-left: 10px;" value="8B">Class 8B</option>
<option style="margin:5px; padding-left: 10px;" value="9A">Class 9A</option>
<option style="margin:5px; padding-left: 10px;" value="9B">Class 9B</option>
<option style="margin:5px; padding-left: 10px;" value="10A">Class 10A</option>
<option style="margin:5px; padding-left: 10px;" value="10B">Class 10B</option>
<option style="margin:5px; padding-left: 10px;" value="11">Class 11</option>
<option style="margin:5px; padding-left: 10px;" value="12">Class 12</option>
</SELECT>
</td>

<td class=td1 style="text-align:center;">
<SELECT NAME="class2">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $class2;?>"><?php echo $class2;?></option>
<option style="margin:5px; padding-left: 10px;" value="4">Class 4</option>
<option style="margin:5px; padding-left: 10px;" value="5">Class 5</option>
<option style="margin:5px; padding-left: 10px;" value="6A">Class 6A</option>
<option style="margin:5px; padding-left: 10px;" value="6B">Class 6B</option>
<option style="margin:5px; padding-left: 10px;" value="7A">Class 7A</option>
<option style="margin:5px; padding-left: 10px;" value="7B">Class 7B</option>
<option style="margin:5px; padding-left: 10px;" value="8A">Class 8A</option>
<option style="margin:5px; padding-left: 10px;" value="8B">Class 8B</option>
<option style="margin:5px; padding-left: 10px;" value="9A">Class 9A</option>
<option style="margin:5px; padding-left: 10px;" value="9B">Class 9B</option>
<option style="margin:5px; padding-left: 10px;" value="10A">Class 10A</option>
<option style="margin:5px; padding-left: 10px;" value="10B">Class 10B</option>
<option style="margin:5px; padding-left: 10px;" value="11">Class 11</option>
<option style="margin:5px; padding-left: 10px;" value="12">Class 12</option>
</SELECT> 
</td>
<td class=td1 style="text-align:center;"><input type="submit" name="update" value="save"> &nbsp; <input type="hidden" name="editor_id" value="<?=$editor_id?>"></td>
</tr>
</table>
</form>

<?php
if (isset($_GET['update'])){

include ("connect.php");

$editor_id = $_GET['editor_id'];
$editor_name = $_GET['editor_name'];
$editor_user = $_GET['editor_user'];
$class1 = $_GET['class1'];
$class2 = $_GET['class2'];

$data_update = "UPDATE report_editor SET editor_name = '".$editor_name."', editor_user = '".$editor_user."', class1='".$class1."', class2='".$class2."' WHERE editor_id = '".$editor_id."'";

$update = mysql_query($data_update);

mysql_close();

if($update)
{
header ("Location: assign_editor.php");
}

if(!$update)
{
echo mysql_error();
}
}


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
