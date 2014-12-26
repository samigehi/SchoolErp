<?php
include("index.php");
$el_date = date("Y-m-d");
$el_time = date("H:i:s");
?>

<html>
<head>
<title>add record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php

include("connect.php");

$qp = "SELECT * FROM ele_mis ORDER BY id DESC LIMIT 1";

$data = mysql_query($qp);
$result = mysql_fetch_array($data);

$mseb_cl_kwh = $result['mseb_cl_kwh'];

$water_cl_ltrs = $result['water_cl_ltrs'];

$water_kwh_cl = $result['water_kwh_cl'];

mysql_close();
?>

<!---------------------**************************** first box *******************************----------------->
<form method="post" action="added.php">
<div class=addform>
<div class="contentA">

<table class=table1>
<h3><font color=yellow> MSEB, DG Set and Water Log Form</font></h3>

<td><b>MIS, Utilities [Power, DG set, Water]</b></td>

<tr>
<td class=td1>Date & Electrician's Name :</td>
<td class=td1>Dt : <input size="10" style="background-color:#D4EDF7; text-align:center;" id="demo11" readonly="readonly" name="el_date" value="<?php echo $el_date;?>"><img src="calendar/images2/cal.gif" onclick="javascript:NewCssCal('demo11','yyyyMMdd')" style="cursor:pointer"/> <input type="hidden" name="el_time" value="<?php echo $el_time;?>">

&nbsp; &nbsp; Electrician : 
<Select NAME="el_name">
<Option class=pink style="padding:1px;" VALUE="">---- Select name ----</option>
<option class=pink style="padding:1px;" value="Mangesh Kahane"> &nbsp; Mangesh Kahane </option>
<option class=pink style="padding:1px;" value="Suresh Dhawle"> &nbsp; Suresh Dhawle </option>
<option class=pink style="padding:1px;" value="Sandip Bhoir"> &nbsp; Sandip Bhoir </option>
</td>
</tr>

<td><br><b>MSEB Power</b></td>

<tr>
<td class=td1>MSEB KWH :</td>
<td class=td1>Op : <input style="background-color:#BBCCFF;" size="16" type="text" class="text1" name="mseb_op_kwh" value="<?php echo $mseb_cl_kwh;?>"> Cl : <input size="16" type="text" class="text1" name=" mseb_cl_kwh" value=""></td>
</tr>

<tr>
<td class=td1>MSEB PF & Outage : </td>
<td class=td1> PF : <input size="10" type="text" class="text1" name="mseb_pf" value=""> &nbsp; &nbsp;Outage : <input size="10" type="text" class="text1" name="el_outage" value=""> ( hr:mm:ss )</td>
</tr>


<td><br><b>DG SET</b></td>

<tr>
<td class=td1>DG SET KWH :</td>
<td class=td1>125KVA : <input size="10" type="text" class="text1" name="dg_125_kwh" value=""> &nbsp; 30KVA : <input size="10" type="text" class="text1" name="dg_30_kwh" value=""></td>
</tr>

<tr>
<td class=td1>Diesel Cons Litrs :</td>
<td class=td1>125KVA : <input size="10" type="text" class="text1" name="dg_125_disl" value=""> &nbsp; 30KVA : <input size="10" type="text" class="text1" name="dg_30_disl" value=""></td>
</tr>

<tr>
<td class=td1>Total Hours Running : ( hr:mm:ss )</td>
<td class=td1>125KVA : <input size="10" type="text" class="text1" name="dg_125_time" value=""> &nbsp; 30KVA : <input size="10" type="text" class="text1" name="dg_30_time" value=""></td>
</tr>

<td><br><b>Water</b></td>

<tr>
<td class=td1>Water Pump Litrs :</td>
<td class=td1>Op : <input style="background-color:#BBCCFF;" size="16" type="text" class="text1" name="water_op_ltrs" value="<?php echo $water_cl_ltrs;?>"> Cl : <input size="16" type="text" class="text1" name="water_cl_ltrs" value=""></td>
</tr>

<tr>
<td class=td1>Water Pump KWH :</td>
<td class=td1>Op : <input style="background-color:#BBCCFF;" size="16" type="text" class="text1" name="water_kwh_op" value="<?php echo $water_kwh_cl;?>"> Cl : <input size="16" type="text" class="text1" name="water_kwh_cl" value=""></td>
</tr>

<td><br><b>Remark</b></td>
<tr>
<td class=td1>Department Remark :</td>
<td class=td1>&nbsp; &nbsp; &nbsp; &nbsp;<TEXTAREA ROWS="3" class="textarea" name="el_remark"></TEXTAREA></td>
</tr>
</table>

</div>
<div class="clear"></div>
</div>
</div>
<br>
<div align=center>
<input type="submit" name="submit" value="Submit"> <input type="reset" value="Reset"></div>
<hr style="margin-top:4px;" width=30% color=orange size=1>

</form>
</body>
</html>

