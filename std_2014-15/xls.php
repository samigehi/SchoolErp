<?php

if (isset($_POST['submit'])) {

$birth_date1 = trim($_POST['birth_date1']);
$adm_date1 = trim($_POST['adm_date1']);
$adm1 = trim($_POST['adm1']);
$name1 = trim($_POST['name1']);
$sex1 = trim($_POST['sex1']);
$class1 = trim($_POST['class1']);
$bldgroup1 = trim($_POST['bldgroup1']);
$class_teach1 = trim($_POST['class_teach1']);
$house1 = trim($_POST['house1']);
//$house_parent = trim($_POST['house_parent']);
//$hobby_1 = trim($_POST['hobby_1']);
//$hobby_2 = trim($_POST['hobby_2']);
//$hobby_3 = trim($_POST['hobby_3']);
//$six_sub = trim($_POST['six_sub']);
//$second_lang = trim($_POST['second_lang']);
//$parent1 = trim($_POST['parent1']);
//$parent2 = trim($_POST['parent2']);
//$occupation = trim($_POST['occupation']);
//$occupation_2 = trim($_POST['occupation_2']);
//$address1 = trim($_POST['address1']);
//$city = trim($_POST['city']);
//$postalcode = trim($_POST['postalcode']);
//$state = trim($_POST['state']);
//$country = trim($_POST['country']);
//$phone = trim($_POST['phone']);
//$mobile_no = trim($_POST['mobile_no']);
//$mobile_no_2 = trim($_POST['mobile_no_2']);
//$email = trim($_POST['email']);
//$email_2 = trim($_POST['email_2']);
}

header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename=std_'$class'.xls");
header("Pragma: no-cache");
header("Expires: 0");

mysql_connect('localhost','root','root');
@mysql_select_db(std_master) or die("Unable to select database");

$select = "SELECT $find[1] FROM std_2014_15 WHERE class LIKE '%$class%'";

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
