<html>
<head>
<title>record added</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'dilip' || $_SESSION['user_name'] == 'office')
{
include("connect.php");
$staff_name = trim($_POST['staff_name']);
$birth_date = trim($_POST['birth_date']);
$designation = trim($_POST['designation']);
$teach_area = trim($_POST['teach_area']);
$teach_area_1 = trim($_POST['teach_area_1']);
$teach_area_2 = trim($_POST['teach_area_2']);
$department = trim($_POST['department']);
$join_date = trim($_POST['join_date']);
$bld_group = trim($_POST['bld_group']);
$gender = trim($_POST['gender']);
$staff_email = trim($_POST['staff_email']);
$address = trim($_POST['address']);
$city = trim($_POST['city']);
$postalcode = trim($_POST['postalcode']);
$state = trim($_POST['state']);
$country = trim($_POST['country']);
$phone = trim($_POST['phone']);
$mobile_no = trim($_POST['mobile_no']);
$ss_remark = trim($_POST['ss_remark']);
$leave_cl = trim($_POST['leave_cl']);
$leave_el = trim($_POST['leave_el']);
$leave_ml = trim($_POST['leave_ml']);
$leave_sl = trim($_POST['leave_sl']);

$add_date = date("Y-m-d");
$add_time = date("H:i:s");
$add_user = $_SESSION['user_name'];

$house_parent_of = trim($_POST['house_parent_of']);
$class_teacher_of = trim($_POST['class_teacher_of']);
$login_name = trim($_POST['login_name']);

$query = "INSERT INTO staff (staff_name, staff_email, designation, teach_area, teach_area_1, teach_area_2, department, birth_date, join_date, bld_group, gender, address, city, postalcode, state, country, phone, mobile_no, ss_remark, add_date, add_time, add_user, house_parent_of, class_teacher_of, login_name, leave_cl, leave_el, leave_ml, leave_sl)
VALUES ('$staff_name', '$staff_email', '$designation', '$teach_area', '$teach_area_1', '$teach_area_2', '$department', '$birth_date', '$join_date', '$bld_group', '$gender', '$address', '$city', '$postalcode', '$state', '$country', '$phone', '$mobile_no', '$ss_remark', '$add_date', '$add_time', '$add_user', '$house_parent_of', '$class_teacher_of', '$login_name', '$leave_cl', '$leave_el', '$leave_ml', '$leave_sl')";
$results = mysql_query($query);

// -------------------------- show added record --------------------------//
if ($results)
{
header ("Location: index.php");	
}
if (!$results)
{
echo "<h3>Record not added successfully, error!</h3>";
}
}
?>
 
</body>
</html>
