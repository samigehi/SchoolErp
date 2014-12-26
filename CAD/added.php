<html>
<head>
<title>record added</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'office')
{
include("connect.php");

$form_no = trim($_POST['form_no']);
$birth_date = trim($_POST['birth_date']);
$recd_date = trim($_POST['recd_date']);
$st_name = trim($_POST['st_name']);
$sex = trim($_POST['sex']);
$class = trim($_POST['class']);
$remarks = mysql_escape_string($_POST['remarks']);
$nationality = trim($_POST['nationality']);
$nri = trim($_POST['nri']);
$address = mysql_escape_string($_POST['address']);
$city = trim($_POST['city']);
$state = trim($_POST['state']);
$country = trim($_POST['country']);
$pincode = trim($_POST['pincode']);
$phone_no = trim($_POST['phone_no']);
$mobile_no = trim($_POST['mobile_no']);
$email = trim($_POST['email']);
$email_m = trim($_POST['email_m']);
$learning_diffy = trim($_POST['learning_diffy']);
$phy_illness = trim($_POST['phy_illness']);
$applied_earlier = trim($_POST['applied_earlier']);
$info_source_detail = mysql_escape_string($_POST['info_source_detail']);
$mother_tongue = trim($_POST['mother_tongue']);
$father_name = trim($_POST['father_name']);
$mother_name = trim($_POST['mother_name']);
$father_job = mysql_escape_string($_POST['father_job']);
$mother_job = mysql_escape_string($_POST['mother_job']);
$father_edu = mysql_escape_string($_POST['father_edu']);
$mother_edu = mysql_escape_string($_POST['mother_edu']);
$siblings = trim($_POST['siblings']);
$single_parent = trim($_POST['single_parent']);
$adopted_child = trim($_POST['adopted_child']);
$separated = trim($_POST['separated']);
$divorced = trim($_POST['divorced']);
$fee_paid = trim($_POST['fee_paid']);
$siblings_no = trim($_POST['siblings_no']);
$fee_paid = trim($_POST['fee_paid']);
$kfi_link = trim($_POST['kfi_link']);
$added_date = date("Y-m-d");
$added_by = $_SESSION['user_name'];
$added_from = $_SESSION['user_ip'];

$query = "INSERT INTO cad_app (form_no, recd_date, st_name, sex, birth_date, class, remarks, nationality, nri, mother_tongue, address, city, state, country, pincode, phone_no, mobile_no, email, email_m, learning_diffy, phy_illness, applied_earlier, kfi_link, info_source_detail, father_name, father_edu, father_job, mother_name, mother_edu, mother_job, siblings, single_parent, adopted_child, separated, divorced, fee_paid, siblings_no, added_date, added_by, added_from)
VALUES ('$form_no', '$recd_date', '$st_name', '$sex', '$birth_date', '$class', '$remarks', '$nationality', '$nri', '$mother_tongue', '$address', '$city', '$state', '$country', '$pincode', '$phone_no', '$mobile_no', '$email', '$email_m', '$learning_diffy', '$phy_illness', '$applied_earlier', '$kfi_link', '$info_source_detail', '$father_name', '$father_edu', '$father_job', '$mother_name', '$mother_edu', '$mother_job', '$siblings', '$single_parent', '$adopted_child', '$separated', '$divorced', '$fee_paid', '$siblings_no', '$added_date', '$added_by', '$added_from')";
$results = mysql_query($query);

// -------------------------- show added record --------------------------//
if ($results)
{
header("Location: add.php");
}

if (!$results)
{
echo "<h3>Record not added successfully, error!</h3>";
}
}
?>
 
</body>
</html>
