<?php
include("index.php");
?>

<html>
<head>
<title>Request for a Book...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="new.css" rel="stylesheet" type="text/css" />
<script language="javascript"> 
function validateForm()
{
var x=document.forms["formA31"]["user_name"].value;
if (x==null || x=="")
  {
  alert("Name must be filled out!");
  return false;
  }

var x=document.forms["formA31"]["author"].value;
if (x==null || x=="")
  {
  alert("Author must be filled out!");
  return false;
  }

var x=document.forms["formA31"]["title"].value;
if (x==null || x=="")
  {
  alert("Title must be filled out!");
  return false;
  }
  }
</script>
</head>
<body>

<form method="post" action="book_requested.php" name="formA31" onsubmit="return validateForm();">
<div class=addform>
<div class="contentA">

<div align=left>
<font class=message><font color=red>&nbsp;<b> * </b></font> Mandatory fields </font>
<hr align=left style="margin-top:-2px;" width=20% color=orange size=1></div>

<table class=table1>
<h3>Request for a new Book</h3>

<tr class=tr1>
<td class=td_edit><font color=red><b>* </b></font>Requester’s Name<br><input size="40" type="text" class="text1" name="user_name" value=""></td>
<td class=td_edit>
<input type="radio" name="user_type" value="staff" > Staff &nbsp;
<input type="radio" name="user_type" value="student" >Student &nbsp;
<input type="radio" name="user_type" value="guest" >Guest

</td>
<tr>


<tr class=tr1>
<td class=td_edit><font color=red><b>* </b></font>Author <br><input size="40" type="text" class="text1" name="author" value=""></td>
<td class=td_edit><font color=red><b>* </b></font>Book Title <br><input size="60" type="text" class="text1" name="title" value=""></td>
<tr>

<tr class=tr1>
<td class=td_edit> Edition <br><input size="40" type="text" class="text1" name="edition" value=""></td>
<td class=td_edit> Remarks <br><TEXTAREA ROWS="3" class="textarea" name="remarks"></TEXTAREA></td>
</tr>

</tr>
</table>

<br>
<div align=center>
<input type="submit" name="submit" value="Submit"> &nbsp; <input type="reset" value="Reset" />
</div>
<div class="clear"></div>
</div>

</form>
</body>
</html>

