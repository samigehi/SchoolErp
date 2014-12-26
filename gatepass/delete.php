<html>
<head>
<title>delete record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../mis/css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php

include("index.php");
include("connect.php");

$id = $_GET['id'];

$qP = "SELECT * FROM ele_mis WHERE id = '$id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$el_date = trim($el_date);
$el_name = trim($el_name);

$mseb_op_kwh = trim($mseb_op_kwh);
$mseb_cl_kwh = trim($mseb_cl_kwh);

$total_mseb_units = ($mseb_cl_kwh - $mseb_op_kwh)*2;

$mseb_pf = trim($mseb_pf);
$el_outage = trim($el_outage);

//DG set data
$dg_125_kwh = trim($dg_125_kwh);
$dg_75_kwh = trim($dg_75_kwh);

$total_dg_kwh = $dg_125_kwh + $dg_75_kwh;

$dg_125_disl = trim($dg_125_disl);
$dg_75_disl = trim($dg_75_disl);
$total_dg_disl = $dg_125_disl + $dg_75_disl;


//Water data
$water_op_ltrs = trim($water_op_ltrs);
$water_cl_ltrs = trim($water_cl_ltrs);

$total_water_ltrs = round(($water_cl_ltrs - $water_op_ltrs)/1000);

$water_kwh_op = trim($water_kwh_op);
$water_kwh_cl = trim($water_kwh_cl);

$total_water_kwh = $water_kwh_cl - $water_kwh_op;

$total_units = $total_mseb_units + $dg_125_kwh + $dg_75_kwh;

$el_remark = trim($el_remark);


mysql_close();
?>

<hr size="1" color="lightgray">
<!---------------------**************************** first box *******************************----------------->
<form method="post" action="../mis/updated.php">
<div class=updateform>
<div class="contentA">

<table class=table1>
<h3> You are deleting record for the date -<font color=yellow> <? echo $el_date;?> </font> </h3>

<td><b>MIS, Utilities [MSEB Power, DG set, Water]</b></td>

<tr>
<td class=td1>Date & Electrician's Name :</td>
<td class=td1>Dt : <input style="background-color:#BBCCFF; text-align:center;" size="10" type="text" class="text1" name="el_date" value="<? echo $el_date;?>">&nbsp; &nbsp; Time : <input style="background-color:#BBCCFF; text-align:center;" type="text1" size="10" name="el_time" value="<? echo $el_time;?>">


</td>
<td class=td1> Electrician : 
<Select NAME="el_name">
<Option VALUE="<? echo $el_name;?>"> &nbsp; <? echo $el_name;?> &nbsp; </option>
<option class=pink value="Mangesh Kahane"> &nbsp; Mangesh Kahane &nbsp; </option>
<option class=pink value="Suresh Dhawle"> &nbsp; Suresh Dhawle &nbsp; </option>
<option class=pink value="Sandip Bhoir"> &nbsp; Sandip Bhoir &nbsp; </option></td>
</tr>

<td><br><b>MSEB Power</b></td>

<tr>
<td class=td1>MSEB KWH :</td>
<td class=td1>Op : <input style="background-color:#BBCCFF;" size="16" type="text" class="text1" name="mseb_op_kwh" value="<? echo $mseb_op_kwh;?>"> Cl : <input size="16" type="text" class="text1" name="mseb_cl_kwh" value="<? echo $mseb_cl_kwh;?>"></td>
<td class=td1>Total MSEB kWh : <input type="text1" size="10" name="el_time" value="<? echo $total_mseb_units;?>"></td>
</tr>


<tr>
<td class=td1>MSEB PF & Outage : </td>
<td class=td1> PF : <input size="10" type="text" class="text1" name="mseb_pf" value="<? echo $mseb_pf;?>"> &nbsp; &nbsp;Outage : <input size="10" type="text" class="text1" name="el_outage" value="<? echo $el_outage;?>"> ( Total hr:mm )</td>
<td class=td1></td>
</tr>


<td><br><b>DG SET</b></td>

<tr>
<td class=td1>DG SET KWH :</td>
<td class=td1>125KVA : <input size="10" type="text" class="text1" name="dg_125_kwh" value="<? echo $dg_125_kwh;?>"> &nbsp; 75KVA : <input size="10" type="text" class="text1" name="dg_75_kwh" value="<? echo $dg_75_kwh;?>"></td>
<td class=td1>DG SET Total kWh : <input type="text1" size="10" name="el_time" value="<? echo $total_dg_kwh;?>"></td>
</tr>

<tr>
<td class=td1>Diesel Cons Litrs :</td>
<td class=td1>125KVA : <input size="10" type="text" class="text1" name="dg_125_disl" value="<? echo $dg_125_disl;?>"> &nbsp; 75KVA : <input size="10" type="text" class="text1" name="dg_75_disl" value="<? echo $dg_75_disl;?>"></td>
<td class=td1>Total Diesel Cons. : <input type="text1" size="10" name="el_time" value="<? echo $total_dg_disl;?>"></td>
</tr>

<td><br><b>Water</b></td>

<tr>
<td class=td1>Water Pump Litrs :</td>
<td class=td1>Op : <input style="background-color:#BBCCFF;" size="16" type="text" class="text1" name="water_op_ltrs" value="<? echo $water_op_ltrs;?>"> Cl : <input size="16" type="text" class="text1" name="water_cl_ltrs" value="<? echo $water_cl_ltrs;?>"></td>
<td class=td1>Total Water (kL) : <input type="text1" size="10" name="el_time" value="<? echo $total_water_ltrs;?>"></td>
</tr>

<tr>
<td class=td1>Water Pump KWH :</td>
<td class=td1>Op : <input style="background-color:#BBCCFF;" size="16" type="text" class="text1" name="water_kwh_op" value="<? echo $water_kwh_op;?>"> Cl : <input size="16" type="text" class="text1" name="water_kwh_cl" value="<? echo $water_kwh_cl;?>"></td>
<td class=td1>Total Water kWh : <input type="text1" size="10" name="el_time" value="<? echo $total_water_kwh;?>"></td>
</tr>

<td><br><b>Remark</b></td>
<tr>
<td class=td1>Department Remark :</td>
<td class=td1>&nbsp; &nbsp; &nbsp; &nbsp;<TEXTAREA ROWS="3" class="textarea" name="el_remark"><? echo $el_remark;?></TEXTAREA></td>
<td class=td1>MSEB + DG Total kWh : <input type="text1" size="10" name="el_time" value="<? echo $total_units;?>"></td>
</tr>
</table>

</div>
<div class="clear"></div>
</div>
</div>
<br>

<div align=center> 
<input type="button" value="delete" onclick="window.location='../mis/deleted.php?id=<?php echo "$id" ?>'"> &nbsp;

<input type="button" value="cancel" onclick="window.location='javascript:history.back()'"> <br>
<hr style="margin-top:4px;" width=30% color=orange size=1>
<font color=red size=2><u>Are you sure? </u></font> &nbsp; 
</div>



