<?php
include("index.php");

if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'amruta' || $_SESSION['user_name'] == 'shikha')
{
?>

<html>
<head>
<title>Add new book</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="new.css" rel="stylesheet" type="text/css" />
<script language="javascript"> 
function validateForm()
{
var x=document.forms["add_form"]["author"].value;
if (x==null || x=="")
  {
  alert("Author must be filled out!");
  return false;
  }

var x=document.forms["add_form"]["title"].value;
if (x==null || x=="")
  {
  alert("Title must be filled out!");
  return false;
  }

var x=document.forms["add_form"]["edition"].value;
if (x==null || x=="")
  {
  alert("Edition must be filled out!");
  return false;
  }

var x=document.forms["add_form"]["class_no"].value;
if (x==null || x=="")
  {
  alert("Class no must be filled out!");
  return false;
  }

var x=document.forms["add_form"]["isbn_no"].value;
if (x==null || x=="")
  {
  alert("Isbn must be filled out!");
  return false;
  }
  }
</script>

</head>
<body>

<form method="post" action="added.php" name="add_form" onsubmit="return validateForm();">
<div class=addform>
<div class="contentA">

<div align=left>
<font class=message><font color=red>&nbsp;<b> * </b></font> Mandatory fields </font>
<hr align=left style="margin-top:-2px;" width=20% color=orange size=1></div>

<table class=table1>
<h3>New Book Entry</h3>
<tr class=tr1>
<td class=td_edit><font color=red><b>* </b></font>Author <br><input size="50" type="text" class="text1" name="author" value=""></td>

<td class=td_edit><font color=red><b>* </b></font>Title <br><input size="60" type="text" class="text1" name="title" value=""></td>
<tr>

<tr class=tr1>
<td class=td_edit><font color=red><b>* </b></font>Edition <br><input size="40" type="text" class="text1" name="edition" value=""></td>

<td class=td_edit> Place publisher <br><input size="40" type="text" class="text1" name="place_publisher" value=""></td>
</tr>

<tr class=tr1>
<td class=td_edit><font color=red><b>* </b></font>Status <br><input size="20" readonly="readonly" type="text" class="text1" name="status" value="Available"></td>

<td class=td_edit><font color=red><b>* </b></font>Class No. <br><input size="20" type="text" class="text1" name="class_no" value=""></td>
</tr>

<tr class=tr1>
<td class=td_edit> Year <br><input size="20" type="text" class="text1" name="year" value=""></td>

<td class=td_edit> Pages <br><input size="20" type="text" class="text1" name="pages" value=""></td>
</tr>

<tr class=tr1>
<td class=td_edit> Volume <br><input size="20" type="text" class="text1" name="volume" value=""></td>

<td class=td_edit> Source <br><input size="20" type="text" class="text1" name="source" value=""></td>
</tr>

<tr class=tr1>
<td class=td_edit> Bill No. <br><input size="20" type="text" class="text1" name="bill_no" value=""></td>

<td class=td_edit> Cost <br><input size="20" type="text" class="text1" name="cost" value=""></td>
</tr>

<tr class=tr1>
<td class=td_edit>Purchase Date <br><input size="20" type="text" class="text1" name="date" value=""></td>

<td class=td_edit><font color=red><b>* </b></font>Isbn <br><input size="20" type="text" class="text1" name="isbn_no" value=""></td>
</tr>

<tr class=tr1>
<td class=td_edit><font color=red><b>* </b></font>Keywords <br><TEXTAREA ROWS="3" class="textarea" name="keywords"></TEXTAREA></td>

<td class=td_edit> Remarks <br><TEXTAREA ROWS="3" class="textarea" name="remarks"></TEXTAREA></td>
</tr>
</table>

<br>
<div align=center>
<input type="submit" name="submit" value="Create"> &nbsp; <input type="reset" value="Reset"/>
</div>
<div class="clear"></div>
</div>

</form>
<?php }?>
<!---------------------**************************** first box *******************************----------------->
</body>
</html>

