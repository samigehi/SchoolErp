<html>
<head>
<title>record added</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
include("connect.php");

$el_date = trim($_POST['el_date']);
$el_time = trim($_POST['el_time']);

$el_name = trim($_POST['el_name']);

//MSEB data
$mseb_op_kwh = trim($_POST['mseb_op_kwh']);
$mseb_cl_kwh = trim($_POST['mseb_cl_kwh']);

$mseb_pf = trim($_POST['mseb_pf']);
$el_outage = trim($_POST['el_outage']);

$total_mseb_units = ($mseb_cl_kwh - $mseb_op_kwh)*2;

//DG set data
$dg_125_kwh = trim($_POST['dg_125_kwh']);
$dg_30_kwh = trim($_POST['dg_30_kwh']);

$total_dg_kwh = $dg_125_kwh + $dg_30_kwh;

$dg_125_time = trim($_POST['dg_125_time']);
$dg_30_time = trim($_POST['dg_30_time']);

$dg_125_disl = trim($_POST['dg_125_disl']);
$dg_30_disl = trim($_POST['dg_30_disl']);

$total_dg_disl = $dg_125_disl + $dg_30_disl;

$per_litrs_kwh = $total_dg_kwh/$total_dg_disl;

//Water data
$water_op_ltrs = trim($_POST['water_op_ltrs']);
$water_cl_ltrs = trim($_POST['water_cl_ltrs']);

$total_water_ltrs = round(($water_cl_ltrs - $water_op_ltrs)/1000);

$water_kwh_op = trim($_POST['water_kwh_op']);
$water_kwh_cl = trim($_POST['water_kwh_cl']);

$total_water_kwh = $water_kwh_cl - $water_kwh_op;

//total units MSEB + DG Sets
$total_units = $total_mseb_units + $dg_125_kwh + $dg_30_kwh;

$el_remark = trim($_POST['el_remark']);

$query = "INSERT INTO ele_mis 

(el_date, el_time, el_name, mseb_op_kwh, mseb_cl_kwh, mseb_pf, el_outage, dg_125_kwh, dg_30_kwh, dg_125_time, dg_30_time, dg_125_disl, dg_30_disl, water_op_ltrs, water_cl_ltrs, water_kwh_op, water_kwh_cl, total_mseb_units, total_dg_kwh, total_dg_disl, total_water_ltrs, total_water_kwh, total_units, per_litrs_kwh, el_remark) 

VALUES 

('$el_date', '$el_time', '$el_name', '$mseb_op_kwh', '$mseb_cl_kwh', '$mseb_pf', '$el_outage', '$dg_125_kwh', '$dg_30_kwh', '$dg_125_time', '$dg_30_time', '$dg_125_disl', '$dg_30_disl', '$water_op_ltrs', '$water_cl_ltrs', '$water_kwh_op', '$water_kwh_cl', '$total_mseb_units', '$total_dg_kwh', '$total_dg_disl', '$total_water_ltrs', '$total_water_kwh', '$total_units', '$per_litrs_kwh', '$el_remark')";

$results = mysql_query($query);

if ($results)
{
header ("Location: add.php");
}

if (!$results)
{ 
echo mysql_error(); 
}

mysql_close();
?>
 
