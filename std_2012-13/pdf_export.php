<html>
<head>
<title>Export to pdf</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../std/css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("../std/index.php");
include("../std/connect.php");
?>

<div class="contentB">
<table class=table1 >
<form method="post" name="pdf_house" action="pdf_out.php">
<tr>
<td class=td1>
<b>House List : </b><Select NAME="house">
<Option style="margin:5px; padding-left: 10px;" VALUE="">--- Select House ---</option>
<option style="margin:5px; padding-left: 10px;" value="Vishakha"> Vishakha </option>
<option style="margin:5px; padding-left: 10px;" value="Alaknanda"> Alaknanda </option>
<option style="margin:5px; padding-left: 10px;" value="Indrayani"> Indrayani </option>
<option style="margin:5px; padding-left: 10px;" value="Himadri"> Himadri </option>
<option style="margin:5px; padding-left: 10px;" value="Shivneri"> Shivneri </option>
<option style="margin:5px; padding-left: 10px;" value="Phalguni"> Phalguni </option>
<option style="margin:5px; padding-left: 10px;" value="Shravani"> Shravani </option>
<option style="margin:5px; padding-left: 10px;" value="Krittika"> Krittika </option>
<option style="margin:5px; padding-left: 10px;" value="Torna"> Torna </option>
<option style="margin:5px; padding-left: 10px;" value="Jaintia"> Jaintia </option>
<option style="margin:5px; padding-left: 10px;"value="Palash"> Palash </option>
</Select>
&nbsp; &nbsp; <input type="submit" name="submit" value="Go"> 
</td>
</form>

<form method="post" name="pdf_class" action="pdf_out.php">
<td class=td1>
<b>Class List : </b><Select NAME="class">
<Option style="margin:5px; padding-left: 10px;" VALUE="">--- Select Class ---</option>
<option style="margin:5px; padding-left: 10px;" value="4">4</option>
<option style="margin:5px; padding-left: 10px;" value="5">5</option>
<option style="margin:5px; padding-left: 10px;" value="6A">6A</option>
<option style="margin:5px; padding-left: 10px;" value="6B">6B</option>
<option style="margin:5px; padding-left: 10px;" value="7A">7A</option>
<option style="margin:5px; padding-left: 10px;" value="7B">7B</option>
<option style="margin:5px; padding-left: 10px;" value="8A">8A</option>
<option style="margin:5px; padding-left: 10px;" value="8B">8B</option>
<option style="margin:5px; padding-left: 10px;" value="9A">9A</option>
<option style="margin:5px; padding-left: 10px;" value="10A">10A</option>
<option style="margin:5px; padding-left: 10px;"value="10B">10B</option>
</Select>
&nbsp; &nbsp; <input type="submit" name="class" value="Go"> 
</form>
</td>
</tr>
</div>
<div class="clear"></div>
</div>
</table>
</body>
</html>

