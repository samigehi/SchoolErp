<?php

$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$field = $_GET['field'];
$find = $_GET['find'];

header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename=issue_details.xls");
header("Pragma: no-cache");
header("Expires: 0");

include ('connect.php');

$select = "SELECT iss_id, iss_date, customer_name, st_items, iss_remark, iss_qty, unit, rate FROM maint_stock, maint_issue WHERE st_id = iss_items AND upper($field) LIKE'%$find%' AND iss_date BETWEEN '$fromdate' AND '$todate' ORDER BY iss_date";

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

