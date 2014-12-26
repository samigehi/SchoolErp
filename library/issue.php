<html>
<head>
<title>issue book</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="new.css" rel="stylesheet" type="text/css" />
<script src="calendar/datetimepicker_css.js"></script>
<script language="JavaScript">
function autoSubmit()
{
    var formObject = document.forms['theForm'];
    formObject.submit();
}

function validateForm()
{
var x=document.forms["formA"]["staff_name"].value;
if (x==null || x=="")
  {
  alert("Name must be select!");
  return false;
  }
  }

</script>
</head>
<body>

<?php

include("index.php");

if(isset($_POST["staff_type"]))
{
  $staff_type = $_POST["staff_type"];
}

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'amruta' || $_SESSION['user_name'] == 'shikha')
{
include("connect.php");

$today = date("Y-m-d");

$new_date = date("Y-m-d", strtotime("+30 day"));

$id = $_GET['id'];

$qP = "SELECT * FROM books WHERE id = '$id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$title = trim($title);
$author = trim($author);
mysql_close();
?>

<div class=addform>
<div class="contentA">

<div align=left>
<font class=message><font color=red>&nbsp;<b> * </b></font> Mandatory fields </font>
<hr align=left style="margin-top:-2px;" width=20% color=orange size=1></div>

<table class=table1>
<h3>Issue Book Details</h3>

<form method="post" name="theForm">
<tr>
<td class=td_edit><font color=red><b>* </b></font>Select Student / Staff<br>
<Select name="staff_type" onChange="autoSubmit();">
<option value=""> -- Select -- </option>
<option value="student" <?php if($staff_type == "student") echo " selected"; ?>>Student</option>
<option value="staff" <?php if($staff_type == "staff") echo " selected"; ?>>Staff</option>
</Select>
</form>

<form method="post" action="issued.php" name="formA" onsubmit="return validateForm();">

<td class=td_edit><font color=red><b>* </b></font>Issue To<br>
<SELECT NAME="staff_name">
<option value=""> -- Select -- </option>
<?php
//student select area//
if(isset($_POST["staff_type"]))
{
if($staff_type == "student")
{
include("../std_2014-15/connect.php");

$sql="SELECT adm, name FROM std_2014_15 where profile_status = 'Studing' ORDER BY name";
$result=mysql_query($sql);

while ($row=mysql_fetch_array($result)) {

echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row[adm] $row[name]\">$row[adm] $row[name]</option>"); 
}
}
}

//staff select area//
if(isset($_POST["staff_type"]))
{
if($staff_type == "staff")
{
include("../staff/connect.php");
$sql1="SELECT staff_name FROM staff ORDER BY staff_name";
$result1=mysql_query($sql1);

while ($row1=mysql_fetch_array($result1)) {

echo ("<option style='margin:2px; padding-left: 10px;' value=\"$row1[staff_name]\">$row1[staff_name]</option>");
}
}
}
?>
</SELECT> 
</td>
</tr>

<input type="hidden" name="issued" value="Issued">

<tr>
<td class=td_edit>Author <br><input size="50" type="text" class="text1" readonly="readonly" name="book_author" value="<?php echo $author;?>"></td>

<td class=td_edit>Title <br><input size="60" type="text" class="text1" readonly="readonly" name="book_name" value="<?php echo $title;?>"></td>
</tr>

<tr>
<td class=td_edit>Book Id <br><input size="12" type="text" class="text1" readonly="readonly" name="book_id" value="<?php echo $id;?>"></td>
<td class=td_edit>Class No. <br><input size="12" type="text" class="text1" readonly="readonly" name="class_no" value="<?php echo $class_no;?>"></td>
</tr>

<tr>

<td class=td_edit>Issue Date <br><input style="text-align:center; background-color:#D4EDF7;" id="demo1" size="9" class="text1" type="text" name="issue_date" value="<?php echo $today;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo1','yyyyMMdd')" style="cursor:pointer"/></td>
<td class=td_edit>To be Return on<br><input style="text-align:center; background-color:#D4EDF7;" id="demo2" size="9" class="text1" type="text" name="to_be_return" value="<?php echo $new_date;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/></td>
</tr>
</table>


<br>
<div align=center>
<input type="submit" name="issue" value="Issue"> &nbsp;
</div>
<div class="clear"></div>
</div>

<?php
}
?>

</form>
</body>
</html>
