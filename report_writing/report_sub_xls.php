<?php
include("connect.php");
$class = $_GET['class'];
$ss_area = $_GET['ss_area'];
$teacher = $ss_area.'_teacher';

ob_start();
mysql_connect('localhost','root','root');
mysql_select_db('crm_db');

$sql = "SELECT * FROM spring_2015 WHERE class = '$class'";

$res = mysql_query( $sql) or die();
 
$count = mysql_num_fields($res);

 // fetch table header from database
 $header = '';
 for ($i = 0; $i < $count; $i++){
    $header .= mysql_field_name($res, $i)."\t";
    }

 // fetch data each row, store on tabular row data
 while($row = mysql_fetch_row($res)){
   $line = '';
   foreach($row as $value){
   if(!isset($value) || $value == ""){
     $value = "\t";
   }else{
     $value = str_replace('"', '""', $value);
     $value = '"' . $value . '"' . "\t";
   }
   $line .= $value;
   }
   $data .= trim($line)."\n";
   $data = str_replace("\r", "", $data);
  }
  
 $filename ="Report_".$ss_area.$class.".xls";
 header("Content-type:application/vnd.ms-excel;name='excel'");
 header("Content-Disposition: attachment; filename=$filename");
 header("Pragma: no-cache");
 header("Expires: 0");

 // Output data
 echo $header."\n\n".$data;
 ?>
