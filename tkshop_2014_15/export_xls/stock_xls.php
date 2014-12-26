<?php

$today = date('Y-m-d');
$data = '';
$header = '';

header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename=tk_stock_'$today'.xls");
header("Pragma: no-cache");
header("Expires: 0");

include ('connect.php');

$select = "SELECT id, st_items, rate, st_qty, sell_rate, unit, st_qty*rate as Total, st_remark FROM tk_stock ORDER BY st_items";

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
