<?php
$fdt = $_GET['fromdate'];
$tdt = $_GET['todate'];
$po_1 = "Purchase_order_"; 
$po_2 = ".csv";

$newDate = date("d-m-Y", strtotime($fdt));

$po = $po_1.$newDate.$po_2;

header("Content-type: application/excel");
header("Content-Disposition: attachment; filename=$po");
header("Pragma: no-cache");
header("Expires: 0");

mysql_connect('localhost','thevall7_erp',Õthevalleyschool123Õ);
@mysql_select_db(thevall7_erp_dhstore) or die("Unable to select database");

$select = "SELECT id, po_date, po_items, po_qty, ordered_by, po_remark FROM purchase_order WHERE po_date BETWEEN '$fdt' AND '$tdt' ORDER BY po_date";

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

