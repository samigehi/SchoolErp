<?php

include("phpgraphlib.php");
$graph=new PHPGraphLib(650,450); 

$link = mysql_connect('localhost','thevall7_erp',Õthevalleyschool123Õ)
   or die('Could not connect: ' . mysql_error());
     
mysql_select_db('thevall7_erp_ss_maint') or die('Could not select database');
  
$dataArray=array();
  
//get data from database
$sql="SELECT total_mseb_units, date_format (el_date, '%d-%m-%y') el_date FROM ele_mis";
$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $salesgroup=$row["el_date"];
      $count=$row["total_mseb_units"];
      //add to data areray
      $dataArray[$salesgroup]=$count;
  }
}
  
//configure graph
$graph->addData($dataArray);
$graph->setTitle("Electrical Consuption KWH");
$graph->setGradient("lime", "green");
$graph->setBarOutlineColor("black");
$graph->createGraph();
?>


<html>
<h3>This is where I want to display my graph</h3>
<img src="mysql_graph_bar.php" />
</html>


