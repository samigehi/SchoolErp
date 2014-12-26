<html>
<head>
<title>Add | leave type</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script language="javascript"> 
//**************************************************************************//
function validateForm()
{
var x=document.forms["form1"]["leave_type"].value;
if (x==null || x=="")
  {
  alert("Leave Type must be filled out");
  return false;
  }
}
//************************************************************************//
</script>
</head>
<body>
<?php
include("index.php");
if ($_SESSION['user_level'] == '1'){
include ("connect.php");
?>

<body>
<div class=addform>
<div class="contentA">
<table class=table1>
<h2>Add Leave Type</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="form1" onsubmit="return validateForm();">
<tr>
<th class=th1>Add Leave Type</th>
<th class=th1>Limit</th>
<th class=th1>Color</th>
</tr>
<tr>
<td class=td1 style="text-align:center;"><input type="text" name="leave_type" size="15" value=""></td>
<td class=td1 style="text-align:center;">
<select name="leave_limit">
<option value="">select</option>
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
<option value="">select</option>
<option value="red">Red</option>
<option value="yellow">Yellow</option>
<option value="green">Green</option>
<option value="blue">Blue</option>
</select>
</td>
</tr>
</table>
<br>
<div align=center>
<input type="submit" name="submit" value="Add"></td> &nbsp; <input type="reset" value="Reset" />
<hr style="margin-top:2px;" width=25% color=orange size=1>
</div>
</form>
</div>
</div>
<br>
<hr size="1" color="gray">
<br>
<div class=addform>
<div class="contentA">
<td><br><b>Added Leave Type</b></td>

<table class=table1>
<tr>
<th class=th1 style="width:50px;">Id</th>
<th class=th1>Leave Type</th>
<th class=th1>Limit</th>
<th class=th1>Color</th>
</tr>
<?php
$query = "SELECT * FROM leave_config ORDER BY id";
$data = mysql_query($query);

while($result = mysql_fetch_array( $data ))	
	{
$id = $result['id']; 
$leave_type = $result['leave_type'];
$leave_limit = $result['leave_limit'];
$leave_color = $result['leave_color'];
?>
<tr>
<td class=td1 style="text-align:center;"><b><?php echo $id; ?></b></td>
<td class=td1><?php echo "<a href=\"leave_type_edit.php?id=$id\">$leave_type</a>";?></td>
<td class=td1 style="text-align:center;"><?php echo $leave_limit; ?></td>
<td class=td1 style="text-align:left;"><?php echo $leave_color; ?></td>
</tr>
<?php
}
mysql_close();
?>
</table>
</br>
</div>

<?php
if (isset($_POST['submit'])){
include ("connect.php");

$leave_type = trim($_POST['leave_type']);
$leave_limit = trim($_POST['leave_limit']);
$leave_color = trim($_POST['leave_color']);

$query = "INSERT INTO leave_config (leave_type, leave_limit, leave_color) VALUES ('$leave_type', '$leave_limit', '$leave_color')";
$results = mysql_query($query);

if($results)
{
header ("Location: leave_type_add.php");
}
if(!$results)
{
echo "Not Sucessfull!";
}
mysql_close();
}
}
else 
{
echo "<p align=center><font color=red>No Access! Please contact administrator</font></p>";
}
?>
</body>
</html>
