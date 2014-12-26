<?php

if (isset($_POST['submit']))
{
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];

include("graph/phpgraphlib.php");
$graph=new PHPGraphLib(850,500); 

$link = mysql_connect('localhost','thevall7_erp',Õthevalleyschool123Õ)
   or die('Could not connect: ' . mysql_error());
     
mysql_select_db('thevall7_erp_ss_maint') or die('Could not select database');
  
$dataArray=array();
  
//get data from database
$sql="SELECT total_water_ltrs, date_format (el_date, '%d %M, %y') el_date FROM ele_mis where el_date BETWEEN '$fromdate' AND '$todate'";
$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $salesgroup=$row["el_date"];
      $count=$row["total_water_ltrs"];
      //add to data areray
      $dataArray[$salesgroup]=$count;
  }
}
  
//configure graph
$graph->addData($dataArray);
$graph->setTitle("Water Consumption ( KL - Kilo Litres )");
$graph->setGradient("lime", "green");
$graph->setupYAxis(12, 'blue');
$graph->setupXAxis(20);
$graph->setBarOutlineColor("black");
$graph->createGraph();
}
?>
