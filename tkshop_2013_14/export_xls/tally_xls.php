<?php

$customer_type = $_GET['customer_type'];
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$customer_type = $_GET['customer_type'];
$field = $_GET['field'];
$find = $_GET['find'];

$exportdate = $fromdate. " to " .$todate; 


header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename=for_tally.xls");
header("Pragma: no-cache");
header("Expires: 0");

include ('connect.php');

$select = "SELECT '".$exportdate."' as 'Export Date', customer_name, SUM(iss_qty*iss_rate) as 'total' FROM tk_issue where customer_type LIKE '%$customer_type%' AND upper($field) LIKE '%$find%' AND iss_date BETWEEN '$fromdate' AND '$todate' GROUP BY customer_name";

$export = mysql_query($select);

$count = mysql_num_fields($export);
for ($i = 0; $i < $count; $i++) {

$header .= mysql_field_name($export, $i)."\t";
}
while($row = mysql_fetch_row($export)) {

$line = '';
foreach($row as $value) {
if ((!isset($value)) OR ($value == "")) {

$value = "\t";
} else {

$value = str_replace('"', '""', $value);

$value = '"' . $value . '"' . "\t";

}
$line .= $value;
}

$data .= trim($line)."\n";

}
$data = str_replace("\r", "", $data);
if ($data == "") {

$data = "\n(0) Records Found!\n";
}
print "$header\n$data";

?> 

