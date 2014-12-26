<html>
<head>
<title>Editors add...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>

<h3>Assign Dates</h3>

<?php
if ($_SESSION['user_level'] == '1')
{
?>

<!-------------------------------------------------------- TYPE ----------------------------------------------------->
<div style="width:80%; padding:8px; border: 1px solid orange; border-radius:25px; margin:auto auto auto auto;">
<table class=table1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<tr>
<th class=th1><b>Writing start Date</b></th>
<th class=th1><b>Writing end Date</b></b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;">
Editor :
<select name="editor_name">
<option value="">select</option>
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
<td class=td1 style="text-align:center;">
Class1 :
<SELECT NAME="class1">
<option style="margin:5px; padding-left: 10px;" value="">- Select -</option>
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
</SELECT> &nbsp; &nbsp; 
</td>

<td class=td1 style="text-align:center;">
Class2 :
<SELECT NAME="class2">
<option style="margin:5px; padding-left: 10px;" value="">- Select -</option>
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
</SELECT> &nbsp; &nbsp; 
</td>
<td class=td1 style="text-align:center;"><input type="submit" name="submit" value="Add"></td>
</tr>
</table>
</form>
</div>
<br>
<br>

<?php
//----------------------------added page function------------------------------//
if (isset($_POST['submit'])){

include ("connect.php");

$editor_name = $_POST['editor_name'];
$class1 = $_POST['class1'];
$class2 = $_POST['class2'];

$data_editor = "INSERT INTO report_editor (editor_name, class1, class2) VALUES ('$editor_name', '$class1', '$class2')";

$add_editor = mysql_query($data_editor);

mysql_close();

if($add_editor)
{
header ("Location: editor_add.php");
}

if(!$add_editor)
{
echo "Not Sucessful. <a href='editor_add.php'>Please try again</a>";
}
}
?>


<div style="width:80%; padding:8px; border: 1px solid orange; border-radius:25px; margin:auto auto auto auto;">
<h4 style="color:darkgreen; font-size:12px; text-decoration:underline; margin-bottom:-12px;">Editors >><h4>
<table class=table1>
<form method="post" action="">
<tr>
<th class=th1><b>Name</b></th>
<th class=th1><b>Class1</b></b></th>
<th class=th1><b>Class2</b></b></th>	
<th class=th1><b>Option</b></b></th>
</tr>

<?php
//---------------------------shows the editor list---------------------------------------//
include ("connect.php");

$query = "Select * from report_editor ORDER BY editor_name";
$query_show = mysql_query($query);

while($result = mysql_fetch_array($query_show))
		
	{
	$editor_name = $result['editor_name'];
	$editor_id = $result['editor_id'];	
	$class1 = $result['class1'];
	$class2 = $result['class2'];
	?>	
<tr>
<td class=td1 style="text-align:center;"><input size=30" type="text" readonly="readonly" value="<?php echo $editor_name;?>" name="editor_name"></td>
<td class=td1 style="text-align:center;"><input size="10" type="text" readonly="readonly" value="<?php echo $class1;?>" name="class1"></td>
<td class=td1 style="text-align:center;"><input size="10" type="text" readonly="readonly" value="<?php echo $class2;?>" name="class2"></td>
<td class=td1 style="text-align:center;"><?php echo "<a href=\"editor_edit.php?editor_id=$editor_id\"><img src='images2/edit.gif' title='edit'  border='0' alt='edit'></a>";?> &nbsp; &nbsp; <?php echo "<a href=\"editor_delete.php?editor_id=$editor_id\"><img src='images2/delete.gif' title='delete'  border='0' alt='delete'></a>";?></td>
</tr>
<?php
}
	
}
?>
</form>
</table>
</body>
</html>
