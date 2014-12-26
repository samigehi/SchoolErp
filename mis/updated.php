
<?php
include("index.php");
include("connect.php");

$id = $_POST['id'];
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];

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

$update = "UPDATE ele_mis SET el_name = '$el_name', mseb_op_kwh = '$mseb_op_kwh', mseb_cl_kwh = '$mseb_cl_kwh', mseb_pf = '$mseb_pf', el_outage = '$el_outage', dg_125_kwh = '$dg_125_kwh', dg_30_kwh= '$dg_30_kwh', dg_125_disl = '$dg_125_disl', dg_30_disl = '$dg_30_disl', water_op_ltrs = '$water_op_ltrs', water_cl_ltrs = '$water_cl_ltrs', water_kwh_op = '$water_kwh_op', water_kwh_cl = '$water_kwh_cl', total_mseb_units = '$total_mseb_units', total_dg_kwh = '$total_dg_kwh', total_dg_disl = '$total_dg_disl', total_water_ltrs = '$total_water_ltrs', total_water_kwh = '$total_water_kwh', total_units = '$total_units', per_litrs_kwh = '$per_litrs_kwh', el_remark = '$el_remark' WHERE id = '$id'";
$rsUpdate = mysql_query($update);

//---------------------------------update show form --------------------------------//

if ($rsUpdate)
{
header("Location: search.php?fromdate=$fromdate&todate=$todate");
}

if (!$rsUpdate)
{
echo "<h3>Record not Updated successfully, error!</h3>";
}
mysql_close();
?>
<br>
<div align=center>
<a href="javascript: window.history.go(-2)">Back to searched result</a></div>
</body>
</html>
