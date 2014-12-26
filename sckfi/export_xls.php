<?php
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];

header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename=gathering_members.xls");
header("Pragma: no-cache");
header("Expires: 0");

mysql_connect('kscskfi.com','gbhau','omnamo123');
@mysql_select_db(kscskfic_gathering) or die("Unable to select database");

$select = "SELECT * FROM gathering_2014 where app_date BETWEEN '$fromdate' AND '$todate' ORDER BY id";

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
