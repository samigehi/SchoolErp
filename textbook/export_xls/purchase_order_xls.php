<?php

$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];

header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename=PO_$todate.xls");
header("Pragma: no-cache");
header("Expires: 0");

mysql_connect('localhost','thevall7_erp',Õthevalleyschool123Õ);
@mysql_select_db(thevall7_erp_textbook) or die("Unable to select database");

$select = "SELECT po_id, po_date, po_items, po_remark, ordered_by, po_qty, unit FROM text_purchase_order WHERE po_date BETWEEN '$fromdate' AND '$todate' ORDER BY po_date";

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

