<?php

$adm = $_GET['adm'];

header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename=std_'$adm'.xls");
header("Pragma: no-cache");
header("Expires: 0");

mysql_connect('localhost','thevall7_erp',Õthevalleyschool123Õ);
@mysql_select_db(thevall7_erp_std_master) or die("Unable to select database");

$select = "SELECT * FROM std_2013_14 WHERE adm='$adm'";

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
