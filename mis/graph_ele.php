<?php
if (isset($_POST['submit']))
{
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];

include("graph/phpgraphlib.php");

$graph=new PHPGraphLib(850,500); 

$link = mysql_connect('localhost', 'root', 'root')
   or die('Could not connect: ' . mysql_error());
     
mysql_select_db('ss_maint') or die('Could not select database');
  
$dataArray=array();
  
//get data from database
$sql="SELECT total_mseb_units, total_dg_kwh, date_format (el_date, '%d %M, %y') el_date FROM ele_mis where el_date BETWEEN '$fromdate' AND '$todate'";
$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $el_date=$row["el_date"];
      $count=$row["total_mseb_units"];
      $count2=$row["total_dg_kwh"];
      //add to data areray
      $dataArray[$el_date]=$count;
      $dataArray2[$el_date]=$count2;
  }
}
  
//configure graph
$graph->addData($dataArray, $dataArray2);
$graph->setBarColor('red', 'green');
$graph->setTitle('MSEB & DG SET units consuption');
$graph->setupYAxis(12, 'blue');
$graph->setupXAxis(20);
$graph->setGrid(true);
$graph->setLegend(true);
$graph->setTitleLocation('left');
$graph->setTitleColor('black');
$graph->setLegendOutlineColor('white');
$graph->setLegendTitle('MSEB', 'DGSET');
$graph->setXValuesHorizontal(false);
$graph->createGraph();
}
?>
