<?php

header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename=alumni_db.xls");
header("Pragma: no-cache");
header("Expires: 0");

mysql_connect('sahyadrischool.org','gbhau','pinsah410');
@mysql_select_db(alumni_db) or die("Unable to select database");

$select = "SELECT 
st_name,
username, 
st_mobile_no, 
adm, 
gender, 
birth_date, 
join_class, 
join_year, 
left_class,
address, 
city, 
state,
country,
postal_code,
institution_studing,
course_studing,
year_studing,
location_studing,
major_studing,
organisation_working,
designation_working,
location_working,
qualification_working,
major_working,
institute_working,
fa_name,
fa_email,
fa_mobile_no,
fa_occupation,
mo_name,
mo_email,
mo_mobile_no,
mo_occupation,
added_date,
update_date,
contribute FROM members";

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
