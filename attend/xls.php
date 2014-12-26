<?php

$fromdate = $_POST['fromdate'];

$todate = $_POST['todate'];

$attend_area = $_POST['attend_area'];

header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename=attend_report_'$fromdate'_'$todate'_'$attend_area'.xls");
header("Pragma: no-cache");
header("Expires: 0");

mysql_connect('localhost','root','root');
@mysql_select_db(std_master) or die("Unable to select database");

$select = "SELECT * FROM attend WHERE attend_area = '$attend_area' AND school_date BETWEEN '$fromdate' AND '$todate'";

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
