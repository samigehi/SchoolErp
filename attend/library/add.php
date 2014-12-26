<html>
<head>
<title>add attendance...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../attend/css/new.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
function autoSubmit()
{
    var formObject = document.forms['theForm'];
    formObject.submit();
}
</script>
</head>
<body>

<?php
include("../av_records/index.php");
?>

<div class="addform">
<div class="contentB">
<h3>Add New Records</h3>
<form method="post" action="added.php" name="theForm">
<!-------------------------------------------------------- SELECT ATTENDANCE AREA ----------------------------------------------------->
<table class=table1>
<tr>
<td class=td1> Date: <input style="text-align:center; background-color:#D4EDF7;" id="demo2" size="9" class="text1" type="text" name="av_date"  value="<?php echo date('Y-m-d');?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo2','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;</td> 
<td class=td1> Event: 
<select name="event">
<option value="">--Select--</option>
<option value="Assembly">Assembly</option>
<option value="Movie">Movie</option> 
<option value="Folk Dance">Folk Dance</option> 
<option value="Concert">Concert</option> 
<option value="OutDoor Programs">OutDoor Programs</option>
</select> 
</td> 
<td class=td1> Event Holder: <input name="event_holder" value="" type="text" size="30"/></td> 
</tr>
</table>
<br>

<table class=table1>
<tr>
<td class=td1> Requirement1:  
<select name="requirement1">
<option value="">--Select--</option>
<option value="Mikes">Mikes</option>
<option value="Screen">Screen</option> 
<option value="Lights">Lights</option> 
</select>
</td>

<td class=td1> Requirement2:  
<select name="requirement2">
<option value="">--Select--</option>
<option value="Mikes">Mikes</option>
<option value="Screen">Screen</option> 
<option value="Lights">Lights</option> 
</select>
</td>

<td class=td1> Requirement3:  
<select name="requirement3">
<option value="">--Select--</option>
<option value="Mikes">Mikes</option>
<option value="Screen">Screen</option> 
<option value="Lights">Lights</option> 
</select>
</td>
</tr>
</table>
<br>

<table class=table1>
<tr bgcolor=#BDF4CB>
<th class=th1>Name</th>
<th class=th1>Attd</th>
<th class=th1>Remark</th>
</tr>

<tr>
<td class=td1 style="text-align:center;">
<select name="av_name[]">
<option value="Ananya" style="width:150px;">Ananya</option>
</select> 
</td>

<td align="center" class=td1>
<Select NAME="attend_code[]">
<option style="padding-left: 10px;" value="P">P</option>
<option style="padding-left: 10px;" value="A">A</option>
<option style="padding-left: 10px;" value="L">L</option>
</select>
</td>
<td class=td1 style="text-align:center;"><input name="av_remark[]" type="text1" size="40" /></td>
<tr>

<tr>
<td class=td1 style="text-align:center;">
<select name="av_name[]">
<option value="Lekha" style="width:150px;">Lekha</option> 
</select> 
</td>
<td align="center" class=td1>
<Select NAME="attend_code[]">
<option style="padding-left: 10px;" value="P">P</option>
<option style="padding-left: 10px;" value="A">A</option>
<option style="padding-left: 10px;" value="L">L</option>
</select>
</td>
<td class=td1 style="text-align:center;"><input name="av_remark[]" type="text1" size="40" /></td>
<tr>

<tr>
<td class=td1 style="text-align:center;">
<select name="av_name[]">
<option value="Shruti" style="width:150px;">Shruti</option> 
</select> 
</td>
<td align="center" class=td1>
<Select NAME="attend_code[]">
<option style="padding-left: 10px;" value="P">P</option>
<option style="padding-left: 10px;" value="A">A</option>
<option style="padding-left: 10px;" value="L">L</option>
</select> 
</td>
<td class=td1 style="text-align:center;"><input name="av_remark[]" type="text1" size="40" /></td>
<tr>

<tr>
<td class=td1 style="text-align:center;">
<select name="av_name[]">
<option value="Anjaneya" style="width:150px;">Anjaneya</option>
</select> 
</td>
<td align="center" class=td1>
<Select NAME="attend_code[]">
<option style="padding-left: 10px;" value="P">P</option>
<option style="padding-left: 10px;" value="A">A</option>
<option style="padding-left: 10px;" value="L">L</option>
</select> 
</td>
<td class=td1 style="text-align:center;"><input name="av_remark[]" type="text1" size="40" /></td>
<tr>


<tr>
<td class=td1 style="text-align:center;">
<select name="av_name[]">
<option value="Parashuram" style="width:150px;">Parashuram</option>
</select> 
</td>
<td align="center" class=td1>
<Select NAME="attend_code[]">
<option style="padding-left: 10px;" value="P">P</option>
<option style="padding-left: 10px;" value="A">A</option>
<option style="padding-left: 10px;" value="L">L</option>
</select> 
</td>
<td class=td1 style="text-align:center;"><input name="av_remark[]" type="text1" size="40" /></td>
<tr>
</tr>
</table>
<br>
<div align=center>
<input type="submit" name="submit" value="Save Record">
<hr style="margin-top:2px;" width=30% color=orange size=1>
</div>
</form>
</div>

<hr size="1" color="lightgray">
</body>
</html>
